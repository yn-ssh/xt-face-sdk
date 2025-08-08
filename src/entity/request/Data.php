<?php
/**
 * @Author SSH
 * @Email 694711507@qq.com
 * @Date 2025/7/24 14:18
 * @Description
 */

namespace ssh\xtfacesdk\entity\request;

class Data
{
    private $uri;
    private $param;

    public function __construct(array $data)
    {
        $this->uri = $data['uri']??'';
        $this->param = $data['param']??[];
    }
    public function getUri(): string
    {
        return $this->uri;
    }
    public function getParam(): array
    {
        return $this->param;
    }
    public function setUri(string $uri): void
    {
        $this->uri = $uri;
    }
    public function setParam(array $param): void
    {
        $this->param = $param;
    }

}