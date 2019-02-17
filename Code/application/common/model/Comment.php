<?php

namespace app\common\model;

use think\Model;

class Comment extends Model
{
    protected $table = 'comment';
    protected $id = 'id';
    protected $userId = 'user_id';
    protected $type = 'type';
    protected $typeId = 'type_id';
    protected $content = 'content';
    protected $image = 'image';
    protected $commentTime = 'comment_time';
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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getTypeId()
    {
        return $this->typeId;
    }

    /**
     * @param string $typeId
     */
    public function setTypeId($typeId)
    {
        $this->typeId = $typeId;
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
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getCommentTime()
    {
        return $this->commentTime;
    }

    /**
     * @param string $commentTime
     */
    public function setCommentTime($commentTime)
    {
        $this->commentTime = $commentTime;
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
