<html>
<head>
</head>
<body>
    <form action="/reading-circles/auth" method="POST">
        @csrf
        <input type="text" name="loginId"><br>
        <input type="submit" value="ログイン">
    </form>
</body>
</html>
