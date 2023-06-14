@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <a href="{{ route('admin.shop.index') }}">ショップ情報編集</a>
                <a href="{{ route('admin.event.index') }}">イベント情報編集</a>
            </div>
        </div>
    </div>
</div>
@endsection
