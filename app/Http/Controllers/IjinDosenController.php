<?php

namespace App\Http\Controllers;

use App\Models\IjinDosen;
use Illuminate\Http\Request;

class IjinDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ijin.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ijin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(IjinDosen $ijinDosen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IjinDosen $ijinDosen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, IjinDosen $ijinDosen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IjinDosen $ijinDosen)
    {
        //
    }
}
