<?php
/**
 * @Author SSH
 * @Email 694711507@qq.com
 * @Date 2025/7/24 14:56
 * @Description 获取图片base64编码
 */

namespace ssh\xtfacesdk\entity\request;

class GetFileByPathRequest extends Base
{
    private string $uri='/storage/get_file_by_path' ;
    private string $path;
    private array $param=[];

    public function __construct(array $message=[])
    {
        parent::__construct($message);
        $this->getData()->setUri($this->uri);
    }

    public function setPath(string $path): void
    {
        $this->path = $path;
        $this->param['path']=$path;
    }




    public function build(): static
    {
        $this->getData()->setParam($this->param);
        return $this;
    }






}