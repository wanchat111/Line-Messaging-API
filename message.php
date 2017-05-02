<?php
$access_token = 'ZVe7KOu6MC7/Vo1o8uDOWCkFcmN62GJX8UEU7aookHrzatE916rXlavzX5JxSpVnNSaLi3kDg1jlAIT7+1dQU9G0ZNj3UPJwRNFkE65A9dl1nxMJHbL9fIJi19cisycC2+1ogbOVrMHzM2Z7EsIXfQdB04t89/1O/w1cDnyilFU=
';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	// foreach ($events['events'] as $event) {
	// 	// Reply only when message sent is in 'text' format
	// 	if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
	// 		// Get text sent
	// 		$text = $event['message']['text'];
	// 		// Get replyToken
	// 		$replyToken = $event['replyToken'];
	// 		$fp = fopen('test2.txt','w');
	// 		fwrite($fp, $replyToken);
	// 		fclose($fp);

	// 		// Build message to reply back
	// 		$messages = [
	// 			'type' => 'text',
	// 			'text' => $text
	// 		];

	// 		// Make a POST Request to Messaging API to reply to sender
	// 		$url = 'https://api.line.me/v2/bot/message/reply';
	// 		$data = [
	// 			'replyToken' => $replyToken,
	// 			'messages' => [$messages],
	// 		];
	// 		$post = json_encode($data);
	// 		$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

	// 		$ch = curl_init($url);
	// 		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	// 		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// 		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	// 		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	// 		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	// 		$result = curl_exec($ch);
	// 		curl_close($ch);

	// 		echo $result . "\r\n";
	// 	}
	// }
	foreach ($events['events'] as $event) {

		if ($event['type'] == 'join') {
			$fp = fopen('test2.txt','w');
			fwrite($fp, $event['source']['groupId']);
			fclose($fp);

		}
	}
}
echo "OK";