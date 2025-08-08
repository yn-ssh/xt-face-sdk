<?php
/**
 * @Author SSH
 * @Email 694711507@qq.com
 * @Date 2025/7/24 14:56
 * @Description 清空人脸库请求
 */

namespace ssh\xtfacesdk\entity\request;

class PersonClearRequest extends Base
{
    private string $uri='/person/clear' ;
    private array $param=[];

    public function __construct(array $message=[])
    {
        parent::__construct($message);
        $this->getData()->setUri($this->uri);
    }


    public function build(): static
    {
        $this->getData()->setParam($this->param);
        return $this;
    }






}