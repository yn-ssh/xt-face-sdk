<?php
/**
 * @Author SSH
 * @Email 694711507@qq.com
 * @Date 2025/7/24 14:56
 * @Description 重启设备
 */

namespace ssh\xtfacesdk\entity\request;

class RebootRequest extends Base
{
    private string $uri='/system/maintain/reboot' ;
    private $delay_ms=1000 ;//重启延时，单位：ms

    private array $param=[];

    public function __construct(array $message=[])
    {
        parent::__construct($message);
        $this->getData()->setUri($this->uri);
    }

    public function setDelayMs(int $delay_ms): void
    {
        $this->delay_ms = $delay_ms;
        $this->param['delay_ms']=$delay_ms;
    }



    public function build(): static
    {
        $this->getData()->setParam($this->param);
        return $this;
    }






}