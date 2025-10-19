<?php

namespace App\Controllers;

class DashboardController extends Controller {

    static function index() {
        $userModel = new \App\Models\User();
        $truckModel = new \App\Models\Truck();
        $vars = [];
        if ($_SESSION['role'] === 'admin') {
            $users = $userModel->findAll();
            $trucks = $truckModel->findAll();
            $vars['users'] = $users;
            $vars['trucks'] = $trucks;
        } elseif ($_SESSION['role'] === 'truck_owner') {
            $trucks = $truckModel->findAllBy('user_id', $_SESSION['id']);
            $vars['trucks'] = $trucks;
        }
        self::Show(
            "dashboard",
            "index",
            "TruckyRoad - Tableau de bord",
            ['charts', 'tables'],
            [''],
            ['dashboard'],
            true,
            $vars
        );
    }

    static function mytruck() {
        self::Show(
            "dashboard",
            "mytruck",
            "TruckyRoad - Mon camion",
            ['forms', 'tables'],
            [],
            ['mytruck'],
            true
        );
    }

}

?>