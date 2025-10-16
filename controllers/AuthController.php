<?php

namespace App\Controllers;

class AuthController extends Controller {

    static function login() {
        self::Show(
            "auth",
            "login",
            "TruckyRoad - Connexion",
            ['forms'],
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
            ['forms'],
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