<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhmucTruyen;

class DanhmucController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $danhmucTruyen = DanhmucTruyen::orderBy("id","DESC")->get();
        return view("admincp.danhmucTruyen.index") -> with(compact('danhmucTruyen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admincp.danhmucTruyen.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate
        (
            [
            'tendanhmuc' => 'required|unique:danhmuc|max:255',
            'slug_danhmuc' => 'required|unique:danhmuc|max:255',
            'mota' => 'required|max:255',
            'kichhoat'=> 'required',
            ],

            [
            'tendanhmuc.unique'=> 'Tên danh mục đã tồn tại, vui lòng chọn tên khác!',
            'slug_danhmuc.unique'=> 'Slug danh mục đã tồn tại, vui lòng chọn slug khác!',
            'tendanhmuc.required' => 'Bạn cần phải nhập tên danh mục!',
            'mota.required' => 'Bạn cần phải nhập mô tả danh mục!',
            'slug_danhmuc.required' => 'Bạn cần phải nhập slug!',
            ],
        );
        $danhmuctruyen = new DanhmucTruyen();
        $danhmuctruyen->tendanhmuc = $data['tendanhmuc'];
        $danhmuctruyen->slug_danhmuc = $data['slug_danhmuc'];
        $danhmuctruyen->mota = $data['mota'];
        $danhmuctruyen->kichhoat = $data['kichhoat'];
        $danhmuctruyen->save();
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
        $danhmuc = DanhmucTruyen::find($id);
        return view("admincp.danhmucTruyen.edit") -> with(compact('danhmuc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate
        (
            [
            'tendanhmuc' => 'required|max:255',
            'slug_danhmuc' => 'required|max:255',
            'mota' => 'required|max:255',
            'kichhoat'=> 'required',
            ],

            [
            'tendanhmuc.required' => 'Bạn cần phải nhập tên danh mục!',
            'slug_danhmuc.required' => 'Bạn cần phải nhập slug danh mục!',
            'mota.required' => 'Bạn cần phải nhập mô tả danh mục!',
            ],
        );
        $danhmuctruyen = DanhmucTruyen::find($id);
        $danhmuctruyen->tendanhmuc = $data['tendanhmuc'];
        $danhmuctruyen->slug_danhmuc = $data['slug_danhmuc'];
        $danhmuctruyen->mota = $data['mota'];
        $danhmuctruyen->kichhoat = $data['kichhoat'];
        $danhmuctruyen->save();
        return redirect()->back()->with('status', 'Bạn đã cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DanhmucTruyen::find($id)->delete();
        return redirect()->back()->with('status', 'Bạn đã xóa thành công!');
    }
}
