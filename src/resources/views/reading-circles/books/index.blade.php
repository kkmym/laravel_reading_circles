@extends('reading-circles._layouts.base')

@section('main')
<h1>書籍一覧</h1>
<p><a href="/reading-circles/books/registration/form">新しく書籍を追加する</a></p>

<table class="table">
<thead>
    <tr>
        <th>ISBN</th>
        <th>書名</th>
        <th>この本を使った輪読会</th>
    </tr>
</thead>
<tbody>
@if (isset($bookList) && count($bookList) > 0)
    @foreach ($bookList as $book)
    <tr>
        <td>{{ $book->isbn() }}</td>
        <td>{{ $book->title() }}</td>
        <td><a href="{{ $book->linkToCircleList() }}">リンク</a></td>
    </tr>
    @endforeach
@else
    <tr>
        <td colspan="3">登録されている書籍はありません</td>
    </tr>
@endif
</tbody>
</table>
@endsection
