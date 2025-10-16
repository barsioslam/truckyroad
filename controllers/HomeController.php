<?php

namespace App\Controllers;

class HomeController extends Controller {

    static function index() {
        self::Show(
            "home",
            "index",
            "TruckyRoad",
            [],
            [],
            [],
            true
        );
    }

    static function search() {
        if (isset($_GET['q']) AND !empty($_GET['q'])) {
            if ($_GET['q'] == "random") {
                $title_complement = "Aléatoire";
            } else if ($_GET['q'] == "arround") {
                $title_complement = "Autour de moi";
            }
        }
        self::Show(
            "home",
            "search",
            "TruckyRoad - " . ($title_complement ?? "Rechercher"),
            ['forms'],
            [],
            [],
            true
        );
    }

    static function error($e) {
        self::Show(
            "home",
            "error",
            "TruckyRoad - Erreur",
            [],
            [],
            [],
            true
        );
    }

}

?>