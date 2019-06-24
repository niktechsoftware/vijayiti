<?php 

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://sms1.hwebs.in/api/sendmsg.php?user=hwebs&pass=hwebs&sender=AVIRAL&phone=7668538172&text=Hi this is pushpendra Kumar....&priority=ndnd&stype=normal");
curl_exec($ch);
curl_close($ch)
?>


<?php
//for($i=1;$i<=5;$i++):
?>
<!-- <IFRAME SRC="http://sms1.hwebs.in/api/sendmsg.php?user=hwebs&pass=hwebs&sender=AVIRAL&phone=7668538172&text=Hi this is pushpendra Kumar....&priority=ndnd&stype=normal"></iframe>
 -->
<?php //endfor;?> 

  
<?php
$src="<?xml version='1.0' encoding='utf-8'?>
<MESSAGE>
<USERNAME>hwebs</USERNAME>
<PASSWORD>hwebs</PASSWORD>
<TEXT>Hi, this is a test message</TEXT>
<PRIORITY>ndnd</PRIORITY>
<SENDER>TERIPG</SENDER>
<MSGTYPE>normal</MSGTYPE>
<ADDRESS>7668538172</ADDRESS>
</MESSAGE>";
 
?>
<IFRAME SRC="http://sms1.hwebs.in/api/xml.php?xmldata= <?php $src;?>"></iframe>
  