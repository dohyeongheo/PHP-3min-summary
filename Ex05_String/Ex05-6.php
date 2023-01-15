<?php
function string_replace($input, $old_str, $new_str)
{
    return str_replace($old_str, $new_str, $input);
}

var_dump(string_replace("안녕하세요.", "하세요", "히 가세요"));
?>


<!--
 string_replace 함수의 첫번째 파라미터는 전체 문자열, 두번째 문자열은 원본 문자열. 세번째는 바꿀 문자열이다.

string_replace("안녕하세요.", "하세요", "히 가세요")
안녕히 가세요.
 -->
