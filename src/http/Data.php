<?php
/**
 * @Author SSH
 * @Email 694711507@qq.com
 * @Date 2025/7/24 22:01
 * @Description
 */

namespace ssh\xtfacesdk\http;

class Data
{
    private $id;
    private $face_data;//人脸图,base64编码
    private $body_data;//全身照,base64编码
    private $bg_data;//全景图,base64编码
    private $jpeg_url_face;//人脸图路径
    private $jpeg_url_body;//全身照路径
    private $jpeg_url_frame;//全景图路径

    public function __construct(array $data)
    {
        foreach ($data as $key=>$value){
            if(property_exists($this,$key)){
                $this->$key=$value;
            }
        }
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getFaceData()
    {
        return $this->face_data;
    }

    /**
     * @return mixed
     */
    public function getBodyData()
    {
        return $this->body_data;
    }

    /**
     * @return mixed
     */
    public function getBgData()
    {
        return $this->bg_data;
    }

    /**
     * @return mixed
     */
    public function getJpegUrlFace()
    {
        return $this->jpeg_url_face;
    }

    /**
     * @return mixed
     */
    public function getJpegUrlBody()
    {
        return $this->jpeg_url_body;
    }

    /**
     * @return mixed
     */
    public function getJpegUrlFrame()
    {
        return $this->jpeg_url_frame;
    }



}