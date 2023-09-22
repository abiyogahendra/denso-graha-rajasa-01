<?php

namespace App\Http\Controllers\Page\Transaction;

use App\Exports\ExportBulanan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DownloadMonthlyReport extends Controller
{

    public function MonthlyReportIndexInput(Request $request)
    {
        return view('page.download.downloadmonthly');

    }

    public function MonthlyDataExcelGenerate($r)
    {
        return Excel::download(new ExportBulanan($r), $r . '.xlsx');
    }

    public function dataViewDownload()
    {
        return view('page.download.excel');
    }
}
