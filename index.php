<?php
$request = $_SERVER['REQUEST_URI'];

function url($fn) { return '/' . $fn; }

switch ($request) {
    case url("") :
        require __DIR__ . '/templates/home.php';
        break;
    case url("signout") :
        require __DIR__ . '/templates/signout.php';
        break;
    case url("signin") :
        require __DIR__ . '/templates/signin.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/templates/404.php';
        break;
}

?>