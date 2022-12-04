<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{

    public function index(){
        return view('index', [
            'title' => 'Home',
            'judul' => 'Ini halaman home',
            'isi_paragraf' => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur at accusantium commodi ut praesentium neque nisi voluptates laborum, impedit sequi quidem laudantium corporis vitae tempore quae corrupti. Quae optio dolor totam tempore similique ea nemo temporibus a vero, distinctio consequatur iure laboriosam voluptas nulla facere nobis! Harum sed ab eos. Iste nisi assumenda exercitationem labore eius? Repellat cum accusantium error id omnis dolor beatae possimus soluta, tenetur, animi earum odio aut. Deleniti, magni sequi debitis provident dolorem quam possimus excepturi tempora blanditiis eius recusandae doloribus eligendi est obcaecati reiciendis odio iure corrupti. Fuga non praesentium, officia officiis eaque suscipit atque?"
        ]);
    }

    // function show user
    public function show(){
        return view('user');
    }

    // function tambah
    public function tambah(){
        return view('tambah');
    }
}
