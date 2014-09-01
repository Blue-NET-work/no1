<? session_start();  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<script language="JavaScript">
function right(e) {
   if (navigator.appName == 'Netscape' && (e.which == 3 || e.which == 2))
      return false;
   else if (navigator.appName == 'Microsoft Internet Explorer' && (event.button == 2 || event.button == 3)) {
      alert("Nie używaj prawego przycisku myszy !!");
      return false;
   }
   return true;
}
 
document.onmousedown=right;
if (document.layers) window.captureEvents(Event.MOUSEDOWN);
window.onmousedown=right;
</script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TEST POZIOMUJĄCY OGÓLNY</title>
<style type="text/css">
<!--
body {
	margin-left: 20px;
}
h1,h2,h3,h4,h5,h6 {
	font-family: Georgia, Times New Roman, Times, serif;
}
body,td,th {
	font-family: Georgia, Times New Roman, Times, serif;
}

.styl3 {color: #FF0000; font-weight: bold; }
-->
</style></head>

<body>
<script type="text/javascript">  
 function sprawdz(formularz)  
 {  
       
         if(!formularz.nazwa.value)  
         {  
             alert('Podaj imię i nazwisko.');  
             return false; //nie wysle formularza  
             } 
			 
		if(!formularz.wiek.value)  
         {  
             alert('Podaj wiek.');  
             return false; //nie wysle formularza  
             }  
              
             
 
		
		reg = /^[^*=+]{1,30}@[^*+]+(\.[a-zA-Z0-9ąćęłńóśżźĄĆĘŁŃÓŚŻŹ]+)+$/;
		wyn = formularz.email.value.match(reg);
		if (wyn == null) {
			alert("Proszę podać poprawny adres email. " +
				  "Poprawny adres musi zawierać małpę " +
				  "oraz co najmniej dwa człony nazwy serwera, " +
				  "np. a@b.c lub ala@ma.kota.czarnego.com.");
			return false;
		}				  
								 //alert('Jest ok, wysylamy formularz;)');  
		return true; //wysle  
								  
                   
					 

					 
         }  
 </script>



<? if(!$_GET[next]){ ?>

<div style="border:groove #FF0000 1px; padding:10px">
<h3>Test poziomujący ogólny jest 1 z części oceny poziomu językowego. Aby dokładnie określić  poziom należy przejść kolejne etapy: pracę pisemną i rozmowę z lektorem (prosimy o  kontakt ze szkołą w celu otrzymania tematu wypowiedzi pisemnej i ustalenia terminu rozmowy).</h3>


<h4>Aby przystąpić do testu proszę wypełnić poniższy formularz kontaktowy.</h4>
<h6>Pola z * są obowiązkowe.</h6>

<form method="POST" action="test1.php?next=test" enctype="multipart/form-data"  onsubmit="return sprawdz(this);">
<table border="0" cellspacing="3" cellpadding="3" cols="1" width="350" height="100">

<tr><td><span class="styl1">Imię i nazwisko *</span></td></tr>
<tr><td><input type="text" name="nazwa" style="width:350px" maxlength="100"></td></tr>

<tr><td><span class="styl1">Wiek *</span></td></tr>
<tr><td><input type="text" name="wiek" style="width:350px" maxlength="100"></td></tr>

<tr><td><span class="styl1">Twój email *</span></td></tr>
<tr><td><input type="text" name="email" style="width:350px" maxlength="100"></td></tr>

<tr><td><span class="styl1">Telefon</span></td></tr>
<tr><td><input type="text" name="telefon" style="width:350px" maxlength="200"></td></tr>

<tr><td><span class="styl1">Adres zamieszkania</span></td></tr>
<tr><td><input type="text" name="adres" maxlength="100" style="width:350px"></td></tr>


<tr><td align="right"><input type="reset" value="Wyczyść"><input type="submit" value="Rozpocznij test"></td></tr>
</table>
</div> <? } ?>

<? if($_GET[next]=='koniec2'){ ?>

<div style="border:groove #FF0000 1px; padding:10px">

<? echo "<script type=\"text/javascript\"> window.setTimeout(\"window.close();\",9000);</script>"; ?>


<? 
	//$_SESSION[suma] = 10;
	if($_SESSION[suma]<10){ $poziom = "beginner ( A 1)"; }
	if($_SESSION[suma]>=10 && $_SESSION[suma]<17){ $poziom = "elementary ( A 1+)"; }
	if($_SESSION[suma]>=17 && $_SESSION[suma]<34){ $poziom = "pre-intermediate (A 2)"; }
	if($_SESSION[suma]>=34 && $_SESSION[suma]<51){ $poziom = "intermediate (B 1)"; }
	if($_SESSION[suma]>=51 && $_SESSION[suma]<59){ $poziom = "upper-intermediate (B 2)"; }
	if($_SESSION[suma]>=59 && $_SESSION[suma]<68){ $poziom = "FCE"; }
	if($_SESSION[suma]>=68 && $_SESSION[suma]<86){ $poziom = "CAE"; }
	if($_SESSION[suma]>=86 && $_SESSION[suma]<=100){ $poziom = "CPE"; }
	
	
	
	?>
 
<h2 align="center">Gratulacje!!! <br />Ukończyłeś test z sumą <span class="styl3"><? echo $_SESSION[suma]; ?></span> punktów. Twój poziom to: <? echo $poziom; ?><br /> 
Dziekujemy.</h2>

<? } ?>

<? if($_GET[next]=='koniec'){ ?>

<? 
echo "<script type=\"text/javascript\"> window.setTimeout(\"window.location.replace('test1.php?next=koniec2');\",0);</script>";

$suma=0;
for($i=1; $i<101; $i++){
$suma += $_POST['odp'.$i]; } 
$_SESSION[suma] = $suma; ?>

<? 
	//$_SESSION[suma] = 10;
	if($_SESSION[suma]<10){ $poziom = "beginner ( A 1)"; }
	if($_SESSION[suma]>=10 && $_SESSION[suma]<17){ $poziom = "elementary ( A 1+)"; }
	if($_SESSION[suma]>=17 && $_SESSION[suma]<34){ $poziom = "pre-intermediate (A 2)"; }
	if($_SESSION[suma]>=34 && $_SESSION[suma]<51){ $poziom = "intermediate (B 1)"; }
	if($_SESSION[suma]>=51 && $_SESSION[suma]<59){ $poziom = "upper-intermediate (B 2)"; }
	if($_SESSION[suma]>=59 && $_SESSION[suma]<68){ $poziom = "FCE"; }
	if($_SESSION[suma]>=68 && $_SESSION[suma]<86){ $poziom = "CAE"; }
	if($_SESSION[suma]>=86 && $_SESSION[suma]<=100){ $poziom = "CPE"; }
	
	
	
	?>

<?
	//$email = 'aktywacja@ostrowskieogloszenia.eu';
	//$headers = "From: $email" . "\r\n" . "Reply-To: $email" . "\r\n" . 'X-Mailer: PHP/' . phpversion();
	$razem = "Wynik testu: TEST POZIOMUJĄCY OGÓLNY\r\n\r\n";
	$razem .= "Imię i nazwisko: $_SESSION[nazwa],\r\n";
	$razem .= "Wiek: $_SESSION[wiek] lat,\r\n";
	$razem .= "E-mail: $_SESSION[email],\r\n";
	$razem .= "Telefon: $_SESSION[telefon],\r\n";
	$razem .= "Adres: $_SESSION[adres],\r\n";
	$razem .= "Wynik testu: $suma\r\n";
	$razem .= "Poziom testu: $poziom\r\n\r\n";


	//$razem = iconv("utf-8", "iso-8859-2", $razem);
	//$temat = $_POST['T']['temat'];
	$temat = "=?UTF-8?B?".base64_encode('Wynik testu: TEST POZIOMUJĄCY OGÓLNY')."?=";

/* TECHNICZNE DO MAILA */


/*
 * test_email_message.php
 *
 * @(#) $Header: /home/mlemos/cvsroot/PHPlibrary/mimemessage/test_email_message.php,v 1.6 2003/10/05 17:32:56 mlemos Exp $
 *
 */

	require("email_message.php");

	$from_name='Test No1BS';
	$from_address='testy@najlepszaszkolawursusie.pl';
	$reply_name=$from_name;
	$reply_address=$from_address;
	$reply_address=$from_address;
	$error_delivery_name=$from_name;
	$error_delivery_address=$from_address;
	$to_name='Testy';
	$to_address='no1bestschooltest@gmail.com';
	$subject = $temat;
	$message=$razem;
	$email_message=new email_message_class;
	$email_message->SetEncodedEmailHeader("To",$to_address,$to_name);
	$email_message->SetEncodedEmailHeader("From",$from_address,$from_name);
	$email_message->SetEncodedEmailHeader("Reply-To",$reply_address,$reply_name);
/*
	Set the Return-Path header to define the envelope sender address to which bounced messages are delivered.
	If you are using Windows, you need to use the smtp_message_class to set the return-path address.
*/
	if(defined("PHP_OS")
	&& strcmp(substr(PHP_OS,0,3),"WIN"))
		$email_message->SetHeader("Return-Path",$error_delivery_address);
	$email_message->SetEncodedEmailHeader("Errors-To",$error_delivery_address,$error_delivery_name);
	$email_message->SetEncodedHeader("Subject",$subject);
	$email_message->AddQuotedPrintableTextPart($email_message->WrapText($message));
	$error=$email_message->Send();
	if(strcmp($error,""))
		echo "Error: $error\n";
	                                       
	/* KONIEC TECHNICZNYCH DO MAILA */
?>


<? } ?>





<? if($_GET[next]=='test'){ ?>

<div style="border:groove #FF0000 1px; padding:10px">

<? $_SESSION[nazwa] = $_POST[nazwa];
	$_SESSION[wiek] = $_POST[wiek];
	$_SESSION[email] = $_POST[email];
	$_SESSION[telefon] = $_POST[telefon];
	$_SESSION[adres] = $_POST[adres]; ?>




<form method="post" id="myForm"  action="test1.php?next=koniec">
<table border="0" cellpadding="0" cellspacing="0" width="1000" id="table1">

	<tr>
		<td align="left" valign="top"><FONT face="Georgia, Times New Roman, Times, serif" size=6>TEST POZIOMUJĄCY OGÓLNY</FONT>
<DIV> </DIV>

<DIV> </DIV>

<DIV> </DIV>
<H2><FONT size=4>Proszę uzupełnić poniższe zdania odpowiednim słowem lub zwrotem. W każdym zdaniu możliwa jest tylko
jedna poprawna odpowiedź. Zalecane jest uzupełnienie maksymalnej ilości zdań niezależnie od poziomu
osoby testowanej. <br />Czas na wykonanie testu: 30 minut.<br />Życzymy powodzenia!!!</FONT></H2>
<P> </P>

<DIV>1. Jose is </FONT><SELECT size=1 name="odp1"><OPTION value="" selected></OPTION><OPTION value="1">from</OPTION><OPTION value="">to</OPTION><OPTION value="">at</OPTION><OPTION value="">with</OPTION></SELECT>Argentina.</FONT></DIV>
<br />
<DIV>2. </FONT><SELECT size=1 name="odp2"><OPTION value="" selected></OPTION><OPTION value="">Who</OPTION><OPTION value="">How</OPTION><OPTION value="1">What</OPTION><OPTION value="">These</OPTION></SELECT>  is your favourite music?</FONT></DIV>
<br />

<DIV>3.</FONT><SELECT size=1 name="odp3"><OPTION value="" selected></OPTION><OPTION value="">is</OPTION><OPTION value="">What</OPTION><OPTION value="1">Does</OPTION><OPTION value="">Do</OPTION></SELECT> Susan like spaghetti?</FONT></DIV>
<br />
<DIV>4. How old  </FONT><SELECT size=1 name="odp4"><OPTION value="" selected></OPTION><OPTION value="">does</OPTION><OPTION value="1">is</OPTION><OPTION value="">do</OPTION><OPTION value="">are</OPTION></SELECT> your brother?</FONT></DIV>

<br />
<DIV>5. His </FONT><SELECT size=1 name="odp5"><OPTION value="" selected></OPTION><OPTION value="1">dad's</OPTION><OPTION value="">dad</OPTION><OPTION value="">dads</OPTION><OPTION value="">dad is</OPTION></SELECT>  name is Sam.</FONT></DIV>
<br />
<DIV>6. Lucy doesn't like </FONT><SELECT size=1 name="odp6"><OPTION value="" selected></OPTION><OPTION value="">swim</OPTION><OPTION value="1">swimming</OPTION><OPTION value="">swims</OPTION><OPTION value="">at swimming</OPTION></SELECT>.</FONT></DIV>

<br />
<DIV>7. </FONT><SELECT size=1 name="odp7"><OPTION value="" selected></OPTION><OPTION value="">No</OPTION><OPTION value="">Not</OPTION><OPTION value="">Doesn't</OPTION><OPTION value="1">Don't</OPTION></SELECT>  go to that restaurant. It's very expensive.</FONT></DIV>
<br />
<DIV>8. Does Tomy work in a bank? No, he </FONT><SELECT size=1 name="odp8"><OPTION value="" selected></OPTION><OPTION value="">isn't</OPTION><OPTION value="">not</OPTION><OPTION value="1">doesn't</OPTION><OPTION value="">don't</OPTION></SELECT> .</FONT></DIV>

<br />
<DIV>9. Sarah </FONT><SELECT size=1 name="odp9"><OPTION value="" selected></OPTION><OPTION value="">have</OPTION><OPTION value="">have got</OPTION><OPTION value="">is</OPTION><OPTION value="1">has</OPTION></SELECT> two children.</FONT></DIV>
<br />
<DIV>10. Where </FONT><SELECT size=1 name="odp10"><OPTION value="" selected></OPTION><OPTION value="">do</OPTION><OPTION value="">is</OPTION><OPTION value="1">does</OPTION><OPTION value="">has</OPTION></SELECT> Mike live?</FONT></DIV>

<br />
<DIV>11. Maggie can </FONT><SELECT size=1 name="odp11"><OPTION value="" selected></OPTION><OPTION value="1">speak</OPTION><OPTION value="">to speak</OPTION><OPTION value="">speaking</OPTION><OPTION value="">in speaking</OPTION></SELECT>Chinese.</FONT></DIV>
<br />
<DIV>12. </FONT><SELECT size=1 name="odp12"><OPTION value="" selected></OPTION><OPTION value="">What</OPTION><OPTION value="1">How</OPTION><OPTION value="">When</OPTION><OPTION value="">Who</OPTION></SELECT> often do you go to the cinema?</FONT></DIV>

<br />
<DIV>13. Are </FONT><SELECT size=1 name="odp13"><OPTION value="" selected></OPTION><OPTION value="">those</OPTION><OPTION value="">these</OPTION><OPTION value="1">there</OPTION><OPTION value="">here</OPTION></SELECT>  any plates on the table?</FONT></DIV>
<br />
<DIV>14. What colour </FONT><SELECT size=1 name="odp14"><OPTION value="" selected></OPTION><OPTION value="1">is</OPTION><OPTION value="">are</OPTION><OPTION value="">has</OPTION><OPTION value="">have</OPTION></SELECT>  her hair?</FONT></DIV>

<br />
<DIV>15. There are </FONT><SELECT size=1 name="odp15"><OPTION value="" selected></OPTION><OPTION value="">any</OPTION><OPTION value="1">many</OPTION><OPTION value="">much</OPTION><OPTION value="">a</OPTION></SELECT>  pictures in that gallery.</FONT></DIV>
<br />
<DIV>16. There is a pub</FONT><SELECT size=1 name="odp16"><OPTION value="" selected></OPTION><OPTION value="">front</OPTION><OPTION value="">in front</OPTION><OPTION value="">at front</OPTION><OPTION value="1">in front of</OPTION></SELECT> the post office.</FONT></DIV>

<br />
<DIV>17. We went to the theatre </FONT><SELECT size=1 name="odp17"><OPTION value="" selected></OPTION><OPTION value="1">-</OPTION><OPTION value="">in</OPTION><OPTION value="">on</OPTION><OPTION value="">at</OPTION></SELECT>  last Saturday.</FONT></DIV>
<br />
<DIV>18. The film starts </FONT><SELECT size=1 name="odp18"><OPTION value="" selected></OPTION><OPTION value="">about</OPTION><OPTION value="1">at</OPTION><OPTION value="">in</OPTION><OPTION value="">on</OPTION></SELECT>  six.</FONT></DIV>

<br />
<DIV>19. Is Paris </FONT><SELECT size=1 name="odp19"><OPTION value="" selected></OPTION><OPTION value="">big</OPTION><OPTION value="">the biggest</OPTION><OPTION value="1">bigger</OPTION><OPTION value="">biggest</OPTION></SELECT>  than London?</FONT></DIV>
<br />
<DIV>20. I </FONT><SELECT size=1 name="odp20"><OPTION value="" selected></OPTION><OPTION value="">have</OPTION><OPTION value="1">have to</OPTION><OPTION value="">need</OPTION><OPTION value="">have got</OPTION></SELECT>  wash the dishes every day.</FONT></DIV>

<br />
<DIV>21. This is </FONT><SELECT size=1 name="odp21"><OPTION value="" selected></OPTION><OPTION value="1">the most expensive</OPTION><OPTION value="">more expensive</OPTION><OPTION value="">rather expensive</OPTION><OPTION value="">expensive</OPTION></SELECT>  restaurant in town.</FONT></DIV>
<br />
<DIV>22. We </FONT><SELECT size=1 name="odp22"><OPTION value="" selected></OPTION><OPTION value="">going to</OPTION><OPTION value="1">are going to</OPTION><OPTION value="">going in</OPTION><OPTION value="">are going in</OPTION></SELECT>  Manchester next week.</FONT></DIV>

<br />
<DIV>23. Whose is this book? It's </FONT><SELECT size=1 name="odp23"><OPTION value="" selected></OPTION><OPTION value="">me</OPTION><OPTION value="">my</OPTION><OPTION value="1">mine</OPTION><OPTION value="">I</OPTION></SELECT> . </FONT></DIV>
<br />
<DIV>24. Emma is worried  </FONT><SELECT size=1 name="odp24"><OPTION value="" selected></OPTION><OPTION value="">with</OPTION><OPTION value="">on</OPTION><OPTION value="">for</OPTION><OPTION value="1">about</OPTION></SELECT> the exam.</FONT></DIV>

<br />
<DIV>25.</FONT><SELECT size=1 name="odp25"><OPTION value="" selected></OPTION><OPTION value="">Whose</OPTION><OPTION value="">Who</OPTION><OPTION value="">Which</OPTION><OPTION value="1">When</OPTION></SELECT> did you finish reading?</FONT></DIV>
<br />
<DIV>26. She </FONT><SELECT size=1 name="odp26"><OPTION value="" selected></OPTION><OPTION value="1">said</OPTION><OPTION value="">told</OPTION><OPTION value="">spoke</OPTION><OPTION value="">telling</OPTION></SELECT>  I was wrong.</FONT></DIV>

<br />
<DIV>27. Peter hasn't finished  </FONT><SELECT size=1 name="odp27"><OPTION value="" selected></OPTION><OPTION value="">already</OPTION><OPTION value="">still</OPTION><OPTION value="">always</OPTION><OPTION value="1">yet</OPTION></SELECT> .</FONT></DIV>
<br />
<DIV>28. I saw an accident when I  </FONT><SELECT size=1 name="odp28"><OPTION value="" selected></OPTION><OPTION value="">walking</OPTION><OPTION value="">have been walking</OPTION><OPTION value="1">was walking</OPTION><OPTION value="">was walked</OPTION></SELECT>  down the street.</FONT></DIV>

<br />
<DIV>29. </FONT><SELECT size=1 name="odp29"><OPTION value="" selected></OPTION><OPTION value="">Did you ever</OPTION><OPTION value="1">Have you ever</OPTION><OPTION value="">Do you ever</OPTION><OPTION value="">Are you ever</OPTION></SELECT>  stayed in a hospital?</FONT></DIV>
<br />
<DIV>30. What food   </FONT><SELECT size=1 name="odp30"><OPTION value="" selected></OPTION><OPTION value="">eats</OPTION><OPTION value="">is eating</OPTION><OPTION value="">ate</OPTION><OPTION value="1">is eaten</OPTION></SELECT>  on Christmas Day in England?</FONT></DIV>

<br />
<DIV>31. How </FONT><SELECT size=1 name="odp31"><OPTION value="" selected></OPTION><OPTION value="1">much</OPTION><OPTION value="">many</OPTION><OPTION value="">some</OPTION><OPTION value="">any</OPTION></SELECT>  pocket money does Steve get a week?</FONT></DIV>
<br />
<DIV>32. They </FONT><SELECT size=1 name="odp32"><OPTION value="" selected></OPTION><OPTION value="">have</OPTION><OPTION value="1">-</OPTION><OPTION value="">did</OPTION><OPTION value="">have been</OPTION></SELECT>  visited London in 1999.</FONT></DIV>

<br />
<DIV>33. We've celebrated Independence Day </FONT><SELECT size=1 name="odp33"><OPTION value="" selected></OPTION><OPTION value="">from</OPTION><OPTION value="">since</OPTION><OPTION value="">in</OPTION><OPTION value="1">for</OPTION></SELECT> 15 years.</FONT></DIV>
<br />
<DIV>34. At the end of the course, I </FONT><SELECT size=1 name="odp34"><OPTION value="" selected></OPTION><OPTION value="">am going</OPTION><OPTION value="">will be able</OPTION><OPTION value="">will be</OPTION><OPTION value="1">will</OPTION></SELECT>  speak English fluently.</FONT></DIV>

<br />
<DIV>35. I've got some phone calls to </FONT><SELECT size=1 name="odp35"><OPTION value="" selected></OPTION><OPTION value="">do</OPTION><OPTION value="">have</OPTION><OPTION value="1">make</OPTION><OPTION value="">get</OPTION></SELECT> . </FONT></DIV>
<br />
<DIV>36. Liz is </FONT><SELECT size=1 name="odp36"><OPTION value="" selected></OPTION><OPTION value="">interesting</OPTION><OPTION value="1">interested</OPTION><OPTION value="">interest</OPTION><OPTION value="">interestingly</OPTION></SELECT> in photography.</FONT></DIV>

<br />
<DIV>37. In Brighton there is  </FONT><SELECT size=1 name="odp37"><OPTION value="" selected></OPTION><OPTION value="">much</OPTION><OPTION value="1">less</OPTION><OPTION value="">fewer</OPTION><OPTION value="">not enough</OPTION></SELECT>  pollution than in Manchester.</FONT></DIV>
<br />
<DIV>38. We usually have lunch at 1 o'clock, </FONT><SELECT size=1 name="odp38"><OPTION value="" selected></OPTION><OPTION value="">so</OPTION><OPTION value="">because</OPTION><OPTION value="1">however</OPTION><OPTION value="">then</OPTION></SELECT> some people have lunch later.</FONT></DIV>

<br />
<DIV>39. Could you tell me </FONT><SELECT size=1 name="odp39"><OPTION value="" selected></OPTION><OPTION value="">the station</OPTION><OPTION value="">where a station is</OPTION><OPTION value="1">where the station is</OPTION><OPTION value="">where is the station</OPTION></SELECT> ?</FONT></DIV>
<br />
<DIV>40. Will you go to that concert if it </FONT><SELECT size=1 name="odp40"><OPTION value="" selected></OPTION><OPTION value="">will rain</OPTION><OPTION value="">rain</OPTION><OPTION value="1">rains</OPTION><OPTION value="">rained</OPTION></SELECT> ?</FONT></DIV>

<br />
<DIV>41. Some people go to shops </FONT><SELECT size=1 name="odp41"><OPTION value="" selected></OPTION><OPTION value="">which</OPTION><OPTION value="">what</OPTION><OPTION value="1">where</OPTION><OPTION value="">that</OPTION></SELECT>  the prices are really high.</FONT></DIV>
<br />
<DIV>42. What would you do if you </FONT><SELECT size=1 name="odp42"><OPTION value="" selected></OPTION><OPTION value="">win</OPTION><OPTION value="1">won</OPTION><OPTION value="">have won</OPTION><OPTION value="">have been winning</OPTION></SELECT>  one million dollars?</FONT></DIV>

<br />
<DIV>43. The cinema is  </FONT><SELECT size=1 name="odp43"><OPTION value="" selected></OPTION><OPTION value="">oppose</OPTION><OPTION value="">nearly</OPTION><OPTION value="1">between</OPTION><OPTION value="">close</OPTION></SELECT>   the restaurant and the newsagent's.</FONT></DIV>
<br />
<DIV>44. You didn't learn Russian at school, </FONT><SELECT size=1 name="odp44"><OPTION value="" selected></OPTION><OPTION value="">didn't you</OPTION><OPTION value="">no</OPTION><OPTION value="">don't you</OPTION><OPTION value="1">did you</OPTION></SELECT>  ?</FONT></DIV>

<br />
<DIV>45. We've never  </FONT><SELECT size=1 name="odp45"><OPTION value="" selected></OPTION><OPTION value="1">been</OPTION><OPTION value="">went</OPTION><OPTION value="">lived</OPTION><OPTION value="">visited</OPTION></SELECT>  to Australia.</FONT></DIV>
<br />
<DIV>46. That coffee tastes  </FONT><SELECT size=1 name="odp46"><OPTION value="" selected></OPTION><OPTION value="">awfully</OPTION><OPTION value="">badly</OPTION><OPTION value="1">awful</OPTION><OPTION value="">terribly</OPTION></SELECT> . </FONT></DIV>

<br />
<DIV>47. When she was younger, she </FONT><SELECT size=1 name="odp47"><OPTION value="" selected></OPTION><OPTION value="">would</OPTION><OPTION value="1">used to</OPTION><OPTION value="">was used to</OPTION><OPTION value="">used</OPTION></SELECT> have more friends than anyone else.</FONT></DIV>
<br />
<DIV>48. Doing  regular exercises will  </FONT><SELECT size=1 name="odp48"><OPTION value="" selected></OPTION><OPTION value="1">keep</OPTION><OPTION value="">become</OPTION><OPTION value="">get</OPTION><OPTION value="">stay</OPTION></SELECT> you  fit.</FONT></DIV>

<br />
<DIV>49. The police arrested the man who </FONT><SELECT size=1 name="odp49"><OPTION value="" selected></OPTION><OPTION value="">robs</OPTION><OPTION value="1">had robbed</OPTION><OPTION value="">has robbed</OPTION><OPTION value="">had been robbing</OPTION></SELECT>  a bank.</FONT></DIV>
<br />
<DIV>50. People say I read  </FONT><SELECT size=1 name="odp50"><OPTION value="" selected></OPTION><OPTION value="">quick</OPTION><OPTION value="">slow</OPTION><OPTION value="1">fast</OPTION><OPTION value="">pacey</OPTION></SELECT>.</FONT></DIV>

<br />
<DIV>51. Before I went to school, I </FONT><SELECT size=1 name="odp51"><OPTION value="" selected></OPTION><OPTION value="">can't</OPTION><OPTION value="">can't have</OPTION><OPTION value="1">couldn't</OPTION><OPTION value="">couldn't have</OPTION></SELECT>  paint very well.</FONT></DIV>
<br />
<DIV>52. I'm so tired. I </FONT><SELECT size=1 name="odp52"><OPTION value="" selected></OPTION><OPTION value="1">have been jogging</OPTION><OPTION value="">jogged</OPTION><OPTION value="">am jogging</OPTION><OPTION value="">had been jogging</OPTION></SELECT>  in the forest all morning.</FONT></DIV>

<br />
<DIV>53. It  <SELECT size=1 name="odp53"><OPTION value="" selected></OPTION><OPTION value="">got</OPTION><OPTION value="1">took</OPTION><OPTION value="">made</OPTION><OPTION value="">had</OPTION></SELECT> me an hour to get to work  today.</FONT></DIV>
<br />
<DIV>54. Look at those people! I think we <SELECT size=1 name="odp54"><OPTION value="" selected></OPTION><OPTION value="">are watching</OPTION><OPTION value="">are watched</OPTION><OPTION value="">watched</OPTION><OPTION value="1">are being watched</OPTION></SELECT>.</FONT></DIV>

<br />
<DIV>55. I think we will <SELECT size=1 name="odp55"><OPTION value="" selected></OPTION><OPTION value="">do</OPTION><OPTION value="1">have</OPTION><OPTION value="">got</OPTION><OPTION value="">must</OPTION></SELECT> the car serviced this week.</FONT></DIV>
<br />
<DIV>56. They <SELECT size=1 name="odp56"><OPTION value="" selected></OPTION><OPTION value="1">can't have</OPTION><OPTION value="">couldn't</OPTION><OPTION value="">can't</OPTION><OPTION value="">can't have been</OPTION></SELECT>  forgotten  about our wedding.</FONT></DIV>

<br />
<DIV>57. My girlfriend is a fantastic dancer. I wish I <SELECT size=1 name="odp57"><OPTION value="" selected></OPTION><OPTION value="">haven't given up</OPTION><OPTION value="1">hadn't given up</OPTION><OPTION value="">didn't give up</OPTION><OPTION value="">don't give up</OPTION></SELECT>  my dancing lessons.</FONT></DIV>
<br />
<DIV>58. We get <SELECT size=1 name="odp58"><OPTION value="" selected></OPTION><OPTION value="">off</OPTION><OPTION value="">up</OPTION><OPTION value="">down</OPTION><OPTION value="1">on</OPTION></SELECT>  well with our new teacher.</FONT></DIV>

<br />
<DIV>59. Before we start, we should introduce   <SELECT size=1 name="odp59"><OPTION value="" selected></OPTION><OPTION value="">us</OPTION><OPTION value="1">ourselves</OPTION><OPTION value="">myself</OPTION><OPTION value="">yourselves</OPTION></SELECT> to   the audience.</FONT></DIV>
<br />
<DIV>60. The beach, <SELECT size=1 name="odp60"><OPTION value="" selected></OPTION><OPTION value="">that is</OPTION><OPTION value="">what is</OPTION><OPTION value="1">which is</OPTION><OPTION value="">is</OPTION></SELECT>  situated close to the town, is used by surfers.</FONT></DIV>

<br />
<DIV>61. Her family was very <SELECT size=1 name="odp61"><OPTION value="" selected></OPTION><OPTION value="">well-done</OPTION><OPTION value="">well-born</OPTION><OPTION value="">well-earned</OPTION><OPTION value="1">well-off</OPTION></SELECT> .</FONT></DIV>
<br />
<DIV>62. I saw Jane <SELECT size=1 name="odp62"><OPTION value="" selected></OPTION><OPTION value="1">enter</OPTION><OPTION value="">entered</OPTION><OPTION value="">being entered</OPTION><OPTION value="">entering</OPTION></SELECT>  the supermarket.</FONT></DIV>

<br />
<DIV>63. Jim said he <SELECT size= name="odp63"><OPTION value="" selected></OPTION><OPTION value="">will have finished</OPTION><OPTION value="">will finish</OPTION><OPTION value="">finished</OPTION><OPTION value="1">had finished</OPTION></SELECT> the project two days before.</FONT></DIV>
<br />
<DIV>64. Carl has been <SELECT size=1 name="odp64"><OPTION value="" selected></OPTION><OPTION value="1">dishonest</OPTION><OPTION value="">disloyal</OPTION><OPTION value="">disclosed</OPTION><OPTION value="">disconnected</OPTION></SELECT> about his past.</FONT></DIV>

<br />
<DIV>65. He looks terrified! He <SELECT size=1 name="odp65"><OPTION value="" selected></OPTION><OPTION value="">had to see</OPTION><OPTION value="">had seen</OPTION><OPTION value="1">must have seen</OPTION><OPTION value="">must see</OPTION></SELECT>  a ghost or something.</FONT></DIV>
<br />
<DIV>66. <SELECT size=1 name="odp66"><OPTION value="" selected></OPTION><OPTION value="">How</OPTION><OPTION value="1">Who</OPTION><OPTION value="">Whom</OPTION><OPTION value="">Whose</OPTION></SELECT> does he look like?</FONT></DIV>

<br />
<DIV>67. Could you <SELECT size=1 name="odp67"><OPTION value="" selected></OPTION><OPTION value="1">do</OPTION><OPTION value="">make</OPTION><OPTION value="">have</OPTION><OPTION value="">give</OPTION></SELECT>  me a favour, please?</FONT></DIV>
<br />
<DIV>68. The police officer <SELECT size=1 name="odp68"><OPTION value="" selected></OPTION><OPTION value="">spoke</OPTION><OPTION value="">said</OPTION><OPTION value="1">told</OPTION><OPTION value="">announced</OPTION></SELECT> me to move along.</FONT></DIV>

<br />
<DIV>69. She did <SELECT size=1 name="odp69"><OPTION value="" selected></OPTION><OPTION value="">bad</OPTION><OPTION value="1">badly</OPTION><OPTION value="">wrong</OPTION><OPTION value="">wrongly</OPTION></SELECT>  in the test.</FONT></DIV>
<br />
<DIV>70. I'm going into the centre. Catch <SELECT size=1 name="odp70"><OPTION value="" selected></OPTION><OPTION value="">off</OPTION><OPTION value="">up</OPTION><OPTION value="1">up with</OPTION><OPTION value="">on</OPTION></SELECT> me there.</FONT></DIV>

<br />
<DIV>71. The club was so small that they  <SELECT size=1 name="odp71"><OPTION value="" selected></OPTION><OPTION value="">denied</OPTION><OPTION value="">gave up</OPTION><OPTION value="1">refused</OPTION><OPTION value="">stopped</OPTION></SELECT> to let any more people in.</FONT></DIV>
<br />
<DIV>72. This was the basis on <SELECT size=1 name="odp72"><OPTION value="" selected></OPTION><OPTION value="">that</OPTION><OPTION value="">what</OPTION><OPTION value="1">which</OPTION><OPTION value="">whom</OPTION></SELECT>  the movement was formed.</FONT></DIV>

<br />
<DIV>73. You should take an umbrella <SELECT size=1 name="odp73"><OPTION value="" selected></OPTION><OPTION value="1">in case</OPTION><OPTION value="">otherwise</OPTION><OPTION value="">instead</OPTION><OPTION value="">so that</OPTION></SELECT>  it rains.</FONT></DIV>
<br />
<DIV>74. This painting is believed <SELECT size=1 name="odp74"><OPTION value="" selected></OPTION><OPTION value="">that it is</OPTION><OPTION value="">-</OPTION><OPTION value="">being</OPTION><OPTION value="1">to have been</OPTION></SELECT>  painted by Leonardo Da Vinci.</FONT></DIV>

<br />
<DIV>75. Tom would rather you <SELECT size=1 name="odp75"><OPTION value="" selected></OPTION><OPTION value="">do</OPTION><OPTION value="1">did</OPTION><OPTION value="">have done</OPTION><OPTION value="">doing</OPTION></SELECT>  it.</FONT></DIV>
<br />
<DIV>76. British policemen don't carry guns  <SELECT size=1 name="odp76"><OPTION value="" selected></OPTION><OPTION value="">in</OPTION><OPTION value="">at</OPTION><OPTION value="">by</OPTION><OPTION value="1">on</OPTION></SELECT> duty.</FONT></DIV>

<br />
<DIV>77. If you <SELECT size=1 name="odp77"><OPTION value="" selected></OPTION><OPTION value="">had told</OPTION><OPTION value="1">hadn't told</OPTION><OPTION value="">told</OPTION><OPTION value="">didn't tell</OPTION></SELECT>  me, I would never have known.</FONT></DIV>
<br />
<DIV>78. I suggested that Robbie <SELECT size=1 name="odp78"><OPTION value="" selected></OPTION><OPTION value="">tries</OPTION><OPTION value="1">try</OPTION><OPTION value="">tried</OPTION><OPTION value="">had tried</OPTION></SELECT>  again.</FONT></DIV>

<br />
<DIV>79. Jack decided to <SELECT size=1 name="odp79"><OPTION value="" selected></OPTION><OPTION value="">take up</OPTION><OPTION value="1">go in</OPTION><OPTION value="">set off</OPTION><OPTION value="">get by</OPTION></SELECT> for the competition because he knew he was going to win.</FONT></DIV>
<br />
<DIV>80. What's <SELECT size=1 name="odp80"><OPTION value="" selected></OPTION><OPTION value="">on</OPTION><OPTION value="">at</OPTION><OPTION value="1">on at</OPTION><OPTION value="">in</OPTION></SELECT> the cinema?</FONT></DIV>

<br />
<DIV>81. I picked up the wrong suitcase <SELECT size=1 name="odp81"><OPTION value="" selected></OPTION><OPTION value="1">by</OPTION><OPTION value="">through</OPTION><OPTION value="">as a</OPTION><OPTION value="">because of a</OPTION></SELECT> mistake.</FONT></DIV>
<br />
<DIV>82. We walked quietly <SELECT size=1 name="odp82"><OPTION value="" selected></OPTION><OPTION value="">on</OPTION><OPTION value="1">for</OPTION><OPTION value="">from</OPTION><OPTION value="">in</OPTION></SELECT> fear of being discovered.</FONT></DIV>

<br />
<DIV>83. One <SELECT size=1 name="odp83"><OPTION value="" selected></OPTION><OPTION value="">from</OPTION><OPTION value="">out</OPTION><OPTION value="">with</OPTION><OPTION value="1">in</OPTION></SELECT> three children doesn't read books at all.</FONT></DIV>
<br />
<DIV>84. She was given the award in  <SELECT size=1 name="odp84"><OPTION value="" selected></OPTION><OPTION value="">charge</OPTION><OPTION value="1">recognition</OPTION><OPTION value="">spite</OPTION><OPTION value="">light</OPTION></SELECT> of  her academic achievements.</FONT></DIV>

<br />
<DIV>85. The miners are out  <SELECT size=1 name="odp85"><OPTION value="" selected></OPTION><OPTION value="1">on</OPTION><OPTION value="">at</OPTION><OPTION value="">in</OPTION><OPTION value="">to</OPTION></SELECT>  strike  again.</FONT></DIV>
<br />
<DIV>86. Water was <SELECT size=1 name="odp86"><OPTION value="" selected></OPTION><OPTION value="">flitering</OPTION><OPTION value="">spilling</OPTION><OPTION value="">gushing</OPTION><OPTION value="1">leaking</OPTION></SELECT>  slowly from the pipe.</FONT></DIV>

<br />
<DIV>87. I'd prefer beer  <SELECT size=1 name="odp87"><OPTION value="" selected></OPTION><OPTION value="1">to</OPTION><OPTION value="">than</OPTION><OPTION value="">from</OPTION><OPTION value="">not</OPTION></SELECT>  wine.</FONT></DIV>
<br />
<DIV>88. I was <SELECT size=1 name="odp88"><OPTION value="" selected></OPTION><OPTION value="">made</OPTION><OPTION value="1">made to</OPTION><OPTION value="">got</OPTION><OPTION value="">got to</OPTION></SELECT>  work late hours.</FONT></DIV>

<br />
<DIV>89. The new employee was <SELECT size=1 name="odp89"><OPTION value="" selected></OPTION><OPTION value="1">considered</OPTION><OPTION value="">decided</OPTION><OPTION value="">established</OPTION><OPTION value="">believed</OPTION></SELECT>  a failure.</FONT></DIV>
<br />
<DIV>90. Thanks for your help. I wouldn't have finished it <SELECT size=1 name="odp90"><OPTION value="" selected></OPTION><OPTION value="">therefore</OPTION><OPTION value="">nevertheless</OPTION><OPTION value="">hence</OPTION><OPTION value="1">otherwise</OPTION></SELECT>.</FONT></DIV>

<br />
<DIV>91. <SELECT size=1 name="odp91"><OPTION value="" selected></OPTION><OPTION value="">Due to</OPTION><OPTION value="1">But for</OPTION><OPTION value="">Thanks to</OPTION><OPTION value="">Along with</OPTION></SELECT>  your help, we would have been in trouble.</FONT></DIV>
<br />
<DIV>92. <SELECT size=1 name="odp92"><OPTION value="" selected></OPTION><OPTION value="1">Suppose</OPTION><OPTION value="">Think</OPTION><OPTION value="">Suggest</OPTION><OPTION value="">Relate</OPTION></SELECT> we went to Italy instead.</FONT></DIV>

<br />
<DIV>93. You  <SELECT size=1 name="odp93"><OPTION value="" selected></OPTION><OPTION value="">should</OPTION><OPTION value="">would</OPTION><OPTION value="">could</OPTION><OPTION value="1">had</OPTION></SELECT>  better finish it by tomorrow.</FONT></DIV>
<br />
<DIV>94. <SELECT size=1 name="odp94"><OPTION value="" selected></OPTION><OPTION value="">Only</OPTION><OPTION value="">No sooner</OPTION><OPTION value="1">Hardly</OPTION><OPTION value="">Quickly</OPTION></SELECT> had a moment passed before we heard the explosion.</FONT></DIV>

<br />
<DIV>95. They can't even paly, <SELECT size=1 name="odp95"><OPTION value="" selected></OPTION><OPTION value="">less likely</OPTION><OPTION value="">not to mention</OPTION><OPTION value="1">let alone</OPTION><OPTION value="">needless to say</OPTION></SELECT> write their own songs.</FONT></DIV>
<br />
<DIV>96. I don't think Harry has spent more than a month in Spain. <SELECT size=1 name="odp96"><OPTION value="" selected></OPTION><OPTION value="">Although</OPTION><OPTION value="">Much as</OPTION><OPTION value="">Even though</OPTION><OPTION value="1">Even so</OPTION></SELECT>  he has acquired some basics of the language.</FONT></DIV>

<br />
<DIV>97. I'll meet you <SELECT size=1 name="odp97"><OPTION value="" selected></OPTION><OPTION value="1">on</OPTION><OPTION value="">at</OPTION><OPTION value="">in</OPTION><OPTION value="">through</OPTION></SELECT>  arrival.</FONT></DIV>
<br />
<DIV>98. After the incident with the press, the actor <SELECT size=1 name="odp98"><OPTION value="" selected></OPTION><OPTION value="">fell through</OPTION><OPTION value="1">fell into</OPTION><OPTION value="">dipped in</OPTION><OPTION value="">dipped into</OPTION></SELECT>  disrepute.</FONT></DIV>

<br />
<DIV>99. Although there is a dress code, it isn't <SELECT size=1 name="odp99"><OPTION value="" selected></OPTION><OPTION value="">remarked</OPTION><OPTION value="">conducted</OPTION><OPTION value="1">observed</OPTION><OPTION value="">attended</OPTION></SELECT>  by many students these days.</FONT></DIV>
<br />
<DIV>100. Some of the delegates made an extremely useful  <SELECT size=1 name="odp100"><OPTION value="" selected></OPTION><OPTION value="1">contribiution</OPTION><OPTION value="">suggestion</OPTION><OPTION value="">insertion</OPTION><OPTION value="">opinion</OPTION></SELECT>  to the discussion.</FONT></DIV>

<br />
<DIV> </DIV>
<br />

<DIV><FONT color=#ff0000 size=5></FONT> </DIV>

<br /></td>
	</tr>
	<tr>
	  <td valign="top" align="center">
<br />
<input class="input" type="submit" value="Zakończ test i poznaj wynik" style="width:100%"  onclick="formSubmit()">
	</td>

	</tr>
</table>
</form>

<script type="text/javascript">
function formSubmit()
{
setTimeout('document.getElementById("myForm").submit();', 1800000);
}
window.onload=formSubmit;
</script>


<? } ?>


</body>
</html>
