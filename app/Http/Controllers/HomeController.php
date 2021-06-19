<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $productNew = Product::with('gallery')->orderByDesc('created_at')->get();
        return view('home',[
            'productNew' => $productNew,
        ]);
    }
}
