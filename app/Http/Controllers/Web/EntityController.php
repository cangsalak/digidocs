<?php

namespace App\Http\Controllers\Web;

use App\Model\Core\Entity;
use App\Model\Core\Department;
use App\Model\Core\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;

class EntityController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //muestra todos las entidades
        
        
        //dd(Entity::select()->paginate(3)->items());        
        
        /*
        if($request->input('sort')){
            //dd($request->input('sort'));
        }
        */

        $inputs = $request->input();
        if(empty($inputs)){
            $inputs['nit']=null;
            $inputs['name']=null;
            $inputs['description']=null;
        }

        $nit = $request->get('nit');
        $name = $request->get('name');
        $description = $request->get('description');

        $entities = Entity::orderBy('id','DESC')
            ->nit($nit)
            ->name($name)
            ->description($description)
            ->paginate(15);                
        //return View::make('entity.index')->with('data', ['entities' => $entities])->withInput($request->input());
        return view('entity.index',compact('entities','inputs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $entity = new Entity();            
        return view('entity.create',compact('entity'))->with('data', []);       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {   
        //validamos las entradas $id
        dd($request->input());
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        dd($request->input());
        return $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        dd($request->input());
        return $id;
    }
}
