<?php

namespace App\Http\Resources\Autor;

use Illuminate\Http\Resources\Json\JsonResource;

class AutorResoruce extends JsonResource
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
            "nombre" => $this->nombre,
            "apellidos" =>  $this->apellidos,
        ];

    }
}
