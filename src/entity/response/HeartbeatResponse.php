<?php
/**
 * @Author SSH
 * @Email 694711507@qq.com
 * @Date 2025/7/24 14:37
 * @Description 心跳回复
 */

namespace ssh\xtfacesdk\entity\response;

class HeartbeatResponse extends Base
{

   public function __construct($msgId,$uri, $code,$msg,$expire="")
   {
       $result=[];
       if($expire!=""){
           $result['expire']=$expire;
       }
       parent::__construct($msgId, new Data($uri,$code,$msg,$result));
   }

}