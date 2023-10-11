<?php namespace x\route;

function route($content, $path, $query, $hash) {
    foreach (\array_reverse(\array_values(\step(\trim(\strtr($path ?? "", ['/' => \D]), \D), \D))) as $v) {
        if (\is_file($file = \LOT . \D . 'route' . \D . $v . '.php')) {
            if ($f = require $file) {
                \status(200);
                $content = \is_callable($f) ? \fire($f, [$content, $path, $query, $hash]) : $f;
            }
        }
    }
    return $content;
}

// This hook will fire immediately, but the result(s) returned may be overwritten by other `route` hook(s) that are
// executed after it. The best way to avoid this effect is to create a route path that has never been used before.
\Hook::set('route', __NAMESPACE__ . "\\route", 0);