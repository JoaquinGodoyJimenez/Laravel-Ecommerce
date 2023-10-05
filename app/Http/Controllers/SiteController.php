<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Http;

class SiteController extends Controller
{
    public function productList(){
        $products = Product::all();
        $categories = Category::all();

        return view('ecommerce.productlist',['products'=>$products, 'categories'=>$categories]);
    }

    public function orders(){
        $response = Http::get('http://localhost:3000/api/v1/buys');
        $orders = $response->object();
        return view('ecommerce.orders', compact('orders'));
    }
}
