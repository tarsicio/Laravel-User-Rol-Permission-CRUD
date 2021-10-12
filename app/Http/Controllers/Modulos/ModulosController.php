<?php

namespace App\Http\Controllers\Modulos;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ModulosController extends Controller
{
    public function seguridad()
    {
        return view('menuseguridad');
    }

    public function show()
    {
        //return view('modulos.menuseguridad');
    }
}
