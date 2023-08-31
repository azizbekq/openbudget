<?php

class MobVote
{
    private $postId;
    private $boardId;
    private $login;
    private $secretKey = "xxxxxxxxxxx"; // your secretKey
    private $access = "xxxxxxx"; // your access 
    private $token = "xxxxxxxxx";// your token
    private $version = "5.9.9.9"; // your version app
    
    public function __construct($postId, $boardId){
    $this->postId = $postId;
    $this->boardId = $boardId;
    }
    
    public function responseVote($smsCode, $captcha_key, $captch_result){
        $data = [
         
         "otpKey"=>$checkCode,
         "otpCode"=>$smsCode,//String
         "initiativeId"=>$this->postId,
         "subinitiativesId"=> [],
         "secretKey"=>$this->secretKey,
        ];
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://openbudget.uz/api/v2/vote/private-verify-mobile/ewaL7Js8LEM3EYvD");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Host: openbudget.uz',
        'device-type: ANDROID',
        'referer: https://openbudget.uz/boards-list/'.$this->boardId."/".$this->postId,
        'content-type: application/json; charset=UTF-8'
        ]);
        
        
    
    return json_decode(curl_exec($ch), true);
    curl_close($ch);
    }
    
    
    public function requestVote($phone, $captcha_key, $captch_result){
        $data = [
        "captchaKey"=>$captcha_key,
        "captchaResult"=>$captch_result, //int
        "phoneNumber"=>$phone, //plussiz
        "boardId"=>$this->boardId];
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://openbudget.uz/api/v2/vote/check");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Host: openbudget.uz',
        'referer: https://openbudget.uz/boards-list/'.$this->boardId."/".$this->postId,
        'content-type: application/json; charset=UTF-8'
        ]);
        
        
    
    return json_decode(curl_exec($ch), true);
    curl_close($ch);
    }
    
    public function getCaptch(){
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://openbudget.uz/api/v2/vote/captcha-2");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Host: openbudget.uz',
            'x-xsrf-token: '.$this->token,
            'referer: https://openbudget.uz/boards-list/'.$this->boardId."/".$this->postId,
            'access-captcha: '.$this->access,
        ]);
        
        
    
    return json_decode(curl_exec($ch), true);
    curl_close($ch);
    }
    
}


