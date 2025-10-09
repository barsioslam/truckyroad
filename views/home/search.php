<form method="POST" style="flex-grow: 1; margin-bottom: 20px;">
    <div class="input-box">
        <input type="text" name="search" placeholder="Recherche...">
        <input type="submit" value="🔍" style="flex-grow: 0;">
    </div>
    <?php
    if (isset($_POST['search']) && !empty($_POST['search'])) {
    ?>
    <div class="input-box">
        <label>Résultats pour : <?= htmlspecialchars($_POST['search']); ?></label>
    </div>
    <?php
    }
    ?>
    <div class="rounded-sm" style="flex-grow: 1; border: 1px solid black;">

    </div>
</form>