<?php
require_once 'functions.php';

$posts = [
    'Post 1' => ['title' => 'Post 1', 'body' => 'This is the body to post one'],
    'Post 2' => ['title' => 'Post 2', 'body' => 'This is the body to post two'],
    'Post 3' => ['title' => 'Post 2', 'body' => 'This is the body to post three'],
];

echo render_template('views/partials/posts.php', [
    'posts' => $posts
]);
