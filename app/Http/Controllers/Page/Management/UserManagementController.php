<?php

namespace App\Http\Controllers\Page\Management;

use App\Http\Controllers\Controller;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{

    public function UserManagementIndex()
    {

        return view('page.management.user-management');
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

    public function GetDataListMaintainUserRoleManagament(Request $table)
    {

        $query = 'SELECT usrrlID no, U.username username, R.roleDescription description, M.updated_at, M.updated_by FROM maintain_user_role M
        INNER JOIN USER U ON M.userID = U.userID INNER JOIN role R ON M.roleID = R.roleID';
        
        $countDataUser = DB::select('select count(*) jumlah FROM maintain_user_role');
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

    public function GetDataListUserManagement(Request $table)
    {

        $query = 'select username , userID, created_at, updated_by from user';
        $countDataUser = DB::select('select count(*) jumlah from user');
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

    public function CreateNewUser(Request $re)
    {
        

        $idUserBaru = DB::table('user')
            ->insertGetId([
                'userID' => $re->usercode,
                'username' => $re->username,
                'password' => Hash::make($re->password),
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

    public function GetDataListRoleManagement(Request $re)
    {
        $query = 'SELECT roleId role, roleDescription description, updated_at, updated_by FROM role';
        $countDataUser = DB::select('select count(*) jumlah from role');
        $newQuery = $this->GetQueryDataTable($query, $re);
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

    public function CreteNewRole(Request $req)
    {
        $idUserBaru = DB::table('role')
            ->insertGetId([
                'roleID' => $req->role,
                'roleDescription' => $req->description,
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

    public function CreteNewMaintainUserRole(Request $req)
    {
        $idUserRoleBaru = DB::table('maintain_user_role')
            ->insertGetId([
                'roleID' => $req->role,
                'userID' => $req->user,
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
