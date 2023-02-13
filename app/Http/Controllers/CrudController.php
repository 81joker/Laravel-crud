<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cruds = Crud::all();
        return view('Crud.index', compact('cruds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Crud.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'avatar' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',

        ]);
        if ($request->file('avatar')) {
            $file = $request->file('avatar');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('image'), $filename);
        }
        Crud::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'avatar' => $filename ?? null,
        ]);
        // Crud::create($request->all());
        return redirect()->route('crud.index')
            ->with('success', 'Product Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Crud $crud)
    {
        return view('Crud.edit', compact('crud'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Crud $crud)
    {

        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'avatar' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        $input = $request->all();
        if ($image = $request->file('avatar')) {
            $destinationPath = 'image/';
            $filename = date('YmdHi') . $image->getClientOriginalName();
            $image->move(public_path($destinationPath), $filename);
            $input['avatar'] = "$filename";
        } else {
            unset($input['avatar']);
        }
        $crud->update($input);
        return redirect()->route('crud.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Crud $crud)
    {
        $crud->delete();
        return redirect()->route('crud.index')->with('success', 'User Delete Successfully');
    }
}
