<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;    // モデルの名前空間追加
use App\User;    // モデルの名前空間追加

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    /*
    public function index()
    {
        // タスク一覧を取得
        //$tasks = Task::all();
        $tasks = Task::orderBy('id')->paginate(5);

        // タスク一覧ビューでそれを表示
        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }
    */

    /*
    public function index()
    {
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();

            // ユーザのタスク一覧を作成日時順で取得
            //$tasks = $user->tasks()->orderBy('created_at')->paginate(5);

          // タスク一覧ビューでそれを表示
            //return view('tasks.index', [
            //    'tasks' => $tasks,
            //]);
            
            // Welcomeビューでそれらを表示
            return view('welcome', $data);

        }

    }
    */

    public function index()
    {
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            
            $data = [
                'user' => $user,
            ];

        // Welcomeビューでそれらを表示
            return view('welcome', $data);
        }
        else {
            return view('welcome', $data);
        }
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

        // タスク作成ビューを表示
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
        // バリデーション
        $request->validate([
            'content' => 'required|max:255',
            'status' => 'required|max:10', 
        ]);
        
        // タスクを作成
        $tasks = new Task;
        $tasks->content = $request->content;
        $tasks->status = $request->status;
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
        // idの値でタスクを検索して取得
        $tasks = Task::findOrFail($id);

        // タスク詳細ビューでそれを表示
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
        // idの値でタスクを検索して取得
        $tasks = Task::findOrFail($id);

        // タスク編集ビューでそれを表示
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

        // バリデーション
        $request->validate([
            'content' => 'required|max:255',
            'status' => 'required|max:10',  
        ]);
        
        // idの値でタスクを検索して取得
        $tasks = Task::findOrFail($id);
        // タスクを更新
        $tasks->content = $request->content;
        $tasks->status = $request->status;
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
