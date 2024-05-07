
<?php

declare(strict_type=1);
function is_username_wrong(array|bool $result)
{
    if (!$result) {
        return true;  //if the username doesn't exist,
    } else {
        return false;
    }
}



function is_password_wrong(string $pwd, string $hashedPwd)
{
    if (!password_verify($pwd, $hashedPwd)) {
        return true;  //if the username doesn't exist,
    } else {
        return false;
    }
}
