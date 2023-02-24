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
    public function GetQueryDataTable(String $query, Request $req)
    {
        $dataSort = null;
        $dataSearch = null;
        $dataOrder = null;
        $dataLimit = null;
        $dataOffset = null;

        if ($req->search['CARNAME'] != null || $req->search['LICENSE'] || $req->search['STARDATE'] || $req->search['ENDDATE'] || $req->search['OWNER']) {
            $query = $query . ' WHERE 1 = 1 ';
            if ($req->search['CARNAME'] != null) {
                $query = $query . 'AND H.`carID` = "' . $req->search['CARNAME'] . '"';
            }
            if ($req->search['LICENSE'] != null) {
                $query = $query . 'AND H.`licensePlate` = "' . $req->search['LICENSE'] . '"';
            }
            if ($req->search['STARDATE'] != null) {
                $startDate = strtotime($req->search['STARDATE']);

                $startDateNew = date('Y-m-d', $startDate);

                $query = $query . 'AND H.txnDate >= "' . $startDateNew . '"';
            }
            if ($req->search['ENDDATE'] != null) {
                $endDate = strtotime($req->search['ENDDATE']);

                $endDateNew = date('Y-m-d', $endDate);

                $query = $query . 'AND H.txnDate <= "' . $endDateNew . '"';
            }
            if ($req->search['OWNER'] != null) {
                $query = $query . 'AND H.`custID` = "' . $req->search['OWNER'] . '"';
            }
        }

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

    public function GetDataListTransactionService(Request $table)
    {

        $query = 'SELECT H.`hdrTransactionID` number, H.licensePlate, H.`txnDate`, C.`custName`, M.carName, H.carEngnNumber, H.carFrmNumber, H.miles FROM hdr_transaction H INNER JOIN CUSTOMER C ON H.`custID` = C.`customerID` INNER JOIN CAR_MAINTAIN_BRAND_CATEGORY M ON H.`carID` = M.carMaintainID';

        $countDataUser = DB::select('select count(*) jumlah FROM hdr_transaction');
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

    public function TransactionServiceAddIndex()
    {
        return view('page.transaction.add-transaction');
    }

    public function CreateNewTransactionService(Request $re)
    {

        // try {
        $idOwner = 0;
        if ($re->qnewOwner == 'F') {
            $idOwner = DB::table('customer')
                ->insertGetId([
                    'custName' => $re->qownerName,
                    'custAddress' => $re->qownerAddress,
                    'custEmail' => $re->qownerEmail,
                    'custNumber' => $re->qownerNumber,
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

        $techLead = DB::select('SELECT tchLeadID FROM technical_lead WHERE STATUS = "T"');

        $idNewTransaction = DB::table('hdr_transaction')
            ->insertGetId([
                'hdrTransactionID' => $generateDataHeaderID,
                'txnDate' => $transactionDateNew,
                'estimationDate' => $estimationDateNew,
                'custID' => $idOwner,
                'carID' => $re->qcarName,
                'carEngnNumber' => $re->qengnNumber,
                'carFrmNumber' => $re->qfrmNumber,
                'miles' => $re->qmiles,
                'licensePlate' => $re->qlicensePlate,
                'techLeadID' => $techLead[0]->tchLeadID,
                'totalPayment' => $re->qtotalPayment,
                'created_at' => Carbon::now(),
                'created_by' => Auth::user()->userID,
                'updated_at' => Carbon::now(),
                'updated_by' => Auth::user()->userID,
            ]);

        // create data list of complaint
        DB::beginTransaction();
        try {
            //code...

            foreach ($re->dataComplaint as $key => $d) {
                $idNewDataComplaint = DB::table('dtl_cmpln_txn')
                    ->insertGetId([
                        'cmplntID' => $key,
                        'hdrTxnID' => $generateDataHeaderID,
                        'complaint' => $d['complaint'],
                        'measure' => $d['handling'],
                        'created_at' => Carbon::now(),
                        'created_by' => Auth::user()->userID,
                        'updated_at' => Carbon::now(),
                        'updated_by' => Auth::user()->userID,
                    ]);
                # code...
            }

            //create data estimation
            foreach ($re->dataEstimation as $key => $f) {
                # code...
                $idNewDataEstimationCost = DB::table('dtl_cost_txn')
                    ->insertGetId([
                        'costID' => $key,
                        'hdrTxnID' => $generateDataHeaderID,
                        'partName' => $f['name'],
                        'partNumber' => $f['partNumber'],
                        'qty' => $f['qty'],
                        'totalCost' => $f['total'],
                        'created_at' => Carbon::now(),
                        'created_by' => Auth::user()->userID,
                        'updated_at' => Carbon::now(),
                        'updated_by' => Auth::user()->userID,
                    ]);
            }

            // create data service fee
            foreach ($re->dataServiceFee as $key => $g) {
                # code...
                $idNewDataEstimationCost = DB::table('dtl_srvc_cost_txn')
                    ->insertGetId([
                        'srvcID' => $key,
                        'hdrTxnID' => $generateDataHeaderID,
                        'srvcName' => $g['description'],
                        'srvcCost' => $g['price'],
                        'created_at' => Carbon::now(),
                        'created_by' => Auth::user()->userID,
                        'updated_at' => Carbon::now(),
                        'updated_by' => Auth::user()->userID,
                    ]);
            }

            // create data mechanic fee
            foreach ($re->dataMechanic as $key => $g) {
                # code...
                $idNewDataEstimationCost = DB::table('dtl_mchnc_txn')
                    ->insertGetId([
                        'mechID' => $g['no'],
                        'hdrTxnID' => $generateDataHeaderID,
                        'created_at' => Carbon::now(),
                        'created_by' => Auth::user()->userID,
                        'updated_at' => Carbon::now(),
                        'updated_by' => Auth::user()->userID,
                    ]);
            }

        } catch (\Throwable $th) {
            DB::rollback();
            if ($re->qnewOwner == 'F') {
                DB::delete('delete from hdr_transaction where hdrTransactionID = ? ', [$generateDataHeaderID]);
                DB::delete('delete from customer where customerID = ?', [$idOwner]);
            } else {
                DB::delete('delete from hdr_transaction where hdrTransactionID = ? ', [$generateDataHeaderID]);
            }
            return response()->json($th, 500);
        }

        DB::commit();

        return response()->json("sukses", 200);

    }

    public function GetDataDetailServiceTransactionModal(Request $re)
    {

        try {
            //code...

            $dataDetail = DB::select('SELECT
                H.`txnDate`,
                H.`estimationDate`,
                M.`carName`,
                CC.`ctgName`,
                CB.`brndName`,
                H.`carfrmNumber`,
                H.`carEngnNumber`,
                H.`licensePlate`,
                H.`miles`,
                C.`custName`,
                C.`custAddress`,
                C.`custEmail`,
                C.`custNumber`
                FROM hdr_transaction H
                INNER JOIN customer C ON H.`custID` = C.`customerID`
                INNER JOIN car_maintain_brand_category M ON H.`carID` = M.carMaintainID
                INNER JOIN car_category CC ON M.`ctgryID` = CC.`categoryID`
                INNER JOIN car_brand CB ON M.`brandID` = CB.`brandID` where H.hdrTransactionID = ?', [$re->number]);

            return response()->json($dataDetail[0], 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json("Gagal", 500);
        }
    }

}
