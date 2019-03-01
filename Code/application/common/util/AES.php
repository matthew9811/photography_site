<?php
/**
 * Created by PhpStorm.
 * Power by Admin
 * Date: 2019/2/28
 * Time: 20:48
 */

namespace app\base\controller;

class AES
{
    /**
     * AES加密、解密类
     * 用法：
     * <pre>
     * // 实例化类
     * // 参数$_bit：格式，支持256、192、128，默认为128字节的
     * // 参数$_type：加密/解密方式，支持cfb、cbc、nofb、ofb、stream、ecb，默认为ecb
     * // 参数$_key：密钥，默认为 _Mikkle_AES_Key_
     * $tcaes = new TCAES();
     * $string = 'laohu';
     * // 加密
     * $encodeString = $tcaes->encode($string);
     * // 解密
     * $decodeString = $tcaes->decode($encodeString);
     * </pre>
     */

    private $_bit = MCRYPT_RIJNDAEL_256;
    private $_type = MCRYPT_MODE_CBC;
    private $_key = '_Mikkle_AES_Key_'; // 密钥 必须16位 24位
    private $_use_base64 = true;
    private $_iv_size = null;
    private $_iv = null;

    /**
     * @param string $_key 密钥
     * @param int $_bit 默认使用128字节
     * @param string $_type 加密解密方式
     * @param boolean $_use_base64 默认使用base64二次加密
     */
    public function __construct($_key = '', $_bit = 128, $_type = 'ecb', $_use_base64 = true)
    {
        // 加密字节
        if (192 === $_bit) {
            $this->_bit = MCRYPT_RIJNDAEL_192;
        } elseif (128 === $_bit) {
            $this->_bit = MCRYPT_RIJNDAEL_128;
        } else {
            $this->_bit = MCRYPT_RIJNDAEL_256;
        }
        // 加密方法
        if ('cfb' === $_type) {
            $this->_type = MCRYPT_MODE_CFB;
        } elseif ('cbc' === $_type) {
            $this->_type = MCRYPT_MODE_CBC;
        } elseif ('nofb' === $_type) {
            $this->_type = MCRYPT_MODE_NOFB;
        } elseif ('ofb' === $_type) {
            $this->_type = MCRYPT_MODE_OFB;
        } elseif ('stream' === $_type) {
            $this->_type = MCRYPT_MODE_STREAM;
        } else {
            $this->_type = MCRYPT_MODE_ECB;
        }
        // 密钥
        if (!empty($_key)) {
            $this->_key = $_key;
        }
        // 是否使用base64
        $this->_use_base64 = $_use_base64;

        $this->_iv_size = mcrypt_get_iv_size($this->_bit, $this->_type);
        $this->_iv = mcrypt_create_iv($this->_iv_size, MCRYPT_RAND);
    }

    /**
     * 加密
     * @param string $string 待加密字符串
     * @return string
     */
    public function encode($string)
    {
        //
        if (MCRYPT_MODE_ECB === $this->_type) {
            $encodeString = mcrypt_encrypt($this->_bit, $this->_key, $string, $this->_type);
        } else {
            $encodeString = mcrypt_encrypt($this->_bit, $this->_key, $string, $this->_type, $this->_iv);
        }
        if ($this->_use_base64) {
            $encodeString = base64_encode($encodeString);
        }
        return $encodeString;
    }

    /**
     * 解密
     * @param string $string 待解密字符串
     * @return string
     */
    public function decode($string)
    {
        if ($this->_use_base64) {
            $string = base64_decode($string);
        }
        if (MCRYPT_MODE_ECB === $this->_type) {
            $decodeString = mcrypt_decrypt($this->_bit, $this->_key, $string, $this->_type);
        } else {
            $decodeString = mcrypt_decrypt($this->_bit, $this->_key, $string, $this->_type, $this->_iv);
        }
        return $decodeString;
    }


}
