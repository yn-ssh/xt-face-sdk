<?php
/**
 * @Author SSH
 * @Email 694711507@qq.com
 * @Date 2025/7/24 14:56
 * @Description 查询人员信息
 */

namespace ssh\xtfacesdk\entity\request;

class PersonQueryRequest extends Base
{
    private string $uri='/person/query' ;
    private $pid;//人员ID
    private array $param=[];

    public function __construct(array $message=[])
    {
        parent::__construct($message);
        $this->getData()->setUri($this->uri);
    }

    /**
     * @param mixed $pid
     */
    public function setPid($pid): void
    {
        $this->pid = $pid;
        $this->param['pid']=$this->pid;
    }

    public function build(): static
    {
        $this->getData()->setParam($this->param);
        return $this;
    }






}