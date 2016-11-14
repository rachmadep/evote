<?php
function auto_logout($field)
{
    $t = time();
    $t0 = $_SESSION[$field];
    $diff = $t - $t0;
    if ($diff > 300 || !isset($t0))
    {          
        return true;
    }
    else
    {
        $_SESSION[$field] = time();
    }
}
if(auto_logout("time"))
    {
        session_unset();
        session_destroy();
        header("location: login-admin.php");          
        exit;
    }      
?>