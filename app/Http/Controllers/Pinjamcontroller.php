<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Anggota;
use App\Models\Pinjam;
use App\Models\DetailPinjam;
use Illuminate\Support\Facades\Auth;
use Alert;


class Pinjamcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = pinjam::with('anggota')->get();
        return view('pinjam.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        $anggotas = Anggota::get();
        $kode_unik = Pinjam::get()->last();
        $id_pinjam = isset($kode_unik->id) ? ($kode_unik->id == "" ? 1 : $kode_unik->id) : '';
        $id_pinjam++;
        $kode_transaksi = "PJM" . date("dmY") . sprintf("%03s", $id_pinjam);

        return view('pinjam.create', compact('categories', 'anggotas', 'kode_transaksi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)//to insert
    {
        // $category = new category;
        // $category->category_name = $request->category_name;

        // $pinjam->save();

        //cara ke dua
        $pinjam = Pinjam::create([
            'kode_transaksi' => $request->kode_transaksi,
            'anggota_id' => $request->anggota_id,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali,
            'petugas' => (Auth::user()->name ?? 'ajii'),
        ]);
        if ($pinjam) {
            foreach ($request->buku_id as $key => $val) {
                DetailPinjam::create([
                    'pinjam_id' => $val,
                    'buku_id' => $pinjam->id,
                ]);
            }
        }
        // Alert::success('GoodJob, Transaksi Pinjam Berhasil di Buat');
        // User::create([
        //     'name' => $request -> name,
        //     'email' => $request -> email,
        //     'password' => $request -> password,
        // ]);
        // User::create($request->all());
        return redirect()->to('pinjam')->with('message', 'Data berhasil diubah');// return redirecy
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
