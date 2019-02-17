<?php

namespace app\common\model;

use think\Model;

class Blog extends Model
{
    protected $table = 'blog';
    protected $id = 'id';
    protected $userId = 'user_id';
    protected $content = 'content';
    protected $title = 'title';
    protected $createTime = 'create_time';
    protected $alterTime = 'alter_time';
    protected $labelid = 'labelid';
    protected $status = 'status';
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
    public function getCreateTime()
    {
        return $this->createTime;
    }

    /**
     * @param string $createTime
     */
    public function setCreateTime($createTime)
    {
        $this->createTime = $createTime;
    }

    /**
     * @return string
     */
    public function getAlterTime()
    {
        return $this->alterTime;
    }

    /**
     * @param string $alterTime
     */
    public function setAlterTime($alterTime)
    {
        $this->alterTime = $alterTime;
    }

    /**
     * @return string
     */
    public function getLabelid()
    {
        return $this->labelid;
    }

    /**
     * @param string $labelid
     */
    public function setLabelid($labelid)
    {
        $this->labelid = $labelid;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
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
