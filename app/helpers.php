<?php

/**
 * 
 * Restore the last value of a field.
 * 
 * @param  string $fn The field name
 * @return string
 *
 */
if (!function_exists('old')) {
    function old($fn) {
        return $_REQUEST[$fn] ?? '';
    }
}

/**
 * 
 * Creates a new session for a user
 * 
 * @param int $id The ID of the user
 * @param string $username The name of the user
 * @param string $email The email of the user
 * 
 */
if (!function_exists('create_user')) {
    function create_user($id, $username, $email, $ip, $agent) {
        $_SESSION['user_id'] = $id; 
        $_SESSION['user_name'] = $username; 
        $_SESSION['user_email'] = $email; 
        $_SESSION['user_ip'] = $ip;
        $_SESSION['user_agent'] = $agent;
    }
}

/**
 * 
 * Generates a CSRF token
 * 
 * @return string
 * 
 */
if (!function_exists('csrf_token')) {
    function csrf_token() {
      $token = sha1(rand(1, 9999999) . date('Y.m.d.h.i.s') . 'superkewlcsrftoken$$');
      $_SESSION['csrf_token'] = $token;
      return $token;
    }
  }

  /**
   * 
   * Checks if a user is logged in
   * 
   * @return boolean
   * 
   */
  if (!function_exists('auth_user')) {
    function auth_user() {
      $auth = false;
      if (isset($_SESSION['user_id'])) {
        if (isset($_SESSION['user_ip']) && $_SESSION['user_ip'] == $_SERVER['REMOTE_ADDR']) {
          if (isset($_SESSION['user_agent']) && $_SESSION['user_agent'] == $_SERVER['HTTP_USER_AGENT']) {
            $auth = true;
          }
        }
      }
      return $auth;
    }
  }
