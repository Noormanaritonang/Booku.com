<?php
	

	$params['api_key'] = '9080d6d4af013b3e663f2512dfc8aac8f20fe5e5873d3c465762a7ff9ee55f40';
	$params['receiver_no'] = '1112199600';

	$params['amount'] = $_POST['totalharga'];
	$params['code'] = uniqid("BOOKU-");
	$json_encode = json_encode($params);
	
	$url = 'https://sigurita.com/sikilat/account/payment?data='.$json_encode;

	$client = curl_init($url);
	curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
	$response = curl_exec($client);
	
	header("location:$url");
?>