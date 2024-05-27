<?php

namespace src\Controllers;

use src\View\View;
use src\Models\Comments\Comment;

class CommentController
{
    public $view;

    public function __construct()
    {
        $this->view = new View('../templates/');
    }

    public function store(int $articleId)
    {
        $comment = new Comment();
        $comment->setArticleId($articleId);
        $comment->setText($_POST['text']);
        $comment->save();

        header('Location: /student-231/Project/www/articles/' . $articleId);
    }

    public function edit(int $id)
    {
        $comment = Comment::getById($id);
        if (!$comment) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        $this->view->renderHtml('comments/edit.php', ['comment' => $comment]);
    }

    public function update(int $id)
    {
        $comment = Comment::getById($id);
        if (!$comment) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        $comment->setText($_POST['text']);
        $comment->save();

        header('Location: /student-231/Project/www/articles/' . $comment->getArticleId());
    }
}