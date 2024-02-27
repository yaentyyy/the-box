<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Truyen;
use App\Models\DanhmucTruyen;
use App\Models\Chapter;

class IndexController extends Controller
{
    // public function timkiem_ajax(Request $request){
    //     $data = $request->all();

    //     if($data['keywords']){
    //         $truyen = Truyen::where('kichhoat',0)->where('tentruyen','LIKE','%'.$data['keywords'].'%')->get();

    //         $output ='<ul class="dropdown-menu" style="display:block;">';
    //         foreach($truyen as $key => $tr){
    //             $output .='<li class="li_search_ajax"><a href="#">'.$tr->tentruyen.'</a></li>';

    //         }
    //         $output  .= '</ul>';
    //         echo $output;
    //     }
    // }
}
