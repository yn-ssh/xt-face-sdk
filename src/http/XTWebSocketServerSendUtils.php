<?php
/**
 * @Author SSH
 * @Email 694711507@qq.com
 * @Date 2025/7/24 21:32
 * @Description WEBSOCKET服务端发送工具类
 */

namespace ssh\xtfacesdk\http;

use ssh\xtfacesdk\entity\request\FaceCapParamSetRequest;
use ssh\xtfacesdk\entity\request\GetCapHistoryRequest;
use ssh\xtfacesdk\entity\request\GetFileByPathRequest;
use ssh\xtfacesdk\entity\request\PersonAddRequest;
use ssh\xtfacesdk\entity\request\PersonClearRequest;
use ssh\xtfacesdk\entity\request\PersonDeleteRequest;
use ssh\xtfacesdk\entity\request\PersonListRequest;
use ssh\xtfacesdk\entity\request\PersonQueryRequest;
use ssh\xtfacesdk\entity\request\PersonSearchPictureRequest;
use ssh\xtfacesdk\entity\request\PersonSearchRequest;
use ssh\xtfacesdk\entity\request\PersonUpdateRequest;
use ssh\xtfacesdk\entity\request\RebootRequest;
use Workerman\Connection\AsyncTcpConnection;

class XTWebSocketServerSendUtils
{
    /**
     * 发送消息给指定设备
     * @param AsyncTcpConnection $con
     * @param $sn
     * @param $sendMessage
     * @return bool
     */
    public static function sendToSn(AsyncTcpConnection $con,$sn,$sendMessage): bool
    {
        $data=[];
        $data['uri']='/httpSend';
        $data['sn']=$sn;
        $data['message']=$sendMessage;
        $sendData=[];
        $sendData['data']=$data;
        $sendData=json_encode($sendData,JSON_UNESCAPED_UNICODE);
        return $con->send($sendData);
    }


    /**
     * 人脸参数控制
     * @param AsyncTcpConnection $con
     * @param $sn
     * @param $msgid
     * @param $token
     * @param bool $enable
     * @param bool $show_face
     * @param bool $push_stranger
     * @param bool $push_white
     * @param bool $push_black
     * @param bool $push_vip
     * @param bool $push_friend
     * @param bool $push_face
     * @param bool $push_bg
     * @param bool $push_attr
     * @param bool $play_audio
     * @param bool $play_audio_stranger
     * @param bool $play_audio_white
     * @param bool $play_audio_black
     * @param bool $play_audio_vip
     * @param bool $play_audio_friend
     * @param int $threshold
     * @param int $reg_threshold
     * @param int $mini_face
     * @param int $quality_face
     * @param bool $server_enable
     * @param bool $alarm_out_link
     * @param bool $alarm_out_stranger
     * @param bool $alarm_out_white
     * @param bool $alarm_out_black
     * @param bool $alarm_out_vip
     * @param bool $alarm_out_friend
     * @param int $alarm_out_delay
     * @param int $interval
     * @param bool $alarm_push
     * @param bool $alarm_stranger
     * @param bool $alarm_white
     * @param bool $alarm_black
     * @param bool $alarm_vip
     * @param bool $alarm_friend
     * @return bool
     */
    public static function setFaceCapParam(AsyncTcpConnection $con,$sn,$msgid, $token, bool $enable=true, bool $show_face=true, bool $push_stranger=true, bool $push_white=true, bool $push_black=true, bool $push_vip=true, bool $push_friend=true, bool $push_face=true, bool $push_bg=true, bool $push_attr=true, bool $play_audio=false, bool $play_audio_stranger=false, bool $play_audio_white=false, bool $play_audio_black=false, bool $play_audio_vip=false, bool $play_audio_friend=false, int $threshold=40, int $reg_threshold=85, int $mini_face=40, int $quality_face=60, bool $server_enable=true, bool $alarm_out_link=false, bool $alarm_out_stranger=false, bool $alarm_out_white=true, bool $alarm_out_black=false, bool $alarm_out_vip=false, bool $alarm_out_friend=false, int $alarm_out_delay=5, int $interval=10, bool $alarm_push=true, bool $alarm_stranger=true, bool $alarm_white=false, bool $alarm_black=true, bool $alarm_vip=false, bool $alarm_friend=false): bool
    {
        $face=new FaceCapParamSetRequest();
        $face->setMsgid($msgid);
        $face->setToken($token);
        $face->setEnable( $enable);
        $face->setShowFace( $show_face);
        $face->setPushStranger($push_stranger);
        $face->setPushWhite( $push_white);
        $face->setPushBlack( $push_black);
        $face->setPushVip( $push_vip);
        $face->setPushFriend( $push_friend);
        $face->setPushFace( $push_face);
        $face->setPushBg( $push_bg);
        $face->setPushAttr( $push_attr);
        $face->setPlayAudio($play_audio);
        $face->setPlayAudioStranger($play_audio_stranger);
        $face->setPlayAudioWhite($play_audio_white);
        $face->setPlayAudioBlack($play_audio_black);
        $face->setPlayAudioVip($play_audio_vip);
        $face->setPlayAudioFriend($play_audio_friend);
        $face->setThreshold($threshold);
        $face->setRegThreshold($reg_threshold);
        $face->setMiniFace($mini_face);
        $face->setQualityFace($quality_face);
        $face->setServerEnable($server_enable);
        $face->setAlarmOutLink($alarm_out_link);
        $face->setAlarmOutStranger( $alarm_out_stranger);
        $face->setAlarmOutWhite($alarm_out_white);
        $face->setAlarmOutBlack($alarm_out_black);
        $face->setAlarmOutVip($alarm_out_vip);
        $face->setAlarmOutFriend( $alarm_out_friend);
        $face->setAlarmOutDelay($alarm_out_delay);
        $face->setAlarmOuts($interval,$alarm_push,$alarm_stranger,$alarm_white,$alarm_black,$alarm_vip,$alarm_friend);
        $sendMessage=$face->build()->toJson();
        return self::sendToSn($con,$sn,$sendMessage);
    }

