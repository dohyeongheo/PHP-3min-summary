<!-- 값이 숫자인지 검사하기 -->

<?php
function valid_number($input)
{
    $input = strval($input);
    return (bool) preg_match('/^[\-+]?[0-9]*\.?[0-9]+$/', $input);
}

function var_dump_br($val)
{
    var_dump($val);
    echo "<br />";
}

$vals = array(1, 3, 0.14, "5", "9.7", "asd", "024", "051.3", "1337e0"); // 1337e0 = 1259488

foreach ($vals as $val) {
    echo $val;
    echo "<br>";

    var_dump_br(valid_number($val));
    var_dump_br(is_numeric($val));
    echo "<hr />";
}

?>

<!--

php 는 값이 숫자인지 검사하는 함수가 몇 개 있다.

is_numeric() 함수는 타입을 구분하지 않고 float으로 캐스팅될 수 있는지 체크한다. 대부분의 경우 잘 작동하지만 16진수의 경우에도 true 를 반환하는 문제가 있다.
is_int() 함수는 타입을 구분하고 정수인지 체크한다. 따라서 문자열 "1" 은 false를 리턴한다. 형제 함수인 is_float() 과 is_double() 또한 타입을 구분한다.
ctype_digit 함수는 문자열이 숫자로만 이루어져있는지 검사한다. 자연수일때는 잘 작동하지만, 음수거나 실수인 경우 작동하지 않는다. 음수라면 - 기호가 붙을 것이고 실수일 경우 . 기호가 숫자에 존재하기 때문이다.
filter_var + FILTER_VALIDATE_FLOAT 조합은 잘 작동하는 것으로 보인다. 개인적으로는 많이 사용해 보지 않아 검증이 안되어 있으므로 잘 사용하지 않는다.
php 에는 입력된 값의 타입을 구분하지 않고 10진수로 표현 가능한 숫자인지 알아낼 수 있는 내장 함수가 없다. 따라서 직접 정규표현식을 통해 만든다.

preg_match 함수는 정규식을 검사한다.

preg_match('/^[\-+]?[0-9]*\.?[0-9]+$/', $input);
표현을 하나씩 뜯어보자. 일단 정규 표현식은 /로 시작하고 /로 끝난다는 것만 먼저 기억한다. 따라서 우리는 아래의 정규식을 검사할 것이다.

^[\-+]?[0-9]*\.?[0-9]+$
-나 +가 0개 아니면 1개(?)로 시작(^)해야 한다.

'^[\-+]?
0-9까지의 숫자 중 하나가 0개 이상(*) 나와야 한다.

[0-9]*
. 이 0개 아니면 1개가 나와야 한다.

.?
0-9까지의 숫자 중 하나가 1개 이상(+) 나온 상태로 끝나야($) 한다.

[0-9]+$
따라서 위 정규 표현식은

+ 혹은 -로 시작하거나, 0-9까지의 숫자가 0개 이상 나오고, . 기호가 0개 아니면 1개가 나온 후 0-9까지의 숫자가 1개 이상 나와야 한다

는 의미가 된다.

참고 함수 목록은 아래와 같다.

preg_match 함수 메뉴얼 : https://www.php.net/manual/en/function.preg-match
is_numeric 함수 메뉴얼 : https://www.php.net/manual/en/function.is-numeric
is_int 함수 메뉴얼 : https://www.php.net/manual/en/function.is-int
is_float 함수 메뉴얼 : https://www.php.net/manual/en/function.is-float
is_double 함수 메뉴얼 : https://www.php.net/manual/en/function.is-double
ctype_digit 함수 메뉴얼 : https://www.php.net/manual/en/function.ctype-digit
정규 표현식은 MDN https://developer.mozilla.org/ko/docs/Web/JavaScript/Guide/%EC%A0%95%EA%B7%9C%EC%8B%9D 에 자세히 설명되어 있다.

 -->
