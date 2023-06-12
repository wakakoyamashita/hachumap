<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Shop;

use App\Models\History;

use Carbon\Carbon;

class ShopController extends Controller
{
    public function add()
    {
        return view('admin.shop.create');
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Shop::$rules);

        $shop = new Shop;
        $form = $request->all();

    // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $shop->image_path = basename($path);
        } else {
            $shop->image_path = null;
        }
        
    // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['image']);

        // データベースに保存する
        $shop->fill($form);
        $shop->save();

        return redirect('admin/shop');
    }
    
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            $posts = Shop::where('shop_name', $cond_title)->get();
        } else {
            // それ以外はすべてのニュースを取得する
            $posts = Shop::all();
        }
        return view('admin.shop.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    public function edit(Request $request)
    {
        // News Modelからデータを取得する
        $shop = Shop::find($request->id);
        if (empty($shop)) {
            abort(404);
        }
        return view('admin.shop.edit', ['shop_form' => $shop]);
    }

    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, Shop::$rules);
        // News Modelからデータを取得する
        $shop = Shop::find($request->id);
        // 送信されてきたフォームデータを格納する
        $shop_form = $request->all();
        
        if ($request->remove == 'true') {
            $shop_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $shop_form['image_path'] = basename($path);
        } else {
            $shop_form['image_path'] = $shop->image_path;
        }

        unset($shop_form['image']);
        unset($shop_form['remove']);
        unset($shop_form['_token']);


        // 該当するデータを上書きして保存する
        $shop->fill($shop_form)->save();
        
        $history = new History();
        $history->shop_id = $shop->id;
        $history->edited_at = Carbon::now();
        $history->save();

        return redirect('admin/shop');
    }
 
    public function delete(Request $request)
    {
        // 該当するNews Modelを取得
        $shop = Shop::find($request->id);

        // 削除する
        $shop->delete();

        return redirect('admin/shop/');
    }   
}