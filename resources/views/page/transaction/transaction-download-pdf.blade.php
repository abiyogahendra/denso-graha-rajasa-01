<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Print PDF</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Fontfaces CSS-->

    <style>
        body {
            font-size: 10px
        }

        fieldset {
            min-width: 0;
            padding: 0;
            margin: 0;
            border: 0;
            border-radius: 50%;
        }

        .color-fieldset {
            min-height: 120px;
            padding: 1rem 2rem;
            margin-bottom: 2.8rem;
            margin-top: 10px;
            border: 1.75px solid #707070;
            border-radius: 10px !important;
            -webkit-box-shadow: inset 0 1px 1px rgb(0 0 0 / 5%);
            box-shadow: inset 0 1px 1px rgb(0 0 0 / 5%);
        }

        .densoTableHeader td {
            border: 1px solid rgb(145, 141, 141);
            margin: 10px;
        }

        .densoTableHeader th {
            border: 1px solid rgb(145, 141, 141);
            margin: 10px;
        }


        .large-font {
            margin: 10px;
        }


        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .custom-hidding {
            display: none;
        }

        .display-block {
            display: contents !important;
        }

        .center {
            text-align: center;
        }

        .margin-bottom-0 {
            margin-bottom: 0px !important;
        }

        .margin-top-20 {
            margin-top: 20px !important;
        }

        .row {
            display: flex;
        }

        .width-headerWorkFlow {
            width: 150px;
        }
    </style>
</head>

