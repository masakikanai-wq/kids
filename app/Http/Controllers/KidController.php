<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Kidモデルを呼び出す
use App\Models\Kid;

// KidRequestでバリデーションを実施
use App\Http\Requests\KidRequest;

class KidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Kidモデルを使用し、all()でdbからすべてのデータを取得する
        $kids = Kid::all();
        // 配列の形で$kidsをindex.blade.phpに受け渡す
        return view('index', ['kids'=>$kids]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        //
        return view('add');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(KidRequest $request)
    {
        // リクエストされた情報を全て受け取る処理
        // $inputs = $request->all();

        $kid = new Kid;

        $kid->name = $request->input('name');
        $kid->sex = $request->input('sex');
        $kid->birthday = $request->input('birthday');
        $kid->father_name = $request->input('father');
        $kid->mother_name = $request->input('mother');
        $kid->gridRadios = $request->input('gridRadios');
        $kid->memo = $request->input('memo');

        // 一時保存
        // $kid->created_at = $request->input('created_at');
        // $kid->updated_at = $request->input('updated_at');

        $kid->save();

        // 一時保存
        // Kid::create($inputs);

        // 一時保存
        // \DB::beginTransaction();
        // try {
        //     // 記事を登録する
        //     Kid::create($kid);
        //     \DB::commit();
        // } catch(\Throwable $e) {
        //     \DB::rollback();
        //     abort(500);
        // }

        // 記事が登録されたときのフラッシュを表示
        \Session::flash('errors', 'たんじょうびを登録しました');

        return redirect(route('index'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $kid = Kid::find($id);
        return view('detail', ['kid'=>$kid]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $kid = Kid::findOrFail($id);
        return view('edit', ['kid' => $kid]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KidRequest $request, $id)
    {
        //
        $inputs = [
            'name' => $request->name,
            'sex' => $request->sex,
            'birthday' => $request->birthday,
            'father_name' => $request->father,
            'mother_name' => $request->mother,
            'gridRadios' => $request->gridRadios,
            'memo' => $request->memo
        ];

        $kid = Kid::findOrFail($request->id);
        $kid->fill($inputs)->save();

        // 記事が登録されたときのフラッシュを表示
        \Session::flash('errors', 'データを更新しました');

        return redirect(route('index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $kid = Kid::findOrFail($id);
        $kid->delete();

        \Session::flash('errors', 'データを削除しました');

        return redirect(route('index'));
    }
}
