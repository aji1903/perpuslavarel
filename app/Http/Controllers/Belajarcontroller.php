<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Belajarcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "Selamat Datang Laravel";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return "ini halaman create";
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
    public function edit($id)
    {
        return "ini adalah halaman edit dengan nama param " . $id;
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

    public function tambah()
    {
        $jumlah = 0;
        return view('tambah', compact('jumlah'));
    }
    public function storeTambah(Request $request)// request sama seperti $_POST
    {
        $angka1 = $request->angka1;
        $angka2 = $request->angka2;

        $jumlah = $angka1 + $angka2;
        return view('tambah', compact('jumlah'));

        // return "Jumlahnya adalah" . $jumlah;
    }
    public function kurang()
    {
        $jumlah = 0;
        return view('kurang', compact('jumlah'));
    }
    public function storeKurang(Request $request)
    {
        $angka1 = $request->angka1;
        $angka2 = $request->angka2;

        $jumlah = $angka1 - $angka2;
        return view('kurang', compact('jumlah'));

    }
}
