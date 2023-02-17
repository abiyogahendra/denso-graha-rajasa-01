<?php

namespace App\Http\Controllers\Page\Management;

use App\Http\Controllers\Controller;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class CarManagementController extends Controller
{

    public function CarManagementIndex()
    {
        return view('page.management.car-management');
    }

    public function GetQueryDataTable(String $query, Request $req)
    {
        $dataSort = null;
        $dataSearch = null;
        $dataOrder = null;
        $dataLimit = null;
        $dataOffset = null;

        if ($req->sort != null) {
            $query = $query . ' ORDER BY ' . $req->limit . ' ' . $req->order;
        }
        if ($req->limit != null) {
            $query = $query . ' LIMIT ' . $req->limit;
        }
        if ($req->offset != null) {
            $query = $query . ' OFFSET ' . $req->offset;
        }
        
        return $query;


    }

    public function GetDataListCarCategory(Request $table)
    {

        $query = 'SELECT categoryID id, ctgName name, updated_at, updated_by FROM CAR_CATEGORY';
        $countDataUser = DB::select('select count(*) jumlah FROM CAR_CATEGORY');
        $newQuery = $this->GetQueryDataTable($query, $table);
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

    public function CreateNewCategory(Request $re)
    {
        $idDataBaru = DB::table('car_category')
            ->insertGetId([
                'ctgName' => $re->category,
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

    public function GetDataListCarBrand(Request $table)
    {

        $query = 'SELECT brandID id, brndName name, updated_at, updated_by FROM CAR_BRAND';
        $countDataUser = DB::select('select count(*) jumlah FROM CAR_BRAND');
        $newQuery = $this->GetQueryDataTable($query, $table);
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

    public function CreateNewBrand(Request $re)
    {
        $idDataBaru = DB::table('car_brand')
            ->insertGetId([
                'brndName' => $re->brand,
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

    public function GetDataListCarMaintain(Request $table)
    {

        $query = 'SELECT carName, ctgName, brndName, m.updated_at, m.updated_by FROM car_maintain_brand_category m INNER JOIN car_category c ON m.ctgryID = c.categoryID INNER JOIN car_brand b ON m.brandID = b.brandID';
        $countDataUser = DB::select('select count(*) jumlah FROM car_maintain_brand_category');
        $newQuery = $this->GetQueryDataTable($query, $table);
        try {

            $dataUser = DB::select($newQuery);
            //code...
        } catch (\Throwable $th) {
            return response()->json("gagal", 500);
        }
        return response()->json([
            'total' => $countDataUser[0]->jumlah,
            'totalNotFiltered' => $countDataUser[0]->jumlah,
            "rows" => $dataUser,
        ]);
    }

    public function CreateNewCar(Request $re)
    {
        $idDataBaru = DB::table('car_maintain_brand_category')
            ->insertGetId([
                'carName' => $re->car,
                'brandID' => $re->brand,
                'ctgryID' => $re->category,
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

}
