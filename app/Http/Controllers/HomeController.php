<?php

namespace App\Http\Controllers;

use App;

use App\Model\Core\Department;
use App\Model\Core\City;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['postLocale','consultarcity']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function postLocale(Request $request){
        Session::put('applocale', $request->input('lang'));        
        App::setLocale($request->input('lang'));        
        return redirect('/');
    }

    public function consultarcity(Request $request){
        //consultamos el departamento        
        
        if(!empty($request->input()['id'])){                        

            $cities = City::cities($request->input()['id']);
            if(count($cities)){
                return response()->json(['respuesta'=>true,'data'=>$cities]);
            }
        }
        
        return response()->json(['respuesta'=>true,'data'=>null]);
    }   
}
