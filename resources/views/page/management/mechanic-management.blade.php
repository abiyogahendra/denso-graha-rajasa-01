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
                    <h3 class="title-3">Mechanic Management</h3>
                    <hr>
                    {{-- Action Page --}}
                    <div class="d-flex flex-row-reverse bd-highlight">
                        <div class="p-2 bd-highlight">
                            <button type="button" class="btn btn-warning"
                                onclick="denso_management_mechanic_modal_mechanicLeaderChange()"
                                style="color: white">Mechanic Lead</button>
                        </div>
                        <div class="p-2 bd-highlight">
                            <button type="button" class="btn btn-primary"
                                onclick="denso_management_mechanic_modal_mechanicAdd()">Add
                                Mechanic</button>
                        </div>
                    </div>
                    {{-- Table List of car --}}
                    <table id="DensoTableManagementMechanicDataTable" data-toggle="table" data-ajax="DensoTableManagementMechanicDataTableGenerateData"
                        data-side-pagination="server" data-page-list="[10, 25, 50, 100, all]" data-sortable="true"
                        data-content-type="application/json" data-data-type="json" data-pagination="true"
                        data-unique-id="no">
                        <thead>
                            <tr>
                                <th data-field="name" data-halign="center" data-sortable="true">Username</th>
                                <th data-field="updated_at" data-halign="center">Updated Date</th>
                                <th data-field="updated_by" data-halign="center">Updated By</th>
                                <th data-halign="center" data-align="center"
                                    data-formatter="operateFormatter">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <!-- END RECENT REPORT 2             -->
            </div>
        </div>
    </section>

    <div id="denso_management_mechanic_addModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" style="width:100%">
            <div class="modal-content">
                <div class="row justify-content-between ">
                    <div class="col">
                        <div class="modal-header">
                            <h3>Add Mechanic</h3>
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
                                        <label class="control-label" for="DensoManagementMechanicInput_dataMechanic">
                                            Mechanic Name
                                        </label>
                                        <input id="DensoManagementMechanicInput_dataMechanic" type="text"
                                            class="form-control uppercase" maxlength="50">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 form-group">
                                        <div class="p-2 bd-highlight">
                                            <button type="button" onclick="ManagementDataMechanic_addNewMechanic()" class="btn btn-success"><i class="fas fa-plus"></i>
                                                Add Mechanic</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <hr>
                    </div>
                    <!----------->
                </div>
            </div>
        </div>
    </div>
    <div id="denso_management_mechanic_leaderChangeModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" style="width:100%">
            <div class="modal-content">
                <div class="row justify-content-between ">
                    <div class="col">
                        <div class="modal-header">
                            <h3>Change Mechanic Leader</h3>
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
                                        <label class="control-label" for="DensoManagementMechanicInput_dataMechanicLeader">
                                            Mechanic Leader Names
                                        </label>
                                        <input id="DensoManagementMechanicInput_dataMechanicLeader" type="text"
                                            class="form-control uppercase" maxlength="50">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 form-group">
                                        <div class="p-2 bd-highlight">
                                            <button type="button" onclick="ManagementDataMechanic_addNewLeader()" class="btn btn-success"><i class="fas fa-random"></i>
                                                Change Mechanic Leader</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <hr>
                    </div>
                    <!----------->
                </div>
            </div>
        </div>
    </div>
@endsection


@section('custom-js')
    <script type="text/javascript">
        function denso_management_mechanic_modal_mechanicLeaderChange() {
            $('#denso_management_mechanic_leaderChangeModal').modal('show');
        }

        function denso_management_mechanic_modal_mechanicAdd() {
            $('#denso_management_mechanic_addModal').modal('show');
        }

        function operateFormatter(value, row, index) {
            return `
                    <a class="like" href="javascript:void(0)" title="Like">
                        <i class="fa fa-eye"> Detail</i>
                    </a>
                `
        }

        function ManagementDataMechanic_addNewLeader() {
            if ($('#DensoManagementMechanicInput_dataMechanicLeader').val() == undefined) {
                alert('Mechanic leader tidak boleh kosong!');
            }

            $.ajax({
                url: 'management/mechanic/create-data-mechanic-leader',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    leader: $("#DensoManagementMechanicInput_dataMechanicLeader").val(),
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

        function ManagementDataMechanic_addNewMechanic() {
            if ($('#DensoManagementMechanicInput_dataMechanic').val() == undefined) {
                alert('Mechanic tidak boleh kosong!');
            }

            $.ajax({
                url: 'management/mechanic/create-data-mechanic',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    mechanic: $("#DensoManagementMechanicInput_dataMechanic").val(),
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

        function DensoTableManagementMechanicDataTableGenerateData(params) {
            var url = 'management/mechanic/load-data-list-mechanic'
            $.get(url + '?' + $.param(params.data)).then(function(res) {
                params.success(res)
                console.log(res)
            })
        }
    </script>
@endsection
