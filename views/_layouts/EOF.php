        <!-- JS POSTLOAD FILES -->
        <?php
        if (isset($page['jspostloadlist']) && is_array($page['jspostloadlist'])) {
            foreach ($page['jspostloadlist'] as $jsFile) {
                echo '<script src="/assets/js/' . htmlspecialchars($jsFile) . '.js"></script>';
            }
        }
        ?>
    </body>
</html>