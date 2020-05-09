<?php namespace _\lot\x;

$r = \trim(\State::get('x.route.path') ?? 'route', '/');

function route($id) {
    if (\is_file($path = \LOT . \DS . 'route' . \DS . \strtr($id, '/', \DS) . '.php')) {
        extract($GLOBALS, \EXTR_SKIP);
        require $path;
    }
}

\Route::set($r . '/*', __NAMESPACE__ . "\\route", 0);
