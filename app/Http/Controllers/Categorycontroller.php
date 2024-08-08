<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class Categorycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Category::get();
        return view('category.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)//to insert
    {
        $category = new category;
        $category->category_name = $request->category_name;

        $category->save();

        //cara ke dua
        // User::create([
        //     'name' => $request -> name,
        //     'email' => $request -> email,
        //     'password' => $request -> password,
        // ]);
        // User::create($request->all());
        return redirect()->to('category');
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
        // $user = User::where('id', $id)->first();
        $edit = Category::find($id);
        return view('category.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        Category::where('id', $id)->update([
            'category_name' => $request->category_name,
        ]);
        // $user = User::find($id);
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = $request->password;
        // $user->save();

        return redirect()->to('category')->with('message', 'Data berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::find($id)->delete();
        return redirect()->to('category')->with('message', 'Data berhasil dihapus');
    }
}
