<?php
/**
 * @Author SSH
 * @Email 694711507@qq.com
 * @Date 2025/7/24 21:51
 * @Description 人脸抓拍
 */

namespace ssh\xtfacesdk\http;

class XTFaceCapture
{
    /**
     * 事件类型:
     * 1：移动侦测报警
     * 2：智能分析报警:区域入侵或绊线检测报警
     * 3：智能分析报警:视频遮挡报警
     * 4：智能分析报警:婴儿啼哭报警
     * 5：智能分析报警:人员聚集检测报警
     * 6：智能分析报警:人员徘徊检测报警
     * 7：智能分析报警:快速移动报警
     * 8：火焰报警
     * 9：智能分析报警:音量陡升报警
     * 10：智能分析报警:环境噪声陡降报警
     * 11：人形检测实时抓拍
     * 12：关注人员(黑白名单)检测
     * 13：离岗检测报警
     * 14：体温检测报警
     */
    private $type;

    private $pid;

    private $time;//抓拍时间，UNIX时间戳，单位：秒
    private $sn;//设备序列号
    private $name;//姓名，比对机专用
    private $age;//年龄，比对机专用。
    private $gender;//1-男，2-女。比对机专用。
    private $ic_card;//ic。
    private $id_card;//身份证号，比对机专用。
    private $work_id;//工号，比对机专用。
    private $phone;//电话号码，比对机专用。
    private $department;//部门名称，比对机专用。
    private $otherInfo;//备注
    private $category;//类别，1:白名单；2:黑名单；3:VIP；4:访客。比对机专用。
    private $score;//相似度分数，比对机专用。
    private $helmet;//是否戴头盔，0：否，1：是。
    private $smoke;//是否抽烟，0：否，1：是。
    private $handed;//是否手持物品，0：否，1：是。
    private $feature;//提取图片的特征值 512的float数组。
    private Data $data;

    public function __construct(array $message)
    {
        foreach ($message as $key=>$value){
            if(property_exists($this,$key)){
                if($key=='data'){
                    $this->data=new Data($value);
                }else{
                    $this->$key=$value;
                }
            }
        }
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getPid()
    {
        return $this->pid;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @return mixed
     */
    public function getSn()
    {
        return $this->sn;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @return mixed
     */
    public function getIcCard()
    {
        return $this->ic_card;
    }

    /**
     * @return mixed
     */
    public function getIdCard()
    {
        return $this->id_card;
    }



    /**
     * @return mixed
     */
    public function getWorkId()
    {
        return $this->work_id;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return mixed
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * @return mixed
     */
    public function getOtherInfo()
    {
        return $this->otherInfo;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @return mixed
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @return mixed
     */
    public function getHelmet()
    {
        return $this->helmet;
    }

    /**
     * @return mixed
     */
    public function getSmoke()
    {
        return $this->smoke;
    }

    /**
     * @return mixed
     */
    public function getHanded()
    {
        return $this->handed;
    }

    /**
     * @return mixed
     */
    public function getFeature()
    {
        return $this->feature;
    }

    public function getData(): Data
    {
        return $this->data;
    }



}