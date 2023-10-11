@extends('layouts.owner.app')

{{-- パンくず --}}
@section('breadcrumb')
    <ol>
        <li><a href="{{ route('owner.home') }}">ホーム</a></li>
    </ol>
@endsection

{{-- 画面名 --}}
@section('pageTitle', 'ホーム')

{{-- ページコンテンツ --}}
@section('content')
    <div class="">
        <div>{{ Auth::guard('owners')->user()->name }}</div>
    </div>
@endsection


