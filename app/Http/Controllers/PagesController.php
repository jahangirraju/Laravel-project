<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(1);
        return view('pages.index', compact('products'));
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function products()
    {
        $products = Product::orderBy('id', 'desc')->paginate(10);
        return view('pages.product.index')->with('products', $products);
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();
        if (!is_null($product)) {
            return view('pages.product.show', compact('product'));
        }else {
            session()->flash('errors', 'Sorry !! There is no product by this URL..');
            return redirect()->route('products');
        }
    }

    public function search (Request $request)
    {
        
        $search = $request->search;
        $also = '%' . $search . '%';

        $products = Product::orWhere('title', 'like',  $also)
        ->orWhere('description', 'like',  $also)
        ->orWhere('price', 'like',  $also)
        ->orWhere('quantity', 'like',  $also)
        ->orderBy('id', 'desc')
        ->paginate(10);

        return view('pages.product.search', compact( 'search', 'products'));
    }

} 