<?php
namespace App\Http\Controllers\Web;


use App\Model\Core\Dependence;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DependenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $inputs = $request->input();
        if(empty($inputs)){            
            $inputs['name']=null;
            $inputs['adress']=null;
        }
        $name = $request->get('name');
        $adress = $request->get('adress');

        $dependences = Dependence::orderBy('id','DESC')            
            ->name($name)
            ->adress($adress)
            ->paginate(15);
        return view('dependence.index',compact('dependences','inputs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Dependence  $dependence
     * @return \Illuminate\Http\Response
     */
    public function show(Dependence $dependence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dependence  $dependence
     * @return \Illuminate\Http\Response
     */
    public function edit(Dependence $dependence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dependence  $dependence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dependence $dependence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dependence  $dependence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dependence $dependence)
    {
        //
    }
}
