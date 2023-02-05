<?php namespace x;

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

// This hook will be executed immediately, but it may be overridden by other route hooks afterwards.
// The best way to maintain its priority is to create unique route names that are never used before.
\Hook::set('route', __NAMESPACE__ . "\\route", 0);