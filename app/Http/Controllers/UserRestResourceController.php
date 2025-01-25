<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserRestResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ['result' => "This is all records"];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return ['result' => "Inserted a record"];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return ['result' => "Updated a record"];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return ['result' => "Deleted a record"];
    }
}
