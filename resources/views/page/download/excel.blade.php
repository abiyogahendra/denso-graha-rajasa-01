<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background-color: #ccc;
            padding: 8px;
            white-space: nowrap;
            /* Untuk mencegah teks panjang melarikan lebar kolom */
        }

        td {
            padding: 8px;
        }
    </style>
</head>

<body>
    <table style="width: 100%; border-collapse: collapse;">
        <thead style="background-color: grey;">
            <tr>
                <th style="padding: 8px;">Header Transaction ID</th>
                <th style="padding: 8px;">Transaction Date</th>
                <th style="padding: 8px;">Total Payment</th>
                <th style="padding: 8px;">Estimation Date</th>
                <th style="padding: 8px;">Car Name</th>
                <th style="padding: 8px;">Car Category</th>
                <th style="padding: 8px;">Car Brand</th>
                <th style="padding: 8px;">Car Frame Number</th>
                <th style="padding: 8px;">Car Engine Number</th>
                <th style="padding: 8px;">License Plate</th>
                <th style="padding: 8px;">Miles</th>
                <th style="padding: 8px;">Customer Name</th>
                <th style="padding: 8px;">Customer Address</th>
                <th style="padding: 8px;">Customer Email</th>
                <th style="padding: 8px;">Customer Number</th>
                <th style="padding: 8px;">Technical Lead</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataInvoice as $d)
                <tr>
                    <td style="padding: 8px;">{{ $d->hdrTransactionID }}</td>
                    <td style="padding: 8px;">{{ $d->txnDate }}</td>
                    <td style="padding: 8px;">{{ $d->total_payment }}</td>
                    <td style="padding: 8px;">{{ $d->estimationDate }}</td>
                    <td style="padding: 8px;">{{ $d->carName }}</td>
                    <td style="padding: 8px;">{{ $d->ctgName }}</td>
                    <td style="padding: 8px;">{{ $d->brndName }}</td>
                    <td style="padding: 8px;">{{ $d->carfrmNumber }}</td>
                    <td style="padding: 8px;">{{ $d->carEngnNumber }}</td>
                    <td style="padding: 8px;">{{ $d->licensePlate }}</td>
                    <td style="padding: 8px;">{{ $d->miles }}</td>
                    <td style="padding: 8px;">{{ $d->custName }}</td>
                    <td style="padding: 8px;">{{ $d->custAddress }}</td>
                    <td style="padding: 8px;">{{ $d->custEmail }}</td>
                    <td style="padding: 8px;">{{ $d->custNumber }}</td>
                    <td style="padding: 8px;">{{ $d->tchLeadName }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
