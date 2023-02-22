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
            $query = $query . ' ORDER BY ' . $req->sort . ' ' . $req->order;
        }
        if ($req->limit != null) {
            $query = $query . ' LIMIT ' . $req->limit;
        }
        if ($req->offset != 0) {
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
        try {
            //code...
            $dataExisting = DB::select('select * from car_category where ctgName = ?', [$re->category]);

            if ($dataExisting != null) {
                return response()->json(['message' => 'Data is Existing'], 500);
            }

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
        } catch (\Throwable $th) {
            return response()->json(['message' => 'error while processing data'], 500);
        }
    }

    public function UpdateCategory(Request $re)
    {
        try {
            //code...
            $idDataBaru = DB::table('car_category')
                ->where('categoryID', $re->number)
                ->update(['ctgName' => $re->category,
                    'updated_by' => Auth::user()->userID,
                    'updated_at' => Carbon::now(),
                ]);

            return response()->json(
                [
                    'code' => 200,
                    'message' => "Data successfuly saved",
                ]
            );
        } catch (\Throwable $th) {
            return response()->json(['message' => 'error while processing data'], 500);
        }
    }

    public function DeleteCategory(Request $re)
    {
        try {
            //code...
            DB::table('car_category')->where('categoryID', '=', $re->number)->delete();

            return response()->json(
                [
                    'code' => 200,
                    'message' => "Data successfuly Deleted",
                ]
            );
        } catch (\Throwable $th) {
            return response()->json(['message' => 'error while processing data'], 500);
        }

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
        try {
            $dataExisting = DB::select('select * from car_brand where brndName = ?', [$re->brand]);

            if ($dataExisting != null) {
                return response()->json(['message' => 'Data is Existing'], 500);
            }

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
        } catch (\Throwable $th) {
            return response()->json(['message' => 'error while processing data'], 500);
        }
    }

    public function UpdateBrand(Request $re)
    {
        try {
            //code...
            $idDataBaru = DB::table('car_brand')
                ->where('brandID', $re->number)
                ->update(['brndName' => $re->brand,
                    'updated_by' => Auth::user()->userID,
                    'updated_at' => Carbon::now(),
                ]);

            return response()->json(
                [
                    'code' => 200,
                    'message' => "Data successfuly saved",
                ]
            );
        } catch (\Throwable $th) {
            return response()->json(['message' => 'error while processing data'], 500);
        }
    }

    public function DeleteBrand(Request $re)
    {
        try {
            //code...
            DB::table('car_brand')->where('brandID', '=', $re->number)->delete();

            return response()->json(
                [
                    'code' => 200,
                    'message' => "Data successfuly Deleted",
                ]
            );
        } catch (\Throwable $th) {
            return response()->json(['message' => 'error while processing data'], 500);
        }

    }

    public function GetDataListCarMaintain(Request $table)
    {
        $query = 'SELECT carMaintainID number, carName, ctgName, brndName, m.updated_at, m.updated_by FROM car_maintain_brand_category m LEFT JOIN car_category c ON m.ctgryID = c.categoryID LEFT JOIN car_brand b ON m.brandID = b.brandID';
        $countDataUser = DB::select('select count(*) jumlah FROM car_maintain_brand_category');
        $newQuery = $this->GetQueryDataTable($query, $table);
        // try {
        // dd($newQuery);
        $dataUser = DB::select($newQuery);
        //code...
        // } catch (\Throwable $th) {
        //     return response()->json("gagal", 500);
        // }
        return response()->json([
            'total' => $countDataUser[0]->jumlah,
            'totalNotFiltered' => $countDataUser[0]->jumlah,
            "rows" => $dataUser,
        ]);
    }

    public function CreateNewCar(Request $re)
    {
        try {

            $dataExisting = DB::select('select * from car_maintain_brand_category where carName = ?', [$re->car]);

            if ($dataExisting != null) {
                return response()->json(['message' => 'Data is Existing'], 500);
            }

            //code...

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
        } catch (\Throwable $th) {
            return response()->json(['message' => 'error while processing data'], 500);
        }
    }

    public function UpdateCarName(Request $re)
    {
        try {
            //code...
            $idDataBaru = DB::table('car_maintain_brand_category')
                ->where('carMaintainID', $re->number)
                ->update(['carName' => $re->carName,
                    'updated_by' => Auth::user()->userID,
                    'updated_at' => Carbon::now(),
                ]);

            return response()->json(
                [
                    'code' => 200,
                    'message' => "Data successfuly saved",
                ]
            );
        } catch (\Throwable $th) {
            return response()->json(['message' => 'error while processing data'], 500);
        }
    }

    public function DeleteCarMaintain(Request $re)
    {
        $dataExisting = DB::select('select created_at from hdr_transaction where carID = ?', [$re->number]);

        if ($dataExisting != null) {
            return response()->json(['message' => 'Data is Already Used Transaction'], 500);
        }

        try {
            //code...
            DB::table('car_maintain_brand_category')->where('carMaintainID', '=', $re->number)->delete();

            return response()->json(
                [
                    'code' => 200,
                    'message' => "Data successfuly Deleted",
                ]
            );
        } catch (\Throwable $th) {
            return response()->json(['message' => 'error while processing data'], 500);
        }

    }

    
}
