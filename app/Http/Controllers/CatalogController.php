<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 26.02.2016
 * Time: 20:56
 */

namespace App\Http\Controllers;

use App\OrderPosition;
use App\Product;
use App\ProductCategory;

class CatalogController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('web');
//    }

    public function index()
    {
        $products = Product::latest('created_at')->take(10)->get();
        $categories = ProductCategory::orderBy('name', 'desc')->get();
        return view('catalog.index', compact('products', 'categories'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('catalog.show', compact('product'));
    }

    public function inCategory($id)
    {
        $category = ProductCategory::findOrFail($id);
        return view('catalog.in_category', compact('category'));
    }
}