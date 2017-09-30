<?php

$container['db'] = function() use($config) {
    return new MyDb($config);
};

$container['AuthorModel'] = function($c) {
    return new \Models\Author($c['db']);
};


 $container['Controllers\GetAuthor'] = function ($c) {
   return new \Controllers\GetAuthor($c['AuthorModel']);
 };



