<?php namespace x\route;

function route($content, $path, $query, $hash) {
    foreach (\array_reverse(\array_values(\step(\trim(\strtr($path ?? "", ['/' => \D]), \D), \D))) as $v) {
        if (\is_file($file = \LOT . \D . 'route' . \D . $v . '.php')) {
            if (\is_callable($fn = require $file)) {
                $content = \fire($fn, [$content, '/' . \strtr($v, [\D => '/']), $query, $hash]);
            }
        }
    }
    return $content;
}

// This hook will be executed immediately, but the result may be overridden by later route hooks. The best way to
// avoid this is to create route names that have never been used before.
\Hook::set('route', __NAMESPACE__ . "\\route", 0);