<?php

namespace App\Http\Controllers\Page\Transaction;

use App\Http\Controllers\Controller;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class TransactionServiceController extends Controller
{

    public function TransactionServiceIndex()
    {
        return view('page.transaction.list-of-transaction');
    }

    public function TransactionServiceAddIndex()
    {
        return view('page.transaction.add-transaction');
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

    public function CreateNewTransactionService(Request $re)
    {

        $idOwner = 0;
        if ($re->qnewOwner == 't') {
            $idOwner = DB::table('customer')
                ->insertGetId([
                    'custName' => $re->qownerName,
                    'custAddress' => $re->qownerAddress,
                    'custEmail' => $re->qownerNumber,
                    'custNumber' => $re->qownerEmail,
                    'created_at' => Carbon::now(),
                    'created_by' => Auth::user()->userID,
                    'updated_at' => Carbon::now(),
                    'updated_by' => Auth::user()->userID,
                ]);
        } else {
            $idOwner = $re->qownerName;
        }

        //generate id hdr format = CST-ID CUST-PLAT-DDMMYY-HH:MM
        $generateDataHeaderID = 'CST-' . $idOwner . '-' . $re->qlicensePlate . '-' . Carbon::now()->isoFormat('DDMMYY') . '-' . Carbon::now()->isoFormat('HH:mm');

        $transactionDateOld = strtotime($re->qtransactionDate);
        $estimationDateOld = strtotime($re->qtransactionDate);

        $transactionDateNew = date('Y-m-d', $transactionDateOld);
        $estimationDateNew = date('Y-m-d', $estimationDateOld);

        $techLead = DB::select('SELECT tchLeadID FROM Technical_Lead WHERE STATUS = "T"');

        dd($re->toArray());

        $idNewTransaction = DB::table('hdr_transaction')
            ->insertGetId([
                'hdrTransactionID' => $generateDataHeaderID,
                'txnDate' => $transactionDateNew,
                'estimationDate' => $estimationDateNew,
                'custID' => $idOwner,
                'carID' => $re->qcarName,
                'techLeadID' => $techLead[0],
                'totalPayment' => $re->qtotalPayment,
                'created_at' => Carbon::now(),
                'created_by' => Auth::user()->userID,
                'updated_at' => Carbon::now(),
                'updated_by' => Auth::user()->userID,
            ]);

        dd($re->toArray());
        // qtransactionDate: transactionDate,
        // qestimationDate: estimationDate,
        // qcarCategory: carCategory,
        // qcarBrand: carBrand,
        // qcarName: carName,
        // qlicensePlate: licensePlate,
        // qmiles: miles,
        // qnewOwner: toggleSwitch,
        // qownerName: ownerName,
        // qownerAddress: ownerAddress,
        // qownerNumber: ownerNumber,
        // qownerEmail: ownerEmail,
        // dataComplaint: densoTableListofComplaintInputData_Obj_datas,
        // dataEstimation: densoTableListofEstimationCostInputData_Obj_datas,
        // dataServiceFee: densoTableListofServiceFeeInputData_Obj_datas,
        // dataMechanic: dataTableMechanic

    }

}
