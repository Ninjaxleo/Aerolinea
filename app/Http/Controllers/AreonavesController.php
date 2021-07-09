<?php

namespace App\Http\Controllers;

use App\Http\Requests\AereonaveRequest;
use App\Models\Aereonave;
use App\Models\TamaniosAreonaves;
use App\Models\TiposAereonaves;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AreonavesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('catalogs.aereonaves',
            [
                "aereonaves"=>DB::select("SELECT a.id,a.descripcion,a.caracteristicas,a.dtcreated,t.descripcion AS tamanio, ti.descripcion tipo FROM aereonave a JOIN tamanio_aereonave t ON a.id_tamanio_aereonave=t.id JOIN tipo_aereonave ti ON a.id_tipo_aereonave=ti.id ORDER BY ti.nivel_prioridad,t.nivel_prioridad,a.dtcreated desc")
            ]
        );
    }

    public function create(){
        return view('catalogs.create_aereonaves',
            [
                "tipos"=>TiposAereonaves::all(),
                "tamanios"=>TamaniosAreonaves::all()
            ]);
    }

    public function edit(Request $request){
        $aereo= Aereonave::find($request->id);
        return view('catalogs.create_aereonaves',
            [
                "tipos"=>TiposAereonaves::all(),
                "tamanios"=>TamaniosAreonaves::all(),
                "aereonave"=>$aereo
            ]);
    }

    public function update(Request $request,$id){
        try{
            $data=$request->except(['id','_method','_token']);
            $data["dtcreated"]=now();
            if(Aereonave::where('id','=',$id)->update($data)==1){
                return redirect('aereonaves');
            }
        }catch (\Exception $exception){

        }
        return back()->withErrors(['mensaje'=>"No se ha podido modificar la aereonave"]);
    }

    public function delete(Request $request){
        try{
            $aereo= Aereonave::find($request->id);
            if($aereo->delete()){
                return redirect('aereonaves');
            }
        }catch (\Exception $exception){

        }
        return back()->withErrors(['mensaje'=>"No se ha podido eliminar la aereonave"]);
    }

    public function store(Request $request){
        try {
            $aereonave=new Aereonave();
            $aereonave->descripcion=$request["descripcion"];
            $aereonave->caracteristicas=$request["caracteristicas"];
            $aereonave->id_tipo_aereonave=$request["id_tipo_aereonave"];
            $aereonave->id_tamanio_aereonave=$request["id_tamanio_aereonave"];
            $aereonave->dtcreated=now();
            if($aereonave->save()){
                return redirect('aereonaves');
            }
        }
        catch (\Exception $exception) {
        }
        return back()->withErrors(['mensaje'=>"No se ha podido guardar la aereonave"]);
    }
}
