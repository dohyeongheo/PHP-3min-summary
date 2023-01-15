<!-- 값을 이메일 형식만 남기고 삭제하기 -->

<?php

$emails = array(
    'aaa@bbb.com',
    'abc',
    '.com',
    '@.com',
    'aaa@bbb.com ds'
);

foreach ($emails as $email) {
    echo "$email : ";
    var_dump(filter_var($email, FILTER_SANITIZE_EMAIL));
    echo "<br />";
}

// filter_var($email, FILTER_SANITIZE_EMAIL) 는 이메일 형식에는 쓸 수 없는 글자들을 모두 삭제한다. 허용하는 글자는 일반 글자, 숫자,!,#,$,%,&,',*,+,-,=,?,^,_,{,|,},~,@,.,[,] 이다.

// 이메일 형식에 맞지 않아도 결과는 리턴하므로 반드시 FILTER_VALIDATE_EMAIL 로 검사 후 형식이 맞으면 데이터를 정제해야 한다.

// 위의 예시를 검사 후 형식이 맞으면 데이터를 정제하는 방식으로 바꾸면 아래와 같다.


function sanitize_email($email)
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return filter_var($email, FILTER_SANITIZE_EMAIL);
    }
    return false;
}

$emails = array(
    'aaa@bbb.com',
    'abc',
    '.com',
    '@.com',
    'aaa@bbb.com ds'
);

foreach ($emails as $email) {
    echo "$email : ";
    var_dump(sanitize_email($email));
    echo "<br />";
}

?>

<!--

필요한 데이터만 남기고 삭제하는 것을 소독(새니타이즈 - sanitize) 라고 한다. 소독이라는 개념은 PHP외의 언어에서는 사용되지 않는다. 대부분의 웹 프로그래밍은 형식에 맞지 않으면 오류와 함께 다시 입력을 하도록 유도하는 편이지, 마음대로 데이터를 바꿔버리거나 하지는 않기 때문이다.

filter_var 함수를 통해서 사용하며 어떤 방식으로 소독할 지 결정하는 파라미터는 https://www.php.net/manual/en/filter.filters.sanitize.php 에서 찾을 수 있다.

상수	의미
FILTER_SANITIZE_EMAIL	이메일 형식으로 소독한다.
FILTER_SANITIZE_ENCODED	URL 인코딩한 형식으로 바꾼다.
FILTER_SANITIZE_MAGIC_QUOTES	addslashes 함수를 적용한다.
FILTER_SANITIZE_NUMBER_FLOAT	+,-,숫자,소수점(. 혹은 ,)을 제외하고 모두 삭제한다.
FILTER_SANITIZE_NUMBER_INT	+,-,숫자만 남기고 모두 제거한다.
FILTER_SANITIZE_SPECIAL_CHARS	HTML을 이스케이프한다.
FILTER_SANITIZE_FULL_SPECIAL_CHARS	htmlspecialchars 함수를 적용한다.
FILTER_SANITIZE_STRING	태그를 삭제한다.
FILTER_SANITIZE_URL	URL만 남기고 삭제한다.

 -->
