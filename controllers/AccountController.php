<?php

namespace App\Controllers;

class AccountController extends Controller {

    static function index() {
        self::Show(
            "account",
            "index",
            "TruckyRoad - Mon compte",
            ['forms'],
            [],
            [],
            true
        );
    }

}

?>