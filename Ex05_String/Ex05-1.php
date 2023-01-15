<?php
function string_starts_with($input, $value)
{
    return $value === "" ||  mb_strrpos($input, $value, -mb_strlen($input)) !== false;
}

var_dump(string_starts_with("안녕하세요.", "안녕"));
var_dump(string_starts_with("안녕하세요.", "하이"));

// var_dump(mb_strlen("안녕하세요") !== false);

var_dump(
    mb_strpos(
        "안녕하세요",
        "안녕",
        0,
    )
);

echo mb_strpos("안녕하세요", "녕하");
