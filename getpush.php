<?php

require "vendor/autoload.php";
use LINE\LINEBot;
use LINE\LINEBot\HTTPClient;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
//use LINE\LINEBot\Event;
//use LINE\LINEBot\Event\BaseEvent;
//use LINE\LINEBot\Event\MessageEvent;
use LINE\LINEBot\MessageBuilder;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use LINE\LINEBot\MessageBuilder\StickerMessageBuilder;
use LINE\LINEBot\MessageBuilder\ImageMessageBuilder;
use LINE\LINEBot\MessageBuilder\LocationMessageBuilder;
use LINE\LINEBot\MessageBuilder\AudioMessageBuilder;
use LINE\LINEBot\MessageBuilder\VideoMessageBuilder;
use LINE\LINEBot\ImagemapActionBuilder;
use LINE\LINEBot\ImagemapActionBuilder\AreaBuilder;
use LINE\LINEBot\ImagemapActionBuilder\ImagemapMessageActionBuilder ;
use LINE\LINEBot\ImagemapActionBuilder\ImagemapUriActionBuilder;
use LINE\LINEBot\MessageBuilder\Imagemap\BaseSizeBuilder;
use LINE\LINEBot\MessageBuilder\ImagemapMessageBuilder;
use LINE\LINEBot\MessageBuilder\MultiMessageBuilder;
use LINE\LINEBot\TemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\DatetimePickerTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateMessageBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ConfirmTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselColumnTemplateBuilder;
 
//  +by me
//require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');
$access_token = 'l5Bw29jlIDPWLxFNpMmZ9CgLO9xK0iINd8e29puQSXaFiH1grI8UZ65Idzx1x1YVk8lM4sIrJX7UND4uNm19N1eAZa97XK1MtynbtyJsi18Z/UWFObhE/8dJH3LtmE0rv2apqsl/ZTbkK2/tPsF/pgdB04t89/1O/w1cDnyilFU=';

  //'3ALKAbKFoGuJyJnoDdn0HeyfbxLFtEXBKiC0lFeoNl/XbL4WhoCZzefp2n7UDuXaCWfErIDro07BnZNggJmXJChXTIlMPo8LRJ+n1LEgbRUaKehDkiCr5p5CakHrPX+gauOGX/R5bB2e5yi7xjnHDAdB04t89/1O/w1cDnyilFU=';
r
$channelSecret =  '5ee439e1f6308d8a4a660f944c2ce8e5';  
  // '75c03f392f6e53d662d6f5a8db9e421f';

if ($_GET['userid']) {
    pushID=$_GET['userid']
}
else
$pushID ='Ua53c53af718115e3453b75a6a564a761'; 

  $userIds = array('Ua53c53af718115e3453b75a6a564a761','U1abe44912e42cc30622b90c918c304c5');
    //               ,'U3b8aee0375cf0918063385e5d1b88dfa','U188d6da54382f7bfa79551a5ec70d95e','U039d1e9327f1121f2e8ead2c852d0fd7');

//s3 761 ,y7 4c5, j1mini 88dfa,note4   0d9   , s4 fd7
  //U1abe44912e42cc30622b90c918c304c5');
  //'U7ef7a449f2a5c2057eacfc02ba2eb286';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);
    
$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('สวัสดีจ๊ะ ร้านอาหารแนะนำวันนี้  CoffeeD  อร่อยดี ');

 $arr_replyData = array();
    $textReplyMessage = "ระบบ AI ตอบกลับคุณเป็นข้อความ";
    $arr_replyData[] = new TextMessageBuilder($textReplyMessage);
                     
    $picFullSize = 'https://7698d940-a-62cb3a1a-s-sites.googlegroups.com/site/cosmocoffeed/nxng-khim/small_kim.png?attachauth=ANoY7crDxPRKu11N2TE5WLTL4XxsBPfa_V03kxBHijnv9ER8s6-JKHFPru7U0Xgb8Lsu5FHcJCq2GF7mfGSeGp5mhv76e3YXAjfbEY7km3ByK716ZoYZoGyK70TSS62-7JnGjxKaUG1ft1If7EbQ9DYUUw8jW8IQLuY4BgbDoy7WYGghopyI1QyTiJiFWNRqAcmXTnxLMfxRM7pHMLQqnjA1kRplF429S5WE7DjPd1i-NRcWH51sUQc%3D&attredirects=0';
    $picThumbnail = 'https://7698d940-a-62cb3a1a-s-sites.googlegroups.com/site/cosmocoffeed/nxng-khim/small_kim.jpg?attachauth=ANoY7crHesQ4PuLmAMJPYfML73Dhhs0L_AR3_-yG-m08lR3TObYSbKwsEURzWKIDZ9_LPKegApyab3TT-k0jx88AIU4lIuck2LaEk_xweNAujRfH8E4HYB_Cw8Y0FleSef9FKwZg1aA94bulqOG3Z9I2TAE7wXom6v1-M9lazvgqxaPESUEClDx5KZJop7QzqZI4l3F-jc7Jp-jc6gTarRrs8jJ-I1rsCJkQgqqiBtMfJcKTUI5scCw%3D&attredirects=0';
    $arr_replyData[] = new ImageMessageBuilder($picFullSize,$picThumbnail);
                     
    $placeName = "ที่ตั้งร้าน อร่อยดี coffeed cosmo เมืองทองธานี ";
    $placeAddress = "ต.บางพูด อ.ปากเกร็ด จ.นนทบุรี ประเทศไทย";
    $latitude = 13.9118964;
    $longitude = 100.5499599;
    $arr_replyData[] = new LocationMessageBuilder($placeName, $placeAddress, $latitude ,$longitude);        
 
    $multiMessage =     new MultiMessageBuilder;
    foreach($arr_replyData as $arr_Reply){
            $multiMessage->add($arr_Reply);
    }
    $replyData = $multiMessage;            

//$response = $bot->multicast($userIds,$textMessageBuilder);
//$response = $bot->multicast($userIds,$replyData);
$response = $bot->pushMessage($pushID, $replyData);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
?>
