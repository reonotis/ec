@extends('layouts.admin.app')

{{-- パンくず --}}
@section('breadcrumb')
    <ol>
        <li><a href="{{ route('admin.home') }}">ホーム</a></li>
    </ol>
@endsection

{{-- 画面名 --}}
@section('pageTitle', 'オーナー検索')

{{-- ページコンテンツ --}}
@section('content')
    <div class="">
        <div class="">
            <a href="{{ route('admin.owner.create') }}" class="submit">新しくオーナーを作成</a>
        </div>

        <div class="one-content mx-auto my-5 p-6" style="width: 700px;">
            <form action="{{ route('admin.owner.search') }}" method="post" >
                @csrf
                <div class="form-one-line">
                    @component('components.input.input-one-items', [
                        'type' => 'text',
                        'label_name' => 'オーナー名',
                        'form_name' => 'name',
                        'id' => 'name',
                        'value' => old('name', $search['name']),
                    ])
                    @endcomponent
                </div>
                <div class="form-one-line">
                    @component('components.input.input-one-items', [
                        'type' => 'email',
                        'label_name' => 'メールアドレス',
                        'form_name' => 'email',
                        'id' => 'email',
                        'value' => old('email'),
                    ])
                    @endcomponent
                </div>
                <input type="submit" name="" value="検索">
            </form>
        </div>

        @if(isset($owners))
            <div class="">
                @if($owners->count())
                    <table class="list-tbl">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>名前</th>
                                <th>メールアドレス</th>
                                <th>店舗</th>
                                <th>詳細</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($owners as $owner)
                                <tr>
                                    <td class="text-center">{{ $owner->id }}</td>
                                    <td>{{ $owner->name }}</td>
                                    <td>{{ $owner->email }}</td>
                                    <td>-</td>
                                    <td class="text-center"><a href="{{ route('admin.owner.show', ['owner' => $owner->id]) }}">詳細を見る</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        @endif
    </div>
@endsection
