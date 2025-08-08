<?php
/**
 * @Author SSH
 * @Email 694711507@qq.com
 * @Date 2025/7/24 14:56
 * @Description 修改人员信息及照片
 */

namespace ssh\xtfacesdk\entity\request;

class PersonUpdateRequest extends Base
{
    private string $uri='/person/update' ;
    private $pid;//人员ID
    private $name;// 姓名
    private $work_id;//工号
    private $id_card_no;// 身份证号码
    private $ic_card_no;//IC卡号
    private $gender;//性别 1-男 2-女;
    private $age;//年龄
    private $department;//部门
    private $photo;//人脸照片Base64编码
    private $category;//类别，1:白名单 2:黑名单 3:VIP;4:访客
    private $phone;//手机号

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

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
        $this->param['name']=$this->name;
    }

    /**
     * @param mixed $work_id
     */
    public function setWorkId($work_id): void
    {
        $this->work_id = $work_id;
        $this->param['work_id']=$this->work_id;
    }

    /**
     * @param mixed $id_card_no
     */
    public function setIdCardNo($id_card_no): void
    {
        $this->id_card_no = $id_card_no;
        $this->param['id_card_no']=$this->id_card_no;
    }

    /**
     * @param mixed $ic_card_no
     */
    public function setIcCardNo($ic_card_no): void
    {
        $this->ic_card_no = $ic_card_no;
        $this->param['ic_card_no']=$this->ic_card_no;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender): void
    {
        $this->gender = $gender;
        $this->param['gender']=$this->gender;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age): void
    {
        $this->age = $age;
        $this->param['age']=$this->age;
    }

    /**
     * @param mixed $department
     */
    public function setDepartment($department): void
    {
        $this->department = $department;
        $this->param['department']=$this->department;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo): void
    {
        $this->photo = $photo;
        $this->param['photo']=$this->photo;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category): void
    {
        $this->category = $category;
        $this->param['category']=$this->category;
    }
    /**
     * @param mixed $phone
     */
    public function setPhone($phone): void
    {
        $this->phone = $phone;
        $this->param['phone']=$this->phone;
    }

    public function build(): static
    {
        $this->getData()->setParam($this->param);
        return $this;
    }






}