    /**
     * 重启设备
     * @param AsyncTcpConnection $con
     * @param $sn
     * @param $msgid
     * @param $token
     * @return bool
     */
    public static function reboot(AsyncTcpConnection $con,$sn,$msgid, $token): bool
    {
        $reboot=new RebootRequest();
        $reboot->setMsgid($msgid);
        $reboot->setToken($token);
        $sendMessage=$reboot->build()->toJson();
        return self::sendToSn($con,$sn,$sendMessage);
    }

    /**
     * 查询抓拍图像的文件列表
     * @param AsyncTcpConnection $con
     * @param $sn
     * @param $msgid
     * @param $token
     * @param $start_time
     * @param $end_time
     * @param $page_num
     * @param $page_size
     * @param string $name
     * @param string $workId
     * @param string $idCard
     * @param string $phone
     * @return bool
     */
    public static function getCapHistory(AsyncTcpConnection $con,$sn,$msgid, $token, $start_time, $end_time, $page_num, $page_size, string $name='', string $workId='', string $idCard='', string $phone=''): bool
    {
        $getCapHistory=new GetCapHistoryRequest();
        $getCapHistory->setMsgid($msgid);
        $getCapHistory->setToken($token);
        $getCapHistory->setStartTime($start_time);
        $getCapHistory->setEndTime($end_time);
        $getCapHistory->setPageNum($page_num);
        $getCapHistory->setPageSize($page_size);
        $getCapHistory->setName($name);
        $getCapHistory->setWorkId($workId);
        $getCapHistory->setIdCard($idCard);
        $getCapHistory->setPhone($phone);
        $sendMessage=$getCapHistory->build()->toJson();
        return self::sendToSn($con,$sn,$sendMessage);
    }

    /**
     * 获取文件Base64
     * @param AsyncTcpConnection $con
     * @param $sn
     * @param $msgid
     * @param $token
     * @param string $path
     * @return bool
     */
    public static function getFileByPath(AsyncTcpConnection $con,$sn,$msgid, $token, string $path): bool
    {
        $getFileByPath=new GetFileByPathRequest();
        $getFileByPath->setMsgid($msgid);
        $getFileByPath->setToken($token);
        $getFileByPath->setPath($path);
        $sendMessage=$getFileByPath->build()->toJson();
        return self::sendToSn($con,$sn,$sendMessage);
    }

    /**
     * 下发成员信息及照片
     * @param AsyncTcpConnection $con
     * @param $sn
     * @param $msgid
     * @param $token
     * @param $pid
     * @param $name
     * @param $work_id
     * @param $id_card_no
     * @param $ic_card_no
     * @param $gender
     * @param $age
     * @param $department
     * @param $photo
     * @param $category
     * @param $phone
     * @return bool
     */
    public static function personAdd(AsyncTcpConnection $con,$sn,$msgid, $token,$pid,$name,$work_id,$id_card_no,$ic_card_no,$gender,$age,$department,$photo,$category,$phone): bool
    {
        $personAdd=new PersonAddRequest();
        $personAdd->setMsgid($msgid);
        $personAdd->setToken($token);
        $personAdd->setPid($pid);
        $personAdd->setName($name);
        $personAdd->setWorkId($work_id);
        $personAdd->setIdCardNo($id_card_no);
        $personAdd->setIcCardNo($ic_card_no);
        $personAdd->setGender($gender);
        $personAdd->setAge($age);
        $personAdd->setDepartment($department);
        $personAdd->setPhoto($photo);
        $personAdd->setCategory($category);
        $personAdd->setPhone($phone);
        $sendMessage=$personAdd->build()->toJson();
        return self::sendToSn($con,$sn,$sendMessage);
    }


