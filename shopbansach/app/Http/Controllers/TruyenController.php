<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhmucTruyen;
use App\Models\Truyen;

class TruyenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_truyen = Truyen::with('danhmuctruyen')->orderBy('id','DESC')->get();

        return view("admincp.truyen.index")->with(compact('list_truyen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();
        return view("admincp.truyen.create") -> with(compact("danhmuc"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate
        (
            [
            'tentruyen' => 'required|unique:truyen|max:255',
            'slug_truyen' => 'required|unique:truyen|max:255',
            'hinhanh'=> 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,
                min-height=100,max_width=2000,max_height=2000',
            'tomtat' => 'required',
            'tacgia' => 'required',
            'kichhoat'=> 'required',
            'danhmuc'=> 'required',
            ],

            [
            'tentruyen.unique'=> 'Tên truyện đã tồn tại, vui lòng chọn tên khác!',
            'slug_truyen.unique'=> 'Slug truyện đã tồn tại, vui lòng chọn slug khác!',
            'tentruyen.required' => 'Bạn cần phải nhập tên truyện!',
            'tomtat.required' => 'Bạn cần phải nhập tóm tắt truyện!',
            'tacgia.required' => 'Bạn cần phải nhập tên tác giả!',
            'hinhanh.required' => 'Bạn cần phải chọn một tệp ảnh!',
            'slug_truyen.required' => 'Bạn cần phải nhập slug!',
            'hinhanh.dimensions' => 'Kích thước hình ảnh không phù hợp! Vui lòng chọn hình ảnh có kích thước tối thiểu 100x100 và tối đa 1000x1000.',
            ],
        );
        $truyen = new Truyen();
        $truyen->tentruyen = $data['tentruyen'];
        $truyen->tacgia = $data['tacgia'];
        $truyen->slug_truyen = $data['slug_truyen'];
        $truyen->tomtat = $data['tomtat'];
        $truyen->kichhoat = $data['kichhoat'];
        $truyen->danhmuc_id = $data['danhmuc'];
        //thêm ảnh vào folder
        $get_image = $request->hinhanh;
        $path = 'public/uploads/truyen/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image ->move($path, $new_image);
        $truyen->hinhanh = $new_image;
        $truyen->save();
        return redirect()->back()->with('status', 'Bạn đã thêm thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $truyen = Truyen::find( $id );
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();
        return view("admincp.truyen.edit")->with(compact('truyen','danhmuc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate
        (
            [
            'tentruyen' => 'required|max:255',
            'slug_truyen' => 'required|max:255',
            'tomtat' => 'required',
            'tacgia' => 'required',
            'kichhoat'=> 'required',
            'danhmuc'=> 'required',
            ],

            [
            'tentruyen.unique'=> 'Tên truyện đã tồn tại, vui lòng chọn tên khác!',
            'slug_truyen.unique'=> 'Slug truyện đã tồn tại, vui lòng chọn slug khác!',
            'tentruyen.required' => 'Bạn cần phải nhập tên truyện!',
            'tacgia.required' => 'Bạn cần phải nhập tên tác giả!',
            'tomtat.required' => 'Bạn cần phải nhập tóm tắt truyện!',
            'slug_truyen.required' => 'Bạn cần phải nhâp slug!',
            'hinhanh.dimensions' => 'Kích thước hình ảnh không phù hợp! Vui lòng chọn hình ảnh có kích thước tối thiểu 100x100 và tối đa 1000x1000.',
            ],
        );
        $truyen = Truyen::find($id);
        $truyen->tentruyen = $data['tentruyen'];
        $truyen->tacgia = $data['tacgia'];
        $truyen->slug_truyen = $data['slug_truyen'];
        $truyen->tomtat = $data['tomtat'];
        $truyen->kichhoat = $data['kichhoat'];
        $truyen->danhmuc_id = $data['danhmuc'];
        //thêm ảnh vào folder
        $get_image = $request->hinhanh;
        if($get_image) 
        {
            $path = 'public/uploads/truyen/'.$truyen->hinhanh;
            if(file_exists($path)) 
            {
                unlink($path);
            }
            $path = 'public/uploads/truyen/';   
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image ->move($path, $new_image);
            $truyen->hinhanh = $new_image;
        }
        $truyen->save();
        return redirect()->back()->with('status', 'Bạn đã cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $truyen = Truyen::find($id);
        $path = 'public/uploads/truyen/'.$truyen->hinhanh;
        if(file_exists($path)) 
        {
            unlink($path);
        }
        Truyen::find($id)->delete();
        return redirect()->back()->with('status','Bạn đã xóa thành công!');
    }
}
