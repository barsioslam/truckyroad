<?php

namespace App\Controllers;

use App\Models\User;

class AuthController extends Controller {

    static function login() {

        if (isset($_SESSION['id'])) {
            header('Location: /');
            exit;
        }

        $userinstance = new User();

        $errors = [];
        $values = [
            'email' => '',
            'password' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $values['email'] = trim($_POST['email'] ?? '');
            $values['password'] = $_POST['password'] ?? '';

            $errors = [];

            // Récupération directe
            $user = $userinstance->findBy("email", $values['email']); // retourne le row unique

            if (!$user || !password_verify($values['password'], $user['password_hash'])) {
                $errors['general'] = "Identifiant ou mot de passe incorrect !";
            } else {
                // Connexion réussie
                $_SESSION['id'] = $user['id'];
                $_SESSION['role'] = $user['role'];

                if ($user['role'] === 'admin') {
                    header('Location: /dashboard');
                } elseif ($user['role'] === 'truck_owner') {
                    header('Location: /dashboard/my_truck');
                } else {
                    header('Location: /');
                }
                exit;
            }
            }

        self::Show(
            "auth",
            "login",
            "TruckyRoad - Connexion",
            ['forms'],
            [],
            [],
            true,
            ['errors' => $errors]
        );
    }

    static function signin() {

        if (isset($_SESSION['id'])) {
            header('Location: /');
            exit;
        }

        $userinstance = new User();

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

            if (empty($values['email'])) {
                $errors['email'] = "L'email est requis.";
            } elseif (!filter_var($values['email'], FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "L'email n'est pas valide.";
            } elseif ($userinstance->rowCount(($userinstance->findBy("email", $values['email']))) > 0) {
                $errors['email'] = "Cet email est déjà utilisé.";
            }

            if (empty($values['username'])) {
                $errors['username'] = "Le nom d'utilisateur est requis.";
            } elseif (strlen($values['username']) < 3 || strlen($values['username']) > 20) {
                $errors['username'] = "Le nom d'utilisateur doit contenir entre 3 et 20 caractères.";
            } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', $values['username'])) {
                $errors['username'] = "Le nom d'utilisateur ne peut contenir que des lettres, des chiffres et des underscores.";
            } elseif ($userinstance->rowCount(($userinstance->findBy("name", $values['username']))) > 0) {
                $errors['username'] = "Ce nom d'utilisateur est déjà utilisé.";
            }

            if (empty($values['password'])) {
                $errors['password'] = "Le mot de passe est requis.";
            } elseif (strlen($values['password']) < 10) {
                $errors['password'] = "Le mot de passe doit contenir au moins 10 caractères.";
            } elseif (!preg_match('/[A-Z]/', $values['password']) ||
                       !preg_match('/[a-z]/', $values['password']) ||
                       !preg_match('/[0-9]/', $values['password']) ||
                       !preg_match('/[\W]/', $values['password'])) {
                $errors['password'] = "Le mot de passe doit contenir au moins une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial.";
            }

            if ($values['password'] !== $values['repassword']) {
                $errors['repassword'] = "Les mots de passe ne correspondent pas.";
            }

            if (empty($errors)) {
                $req_value = $userinstance->create([
                    'email' => $values['email'],
                    'name' => $values['username'],
                    'password_hash' => password_hash($values['password'], PASSWORD_BCRYPT)
                ]);

                if ($req_value == 0) {
                    $errors['general'] = "Une erreur est survenue lors de l'inscription. Veuillez réessayer.";
                } else {

                    $_SESSION['id'] = $req_value;
                    header('Location: /');
                    exit;
                }
            }
        }

        self::Show(
            "auth",
            "signin",
            "TruckyRoad - Inscription",
            ['forms'],
            [],
            [],
            true,
            ['errors' => $errors]
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