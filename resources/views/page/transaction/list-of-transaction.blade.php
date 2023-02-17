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
    </style>
@endsection

@section('content')
    <!-- END STATISTIC-->

    <section class="statistic">
        <div class="row">
            <div class="col-12">
                <!-- RECENT REPORT 2-->
                <div class="recent-report2">
                    <h3 class="title-3">Recent Report Transaction</h3>
                    <hr>
                    {{-- Filter --}}
                    <div class="row">
                        <div class="col" style="background-color: #e2e2e2bd">
                            <div class="collapse" id="collapseExample">
                                {{-- Filter Car --}}
                                <fieldset class="color-fieldset form-horizontal">
                                    <legend class="color-legend">
                                        <span>Car</span>
                                    </legend>
                                    <div class="form-horizontal">
                                        <div class="row" style="margin-left: 0px">
                                            <div class="col-md-4">
                                                <div class="form-group large-font">
                                                    <div class="row">
                                                        <div style="padding-left: 0px !important;">
                                                            <label class="control-label">
                                                                Car Type
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-11">
                                                            <select id="ahmsdlog015p01GroupMDDD"
                                                                class="form-control uppercase">
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group large-font">
                                                    <div
                                                        class="form-group large-font HiddenCustom ahmsdlog020_obj_md_hidden">
                                                        <div class="row">
                                                            <div class="col-md-11 form-group"
                                                                style="padding-left: 0px !important;">
                                                                <label class="control-label"
                                                                    for="ahmsdlog015p01maindealerHidden">
                                                                    Car Name
                                                                </label>
                                                                <input id="ahmsdlog015p01maindealerHidden" type="text"
                                                                    class="form-control uppercase" maxlength="50">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group large-font">
                                                    <div
                                                        class="form-group large-font HiddenCustom ahmsdlog020_obj_md_hidden">
                                                        <div class="row">
                                                            <div class="col-md-11 form-group"
                                                                style="padding-left: 0px !important;">
                                                                <label class="control-label"
                                                                    for="ahmsdlog015p01maindealerHidden">
                                                                    Licence Plate
                                                                </label>
                                                                <input id="ahmsdlog015p01maindealerHidden" type="text"
                                                                    class="form-control uppercase" maxlength="50">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                {{-- Filter Date --}}
                                <fieldset class="color-fieldset form-horizontal">
                                    <legend class="color-legend">
                                        <span>Date</span>
                                    </legend>
                                    <div class="form-horizontal">
                                        <div class="row" style="margin-left: 0px">
                                            <div class="col-md-4">
                                                <div class="form-group large-font">
                                                    <div class="row">
                                                        <div style="padding-left: 0px !important;">
                                                            <label class="control-label">
                                                                Transaction Date From
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-11">
                                                            <div class="input-group date datepickermmm"
                                                                data-provide="datepicker">
                                                                <input type="text" class="form-control">
                                                                <div class="input-group-addon">
                                                                    <span class="fas fa-calendar"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group large-font">
                                                    <div class="row">
                                                        <div style="padding-left: 0px !important;">
                                                            <label class="control-label">
                                                                Transaction Date To
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-11">
                                                            <div class="input-group date datepickermmm"
                                                                data-provide="datepicker">
                                                                <input type="text" class="form-control">
                                                                <div class="input-group-addon">
                                                                    <span class="fas fa-calendar"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                {{-- Filter Owner --}}
                                <fieldset class="color-fieldset form-horizontal">
                                    <legend class="color-legend">
                                        <span>Owner</span>
                                    </legend>
                                    <div class="form-horizontal">
                                        <div class="row" style="margin-left: 0px">
                                            <div class="col-md-4">
                                                <div class="form-group large-font">
                                                    <div class="row">
                                                        <div class="col-md-11 form-group"
                                                            style="padding-left: 0px !important;">
                                                            <label class="control-label"
                                                                for="ahmsdlog015p01maindealerHidden">
                                                                Owner Name
                                                            </label>
                                                            <input id="ahmsdlog015p01maindealerHidden" type="text"
                                                                class="form-control uppercase" maxlength="50">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <hr>
                            <div class="d-flex bd-highlight">
                                <div class="mr-auto p-2 bd-highlight">
                                    <button class="btn btn-primary" id="ahmsdlog015SearchTableListp01"
                                        onclick="ahmsdlog015p01t01SearchBtn(this);">
                                        <i class="fas fa-search"></i>
                                        Search</button>
                                    <button class="btn btn-warning" onclick="ahmsdlog015p01t01Reset(this);"
                                        style="color: white">
                                        <i class="fas fa-repeat"></i>
                                        Reset</button>
                                    <button class="btn btn-success" onclick="ahmsdlog015p01ExportBtn(this);">
                                        <i class="fas fa-book"></i>
                                        Export Excel</button>
                                </div>
                                <div class="p-2 bd-highlight">
                                    <a data-toggle="collapse" id='denso_transactiont01_collabse_filter'
                                        href="#collapseExample" role="button" aria-expanded="false"
                                        aria-controls="collapseExample">
                                        <i class="fas fa-chevron-circle-down" style="font-size: 1.5vw"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Action Page --}}
                    <div class="d-flex flex-row-reverse bd-highlight">
                        <div class="p-2 bd-highlight">
                            <a href="#">
                                <button type="button" class="btn btn-warning" style="color: white">Upload
                                    Transaction</button>
                            </a>
                        </div>
                        <div class="p-2 bd-highlight">
                            <a href="{{ route('transaction-add') }}">
                                <button type="button" onclick="redirectDataTransactionAdd()" class="btn btn-primary">Add
                                    Transaction</button>
                            </a>
                        </div>
                    </div>

                    {{-- Table List of Transaction --}}
                    <table id="ahmsdlog015p01t01SearchTableList" data-toggle="table" data-ajax="ajaxRequest"
                        data-side-pagination="server" data-page-list="[10, 25, 50, 100, all]" data-sortable="true"
                        data-content-type="application/json" data-data-type="json" data-pagination="true"
                        data-unique-id="vdocnogc">
                        <thead>
                            <tr>
                                <th data-checkbox="true"></th>
                                <th data-field="name" data-halign="center" data-sortable="true">Owner Name</th>
                                <th data-field="name" data-halign="center">License Plate</th>
                                <th data-field="name" data-halign="center">Car Category</th>
                                <th data-field="name" data-halign="center">Engine Number</th>
                                <th data-field="name" data-halign="center">Frame Number</th>
                                <th data-field="name" data-halign="center">Miles</th>
                                <th data-field="name" data-halign="center">Transaction Date</th>
                                <th data-field="name" data-halign="center" data-align="center"
                                    data-formatter="operateFormatter">Action</th>
                            </tr>
                        </thead>
                    </table>

                </div>
                <!-- END RECENT REPORT 2             -->
            </div>

        </div>
    </section>
@endsection


@section('custom-js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#denso_transactiont01_collabse_filter').click();
        })

        $('.datepickermmm').datepicker({
            format: 'dd-MM-yyyy',
            startDate: '-3d'
        });

        function operateFormatter(value, row, index) {
            return `
                    <a class="like" href="javascript:void(0)" title="Like">
                        <i class="fa fa-eye"> Detail</i>
                    </a>
                `

        }

        function ajaxRequest(params) {
            var url = 'https://examples.wenzhixin.net.cn/examples/bootstrap_table/data'
            $.get(url + '?' + $.param(params.data)).then(function(res) {
                params.success(res)
                console.log(res)
            })
        }
    </script>
@endsection
