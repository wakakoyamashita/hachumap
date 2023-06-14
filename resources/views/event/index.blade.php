@extends('layouts.header')

@section('title', 'イベント一覧')

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
                                <div class="event_name">
                                    {{ Str::limit($post->event_name, 150) }}
                                </div>
                                <div class="place mt-3">
                                    {{ Str::limit($post->place, 1500) }}
                                </div>
                                <div class="event_url mt-3">
                                    <a href={{ $post->event_url }}>{{ $post->event_url }}</a>
                                </div>
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