<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Categoria;

class categoriacontroller extends Controller
{
    // CREACIÓN DE FUNCIONES //

    public function getCategorias()
    {
        return response() -> json(categoria::all(),200);
    }

    public function getCategoria($id)
    {
        $categoria = categoria::find($id);
        if(is_null($categoria))
        {
            return response() -> json(['Mensaje' => 'Registro No Encontrado'], 404);
        }
        return response() -> json(categoria::find($id),200);
    }

    public function addCategoria(Request $request)
    {
        $categoria = categoria::create($request -> all());
        return response($categoria,200);
    }

    public function updateCategoria(Request $request, $id)
    {
        $categoria = categoria::find($id);
        if(is_null($categoria))
        {
            return response() -> json(['Mensaje' => 'Registro No Encontrado'], 404);
        }

        $categoria -> update($request -> all());
        return response($categoria,200);
    }

    public function deleteCategoria($id)
    {
        $categoria = categoria::find($id);

        if(is_null($categoria))
        {
            return response() -> json(['Mensaje' => 'Registro No Encontrado'], 404);
        }

        $categoria -> delete();
        return response() -> json(['Mensaje' => 'Registro Eliminado Correctamente'],200);

    }
}
