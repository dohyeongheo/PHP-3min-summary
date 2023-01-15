<!-- 값이 알파벳과 숫자로만 이루어져 있는지 검사하기 -->

<?php
function valid_str_alpha_numeric($str)
{
    return ctype_alnum((string) $str);
}

$datas = array(
    1, "2", "3AB", "4-", "5하"
);

foreach ($datas as $data) {
    echo "$data : ";
    var_dump(valid_str_alpha_numeric($data));
    echo "<br />";
}
?>

<!--

내장함수 ctype_alnum 을 사용해서 알파벳과 숫자로만 이루어져 있는지 검사한다. 주로 로그인 아이디 등을 검사할 때 사용한다. ctype_alnum 함수는 파라미터로 문자열 타입을 입력받기 때문에 타입 캐스팅해 주었다.

(string) $str
ctype_은 Character type checking의 약자로, 타입 체킹을 담당하는 함수 목록이다. ctype_ 으로 시작하는 함수 목록은 https://www.php.net/manual/en/book.ctype.php 을 참고하면 된다.

 -->
