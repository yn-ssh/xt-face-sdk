<?php
/**
 * @Author SSH
 * @Email 694711507@qq.com
 * @Date 2025/7/24 18:19
 * @Description 清空人员信息响应
 */

namespace ssh\xtfacesdk\entity\response;

class PersonClearResponse extends Base
{
    private $msgid;
    private Data $data;

    public function __construct(array $message)
    {
        $this->msgid = $message['msgid']??'';
        $data=$message['data']??[];
        $uri=$data['uri']??'';
        $code=$data['code']??'';
        $msg=$data['msg']??'';
        $result=[];
        $this->data = new Data($uri,$code,$msg,$result);
        parent::__construct($this->msgid,$this->data);
    }

    public function getMsgid(): mixed
    {
        return $this->msgid;
    }

    public function getData(): Data
    {
        return $this->data;
    }


}