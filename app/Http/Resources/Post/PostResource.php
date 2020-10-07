<?php

namespace App\Http\Resources\Post;

use App\Http\Resources\Autor\AutorResoruce;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {


        return [

            "id" => $this->id,
            "titulo" =>  $this->titulo,
            "contenido" =>  $this->contenido,
            "imagen" =>  $this->imagen,
            "autores_id" =>  $this->autores_id,
            'autor' => new AutorResoruce($this->autor)

        ];
    }
}
