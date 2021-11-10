<?php


namespace App\Classes;
use App\config\Connect;

class PostManagerPOO implements Manager
{
    private $db;

    public function __construct()
    {
        $this->db = new Connect();
    }
    public function getListPost()
    {
        $sql = 'SELECT posts.id, title,
                    SUBSTRING(content, 1, 150) AS content,
                    DATE_FORMAT(created_at, "%W %e %M %Y") AS created_date,
                    firstname, lastname, name AS categoryName
                FROM posts
                INNER JOIN categories ON posts.category_id = categories.id
                INNER JOIN authors ON posts.author_id = authors.id
                ORDER BY created_at DESC
                LIMIT 10
                ';

        $posts = $this->db->prepare($sql);
        $posts->execute();

        return $posts->fetchAll();
    }


    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function getById(int $param)
    {
        // TODO: Implement getById() method.
    }

    public function add(array $values)
    {
        // TODO: Implement add() method.
    }

    public function edit(array $values, int $id)
    {
        // TODO: Implement edit() method.
    }

    public function delete(int $param)
    {
        // TODO: Implement delete() method.
    }
}