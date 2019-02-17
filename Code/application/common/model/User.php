<?php

namespace app\common\model;

use think\Model;

class User extends Model
{
    protected $table = 'user';
    protected $deleteFlag = 'delete_flag';
    protected $nickName = 'nick_name';
    protected $realName = 'real_name';
    protected $password = 'password';
    protected $sex = 'sex';
    protected $email = 'email';
    protected $mobile = 'mobile';
    protected $idNumber = 'id_number';
    protected $type = 'type';
    protected $blogNumber = 'blog_number';
    protected $templeteImg = 'templete_img';
    protected $signature = 'signature';

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }



    /**
     * @return array
     */
    public static function getLinks()
    {
        return self::$links;
    }

    /**
     * @param array $links
     */
    public static function setLinks($links)
    {
        self::$links = $links;
    }

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

    /**
     * @return string
     */
    public function getNickName()
    {
        return $this->nickName;
    }

    /**
     * @param string $nickName
     */
    public function setNickName($nickName)
    {
        $this->nickName = $nickName;
    }

    /**
     * @return string
     */
    public function getRealName()
    {
        return $this->realName;
    }

    /**
     * @param string $realName
     */
    public function setRealName($realName)
    {
        $this->realName = $realName;
    }

    /**
     * @return string
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param string $sex
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @param string $mobile
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }

    /**
     * @return string
     */
    public function getIdNumber()
    {
        return $this->idNumber;
    }

    /**
     * @param string $idNumber
     */
    public function setIdNumber($idNumber)
    {
        $this->idNumber = $idNumber;
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
    public function getBlogNumber()
    {
        return $this->blogNumber;
    }

    /**
     * @param string $blogNumber
     */
    public function setBlogNumber($blogNumber)
    {
        $this->blogNumber = $blogNumber;
    }

    /**
     * @return string
     */
    public function getTempleteImg()
    {
        return $this->templeteImg;
    }

    /**
     * @param string $templeteImg
     */
    public function setTempleteImg($templeteImg)
    {
        $this->templeteImg = $templeteImg;
    }

    /**
     * @return string
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * @param string $signature
     */
    public function setSignature($signature)
    {
        $this->signature = $signature;
    }


}
