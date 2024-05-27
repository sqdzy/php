<?php
return [
    '/(^$)/' => [\src\Controllers\MainController::class, 'main'],
    '/hello\/([a-z]+)/' => [\src\Controllers\MainController::class, 'sayHello'],
    '/articles/' => [\src\Controllers\ArticleController::class, 'index'],
    '/article\/create/' => [\src\Controllers\ArticleController::class, 'create'],
    '/article\/store/' => [\src\Controllers\ArticleController::class, 'store'],
    '/article\/(\d+)/' => [\src\Controllers\ArticleController::class, 'show'],
    '/article\/edit\/(\d+)/' => [\src\Controllers\ArticleController::class, 'edit'],
    '/article\/update\/(\d+)/' => [\src\Controllers\ArticleController::class, 'update'],
    '/article\/delete\/(\d+)/' => [\src\Controllers\ArticleController::class, 'delete'],
    '/articles\/(\d+)\/comments/' => [\src\Controllers\CommentController::class, 'store'],
    '/comments\/(\d+)\/edit/' => [\src\Controllers\CommentController::class, 'edit'],
    '/comments\/(\d+)\/update/' => [\src\Controllers\CommentController::class, 'update'],
];