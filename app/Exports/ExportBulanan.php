<?php

namespace App\Exports;

use DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportBulanan implements FromView, WithStyles, ShouldAutoSize
{

    protected $params;

    public function __construct($params)
    {
        $this->params = $params;
    }

    public function styles(Worksheet $sheet)
    {
        $styles = [];

        // Style the first row as bold text.
        $styles[1] = [
            'font' => ['bold' => true], // Teks tebal
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['argb' => 'CCCCCC'], // Latar belakang abu-abu
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN, // Garis tipis
                    'color' => ['argb' => '000000'], // Warna hitam
                ],
            ],
        ];

        // Apply the same border style to all rows.
        $rowCount = $sheet->getHighestRow();
        for ($row = 2; $row <= $rowCount; $row++) {
            $styles[$row] = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN, // Garis tipis
                        'color' => ['argb' => '000000'], // Warna hitam
                    ],
                ],
            ];
        }

        return $styles;
    }

    public function view(): View
    {
        $month = $this->params;
        list($monthName, $year) = explode("-", $month);

        $monthNumber = date('m', strtotime($monthName));

        $data = [$monthNumber, (int) $year];

        $dataDB = DB::select('SELECT
        H.hdrTransactionID,
        DATE_FORMAT(H.txnDate,"%e-%M-%Y") txnDate,
        CONCAT("RP. ", FORMAT(totalPayment,2,"id_ID")) total_payment,
        H.estimationDate,
        M.carName,
        CC.ctgName,
        CB.brndName,
        H.carfrmNumber,
        H.carEngnNumber,
        H.licensePlate,
        H.miles,
        C.custName,
        C.custAddress,
        C.custEmail,
        C.custNumber,
        tech.tchLeadName
        FROM hdr_transaction H
        INNER JOIN technical_lead tech ON H.techLeadID = tech.tchLeadID
        INNER JOIN customer C ON H.custID = C.customerID
        INNER JOIN car_maintain_brand_category M ON H.carID = M.carMaintainID
        INNER JOIN car_category CC ON M.ctgryID = CC.categoryID
        INNER JOIN car_brand CB ON M.brandID = CB.brandID WHERE MONTH(H.txnDate) = MONTH(?)', [$data[1] . '-' . $data[0] . '-1']);
        return view('page.download.excel', [
            'dataInvoice' => $dataDB,
        ]);
    }
}
