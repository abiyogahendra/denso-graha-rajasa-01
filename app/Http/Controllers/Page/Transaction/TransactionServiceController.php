<?php

namespace App\Http\Controllers\Page\Transaction;

use App\Http\Controllers\Controller;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use PDF;

class TransactionServiceController extends Controller
{

    public function TransactionServiceIndex()
    {
        return view('page.transaction.list-of-transaction');
    }

    public function TransactionServicePrintPDF(String $d)
    {

        $dataMaster = DB::select('SELECT
        H.`hdrTransactionID`,
        DATE_FORMAT(H.txnDate,"%e-%M-%Y") txnDate,
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
        INNER JOIN car_brand CB ON M.`brandID` = CB.`brandID` where H.hdrTransactionID = ?', [$d]);

        $dataComplaint = DB::select('SELECT complaint, measure FROM dtl_cmpln_txn WHERE `hdrTxnID` = ?', [$d]);

        $dataEstimation = DB::select('SELECT CONCAT(partName,partNumber,qty,totalCost) d, partName name, partNumber partNumber, qty,
        CONCAT("RP. ", FORMAT(totalCost,2,"id_ID")) price, (totalCost * qty) total, CONCAT("RP. ", FORMAT((totalCost * qty),2,"id_ID")) totalRP FROM dtl_cost_txn WHERE hdrTxnID = ?', [$d]);
        $dataService = DB::select('SELECT CONCAT(`srvcName`,`srvcCost`) d, srvcName n, CONCAT("RP. ", FORMAT(srvcCost,2,"id_ID")) c FROM dtl_srvc_cost_txn WHERE hdrTxnID = ?', [$d]);

        $dataSum = DB::select('WITH sumdatacost AS
        (SELECT SUM(totalCost * qty) jumlah FROM dtl_cost_txn WHERE hdrTxnID = ? ),
        sumdataservice AS (SELECT SUM(srvcCost) jumlah FROM dtl_srvc_cost_txn WHERE hdrTxnID = ?),
        sumalldata AS (SELECT (SELECT * FROM sumdatacost) + (SELECT * FROM sumdataservice) jumlah FROM DUAL)
        SELECT CONCAT("RP. ", FORMAT((SELECT * FROM sumalldata),2,"id_ID")) dataSum, CONCAT("RP. ", FORMAT(ROUND((SELECT * FROM sumalldata) + (((SELECT * FROM sumalldata)) * 11 / 100)),2,"id_ID")) dataPPN FROM DUAL', [$d, $d]);
        // return view('page.transaction.transaction-download-pdf', ['data' => $dataMaster[0]]);
        // dd($dataSum);
        $pdf = PDF::loadview('page.transaction.transaction-download-pdf', [
            'data' => $dataMaster[0],
            'dataComplaint' => $dataComplaint,
            'dataEstimation' => $dataEstimation,
            'dataService' => $dataService,
            'dataSum' => $dataSum[0],
        ])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('a4', 'potrait');
        return $pdf->stream();
    }

    public function GetQueryDataTable(String $query, Request $req)
    {
        $dataSort = null;
        $dataSearch = null;
        $dataOrder = null;
        $dataLimit = null;
        $dataOffset = null;

        if ($req->search['CARNAME'] != null ||
            $req->search['LICENSE'] ||
            $req->search['STARDATE'] ||
            $req->search['ENDDATE'] ||
            $req->search['FRAME'] ||
            $req->search['ENGINE'] ||
            $req->search['OWNER']

        ) {
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
            if ($req->search['FRAME'] != null) {
                $query = $query . 'AND H.`carfrmNumber` = "' . $req->search['FRAME'] . '"';
            }
            if ($req->search['ENGINE'] != null) {
                $query = $query . 'AND H.`carEngnNumber` = "' . $req->search['ENGINE'] . '"';
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
        // dd($query);
        return $query;

    }

    public function GetDataListTransactionService(Request $table)
    {

        $query = 'SELECT H.`hdrTransactionID` number, H.licensePlate, H.`txnDate`, C.`custName`, M.carName, H.carEngnNumber, H.carFrmNumber, H.miles FROM hdr_transaction H INNER JOIN customer C ON H.`custID` = C.`customerID` INNER JOIN car_maintain_brand_category M ON H.`carID` = M.carMaintainID';

        $countDataUser = DB::select('select count(*) jumlah FROM hdr_transaction');
        $newQuery = $this->GetQueryDataTable($query, $table);
        // try {

        $dataUser = DB::select($newQuery);
        //code...
        // } catch (\Throwable $th) {
        //     return response()->json([
        //         'gagal' => 404,
        //     ]);
        // }
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

        
        $idOwner = 0;
        if ($re->qnewOwner == 'F') {

            try {
                //code...
                $dataGmailExisting = DB::select('SELECT custEmail FROM customer WHERE custEmail LIKE ?', [$re->qownerEmail]);
                if($dataGmailExisting.length > 0){
                    return response()->json(['message' => 'Email is existing'], 500);
                }
            } catch (\Throwable $th) {
                return response()->json(['message' => 'error while processing data'], 500);
            }

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
        $estimationDateOld = strtotime($re->qestimationDate);

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
                'hourMeter' => $re->qhourMeter,
                'carYear' => $re->qcarYear,
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
                        'totalCost' => $f['price'],
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
            return response()->json(['message' => $th], 500);
        }

        DB::commit();

        return response()->json("sukses", 200);

    }

    public function GetALLDataTableTransactionComplaintEstimationandService(Request $re)
    {
        $dataComplaint = DB::select('SELECT CONCAT(complaint , measure) DATACONCAT, complaint, measure FROM dtl_cmpln_txn WHERE `hdrTxnID` = ?', [$re->number]);
        $dataEstimation = DB::select('SELECT CONCAT(partName,partNumber,qty,totalCost) d, partName na, partNumber nu, qty, totalCost FROM dtl_cost_txn WHERE hdrTxnID = ?', [$re->number]);
        $dataService = DB::select('SELECT CONCAT(`srvcName`,`srvcCost`) d, srvcName n, srvcCost c FROM dtl_srvc_cost_txn WHERE hdrTxnID = ?', [$re->number]);
        return response()->json([
            'dataComplaint' => $dataComplaint,
            'dataEstimation' => $dataEstimation,
            'dataService' => $dataService,
        ], 200);
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

    public function GetDataDetailServiceTransactionModalTableComplaint(Request $re)
    {
        try {
            //code...

            $dataDetail = DB::select('SELECT CONCAT(complaint , "-" , measure) concat, complaint, measure handling FROM dtl_cmpln_txn WHERE `hdrTxnID` = ?', [$re->number]);

            return response()->json($dataDetail, 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json("Gagal", 500);
        }
    }

    public function GetDataDetailServiceTransactionModalTableEstimationCost(Request $re)
    {
        try {
            //code...

            $dataDetail = DB::select('SELECT CONCAT(partName,partNumber,qty,totalCost) concat, partName name, partNumber, qty, totalCost price, (qty*totalCost) total FROM dtl_cost_txn WHERE hdrTxnID = ?', [$re->number]);

            return response()->json($dataDetail, 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json("Gagal", 500);
        }
    }

    public function GetDataDetailServiceTransactionModalTableServiceFee(Request $re)
    {
        try {
            //code...

            $dataDetail = DB::select('SELECT CONCAT(`srvcName`,`srvcCost`) concat, srvcName description, srvcCost price FROM dtl_srvc_cost_txn WHERE hdrTxnID = ?', [$re->number]);

            return response()->json($dataDetail, 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json("Gagal", 500);
        }
    }

    public function GetDataDetailServiceTransactionModalTableMechanic(Request $re)
    {
        try {
            //code...

            $dataDetail = DB::select('SELECT mechID FROM dtl_mchnc_txn WHERE `hdrTxnID` = ?', [$re->number]);

            return response()->json($dataDetail, 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json("Gagal", 500);
        }
    }

    public function UpdateTransactionService(Request $re)
    {

        $transactionDateOld = strtotime($re->qtransactionDate);
        $estimationDateOld = strtotime($re->qestimationDate);

        $transactionDateNew = date('Y-m-d', $transactionDateOld);
        $estimationDateNew = date('Y-m-d', $estimationDateOld);

        DB::beginTransaction();
        try {

            DB::table('hdr_transaction')
                ->where('hdrTransactionID', $re->number)
                ->update([
                    'txnDate' => $transactionDateNew,
                    'estimationDate' => $estimationDateNew,
                    'updated_by' => Auth::user()->userID,
                    'updated_at' => Carbon::now(),
                ]);

            DB::table('dtl_cmpln_txn')->where('hdrTxnID', '=', $re->number)->delete();

            //code...
            foreach ($re->dataComplaint as $key => $d) {
                $idNewDataComplaint = DB::table('dtl_cmpln_txn')
                    ->insertGetId([
                        'cmplntID' => $key,
                        'hdrTxnID' => $re->number,
                        'complaint' => $d['complaint'],
                        'measure' => $d['handling'],
                        'created_at' => Carbon::now(),
                        'created_by' => Auth::user()->userID,
                        'updated_at' => Carbon::now(),
                        'updated_by' => Auth::user()->userID,
                    ]);
                # code...
            }

            DB::table('dtl_cost_txn')->where('hdrTxnID', '=', $re->number)->delete();

            foreach ($re->dataEstimation as $key => $f) {
                # code...
                DB::table('dtl_cost_txn')
                    ->insertGetId([
                        'costID' => $key,
                        'hdrTxnID' => $re->number,
                        'partName' => $f['name'],
                        'partNumber' => $f['partNumber'],
                        'qty' => $f['qty'],
                        'totalCost' => $f['price'],
                        'created_at' => Carbon::now(),
                        'created_by' => Auth::user()->userID,
                        'updated_at' => Carbon::now(),
                        'updated_by' => Auth::user()->userID,
                    ]);
            }

            DB::table('dtl_srvc_cost_txn')->where('hdrTxnID', '=', $re->number)->delete();

            foreach ($re->dataServiceFee as $key => $g) {
                # code...
                DB::table('dtl_srvc_cost_txn')
                    ->insertGetId([
                        'srvcID' => $key,
                        'hdrTxnID' => $re->number,
                        'srvcName' => $g['description'],
                        'srvcCost' => $g['price'],
                        'created_at' => Carbon::now(),
                        'created_by' => Auth::user()->userID,
                        'updated_at' => Carbon::now(),
                        'updated_by' => Auth::user()->userID,
                    ]);
            }

            DB::table('dtl_mchnc_txn')->where('hdrTxnID', '=', $re->number)->delete();

            foreach ($re->dataMechanic as $key => $g) {
                # code...
                $idNewDataEstimationCost = DB::table('dtl_mchnc_txn')
                    ->insertGetId([
                        'mechID' => $g['no'],
                        'hdrTxnID' => $re->number,
                        'created_at' => Carbon::now(),
                        'created_by' => Auth::user()->userID,
                        'updated_at' => Carbon::now(),
                        'updated_by' => Auth::user()->userID,
                    ]);
            }

        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json(['message' => 'error while processing data'], 500);
        }

        DB::commit();

        return response()->json("sukses", 200);

    }
}