    /**
     * 获取人员列表
     * @param AsyncTcpConnection $con
     * @param $sn
     * @param $msgid
     * @param $token
     * @param $page_num
     * @param $page_size
     * @param int $category
     * @param string $name
     * @param string $workId
     * @param string $idCard
     * @param string $phone
     * @return bool
     */
    public static function personList(AsyncTcpConnection $con,$sn,$msgid, $token, $page_num, $page_size, int $category=0, string $name='', string $workId='', string $idCard='', string $phone=''): bool
    {
        $personList=new PersonListRequest();
        $personList->setMsgid($msgid);
        $personList->setToken($token);
        $personList->setPageNum($page_num);
        $personList->setPageSize($page_size);
        $personList->setCategory($category);
        $personList->setName($name);
        $personList->setWorkId($workId);
        $personList->setIdCard($idCard);
        $personList->setPhone($phone);
        $sendMessage=$personList->build()->toJson();
        return self::sendToSn($con,$sn,$sendMessage);
    }

    /**
     * 修改人员信息及照片
     * @param AsyncTcpConnection $con
     * @param $sn
     * @param $msgid
     * @param $token
     * @param $pid
     * @param $name
     * @param $work_id
     * @param $id_card_no
     * @param $ic_card_no
     * @param $gender
     * @param $age
     * @param $department
     * @param $photo
     * @param $category
     * @param $phone
     * @return bool
     */
    public static function personUpdate(AsyncTcpConnection $con,$sn,$msgid, $token,$pid,$name,$work_id,$id_card_no,$ic_card_no,$gender,$age,$department,$photo,$category,$phone): bool
    {
        $personUpdate=new PersonUpdateRequest();
        $personUpdate->setMsgid($msgid);
        $personUpdate->setToken($token);
        $personUpdate->setPid($pid);
        $personUpdate->setName($name);
        $personUpdate->setWorkId($work_id);
        $personUpdate->setIdCardNo($id_card_no);
        $personUpdate->setIcCardNo($ic_card_no);
        $personUpdate->setGender($gender);
        $personUpdate->setAge($age);
        $personUpdate->setDepartment($department);
        $personUpdate->setPhoto($photo);
        $personUpdate->setCategory($category);
        $personUpdate->setPhone($phone);
        $sendMessage=$personUpdate->build()->toJson();
        return self::sendToSn($con,$sn,$sendMessage);
    }

    /**
     * 删除人员
     * @param AsyncTcpConnection $con
     * @param $sn
     * @param $msgid
     * @param $token
     * @param $pid
     * @return bool
     */
    public static function personDelete(AsyncTcpConnection $con,$sn,$msgid, $token,$pid): bool
    {
        $personDelete=new PersonDeleteRequest();
        $personDelete->setMsgid($msgid);
        $personDelete->setToken($token);
        $personDelete->setPid($pid);
        $sendMessage=$personDelete->build()->toJson();
        return self::sendToSn($con,$sn,$sendMessage);
    }
    /**
     * 清空人员
     */
    public static function personClear(AsyncTcpConnection $con,$sn,$msgid, $token): bool
    {
        $personClear=new PersonClearRequest();
        $personClear->setMsgid($msgid);
        $personClear->setToken($token);
        $sendMessage=$personClear->build()->toJson();
        return self::sendToSn($con,$sn,$sendMessage);
    }
    /**
     * 获取人员信息
     */
    public static function personQuery(AsyncTcpConnection $con,$sn,$msgid, $token,$pid): bool
    {
        $personInfo=new PersonQueryRequest();
        $personInfo->setMsgid($msgid);
        $personInfo->setToken($token);
        $personInfo->setPid($pid);
        $sendMessage=$personInfo->build()->toJson();
        return self::sendToSn($con,$sn,$sendMessage);
    }
    /**
     * 以图搜图
     */
    public static function personSearch(AsyncTcpConnection $con,$sn,$msgid, $token, $photo,$threshold,$start_time,$end_time): bool
    {
        $personSearch=new PersonSearchRequest();
        $personSearch->setMsgid($msgid);
        $personSearch->setToken($token);
        $personSearch->setPhoto($photo);
        $personSearch->setThreshold($threshold);
        $personSearch->setStartTime($start_time);
        $personSearch->setEndTime($end_time);
        $sendMessage=$personSearch->build()->toJson();
        return self::sendToSn($con,$sn,$sendMessage);

    }
    /**
     * 以图搜人
     */
    public function personSearchPicture(AsyncTcpConnection $con,$sn,$msgid,$token,$photo): bool
    {
        $personSearch=new PersonSearchPictureRequest();
        $personSearch->setMsgid($msgid);
        $personSearch->setToken($token);
        $personSearch->setPhoto($photo);
        $sendMessage=$personSearch->build()->toJson();
        return self::sendToSn($con,$sn,$sendMessage);
    }

}