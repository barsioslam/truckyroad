<?php

// Auth

require_once('Controller.php');

class AuthController extends Controller {

    static function login() {
        self::Show(
            "auth",
            "login",
            "LOGIN PAGE TITLE",
            [],
            [],
            [],
            true
        );
    }

    static function signin() {
        self::Show(
            "auth",
            "signin",
            "SIGNIN PAGE TITLE",
            [],
            [],
            [],
            true
        );
    }

    static function logout() {
        self::Show(
            "auth",
            "logout",
            "LOGOUT PAGE TITLE",
            [],
            [],
            [],
            true
        );
    }

}

?>