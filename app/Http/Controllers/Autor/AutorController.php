<?php

namespace App\Http\Controllers\Autor;

use App\Autores;
use App\Http\Controllers\Controller;
use App\Http\Resources\Autor\AutorResoruce;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    /**
     *
     * Funcion para crear autores
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function createAutor(Request $request){
        try {
            \DB::beginTransaction();
            $autor = new Autores();
            $autor->nombre = $request->nombre;
            $autor->apellidos = $request->apellidos;
            $autor->save();
            \DB::commit();
            return response()->json(['message'=>'El autor'.$autor->nombre.' creado exitosamente!','autor'=>$autor ],200);
        } catch (\Exception $e) {
            \DB::rollBack();

            return response()->json(['message'=>'Error en el servidor', 'error'=> $e->getMessage()],500);
        }

    }

    public function getAllAutores(){
        try {
            $autores = Autores::paginate(10);
            return AutorResoruce::collection($autores);

        } catch (\Exception $e) {
            return response()->json(['message'=>'Error en el servidor', 'error'=> $e->getMessage()],500);
        }
    }
}
