<?php

namespace App\Http\Controllers\Web;

use App\User;
use App\Model\Core\Entity;
use App\Model\Core\Department;
use App\Model\Core\City;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

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
        
        $departments = Department::departments();

        $cities = [];
        if(!empty($entity->department)){
            $cities = City::cities($entity->department);            
        } 
                  
        return view('entity.create',compact('entity','departments','cities'))->with('data', []);       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        if(!empty($request->file('image1'))){
            $this->validatorImage(['image1'=>$request->file('image1')])->validate();
            if(!$request->file('image1')->isValid()){
                Session::flash('danger', [['EntityImgInvalid']]);
                return redirect('entity/create');
            }
        }
        if(!empty($request->file('image2'))){
            $this->validatorImage(['image1'=>$request->file('image2')])->validate();
            if(!$request->file('image2')->isValid()){
                Session::flash('danger', [['EntityImgInvalid']]);
                return redirect('entity/create');
            }
        }

        $entity = new Entity();
        $entity = $entity::create($request->input());
        $entity->repository($entity->id);

        if(!empty($request->file('image1'))){
            //create the directory of entity
            $destinationPath = 'entities/'.$entity->id.'/profile';
            $extension = $request->file('image1')->getClientOriginalExtension(); // getting image extension
            $fileName_image1 = rand(1,9999999).'.'.$extension; // renameing image
            $request->file('image1')->move($destinationPath, $fileName_image1);
            chmod('entities/'.$entity->id.'/profile/'.$fileName_image1, 0777);
            //$request->request->add(['scutcheon1' => $fileName_image]);
            $entity->scutcheon1 = $fileName_image1;
        }

        if(!empty($request->file('image2'))){
            $destinationPath = 'entities/'.$entity->id.'/profile';
            $extension = $request->file('image2')->getClientOriginalExtension(); // getting image extension
            $fileName_image2 = rand(1,9999999).'.'.$extension; // renameing image
            $request->file('image2')->move($destinationPath, $fileName_image2);
            chmod('entities/'.$entity->id.'/profile/'.$fileName_image2, 0777);
            //$request->request->add(['scutcheon2' => $fileName_image]);
            $entity->scutcheon2 = $fileName_image2;
        }
        //update user
        $entity->save();

        //Create Admin user from entity
        //user database        
        $request->request->add(['email' => $request->input('email_institutional')]);
        $request->request->add(['password' => \Hash::make($request->input('nit'))]);
        $request->request->add(['rol_id' => 2]);
        $request->request->add(['rel_entity_id' => $entity->id]);        
        //user folder

        $user = new User();
        $user = $user::create($request->input());
        $user->repository($user->id);

        Session::flash('success', [['EntityCreateOk']]);
        return redirect('entity');
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

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nit' => '
                required|
                string|
                max:32',
            'name' => '
                required|
                string|
                max:32',
            'department' => '
                required',
            'city' => '
                required',   
            'email_institutional' => '
                required',       
            'description' => '
                max:64',
        ]);
    }

    protected function validatorImage(array $data)
    {        
        return Validator::make($data, [
            'image1'=>'
                required|
                mimes:jpeg,bmp,png|
                dimensions:max_width=700,max_width=700|
                dimensions:min_width=64,min_width=64',                         
        ]);
    }
}
