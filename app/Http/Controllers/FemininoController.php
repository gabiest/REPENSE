<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\DB;

class FemininoController extends Controller
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        // return view('repense.feminino')->with('category', Category::where('gender', 'like', '%Feminino%'));
        // $products = Product::with(['categories' => function ($query) {$query->where('name', 'LIKE', '%Feminino%'); }])->get();
        // dd($products);
        $products = Product::whereHas('categories', function ($query) {
            $query->where('name', 'like', '%Feminino');
        })->get();
        return view('repense.feminino', compact('products'));
    }


    public function single($id)
    {
        return view('repense.visualizarProduto', ['products' => Product::findOrFail($id)]);
    }


    public function searchSize(Request $request){
        $gender = $request->query('gender');
        $size  = $request->query('size');
        $category = Category::where('gender', 'LIKE', "%{$gender}%")->first();
        $product = $category->products()->where('size' , 'LIKE' , "%{$size}%")->get();
        return view('repense.feminino')->with('products' , $product);
    }
}
