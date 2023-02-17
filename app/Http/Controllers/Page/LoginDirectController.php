<?php

namespace App\Http\Controllers\Page;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\storeMarketRequest;
use App\Http\Requests\storeMarketRequestUpdate;
use App\Models\Market;
use App\Models\ImageMarket;
use Validator;
use Auth;
use DB;
use Carbon\Carbon;

class LoginDirectController extends Controller{

    function IndexLogin (){
        return view('login.login');
    }
    
}