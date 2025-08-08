<?php
/**
 * @Author SSH
 * @Email 694711507@qq.com
 * @Date 2025/7/24 14:56
 * @Description 以图搜人请求
 */

namespace ssh\xtfacesdk\entity\request;

class PersonSearchPictureRequest extends Base
{
    private string $uri='/person/search_picture' ;
    private $photo ;//图片的base64编码

    private array $param=[];

    public function __construct(array $message=[])
    {
        parent::__construct($message);
        $this->getData()->setUri($this->uri);
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo): void
    {
        $this->photo = $photo;
        $this->param['photo']=$photo;
    }


    public function build(): static
    {
        $this->getData()->setParam($this->param);
        return $this;
    }






}