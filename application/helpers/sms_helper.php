<?php
function sms($number,$msg)
{  
$url="http://bulksms.niktechsoftware.com/vendorsms/pushsms.aspx?user=vijayiti&password=vijayiti@123&msisdn=".$number."&sid=VIJAYI&msg=".urlencode($msg)."&fl=0&gwid=2";
	
//$url="http://bulksms.gfinch.in/api/sendmsg.php?user=ramdoot&pass=ghazipur@123&sender=RAMDOT&phone=".$number."&text=".urlencode($msg)."&priority=ndnd&stype=normal";
	//$url = "http://mysms.sms7.biz/rest/services/sendSMS/sendGroupSms?AUTH_KEY=".$authkey."&message=".urlencode($message)."&senderId=".$senderID."&routeId=1&mobileNos=".$number."&smsContentType=english";
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	$output=curl_exec($ch);
	curl_close($ch);
}
function checkBalSms()
{ 
    $url = "http://bulksms.gfinch.in/api/checkbalance.php?user=ramdoot&pass=ghazipur@123";
    
//$url = "http://bulksms.niktechsoftware.com/vendorsms/CheckBalance.aspx?user=ramdoot&password=ghazipur@123";
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$output=curl_exec($ch);
curl_close($ch);
return $output;
}



function getAge($dob) {
	$today = date("Y-m-d");
	$diff = date_diff(date_create($dob), date_create($today));
	return $diff->format('%yYears, %mMonths, %dDays');
}

function highlightText($text, $keywords) {
	$color = "yellow";
	$background = "red";
	foreach($keywords as $keyword) {
		$highlightWord = "<strong style='background:".$background.";color:".$color."'>" . $keyword . "</strong>";
		$text = preg_replace ("/" . trim($keyword) . "/", $highlightWord, $text);
	}
	$keywords = array("Coding 4 Developers","Coding for developers");
	echo highlightText($text, $keywords);
	return $text;
}


