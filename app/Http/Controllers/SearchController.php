<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function IndexSearch(Request $request) {
        $keyword = $request->input('keyword_submit');
    
        $search_items = DB::table('tbl_product')
            ->where('product_name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('product_price', 'LIKE', '%' . $keyword . '%')
            ->get();
    
        return view('pages.search', ['search_items' => $search_items]);
    }
    

}
