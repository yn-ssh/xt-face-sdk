<?php
/**
 * @Author SSH
 * @Email 694711507@qq.com
 * @Date 2025/7/24 14:25
 * @Description 连接服务器请求
 */

namespace ssh\xtfacesdk\entity\request;

class ConnectRequest extends Base
{
    private string $uri ;
    private $sn ;
    private $sign ;
    private $ip;
    private $ts ;

    public function __construct(array $message)
    {
        parent::__construct($message);
        $data=$this->getData();
        $param=$data->getParam();
        $this->uri = $data->getUri()??'';
        $this->sn = $param['sn']??'';
        $this->sign = $param['sign']??'';
        $this->ts = $param['ts']??'';
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
    public function getSign(): string
    {
        return $this->sign;
    }
    public function getTs(): string
    {
        return $this->ts;
    }
    public function getIp(): string
    {
        return $this->ip;
    }
}