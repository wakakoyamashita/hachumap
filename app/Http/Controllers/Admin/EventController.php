<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Event;

class EventController extends Controller
{
    public function add()
    {
        return view('admin.event.create');
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Event::$rules);

        $event = new Event;
        $form = $request->all();

    // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);

        // データベースに保存する
        $event->fill($form);
        $event->save();

        return redirect('admin/event');
    }
    
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            $posts = Event::where('event_name', $cond_title)->get();
        } else {
            // それ以外はすべてのニュースを取得する
            $posts = Event::all();
        }
        return view('admin.event.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    public function edit(Request $request)
    {
        // News Modelからデータを取得する
        $event = Event::find($request->id);
        if (empty($event)) {
            abort(404);
        }
        return view('admin.event.edit', ['event_form' => $event]);
    }

    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, Event::$rules);
        // News Modelからデータを取得する
        $event = Event::find($request->id);
        // 送信されてきたフォームデータを格納する
        $event_form = $request->all();
        
        unset($event_form['remove']);
        unset($event_form['_token']);


        // 該当するデータを上書きして保存する
        $event->fill($event_form)->save();

        return redirect('admin/event');
    }
 
    public function delete(Request $request)
    {
        // 該当するNews Modelを取得
        $event = Event::find($request->id);

        // 削除する
        $event->delete();

        return redirect('admin/event/');
    }   
}