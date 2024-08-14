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
}
