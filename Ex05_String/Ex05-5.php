<?php

function string_splitlines($input)
{
    return explode(PHP_EOL, $input);
}

$data = <<<CDATA
안녕
하신가
요?
CDATA;

var_dump(string_splitlines($data));

/*
PHP_EOL 은 End Of Line 의 약자로 줄바꿈 기호를 의미한다.
줄바꿈 기호는 OS 에 따라 \r\n, \r, \n 등으로 각자 다르다. 윈도우즈는 \r\n을 사용하고, 리눅스 계열은 \n을 쓴다. 맥 OS 9 버전까지는 \r을 사용했었다.
PHP_EOL은 OS 에 따른 줄바꿈 기호를 리턴하는 내장 상수다. 따라서 OS에 따른 줄바꿈 기호 혼용 문제를 해결 가능하다. 즉, 윈도우즈에서는 \r\n, 리눅스 계열에서는 \n을 리턴한다.

<<<특정문자 로 시작하고 특정문자; 로 끝나는 문법을 히어닥(heredoc) 이라고 부른다. PHP에서 여러줄 문자열을 쓸 때 사용한다.
한 줄 문자열 "" 와 비슷하게 문자열 안의 변수를 치환한다.

$name = 'PHP';
$data = <<<CDATA
안녕
$name
만나서 반가워
CDATA;
안녕
PHP
만나서 반가워
히어닥과 비슷한 것으로 <<<'특정문자' 로 시작하고 특정문자; 로 끝나는 나우닥(nowdoc)도 있다. 나우닥은 변수를 치환하지 않는다.

$name = 'PHP';
$data = <<<'CDATA'
안녕
$name
만나서 반가워
CDATA;
안녕
$name
만나서 반가워
*/
