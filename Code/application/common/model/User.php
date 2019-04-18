<?php

namespace app\common\model;

use think\Model;

class User extends Model
{
    protected $table = "user";
    protected $id = 'id';

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


    public function jsonSerialize()
    {
        return $this->data;
    }


}
