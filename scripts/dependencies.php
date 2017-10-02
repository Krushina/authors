<?php

$container['db'] = function() use($config) {
    return new MyDb($config);
};

$container['AuthorModel'] = function($c) {
    return new \App\Models\Author($c['db']);
};


 $container['\App\Controllers\GetAuthor'] = function ($c) {
   return new \App\Controllers\GetAuthor($c['AuthorModel']);
 };



