<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Truyen;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chapter = Chapter::with('truyen')->orderBy('id','DESC')->get();
        return view("admincp.chapter.index")->with(compact("chapter"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $truyen = Truyen::orderBy('id','DESC')->get();
        return view("admincp.chapter.create")->with(compact("truyen"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate
        (
            [
            'tieude' => 'required|unique:chapter|max:255',
            'slug_chapter' => 'required|unique:chapter|max:255',
            'tomtat' => 'required',
            'kichhoat'=> 'required',
            'noidung'=> 'required',
            'truyen_id'=> 'required',
            ],

            [
            'tieude.unique'=> 'Tiêu đề đã tồn tại, vui lòng chọn tiêu đề khác!',
            'slug_chapter.unique'=> 'Slug đã tồn tại, vui lòng chọn slug khác!',
            'tieude.required' => 'Bạn cần phải nhập tiêu đề!',
            'tomtat.required' => 'Bạn cần phải nhập tóm tắt!',
            'slug_chapter.required' => 'Bạn cần phải nhập slug!',
            'noidung.required' => 'Bạn cần phải nhập nội dung!',
            ],
        );
        $chapter = new Chapter();
        $chapter->tieude = $data['tieude'];
        $chapter->slug_chapter = $data['slug_chapter'];
        $chapter->tomtat = $data['tomtat'];
        $chapter->kichhoat = $data['kichhoat'];
        $chapter->noidung = $data['noidung'];
        $chapter->truyen_id = $data['truyen_id'];
        
        $chapter->save();
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
        $chapter = Chapter::find($id);
        $truyen = Truyen::orderBy('id','DESC')->get();
        return view("admincp.chapter.edit")->with(compact("truyen", "chapter"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate
        (
            [
            'tieude' => 'required|max:255',
            'slug_chapter' => 'required|max:255',
            'tomtat' => 'required',
            'kichhoat'=> 'required',
            'noidung'=> 'required',
            'truyen_id'=> 'required',
            ],

            [
            'tieude.unique'=> 'Tiêu đề đã tồn tại, vui lòng chọn tiêu đề khác!',
            'slug_chapter.unique'=> 'Slug đã tồn tại, vui lòng chọn slug khác!',
            'tieude.required' => 'Bạn cần phải nhập tiêu đề!',
            'tomtat.required' => 'Bạn cần phải nhập tóm tắt!',
            'slug_chapter.required' => 'Bạn cần phải nhập slug!',
            'noidung.required' => 'Bạn cần phải nhập nội dung!',
            ],
        );
        $chapter = Chapter::find($id);
        $chapter->tieude = $data['tieude'];
        $chapter->slug_chapter = $data['slug_chapter'];
        $chapter->tomtat = $data['tomtat'];
        $chapter->kichhoat = $data['kichhoat'];
        $chapter->noidung = $data['noidung'];
        $chapter->truyen_id = $data['truyen_id'];
        
        $chapter->save();
        return redirect()->back()->with('status', 'Bạn đã cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Chapter::find($id)->delete();
        return redirect()->back()->with('status', 'Bạn đã xóa thành công!');
    }
}
