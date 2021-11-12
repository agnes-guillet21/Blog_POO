<?php


    namespace App\Classes;
    use App\config\Connect;
    use services\errorNotifications;
    use services\notifications;
    use services\successNotifications;


    class CommentManagerPOO implements Manager
    {
        /**
        *Appel au trait pour pouvoir l'utiliser via une instance de cette classe
         */
           use errorNotifications,successNotifications;

        public function __construct()
        {
            $this->db = new Connect();
        }

        public function  getCommentPost(int $id)
        {
            $sql = ' SELECT 
                content,
                DATE_FORMAT(created_at, "%W %e %M %Y") AS creation_date,
                nickname
                FROM comments
                WHERE post_id = :id
            ';

            $query = $this->db->prepare($sql);
            $query->bindValue(':id', $id);
            $query->execute();
            return $query->fetchAll();
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

            $query =
                '
            INSERT INTO
                comments
                (nickname, content, post_id)
            VALUES
                (?, ?, ?)
            ';
            $resultSet = $this->db->prepare($query);
            $resultSet->execute(array(
                $_POST['nickname'],
                $_POST['content'],
                $_POST['postId']
            ));


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