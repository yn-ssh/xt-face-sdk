<?php
/**
 * @Author SSH
 * @Email 694711507@qq.com
 * @Date 2025/7/24 22:07
 * @Description XTHttp响应工具类
 */

namespace ssh\xtfacesdk\http;

use Webman\Http\Response;
use Workerman\Connection\AsyncTcpConnection;

class XTHttpUtils
{
    /**
     * 服务器响应输出
     */
    public static function response($code=0,$msg='OK',$uri='',$result=[]): Response
    {
        $data=[];
        $data['code']=$code;
        $data['msg']=$msg;
        if(!empty($uri)){
            $data['uri']=$uri;
        }
        if(count($result)>0){
            $data['result']=$result;
        }
        return json($data);
    }
    /**
     * 服务器请求输入
     */
    public static function requestBody($uri,$param): bool|string
    {
        $message=[];
        $message['uri']=$uri;
        $message['param']=$param;
        return json_encode($message, JSON_UNESCAPED_UNICODE);
    }

    /**
     * websocket请求输入同步响应
     */
    public static function wsRequestSync($url,$callback,$timeout=5): Response
    {
        //服务器响应输出
        $response = null;
        //输出
        $output = json(['code'=>400,"msg"=>"响应超时"]);
        $ws = new AsyncTcpConnection($url);
        //websocket握手成功
        $ws->onWebSocketConnect = function(AsyncTcpConnection $con)use($callback) {
            $callback($con);
        };
        // 当收到消息时
        $ws->onMessage = function(AsyncTcpConnection $con, $data)use (&$response) {
            $response= json_decode($data, true);
        };
        //开始连接
        $ws->connect();
        $startTime = time();
        // 循环等待响应
        while (time() - $startTime < $timeout) {
            // 短暂休眠
            usleep(10000);
            if ($response !== null) {
                break;
            }
        }
        //关闭连接
        $ws->close();
        if(is_array($response)){
            $msgid=$response['msgid']??'';
            $data=$response['data']??[];
            $uri=$data['uri']??'';
            $result=$data['result']??[];
            $code=$data['code']??400;
            $msg=$data['msg']??'';
            if($code!=0){
                $output=json(['code'=>$code,"msg"=>$msg]);
            }else{
                $output=json(['code'=>200,"msg"=>"成功","result"=>$result]);
            }
        }
        return $output;
    }

}