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
                    <h3 class="title-3">User Role Management</h3>
                    <hr>
                    {{-- Action Page --}}
                    <div class="d-flex flex-row-reverse bd-highlight">
                        <div class="p-2 bd-highlight">
                            <button type="button" class="btn btn-warning" onclick="denso_management_user_modal_role()"
                                style="color: white">Role</button>
                        </div>
                        <div class="p-2 bd-highlight">
                            <button type="button" class="btn btn-primary"
                                onclick="denso_management_user_modal_userAdd()">Add
                                User</button>
                        </div>
                        <div class="p-2 bd-highlight">
                            <button type="button" class="btn btn-danger"
                                onclick="denso_management_user_modal_userRoleMaintainAdd()" style="color: white">Add User
                                Role Maintain</button>
                        </div>
                    </div>
                    {{-- Table List of car --}}
                    <table id="densoTableListofMaintainUserRoleManagement" data-toggle="table"
                        data-ajax="densoTableListofMaintainUserRoleManagementGenerateData" data-side-pagination="server"
                        data-page-list="[10, 25, 50, 100, all]" data-sortable="true" data-content-type="application/json"
                        data-data-type="json" data-pagination="true" data-unique-id="userID">
                        <thead>
                            <tr>
                                <th data-field="userID" data-halign="center" data-visible="false" data-sortable="false">
                                    Username</th>
                                <th data-field="username" data-halign="center" data-sortable="true">Username</th>
                                <th data-field="description" data-halign="center">Role</th>
                                <th data-field="status" data-halign="center" data-align="center"
                                    data-formatter="densoTableListofMaintainUserRoleManagementStatusFormater"
                                    data-sortable="true">
                                    Status</th>
                                <th data-field="updated_at" data-formatter="dataTableDateFormater" data-halign="center">
                                    Update Date</th>
                                <th data-field="updated_by" data-halign="center">Updated By</th>
                                <th data-halign="center" data-align="center"
                                    data-formatter="densoTableListofMaintainUserRoleManagementActionFormater">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <!-- END RECENT REPORT 2             -->
            </div>
        </div>
    </section>

    <div id="denso_management_user_addModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" style="width:100%">
            <div class="modal-content">
                <div class="row justify-content-between ">
                    <div class="col">
                        <div class="modal-header">
                            <h3>Management User</h3>
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
                    <div id="ahmsdlog015Historyt01">
                        <div class="row">
                            <div class="form-horizontal col-md-8">
                                <div class="row">
                                    <div class="col-md-8 form-group">
                                        <label class="control-label" for="managementUser_inpt_data_userCode">
                                            Code User
                                        </label>
                                        <input id="managementUser_inpt_data_userCode" type="text"
                                            placeholder="Input user code" class="form-control uppercase" maxlength="6">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 form-group">
                                        <label class="control-label" for="managementUser_inpt_data_username">
                                            Username
                                        </label>
                                        <input id="managementUser_inpt_data_username" type="text"
                                            placeholder="Input username" class="form-control uppercase" maxlength="50">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label class="control-label" for="managementUser_inpt_data_password">
                                            Password
                                        </label>
                                        <input id="managementUser_inpt_data_password" type="password" placeholder="********"
                                            class="form-control uppercase" maxlength="50">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label class="control-label" for="managementUser_inpt_data_password_confirmation">
                                            Confirmation Password
                                        </label>
                                        <input id="managementUser_inpt_data_password_confirmation" type="password"
                                            placeholder="********" class="form-control uppercase" maxlength="50">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 form-group">
                                        <div class="p-2 bd-highlight">
                                            <button type="button" onclick="ManagementDataUser_addNewUser()"
                                                class="btn btn-success"><i class="fas fa-plus"></i>
                                                Add
                                                User</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <table id="densoTableListofUserManagement" data-toggle="table"
                            data-ajax="densoTableListofUserManagementDatasGenerate" data-side-pagination="server"
                            data-page-list="[10, 25, 50, 100, all]" data-sortable="true"
                            data-content-type="application/json" data-data-type="json" data-pagination="true"
                            data-unique-id="userID">
                            <thead>
                                <tr>
                                    <th data-field="userID" data-halign="center" data-sortable="true">
                                        User Code</th>
                                    <th data-field="username" data-halign="center" data-sortable="true">Username</th>
                                    <th data-field="status" data-halign="center" data-align="center"
                                        data-formatter="densoTableListofUserManagementStatusFormater"
                                        data-sortable="true">
                                        Status</th>
                                    <th data-field="updated_at" data-halign="center"
                                        data-formatter="dataTableDateFormater" data-align="center" data-sortable="true">
                                        Created Date
                                    </th>
                                    <th data-field="updated_by" data-halign="center">Updated By</th>
                                    <th data-halign="center" data-align="center"
                                        data-formatter="densoTableListofUserManagementActionFormater">Action
                                    </th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <!----------->
                </div>
            </div>
        </div>
    </div>
    <div id="denso_management_user_userRoleMaintainModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" style="width:100%">
            <div class="modal-content">
                <div class="row justify-content-between ">
                    <div class="col">
                        <div class="modal-header">
                            <h3>Management Role</h3>
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
                    <div id="ahmsdlog015Historyt01">
                        <div class="row">
                            <div class="form-horizontal col-md-6">
                                <div class="row">
                                    <div class="col-md-10 form-group">
                                        <label class="control-label" for="densoManagementUser_userSelect">
                                            User
                                        </label>
                                        <select id="densoManagementUser_userSelect" class="form-control uppercase">
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 form-group">
                                        <label class="control-label" for="ahmsdlog015p01h01GCDocumentNumber">
                                            Role
                                        </label>
                                        <select id="densoManagementUser_roleSelect" class="form-control uppercase">
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 form-group">
                                        <div class="p-2 bd-highlight">
                                            <button type="button" onclick="ManagementDataMaintainUserRoles_addUserRole()"
                                                class="btn btn-success"><i class="fas fa-plus"></i>
                                                Add
                                                Maintain User Roles</button>
                                        </div>
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
    <div id="denso_management_user_roleModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" style="width:100%">
            <div class="modal-content">
                <div class="row justify-content-between ">
                    <div class="col">
                        <div class="modal-header">
                            <h3>Management Role</h3>
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
                    <div id="ahmsdlog015Historyt01">
                        <div class="row">
                            <div class="form-horizontal col-md-6">
                                <div class="row">
                                    <div class="col-md-10 form-group">
                                        <label class="control-label" for="ahmsdlog015p01h01GCDocumentNumber">
                                            Role
                                        </label>
                                        <input id="managementRole_inpt_data_role" placeholder="Input Name Role"
                                            type="text" class="form-control uppercase" maxlength="50">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 form-group">
                                        <label class="control-label" for="ahmsdlog015p01h01GCDocumentNumber">
                                            Description Role
                                        </label>
                                        <input id="managementRole_inpt_data_description"
                                            placeholder="Input Description Role" type="text"
                                            class="form-control uppercase" maxlength="50">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 form-group">
                                        <div class="p-2 bd-highlight">
                                            <button type="button" onclick="ManagementDataUser_addNewRole()"
                                                class="btn btn-success"><i class="fas fa-plus"></i>
                                                Add
                                                Role</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <table id="densoTableListofRoleManagement" data-toggle="table"
                            data-ajax="densoTableListofRoleManagementDatasGenerate" data-side-pagination="server"
                            data-page-list="[10, 25, 50, 100, all]" data-sortable="true"
                            data-content-type="application/json" data-data-type="json" data-pagination="true"
                            data-unique-id="userID">
                            <thead>
                                <tr>
                                    <th data-field="role" data-halign="center" data-sortable="true">Role Code</th>
                                    <th data-field="description" data-halign="center">Role Description</th>
                                    <th data-field="updated_at" data-formatter="dataTableDateFormater"
                                        data-align="center" data-halign="center">Created Date</th>
                                    <th data-field="updated_by" data-halign="center">Updated By</th>
                                    <th data-halign="center" data-align="center"
                                        data-formatter="densoTableListofRoleManagementActionFormater">Action
                                    </th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <!----------->
                </div>
            </div>
        </div>
    </div>
    <div id="denso_management_user_userRoleMaintainModalUpdate" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" style="width:100%">
            <div class="modal-content">
                <div class="row justify-content-between ">
                    <div class="col">
                        <div class="modal-header">
                            <h3>Update Maintain Role</h3>
                        </div>
                    </div>
                    <div class="col">
                        <div class="modal-header">
                            <input type="hidden" id="densoManagementUser_roleSelect_hidden_number">
                            <button type="button" id="ahmsdlog015CloseModalCancel" class="close" data-dismiss="modal">
                                &times;
                            </button>
                        </div>
                    </div>
                </div>

                <div class="modal-body">
                    <!--Date Table-->
                    <div id="ahmsdlog015Historyt01">
                        <div class="row">
                            <div class="form-horizontal col-md-6">
                                <div class="row">
                                    <div class="col-md-10 form-group">
                                        <label class="control-label" for="densoManagementUser_roleSelect_update">
                                            Role
                                        </label>
                                        <select id="densoManagementUser_roleSelect_update" class="form-control uppercase">
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 form-group">
                                        <div class="p-2 bd-highlight">
                                            <button type="button"
                                                onclick="ManagementDataMaintainUserRoles_UpdateUserRole()"
                                                class="btn btn-success"><i class="fas fa-plus"></i>
                                                Update Users Role</button>
                                        </div>
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
        $(document).ready(function() {

        })

        function dataTableDateFormater(value, row, index) {
            var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
                "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
            ];
            var t = new Date(value);
            return t.getDate() + '-' + monthNames[t.getMonth()] + '-' + t.getFullYear();

        }

        function denso_management_generate_option_user_selected() {
            $.ajax({
                url: '/master/master-user',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                dataType: 'json',
                success: function(respon) {
                    $('.densoManagementUser_userSelect_deletedDataSelectUser').remove()
                    $('#densoManagementUser_userSelect').append(
                        `<option class="densoManagementUser_userSelect_deletedDataSelectUser" value='' disabled selected>Select User</option>`
                    )
                    for (let data in respon) {
                        $('#densoManagementUser_userSelect').append(
                            `<option class="densoManagementUser_userSelect_deletedDataSelectUser" value='${respon[data].code}'>${respon[data].name}</option>`
                        )
                    }
                },
                error: function(data) {
                    alert('error')
                }
            })
        }

        function denso_management_generate_option_role_selected(obj) {
            $.ajax({
                url: '/master/master-role',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                dataType: 'json',
                success: function(respon) {
                    $('.densoManagementUser_roleSelect_deletedSelectRole').remove()
                    $('#densoManagementUser_roleSelect').append(
                        `<option class="densoManagementUser_roleSelect_deletedSelectRole" value='' disabled selected>Select Roles</option>`
                    )
                    for (let data in respon) {
                        $('#densoManagementUser_roleSelect').append(
                            `<option class="densoManagementUser_roleSelect_deletedSelectRole" value='${respon[data].code}'>${respon[data].name}</option>`
                        )
                        $('#densoManagementUser_roleSelect_update').append(
                            `<option class="densoManagementUser_roleSelect_deletedSelectRole" value='${respon[data].code}'>${respon[data].name}</option>`
                        )
                    }
                    if (obj != null) {
                        $('#densoManagementUser_roleSelect_update').val(obj);
                    }
                },
                error: function(data) {
                    alert('error')
                }
            })
        }

        function denso_management_user_modal_role() {
            $('#denso_management_user_roleModal').modal('show');
        }

        function denso_management_user_modal_userAdd() {
            $('#denso_management_user_addModal').modal('show');
        }

        function denso_management_user_modal_userRoleMaintainAdd() {
            denso_management_generate_option_user_selected();
            denso_management_generate_option_role_selected(null);
            $('#denso_management_user_userRoleMaintainModal').modal('show');
        }

        function densoTableListofMaintainUserRoleManagementActionFormater(value, row, index) {
            return `
                    <a class="like" href="javascript:void(0)" onclick="densoManagementServiceMantainUserRoleUpdate(this)" title="Like">
                        <i class="fas fa-pencil-square-o">Change Role</i>
                    </a>
                `
        }

        function densoTableListofMaintainUserRoleManagementStatusFormater(value, row, index) {
            if (value == "T") {
                return '<button onclick="ManagementDataMaintainUser_changeStatusMaintain(this)" type="button" class="btn btn-success">ACTIVE</button>';
            } else {
                return '<button onclick="ManagementDataMaintainUser_changeStatusMaintain(this)" type="button" class="btn btn-danger">NOT ACTIVE</button>'
            }
        }

        function densoManagementServiceMantainUserRoleUpdate(obj) {
            var indexDt = $(obj).closest('tr').data('index');
            let getUniqId = $('#densoTableListofMaintainUserRoleManagement').bootstrapTable('getData')[indexDt];
            denso_management_generate_option_role_selected(getUniqId.roleID);

            $('#densoManagementUser_roleSelect_hidden_number').val(getUniqId.no)
            $('#denso_management_user_userRoleMaintainModalUpdate').modal('show')
        }

        function ManagementDataMaintainUser_changeStatusMaintain(obj) {
            var indexDt = $(obj).closest('tr').data('index');
            let getUniqId = $('#densoTableListofMaintainUserRoleManagement').bootstrapTable('getData')[indexDt];
            let newStatus = ""
            if (getUniqId.status == "T") {
                newStatus = "F";
            } else {
                newStatus = "T";
            }

            $.ajax({
                url: 'management/change-status-data-maintain-user-role',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    number: getUniqId.no,
                    status: newStatus,
                },
                type: 'post',
                dataType: 'json',
                success: function(respon) {
                    $('#densoTableListofMaintainUserRoleManagement').bootstrapTable('refresh');
                },
                error: function(data) {
                    var a = data.responseJSON;
                    Swal.fire(
                        'Error', a.message, 'error'
                    )
                }
            })
        }

        function densoTableListofUserManagementStatusFormater(value, row, index) {
            if (value == "T") {
                return '<button onclick="ManagementDataUser_changeStatusUser(this)" type="button" class="btn btn-success">ACTIVE</button>';
            } else {
                return '<button onclick="ManagementDataUser_changeStatusUser(this)" type="button" class="btn btn-danger">NOT ACTIVE</button>'
            }
        }

        function ManagementDataUser_changeStatusUser(obj) {
            var indexDt = $(obj).closest('tr').data('index');
            let getUniqId = $('#densoTableListofUserManagement').bootstrapTable('getData')[indexDt];
            let newStatus = ""
            if (getUniqId.status == "T") {
                newStatus = "F";
            } else {
                newStatus = "T";
            }

            $.ajax({
                url: 'management/change-status-data-user',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    number: getUniqId.userID,
                    status: newStatus,
                },
                type: 'post',
                dataType: 'json',
                success: function(respon) {
                    $('#densoTableListofUserManagement').bootstrapTable('refresh');
                },
                error: function(data) {
                    var a = data.responseJSON;
                    Swal.fire(
                        'Error', a.message, 'error'
                    )
                }
            })
        }

        function densoTableListofUserManagementActionFormater(value, row, index) {
            return `<a href="javascript:void(0)" onclick="ManagementDataUser_changePassword(this)">
                        <i class="fas fa-warning">Change Password</i>
                    </a> |
                    <a href="javascript:void(0)" onclick="ManagementDataUser_changeUsername(this)">
                        <i class="fas fa-pencil-square-o">Change Username</i>
                    </a>
                `
        }

        function ManagementDataUser_changePassword(obj) {
            var indexDt = $(obj).closest('tr').data('index');
            let getUniqId = $('#densoTableListofUserManagement').bootstrapTable('getData')[indexDt];
            Swal.fire({
                title: 'Update Password ' + getUniqId.username,
                html: `<div class="row" style="text-align:left">
                            <div class="col-md-6 form-group" >
                                <label class="control-label" for="managementUser_inptChange_data_password" >
                                    Password
                                </label>
                                <input id="managementUser_inptChange_data_password" type="password" placeholder="********"
                                    class="form-control uppercase" maxlength="50">
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="control-label" for="managementUser_inptChange_data_password_confirmation">
                                    Confirmation Password
                                </label>
                                <input id="managementUser_inptChange_data_password_confirmation" type="password"
                                    placeholder="********" class="form-control uppercase" maxlength="50">
                            </div>
                        </div>`,
                focusConfirm: false,
                showCancelButton: true,
                preConfirm: () => {
                    if ($('#managementUser_inptChange_data_password').val() != $(
                            '#managementUser_inptChange_data_password_confirmation').val()) {
                        Swal.showValidationMessage(
                            "Password Confirmation is not same"
                        )
                        return false;
                    }

                    let dataKirim = $('#managementUser_inptChange_data_password').val();
                    Swal.fire({
                        title: 'Do you want to update password ' + getUniqId.username + ' ?',
                        showCancelButton: true,
                        confirmButtonText: 'Change Password',
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            $.ajax({
                                url: 'management/change-password-data-user',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data: {
                                    number: getUniqId.userID,
                                    password: dataKirim
                                },
                                type: 'post',
                                dataType: 'json',
                                success: function(respon) {
                                    Swal.fire(
                                        'Successfully', "Password user " + getUniqId
                                        .username +
                                        " success changed", 'success'
                                    );
                                    $('#densoTableListofUserManagement')
                                        .bootstrapTable(
                                            'refresh');
                                },
                                error: function(data) {
                                    var a = data.responseJSON;
                                    Swal.fire(
                                        'Error', a.message, 'error'
                                    )
                                }
                            })
                        }
                    })
                },
                allowOutsideClick: () => !Swal.isLoading()
            })
        }

        function ManagementDataUser_changeUsername(obj) {
            var indexDt = $(obj).closest('tr').data('index');
            let getUniqId = $('#densoTableListofUserManagement').bootstrapTable('getData')[indexDt];
            Swal.fire({
                title: 'Update Password ' + getUniqId.username,
                html: `<input id="managementUser_inptChange_data_username" class="swal2-input" type="text" placeholder="${getUniqId.username}">`,
                focusConfirm: false,
                showCancelButton: true,
                preConfirm: () => {
                    if ($('#managementUser_inptChange_data_username').val() == '') {
                        Swal.showValidationMessage(
                            "Username cannot be empty"
                        )
                        return false;
                    }

                    let dataKirim = $('#managementUser_inptChange_data_username').val();
                    Swal.fire({
                        title: 'Do you want to update username ' + getUniqId.username + ' to  ' +
                            dataKirim + ' ?',
                        showCancelButton: true,
                        confirmButtonText: 'Change Username',
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            $.ajax({
                                url: 'management/change-username-data-user',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data: {
                                    number: getUniqId.userID,
                                    username: dataKirim
                                },
                                type: 'post',
                                dataType: 'json',
                                success: function(respon) {
                                    Swal.fire(
                                        'Successfully', "username user " + getUniqId
                                        .username +
                                        " success changed", 'success'
                                    );
                                    $('#densoTableListofUserManagement')
                                        .bootstrapTable(
                                            'refresh');
                                },
                                error: function(data) {
                                    var a = data.responseJSON;
                                    Swal.fire(
                                        'Error', a.message, 'error'
                                    )
                                }
                            })
                        }
                    })
                },
                allowOutsideClick: () => !Swal.isLoading()
            })
        }

        function densoTableListofRoleManagementActionFormater(value, row, index) {
            return `<a href="javascript:void(0)" onclick="ManagementDataMaintainUser_DeletedRole(this)">
                        <i class="fas fa-trash"> Delete</i>
                    </a>
                `
        }

        function ManagementDataMaintainUser_DeletedRole(obj) {
            var indexDt = $(obj).closest('tr').data('index');
            let getUniqId = $('#densoTableListofRoleManagement').bootstrapTable('getData')[indexDt];
            Swal.fire({
                title: 'Do you want to delete Role' + getUniqId.role + ' ?',
                showCancelButton: true,
                confirmButtonText: 'Delete Data',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'management/delete-data-role-user',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            number: getUniqId.role
                        },
                        type: 'post',
                        dataType: 'json',
                        success: function(respon) {
                            Swal.fire(
                                'Successfully', "Role " + getUniqId.role +
                                " success deleted", 'success'
                            );
                            $('#densoTableListofRoleManagement').bootstrapTable(
                                'refresh');
                        },
                        error: function(data) {
                            var a = data.responseJSON;
                            Swal.fire(
                                'Error', a.message, 'error'
                            )
                        }
                    })
                }
            })
        }

        function densoTableListofUserManagementDatasGenerate(params) {
            var base_url = window.location.origin;
            var url = '/management/load-data-list-user'
            $.get(url + '?' + $.param(params.data)).then(function(res) {})
        }

        function densoTableListofRoleManagementDatasGenerate(params) {
            var base_url = window.location.origin;
            var url = '/management/load-data-list-role'
            $.get(url + '?' + $.param(params.data)).then(function(res) {
                params.success(res)
            })
        }

        function densoTableListofMaintainUserRoleManagementGenerateData(params) {
            var base_url = window.location.origin;
            var url = '/management/load-data-list-maintain-user-role'
            $.get(url + '?' + $.param(params.data)).then(function(res) {
                params.success(res)
            })
        }

        function ManagementDataUser_addNewUser() {
            if ($('#managementUser_inpt_data_userCode').val() == '') {
                Swal.fire(
                    'Validation Failed', "User Code cannot be empty", 'error'
                )
                return false;
            }
            if ($('#managementUser_inpt_data_username').val() == '') {
                Swal.fire(
                    'Validation Failed', "Username cannot be empty", 'error'
                )
                return false;
            }
            if ($('#managementUser_inpt_data_password').val() == '' || $('#managementUser_inpt_data_password_confirmation')
                .val() == '') {
                Swal.fire(
                    'Validation Failed', "Password cannot be empty", 'error'
                )
                return false;
            } else {
                if ($('#managementUser_inpt_data_password').val() != $('#managementUser_inpt_data_password_confirmation')
                    .val()) {
                    Swal.fire(
                        'Validation Failed', "Password Confirmation is not same", 'error'
                    )
                    return false;
                }
            }

            $.ajax({
                url: 'management/create-data-user',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    usercode: $("#managementUser_inpt_data_userCode").val(),
                    username: $("#managementUser_inpt_data_username").val(),
                    password: $("#managementUser_inpt_data_password").val(),
                },
                type: 'post',
                dataType: 'json',
                success: function(respon) {
                    Swal.fire(
                        'Successfully', "Role " + $("#managementUser_inpt_data_username")
                        .val() +
                        " success created", 'success'
                    );
                    $("#managementUser_inpt_data_userCode").val('');
                    $("#managementUser_inpt_data_username").val('');
                    $("#managementUser_inpt_data_password").val('');
                    $("#managementUser_inpt_data_password_confirmation").val('');
                    $('#densoTableListofUserManagement').bootstrapTable('refresh');
                },
                error: function(data) {
                    var a = data.responseJSON;
                    Swal.fire(
                        'Error', a.message, 'error'
                    )
                }
            })
        }

        function ManagementDataUser_addNewRole() {
            if ($('#managementRole_inpt_data_role').val() == '') {
                Swal.fire(
                    'Validation Failed', "Role Name cannot be empty", 'error'
                )
                return false;
            }
            if ($('#managementRole_inpt_data_description').val() == '') {
                Swal.fire(
                    'Validation Failed', "Description cannot be empty", 'error'
                )
                return false;
            }

            $.ajax({
                url: 'management/create-data-role',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    role: $("#managementRole_inpt_data_role").val(),
                    description: $("#managementRole_inpt_data_description").val()
                },
                type: 'post',
                dataType: 'json',
                success: function(respon) {
                    Swal.fire(
                        'Successfully', "Role " + $("#managementRole_inpt_data_role")
                        .val() +
                        " success created", 'success'
                    );
                    $("#managementRole_inpt_data_role").val('');
                    $("#managementRole_inpt_data_description").val('');
                    $('#densoTableListofRoleManagement').bootstrapTable('refresh');
                },
                error: function(data) {
                    var a = data.responseJSON;
                    Swal.fire(
                        'Error', a.message, 'error'
                    )
                }
            })
        }

        function ManagementDataMaintainUserRoles_addUserRole() {
            if ($('#densoManagementUser_roleSelect option:selected').val() == '') {
                Swal.fire(
                    'Validation Failed', "Role cannot be empty", 'error'
                )
                return false;
            }
            if ($('#densoManagementUser_userSelect option:selected').val() == '') {
                Swal.fire(
                    'Validation Failed', "User cannot be empty", 'error'
                )
                return false;
            }

            $.ajax({
                url: 'management/create-data-maintain-role',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    user: $("#densoManagementUser_userSelect option:selected").val(),
                    role: $("#densoManagementUser_roleSelect option:selected").val()
                },
                type: 'post',
                dataType: 'json',
                success: function(respon) {
                    Swal.fire(
                        'Successfully', "Maintain User Role " + $("#managementRole_inpt_data_role")
                        .val() +
                        " success created", 'success'
                    );
                    $("#densoManagementUser_userSelect").val('');
                    $("#densoManagementUser_roleSelect").val('');
                    $('#densoTableListofMaintainUserRoleManagement').bootstrapTable('refresh');
                },
                error: function(data) {
                    var a = data.responseJSON;
                    Swal.fire(
                        'Error', a.message, 'error'
                    )
                }
            })
        }

        function ManagementDataMaintainUserRoles_UpdateUserRole() {
            Swal.fire({
                title: 'Do you want to change this role ?',
                showCancelButton: true,
                confirmButtonText: 'Change Role',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'management/change-data-role-maintain-user-role',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            number: $('#densoManagementUser_roleSelect_hidden_number').val(),
                            role: $('#densoManagementUser_roleSelect_update').val()
                        },
                        type: 'post',
                        dataType: 'json',
                        success: function(respon) {
                            Swal.fire(
                                'Successfully', "Role has changed", 'success'
                            );
                            $('#denso_management_user_userRoleMaintainModalUpdate').modal('hide')
                            $('#densoTableListofMaintainUserRoleManagement').bootstrapTable(
                                'refresh');
                        },
                        error: function(data) {
                            var a = data.responseJSON;
                            Swal.fire(
                                'Error', a.message, 'error'
                            )
                        }
                    })
                }
            })
        }
    </script>
@endsection
