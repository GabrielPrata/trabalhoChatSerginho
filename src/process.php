<?php

if (!isset($_SESSION)) {
	session_start();
}

$function = $_POST['function'];

//Converto o HEX para RGB
$hex = $_SESSION['cor'];
$hex      = str_replace('#', '', $hex);
$length   = strlen($hex);
$rgb['r'] = hexdec($length == 6 ? substr($hex, 0, 2) : ($length == 3 ? str_repeat(substr($hex, 0, 1), 2) : 0));
$rgb['g'] = hexdec($length == 6 ? substr($hex, 2, 2) : ($length == 3 ? str_repeat(substr($hex, 1, 1), 2) : 0));
$rgb['b'] = hexdec($length == 6 ? substr($hex, 4, 2) : ($length == 3 ? str_repeat(substr($hex, 2, 1), 2) : 0));

//Saída em RGB e em RGBA
$rgba = "rgba(" . $rgb['r'] . ", " . $rgb['g'] . ", " . $rgb['b'] . ", 0.1)";
$rgb = "rgb(" . $rgb['r'] . ", " . $rgb['g'] . ", " . $rgb['b'] . ")";

$log = array();

switch ($function) {

	case ('getState'):
		if (file_exists('chat.txt')) {
			$lines = file('chat.txt');
		}
		$log['state'] = count($lines);
		break;

	case ('update'):
		$state = $_POST['state'];
		if (file_exists('chat.txt')) {
			$lines = file('chat.txt');
		}
		$count =  count($lines);
		if ($state == $count) {
			$log['state'] = $state;
			$log['text'] = false;
		} else {
			$text = array();
			$log['state'] = $state + count($lines) - $state;
			foreach ($lines as $line_num => $line) {
				if ($line_num >= $state) {
					$text[] =  $line = str_replace("\n", "", $line);
				}
			}
			$log['text'] = $text;
		}

		break;

	case ('send'):
		$nickname = htmlentities(strip_tags($_POST['nickname']));
		$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
		$message = htmlentities(strip_tags($_POST['message']));
		if (($message) != "\n") {

			if (preg_match($reg_exUrl, $message, $url)) {
				$message = preg_replace($reg_exUrl, '<a href="' . $url[0] . '" target="_blank">' . $url[0] . '</a>', $message);
			}

			fwrite(fopen('chat.txt', 'a'), 
			"<div style='max-width: 500px !important;' class='d-flex flex-row justify-content-start mb-4'><img src='" . $_SESSION['imagemPerfil'] . "' alt='" . $_SESSION['email'] . "' style='width: 45px; height: 100%; border-radius: 25px;'><div class='p-3 ms-3' style='border-radius: 15px; background-color: " . $rgba . ";'><p class='small mb-0'><b style='color: " . $rgb . "'>" .  $nickname . "</b><br>" . $message = str_replace("\n", " ", $message) . "</p></div></div>\n");
			//   fwrite(fopen('chat.txt', 'a'), "<div class='p-3 me-3 border' style='border-radius: 15px; background-color: #fbfbfb;'><p class='small mb-0'><div id='chat-wrap'><b>". $nickname . "</b><br>" . $message = str_replace("\n", " ", $message) . "\n") . "</div></p></div>"; 

		}
		break;
}
echo json_encode($log);
