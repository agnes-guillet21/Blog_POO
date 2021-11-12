<?php
    use App\autoloader;
    use App\Classes\CommentManagerPOO;


    /* fonction de verif * */
    function check_data($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $nickname = check_data($_POST['nickname']);
    $content = check_data($_POST['content']);
    $postId = check_data($_POST['postId']);

    require 'autoloader.php';
    App\Autoloader::register();

    $comment = new CommentManagerPOO;

    if (!empty($nickname) || $nickname == null) {
        $error = $comment->msgAddCommentPseudo();
        header('Location: post_details.php?idPost=' . $_POST['postId']);
        exit();
    }

    if (!empty($content) || $content == null) {
       $error = $comment->msgAddCommentContenu();
        header('Location: post_details?idPost=' . $_POST['postId']);

    }

        $addComments =$comment->add(array(
            $nickname,
            $content,
            $postId));

        header('Location: post_details.php?idPost=' . $postId);



