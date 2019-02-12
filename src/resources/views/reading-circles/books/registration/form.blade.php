@extends('reading-circles._layouts.base')

@section('main')
<form action="/reading-circles/books/registration/action" method="POST">
    @csrf
    <input type="submit" value="登録" id="registerButton">
</form>
@endsection
