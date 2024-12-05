<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Fijo;
use Illuminate\Http\Request;

class FijosController extends Controller
{
    /* 
    Se obtiene una lista con el inventario de activos fijos 
    */
    public function index()
    {
        $Fijos = Fijo::All();
        return view('director.ConsultasFijos', ['Fijos' => $Fijos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('director.RegisFijo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
