<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Carbon;


class DashboardProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.products.index', [
            'title' => 'Horizon Dashboard | Products',
            'products' => Produk::orderBy('category_id')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.products.create', [
            'title' => 'Horizon Dashboard | Add Product',
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required',
            'name' => 'required|max:255',
            'slug' => 'required|unique:produks',
            'price' => 'required'
        ]);

        // gabung kode lama dengan tanggal data ditambah
        // Ymd -> Year, Month, Day
        // His -> Hour, Minute, Second
        $validatedData['slug'] = $request->slug . "-" . now()->format('Ymd-His');

        Produk::create( $validatedData );

        return redirect('/dashboard/products')->with('success', 'New product has been added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $product)
    {
        // dd($product);

        return view('dashboard.products.show', [
            'title' => $product->name,
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $product)
    {
        return view('dashboard.products.edit', [
            'title' => 'Edit Details',
            'product' => $product,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $product)
    {
        
        if( $request->slug != $product->slug ){
            $rules['slug'] = 'required|unique:produks';
        }

        $rules = [
            'category_id' => 'required',
            'name' => 'required|max:255',
            'price' => 'required'
        ];
        
        
        $validatedData = $request->validate($rules);
        
        Produk::where( 'id', $product->id )
            ->update($validatedData);
        
        return redirect('/dashboard/products')->with('success', 'A product has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $product)
    {
        Produk::destroy( $product->id );

        return redirect('/dashboard/products')->with('success', 'New product has been deleted!');
    }

    public function checkSlug( Request $request ){
        $slug = SlugService::createSlug(Produk::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
