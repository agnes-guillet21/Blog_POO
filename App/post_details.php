<?php

    if (!ctype_digit($_GET['idPost']) || !array_key_exists('idPost', $_GET)) {
        header('location:index.php ');
        exit();
    }
    use App\Classes\PostManagerPOO;
    use App\Classes\CommentManagerPOO;


    include_once './App.php';

$idPost = $_GET['idPost'];


    if (!empty($_POST) && isset($_POST['addComment'])){
        // si RAS on crée une nouvelle instance
        $commentPosts = new CommentManagerPOO;

        $commentNickname = check_data($_POST['nickname']);
        $commentContent = check_data($_POST['content']);

        if (empty($_POST['nickname']) || $_POST['nickname'] == null ) {
            $commentPosts->setErrorNotification("pseudoError", "Le pseudo est obligatoire");
        }

        if (!isset($_POST['content']) || empty(trim($_POST['content'])) || $_POST['content'] == null) {
            $commentPosts->setErrorNotification("contentError", "Le contenu est obligatoire");

        }

        if (!$commentPosts->checkErrorsNotification("pseudoError") && !$commentPosts->checkErrorsNotification("contentError")) {
            $values = array(
                $_POST['nickname'],
                $_POST['content'],
                $_POST['postId']
            );
            $commentPosts->add($values);
        }
    }
            /*Post */
    $post = new PostManagerPOO();
    $posts = $post->getById($idPost);

    if (empty($posts)) {
        header('Location: index.php');
        exit();
    }


            /* Commentaires : recuperation & ajout*/
    $commentPosts = $commentPosts ?? new CommentManagerPOO; // test savoir si une nouvelle instance existe si oui renvoie celle qui est cree sinon en crée une
    $comments =$commentPosts->getCommentPost($idPost);



    //Affichage
    $template = "view/post_details";
    require ('view/layout.phtml');

