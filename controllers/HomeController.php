<?php

// Home

class HomeController extends Controller {

    static function index() {
        self::Show(
            "home",
            "index",
            "INDEX PAGE TITLE",
            [],
            [],
            [],
            true
        );
    }

    static function error($e) {
        self::Show(
            "home",
            "error",
            "ERROR PAGE TITLE",
            [],
            [],
            [],
            true
        );
    }

}

?>