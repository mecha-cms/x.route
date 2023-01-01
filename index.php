<?php namespace x;

function route($id) {
    if (\is_file($path = \LOT . \DS . 'route' . \DS . \strtr($id, '/', \DS) . '.php')) {
        extract($GLOBALS, \EXTR_SKIP);
        require $path;
    }
}

\Route::set(\trim($state->x->route->path ?? '/route', '/') . '/*', __NAMESPACE__ . "\\route", 0);