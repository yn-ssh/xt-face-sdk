<?php
/**
 * @Author SSH
 * @Email 694711507@qq.com
 * @Date 2025/7/24 14:37
 * @Description 连接服务器回复
 */

namespace ssh\xtfacesdk\entity\response;

class ConnectResponse extends Base
{

   public function __construct($msgId,$uri, $code,$msg,$token="",$expire=3600,$interval=30)
   {
       $result=[];
       if(!empty($token)){
           $result['token']=$token;
           $result['expire']=$expire;
           $result['interval']=$interval;
       }
       parent::__construct($msgId, new Data($uri,$code,$msg,$result));
   }

}