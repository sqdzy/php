<?php

namespace src\Models\Comments;

use src\Models\ActiveRecordEntity;

class Comment extends ActiveRecordEntity
{
    protected $articleId;
    protected $text;
    protected $createdAt;

    public function getArticleId()
    {
        return $this->articleId;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setArticleId(int $articleId)
    {
        $this->articleId = $articleId;
    }

    public function setText(string $text)
    {
        $this->text = $text;
    }

    protected static function getTableName()
    {
        return 'comments';
    }
}