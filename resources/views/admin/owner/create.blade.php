@extends('layouts.admin.app')

{{-- パンくず --}}
@section('breadcrumb')
    <ol>
        <li><a href="{{ route('admin.home') }}">ホーム</a></li>
        <li><a href="{{ route('admin.owner.index') }}">オーナー</a></li>
    </ol>
@endsection

{{-- 画面名 --}}
@section('pageTitle', 'オーナー登録')

{{-- ページコンテンツ --}}
@section('content')
    <div class="one-content mx-5 my-5 p-6" style="width: 700px;">
        <form action="{{ route('admin.owner.store') }}" method="post" >
            @method('post')
            @csrf
            <div class="form-one-line">
                @component('components.input.input-one-items', [
                    'type' => 'text',
                    'label_name' => 'オーナー名',
                    'form_name' => 'name',
                    'id' => 'name',
                    'required' => true,
                    'value' => old('name'),
                ])
                @endcomponent
            </div>
            <div class="form-one-line">
                @component('components.input.input-one-items', [
                    'type' => 'email',
                    'label_name' => 'メールアドレス',
                    'form_name' => 'email',
                    'id' => 'email',
                    'required' => true,
                    'value' => old('email'),
                ])
                @endcomponent
            </div>
            <input type="submit" name="" value="登録">
        </form>
    </div>
@endsection
