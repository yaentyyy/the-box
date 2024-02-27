<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhmucTruyen;
use App\Models\Truyen;
use App\Models\User;
use App\Models\Chapter;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();
        $truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->get();
        return view('home')->with(compact('danhmuc','truyen'));
    }
    public function userr()
    {
        $list = User::with('userr')->orderBy('id','DESC')->get();

        return view("users")->with(compact('list'));
    }
    

    // public function danhmuc($slug){
    //     $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();
    //     return view('danhmuc')->with(compact('danhmuc','slug'));
    // }
    public function timkiem(){
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();
        $tukhoa = $_GET['tukhoa'];
        $truyen = Truyen::with('danhmuctruyen',)->where('tentruyen','LIKE','%'.$tukhoa.'%')->orWhere('tacgia','LIKE','%'.$tukhoa.'%')->get();
        return view('timkiem')->with(compact('danhmuc','truyen','tukhoa'));
    }
}
