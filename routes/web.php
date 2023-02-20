<?php

use App\Http\Controllers\Authentication\LoginProcessController;
use App\Http\Controllers\Page\DashboardController;
use App\Http\Controllers\Page\LoginDirectController;
use App\Http\Controllers\Page\Management\CarManagementController;
use App\Http\Controllers\Page\Management\MechanicManagementController;
use App\Http\Controllers\Page\Management\UserManagementController;
use App\Http\Controllers\Page\Transaction\TransactionServiceController;
use App\Http\Controllers\Transaction\MasterDropDownController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::group(['middleware' => ['check.auth']], function () {

    Route::get('/', [DashboardController::class, 'IndexDashboard'])->name('dashboard');

    Route::get('user-management', [UserManagementController::class, 'UserManagementIndex'])->name('user-management');
    Route::get('car-management', [CarManagementController::class, 'CarManagementIndex'])->name('car-management');
    Route::get('mechanic-management', [MechanicManagementController::class, 'MechanicManagementIndex'])->name('mechanic-management');
    Route::get('transaction-dashboard', [TransactionServiceController::class, 'TransactionServiceIndex'])->name('transaction-list');
    Route::get('transaction-add', [TransactionServiceController::class, 'TransactionServiceAddIndex'])->name('transaction-add');

    // ----------------------------- Master data -----------------------------------------------------

    Route::post('master/master-user', [MasterDropDownController::class, 'GetMasterListUser']);
    Route::post('master/master-owner-existing', [MasterDropDownController::class, 'GetMasterListOwnerAddTransaction']);
    Route::post('master/master-role', [MasterDropDownController::class, 'GetMasterListRole']);
    Route::post('master/master-car-category', [MasterDropDownController::class, 'GetMasterListCategoryCar']);
    Route::post('master/master-car-category-add-transaction', [MasterDropDownController::class, 'GetMasterListCategoryCarAddTransaction']);
    Route::post('/master/master-car-name-params-category-brand', [MasterDropDownController::class, 'GetMasterListNameCarByCategoryBrand']);
    Route::post('master/master-car-brand', [MasterDropDownController::class, 'GetMasterListBrandCar']);
    Route::get('master/master-add-transaction-mechanic', [MasterDropDownController::class, 'GetDataListMechanic']);
    Route::post('master/master-car-name-list-transaction-select2', [MasterDropDownController::class, 'GetDataListCarCategoryBrandAddTransaction']);
    Route::post('master/master-car-name-list-transaction', [MasterDropDownController::class, 'GetDataListCarNameTransactionListFilter']);
    Route::post('master/master-car-license-list-transaction', [MasterDropDownController::class, 'GetDataListCarLicenseTransactionListFilter']);
    Route::post('master/master-owner-name-list-transaction', [MasterDropDownController::class, 'GetDataListOwnerNameTransactionListFilter']);

    // ----------------------------- process data -----------------------------------------------------

    //---------------------- management user ------------------
    Route::get('management/load-data-list-maintain-user-role', [UserManagementController::class, 'GetDataListMaintainUserRoleManagament']);

    Route::get('management/load-data-list-user', [UserManagementController::class, 'GetDataListUserManagement']);
    Route::post('management/create-data-user', [UserManagementController::class, 'CreateNewUser']);

    Route::get('management/load-data-list-role', [UserManagementController::class, 'GetDataListRoleManagement']);
    Route::post('management/create-data-role', [UserManagementController::class, 'CreteNewRole']);

    Route::post('management/create-data-maintain-role', [UserManagementController::class, 'CreteNewMaintainUserRole']);

    //-------------------- management car ---------------------

    Route::get('management/car/load-data-list-category', [CarManagementController::class, 'GetDataListCarCategory']);
    Route::post('management/car/create-data-category', [CarManagementController::class, 'CreateNewCategory']);
    Route::post('management/car/update-data-category', [CarManagementController::class, 'UpdateCategory']);
    Route::post('management/car/delete-data-category', [CarManagementController::class, 'DeleteCategory']);
    
    Route::get('management/car/load-data-list-brand', [CarManagementController::class, 'GetDataListCarBrand']);
    Route::post('management/car/create-data-brand', [CarManagementController::class, 'CreateNewBrand']);
    Route::post('management/car/update-data-brand', [CarManagementController::class, 'UpdateBrand']);
    Route::post('management/car/delete-data-brand', [CarManagementController::class, 'DeleteBrand']);
    
    Route::get('management/car/load-data-list-car-maintain', [CarManagementController::class, 'GetDataListCarMaintain']);
    Route::post('management/car/create-data-car', [CarManagementController::class, 'CreateNewCar']);
    Route::post('management/car/update-data-car-maintain', [CarManagementController::class, 'UpdateCarName']);
    Route::post('management/car/delete-data-car-maintain', [CarManagementController::class, 'DeleteCarMaintain']);

    //-------------------- management mechanic ---------------------

    Route::post('management/mechanic/create-data-mechanic-leader', [MechanicManagementController::class, 'CreateMechanicLeader']);
    Route::post('management/mechanic/create-data-mechanic', [MechanicManagementController::class, 'CreateMechanic']);
    
    Route::get('management/mechanic/load-data-list-mechanic', [MechanicManagementController::class, 'GetDataListMechanic']);
    
    
    //-------------------- management transaction servire ---------------------
    
    Route::post('transaction/create-data-transaction-service', [TransactionServiceController::class, 'CreateNewTransactionService']);
    Route::get('transaction/load-data-list-transaction-service', [TransactionServiceController::class, 'GetDataListTransactionService']);







});

Route::get('/logout', [LoginProcessController::class, 'LogoutAuthenticationProcess'])->name('logout');

// -----------------------------------------------------------------------------------------------

Route::get('login', [LoginDirectController::class, 'IndexLogin'])->name('login-direction');
Route::post('login', [LoginProcessController::class, 'LoginAuthenticationPost']);
