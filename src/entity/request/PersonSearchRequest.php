<?php
/**
 * @Author SSH
 * @Email 694711507@qq.com
 * @Date 2025/7/24 14:56
 * @Description 以图搜图请求
 */

namespace ssh\xtfacesdk\entity\request;

class PersonSearchRequest extends Base
{
    private string $uri='/person/search' ;
    private $photo ;//图片的base64编码
    private $threshold;//比对阈值，有效值为0 - 100
    private $start_time;//起始时间，格式为：yyyy-MM-dd HH:mm:ss
    private $end_time;//结束时间，格式为：yyyy-MM-dd HH:mm:ss

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

    /**
     * @param mixed $threshold
     */
    public function setThreshold($threshold): void
    {
        $this->threshold = $threshold;
        $this->param['threshold']=$threshold;
    }

    /**
     * @param mixed $start_time
     */
    public function setStartTime($start_time): void
    {
        $this->start_time = $start_time;
        $this->param['start_time']=$start_time;
    }

    /**
     * @param mixed $end_time
     */
    public function setEndTime($end_time): void
    {
        $this->end_time = $end_time;
        $this->param['end_time']=$end_time;
    }




    public function build(): static
    {
        $this->getData()->setParam($this->param);
        return $this;
    }






}