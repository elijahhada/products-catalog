<?php

namespace App\Http\Controllers;

use App\Catalog;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('list', ['products' => $products]);
    }

    public function create()
    {
        $catalogs = Catalog::whereNotNull('parent_id')->get();
        return view('create', ['catalogs' => $catalogs]);
    }

    public function store(Request $request)
    {
        $files_paths = [];
        foreach($request->file('picture') as $file){
            $filename = uniqid($request->title . "_") . "." . $file->getClientOriginalExtension();
            Storage::disk('public')->put($filename, File::get($file));
            array_push($files_paths, $filename);
        }
        
        Product::create([
            'title' => $request->title,
            'price' => $request->price,
            'color' => $request->color,
            'size' => $request->size,
            'catalog_id' => $request->catalog_id,
            'pictures' => implode(",", $files_paths)
        ]);

        return redirect()->route('list');
    }

    public function show(Request $request)
    {
        $product = Product::findOrFail($request->id);
        return view('show', ['product' => $product]);
    }
}
