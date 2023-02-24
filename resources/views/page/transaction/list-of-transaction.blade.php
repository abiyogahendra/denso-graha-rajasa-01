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
                                                    <div class="form-group large-font">
                                                        <div class="row">
                                                            <div class="col-md-11 form-group"
                                                                style="padding-left: 0px !important;">
                                                                <label class="control-label"
                                                                    for="transactionService_fltr_data_carName_select">
                                                                    Car Name
                                                                </label>
                                                                <select id="transactionService_fltr_data_carName_select"
                                                                    class="form-control uppercase">
                                                                </select>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group large-font">
                                                    <div class="form-group large-font">
                                                        <div class="row">
                                                            <div class="col-md-11 form-group"
                                                                style="padding-left: 0px !important;">
                                                                <label class="control-label"
                                                                    for="transactionService_fltr_data_licensePlate_select">
                                                                    Licence Plate
                                                                </label>
                                                                <select
                                                                    id="transactionService_fltr_data_licensePlate_select"
                                                                    class="form-control uppercase">
                                                                </select>
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
                                                            <label class="control-label"
                                                                for="transactionService_fltr_data_startTransaction_date">
                                                                Transaction Date From
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-11">
                                                            <div class="input-group date datepickermmm"
                                                                data-provide="datepicker">
                                                                <input type="text" placeholder="Day - Month - Year"
                                                                    id="transactionService_fltr_data_startTransaction_date"
                                                                    class="form-control">
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
                                                            <label class="control-label"
                                                                for="transactionService_fltr_data_endTransaction_date">
                                                                Transaction Date To
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-11">
                                                            <div class="input-group date datepickermmm"
                                                                data-provide="datepicker">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Day - Month - Year"
                                                                    id="transactionService_fltr_data_endTransaction_date">
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
                                                                for="transactionService_fltr_data_ownerName_select">
                                                                Owner Name
                                                            </label>
                                                            <select id="transactionService_fltr_data_ownerName_select"
                                                                class="form-control uppercase">
                                                            </select>
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
                                        onclick="densoTableListofTransactionServiceHistorySearchGenerate(this);">
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
                    <table id="densoTableListofTransactionServiceHistory" data-toggle="table"
                        data-ajax="densoTableListofTransactionServiceHistoryGenerateData"
                        data-query-params="densoTableListofTransactionServiceHistoryParamsGenerate"
                        data-side-pagination="server" data-page-list="[10, 25, 50, 100, all]" data-sortable="true"
                        data-content-type="application/json" data-data-type="json" data-pagination="true"
                        data-unique-id="vdocnogc">
                        <thead>
                            <tr>
                                <th data-checkbox="true"></th>
                                <th data-field="number" data-halign="center" data-sortable="true">No. Transaction</th>
                                <th data-field="custName" data-halign="center" data-sortable="true">Owner Name</th>
                                <th data-field="licensePlate" data-halign="center">License Plate</th>
                                <th data-field="carName" data-halign="center">Car Name</th>
                                <th data-field="carEngnNumber" data-halign="center">Engine Number</th>
                                <th data-field="carFrmNumber" data-halign="center">Frame Number</th>
                                <th data-field="miles" data-halign="center">Miles</th>
                                <th data-field="txnDate" data-halign="center">Transaction Date</th>
                                <th data-halign="center" data-align="center"
                                    data-formatter="densoTableListofTransactionServiceHistoryActionFormater">Action
                                </th>
                            </tr>
                        </thead>
                    </table>

                </div>
                <!-- END RECENT REPORT 2 -->
            </div>

        </div>
    </section>

    <div id="denso_transaction_detailTransaction_modal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" style="width:100%">
            <div class="modal-content">
                <div class="row justify-content-between ">
                    <div class="col">
                        <div class="modal-header">
                            <h3>Detail Transaction Service</h3>
                        </div>
                    </div>
                    <div class="col">
                        <div class="modal-header">
                            <button type="button" id="ahmsdlog015CloseModalCancel" class="close" data-dismiss="modal">
                                &times;
                            </button>
                        </div>
                    </div>
                </div>

                <div class="modal-body">
                    <!--Date Table-->
                    <div id="ahmsdlog015Historyt01" style="margin: 10px 10px">
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group large-font">
                                            <div class="row">
                                                <div style="padding-left: 0px !important;">
                                                    <label class="control-label"
                                                        for="transactionService_inpt_update_data_transactionDate">
                                                        Transaction Date
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-10" style="padding-left: 0px !important;">
                                                    <div class="input-group date datepickermmm"
                                                        id="transactionService_inpt_update_data_transactionDateDiv"
                                                        data-provide="datepicker">
                                                        <input type="text"
                                                            id="transactionService_inpt_update_data_transactionDate"
                                                            class="form-control" placeholder="Day-Month-Year">
                                                        <div class="input-group-addon">
                                                            <span class="fas fa-calendar"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Estimation date --}}
                                        <div class="form-group large-font">
                                            <div class="row">
                                                <div style="padding-left: 0px !important;">
                                                    <label class="control-label"
                                                        for="transactionService_inpt_update_data_estimationDate">
                                                        Estimation Date
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-10" style="padding-left: 0px !important;">
                                                    <div class="input-group date datepickermmm"
                                                        id="transactionService_inpt_update_data_estimationDateDiv"
                                                        data-provide="datepicker">
                                                        <input type="text"
                                                            id="transactionService_inpt_update_data_estimationDate"
                                                            class="form-control" placeholder="Day-Month-Year">
                                                        <div class="input-group-addon">
                                                            <span class="fas fa-calendar"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Car Name --}}
                                        <div class="form-group large-font">
                                            <div class="row">
                                                <div class="col-md-10" style="padding-left: 0px !important;">
                                                    <label class="control-label"
                                                        for="transactionService_inpt_update_data_carName">
                                                        Car Name
                                                    </label>
                                                    <input type="text" id="transactionService_inpt_update_data_carName"
                                                        class="form-control uppercase" disabled
                                                        placeholder=" -- Auto Generated --">
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Car Brand --}}
                                        <div class="form-group large-font">
                                            <div class="row">
                                                <div class="col-md-10" style="padding-left: 0px !important;">
                                                    <label class="control-label"
                                                        for="transactionService_inpt_update_data_carBrand">
                                                        Car Brand
                                                    </label>
                                                    <input type="text"
                                                        id="transactionService_inpt_update_data_carBrand"
                                                        class="form-control uppercase" disabled
                                                        placeholder=" -- Auto Generated --">
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Car Category --}}
                                        <div class="form-group large-font">
                                            <div class="row">
                                                <div class="col-md-10" style="padding-left: 0px !important;">
                                                    <label class="control-label"
                                                        for="transactionService_inpt_update_data_carCategory">
                                                        Car Category
                                                    </label>
                                                    <input type="text"
                                                        id="transactionService_inpt_update_data_carCategory"
                                                        class="form-control uppercase" disabled
                                                        placeholder=" -- Auto Generated --">
                                                    <input type="hidden"
                                                        id="transactionService_inpt_update_data_carCategory_hidden">
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Freme Number --}}
                                        <div class="form-group large-font">
                                            <div class="row">
                                                <div class="col-md-10" style="padding-left: 0px !important;">
                                                    <label class="control-label"
                                                        for="transactionService_inpt_update_data_frameNumber">
                                                        Frame Number
                                                    </label>
                                                    <input id="transactionService_inpt_update_data_frameNumber"
                                                        type="text" disabled class="form-control uppercase"
                                                        maxlength="15" placeholder="Input Frame Number">
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Engine Number --}}
                                        <div class="form-group large-font">
                                            <div class="row">
                                                <div class="col-md-10" style="padding-left: 0px !important;">
                                                    <label class="control-label"
                                                        for="transactionService_inpt_update_data_engineNumber">
                                                        Engine Number
                                                    </label>
                                                    <input id="transactionService_inpt_update_data_engineNumber"
                                                        type="text" disabled placeholder="Input Engine Number"
                                                        class="form-control uppercase" maxlength="50">
                                                </div>
                                            </div>
                                        </div>
                                        {{-- License Plate --}}
                                        <div class="form-group large-font">
                                            <div class="row">
                                                <div class="col-md-10" style="padding-left: 0px !important;">
                                                    <label class="control-label"
                                                        for="transactionService_inpt_update_data_licensePlate">
                                                        License Plate
                                                    </label>
                                                    <input id="transactionService_inpt_update_data_licensePlate"
                                                        type="text" disabled placeholder="Input License Plate"
                                                        class="form-control uppercase" maxlength="50">
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Miles --}}
                                        <div class="form-group large-font">
                                            <div class="row">
                                                <div class="col-md-10" style="padding-left: 0px !important;">
                                                    <label class="control-label"
                                                        for="transactionService_inpt_update_data_miles">
                                                        Miles
                                                    </label>
                                                    <input id="transactionService_inpt_update_data_miles" type="number"
                                                        disabled placeholder="Input Car Mile"
                                                        class="form-control uppercase" maxlength="50">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-horizontal">
                                            <div class="row" style="margin-left: 0px">
                                                <div class="col-md-11 form-group" style="padding-left: 0px !important;">
                                                    <label class="control-label"
                                                        for="transactionService_inpt_update_data_newOwner_name">
                                                        Owner Name
                                                    </label>
                                                    <input id="transactionService_inpt_update_data_newOwner_name" disabled
                                                        type="text" placeholder="Input Owner Name"
                                                        class="form-control uppercase" maxlength="25">
                                                </div>
                                            </div>
                                            <div class="row" style="margin-left: 0px">
                                                <div class="col-md-11 form-group" style="padding-left: 0px !important;">
                                                    <label class="control-label"
                                                        for="transactionService_inpt_update_data_newOwner_address">
                                                        Address
                                                    </label>
                                                    <input id="transactionService_inpt_update_data_newOwner_address"
                                                        disabled placeholder="Input Owner Address" type="text"
                                                        class="form-control uppercase" maxlength="50">
                                                </div>
                                            </div>
                                            <div class="row" style="margin-left: 0px">
                                                <div class="col-md-11 form-group" style="padding-left: 0px !important;">
                                                    <label class="control-label"
                                                        for="transactionService_inpt_update_data_newOwner_number">
                                                        Contact Number
                                                    </label>
                                                    <input id="transactionService_inpt_update_data_newOwner_number"
                                                        disabled placeholder="Input Owner Contact Number" type="text"
                                                        class="form-control uppercase" maxlength="15">
                                                </div>
                                            </div>
                                            <div class="row" style="margin-left: 0px">
                                                <div class="col-md-11 form-group" style="padding-left: 0px !important;">
                                                    <label class="control-label"
                                                        for="transactionService_inpt_update_data_newOwner_email">
                                                        E-mail
                                                    </label>
                                                    <input id="transactionService_inpt_update_data_newOwner_email" disabled
                                                        type="text" placeholder="Input Owner E-mail"
                                                        class="form-control uppercase" maxlength="50">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- table complaint description --}}
                                <div class="row" style="padding-left: 0px !important;">
                                    <div class="col" style="padding-left: 0px !important;">
                                        <fieldset class="color-fieldset form-horizontal">
                                            <legend class="color-legend">
                                                <span>Complaint Description</span>
                                            </legend>
                                            <table class="" id="densoTableListofComplaintInputDataUpdate"
                                                data-toggle="table" data-data-type="json" data-query-params-type="limit"
                                                data-pagination="true" data-width="10">
                                                <thead>
                                                    <tr>
                                                        <th data-field="complaint" data-halign="center" data-width="20"
                                                            data-sortable="true">
                                                            Complaint</th>
                                                        <th data-field="handling" data-width="20" data-halign="center">
                                                            Handling</th>
                                                        <th data-field="name" data-halign="center" data-align="center"
                                                            data-formatter="densoTableListofComplaintInputDataUpdateFormaterAction">
                                                            Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                                <tfoot class="display-block" style="display: block !important">
                                                    <tr>
                                                        <!-- complaint ---->
                                                        <th data-field="complaint" data-width="20" data-align="left">
                                                            <div class="col-md-12 lookup-wrapper">
                                                                <textarea id="transactionService_inpt_update_tableComplaint_complaint" rows="2" cols="50%"
                                                                    placeholder="Input Complaint"></textarea>
                                                            </div>
                                                        </th>

                                                        {{-- handling --}}
                                                        <th data-field="handling" data-width="20" data-align="left">
                                                            <div class="col-md-12 lookup-wrapper">
                                                                <textarea id="transactionService_inpt_update_tableComplaint_handling" rows="2" cols="50%"
                                                                    placeholder="Input Handling"></textarea>
                                                            </div>
                                                        </th>

                                                        <!-- Color ---->
                                                        <th data-align="center" data-valign="middle" data-halign="center"
                                                            style="text-align: center">
                                                            <a href="#" style="display:block !important"
                                                                onclick="densoTableListofComplaintInputDataUpdate_InitAddDataTable_obj(this);
                                                                        return false;"
                                                                title="Edit Part"><i class="fas fa-plus"></i>
                                                                Add &nbsp</a>
                                                        </th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </fieldset>
                                    </div>
                                </div>
                                {{-- total cost of parts --}}
                                <div class="form-group large-font">
                                    <div class="row">
                                        <div class="col-md-4" style="padding-left: 0px !important;">
                                            <label class="control-label"
                                                for="transactionService_inpt_update_data_TotalCostOfPart">
                                                Total Cost of Parts
                                            </label>
                                            <input id="transactionService_inpt_update_data_TotalCostOfPart" type="text"
                                                class="form-control uppercase" maxlength="50" value="0" disabled>
                                        </div>
                                    </div>
                                </div>
                                {{-- table price and cost --}}
                                <div class="row" style="padding-left: 0px !important;">
                                    <div class="col" style="padding-left: 0px !important;">
                                        <fieldset class="color-fieldset form-horizontal">
                                            <legend class="color-legend">
                                                <span>Estimation Cost</span>
                                            </legend>
                                            <div class="form-horizontal">
                                                <table class="" id="densoTableListofEstimationCostInputDataUpdate"
                                                    data-toggle="table" data-data-type="json"
                                                    data-query-params-type="limit" data-pagination="true">
                                                    <thead>
                                                        <tr>
                                                            <th data-field="name" data-halign="center"
                                                                data-sortable="true">
                                                                Name Part</th>
                                                            <th data-field="partNumber" data-halign="center">Part Number
                                                            </th>
                                                            <th data-field="qty" data-halign="center">Quantity</th>
                                                            <th data-field="price" data-halign="center">Price</th>
                                                            <th data-field="total" data-halign="center">Total</th>
                                                            <th data-halign="center" data-align="center"
                                                                data-formatter="operateFormatter">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody></tbody>
                                                    <tfoot class="display-block" style="display: block !important">
                                                        <tr>
                                                            <!-- Name Part ---->
                                                            <th data-field="name" data-align="left">
                                                                <div class="col-md-12 lookup-wrapper">
                                                                    <input
                                                                        id="transactionService_inpt_update_tableEstimationCost_name"
                                                                        placeholder="Input Part Name" type="text"
                                                                        class="form-control uppercase" maxlength="50">
                                                                </div>
                                                            </th>

                                                            {{-- Part Number --}}
                                                            <th data-field="partNumber" data-align="left">
                                                                <div class="col-md-12 lookup-wrapper">
                                                                    <input
                                                                        id="transactionService_inpt_update_tableEstimationCost_partNumber"
                                                                        placeholder="Input Part Number" type="text"
                                                                        class="form-control uppercase" maxlength="50">
                                                                </div>
                                                            </th>

                                                            <!-- Quantity ---->
                                                            <th data-field="qty" data-align="left">
                                                                <div class="col-md-12 lookup-wrapper">
                                                                    <input
                                                                        id="transactionService_inpt_update_tableEstimationCost_qty"
                                                                        placeholder="Input Part Quantity" type="number"
                                                                        class="form-control uppercase" maxlength="50">
                                                                </div>
                                                            </th>

                                                            <!-- Price ---->
                                                            <th data-field="price" data-align="left">
                                                                <div class="col-md-12 lookup-wrapper">
                                                                    <input
                                                                        id="transactionService_inpt_update_tableEstimationCost_price"
                                                                        placeholder="Input Part Price" type="Price"
                                                                        class="form-control uppercase" maxlength="50">
                                                                </div>
                                                            </th>

                                                            <th data-field="total" data-align="left">
                                                                <div class="col-md-12 lookup-wrapper">
                                                                </div>
                                                            </th>

                                                            <!-- action ---->
                                                            <th data-align="center" data-valign="middle"
                                                                data-halign="center" style="text-align: center">
                                                                <a href="#" style="display:block !important"
                                                                    onclick="densoTableListofEstimationCostInputDataUpdate_InitAddDataTable_obj(this);
                                                                        return false;"
                                                                    title="Edit Part"><i class="fas fa-plus"></i>
                                                                    Add &nbsp</a>
                                                            </th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                {{-- total cost of service --}}
                                <div class="form-group large-font">
                                    <div class="row">
                                        <div class="col-md-4" style="padding-left: 0px !important;">
                                            <label class="control-label"
                                                for="transactionService_inpt_update_data_TotalCostOfService">
                                                Total Cost of Service
                                            </label>
                                            <input id="transactionService_inpt_update_data_TotalCostOfService"
                                                type="text" class="form-control uppercase" maxlength="50"
                                                value="0" disabled>
                                        </div>
                                    </div>
                                </div>
                                {{-- table service fee --}}
                                <div class="row" style="padding-left: 0px !important;">
                                    <div class="col" style="padding-left: 0px !important;">
                                        <fieldset class="color-fieldset form-horizontal">
                                            <legend class="color-legend">
                                                <span>Service Fee</span>
                                            </legend>
                                            <div class="form-horizontal">
                                                <table class="" id="densoTableListofServiceFeeInputDataUpdate"
                                                    data-toggle="table" data-data-type="json"
                                                    data-query-params-type="limit" data-pagination="true">
                                                    <thead>
                                                        <tr>
                                                            <th data-field="description" data-halign="center"
                                                                data-sortable="true">
                                                                Service Description</th>
                                                            <th data-field="price" data-halign="center">Price</th>
                                                            <th data-halign="center" data-align="center"
                                                                data-formatter="operateFormatter">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody></tbody>
                                                    <tfoot class="display-block" style="display: block !important">
                                                        <tr>
                                                            <!-- Description ---->
                                                            <th data-field="description" data-align="left">
                                                                <div class="col-md-12 lookup-wrapper">
                                                                    <input
                                                                        id="transactionService_inpt_update_tableServiceFee_description"
                                                                        placeholder="Input Service Description"
                                                                        type="text" class="form-control uppercase"
                                                                        maxlength="50">
                                                                </div>
                                                            </th>

                                                            {{-- Price --}}
                                                            <th data-field="price" data-align="left">
                                                                <div class="col-md-12 lookup-wrapper">
                                                                    <input
                                                                        id="transactionService_inpt_update_tableServiceFee_price"
                                                                        placeholder="Input Service Cost" type="number"
                                                                        class="form-control uppercase">
                                                                </div>
                                                            </th>

                                                            <!-- action ---->
                                                            <th data-align="center" data-valign="middle"
                                                                data-halign="center" style="text-align: center">
                                                                <a href="#" style="display:block !important"
                                                                    onclick="densoTableListofServiceFeeInputDataUpdate_InitAddDataTable_obj(this);
                                                                        return false;"
                                                                    title="Edit Part"><i class="fas fa-plus"></i>
                                                                    Add &nbsp</a>
                                                            </th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                {{-- table mechanic --}}
                                <div class="row" style="padding-left: 0px !important;">
                                    <div class="col-4" style="padding-left: 0px !important;">
                                        <fieldset class="color-fieldset form-horizontal">
                                            <legend class="color-legend">
                                                <span>Mechanic</span>
                                            </legend>
                                            <div class="form-horizontal">
                                                <table id="densoTableListofMechanicInputDataUpdate" data-toggle="table"
                                                    data-ajax="densoTableListofMechanicInputDataUpdateGenerateData"
                                                    data-side-pagination="server" data-sortable="true"
                                                    data-content-type="application/json" data-data-type="json"
                                                    data-unique-id="no">
                                                    <thead>
                                                        <tr>
                                                            <th data-checkbox="true"></th>
                                                            <th data-field="name" data-halign="center"
                                                                data-sortable="true">
                                                                Mechanic Name</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                {{-- total All Cost --}}
                                <div class="form-group large-font">
                                    <div class="row">
                                        <div class="col-md-4" style="padding-left: 0px !important;">
                                            <label class="control-label"
                                                for="transactionService_inpt_update_data_totalyOfAllTransaction">
                                                Total Cost of All
                                            </label>
                                            <input id="transactionService_inpt_update_data_totalyOfAllTransaction"
                                                type="text" class="form-control uppercase" maxlength="50"
                                                value="0" disabled>
                                        </div>
                                    </div>
                                </div>
                                {{-- total All cost + ppn --}}
                                <div class="form-group large-font">
                                    <div class="row">
                                        <div class="col-md-4" style="padding-left: 0px !important;">
                                            <label class="control-label"
                                                for="transactionService_inpt_update_data_totalyOfAllTransactionPlusPPN">
                                                Total Cost of All + PPN 11 %
                                            </label>
                                            <input id="transactionService_inpt_update_data_totalyOfAllTransactionPlusPPN"
                                                type="text" class="form-control uppercase" value="0"
                                                maxlength="50" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex flex-row-reverse bd-highlight">
                                    <div class="p-2 bd-highlight">
                                        <button type="button" class="btn btn-danger"
                                            style="color: white">Cancel</button>
                                    </div>
                                    <div class="p-2 bd-highlight">
                                        <button type="button" class="btn btn-success"
                                            onclick="densoPushUpdateDataTransactionService()"><i class="fas fa-plus"></i>
                                            Update
                                            Transaction</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!----------->
                </div>
            </div>
        </div>
    </div>
