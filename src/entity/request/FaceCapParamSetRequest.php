<?php
/**
 * @Author SSH
 * @Email 694711507@qq.com
 * @Date 2025/7/24 14:56
 * @Description 人脸参数设置
 */

namespace ssh\xtfacesdk\entity\request;

class FaceCapParamSetRequest extends Base
{
    private string $uri='ivp/facecap_param_set' ;
    private $enable ;//true打开 false关闭
    private $show_face;//显示人脸框
    private $push_stranger;//推送陌生人
    private $push_white;//推送白名单
    private $push_black;//推送黑名单
    private $push_vip;//推送VIP
    private $push_friend;//推送访客
    private $push_face;//推送人脸图
    private $push_bg;//推送背景图
    private $push_attr;//推送属性
    private $play_audio;//语音播报
    private $play_audio_stranger;//陌生人语音播报
    private $play_audio_white;//白名单语音播报
    private $play_audio_black;//黑名单语音播报
    private $play_audio_vip;//VIP语音播报
    private $play_audio_friend;//访客语音播报
    private $threshold;//检测阈值 0-100
    private $reg_threshold;//识别阈值 0-100
    private $mini_face;//人脸大小 30-500
    private $quality_face;//人脸质量 0-100
    private $server_enable;//使能人脸服务器
    private $alarm_out_link;//使能继电器
    private $alarm_out_stranger;//陌生人使能继电器
    private $alarm_out_white;//白名单使能继电器
    private $alarm_out_black;//黑名单使能继电器
    private $alarm_out_vip;//VIP使能继电器
    private $alarm_out_friend;//访客使能继电器
    private $alarm_out_delay;//使能继电器持续时间（单位：秒，范围：5-60s）
    private $alarm_out;//人脸报警 10-60s{"interval":10,"alarm_push":true,"alarm_stranger":true,"alarm_white":false,"alarm_black":true,"alarm_vip":false,"alarm_friend":false}

    private array $param=[];

    public function __construct(array $message=[])
    {
        parent::__construct($message);
        $this->getData()->setUri($this->uri);
    }


    /**
     * @param mixed $enable
     */
    public function setEnable($enable): void
    {
        $this->enable = $enable;
        $this->param['enable']=$enable;
    }


    /**
     * @param mixed $show_face
     */
    public function setShowFace($show_face): void
    {
        $this->show_face = $show_face;
        $this->param['show_face']=$show_face;
    }


    /**
     * @param mixed $push_stranger
     */
    public function setPushStranger($push_stranger): void
    {
        $this->push_stranger = $push_stranger;
        $this->param['push_stranger']=$push_stranger;
    }


    /**
     * @param mixed $push_white
     */
    public function setPushWhite($push_white): void
    {
        $this->push_white = $push_white;
        $this->param['push_white']=$push_white;
    }


    /**
     * @param mixed $push_black
     */
    public function setPushBlack($push_black): void
    {
        $this->push_black = $push_black;
        $this->param['push_black']=$push_black;
    }


    /**
     * @param mixed $push_vip
     */
    public function setPushVip($push_vip): void
    {
        $this->push_vip = $push_vip;
        $this->param['push_vip']=$push_vip;
    }


    /**
     * @param mixed $push_friend
     */
    public function setPushFriend($push_friend): void
    {
        $this->push_friend = $push_friend;
        $this->param['push_friend']=$push_friend;
    }



    /**
     * @param mixed $push_face
     */
    public function setPushFace($push_face): void
    {
        $this->push_face = $push_face;
        $this->param['push_face']=$push_face;
    }


    /**
     * @param mixed $push_bg
     */
    public function setPushBg($push_bg): void
    {
        $this->push_bg = $push_bg;
        $this->param['push_bg']=$push_bg;
    }


    /**
     * @param mixed $push_attr
     */
    public function setPushAttr($push_attr): void
    {
        $this->push_attr = $push_attr;
        $this->param['push_attr']=$push_attr;
    }


    /**
     * @param mixed $play_audio
     */
    public function setPlayAudio($play_audio): void
    {
        $this->play_audio = $play_audio;
        $this->param['play_audio']=$play_audio;
    }


    /**
     * @param mixed $play_audio_stranger
     */
    public function setPlayAudioStranger($play_audio_stranger): void
    {
        $this->play_audio_stranger = $play_audio_stranger;
        $this->param['play_audio_stranger']=$play_audio_stranger;
    }


    /**
     * @param mixed $play_audio_white
     */
    public function setPlayAudioWhite($play_audio_white): void
    {
        $this->play_audio_white = $play_audio_white;
        $this->param['play_audio_white']=$play_audio_white;
    }


