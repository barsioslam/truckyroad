<?php

// Auth

require_once('Controller.php');

class AuthController extends Controller {

    static function login() {
        self::Show(
            "auth",
            "login",
            "TruckyRoad - Connexion",
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
            "TruckyRoad - Inscription",
            [],
            [],
            [],
            true
        );
    }

    static function logout() {
        session_unset();
        session_destroy();
        header('Location: /');
        exit;
    }

}

?>