<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Concepto;
use Illuminate\Http\Request;

class ConceptosController extends Controller
{

    public function index()
    {
        /* 
        Se obtiene una lista con todos los Conceptos 
        */
        $Conceptos = Concepto::All();
        return view('director.ConsultasAlum', ['Conceptos' => $Conceptos]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
