@extends('layouts.admin')
@section('title', 'ショップ情報作成')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>ショップ情報作成</h2>
                <form action="{{ route('admin.shop.create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">ショップ名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="shop_name" value="{{ old('shop_name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">ショップURL</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="shop_url" value="{{ old('shop_url') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">ショップ説明</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="description" rows="20">{{ old('description') }}</textarea>
                        </div>
                    </div>
                    @csrf
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection