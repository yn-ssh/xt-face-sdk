<?php
/**
 * @Author SSH
 * @Email 694711507@qq.com
 * @Date 2025/7/24 14:32
 * @Description 响应基类
 */

namespace ssh\xtfacesdk\entity\response;

class Base
{
    private string $msgid;
    private Data $data;

    /**
     * 200：成功
     * 401：没有访问权限，需要进行身份认证
     * 404：访问的路径不存在
     * 420：参数异常
     * 421：设备未注册
     * 422：无效的AppId
     * 423：签名校验错误
     * 424：事件类型异常
     * 425：客户端版本过低
     * 426：请求的资源不存在
     */
    //定义错误码
    public const CODE_SUCCESS = 200;
    public const CODE_NO_PERMISSION = 401;
    public const CODE_NOT_FOUND = 404;
    public const CODE_PARAM_ERROR = 420;
    public const CODE_DEVICE_NOT_REGISTERED = 421;
    public const CODE_SIGN_ERROR = 423;
    public const CODE_EVENT_TYPE_ERROR = 424;
    public const CODE_CLIENT_VERSION_TOO_LOW = 425;
    public const CODE_RESOURCE_NOT_FOUND = 426;


    public function __construct(string $msgid, Data $data)
    {
        $this->msgid = $msgid;
        $this->data = $data;
    }
    public function toArray(): array
    {
        return [
            'msgid' => $this->msgid,
            'data' => $this->data->getData()
        ];
    }
    public function toJson(): string
    {
        return json_encode($this->toArray(), JSON_UNESCAPED_UNICODE);
    }


}