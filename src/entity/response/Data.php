<?php
/**
 * @Author SSH
 * @Email 694711507@qq.com
 * @Date 2025/7/24 14:33
 * @Description
 */

namespace ssh\xtfacesdk\entity\response;

class Data
{
    private array $data=[];

    public function __construct(string $uri, int $code, string $msg, array $result)
    {
        $this->data['uri']=$uri;
        $this->data['code']=$code;
        $this->data['msg']=$msg;
        if(count($result)>0){
            $this->data['result']=$result;
        }
    }
    public function getData(): array
    {
        return $this->data;
    }

}