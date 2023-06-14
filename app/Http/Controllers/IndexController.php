<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Shop;
use App\Models\Event;

class IndexController extends Controller
{
    public function shopindex(Request $request)
    {
        $posts = Shop::all()->sortByDesc('updated_at');

        // news/index.blade.php ファイルを渡している
        // また View テンプレートに headline、 posts、という変数を渡している
        return view('shop.index', ['posts' => $posts]);
    }
    
    public function eventindex(Request $request)
    {
        $posts = Event::all()->sortByDesc('updated_at');

        // news/index.blade.php ファイルを渡している
        // また View テンプレートに headline、 posts、という変数を渡している
        return view('event.index', ['posts' => $posts]);
    }

    public function index()
    {
        // news/index.blade.php ファイルを渡している
        // また View テンプレートに headline、 posts、という変数を渡している
        return view('top');
    }
    
}
