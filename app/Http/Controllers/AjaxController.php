<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getDataBuku($category_id)
    {
        $books = Books::where('category_id', $category_id)->get();
        return response()->json(['data' => $books, 'message' => 'Fetch Success!!']);
    }
    public function getBuku($buku_id)
    {
        try {
            $book = Books::where('id', $buku_id)->first();
            // $book=Book::find($buku_id);
            // $book=Book::firstOrfail($buku_id);
            return response()->json(['data' => $book, 'message' => 'Fetch Success']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()]);
        }
    }
}
