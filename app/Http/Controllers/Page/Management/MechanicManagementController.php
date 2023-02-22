<?php

namespace App\Http\Controllers\Page\Management;

use App\Http\Controllers\Controller;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class MechanicManagementController extends Controller
{

    public function MechanicManagementIndex()
    {
        return view('page.management.mechanic-management');
    }

    public function GetQueryDataTable(String $query, Request $req)
    {
        $dataSort = null;
        $dataSearch = null;
        $dataOrder = null;
        $dataLimit = null;
        $dataOffset = null;

        if ($req->sort != null) {
            $query = $query . ' ORDER BY ' . $req->sort . ' ' . $req->order;
        }
        if ($req->limit != null) {
            $query = $query . ' LIMIT ' . $req->limit;
        }
        if ($req->offset != null) {
            $query = $query . ' OFFSET ' . $req->offset;
        }
        return $query;

    }

    public function GetDataListMechanic(Request $table)
    {

        $query = 'SELECT mechanicName name, mechanicID no, status, updated_at, updated_by FROM mechanic';
        $countDataUser = DB::select('select count(*) jumlah FROM mechanic');
        $newQuery = $this->GetQueryDataTable($query, $table);
        // dd($newQuery);
        try {

            $dataUser = DB::select($newQuery);
            //code...
        } catch (\Throwable $th) {
            return response()->json([
                'gagal' => 404,
            ]);
        }
        return response()->json([
            'total' => $countDataUser[0]->jumlah,
            'totalNotFiltered' => $countDataUser[0]->jumlah,
            "rows" => $dataUser,
        ]);
    }

    public function CreateMechanicLeader(Request $re)
    {
        DB::beginTransaction();
        try {
            //code...
            DB::update('update technical_lead set status = "F" where status = "T" ');

            $idDataBaru = DB::table('technical_lead')
                ->insertGetId([
                    'tchLeadName' => $re->leader,
                    'status' => 'T',
                    'created_at' => Carbon::now(),
                    'created_by' => Auth::user()->userID,
                    'updated_at' => Carbon::now(),
                    'updated_by' => Auth::user()->userID,
                ]);

            return response()->json(
                [
                    'code' => 200,
                    'message' => "Data successfuly saved",
                ]
            );
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message' => 'Error While Processing data'], 500);
        }

    }

    public function CreateMechanic(Request $re)
    {
        $dataExisting = DB::select('select * from mechanic where mechanicName = ?', [$re->mechanic]);

        if ($dataExisting != null) {
            return response()->json(['message' => 'Data is Existing'], 500);
        }

        $idDataBaru = DB::table('mechanic')
            ->insertGetId([
                'mechanicName' => $re->mechanic,
                'created_at' => Carbon::now(),
                'created_by' => Auth::user()->userID,
                'updated_at' => Carbon::now(),
                'updated_by' => Auth::user()->userID,
            ]);

        return response()->json(
            [
                'code' => 200,
                'message' => "Data successfuly saved",
            ]
        );
    }
    public function GetDataMechanicLeader()
    {
        # code...
        $dataLeader = DB::select('SELECT tchLeadID number, tchLeadName name FROM technical_lead WHERE status = "T"');

        return response()->json($dataLeader[0], 200);
    }

    public function ChangeStatusDataMechanicLeader(Request $re)
    {
        try {
            //code...

            $idDataBaru = DB::table('mechanic')
                ->where('mechanicID', '=', $re->number)
                ->update([
                    'status' => $re->status,
                    'updated_at' => Carbon::now(),
                    'updated_by' => Auth::user()->userID,
                ]);

            return response()->json(
                [
                    'code' => 200,
                    'message' => "Data successfuly saved",
                ]
            );
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message' => 'Error while processing data'], 500);
        }
    }

}