@endsection


@section('custom-js')
    <script type="text/javascript">
        let densoTableListofComplaintInputDataUpdate_Obj_datas_update = [];
        let densoTableListofEstimationCostInputDataUpdate_Obj_datas_update = [];
        let densoTableListofServiceFeeInputDataUpdate_Obj_datas_update = [];

        $(document).ready(function() {
            $('#denso_transactiont01_collabse_filter').click();
            densoSelectedListofTransactionListInputDataGenerateData();
        })

        $('.datepickermmm').datepicker({
            format: 'dd-MM-yyyy',
            startDate: '-3d'
        });

        function densoTableListofComplaintInputDataUpdate_InitAddDataTableUpdate_obj(obj) {
            if ($('#transactionService_inpt_update_tableComplaint_complaint').val() == undefined) {
                alert('Complaint tidak boleh kosong!');
            }
            if ($('#transactionService_inpt_update_tableComplaint_handling').val() == undefined) {
                alert('Handling tidak boleh kosong!');
            }

            let data_obj = {};
            data_obj.complaint = $('#transactionService_inpt_update_tableComplaint_complaint').val();
            data_obj.handling = $('#transactionService_inpt_update_tableComplaint_handling').val();
            data_obj.concat = $('#transactionService_inpt_update_tableComplaint_handling').val() + " - " + $(
                '#transactionService_inpt_update_tableComplaint_complaint').val();
            densoChangeTotalyOffAllTransactionInputDataGenerateData();
            densoTableListofComplaintInputDataUpdate_Obj_datas.push(data_obj);

            $('#densoTableListofComplaintInputDataUpdate').bootstrapTable('refresh');
            $('#densoTableListofComplaintInputDataUpdate').bootstrapTable('load',
                densoTableListofComplaintInputDataUpdate_Obj_datas);

        }

        function densoTableListofComplaintInputDataUpdateFormaterAction(value, row, index) {
            return `
                    <a class="like" href="javascript:void(0)" title="Like">
                        <i class="fa fa-eye"> Detail</i>
                    </a>
                `
        }

        function densoTableListofServiceFeeInputDataUpdate_InitAddDataTableUpdate_obj(obj) {
            if ($('#transactionService_inpt_update_tableServiceFee_description').val() == undefined) {
                alert('Complaint tidak boleh kosong!');
            }
            if ($('#transactionService_inpt_update_tableServiceFee_price').val() == undefined) {
                alert('Handling tidak boleh kosong!');
            }

            let data_obj = {};
            data_obj.description = $('#transactionService_inpt_update_tableServiceFee_description').val();
            data_obj.price = $('#transactionService_inpt_update_tableServiceFee_price').val();
            data_obj.concat = $('#transactionService_inpt_update_tableServiceFee_description').val() + " - " + $(
                '#transactionService_inpt_update_tableServiceFee_price').val();
            let sumTotalCostOfService = parseInt($('#transactionService_inpt_update_data_TotalCostOfService').val()) +
                parseInt(
                    data_obj.price);
            $('#transactionService_inpt_update_data_TotalCostOfService').val(sumTotalCostOfService)

            densoTableListofServiceFeeInputDataUpdate_Obj_datas.push(data_obj);
            densoChangeTotalyOffAllTransactionInputDataGenerateData();
            $('#densoTableListofServiceFeeInputDataUpdateUpdate').bootstrapTable('refresh');
            $('#densoTableListofServiceFeeInputDataUpdate').bootstrapTable('load',
                densoTableListofServiceFeeInputDataUpdate_Obj_datas);
        }

        function densoTableListofEstimationCostInputDataUpdate_InitAddDataTableUpdate_obj(obj) {
            if ($('#transactionService_inpt_tableEstimationCost_name').val() == undefined) {
                alert('Complaint tidak boleh kosong!');
            }
            if ($('#transactionService_inpt_tableEstimationCost_partNumber').val() == undefined) {
                alert('Handling tidak boleh kosong!');
            }
            if ($('#transactionService_inpt_tableEstimationCost_qty').val() == undefined) {
                alert('Handling tidak boleh kosong!');
            }
            if ($('#transactionService_inpt_tableEstimationCost_price').val() == undefined) {
                alert('Handling tidak boleh kosong!');
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


            densoTableListofEstimationCostInputDataUpdate_Obj_datas.push(data_obj);
            densoChangeTotalyOffAllTransactionInputDataGenerateData();
            $('#densoTableListofEstimationCostInputDataUpdate').bootstrapTable('refresh');
            $('#densoTableListofEstimationCostInputDataUpdate').bootstrapTable('load',
                densoTableListofEstimationCostInputDataUpdate_Obj_datas);
        }

        function densoTableListofTransactionServiceHistoryActionFormater(value, row, index) {
            return `
                    <a class="like" href="javascript:void(0)" onclick="DensoTableListOpenModalTransactionDetail(this)" title="Like">
                        <i class="fa fa-eye"> Detail</i>
                    </a>
                `
        }

        function DensoTableListOpenModalTransactionDetail(obj) {
            var indexDt = $(obj).closest('tr').data('index');
            let getUniqId = $('#densoTableListofTransactionServiceHistory').bootstrapTable('getData')[indexDt];
            $.ajax({
                url: 'transaction/loda-data-detail-transaction-service',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    number: getUniqId.number
                },
                type: 'post',
                dataType: 'json',
                success: function(respon) {
                    $("#transactionService_inpt_update_data_transactionDateDiv").datepicker({
                        dateFormat: "dd-MM-yyyy"
                    }).datepicker("setDate", new Date(respon.txnDate));
                    $("#transactionService_inpt_update_data_estimationDateDiv").datepicker({
                        dateFormat: "dd-MM-yyyy"
                    }).datepicker("setDate", new Date(respon.estimationDate));
                    $('#transactionService_inpt_update_data_carName').val(respon.carName);
                    $('#transactionService_inpt_update_data_carBrand').val(respon.brndName);
                    $('#transactionService_inpt_update_data_carCategory').val(respon.ctgName);
                    $('#transactionService_inpt_update_data_frameNumber').val(respon.carfrmNumber);
                    $('#transactionService_inpt_update_data_engineNumber').val(respon.carEngnNumber);
                    $('#transactionService_inpt_update_data_licensePlate').val(respon.licensePlate);
                    $('#transactionService_inpt_update_data_miles').val(respon.miles);
                    $('#transactionService_inpt_update_data_newOwner_name').val(respon.custName);
                    $('#transactionService_inpt_update_data_newOwner_address').val(respon.custAddress);
                    $('#transactionService_inpt_update_data_newOwner_number').val(respon.custNumber);
                    $('#transactionService_inpt_update_data_newOwner_email').val(respon.custEmail);
                },
                error: function(data) {
                    swalWithBootstrapButtons.fire(
                        'Error',
                        'Something Wrong While Processing data',
                        'error'
                    )
                }
            })
            $('#denso_transaction_detailTransaction_modal').modal('show');
        }

        function densoTableListofTransactionServiceHistoryParamsGenerate(params) {

            params.search = {
                // MAIN DEALER
                'CARNAME': $("#transactionService_fltr_data_carName_select option:selected").val(),
                'LICENSE': $("#transactionService_fltr_data_licensePLate_select option:selected").val(),
                'STARDATE': $("#transactionService_fltr_data_startTransaction_date").val(),
                'ENDDATE': $("#transactionService_fltr_data_endTransaction_date").val(),
                'OWNER': $("#transactionService_fltr_data_ownerName_select option:selected").val()
            };

            if (params.sort == undefined) {
                return {
                    limit: params.limit,
                    offset: params.offset,
                    search: params.search
                }
            }
            return params;
        }

        function densoTableListofTransactionServiceHistorySearchGenerate(obj) {
            $('#densoTableListofTransactionServiceHistory').bootstrapTable('refresh');
            $("#densoTableListofTransactionServiceHistory").bootstrapTable("uncheckAll");
        }

        function densoTableListofTransactionServiceHistoryGenerateData(params) {
            var url = 'transaction/load-data-list-transaction-service'
            $.get(url + '?' + $.param(params.data)).then(function(res) {
                params.success(res)
            })
        }

        function densoSelectedListofTransactionListInputDataGenerateData() {
            $("#transactionService_fltr_data_carName_select").select2({
                ajax: {
                    url: '/master/master-car-name-list-transaction',
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
                templateResult: formatSelectionTransactionFilterResultFilterSelect,
                templateSelection: formatSelectionTransactionFilterResultSelectedData
            });

            $("#transactionService_fltr_data_ownerName_select").select2({
                ajax: {
                    url: '/master/master-owner-name-list-transaction',
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
                templateResult: formatSelectionTransactionFilterResultFilterSelect,
                templateSelection: formatSelectionTransactionFilterResultSelectedData
            });

            $("#transactionService_fltr_data_licensePlate_select").select2({
                ajax: {
                    url: '/master/master-car-license-list-transaction',
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
                placeholder: 'Search for Car License Plate',
                templateResult: formatSelectionTransactionFilterResultFilterSelect,
                templateSelection: formatSelectionTransactionFilterResultSelectedData
            });

            $("#transactionService_fltr_data_licensePlate_select").select2({
                ajax: {
                    url: '/master/master-car-license-list-transaction',
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
                placeholder: 'Search for Car License Plate',
                templateResult: formatSelectionTransactionFilterResultFilterSelect,
                templateSelection: formatSelectionTransactionFilterResultSelectedData
            });
        }

        function formatSelectionTransactionFilterResultFilterSelect(repo) {
            if (repo.loading) {
                return repo.text;
            }

            var $container = $(
                "<div class='select2-result-repository clearfix'>" +
                "<div class='select2-result-repository__Name'></div>" +
                "</div>"
            );

            $container.find(".select2-result-repository__Name").text(repo.text);

            return $container;
        }

        function formatSelectionTransactionFilterResultSelectedData(repo) {
            return repo.text;
        }
    </script>
@endsection
