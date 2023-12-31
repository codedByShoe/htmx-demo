<?php

namespace App\Models;

class Post
{
    private $db;
    public function __construct()
    {
        $this->db = app()->getContainer()->get('db');
    }

    public function findPost($id)
    {
        $post = $this->db->query('SELECT * FROM posts WHERE id = :id', [
            'id' => $id
        ])->find();

        return $post;
    }

    public function getPosts()
    {
        $posts = $this->db->query('SELECT * FROM posts')->get();
        return $posts;
    }

    public function searchByAuthor($searchTerm)
    {
        $searchTerm = '%' . $searchTerm . '%';
        $search = $this->db->query('SELECT * FROM posts WHERE author LIKE :searchTerm', [
            'searchTerm' => $searchTerm
        ])->get();

        return $search;
    }
}
