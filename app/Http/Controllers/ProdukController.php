<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Category;

class ProdukController extends Controller
{
    public function tampilProduk(){

        $title = '';

        if( request('category') ){
            $category = Category::firstWhere('slug', request('category'));
            $title = $category->name;
        }


        return view('produk', [
            'title' => 'Produk',
            'judul' => 'All Products',
            'produk' => Produk::orderBy('category_id', 'asc')->filter(request(['search', 'category']))->paginate(15)->withQueryString(),
            'categories' => Category::all(),
            ''
        ]);
    }

    public function about(){
        return view('about', [
            'title' => 'Rizky Andriawan',
            'alias' => 'Ghelgameshra',
            'subtitle' => 'Student of Infomatics Engineering',
            'email' => 'rizkyandriawan33478@gmail.com',
            'lecturer' => 'Sonhaji Akbar S.Pd,. M.Kom',
            'address' => 'Wonosari, Kabupaten Malang, Jawa Timur'
        ]);
    }


}