    /**
     * @param mixed $play_audio_black
     */
    public function setPlayAudioBlack($play_audio_black): void
    {
        $this->play_audio_black = $play_audio_black;
        $this->param['play_audio_black']=$play_audio_black;
    }


    /**
     * @param mixed $play_audio_vip
     */
    public function setPlayAudioVip($play_audio_vip): void
    {
        $this->play_audio_vip = $play_audio_vip;
        $this->param['play_audio_vip']=$play_audio_vip;
    }


    /**
     * @param mixed $play_audio_friend
     */
    public function setPlayAudioFriend($play_audio_friend): void
    {
        $this->play_audio_friend = $play_audio_friend;
        $this->param['play_audio_friend']=$play_audio_friend;
    }


    /**
     * @param mixed $threshold
     */
    public function setThreshold($threshold): void
    {
        $this->threshold = $threshold;
        $this->param['threshold']=$threshold;
    }


    /**
     * @param mixed $reg_threshold
     */
    public function setRegThreshold($reg_threshold): void
    {
        $this->reg_threshold = $reg_threshold;
        $this->param['reg_threshold']=$reg_threshold;
    }


    /**
     * @param mixed $mini_face
     */
    public function setMiniFace($mini_face): void
    {
        $this->mini_face = $mini_face;
        $this->param['mini_face']=$mini_face;
    }


    /**
     * @param mixed $quality_face
     */
    public function setQualityFace($quality_face): void
    {
        $this->quality_face = $quality_face;
        $this->param['quality_face']=$quality_face;
    }


    /**
     * @param mixed $server_enable
     */
    public function setServerEnable($server_enable): void
    {
        $this->server_enable = $server_enable;
        $this->param['server_enable']=$server_enable;
    }


    /**
     * @param mixed $alarm_out_link
     */
    public function setAlarmOutLink($alarm_out_link): void
    {
        $this->alarm_out_link = $alarm_out_link;
        $this->param['alarm_out_link']=$alarm_out_link;
    }


    /**
     * @param mixed $alarm_out_stranger
     */
    public function setAlarmOutStranger($alarm_out_stranger): void
    {
        $this->alarm_out_stranger = $alarm_out_stranger;
        $this->param['alarm_out_stranger']=$alarm_out_stranger;
    }


    /**
     * @param mixed $alarm_out_white
     */
    public function setAlarmOutWhite($alarm_out_white): void
    {
        $this->alarm_out_white = $alarm_out_white;
        $this->param['alarm_out_white']=$alarm_out_white;
    }


    /**
     * @param mixed $alarm_out_black
     */
    public function setAlarmOutBlack($alarm_out_black): void
    {
        $this->alarm_out_black = $alarm_out_black;
        $this->param['alarm_out_black']=$alarm_out_black;
    }


    /**
     * @param mixed $alarm_out_vip
     */
    public function setAlarmOutVip($alarm_out_vip): void
    {
        $this->alarm_out_vip = $alarm_out_vip;
        $this->param['alarm_out_vip']=$alarm_out_vip;
    }


    /**
     * @param mixed $alarm_out_friend
     */
    public function setAlarmOutFriend($alarm_out_friend): void
    {
        $this->alarm_out_friend = $alarm_out_friend;
        $this->param['alarm_out_friend']=$alarm_out_friend;
    }


    /**
     * @param mixed $alarm_out_delay
     */
    public function setAlarmOutDelay($alarm_out_delay): void
    {
        $this->alarm_out_delay = $alarm_out_delay;
        $this->param['alarm_out_delay']=$alarm_out_delay;
    }


    /**
     * @param mixed $alarm_out
     */
    public function setAlarmOut($alarm_out): void
    {
        $this->alarm_out = $alarm_out;
        $this->param['alarm_out']=$alarm_out;
    }

    public function setAlarmOuts($interval,$alarm_push,$alarm_stranger,$alarm_white,$alarm_black,$alarm_vip,$alarm_friend): void
    {
        $this->alarm_out = [
            'interval'=>$interval,
            'alarm_push'=>$alarm_push,
            'alarm_stranger'=>$alarm_stranger,
            'alarm_white'=>$alarm_white,
            'alarm_black'=>$alarm_black,
            'alarm_vip'=>$alarm_vip,
            'alarm_friend'=>$alarm_friend
        ];
        $this->param['alarm_out']=[
            'interval'=>$interval,
            'alarm_push'=>$alarm_push,
            'alarm_stranger'=>$alarm_stranger,
            'alarm_white'=>$alarm_white,
            'alarm_black'=>$alarm_black,
            'alarm_vip'=>$alarm_vip,
            'alarm_friend'=>$alarm_friend
        ];
    }

    public function build(): static
    {
        $this->getData()->setParam($this->param);
        return $this;
    }






}