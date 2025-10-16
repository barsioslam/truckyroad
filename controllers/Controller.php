<?php

namespace App\Controllers;

class Controller {

    static function Show($controller, $name, $title, $css_list, $js_preload_list, $js_postload_list, $activate_nav) {
        $page['controller'] = $controller;
        $page['name'] = $name;
        $page['title'] = $title;
        $page['css'] = $css_list;
        $page['js_pre'] = $js_preload_list;
        $page['js_post'] = $js_postload_list;
        if ($activate_nav) {
            $page['navbar'] = $name;
        }
        self::GenFile($controller . "/" . $name, $page);
    }

    static function GenFile($pagename, $page) {
        require_once(LAYOUT_PATH . 'Header.php');
        require_once(VIEW_PATH . $pagename . '.php');
        require_once(LAYOUT_PATH . 'EOF.php');
    }

}

?>