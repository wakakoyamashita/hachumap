@extends('layouts.header')

@section('title', 'ショップ一覧')

@section('content')
    <div class="container">
        <div class="row">
            <div class="posts mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{ $post->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="shop_name">
                                    {{ Str::limit($post->shop_name, 150) }}
                                </div>
                                <div class="shop_url">
                                    <a href={{ Str::limit($post->shop_url, 500) }}>{{ Str::limit($post->shop_url, 500) }}</a>
                                </div>
                                <div class="descrinption mt-3">
                                    {{ Str::limit($post->description, 1500) }}
                                </div>
                            </div>
                            <div class="image col-md-6 text-right mt-4">
                                @if ($post->image_path)
                                    <img src="{{ secure_asset('storage/image/' . $post->image_path) }}">
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection