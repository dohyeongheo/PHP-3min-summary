<!DOCTYPE html>
<html>

<head>
    <title>php-memo 로그인</title>
</head>

<body>
    <?php require_once("inc/header.php"); ?>
    <h1>php-memo 로그인</h1>
    <form method="POST" action="./login.post.php">
        <p>
            아이디(이메일) :
            <input type="text" name="login_id" />
        <p>
        <p></p>
        비밀번호 :
        <input type="password" name="login_pw" />
        <p>
        <p><input type="submit" value="로그인"></p>
    </form>
</body>

</html>
