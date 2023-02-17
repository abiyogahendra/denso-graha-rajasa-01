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
                                <th data-field="updated_at" data-halign="center">Created Date</th>
                                <th data-field="updated_by" data-halign="center">Updated By</th>
                                <th data-halign="center" data-align="center" data-formatter="operateFormatter">Action</th>
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
                            <div class="form-horizontal col-md-6">
                                <div class="row">
                                    <div class="col-md-10 form-group">
                                        <label class="control-label" for="ahmsdlog015p01h01GCDocumentNumber">
                                            Code User
                                        </label>
                                        <input id="managementUser_inpt_data_userCode" type="text"
                                            class="form-control uppercase" maxlength="6">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 form-group">
                                        <label class="control-label" for="ahmsdlog015p01h01GCDocumentNumber">
                                            Username
                                        </label>
                                        <input id="managementUser_inpt_data_username" type="text"
                                            class="form-control uppercase" maxlength="50">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 form-group">
                                        <label class="control-label" for="ahmsdlog015p01h01GCDocumentNumber">
                                            Password
                                        </label>
                                        <input id="managementUser_inpt_data_password" type="text"
                                            class="form-control uppercase" maxlength="50">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 form-group">
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
                                    <th data-field="userID" data-halign="center" data-visible="false"
                                        data-sortable="false">
                                        Username</th>
                                    <th data-field="username" data-halign="center" data-sortable="true">Username</th>
                                    <th data-field="created_at" data-halign="center">Created Date</th>
                                    <th data-field="updated_by" data-halign="center">Updated By</th>
                                    <th data-halign="center" data-align="center" data-formatter="operateFormatter">Action
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
                                        <input id="managementRole_inpt_data_role" type="text"
                                            class="form-control uppercase" maxlength="50">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 form-group">
                                        <label class="control-label" for="ahmsdlog015p01h01GCDocumentNumber">
                                            Description Role
                                        </label>
                                        <input id="managementRole_inpt_data_description" type="text"
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
                                    <th data-field="updated_at" data-halign="center">Created Date</th>
                                    <th data-field="updated_by" data-halign="center">Updated By</th>
                                    <th data-halign="center" data-align="center" data-formatter="operateFormatter">Action
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
@endsection


@section('custom-js')
    <script type="text/javascript">
        $(document).ready(function() {

        })

        function denso_management_generate_option_user_selected() {
            $.ajax({
                url: '/master/master-user',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                dataType: 'json',
                success: function(respon) {
                    $('#densoManagementUser_userSelect').append(
                        `<option value='' disabled selected>Select User</option>`)
                    for (let data in respon) {
                        $('#densoManagementUser_userSelect').append(
                            `<option value='${respon[data].code}'>${respon[data].name}</option>`)
                    }
                },
                error: function(data) {
                    alert('error')
                }
            })
        }

        function denso_management_generate_option_role_selected() {
            $.ajax({
                url: '/master/master-role',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                dataType: 'json',
                success: function(respon) {
                    $('#densoManagementUser_roleSelect').append(
                        `<option value='' disabled selected>Select Roles</option>`)
                    for (let data in respon) {
                        $('#densoManagementUser_roleSelect').append(
                            `<option value='${respon[data].code}'>${respon[data].name}</option>`)
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
            denso_management_generate_option_role_selected();
            $('#denso_management_user_userRoleMaintainModal').modal('show');
        }

        function operateFormatter(value, row, index) {
            return `
                    <a class="like" href="javascript:void(0)" onclick="densoManagementServiceMantainUserRoleDetail(this)" title="Like">
                        <i class="fa fa-eye"> Detail</i>
                    </a>
                `
        }

        function densoManagementServiceMantainUserRoleDetail(obj) {
            var indexDt = $(obj).closest('tr').data('index');
            let getUniqId = $('#densoTableListofMaintainUserRoleManagement').bootstrapTable('getData')[indexDt];

            console.log(getUniqId);
        }


        function densoTableListofUserManagementDatasGenerate(params) {
            var base_url = window.location.origin;
            var url = '/management/load-data-list-user'
            $.get(url + '?' + $.param(params.data)).then(function(res) {
                params.success(res)
                console.log(res)
            })
        }

        function densoTableListofRoleManagementDatasGenerate(params) {
            var base_url = window.location.origin;
            var url = '/management/load-data-list-role'
            $.get(url + '?' + $.param(params.data)).then(function(res) {
                params.success(res)
                console.log(res)
            })
        }

        function densoTableListofMaintainUserRoleManagementGenerateData(params) {
            var base_url = window.location.origin;
            var url = '/management/load-data-list-maintain-user-role'
            $.get(url + '?' + $.param(params.data)).then(function(res) {
                params.success(res)
                console.log(res)
            })
        }

        function ManagementDataUser_addNewUser() {
            if ($('#managementUser_inpt_data_username').val() == undefined) {
                alert('username tidak boleh kosong!');
            }
            if ($('#managementUser_inpt_data_password').val() == undefined) {
                alert('password tidak boleh kosong!');
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
                    console.log(respon);
                },
                error: function(data) {
                    alert('error')
                }
            })
        }


        function ManagementDataUser_addNewRole() {
            if ($('#managementRole_inpt_data_role').val() == undefined) {
                alert('Role tidak boleh kosong!');
            }
            if ($('#managementRole_inpt_data_description').val() == undefined) {
                alert('Description tidak boleh kosong!');
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
                    console.log(respon);
                },
                error: function(data) {
                    alert('error')
                }
            })
        }

        function ManagementDataMaintainUserRoles_addUserRole() {
            if ($('#densoManagementUser_roleSelect option:selected').val() == '') {
                alert('Role tidak boleh kosong!');
            }
            if ($('#densoManagementUser_userSelect option:selected').val() == '') {
                alert('Description tidak boleh kosong!');
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
                    console.log(respon);
                },
                error: function(data) {
                    alert('error')
                }
            })
        }
    </script>
@endsection
