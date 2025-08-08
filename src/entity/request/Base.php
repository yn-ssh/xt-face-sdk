<?php
/**
 * @Author SSH
 * @Email 694711507@qq.com
 * @Date 2025/7/24 14:13
 * @Description 基础请求类
 */

namespace ssh\xtfacesdk\entity\request;

class Base
{
    private $msgid;
    private $token;
    private Data $data;

    public function __construct(array $message)
    {
        $this->msgid = $message['msgid']??'';
        $this->token = $message['token']??'';
        $data=$message['data']??[];
        $this->data = new Data($data);
    }
    public function getMsgid(): string
    {
        return $this->msgid;
    }
    public function getToken(): string
    {
        return $this->token;
    }
    public function getData(): Data
    {
        return $this->data;
    }

    public function setMsgid($msgid): void
    {
        $this->msgid = $msgid;
    }

    public function setToken($token): void
    {
        $this->token = $token;
    }

    public function setData(Data $data): void
    {
        $this->data = $data;
    }

    public function toArray(): array
    {
        return [
            'msgid' => $this->msgid,
            'token' => $this->token,
            'data' => [
                'uri'=>$this->data->getUri(),
                'param'=>$this->data->getParam(),
            ]
        ];
    }
    public function toJson(): string
    {
        return json_encode($this->toArray(), JSON_UNESCAPED_UNICODE);
    }


}