<?php
/**
 * @Author SSH
 * @Email 694711507@qq.com
 * @Date 2025/7/24 14:58
 * @Description TOKEN更新回复
 */

namespace ssh\xtfacesdk\entity\response;

class TokenUpdateResponse extends Base
{
    public function __construct($msgId,$uri, $code,$msg,$token="",$expire=3600)
    {
        $result=[];
        if(!empty($token)){
            $result['token']=$token;
            $result['expire']=$expire;
        }
        parent::__construct($msgId, new Data($uri,$code,$msg,$result));
    }

}