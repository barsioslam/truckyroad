<?php

namespace App\Controllers;

class DashboardController extends Controller {

    static function index() {
        self::Show(
            "dashboard",
            "index",
            "TruckyRoad - Tableau de bord",
            ['charts', 'tables'],
            ['https://cdn.jsdelivr.net/npm/chart.js'],
            ['dashboard'],
            true
        );
    }

}

?>