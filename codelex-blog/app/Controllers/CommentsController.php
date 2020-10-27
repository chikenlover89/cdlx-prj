<?php

namespace App\Controllers;

use App\Models\Article;

class CommentsController
{
    public function store(array $vars)
    {
        $articleId = (int)$vars['id'];

        query()
            ->insert('comments')
            ->values([
                'article_id' => ':articleId',
                'name' => ':name',
                'comment' => ':comment'
            ])->setParameters([
                'articleId' => $articleId,
                'name' => $_POST['name'],
                'comment' => $_POST['comment']

            ])->execute();

        header('Location: /articles/' . $articleId);

    }

    public function delete(array $vars)
    {
        $articleId = (int)$vars['id'];
        $commentId = $_POST['id'];

        query()
            ->delete('comments')
            ->where('id = :id')
            ->setParameter('id', $commentId)
            ->execute();

        header('Location: /articles/' . $articleId);
    }


}