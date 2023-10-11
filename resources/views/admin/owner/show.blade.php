@extends('layouts.admin.app')

{{-- パンくず --}}
@section('breadcrumb')
    <ol>
        <li><a href="{{ route('admin.home') }}">ホーム</a></li>
        <li><a href="{{ route('admin.owner.index') }}">オーナー</a></li>
    </ol>
@endsection

{{-- 画面名 --}}
@section('pageTitle', 'オーナー詳細')

{{-- ページコンテンツ --}}
@section('content')
    <div class="one-content">

        <div class="content-title" >
            基本情報
        </div>
        <div class="content-body" >

            {{ $owner }}
        </div>
    </div>
@endsection