<body class="animsition">
    <input type="hidden" name="" id="densoNumbertransaction" value="{{ $data->hdrTransactionID }}">

    <div class="content">
        <div class="container-fluid">
            <section class="statistic">
                <div class="row">
                    <div class="col-6">
                        <!-- RECENT REPORT 2-->
                        <div class="recent-report2">


                            <div class="row">
                                <table id="densoAtas">
                                    <tbody>
                                        <tr>
                                            <td style="width: 350px">
                                                <h3 class="title-3 bold"
                                                    style="margin-bottom: 0px !important;  font-size: 20px">Work
                                                    Order</h3>
                                            </td>
                                            <td style="width: 200px;">
                                                Nomor Transaksi
                                                <h6
                                                    style="margin-top: 7px !important; margin-bottom: 0px !important; font-size: 12px">
                                                    {{ $data->hdrTransactionID }}</h6>
                                            </td>
                                            <td style="width: 10vw;">
                                                Tanggal Transaksi
                                                <h6 style="margin-top: 7px !important; font-size: 12px; margin-bottom: 0px !important"
                                                    id="densoGenerateTanggalTransaction">{{ $data->txnDate }}</h6>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <hr>
                            {{-- table atas --}}
                            <div class="row" style="margin-left: auto; margin-right: auto">
                                <table class="densoTableHeader" style="border-collapse: collapse;">
                                    <tbody>
                                        <tr>
                                            <td style="width: 10vw">
                                                <div class="form-group large-font" style="text-align: center">
                                                    <label class="control-label">
                                                        License Plate
                                                    </label>
                                                    <h4
                                                        style="margin-top: 5px !important; margin-bottom: 0px !important">
                                                        {{ $data->licensePlate }}</h4>
                                                </div>
                                            </td>
                                            <td style="width: 15vw">
                                                <div class="form-group large-font center">
                                                    <label class="control-label center">
                                                        Nama Kendaraan
                                                    </label>
                                                    <h4
                                                        style="margin-top: 5px !important; margin-bottom: 0px !important">
                                                        {{ $data->carName }}</h4>
                                                </div>
                                            </td>
                                            <td style="width: 15vw">
                                                <div class="form-group large-font center">
                                                    <label class="control-label center">
                                                        Brand Kendaraan
                                                    </label>
                                                    <h4
                                                        style="margin-top: 5px !important; margin-bottom: 0px !important">
                                                        {{ $data->brndName }}</h4>
                                                </div>
                                            </td>
                                            <td style="width: 130px">
                                                <div class="form-group large-font center">
                                                    <label class="control-label center">
                                                        Tipe Kendaraan
                                                    </label>
                                                    <h4
                                                        style="margin-top: 5px !important; margin-bottom: 0px !important">
                                                        {{ $data->ctgName }}</h4>
                                                </div>
                                            </td>
                                            <td style="width: 150px">
                                                <div class="form-group large-font center">
                                                    <label class="control-label center">
                                                        Tahun Kendaraan
                                                    </label>
                                                    <br>
                                                    <h4
                                                        style="margin-top: 5px !important; margin-bottom: 0px !important">
                                                        -
                                                    </h4>
                                                </div>
                                            </td>
                                            <td style="width: 10vw">
                                                <div class="form-group large-font center">
                                                    <label class="control-label center">
                                                        Kilometer
                                                    </label>
                                                    <h4
                                                        style="margin-top: 5px !important; margin-bottom: 0px !important">
                                                        {{ $data->miles }}</h4>
                                                </div>
                                            </td>
                                            <td style="width: 10vw">
                                                <div class="form-group large-font center">
                                                    <label class="control-label center">
                                                        Hour Meter
                                                    </label>
                                                    <h4
                                                        style="margin-top: 5px !important; margin-bottom: 0px !important">
                                                        -</h4>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 2vw" rowspan="2" colspan="2">
                                                <div class="form-group large-font ">
                                                    <label class="control-label "
                                                        for="transactionService_inpt_data_licensePlate">
                                                        Nomor Kerangka :
                                                    </label>
                                                    <h4>{{ $data->carfrmNumber }}</h4>
                                                    <hr>
                                                    <label class="control-label center"
                                                        for="transactionService_inpt_data_licensePlate">
                                                        Nomor Mesin :
                                                    </label>
                                                    <h4>{{ $data->carEngnNumber }}</h4>
                                                </div>
                                            </td>
                                            <td style="width: 2vw;" colspan="2">
                                                <div style="margin: 5px">
                                                    <label class="control-label center">
                                                        Nama Pemilik
                                                    </label>
                                                    <h4
                                                        style="margin-top: 10px !important; margin-bottom: 0px !important">
                                                        {{ $data->custName }}</h4>
                                                </div>
                                            </td>
                                            <td>
                                                <div style="margin: 5px">
                                                    <label class="control-label"
                                                        for="transactionService_inpt_data_licensePlate">
                                                        Nomor Telp.
                                                    </label>
                                                    <h4
                                                        style="margin-top: 10px !important; margin-bottom: 0px !important">
                                                        {{ $data->custNumber }}</h4>
                                                </div>
                                            </td>
                                            <td colspan="2" rowspan="2"
                                                style="vertical-align: top;column-width: 15vw;">
                                                <div style="margin: 5px">
                                                    <label class="""
                                                        for="transactionService_inpt_data_licensePlate">
                                                        Alamat
                                                    </label>
                                                    <br>
                                                    <h4
                                                        style="margin-top: 10px !important; margin-bottom: 0px !important">
                                                        {{ $data->custAddress }}</h4>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <div style="margin: 5px">
                                                    <label class="control-label center"
                                                        for="transactionService_inpt_data_licensePlate">
                                                        AC Dipasang di
                                                    </label>
                                                    <br>
                                                    <h4>..........</h4>
                                                </div>
                                            </td>
                                            <td>
                                                <div style="margin: 5px">
                                                    <label class="control-label center"
                                                        for="transactionService_inpt_data_licensePlate">
                                                        Masa
                                                    </label>
                                                    <br>
                                                    <table>
                                                        <tr>
                                                            <td style="border: none !important">
                                                                <h4
                                                                    style="margin-top: 5px !important; margin-bottom: 0px !important">
                                                                    &nbsp; - Garansi</h4>
                                                            </td>
                                                            <td style="border: none !important">
                                                                <h4
                                                                    style="margin-top: 5px !important; margin-bottom: 0px !important">
                                                                    &nbsp; - Compaign</h4>
                                                            </td>
                                                        </tr>
                                                    </table>


                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            {{-- complaint service --}}
                            <div class="row" style="margin-top: 10px">
                                <table>
                                    <tr>
                                        <td style="margin-top: 0px !important; vertical-align: top">
                                            <div>
                                                <table class="densoTableHeader" style="border-collapse: collapse;">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 190px">
                                                                Complaint</th>
                                                            <th style="width: 170px">
                                                                Handling</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($dataComplaint as $p)
                                                            <tr>
                                                                <td style="width: 10vw">
                                                                    {{ $p->complaint }}
                                                                </td>
                                                                <td style="width: 150px">
                                                                    {{ $p->measure }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td style="margin-top: 0px !important; vertical-align: top">
                                            <div>
                                                <table class="densoTableHeader" style="border-collapse: collapse;">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 170px">
                                                                Service Description</th>
                                                            <th style="width: 150px">Price</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($dataService as $d)
                                                            <tr>
                                                                <td style="width: 10vw">
                                                                    {{ $d->n }}
                                                                </td>
                                                                <td style="width: 15vw">
                                                                    {{ $d->c }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            {{-- part estimation cost --}}
                            <div class="row " style="margin-top: 10px">
                                <table class="densoTableHeader" style="border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th style="width: 170px">Name Part</th>
                                            <th style="width: 125px">Part Number</th>
                                            <th style="width: 90px">Quantity</th>
                                            <th style="width: 150px">Price</th>
                                            <th style="width: 150px">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dataEstimation as $f)
                                            
                                        
                                        <tr>
                                            <td>
                                               {{$f->name}}
                                            </td>
                                            <td>
                                                {{$f->partNumber}}
                                            </td>
                                            <td>
                                                {{$f->qty}}
                                            </td>
                                            <td>
                                                {{$f->price}}
                                            </td>
                                            <td>
                                                {{$f->totalRP}}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{-- total biaya keseluruhan --}}
                            <div class="row" style="margin-top: 20px">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="control-label" for="transactionService_inpt_data_licensePlate">
                                            Total biaya keseluruhan
                                        </label>
                                        <br>
                                        <h3 class="title-3 bold" id="densoDataTotalGross">{{$dataSum->dataSum}}</h3>
                                    </div>
                                </div>
                            </div>
                            {{-- total biaya keseluruhan + PPN --}}
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="control-label" for="transactionService_inpt_data_licensePlate">
                                            Total biaya keseluruhan + PPN 11 %
                                        </label>
                                        <br>
                                        <h3 class="title-3 bold" id="densoDataTotalFinal">{{$dataSum->dataPPN}}</h3>
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="padding: 20px">
                                <table>
                                    <tr>
                                        <td style="width: 450px">
                                            <table class="densoTableHeader"
                                                style="border: 1px solid silver; align-content: center;border-collapse: collapse;">
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 80px">
                                                            <div class="form-group large-font center">
                                                                <label class="control-label center">
                                                                    Frontman
                                                                </label>
                                                                <br>
                                                                <br>
                                                                <br>
                                                                <br>
                                                            </div>
                                                        </td>
                                                        <td style="width: 80px">
                                                            <div class="form-group large-font center">
                                                                <label class="control-label center">
                                                                    Mechanic
                                                                </label>
                                                                <br>
                                                                <br>
                                                                <br>
                                                                <br>
                                                            </div>
                                                        </td>
                                                        <td style="width: 80px">
                                                            <div class="form-group large-font center">
                                                                <label class="control-label center"
                                                                    for="transactionService_inpt_data_licensePlate">
                                                                    Leader
                                                                </label>
                                                                <br>
                                                                <br>
                                                                <br>
                                                                <br>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col center">
                                                    .........................................................................
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col center">Pemberi Order</div>
                                            </div>
                                            <br>
                                            <br>
                                            <br>
                                            <div class="row">
                                                <div class="col center">
                                                    .........................................................................
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>



                            </div>
                            <!-- END RECENT REPORT 2             -->
                        </div>
                        <br>

                    </div>
            </section>
        </div>
    </div>


    <!-- Jquery JS-->
    <script src="{{ asset('template/vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('template/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    {{-- Boostrap-Table-JS --}}
    <script src="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table.min.js"></script>
    <!-- Vendor JS       -->

    <!-- Main JS-->
    {{-- <script src="{{ asset('template/js/main.js') }}"></script> --}}

    {{-- Custom Java Script --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
        integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        let densoTableListofComplaintInputDataUpdate_Obj_datas_update = [];
        let densoTableListofEstimationCostInputDataUpdate_Obj_datas_update = [];
        let densoTableListofServiceFeeInputDataUpdate_Obj_datas_update = [];
        let densoTotalGross = 0;

        $(document).ready(function() {
            $('#denso_transactiont01_collabse_filter').click();
            densoTableListALLDataTableGenerate();
        })

        $('.datepickermmm').datepicker({
            format: 'dd-MM-yyyy'
        });

        function formatRupiah(value, row, index) {
            let number_string = value;
            let split = String(number_string).split(',');
            let sisa = split[0].length % 3;
            let rupiah = split[0].substr(0, sisa);
            let ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return 'Rp. ' + rupiah + ',-';
        }

        function densoTableListALLDataTableGenerate() {


            $.ajax({
                url: '/transaction/load-data-detail-transaction-service-table-complaint',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    number: $('#densoNumbertransaction').val()
                },
                type: 'post',
                async: false,
                dataType: 'json',
                success: function(respon) {
                    densoTableListofComplaintInputDataUpdate_Obj_datas_update = respon;
                    $('#densoTableListofComplaintInputDataUpdate').bootstrapTable('load',
                        densoTableListofComplaintInputDataUpdate_Obj_datas_update);

                }
            })

            $.ajax({
                url: '/transaction/load-data-detail-transaction-service-table-estimation-cost',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    number: $('#densoNumbertransaction').val()
                },
                async: false,
                type: 'post',
                dataType: 'json',
                success: function(respon) {
                    densoTableListofEstimationCostInputDataUpdate_Obj_datas_update = respon;
                    $('#densoTableListofEstimationCostInputDataUpdate').bootstrapTable(
                        'load',
                        densoTableListofEstimationCostInputDataUpdate_Obj_datas_update);

                    for (let i in respon) {
                        densoTotalGross = densoTotalGross + respon[i].total
                    }
                }
            })

            $.ajax({
                url: '/transaction/load-data-detail-transaction-service-table-service-fee',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    number: $('#densoNumbertransaction').val()
                },
                type: 'post',
                async: false,
                dataType: 'json',
                success: function(respon) {
                    densoTableListofServiceFeeInputDataUpdate_Obj_datas_update = respon;
                    $('#densoTableListofServiceFeeInputDataUpdate').bootstrapTable('load',
                        densoTableListofServiceFeeInputDataUpdate_Obj_datas_update);
                    for (let i in respon) {
                        densoTotalGross = densoTotalGross + respon[i].price
                    }
                }
            })

            let dataRupiasGross = formatRupiah(densoTotalGross, 0, 0);

            $('#densoDataTotalGross').html(dataRupiasGross);
            let dataRupiasFinal = densoTotalGross + (parseInt(densoTotalGross * 11 / 100));

            $('#densoDataTotalFinal').html(formatRupiah(dataRupiasFinal, 0, 0));
        }



        function densoTableListofMechanicInputDataGenerateData(params) {
            var url = 'master/master-add-transaction-mechanic'
            $.get(url + '?' + $.param(params.data)).then(function(res) {
                params.success(res)
                console.log(res)
            })
        }
    </script>

</body>

</html>
