<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- TITLE -->
        <?php
        $title = $page['title'];
        if ($title === null || $title == "") {
            $title = "[MISSING TITLE]";
        }
        ?>
        <title><?= $title; ?></title>

        <!-- CSSHIFTER -->
        <link rel="stylesheet" href="https://crafterhide.fr/dep/csshifter/v1/csshifter.css">

        <!-- CSS LOADING -->
        <link rel="stylesheet" href="/assets/css/general.css">
        <link rel="stylesheet" href="/assets/css/navbar.css">
        <link rel="stylesheet" href="/assets/css/footer.css">
        <?php
        if (isset($page['css']) && is_array($page['css'])) {
            foreach ($page['css'] as $cssFile) {
                echo '<link rel="stylesheet" href="/assets/css/' . htmlspecialchars($cssFile) . '.css">';
            }
        }
        ?>

        <!-- JS PRELOAD FILES -->
        <?php
        if (isset($page['js_pre']) && is_array($page['js_pre'])) {
            foreach ($page['js_pre'] as $jsFile) {
                echo '<script src="/assets/js/' . htmlspecialchars($jsFile) . '.js"></script>';
            }
        }
        ?>
    </head>
    <body>
        <?php
        if (isset($page['navbar']) && !empty($page['navbar'])) {
        ?>
        <!-- NAVBAR -->
        <?php require_once(LAYOUT_PATH . $page['controller'] . '/navbar.php'); ?>
        <?php
        }
        ?>