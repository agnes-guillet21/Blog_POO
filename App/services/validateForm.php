<?php

namespace services;
/****
 *
 *
 *     if (!empty($nickname) || $nickname == null) {
$error = $comment->msgAddCommentPseudo();
header('Location: post_details.php?idPost=' . $_POST['postId']);
exit();
}

if (!empty($content) || $content == null) {
$error = $comment->msgAddCommentContenu();
header('Location: post_details?idPost=' . $_POST['postId']);

}
 */

trait validationForm{

    public function getErrorEmpty($key, $param)
    {
        if (empty($param)) {
            $message = $_SESSION['errorEmptyInput'][$key];
            unset($_SESSION['errorValidationInput'][$key]);
            return $message;
        }
    }

    public function setErrorEmpty(string $key, string $message): void
    {
        $_SESSION['errorEmptyInput'][$key] = $message;
    }








}

