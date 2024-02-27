<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Truyen;

class DetailController extends Controller
{
    // public function truyen1()
    // {
    //     return view('detail.truyen1');
    // }

    // public function truyen2()
    // {
    //     return view('detail.truyen2');
    // }

    // public function truyen3()
    // {
    //     return view('detail.truyen3');
    // }

    // public function truyen4()
    // {
    //     return view('detail.truyen4');
    // }

    // public function truyen5()
    // {
    //     return view('detail.truyen5');
    // }

    // public function truyen6()
    // {
    //     return view('detail.truyen6');
    // }
// updateCard
//     public function getLatestData()
// {
//     $data = DB::table('truyen')->where('id', 1)->first();
//     return response()->json($data);
// }
public function show($id)
{
    // Lấy truyện dựa trên $id
    $truyen = Truyen::find($id);

    // Nếu không tìm thấy truyện, trả về một thông báo lỗi
    if (!$truyen) {
        return redirect('/')->with('error', 'Không tìm thấy truyện');
    }

    // Hiển thị truyện
    return view('truyen.show', compact('truyen'));
}


}
