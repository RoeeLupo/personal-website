<?php

namespace Protect;

function with($form, $password, $scope = null) {
    if (!$scope) $scope = current_url();
    $session_key = 'password_protect_' . preg_replace('/\W+/', '_', $scope);
    session_start();
    if ($_POST['password'] == $password) {
        $_SESSION[$session_key] = true;
        redirect(current_url());
    }
    if ($_SESSION[$session_key]) return;
    require $form;
    exit;
}

function current_url($script_only = false) {
    $protocol = 'http';
    $port = ':' . $_SERVER["SERVER_PORT"];
    if ($_SERVER["HTTPS"] == 'on')
        $protocol .= 's';
    if ($protocol == 'http' && $port == ':80')
        $port = '';
    if ($protocol == 'https' && $port == ':443')
        $port = '';
    $path = $script_only ? $_SERVER['SCRIPT_NAME'] : $_SERVER['REQUEST_URI'];
    return "$protocol://$_SERVER[SERVER_NAME]$port$path";
}

function redirect($url) {
    header("Location: $url");
    exit;
}

?>