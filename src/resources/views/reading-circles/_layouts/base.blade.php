<!doctype html>
<html lang="ja">
<!-- head -->
<head>
<meta charset="utf-8">
<link href="//stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" rel="stylesheet">
<style>
    .container {margin-top: 24px;}
</style>
</head>
<!-- /head -->
<!-- body -->
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a href="#" class="navbar-brand">ヘッダヘッダヘッダ</a>
</nav>
<div class="container">
@yield('main')
</div>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js"></script>

@yield('js')
</body>
<!-- /body -->
</html>
