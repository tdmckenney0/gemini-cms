<?php

return [
    'driver'   => 'sqlite',
    'database' =>  realpath(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'db' . DIRECTORY_SEPARATOR . 'gemini-cms.sqlite3'),
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'   => ''
];
