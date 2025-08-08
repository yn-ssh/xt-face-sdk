<?php
/**
 * @Author SSH
 * @Email 694711507@qq.com
 * @Date 2025/7/24 14:56
 * @Description 心跳
 */

namespace ssh\xtfacesdk\entity\request;

class HeartbeatRequest extends Base
{
    private string $uri ;
    private $sn ;
    private $ip;

    public function __construct(array $message)
    {
        parent::__construct($message);
        $param=$this->getData()->getParam();
        $this->uri = $param['uri']??'';
        $this->sn = $param['sn']??'';
        $this->ip = $param['ip']??'';
    }
    public function getUri(): string
    {
        return $this->uri;
    }
    public function getSn(): string
    {
        return $this->sn;
    }
    public function getIp(): string
    {
        return $this->ip;
    }


}