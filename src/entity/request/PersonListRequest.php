<?php
/**
 * @Author SSH
 * @Email 694711507@qq.com
 * @Date 2025/7/24 14:56
 * @Description 查询人员列表请求
 */

namespace ssh\xtfacesdk\entity\request;

class PersonListRequest extends Base
{
    private string $uri='/person/list' ;
    private $page_num=1;//页码
    private $page_size=10;//每页记录条数，最大不超过32
    private $category="";//类别，1:白名单；2:黑名单；3:VIP；4:访客
    private $name="";//指定姓名
    private $workId="";//指定工号
    private $idCard="";//指定身份证号
    private $phone="";//指定手机号

    private array $param=[];

    public function __construct(array $message=[])
    {
        parent::__construct($message);
        $this->getData()->setUri($this->uri);
    }

    public function setPageNum(int $page_num): void
    {
        $this->page_num = $page_num;
        $this->param['page_num']=$page_num;
    }

    public function setPageSize(int $page_size): void
    {
        $this->page_size = $page_size;
        $this->param['page_size']=$page_size;
    }

    public function setCategory(string $category): void
    {
        $this->category = $category;
        $this->param['category']=$category;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
        $this->param['name']=$name;
    }
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
        $this->param['phone']=$phone;
    }

    public function setWorkId(string $workId): void
    {
        $this->workId = $workId;
        $this->param['workId']=$workId;
    }

    public function setIdCard(string $idCard): void
    {
        $this->idCard = $idCard;
        $this->param['idCard']=$idCard;
    }


    public function build(): static
    {
        $this->getData()->setParam($this->param);
        return $this;
    }






}