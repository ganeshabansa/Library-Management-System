<iframe width="956" height="538" src="https://www.youtube.com/embed/l7JS7Wwysqs" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><iframe width="956" height="538" src="https://www.youtube.com/embed/l7JS7Wwysqs" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <iframe width="956" height="538" src="https://www.youtube.com/embed/l7JS7Wwysqs" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>


    POST 

    <?php
	// Account details
	$apiKey = urlencode('Your apiKey');
	
	// Message details
	$numbers = array(918123456789, 918987654321);
	$sender = urlencode('TXTLCL');
	$message = rawurlencode('This is your message');
 
	$numbers = implode(',', $numbers);
 
	// Prepare data for POST request
	$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 
	// Send the POST request with cURL
	$ch = curl_init('https://api.textlocal.in/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
	// Process your response here
	echo $response;
?>

GET 
<?php
	// Account details
	$apiKey = urlencode('Your apiKey');
	
	// Message details
	$numbers = urlencode('918123456789,918987654321');
	$sender = urlencode('TXTLCL');
	$message = rawurlencode('This is your message');
 
	// Prepare data for POST request
	$data = 'apikey=' . $apiKey . '&numbers=' . $numbers . "&sender=" . $sender . "&message=" . $message;
 
	// Send the GET request with cURL
	$ch = curl_init('https://api.textlocal.in/send/?' . $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
	// Process your response here
	echo $response;
?>

CLASS
<?php
	require('Textlocal.class.php');
 
	$Textlocal = new Textlocal(false, false, 'your apiKey');
 
	$numbers = array(918123456789);
	$sender = 'TXTLCL';
	$message = 'This is your message';
 
	$response = $Textlocal->sendSms($numbers, $message, $sender);
	print_r($response);
?>