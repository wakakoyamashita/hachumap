@extends('layouts.admin')
@section('title', 'イベント情報作成')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>イベント情報作成</h2>
                <form action="{{ route('admin.event.create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">イベント名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="event_name" value="{{ old('event_name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">会場／時間</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="place" value="{{ old('place') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">関連url</label>
                        <div class="col-md-10">
                            <input type="url" class="form-control" name="shop_url" value="{{ old('shop_url') }}">
                        </div>
                    </div>
                    @csrf
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection