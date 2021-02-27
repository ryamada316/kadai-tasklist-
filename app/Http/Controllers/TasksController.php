<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;    // モデルの名前空間追加

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // タスク一覧を取得
        $tasks = Task::all();

        // タスク一覧ビューでそれを表示
        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }
    
    // getでアクセスされた場合の「新規登録画面表示処理」
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //新規作成
        $tasks = new Task;

        // メッセージ作成ビューを表示
        return view('tasks.create', [
            'tasks' => $tasks,
        ]);
    }

    // postでアクセスされた場合の「新規登録処理」
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // 作成
        $tasks = new Task;
        $tasks->content = $request->content;
        $tasks->save();

        // トップページへリダイレクトさせる
        return redirect('/');
    }

    // getで（任意のid）にアクセスされた場合の「取得表示処理」
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // idの値でメッセージを検索して取得
        $tasks = Task::findOrFail($id);

        // メッセージ詳細ビューでそれを表示
        return view('tasks.show', [
            'tasks' => $tasks,
        ]);
    }

    // getで（任意のid）にアクセスされた場合の「更新画面表示処理」
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // idの値でメッセージを検索して取得
        $tasks = Task::findOrFail($id);

        // メッセージ編集ビューでそれを表示
        return view('tasks.edit', [
            'tasks' => $tasks,
        ]);
    }

    // putまたはpatchで（任意のid）にアクセスされた場合の「更新処理」
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // idの値でメッセージを検索して取得
        $tasks = Task::findOrFail($id);
        // メッセージを更新
        $tasks->content = $request->content;
        $tasks->save();

        // トップページへリダイレクトさせる
        return redirect('/');
    }


    // deleteで（任意のid）にアクセスされた場合の「削除処理」
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // idの値でメッセージを検索して取得
        $tasks = Task::findOrFail($id);
        // メッセージを削除
        $tasks->delete();

        // トップページへリダイレクトさせる
        return redirect('/');
    }
}