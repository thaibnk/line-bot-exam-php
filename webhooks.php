<?php // callback.php

require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');


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
 

$access_token = 'l5Bw29jlIDPWLxFNpMmZ9CgLO9xK0iINd8e29puQSXaFiH1grI8UZ65Idzx1x1YVk8lM4sIrJX7UND4uNm19N1eAZa97XK1MtynbtyJsi18Z/UWFObhE/8dJH3LtmE0rv2apqsl/ZTbkK2/tPsF/pgdB04t89/1O/w1cDnyilFU=';
	
	//'3ALKAbKFoGuJyJnoDdn0HeyfbxLFtEXBKiC0lFeoNl/XbL4WhoCZzefp2n7UDuXaCWfErIDro07BnZNggJmXJChXTIlMPo8LRJ+n1LEgbRUaKehDkiCr5p5CakHrPX+gauOGX/R5bB2e5yi7xjnHDAdB04t89/1O/w1cDnyilFU=';


// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['source']['userId'];
			// Get replyToken
			$replyToken = $event['replyToken'];

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
			
			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = ['replyToken' => $replyToken,'messages'=>array(array('type'=>'text','text'=>'hello'),
            array('type'=>'text','text'=>'สวัสดี'),array('type'=>'sticker','packageId'=>'1','stickerId'=>'13'))];
			//	'messages' => [$messages],
	
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);
                      exec("php botpush1.php > /dev/null &");
			echo $result . "\r\n";
		}
	}
}
echo "OK";
