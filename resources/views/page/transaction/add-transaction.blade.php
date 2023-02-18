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
                    <h3 class="title-3">Add Transaction</h3>
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
                                                class="form-control">
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
                                        <label class="control-label" for="transactionService_inpt_data_estimationDate">
                                            Estimation Date
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4" style="padding-left: 0px !important;">
                                        <div class="input-group date datepickermmm" data-provide="datepicker">
                                            <input type="text" id="transactionService_inpt_data_estimationDate"
                                                class="form-control">
                                            <div class="input-group-addon">
                                                <span class="fas fa-calendar"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Car Category --}}
                            <div class="form-group large-font">
                                <div class="row">
                                    <div class="col-md-4" style="padding-left: 0px !important;">
                                        <label class="control-label" for="transactionService_inpt_data_carCategory">
                                            Car Category
                                        </label>
                                        <select id="transactionService_inpt_data_carCategory"
                                            class="form-control uppercase">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            {{-- Car Brand --}}
                            <div class="form-group large-font">
                                <div class="row">
                                    <div class="col-md-4" style="padding-left: 0px !important;">
                                        <label class="control-label" for="transactionService_inpt_data_carBrand">
                                            Car Brand
                                        </label>
                                        <select id="transactionService_inpt_data_carBrand" class="form-control uppercase"
                                            disabled>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            {{-- Car Name --}}
                            <div class="form-group large-font">
                                <div class="row">
                                    <div class="col-md-4" style="padding-left: 0px !important;">
                                        <label class="control-label" for="transactionService_inpt_data_carName">
                                            Car Name
                                        </label>
                                        <select id="transactionService_inpt_data_carName" class="form-control uppercase"
                                            disabled>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            {{-- License Plate --}}
                            <div class="form-group large-font">
                                <div class="row">
                                    <div class="col-md-4" style="padding-left: 0px !important;">
                                        <label class="control-label" for="transactionService_inpt_data_licensePlate">
                                            License Plate
                                        </label>
                                        <input id="transactionService_inpt_data_licensePlate" type="text"
                                            class="form-control uppercase" maxlength="50">
                                    </div>
                                </div>
                            </div>
                            {{-- Miles --}}
                            <div class="form-group large-font">
                                <div class="row">
                                    <div class="col-md-4" style="padding-left: 0px !important;">
                                        <label class="control-label" for="transactionService_inpt_data_miles">
                                            Miles
                                        </label>
                                        <input id="transactionService_inpt_data_miles" type="number"
                                            class="form-control uppercase" maxlength="50">
                                    </div>
                                </div>
                            </div>
                            {{-- New Owner / Existing Owner --}}
                            <div class="form-group large-font">
                                <div class="row">
                                    <div class="col-md-4" style="padding-left: 0px !important;">
                                        <label for="transactionService_inpt_data_userSelect" class="control-label">
                                            New / Existing User
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="switch" style="border-radius: 50%">
                                        <input id="transactionService_inpt_data_userSelect" type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                            {{-- Tab New Owner / Existing Owner --}}
                            <div class="row" style="padding-left: 0px !important;">
                                {{-- new owner --}}
                                <div class="col-6 densoDataOwnerService_selected" id="densoPartOfNewOwnerService_div"
                                    style="padding-left: 0px !important;">
                                    <fieldset class="color-fieldset form-horizontal">
                                        <legend class="color-legend">
                                            <span>New Owner</span>
                                        </legend>
                                        <div class="form-horizontal">
                                            <div class="row" style="margin-left: 0px">
                                                <div class="col-md-11 form-group" style="padding-left: 0px !important;">
                                                    <label class="control-label"
                                                        for="transactionService_inpt_data_newOwner_name">
                                                        Owner Name
                                                    </label>
                                                    <input id="transactionService_inpt_data_newOwner_name" type="text"
                                                        class="form-control uppercase" maxlength="50">
                                                </div>
                                            </div>
                                            <div class="row" style="margin-left: 0px">
                                                <div class="col-md-11 form-group" style="padding-left: 0px !important;">
                                                    <label class="control-label"
                                                        for="transactionService_inpt_data_newOwner_address">
                                                        Address
                                                    </label>
                                                    <input id="transactionService_inpt_data_newOwner_address"
                                                        type="text" class="form-control uppercase" maxlength="50">
                                                </div>
                                            </div>
                                            <div class="row" style="margin-left: 0px">
                                                <div class="col-md-11 form-group" style="padding-left: 0px !important;">
                                                    <label class="control-label"
                                                        for="transactionService_inpt_data_newOwner_number">
                                                        Contact Number
                                                    </label>
                                                    <input id="transactionService_inpt_data_newOwner_number"
                                                        type="text" class="form-control uppercase" maxlength="50">
                                                </div>
                                            </div>
                                            <div class="row" style="margin-left: 0px">
                                                <div class="col-md-11 form-group" style="padding-left: 0px !important;">
                                                    <label class="control-label"
                                                        for="transactionService_inpt_data_newOwner_email">
                                                        E-mail
                                                    </label>
                                                    <input id="transactionService_inpt_data_newOwner_email" type="text"
                                                        class="form-control uppercase" maxlength="50">
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                {{-- existing owner --}}
                                <div class="col-6 densoDataOwnerService_selected custom-hidding"
                                    id="densoPartOfExistingOwnerService_div">
                                    <fieldset class="color-fieldset form-horizontal">
                                        <legend class="color-legend">
                                            <span>Existing Owner</span>
                                        </legend>
                                        <div class="form-horizontal">
                                            <div class="row" style="margin-left: 0px">
                                                <div class="col-md-11 form-group" style="padding-left: 0px !important;">
                                                    <label class="control-label"
                                                        for="transactionService_inpt_data_existingOwner_select">
                                                        Owner Name
                                                    </label>
                                                    <select id="transactionService_inpt_data_existingOwner_select"
                                                        class="form-control uppercase">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-left: 0px">
                                                <div class="col-md-11 form-group" style="padding-left: 0px !important;">
                                                    <label class="control-label"
                                                        for="transactionService_inpt_data_addressExistingOwner">
                                                        Address
                                                    </label>
                                                    <input id="transactionService_inpt_data_addressExistingOwner"
                                                        type="text" class="form-control uppercase" maxlength="50"
                                                        disabled>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-left: 0px">
                                                <div class="col-md-11 form-group" style="padding-left: 0px !important;">
                                                    <label class="control-label" for="ahmsdlog015p01maindealerHidden">
                                                        Contact Number
                                                    </label>
                                                    <input id="transactionService_inpt_data_numberExistingOwner"
                                                        type="text" class="form-control uppercase" maxlength="50"
                                                        disabled>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-left: 0px">
                                                <div class="col-md-11 form-group" style="padding-left: 0px !important;">
                                                    <label class="control-label" for="ahmsdlog015p01maindealerHidden">
                                                        E-mail
                                                    </label>
                                                    <input id="transactionService_inpt_data_emailExistingOwner"
                                                        type="text" class="form-control uppercase" maxlength="50"
                                                        disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>

                            </div>
                            {{-- table complaint description --}}
                            <div class="row" style="padding-left: 0px !important;">
                                <div class="col" style="padding-left: 0px !important;">
                                    <fieldset class="color-fieldset form-horizontal">
                                        <legend class="color-legend">
                                            <span>Complaint Description</span>
                                        </legend>
                                        <div class="form-horizontal">
                                            <table class="" id="densoTableListofComplaintInputData"
                                                data-toggle="table" data-data-type="json" data-query-params-type="limit"
                                                data-pagination="true">
                                                <thead>
                                                    <tr>
                                                        <th data-field="complaint" data-halign="center"
                                                            data-sortable="true">
                                                            Complaint</th>
                                                        <th data-field="handling" data-halign="center">Handling</th>
                                                        <th data-field="name" data-halign="center" data-align="center"
                                                            data-formatter="densoTableListofComplaintInputDataFormaterAction">
                                                            Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                                <tfoot class="display-block" style="display: block !important">
                                                    <tr>
                                                        <!-- complaint ---->
                                                        <th data-field="complaint" data-align="left">
                                                            <div class="col-md-12 lookup-wrapper">
                                                                <textarea id="transactionService_inpt_tableComplaint_complaint" rows="2" cols="80%"
                                                                    placeholder="Input Complaint"></textarea>
                                                            </div>
                                                        </th>

                                                        {{-- handling --}}
                                                        <th data-field="handling" data-align="left">
                                                            <div class="col-md-12 lookup-wrapper">
                                                                <textarea id="transactionService_inpt_tableComplaint_handling" rows="2" cols="80%"
                                                                    placeholder="Input Handling"></textarea>
                                                            </div>
                                                        </th>

                                                        <!-- Color ---->
                                                        <th data-align="center" data-valign="middle" data-halign="center"
                                                            style="text-align: center">
                                                            <a href="#" style="display:block !important"
                                                                onclick="densoTableListofComplaintInputData_InitAddDataTable_obj(this);
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
                            {{-- total cost of parts --}}
                            <div class="form-group large-font">
                                <div class="row">
                                    <div class="col-md-4" style="padding-left: 0px !important;">
                                        <label class="control-label" for="transactionService_inpt_data_TotalCostOfPart">
                                            Total Cost of Parts
                                        </label>
                                        <input id="transactionService_inpt_data_TotalCostOfPart" type="text"
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
                                            <table class="" id="densoTableListofEstimationCostInputData"
                                                data-toggle="table" data-data-type="json" data-query-params-type="limit"
                                                data-pagination="true">
                                                <thead>
                                                    <tr>
                                                        <th data-field="name" data-halign="center" data-sortable="true">
                                                            Name Part</th>
                                                        <th data-field="partNumber" data-halign="center">Part Number</th>
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
                                                                    id="transactionService_inpt_tableEstimationCost_name"
                                                                    type="text" class="form-control uppercase"
                                                                    maxlength="50">
                                                            </div>
                                                        </th>

                                                        {{-- Part Number --}}
                                                        <th data-field="partNumber" data-align="left">
                                                            <div class="col-md-12 lookup-wrapper">
                                                                <input
                                                                    id="transactionService_inpt_tableEstimationCost_partNumber"
                                                                    type="text" class="form-control uppercase"
                                                                    maxlength="50">
                                                            </div>
                                                        </th>

                                                        <!-- Quantity ---->
                                                        <th data-field="qty" data-align="left">
                                                            <div class="col-md-12 lookup-wrapper">
                                                                <input id="transactionService_inpt_tableEstimationCost_qty"
                                                                    type="number" class="form-control uppercase"
                                                                    maxlength="50">
                                                            </div>
                                                        </th>

                                                        <!-- Price ---->
                                                        <th data-field="price" data-align="left">
                                                            <div class="col-md-12 lookup-wrapper">
                                                                <input
                                                                    id="transactionService_inpt_tableEstimationCost_price"
                                                                    type="Price" class="form-control uppercase"
                                                                    maxlength="50">
                                                            </div>
                                                        </th>

                                                        <th data-field="total" data-align="left">
                                                            <div class="col-md-12 lookup-wrapper">
                                                            </div>
                                                        </th>

                                                        <!-- action ---->
                                                        <th data-align="center" data-valign="middle" data-halign="center"
                                                            style="text-align: center">
                                                            <a href="#" style="display:block !important"
                                                                onclick="densoTableListofEstimationCostInputData_InitAddDataTable_obj(this);
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
                                            for="transactionService_inpt_data_TotalCostOfService">
                                            Total Cost of Service
                                        </label>
                                        <input id="transactionService_inpt_data_TotalCostOfService" type="text"
                                            class="form-control uppercase" maxlength="50" value="0" disabled>
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
                                            <table class="" id="densoTableListofServiceFeeInputData"
                                                data-toggle="table" data-data-type="json" data-query-params-type="limit"
                                                data-pagination="true">
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
                                                                    id="transactionService_inpt_tableServiceFee_description"
                                                                    type="text" class="form-control uppercase"
                                                                    maxlength="50">
                                                            </div>
                                                        </th>

                                                        {{-- Price --}}
                                                        <th data-field="price" data-align="left">
                                                            <div class="col-md-12 lookup-wrapper">
                                                                <input id="transactionService_inpt_tableServiceFee_price"
                                                                    type="number" class="form-control uppercase">
                                                            </div>
                                                        </th>

                                                        <!-- action ---->
                                                        <th data-align="center" data-valign="middle" data-halign="center"
                                                            style="text-align: center">
                                                            <a href="#" style="display:block !important"
                                                                onclick="densoTableListofServiceFeeInputData_InitAddDataTable_obj(this);
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
                                            <table id="densoTableListofMechanicInputData" data-toggle="table"
                                                data-ajax="densoTableListofMechanicInputDataGenerateData"
                                                data-side-pagination="server" data-sortable="true"
                                                data-content-type="application/json" data-data-type="json"
                                                data-unique-id="no">
                                                <thead>
                                                    <tr>
                                                        <th data-checkbox="true"></th>
                                                        <th data-field="name" data-halign="center" data-sortable="true">
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
                                            for="transactionService_inpt_data_totalyOfAllTransaction">
                                            Total Cost of All
                                        </label>
                                        <input id="transactionService_inpt_data_totalyOfAllTransaction" type="text"
                                            class="form-control uppercase" maxlength="50" value="0" disabled>
                                    </div>
                                </div>
                            </div>
                            {{-- total All cost + ppn --}}
                            <div class="form-group large-font">
                                <div class="row">
                                    <div class="col-md-4" style="padding-left: 0px !important;">
                                        <label class="control-label"
                                            for="transactionService_inpt_data_totalyOfAllTransactionPlusPPN">
                                            Total Cost of All + PPN 11 %
                                        </label>
                                        <input id="transactionService_inpt_data_totalyOfAllTransactionPlusPPN"
                                            type="text" class="form-control uppercase" value="0" maxlength="50"
                                            disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-row-reverse bd-highlight">
                                <div class="p-2 bd-highlight">
                                    <button type="button" class="btn btn-danger" style="color: white">Cancel</button>
                                </div>
                                <div class="p-2 bd-highlight">
                                    <button type="button" class="btn btn-success"
                                        onclick="densoPushNewDataTransactionService()"><i class="fas fa-plus"></i> Submit
                                        Transaction</button>
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
        let densoTableListofComplaintInputData_Obj_datas = [];
        let densoTableListofEstimationCostInputData_Obj_datas = [];
        let densoTableListofServiceFeeInputData_Obj_datas = [];

        $(document).ready(function() {
            denso_transaction_generate_option_car_category_selected();
            densoSelectedListofExistingOwnerInputDataGenerateData();
            $('#transactionService_inpt_data_carCategory').change(function() {
                $('#transactionService_inpt_data_carName option').remove();
                $('#transactionService_inpt_data_carBrand').prop('disabled', false);
                $('#transactionService_inpt_data_carName').prop('disabled', true);
                denso_transaction_generate_option_car_brand_selected();
            })

            $('#transactionService_inpt_data_carBrand').change(function() {
                $('#transactionService_inpt_data_carName').prop('disabled', false);
                denso_transaction_generate_option_car_name_selected();
            })

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

        function denso_transaction_generate_option_car_brand_selected() {
            $.ajax({
                url: '/master/master-car-brand-params-category',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    category: $('#transactionService_inpt_data_carCategory option:selected').val()
                },
                type: 'post',
                dataType: 'json',
                success: function(respon) {
                    $('#transactionService_inpt_data_carBrand option').remove();
                    $('#transactionService_inpt_data_carBrand').append(
                        `<option value='' disabled selected>Select Brand Car</option>`)
                    for (let data in respon) {
                        $('#transactionService_inpt_data_carBrand').append(
                            `<option value='${respon[data].code}'>${respon[data].name}</option>`)
                    }
                },
                error: function(data) {
                    alert('error')
                }
            })
        }

        function denso_transaction_generate_option_car_name_selected() {
            $.ajax({
                url: '/master/master-car-name-params-category-brand',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    category: $('#transactionService_inpt_data_carCategory option:selected').val(),
                    brand: $('#transactionService_inpt_data_carBrand option:selected').val()
                },
                type: 'post',
                dataType: 'json',
                success: function(respon) {
                    $('#transactionService_inpt_data_carName option').remove();
                    $('#transactionService_inpt_data_carName').append(
                        `<option value='' disabled selected>Select Brand Car</option>`)
                    for (let data in respon) {
                        $('#transactionService_inpt_data_carName').append(
                            `<option value='${respon[data].code}'>${respon[data].name}</option>`)
                    }
                },
                error: function(data) {
                    alert('error')
                }
            })
        }

        function denso_transaction_generate_option_car_category_selected() {
            $.ajax({
                url: '/master/master-car-category-add-transaction',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                dataType: 'json',
                success: function(respon) {
                    $('#transactionService_inpt_data_carCategory option').remove();
                    $('#transactionService_inpt_data_carCategory').append(
                        `<option value='' disabled selected>Select Category Car</option>`)
                    for (let data in respon) {
                        $('#transactionService_inpt_data_carCategory').append(
                            `<option value='${respon[data].code}'>${respon[data].name}</option>`)
                    }
                },
                error: function(data) {
                    alert('error')
                }
            })
        }

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

        function densoTableListofComplaintInputData_InitAddDataTable_obj(obj) {
            if ($('#transactionService_inpt_tableComplaint_complaint').val() == undefined) {
                alert('Complaint tidak boleh kosong!');
            }
            if ($('#transactionService_inpt_tableComplaint_handling').val() == undefined) {
                alert('Handling tidak boleh kosong!');
            }

            let data_obj = {};
            data_obj.complaint = $('#transactionService_inpt_tableComplaint_complaint').val();
            data_obj.handling = $('#transactionService_inpt_tableComplaint_handling').val();
            data_obj.concat = $('#transactionService_inpt_tableComplaint_handling').val() + " - " + $(
                '#transactionService_inpt_tableComplaint_complaint').val();
            densoChangeTotalyOffAllTransactionInputDataGenerateData();
            densoTableListofComplaintInputData_Obj_datas.push(data_obj);

            $('#densoTableListofComplaintInputData').bootstrapTable('refresh');
            $('#densoTableListofComplaintInputData').bootstrapTable('load', densoTableListofComplaintInputData_Obj_datas);

        }

        function densoTableListofServiceFeeInputData_InitAddDataTable_obj(obj) {
            if ($('#transactionService_inpt_tableServiceFee_description').val() == undefined) {
                alert('Complaint tidak boleh kosong!');
            }
            if ($('#transactionService_inpt_tableServiceFee_price').val() == undefined) {
                alert('Handling tidak boleh kosong!');
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


            densoTableListofEstimationCostInputData_Obj_datas.push(data_obj);
            densoChangeTotalyOffAllTransactionInputDataGenerateData();
            $('#densoTableListofEstimationCostInputData').bootstrapTable('refresh');
            $('#densoTableListofEstimationCostInputData').bootstrapTable('load',
                densoTableListofEstimationCostInputData_Obj_datas);
        }

        function densoTableListofComplaintInputDataFormaterAction(value, row, index) {
            return `
                    <a class="like" href="javascript:void(0)" title="Like">
                        <i class="fa fa-eye"> Detail</i>
                    </a>
                `
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
                    alert('error')
                }
            })
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

        function densoPushNewDataTransactionService() {


            let transactionDate = $('#transactionService_inpt_data_transactionDate').val();
            let estimationDate = $('#transactionService_inpt_data_estimationDate').val();
            let carCategory = $('#transactionService_inpt_data_carCategory option:selected').val();
            let carBrand = $('#transactionService_inpt_data_carBrand option:selected').val();
            let carName = $('#transactionService_inpt_data_carName option:selected').val();
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

            let dataTableMechanic = $('#densoTableListofMechanicInputData').bootstrapTable("getSelections");

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
                    qtotalPayment : $('#transactionService_inpt_data_totalyOfAllTransactionPlusPPN').val()
                },
                type: 'post',
                dataType: 'json',
                success: function(respon) {
                    console.log(respon);
                },
                error: function(data) {
                    alert('error')
                }
            })


        }
    </script>
@endsection
