<?php

namespace app\common\model;

use think\Model;

class Forum extends Model
{
    protected $table = 'forum';
    protected $id = 'id';
    protected $userId = 'user_id';
    protected $title = 'title';
    protected $content = 'content';
    protected $publicTime = 'public_time';
    protected $deleteFlag = 'delete_flag';

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @param string $table
     */
    public function setTable($table)
    {
        $this->table = $table;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getPublicTime()
    {
        return $this->publicTime;
    }

    /**
     * @param string $publicTime
     */
    public function setPublicTime($publicTime)
    {
        $this->publicTime = $publicTime;
    }

    /**
     * @return string
     */
    public function getDeleteFlag()
    {
        return $this->deleteFlag;
    }

    /**
     * @param string $deleteFlag
     */
    public function setDeleteFlag($deleteFlag)
    {
        $this->deleteFlag = $deleteFlag;
    }


}
