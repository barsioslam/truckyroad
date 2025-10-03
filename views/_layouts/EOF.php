        <!-- JS POSTLOAD FILES -->
        <?php
        if (isset($page['js_post']) && is_array($page['js_post'])) {
            foreach ($page['js_post'] as $jsFile) {
                echo '<script src="/assets/js/' . htmlspecialchars($jsFile) . '.js"></script>';
            }
        }
        ?>
    </body>
</html>