@extends('layouts.admin')
@section('title', 'イベント情報一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>イベント情報一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('admin.event.add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ route('admin.event.index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">イベント名</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-event col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="5%">ID</th>
                                <th width="15%">イベント名</th>
                                <th width="40%">開催日時/会場</th>
                                <th width="40%">関連URL</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $event)
                                <tr>
                                    <th>{{ $event->id }}</th>
                                    <td>{{ Str::limit($event->event_name, 100) }}</td>
                                    <td>{{ Str::limit($event->place, 250) }}</td>
                                    <td>{{ Str::limit($event->event_url, 250) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ route('admin.event.edit', ['id' => $event->id]) }}">編集</a>
                                        </div>
                                        <div>
                                            <a href="{{ route('admin.event.delete', ['id' => $event->id]) }}">削除</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection