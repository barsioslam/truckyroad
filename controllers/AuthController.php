<?php

namespace App\Controllers;

use App\DB\Database;

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

    static function signin() {)
        $errors = [];
        $values = [
            'email' => '',
            'username' => '',
            'password' => '',
            'repassword' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $values['email'] = trim($_POST['email'] ?? '');
            $values['username'] = trim($_POST['username'] ?? '');
            $values['password'] = $_POST['password'] ?? '';
            $values['repassword'] = $_POST['repassword'] ?? '';

            // Email validation
            if (empty($values['email'])) {
                $errors['email'] = "L'email est requis.";
            } elseif (!filter_var($values['email'], FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "L'email n'est pas valide.";
            }

            // Username validation
            if (empty($values['username'])) {
                $errors['username'] = "Le nom d'utilisateur est requis.";
            }

            // Password validation
            if (empty($values['password'])) {
                $errors['password'] = "Le mot de passe est requis.";
            } elseif (strlen($values['password']) < 6) {
                $errors['password'] = "Le mot de passe doit contenir au moins 6 caractères.";
            }

            // Repassword validation
            if ($values['password'] !== $values['repassword']) {
                $errors['repassword'] = "Les mots de passe ne correspondent pas.";
            }

            // Si pas d'erreurs, on peut poursuivre l'inscription (à compléter)
            if (empty($errors)) {
                // TODO: Ajouter l'inscription en base de données
                // Rediriger ou afficher un message de succès
            }
        }

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