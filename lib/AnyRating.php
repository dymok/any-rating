<?php

class AnyRating {

    public function init() {

        define('CLASS_DIR', __DIR__);

        set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);

        spl_autoload_register();
    }
}