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

    <!-- Fontfaces CSS-->
    <link href="{{ asset('template/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('template/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet"
        media="all">
    <link href="{{ asset('template/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet"
        media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('template/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    {{-- Boostrap-table --}}
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table.min.css">

    <!-- Vendor CSS-->


    <!-- Main CSS-->
    <link href="{{ asset('template/css/theme.css') }}" rel="stylesheet" media="all">


    {{-- Custom css --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
        integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
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

        tr td {
            border: 1px solid silver;
            margin: 10px;
        }

        .large-font {
            margin: 20px;
        }

        .color-legend {
            display: flex;
            justify-content: center;
            font-size: 14px;
            width: 200px;
            padding: 5px 10px 5px 10px;
            margin-bottom: 0;
            line-height: inherit;
            color: #333;
            background: #f1f1f1;
            border: 1.75px solid #707070;
            border-radius: 5px !important;
            box-shadow: inset 0 1px 1px rgb(0 0 0 / 5%);
            -webkit-box-shadow: inset 0 1px 1px rgb(0 0 0 / 5%);
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
            border-radius: 25px !important;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
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
    </style>
</head>

<body class="animsition">


    <div class="content">
        <div class="container-fluid">
            <section class="statistic">
                <div class="row">
                    <div class="col-12">
                        <!-- RECENT REPORT 2-->
                        <div class="recent-report2">
                            <h3 class="title-3">Work Order</h3>
                            <hr>
                            {{-- Filter --}}
                            <div class="row justify-content-md-center" style="padding: 20px">
                                <div class="col-11">
                                    <table style="border: 1px solid silver; align-content: center">
                                        <tbody style="border: 1px solid silver">
                                            <tr>
                                                <td style="width: 10vw">
                                                    <div class="form-group large-font">
                                                        <label class="control-label"
                                                            for="transactionService_inpt_data_licensePlate">
                                                            License Plate
                                                        </label>
                                                        <br>
                                                        <h4>asda</h4>
                                                    </div>
                                                </td>
                                                <td style="width: 15vw">
                                                    <div class="form-group large-font center">
                                                        <label class="control-label center"
                                                            for="transactionService_inpt_data_licensePlate">
                                                            Nama Kendaraan
                                                        </label>
                                                        <br>
                                                        <h4>asda</h4>
                                                    </div>
                                                </td>
                                                <td style="width: 15vw">
                                                    <div class="form-group large-font center">
                                                        <label class="control-label center"
                                                            for="transactionService_inpt_data_licensePlate">
                                                            Brand Kendaraan
                                                        </label>
                                                        <br>
                                                        <h4>asda</h4>
                                                    </div>
                                                </td>
                                                <td style="width: 15vw">
                                                    <div class="form-group large-font center">
                                                        <label class="control-label center"
                                                            for="transactionService_inpt_data_licensePlate">
                                                            Tipe Kendaraan
                                                        </label>
                                                        <br>
                                                        <h4>asda</h4>
                                                    </div>
                                                </td>
                                                <td style="width: 10vw">
                                                    <div class="form-group large-font center">
                                                        <label class="control-label center"
                                                            for="transactionService_inpt_data_licensePlate">
                                                            Tahun Kendaraan
                                                        </label>
                                                        <br>
                                                        <h4>-</h4>
                                                    </div>
                                                </td>
                                                <td style="width: 10vw">
                                                    <div class="form-group large-font center">
                                                        <label class="control-label center"
                                                            for="transactionService_inpt_data_licensePlate">
                                                            Kilometer
                                                        </label>
                                                        <br>
                                                        <h4>-</h4>
                                                    </div>
                                                </td>
                                                <td style="width: 10vw">
                                                    <div class="form-group large-font center">
                                                        <label class="control-label center"
                                                            for="transactionService_inpt_data_licensePlate">
                                                            Hour Meter
                                                        </label>
                                                        <br>
                                                        <h4>-</h4>
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
                                                        <h4>-</h4>
                                                        <hr>
                                                        <label class="control-label center"
                                                            for="transactionService_inpt_data_licensePlate">
                                                            Nomor Mesin :
                                                        </label>
                                                        <h4>-</h4>
                                                    </div>
                                                </td>
                                                <td style="width: 2vw;" colspan="2">
                                                    <div style="margin: 0.5vw">
                                                        <label class="control-label center"
                                                            for="transactionService_inpt_data_licensePlate">
                                                            Nama Pemilik
                                                        </label>
                                                        <br>
                                                        <h4>Abiyoga Hendra Wijaya</h4>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div style="margin: 10px">
                                                        <label class="control-label"
                                                            for="transactionService_inpt_data_licensePlate">
                                                            Nomor Telp.
                                                        </label>
                                                        <br>
                                                        <h4>082154926473/082154926473</h4>
                                                    </div>
                                                </td>
                                                <td colspan="2" rowspan="2">
                                                    <div style="margin: 1px">
                                                        <label class="""
                                                            for="transactionService_inpt_data_licensePlate">
                                                            Alamat
                                                        </label>
                                                        <br>
                                                        <h4>Abiyoga Hendra Wijaya</h4>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <div style="margin: 0.5vw">
                                                        <label class="control-label center"
                                                            for="transactionService_inpt_data_licensePlate">
                                                            AC Dipasang di
                                                        </label>
                                                        <br>
                                                        <h4>..........</h4>
                                                    </div>
                                                </td>

                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                        <!-- END RECENT REPORT 2             -->
                    </div>

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
    <script src="{{ asset('template/js/main.js') }}"></script>

    {{-- Custom Java Script --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
        integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        let densoTableListofComplaintInputData_Obj_datas = [];
        let densoTableListofEstimationCostInputData_Obj_datas = [];
        let densoTableListofServiceFeeInputData_Obj_datas = [];

        $(document).ready(function() {
            densoSelectedListofExistingOwnerInputDataGenerateData();

            $('#transactionService_inpt_data_userSelect').change(function() {
                let toggleSwitch = 'N'
                if ($('#transactionService_inpt_data_userSelect').is(":checked")) {
                    toggleSwitch = "T";
                } else {
                    toggleSwitch = "F";
                }
                if (toggleSwitch == 'T') {
                    $('.densoDataOwnerService_selected').removeClass('custom-hidding');
                    $('#densoPartOfNewOwnerService_div').addClass('custom-hidding')
                }
                if (toggleSwitch == 'F') {
                    $('.densoDataOwnerService_selected').removeClass('custom-hidding');
                    $('#densoPartOfExistingOwnerService_div').addClass('custom-hidding')
                }
            })
        })

        function densoChangeTotalyOffAllTransactionInputDataGenerateData() {
            let totalCostofPart = parseInt($('#transactionService_inpt_data_TotalCostOfPart').val());
            let totalServiceFee = parseInt($('#transactionService_inpt_data_TotalCostOfService').val())
            let totalyOfAllTransaction = totalCostofPart + totalServiceFee;

            console.log(totalyOfAllTransaction);

            $('#transactionService_inpt_data_totalyOfAllTransaction').val(totalyOfAllTransaction);

            let totalyOfAllTransactionPlusPPN = totalyOfAllTransaction + (totalyOfAllTransaction * 11 /
                100);
            $('#transactionService_inpt_data_totalyOfAllTransactionPlusPPN').val(totalyOfAllTransactionPlusPPN);
        }

        $(document).ready(function() {
            $('#denso_transactiont01_collabse_filter').click();
        })

        $('.datepickermmm').datepicker({
            format: 'dd-MM-yyyy'
        });


        function densoTableListofComplaintInputData_InitAddDataTable_obj(obj) {
            if ($('#transactionService_inpt_tableComplaint_complaint').val() == '') {
                Swal.fire(
                    'Validation Failed', "Complaint cannot be empty", 'error'
                )
                return false;
            }
            if ($('#transactionService_inpt_tableComplaint_handling').val() == '') {
                Swal.fire(
                    'Validation Failed', "Handling cannot be empty", 'error'
                )
                return false;
            }

            let data_obj = {};
            data_obj.complaint = $('#transactionService_inpt_tableComplaint_complaint').val();
            data_obj.handling = $('#transactionService_inpt_tableComplaint_handling').val();
            data_obj.concat = $('#transactionService_inpt_tableComplaint_handling').val() + " - " + $(
                '#transactionService_inpt_tableComplaint_complaint').val();
            densoChangeTotalyOffAllTransactionInputDataGenerateData();
            densoTableListofComplaintInputData_Obj_datas.push(data_obj);
            $('#transactionService_inpt_tableComplaint_complaint').val('')
            $('#transactionService_inpt_tableComplaint_handling').val('')
            $('#densoTableListofComplaintInputData').bootstrapTable('refresh');
            $('#densoTableListofComplaintInputData').bootstrapTable('load', densoTableListofComplaintInputData_Obj_datas);

        }

        function densoTableListofServiceFeeInputData_InitAddDataTable_obj(obj) {
            if ($('#transactionService_inpt_tableServiceFee_description').val() == '') {
                Swal.fire(
                    'Validation Failed', "Service Name cannot be empty", 'error'
                )
                return false;
            }
            if ($('#transactionService_inpt_tableServiceFee_price').val() == '') {
                Swal.fire(
                    'Validation Failed', "Service Price cannot be empty", 'error'
                )
                return false;
            }

            let data_obj = {};
            data_obj.description = $('#transactionService_inpt_tableServiceFee_description').val();
            data_obj.price = $('#transactionService_inpt_tableServiceFee_price').val();
            data_obj.concat = $('#transactionService_inpt_tableServiceFee_description').val() + " - " + $(
                '#transactionService_inpt_tableServiceFee_price').val();
            let sumTotalCostOfService = parseInt($('#transactionService_inpt_data_TotalCostOfService').val()) + parseInt(
                data_obj.price);
            $('#transactionService_inpt_data_TotalCostOfService').val(sumTotalCostOfService)

            densoTableListofServiceFeeInputData_Obj_datas.push(data_obj);
            densoChangeTotalyOffAllTransactionInputDataGenerateData();
            $('#densoTableListofServiceFeeInputData').bootstrapTable('refresh');
            $('#densoTableListofServiceFeeInputData').bootstrapTable('load', densoTableListofServiceFeeInputData_Obj_datas);
        }

        function densoTableListofEstimationCostInputData_InitAddDataTable_obj(obj) {
            if ($('#transactionService_inpt_tableEstimationCost_name').val() == '') {
                Swal.fire(
                    'Validation Failed', "Part Name cannot be empty", 'error'
                )
                return false;
            }
            if ($('#transactionService_inpt_tableEstimationCost_partNumber').val() == '') {
                Swal.fire(
                    'Validation Failed', "Part Number cannot be empty", 'error'
                )
                return false;
            }
            if ($('#transactionService_inpt_tableEstimationCost_qty').val() == '') {
                Swal.fire(
                    'Validation Failed', "Quantity cannot be empty", 'error'
                )
                return false;
            }
            if ($('#transactionService_inpt_tableEstimationCost_price').val() == '') {
                Swal.fire(
                    'Validation Failed', "Price cannot be empty", 'error'
                )
                return false;
            }

            let data_obj = {};
            data_obj.name = $('#transactionService_inpt_tableEstimationCost_name').val();
            data_obj.partNumber = $('#transactionService_inpt_tableEstimationCost_partNumber').val();
            data_obj.qty = $('#transactionService_inpt_tableEstimationCost_qty').val();
            data_obj.price = $('#transactionService_inpt_tableEstimationCost_price').val();
            data_obj.total = data_obj.qty * data_obj.price;
            data_obj.concat = $('#transactionService_inpt_tableEstimationCost_name').val() + " - " +
                $('#transactionService_inpt_tableEstimationCost_partNumber').val() + " - " +
                $('#transactionService_inpt_tableEstimationCost_qty').val() + " - " +
                $('#transactionService_inpt_tableEstimationCost_price').val();

            let sumTotalCostOfPart = parseInt($('#transactionService_inpt_data_TotalCostOfPart').val()) + data_obj.total;
            $('#transactionService_inpt_data_TotalCostOfPart').val(sumTotalCostOfPart)


            densoTableListofEstimationCostInputData_Obj_datas.push(data_obj);
            $('#transactionService_inpt_tableEstimationCost_name').val('')
            $('#transactionService_inpt_tableEstimationCost_partNumber').val('')
            $('#transactionService_inpt_tableEstimationCost_qty').val(0)
            $('#transactionService_inpt_tableEstimationCost_price').val(0)

            densoChangeTotalyOffAllTransactionInputDataGenerateData();
            $('#densoTableListofEstimationCostInputData').bootstrapTable('refresh');
            $('#densoTableListofEstimationCostInputData').bootstrapTable('load',
                densoTableListofEstimationCostInputData_Obj_datas);
        }

        function densoTableListofEstimationCostInputDataActionFormater(value, row, index) {
            return `
                        <a class="like" href="javascript:void(0)" onclick="densoTableListofEstimationCostInputData_InitDeletedDataTable_obj(this)" title="Like">
                            <i class="fa fa-trash"></i>
                        </a>
                    `
        }

        function densoTableListofEstimationCostInputData_InitDeletedDataTable_obj(obj) {
            var indexDt = $(obj).closest('tr').data('index');
            let getUniqId = $('#densoTableListofEstimationCostInputData').bootstrapTable('getData')[indexDt];
            let CostTotal = $('#transactionService_inpt_data_TotalCostOfPart').val();
            let updateTotalCost = parseInt(CostTotal) - getUniqId.total;
            $('#transactionService_inpt_data_TotalCostOfPart').val(updateTotalCost);
            densoChangeTotalyOffAllTransactionInputDataGenerateData();
            $('#densoTableListofEstimationCostInputData').bootstrapTable('removeByUniqueId', getUniqId.concat);
        }

        function densoTableListofServiceFeeInputDataActionFormater(value, row, index) {
            return `
                        <a class="like" href="javascript:void(0)" onclick="densoTableListofServiceFeeInputData_InitDeletedDataTable_obj(this)" title="Like">
                            <i class="fa fa-trash"></i>
                        </a>
                    `
        }

        function densoTableListofServiceFeeInputData_InitDeletedDataTable_obj(obj) {
            var indexDt = $(obj).closest('tr').data('index');
            let getUniqId = $('#densoTableListofServiceFeeInputData').bootstrapTable('getData')[indexDt];
            let CostTotal = $('#transactionService_inpt_data_TotalCostOfService').val();
            let updateTotalCost = parseInt(CostTotal) - getUniqId.price;
            $('#transactionService_inpt_data_TotalCostOfService').val(updateTotalCost);
            densoChangeTotalyOffAllTransactionInputDataGenerateData();
            $('#densoTableListofServiceFeeInputData').bootstrapTable('removeByUniqueId', getUniqId.concat);
        }

        function densoTableListofComplaintInputDataFormaterAction(value, row, index) {
            return `
                        <a class="like" href="javascript:void(0)" onclick="densoTableListofComplaintInputData_InitDeletedDataTable_obj(this)" title="Like">
                            <i class="fa fa-trash"></i>
                        </a>
                    `
        }

        function densoTableListofComplaintInputData_InitDeletedDataTable_obj(obj) {
            var indexDt = $(obj).closest('tr').data('index');
            let getUniqId = $('#densoTableListofComplaintInputData').bootstrapTable('getData')[indexDt];
            $('#densoTableListofComplaintInputData').bootstrapTable('removeByUniqueId', getUniqId.concat);
        }

        function densoTableListofMechanicInputDataGenerateData(params) {
            var url = 'master/master-add-transaction-mechanic'
            $.get(url + '?' + $.param(params.data)).then(function(res) {
                params.success(res)
                console.log(res)
            })
        }

        function densoSelectedListofExistingOwnerInputDataGenerateData() {
            $.ajax({
                url: '/master/master-owner-existing',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                dataType: 'json',
                success: function(respon) {
                    $("#transactionService_inpt_data_existingOwner_select").select2({
                        data: respon,
                        placeholder: 'Search for a repository',
                        minimumInputLength: 1,
                        templateResult: formatSelectionExistingOwnerTransactionAdd,
                        templateSelection: formatSelectionExistingOwnerTransactionAddSelection
                    });
                },
                error: function(data) {
                    swalWithBootstrapButtons.fire(
                        'Error',
                        'Something Wrong While Processing data',
                        'error'
                    )
                }
            })

            $("#transactionService_inpt_data_carName").select2({
                ajax: {
                    url: '/master/master-car-name-list-transaction-select2',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            search: params.term, // search term
                        };
                    },
                    processResults: function(data, params) {
                        return {
                            results: data,
                        };
                    },
                    cache: true
                },
                minimumInputLength: 2,
                placeholder: 'Search for a car name',
                templateResult: formatSelectionCarCategoryBrandTransactionAdd,
                templateSelection: formatSelectionCarCategoryBrandTransactionAddSelection
            });
        }

        function formatSelectionExistingOwnerTransactionAdd(repo) {
            if (repo.loading) {
                return repo.text;
            }

            var $container = $(
                "<div class='select2-result-repository clearfix'>" +
                "<div class='select2-result-repository__Name'></div>" +
                "<div class='select2-result-repository__Number'></div>" +
                "<div class='select2-result-repository__Email'></div>" +
                "</div>"
            );

            $container.find(".select2-result-repository__Name").text(repo.text);
            $container.find(".select2-result-repository__Number").text(repo.number);
            $container.find(".select2-result-repository__Email").text(repo.email);

            return $container;
        }

        function formatSelectionExistingOwnerTransactionAddSelection(repo) {
            $('#transactionService_inpt_data_addressExistingOwner').val(repo.address);
            $('#transactionService_inpt_data_emailExistingOwner').val(repo.email);
            $('#transactionService_inpt_data_numberExistingOwner').val(repo.number);


            return repo.full_name || repo.text;
        }

        function formatSelectionCarCategoryBrandTransactionAdd(repo) {
            if (repo.loading) {
                return repo.text;
            }

            var $container = $(
                "<div class='select2-result-repository clearfix'>" +
                "<div class='select2-result-repository__Name'></div>" +
                "<div class='select2-result-repository__Number'></div>" +
                "<div class='select2-result-repository__Email'></div>" +
                "</div>"
            );

            $container.find(".select2-result-repository__Name").text(repo.text);
            $container.find(".select2-result-repository__Number").text(repo.brndName);
            $container.find(".select2-result-repository__Email").text(repo.ctgName);

            return $container;
        }

        function formatSelectionCarCategoryBrandTransactionAddSelection(repo) {
            $('#transactionService_inpt_data_carBrand').val(repo.brndName);
            $('#transactionService_inpt_data_carBrand_hidden').val(repo.brandID);
            $('#transactionService_inpt_data_carCategory').val(repo.ctgName);
            $('#transactionService_inpt_data_carCategory_hidden').val(repo.ctgryID);

            if (repo.brndName == null) {
                return repo.brndName || repo.text;
            }

            return repo.brndName + ' - ' + repo.text;
        }

        function densoPushNewDataTransactionService() {

            if ($('#transactionService_inpt_data_transactionDate').val() == '') {
                Swal.fire(
                    'Validation Failed', "Transaction Date cannot be empty", 'error'
                )
                return false
            }
            if ($('#transactionService_inpt_data_estimationDate').val() == '') {
                Swal.fire(
                    'Validation Failed', "Estimation Date cannot be empty", 'error'
                )
                return false
            }

            if ($('#transactionService_inpt_data_carName').val() == '') {
                Swal.fire(
                    'Validation Failed', "Car Name cannot be empty", 'error'
                )
                return false
            }
            if ($('#transactionService_inpt_data_frameNumber').val() == '') {
                Swal.fire(
                    'Validation Failed', "Frame Number cannot be empty", 'error'
                )
                return false
            }
            if ($('#transactionService_inpt_data_engineNumber').val() == '') {
                Swal.fire(
                    'Validation Failed', "Engine Number cannot be empty", 'error'
                )
                return false
            }
            if ($('#transactionService_inpt_data_licensePlate').val() == '') {
                Swal.fire(
                    'Validation Failed', "License Plate cannot be empty", 'error'
                )
                return false
            }
            if ($('#transactionService_inpt_data_miles').val() == '') {
                Swal.fire(
                    'Validation Failed', "Car Miles cannot be empty", 'error'
                )
                return false
            }
            let transactionDate = $('#transactionService_inpt_data_transactionDate').val();
            let estimationDate = $('#transactionService_inpt_data_estimationDate').val();
            let carCategory = $('#transactionService_inpt_data_carCategory_hidden').val();
            let carBrand = $('#transactionService_inpt_data_carBrand_hidden').val();
            let carName = $('#transactionService_inpt_data_carName option:selected').val();
            let frameNumber = $('#transactionService_inpt_data_frameNumber').val();
            let engineNumber = $('#transactionService_inpt_data_engineNumber').val();
            let licensePlate = $('#transactionService_inpt_data_licensePlate').val();
            let miles = $('#transactionService_inpt_data_miles').val();

            let toggleSwitch = 'N'
            if ($('#transactionService_inpt_data_userSelect').is(":checked")) {
                toggleSwitch = "T";
            } else {
                toggleSwitch = "F";
            }

            let ownerName = null;
            let ownerAddress = null;
            let ownerNumber = null;
            let ownerEmail = null;



            if (toggleSwitch == 'F') {
                ownerName = $('#transactionService_inpt_data_newOwner_name').val();
                ownerAddress = $('#transactionService_inpt_data_newOwner_address').val();
                ownerNumber = $('#transactionService_inpt_data_newOwner_number').val();
                ownerEmail = $('#transactionService_inpt_data_newOwner_email').val();
            } else {
                ownerName = $('#transactionService_inpt_data_existingOwner_select option:selected').val();
                ownerAddress = $('#transactionService_inpt_data_addressExistingOwner').val();
                ownerNumber = $('#transactionService_inpt_data_numberExistingOwner').val();
                ownerEmail = $('#transactionService_inpt_data_emailExistingOwner').val();
            }
            if (ownerName == '') {
                Swal.fire(
                    'Validation Failed', "Owner Name cannot be empty", 'error'
                )
                return false
            }
            if (ownerAddress == '') {
                Swal.fire(
                    'Validation Failed', "Owner Address cannot be empty", 'error'
                )
                return false
            }
            if (ownerNumber == '') {
                Swal.fire(
                    'Validation Failed', "Owner Number cannot be empty", 'error'
                )
                return false
            }
            if (ownerEmail == '') {
                Swal.fire(
                    'Validation Failed', "Owner Email cannot be empty", 'error'
                )
                return false
            }


            if (densoTableListofComplaintInputData_Obj_datas.length == 0) {
                Swal.fire(
                    'Validation Failed', "Complaint cannot be empty", 'error'
                )
                return false
            }
            if (densoTableListofEstimationCostInputData_Obj_datas.length == 0) {
                Swal.fire(
                    'Validation Failed', "Estimation Cost cannot be empty", 'error'
                )
                return false
            }
            if (densoTableListofServiceFeeInputData_Obj_datas.length == 0) {
                Swal.fire(
                    'Validation Failed', "Service cannot be empty", 'error'
                )
                return false
            }

            let dataTableMechanic = $('#densoTableListofMechanicInputData').bootstrapTable("getSelections");
            if (dataTableMechanic.length == 0) {
                Swal.fire(
                    'Validation Failed', "Mechanic cannot be empty", 'error'
                )
                return false
            }

            $.ajax({
                url: 'transaction/create-data-transaction-service',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    qtransactionDate: transactionDate,
                    qestimationDate: estimationDate,
                    qcarCategory: carCategory,
                    qcarBrand: carBrand,
                    qcarName: carName,
                    qfrmNumber: frameNumber,
                    qengnNumber: engineNumber,
                    qlicensePlate: licensePlate,
                    qmiles: miles,
                    qnewOwner: toggleSwitch,
                    qownerName: ownerName,
                    qownerAddress: ownerAddress,
                    qownerNumber: ownerNumber,
                    qownerEmail: ownerEmail,
                    dataComplaint: densoTableListofComplaintInputData_Obj_datas,
                    dataEstimation: densoTableListofEstimationCostInputData_Obj_datas,
                    dataServiceFee: densoTableListofServiceFeeInputData_Obj_datas,
                    dataMechanic: dataTableMechanic,
                    qtotalPayment: $('#transactionService_inpt_data_totalyOfAllTransactionPlusPPN').val()
                },
                type: 'post',
                dataType: 'json',
                success: function(respon) {
                    Swal.fire(
                        'Successfully', "Transaction success created", 'success'
                    );
                    $('#densoButtonBackTransactionServiceAdd').click();
                },
                error: function(data) {
                    var a = data.responseJSON;
                    Swal.fire(
                        'Error', a.message, 'error'
                    )
                }
            })

        }
    </script>

</body>

</html>
