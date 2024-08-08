<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\Category;

class Bookscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Books::with('category')->get();

        return view('books.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('books.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)//to insert
    {
        $user = new Books;
        $user->category_id = $request->category_id;
        $user->judul = $request->judul;
        $user->jumlah = $request->jumlah;
        $user->penerbit = $request->penerbit;
        $user->tahun_terbit = $request->tahun_terbit;
        $user->penulis = $request->penulis;
        $user->save();

        //cara ke dua
        // User::create([
        //     'name' => $request -> name,
        //     'email' => $request -> email,
        //     'password' => $request -> password,
        // ]);
        // User::create($request->all());
        return redirect()->to('books')->with('message', 'Data berhasil diubah');
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
        $edit = Books::find($id);
        return view('books.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Books::find($id);
        Books::where('id', $id)->update([
            'category_id' => $request->category_id,
            'judul' => $request->judul,
            'jumlah' => $request->jumlah,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'penulis' => $request->penulis,

        ]);
        // $user = User::find($id);
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = $request->password;
        // $user->save();

        return redirect()->to('books')->with('message', 'Data berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Books::find($id)->delete();
        return redirect()->to('books')->with('message', 'Data berhasil dihapus');
    }
}
