<nav id="navbar">
    <div class="link-box">
        <a href="/" id="trucky" class="link">TruckyRoad</a>
        <a href="/search" class="link link-span">Rechercher</a>
        <a href="/search?q=arround" class="link link-span">Autour de moi</a>
        <a href="/search?q=random" class="link link-span">Aléatoire</a>
    </div>
    <div class="link-box">
        <?php
        if (isset($_SESSION['id'])) {
            if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
        ?>
        <a href="/dashboard" class="link link-span">Tableau de bord</a>
        <?php
            } elseif (isset($_SESSION['role']) && $_SESSION['role'] === 'truck_owner') {
        ?>
        <a href="/dashboard/my_truck" class="link link-span">Mon camion</a>
        <?php
            } else {
        ?>
        <a href="/profile" class="link link-span">Mon profil</a>
        <?php
            }
        ?>
        <a href="/auth/logout" class="link link-span">Déconnexion</a>
        <?php
        } else {
        ?>
        <a href="/auth/login" class="link link-span">Connexion</a>
        <a href="/auth/signin" class="link link-span">Inscription</a>
        <?php
        }
        ?>
    </div>
</nav>