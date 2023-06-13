@extends('layouts.admin')
@section('title', 'イベント情報の編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>イベント情報編集</h2>
                <form action="{{ route('admin.event.update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="event_name">イベント名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="event_name" value="{{ $event_form->event_name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="place">会場/開催時間</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="place" value="{{ $event_form->place }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="event_url">関連URL</label>
                        <div class="col-md-10">
                            <input type="url" class="form-control" name="event_url" value="{{ $event_form->event_url }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $event_form->id }}">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
                <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h2>編集履歴</h2>
                        <ul class="list-group">
                            @if ($event_form->events_histories != NULL)
                                @foreach ($event_form->events_histories as $e_history)
                                    <li class="list-group-item">{{ $e_history->edited_at }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection