<?php
// dashboard/index.php

// On suppose que $_SESSION['id'] et $_SESSION['role'] sont définis
// $users et $trucks sont récupérés depuis le controller avant d'inclure cette view

?>
<div class="container mt-4">
    <h1>Tableau de bord</h1>

    <?php if ($_SESSION['role'] === 'admin') { ?>
        <h2>Utilisateurs</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Rôle</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= htmlspecialchars($user['id']) ?></td>
                    <td><?= htmlspecialchars($user['name']) ?></td>
                    <td><?= htmlspecialchars($user['email']) ?></td>
                    <td><?= htmlspecialchars($user['role']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2>Trucks</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom du camion</th>
                    <th>Propriétaire</th>
                    <th>Statut</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($trucks as $truck): ?>
                <tr>
                    <td><?= htmlspecialchars($truck['id']) ?></td>
                    <td><?= htmlspecialchars($truck['name']) ?></td>
                    <td><?= htmlspecialchars($truck['owner_name']) ?></td>
                    <td><?= htmlspecialchars($truck['status']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    <?php } elseif ($_SESSION['role'] === 'truck_owner') { ?>
        <h2>Mes Camions</h2>
        <?php if (!empty($trucks)) { ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom du camion</th>
                    <th>Statut</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($trucks as $truck) { ?>
                <tr>
                    <td><?= htmlspecialchars($truck['id']) ?></td>
                    <td><?= htmlspecialchars($truck['name']) ?></td>
                    <td><?= htmlspecialchars($truck['status']) ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php } else { ?>
            <p>Vous n'avez aucun camion enregistré.</p>
        <?php } ?>

    <?php } else { ?>
        <p>Accès non autorisé.</p>
    <?php } ?>
</div>
