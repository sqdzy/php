<?php

namespace src\Models\Articles;

use src\Models\ActiveRecordEntity;
use Services\Db;
use src\Models\Comments\Comment;

class Article extends ActiveRecordEntity
{
    protected $name;
    protected $text;
    protected $createdAt;

    public function getName()
    {
        return $this->name;
    }
    public function getText()
    {
        return $this->text;
    }
    public function setName(string $name)
    {
        $this->name = $name;
    }
    public function setText(string $text)
    {
        $this->text = $text;
    }
    protected static function getTableName()
    {
        return 'articles';
    }
    public function delete()
    {
        $comments = Comment::findByColumn('article_id', $this->getId());
        foreach ($comments as $comment) {
            $comment->delete();
        }

        $db = Db::getInstance();
        $sql = 'DELETE FROM `' . static::getTableName() . '` WHERE `id`=:id';
        $db->query($sql, [':id' => $this->getId()], static::class);
    }

}