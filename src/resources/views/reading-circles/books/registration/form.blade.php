@extends('reading-circles._layouts.base')

@section('main')
<form action="/reading-circles/books/registration/action" method="POST">
    @csrf
    <div class="form-group">
        <label class="control-label" for="inputIsbn" >ISBN</label>
        <input class="form-control" type="text" id="inputIsbn">
    </div>
    <div class="form-group">
        <label class="control-label" for="inputTitle" >書籍タイトル</label>
        <input class="form-control" type="text" id="inputTitle">
    </div>
    <input class="btn btn-primary" type="submit" value="登録" id="registerButton">
</form>
@endsection
