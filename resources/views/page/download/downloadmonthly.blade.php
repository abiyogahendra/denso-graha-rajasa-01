@extends('master.master-page')

@section('custom-css')
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
    </style>
@endsection

@section('content')
    <!-- END STATISTIC-->

    <section class="statistic">
        <div class="row">
            <div class="col-12">
                <!-- RECENT REPORT 2-->
                <div class="recent-report2">
                    <h3 class="title-3">Download Report Monthly</h3>
                    <hr>
                    {{-- Filter --}}
                    <div class="row">
                        <div class="col">
                            {{-- Transaction Date --}}
                            <div class="form-group large-font">
                                <div class="row">
                                    <div style="padding-left: 0px !important;">
                                        <label class="control-label" for="transactionService_inpt_data_transactionDate">
                                            Transaction Date
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4" style="padding-left: 0px !important;">
                                        <div class="input-group date datepickermmm" data-provide="datepicker">
                                            <input type="text" id="transactionService_inpt_data_transactionDate"
                                                data-date-format="mm-yyyy" class="form-control"
                                                placeholder="Day-Month-Year">
                                            <div class="input-group-addon">
                                                <span class="fas fa-calendar"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex bd-highlight">
                                            <div class="bd-highlight">
                                                <button type="button" class="btn btn-success"
                                                    onclick="DownloadDataMonthly()"><i class="fas fa-plus"></i> Submit
                                                    Transaction</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END RECENT REPORT 2             -->
            </div>

        </div>
    </section>
@endsection

@section('custom-js')
    <script type="text/javascript">
        $('.datepickermmm').datepicker({
            format: 'MM-yyyy',
            minViewMode: 1,
        });


        function DownloadDataMonthly() {
            let baseUrl = window.location.origin;
            let dataDate = $("#transactionService_inpt_data_transactionDate").val();
            window.location.href = baseUrl + "/transaction/generate-excel/invoice/" + dataDate;

            // $.ajax({
            //     url: '/transaction/generate-excel/',
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     },
            //     data: {
            //         dataMonth: dataDate
            //     },
            //     type: 'get',
            //     dataType: 'json',
            //     success: function(respon) {
            //         console.log(respon)
            //     },
            //     error: function(data) {
            //         Swal.fire(
            //             'Validation Failed', "Something Wrong While Processing data", 'error'
            //         )
            //     }
            // })
        }
    </script>
@endsection
