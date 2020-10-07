<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Resources\Post\PostResource;
use App\Posts;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    /**
     *
     *Trae todos los post
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllPosts() {

        try {
            $posts = Posts::with('autor')->paginate(10);

            return PostResource::collection($posts);

        } catch (\Exception $e) {
            return response()->json(['message'=>'Error en el servidor', 'error'=> $e->getMessage()],500);
        }
    }

    /**
     *
     * Crea el Post
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createPost(Request $request){

        try {
            \DB::beginTransaction();
            $post = new Posts();
            $post->titulo = $request->titulo;
            $post->contenido = $request->contenido;
            $post->imagen =  $request->imagen ;
            $post->autor = $request->autor_id;
            $post->save();
            \DB::commit();

            return response()->json(['message'=>'El post '.$post->titulo.' creado exitosamente!','post'=>$post ],200);
        } catch (\Exception $e) {
            \DB::rollBack();

            return response()->json(['message'=>'Error en el servidor', 'error'=> $e->getMessage()],500);
        }
    }

    /**
     *
     * Edita el post
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function editPost(Request $request,$id)
    {
        try {
            $post = Posts::find($id);
            $post->titulo = $request->titulo;
            $post->contenido = $request->contenido;
            $post->imagen =  $request->imagen ;
            $post->autor = $request->autor_id;
            $post->update();

            return response()->json(['message'=>'El post '.$post->titulo.' fue actualizado!','post'=>$post ],200);
        } catch (\Exception $e) {
            return response()->json(['message'=>'Error en el servidor', 'error'=> $e->getMessage()],500);
        }

    }

    /**
     *
     *Delete post
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deletePost($id)
    {
        try {
            $post = Posts::find($id);
            $post->delete();

        } catch (\Exception $e) {
            return response()->json(['message'=>'Error en el servidor', 'error'=> $e->getMessage()],500);
        }
    }
}


