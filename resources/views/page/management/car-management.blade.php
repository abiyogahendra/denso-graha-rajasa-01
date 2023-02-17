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
                    <h3 class="title-3">Car Management</h3>
                    <hr>
                    {{-- Action Page --}}
                    <div class="d-flex flex-row-reverse bd-highlight">
                        <div class="p-2 bd-highlight">
                            <button type="button" class="btn btn-warning" style="color: white"
                                onclick="denso_management_car_modal_category()">Category</button>
                        </div>
                        <div class="p-2 bd-highlight">
                            <button type="button" class="btn btn-warning" onclick="denso_management_car_modal_brand()"
                                style="color: white">Brand</button>
                        </div>
                        <div class="p-2 bd-highlight">
                            <button type="button" class="btn btn-primary" onclick="denso_management_car_modal_carAdd()">Add
                                Car</button>
                        </div>
                    </div>
                    {{-- Table List of car --}}
                    <table id="DensoTableManagementCarMaintainCarDataTable" data-toggle="table" data-ajax="DensoTableManagementCarMaintainCarDataTableGenerateData"
                        data-side-pagination="server" data-page-list="[10, 25, 50, 100, all]" data-sortable="true"
                        data-content-type="application/json" data-data-type="json" data-pagination="true"
                        data-unique-id="vdocnogc">
                        <thead>
                            <tr>
                                <th data-checkbox="true"></th>
                                <th data-field="carName" data-halign="center" data-sortable="true">Name</th>
                                <th data-field="ctgName" data-halign="center">Category</th>
                                <th data-field="brndName" data-halign="center">Brand</th>
                                <th data-field="updated_at" data-halign="center">Update at</th>
                                <th data-field="updated_by" data-halign="center">Update by</th>
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




    <div id="denso_management_car_categoryModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" style="width:100%">
            <div class="modal-content">
                <div class="row justify-content-between ">
                    <div class="col">
                        <div class="modal-header">
                            <h3>Management Category</h3>
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
                                            Add Category
                                        </label>
                                        <input id="DensoManagementCarInput_dataCategory" type="text"
                                            class="form-control uppercase" maxlength="50">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-10 form-group">
                                        <div class="p-2 bd-highlight">
                                            <button type="button" onclick="ManagementDataCar_addNewCategory()"
                                                class="btn btn-success"><i class="fas fa-plus"></i> Add
                                                Category</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <table id="DensoTableManagementCarCategoryDataTable" data-toggle="table"
                            data-ajax="DensoTableManagementCarCategoryDataTableGenerateData" data-side-pagination="server"
                            data-page-list="[10, 25, 50, 100, all]" data-sortable="true"
                            data-content-type="application/json" data-data-type="json" data-pagination="true"
                            data-unique-id="vdocnogc">
                            <thead>
                                <tr>
                                    <th data-field="name" data-halign="center" data-sortable="true">Category Name</th>
                                    <th data-field="updated_at" data-halign="center">Create Date</th>
                                    <th data-field="updated_by" data-halign="center">Create By</th>
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
    <div id="denso_management_car_brandModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" style="width:100%">
            <div class="modal-content">
                <div class="row justify-content-between ">
                    <div class="col">
                        <div class="modal-header">
                            <h3>Management Brand</h3>
                        </div>
                    </div>
                    <div class="col">
                        <div class="modal-header">
                            <button type="button" id="DensoMan" class="close" data-dismiss="modal">
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
                                            Add Brand
                                        </label>
                                        <input id="DensoManagementCarInput_dataBrand" type="text"
                                            class="form-control uppercase" maxlength="50">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-10 form-group">
                                        <div class="p-2 bd-highlight">
                                            <button type="button" onclick="ManagementDataCar_addNewBrand()"
                                                class="btn btn-success"><i class="fas fa-plus"></i>
                                                Add
                                                Brand</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <table id="DensoTableManagementCarBrandDataTable" data-toggle="table"
                            data-ajax="DensoTableManagementCarBrandDataTableGenerateData" data-side-pagination="server"
                            data-page-list="[10, 25, 50, 100, all]" data-sortable="true"
                            data-content-type="application/json" data-data-type="json" data-pagination="true"
                            data-unique-id="vdocnogc">
                            <thead>
                                <tr>
                                    <th data-checkbox="true"></th>
                                    <th data-field="name" data-halign="center" data-sortable="true">Brand Name</th>
                                    <th data-field="updated_at" data-halign="center">Update Date</th>
                                    <th data-field="updated_by" data-halign="center">Update By</th>
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
    <div id="denso_management_car_carAddModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" style="width:100%">
            <div class="modal-content">
                <div class="row justify-content-between ">
                    <div class="col">
                        <div class="modal-header">
                            <h3>Management Car</h3>
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
                                        <label class="control-label" for="densoManagementCar_carNameInput">
                                            Add Car
                                        </label>
                                        <input id="densoManagementCar_carNameInput" type="text"
                                            class="form-control uppercase" maxlength="10">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 form-group">
                                        <label class="control-label" for="densoManagementCar_brandSelect">
                                            Brand
                                        </label>
                                        <select id="densoManagementCar_brandSelect" class="form-control uppercase">
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 form-group">
                                        <label class="control-label" for="densoManagementCar_categorySelect">
                                            Category
                                        </label>
                                        <select id="densoManagementCar_categorySelect" class="form-control uppercase">
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 form-group">
                                        <div class="p-2 bd-highlight">
                                            <button type="button" onclick="ManagementDataCar_addNewCar()"
                                                class="btn btn-success"><i class="fas fa-plus"></i>
                                                Add
                                                Car</button>
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
        function denso_management_generate_option_car_category_selected() {
            $.ajax({
                url: '/master/master-car-category',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                dataType: 'json',
                success: function(respon) {
                    $('#densoManagementCar_categorySelect option').remove();

                    $('#densoManagementCar_categorySelect').append(
                        `<option value='' disabled selected>Select Category</option>`)
                    for (let data in respon) {
                        $('#densoManagementCar_categorySelect').append(
                            `<option value='${respon[data].code}'>${respon[data].name}</option>`)
                    }
                },
                error: function(data) {
                    alert('error')
                }
            })
        }

        function denso_management_generate_option_car_brand_selected() {
            $.ajax({
                url: '/master/master-car-brand',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                dataType: 'json',
                success: function(respon) {
                    $('#densoManagementCar_brandSelect option').remove();
                    $('#densoManagementCar_brandSelect').append(
                        `<option value='' disabled selected>Select Brand Car</option>`)
                    for (let data in respon) {
                        $('#densoManagementCar_brandSelect').append(
                            `<option value='${respon[data].code}'>${respon[data].name}</option>`)
                    }
                },
                error: function(data) {
                    alert('error')
                }
            })
        }

        function denso_management_car_modal_category() {
            $('#denso_management_car_categoryModal').modal('show');
        }

        function denso_management_car_modal_brand() {
            $('#denso_management_car_brandModal').modal('show');
        }

        function denso_management_car_modal_carAdd() {
            denso_management_generate_option_car_category_selected();
            denso_management_generate_option_car_brand_selected();
            $('#denso_management_car_carAddModal').modal('show');
        }

        function DensoTableManagementCarCategoryDataTableGenerateData(params) {
            var url = 'management/car/load-data-list-category'
            $.get(url + '?' + $.param(params.data)).then(function(res) {
                params.success(res)
                console.log(res)
            })
        }

        function DensoTableManagementCarBrandDataTableGenerateData(params) {
            var url = 'management/car/load-data-list-brand'
            $.get(url + '?' + $.param(params.data)).then(function(res) {
                params.success(res)
                console.log(res)
            })
        }

        function DensoTableManagementCarMaintainCarDataTableGenerateData(params) {
            var url = 'management/car/load-data-list-car-maintain'
            $.get(url + '?' + $.param(params.data)).then(function(res) {
                params.success(res)
                console.log(res)
            })
        }


        function ManagementDataCar_addNewCategory() {
            if ($('#DensoManagementCarInput_dataCategory').val() == undefined) {
                alert('username tidak boleh kosong!');
            }

            $.ajax({
                url: 'management/car/create-data-category',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    category: $("#DensoManagementCarInput_dataCategory").val(),
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

        function ManagementDataCar_addNewBrand() {
            if ($('#DensoManagementCarInput_dataBrand').val() == undefined) {
                alert('username tidak boleh kosong!');
            }

            $.ajax({
                url: 'management/car/create-data-brand',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    brand: $("#DensoManagementCarInput_dataBrand").val(),
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

        function ManagementDataCar_addNewCar() {
            if ($('#densoManagementCar_carNameInput').val() == undefined) {
                alert('Car tidak boleh kosong!');
            }
            if ($('#densoManagementCar_categorySelect option:selected').val() == undefined) {
                alert('Category tidak boleh kosong!');
            }
            if ($('#densoManagementCar_brandSelect option:selected').val() == undefined) {
                alert('Brand tidak boleh kosong!');
            }

            $.ajax({
                url: 'management/car/create-data-car',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    car: $("#densoManagementCar_carNameInput").val(),
                    brand: $("#densoManagementCar_brandSelect option:selected").val(),
                    category: $("#densoManagementCar_categorySelect option:selected").val(),
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
