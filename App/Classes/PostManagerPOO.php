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
         $sql ='Select * from Posts';
         $post = $this->db->prepare($sql);
        return  $post->execute()->fetch;
    }

    public function getById(int $idPost)
    {
        $sql= (
        'SELECT posts.id, title, content, DATE_FORMAT(created_at, "%W %e %M %Y") as created_date, authors.firstname, authors.lastname, categories.name 
        FROM posts
        INNER JOIN categories on categories.id = posts.category_id
        INNER JOIN authors on authors.id = posts.author_id
        WHERE posts.id = :idPost;');
        $query = $this->db->prepare($sql);
        $query->bindValue(':idPost', $idPost);
        $query->execute();
        return $query->fetch();


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