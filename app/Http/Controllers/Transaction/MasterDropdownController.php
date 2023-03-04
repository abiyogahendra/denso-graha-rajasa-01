<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class MasterDropDownController extends Controller
{

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

        $query = 'SELECT mechanicName name, mechanicID no, updated_at, updated_by FROM mechanic where status = "T"';
        $countDataUser = DB::select('select count(*) jumlah FROM mechanic');
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

    public function GetMasterListUser()
    {
        $dataUser = DB::select('select userID code, username name from user');

        return response()->json($dataUser, 200);

    }

    public function GetMasterListRole()
    {
        $dataRole = DB::select('select roleId code, roleDescription name from role');

        return response()->json($dataRole, 200);

    }

    public function GetMasterListBrandCar()
    {
        $dattaReturn = DB::select('SELECT brandID code, brndName name FROM car_brand');

        return response()->json($dattaReturn, 200);
    }

    public function GetMasterListNameCarByCategoryBrand(Request $re)
    {
        $dattaReturn = DB::select('SELECT DISTINCT carMaintainID code, m.carname name FROM car_maintain_brand_category m INNER JOIN car_brand b ON m.brandID = b.brandID WHERE m.ctgryID = ? and m.brandID = ?', [$re->category, $re->brand]);

        return response()->json($dattaReturn, 200);
    }

    public function GetMasterListCategoryCar()
    {
        $dattaReturn = DB::select('SELECT categoryID code, ctgName name FROM car_category');

        return response()->json($dattaReturn, 200);
    }

    public function GetMasterListCategoryCarAddTransaction()
    {
        $dattaReturn = DB::select('SELECT DISTINCT m.ctgryID code, c.ctgName name FROM car_maintain_brand_category m INNER JOIN car_category c ON m.ctgryID = c.categoryID');

        return response()->json($dattaReturn, 200);
    }

    public function GetMasterListOwnerAddTransaction()
    {
        $dattaReturn = DB::select('SELECT customerID id, custname text, custAddress address, custEmail email, custNumber number FROM customer');

        return response()->json($dattaReturn, 200);
    }

    public function GetDataListCarNameTransactionListFilter(Request $re)
    {
        $dattaReturn = DB::select('SELECT DISTINCT carMaintainID id, carName text FROM car_maintain_brand_category where carName like "%' . $re->search . '%" ');
        return response()->json($dattaReturn, 200);
    }

    public function GetDataListCarLicenseTransactionListFilter(Request $re)
    {
        $dattaReturn = DB::select('SELECT DISTINCT licensePlate id, licensePlate text FROM hdr_transaction where licensePlate like "%' . $re->search . '%" ');
        return response()->json($dattaReturn, 200);
    }

    public function GetDataListOwnerNameTransactionListFilter(Request $re)
    {
        $dattaReturn = DB::select('SELECT DISTINCT customerID id, custName text FROM customer where custName like "%' . $re->search . '%" ');
        return response()->json($dattaReturn, 200);
    }

    public function GetDataListFrameNumberTransactionListFilter(Request $re)
    {
        $dattaReturn = DB::select('SELECT DISTINCT carfrmNumber id, carfrmNumber text FROM hdr_transaction where carfrmNumber like "%' . $re->search . '%" ');
        return response()->json($dattaReturn, 200);
    }
    public function GetDataListEngineNumberTransactionListFilter(Request $re)
    {
        $dattaReturn = DB::select('SELECT DISTINCT carEngnNumber id, carEngnNumber text FROM hdr_transaction where carEngnNumber like "%' . $re->search . '%" ');
        return response()->json($dattaReturn, 200);
    }

    public function GetDataListCarCategoryBrandAddTransaction(Request $re)
    {
        $dattaReturn = DB::select('SELECT m.`carMaintainID` id, m.`ctgryID`, m.`brandID`, carName text, ctgName, brndName, m.updated_at, m.updated_by FROM car_maintain_brand_category m INNER JOIN car_category c ON m.ctgryID = c.categoryID INNER JOIN car_brand b ON m.brandID = b.brandID where carName like "%' . $re->search . '%" ');
        return response()->json($dattaReturn, 200);
    }

}
