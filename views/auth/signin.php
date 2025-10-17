<form method="post">
    <div class="input-box">
        <label for="emailInput">Email: </label>
        <input type="email" name="email" id="emailInput" placeholder="example@website.xyz">
    </div>
    <?php
    if (isset($errors['email']) && !empty($errors['email'])) {
        echo '<div class="error-message">' . htmlspecialchars($errors['email']) . '</div>';
    }
    ?>
    <div class="input-box">
        <label for="usernameInput">Nom d'utilisateur: </label>
        <input type="text" name="username" id="usernameInput" placeholder="John Doe">
    </div>
    <?php
    if (isset($errors['username']) && !empty($errors['username'])) {
        echo '<div class="error-message">' . htmlspecialchars($errors['username']) . '</div>';
    }
    ?>
    <div class="input-box">
        <label for="passwordInput">Mot de passe: </label>
        <input type="password" name="password" id="passwordInput" placeholder="********">
    </div>
    <?php
    if (isset($errors['password']) && !empty($errors['password'])) {
        echo '<div class="error-message">' . htmlspecialchars($errors['password']) . '</div>';
    }
    ?>
    <div class="input-box">
        <label for="repasswordInput">Répéter mot de passe: </label>
        <input type="password" name="repassword" id="repasswordInput" placeholder="********">
    </div>
    <?php
    if (isset($errors['repassword']) && !empty($errors['repassword'])) {
        echo '<div class="error-message">' . htmlspecialchars($errors['repassword']) . '</div>';
    }
    ?>
    <div class="input-box">
        <input type="submit" value="S'inscrire">
    </div>
    <?php
    if (isset($errors['general']) && !empty($errors['general'])) {
        echo '<div class="error-message">' . htmlspecialchars($errors['general']) . '</div>';
    }
    ?>
</form>