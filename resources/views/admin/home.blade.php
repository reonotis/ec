@extends('layouts.admin.app')

{{-- パンくず --}}
@section('breadcrumb')
    <ol>
        <li><a href="{{ route('admin.home') }}">ホーム</a></li>
    </ol>
@endsection

{{-- 画面名 --}}
@section('pageTitle', 'ホーム')

{{-- ページコンテンツ --}}
@section('content')
    <div class="">

        <div>{{ Auth::user()->name }}</div>


    </div>
@endsection


