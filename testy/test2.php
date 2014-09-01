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
<title>TEST POZIOMUJĄCY DZIECI/JUNIOR</title>
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
<h4>Aby przystąpić do testu proszę wypełnić poniższy formularz kontaktowy.</h4>
<h6>Pola z * są obowiązkowe.</h6>

<form method="POST" action="test2.php?next=test" enctype="multipart/form-data"  onsubmit="return sprawdz(this);">
<table border="0" cellspacing="0" cellpadding="0" cols="1" width="350" height="100">

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
	if($_SESSION[suma]<9){ $poziom = "STARTER (0)"; }
	if($_SESSION[suma]>=9 && $_SESSION[suma]<17){ $poziom = "PRE (-A1) "; }
	if($_SESSION[suma]>=17 && $_SESSION[suma]<26){ $poziom = "BEGINNER (A1) początkujący"; }
	if($_SESSION[suma]>=26 && $_SESSION[suma]<37){ $poziom = "BEGINNER/ELEMENTARY (A1+) początkujący +"; }
	if($_SESSION[suma]>=37 && $_SESSION[suma]<48){ $poziom = "PRE-INTERMEDIATE (A2) niższy średnio-zaawansowany"; }
	if($_SESSION[suma]>=48 && $_SESSION[suma]<57){ $poziom = "PRE-INTERMEDIATE/INTERMEDIATE (A2+) niższy średnio-zaawansowany +/ średnio-zaawansowany"; }
	if($_SESSION[suma]>=57 && $_SESSION[suma]<77){ $poziom = "INTERMEDIATE (B1) średnio-zaawansowany"; }
	
	
	
	?>
 
<h2 align="center">Gratulacje!!! <br />Ukończyłeś test z sumą <span class="styl3"><? echo $_SESSION[suma]; ?></span> punktów. Twój poziom to: <? echo $poziom; ?><br /> 
Dziekujemy.</h2>

<? } ?>

<? if($_GET[next]=='koniec'){ ?>

<? 
echo "<script type=\"text/javascript\"> window.setTimeout(\"window.location.replace('test2.php?next=koniec2');\",0);</script>";

$suma=0;
for($i=1; $i<78; $i++){
if($_POST['odp'.$i]==1){ $suma += $_POST['odp'.$i]; }}


if($_POST['odp42']=='guitar'){ $suma++; }
if($_POST['odp43']=='piano'){ $suma++; }
if($_POST['odp44']=='drum'){ $suma++; }

if($_POST['odp45']=='is'){ $suma++; }
if($_POST['odp46']=='are'){ $suma++; }
if($_POST['odp47']=='am'){ $suma++; }

if($_POST['odp54']=='going'){ $suma++; }
if($_POST['odp55']=='writing'){ $suma++; }
if($_POST['odp56']=='eating'){ $suma++; }

if($_POST['odp57']=='is running'){ $suma++; }
if($_POST['odp58']=='is eating'){ $suma++; }
if($_POST['odp59']=='are singing'){ $suma++; }

if($_POST['odp60']=='went'){ $suma++; }
if($_POST['odp61']=='prepared'){ $suma++; }
if($_POST['odp62']=='was cooking'){ $suma++; }
if($_POST['odp63']=='came'){ $suma++; }
if($_POST['odp64']=='promised'){ $suma++; }

if($_POST['odp69']=='bad'){ $suma++; }
if($_POST['odp70']=='sad'){ $suma++; }
if($_POST['odp71']=='easy'){ $suma++; }
if($_POST['odp72']=='expensive'){ $suma++; }

if($_POST['odp73']=='was travelling'){ $suma++; }
if($_POST['odp74']=='arrived'){ $suma++; }
if($_POST['odp75']=='spent'){ $suma++; }
if($_POST['odp76']=='was listening'){ $suma++; }
if($_POST['odp77']=='felt'){ $suma++; }

$_SESSION[suma] = $suma; ?>

<?	if($_SESSION[suma]<9){ $poziom = "STARTER (0)"; }
	if($_SESSION[suma]>=9 && $_SESSION[suma]<17){ $poziom = "PRE (-A1) "; }
	if($_SESSION[suma]>=17 && $_SESSION[suma]<26){ $poziom = "BEGINNER (A1) początkujący"; }
	if($_SESSION[suma]>=26 && $_SESSION[suma]<37){ $poziom = "BEGINNER/ELEMENTARY (A1+) początkujący +"; }
	if($_SESSION[suma]>=37 && $_SESSION[suma]<48){ $poziom = "PRE-INTERMEDIATE (A2) niższy średnio-zaawansowany"; }
	if($_SESSION[suma]>=48 && $_SESSION[suma]<57){ $poziom = "PRE-INTERMEDIATE/INTERMEDIATE (A2+) niższy średnio-zaawansowany +/ średnio-zaawansowany"; }
	if($_SESSION[suma]>=57 && $_SESSION[suma]<77){ $poziom = "INTERMEDIATE (B1) średnio-zaawansowany"; } ?>

<?
	//$email = 'aktywacja@ostrowskieogloszenia.eu';
	//$headers = "From: $email" . "\r\n" . "Reply-To: $email" . "\r\n" . 'X-Mailer: PHP/' . phpversion();
	$razem = "Wynik testu: TEST KWALIFIKACYJNY DZIECI/JUNIOR\r\n\r\n";
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




<form method="post" id="myForm"  action="test2.php?next=koniec">
<table border="0" cellpadding="0" cellspacing="0" width="600" id="table1">

	<tr>
		<td align="left" valign="top"><H2><FONT size=4>Proszę uzupełnić poniższe zdania odpowiednim słowem lub zwrotem. W każdym zdaniu możliwa jest tylko
jedna poprawna odpowiedź. Zalecane jest uzupełnienie maksymalnej ilości zdań niezależnie od poziomu
osoby testowanej. <br />Czas na wykonanie testu: 45 minut.<br />Życzymy powodzenia!!!</FONT></H2>




<DIV><FONT color=#00ff00></FONT></DIV><FONT color=#00ff00></FONT> </DIV>
<br><br><br>
<DIV>1. Match the picture with the colour: (wybierz kolor jaki przedstawia obrazek)</DIV>
<br>

<DIV><IMG height=200 hspace=0 src="http://www.englishexercises.org/makeagame/my_documents/my_pictures/gallery/b/blue.jpg" width=200 align=left border=0></DIV>
<br>
<DIV><FONT size=4>              a) red   <INPUT type=checkbox value="" name="odp1"></FONT></DIV>
<DIV><FONT size=4>              b) blue  <INPUT type=checkbox value="1" name="odp1"></FONT></DIV>
<DIV><FONT size=4>              c)brown <INPUT type=checkbox value="" name="odp1"></FONT></DIV>
<br><br><br><br><br><br><br><br><br>
<DIV><IMG height=200 hspace=0 src="http://www.englishexercises.org/makeagame/my_documents/my_pictures/gallery/o/orange(colour).jpg" width=200 align=left border=0></DIV>
<br>
<DIV><FONT size=4>          a) orange  <INPUT type=checkbox value="1" name="odp2"></FONT></DIV>
<DIV><FONT size=4>          b) yellow   <INPUT type=checkbox value="" name="odp2"></FONT></DIV>
<DIV><FONT size=4>          c) green    <INPUT type=checkbox value="" name="odp2"></FONT></DIV>
<br>
<br><br><br><br>
<br>

<br>
<br>
<DIV>2. How many objects are there in the picture- choose (Ile rzeczy przedstawionych jest na obrazku - wybierz )</DIV>
<br>
<br>
<DIV><FONT size=4><IMG height=200 hspace=0 src="http://www.englishexercises.org/makeagame/my_documents/my_pictures/gallery/d/doll.jpg" width=200 border=0>         </FONT><FONT size=5>a) two <INPUT type=checkbox value="" name="odp3">  b) one  <INPUT type=checkbox value="1" name="odp3">    c)  five  <INPUT type=checkbox value="" name="odp3"></FONT></DIV>
<br>
<br>
<br><br>

<DIV><FONT size=4><IMG height=93 hspace=0 src="http://www.englishexercises.org/makeagame/my_documents/my_pictures/2009/jul/147_images.jpg" width=124 border=0>        </FONT><FONT size=5>a) six   <INPUT type=checkbox value="" name="odp4"> b) two   <INPUT type=checkbox value="1" name="odp4">   c)  zero   <INPUT type=checkbox value="" name="odp4"></FONT></DIV>
<br><br><br>
<br>
<DIV>
  <p>3. Choose the name of  the picture: (kto jest przedstawiony na obrazku? wybierz)</p>

</DIV>
<br>
<DIV><IMG height=146 hspace=0 src="http://www.englishexercises.org/makeagame/my_documents/my_pictures/2009/ago/1Z1_father.jpg" width=102 border=0>    <SELECT size=1  name="odp5"><OPTION value="" selected></OPTION><OPTION value="">mother</OPTION><OPTION value="">sister</OPTION><OPTION value="1">father</OPTION></SELECT></DIV>

<br><br><br>
<DIV><FONT size=4><IMG height=113 hspace=0 src="http://www.englishexercises.org/makeagame/my_documents/my_pictures/2009/jul/976_imagesMother.jpg" width=113 border=0>    <SELECT size=1  name="odp6"><OPTION value="" selected></OPTION><OPTION value="1">mother</OPTION><OPTION value="">brother</OPTION><OPTION value="">sister</OPTION></SELECT></FONT></DIV>
<br><br><br><br>
<DIV>4. Choose the right option: (wybierz)</DIV>
<br>
<DIV><FONT size=4><IMG height=200 hspace=0 src="http://www.englishexercises.org/makeagame/my_documents/my_pictures/gallery/d/down.jpg" width=200 border=0>    <SELECT size=1  name="odp7"><OPTION value="" selected></OPTION><OPTION value="">up</OPTION><OPTION value="1">down</OPTION><OPTION value="">into</OPTION><OPTION value="">out of</OPTION></SELECT></FONT></DIV>

<br><br><br>
<DIV><FONT size=4><IMG height=200 hspace=0 src="http://www.englishexercises.org/makeagame/my_documents/my_pictures/gallery/i/into.jpg" width=200 border=0>    <SELECT size=1  name="odp8"><OPTION value="" selected></OPTION><OPTION value="">up</OPTION><OPTION value="">down</OPTION><OPTION value="1">into</OPTION></SELECT></FONT></DIV>
<br><br><br><br>
<DIV>5. Choose the right option: (co przedstawia obrazek ? wybierz)</DIV>
<br>
<DIV><IMG height=200 hspace=0 src="http://www.englishexercises.org/makeagame/my_documents/my_pictures/gallery/a/arm.jpg" width=200 border=0>   a) leg  <INPUT type=checkbox value="" name="odp9">  b) arm   <INPUT type=checkbox value="1" name="odp9">  c) body   <INPUT type=checkbox value="" name="odp9"></DIV>

<br><br><br>
<DIV><IMG height=200 hspace=0 src="http://www.englishexercises.org/makeagame/my_documents/my_pictures/gallery/m/mouth.jpg" width=200 border=0>  a) mouth  <INPUT type=checkbox value="1" name="odp10">  b)belly   <INPUT type=checkbox value="" name="odp10">  c) nose  <INPUT type=checkbox value="" name="odp10"></DIV>
<br><br><br><br />
<DIV>6. Choose the right option: (wybierz odpowiedni opis)</DIV>
<br>
<DIV><IMG height=86 hspace=0 src="http://www.englishexercises.org/makeagame/my_documents/my_pictures/2009/jul/745_images.jpg" width=78 border=0>   <SELECT size=1  name="odp11"><OPTION value="" selected></OPTION><OPTION value="">I'm wearing yellow dress and red shoes.</OPTION><OPTION value="">I'm wearing green dress and pink shoes.</OPTION><OPTION value="1">I'm wearing green dress and red shoes.</OPTION></SELECT></DIV>
<br><br><br>
<DIV><IMG height=120 hspace=0 src="http://www.englishexercises.org/makeagame/my_documents/my_pictures/2009/jul/images_BOY.jpg" width=98 border=0>   <SELECT size=1  name="odp12"><OPTION value="" selected></OPTION><OPTION value="1">I'm wearing grey trousers and green t-shirt.</OPTION><OPTION value="">I'm wearing black trousers and red T-shirt.</OPTION><OPTION value="">I'm wearing blue trousers and green T-shirt.</OPTION></SELECT></DIV>
<br><br><br><br />
<DIV>7. Mark the right option: (co przedstawia obrazek ? zaznacz ):</DIV>
<br>
<DIV><IMG height=200 hspace=0 src="http://www.englishexercises.org/makeagame/my_documents/my_pictures/gallery/k/kitchen.jpg" width=200 border=0>  a) kitchen   <INPUT type=checkbox value="1" name="odp13">  b) bedroom  <INPUT type=checkbox value="" name="odp13">  c) hall   <INPUT type=checkbox value="" name="odp13"></DIV>
<br><br><br>

<DIV><IMG height=200 hspace=0 src="http://www.englishexercises.org/makeagame/my_documents/my_pictures/gallery/b/bedroom.jpg" width=200 border=0>  a) kitchen  <INPUT type=checkbox value="" name="odp14">  b) bedroom <INPUT type=checkbox value="1" name="odp14">  c) hall  <INPUT type=checkbox value="" name="odp14"></DIV>
<br><br><br><br />
<DIV>8. Choose the right option: (wybierz)</DIV>
<br>
<DIV><IMG height=77 hspace=0 src="http://www.englishexercises.org/makeagame/my_documents/my_pictures/2009/jul/images_Spaghetti.jpg" width=135 border=0>  <SELECT size=1  name="odp15"><OPTION value="" selected></OPTION><OPTION value="1">spaghetti</OPTION><OPTION value="">hamburger</OPTION><OPTION value="">pizza</OPTION><OPTION value="">sandwich</OPTION></SELECT></DIV>
<br><br><br>
<DIV><IMG height=96 hspace=0 src="http://www.englishexercises.org/makeagame/my_documents/my_pictures/2009/jul/528_imagessandwich.jpg" width=104 border=0>   <SELECT size=1  name="odp16"><OPTION value="" selected></OPTION><OPTION value="">pizza</OPTION><OPTION value="1">sandwich</OPTION><OPTION value="">hamburger</OPTION><OPTION value="">apple</OPTION></SELECT></DIV>

<br><br><br><br />
<DIV>9. Choose the right option: (wybierz odpowiedni dzien tygodnia)</DIV>
<br>
<DIV>MONDAY</DIV>
<DIV>TUESDAY</DIV>
<DIV>WEDNESDAY</DIV>
<DIV>THURSDAY</DIV>
<DIV><SELECT size=1  name="odp17"><OPTION value="" selected></OPTION><OPTION value="">SATURDAY</OPTION><OPTION value="">MONDAY</OPTION><OPTION value="1">FRIDAY</OPTION></SELECT></DIV>

<DIV>SATURDAY</DIV>
<DIV><SELECT size=1  name="odp18"><OPTION value="" selected></OPTION><OPTION value="">THURSDAY</OPTION><OPTION value="">FRIDAY</OPTION><OPTION value="1">SUNDAY</OPTION></SELECT></DIV>
<br><br><br><br />




<DIV>10. Choose the right description (wybierz  opis):</DIV>
<br>
<DIV><IMG height=96 hspace=0 src="http://www.englishexercises.org/makeagame/my_documents/my_pictures/2009/jul/6FB_imagesRobot.jpg" width=141 border=0>    <SELECT size=1  name="odp19"><OPTION value="" selected></OPTION><OPTION value="1">I ve got 1 head, 9 arms, 2 ears and 1 belly.</OPTION><OPTION value="">I've got 2 heads, 9 arms, 1 ear and 1 belly.</OPTION><OPTION value="">I've got 1 head, 3 arms, 2 ears and 4 bellies.</OPTION></SELECT></DIV>
<br><br><br>
<DIV> <IMG height=124 hspace=0 src="http://www.englishexercises.org/makeagame/my_documents/my_pictures/2009/jul/FA9_imagesChild.jpg" width=83 border=0> <SELECT size=1  name="odp20"><OPTION value="" selected></OPTION><OPTION value="">She's wearing blue blouse and pink jeans.</OPTION><OPTION value="1">She's wearing blue blouse and blue jeans</OPTION><OPTION value="">She's wearing green blouse and brown jeans.</OPTION></SELECT></DIV>
<br><br><br>
<DIV><IMG height=83 hspace=0 src="http://www.englishexercises.org/makeagame/my_documents/my_pictures/2009/jul/8DD_imagesChild&hamburger.jpg" width=135 border=0>   <SELECT size=1  name="odp21"><OPTION value="" selected></OPTION><OPTION value="1">My favourite food is hamburger.</OPTION><OPTION value="">My favourite food is pizza.</OPTION><OPTION value="">My favourite food is sandwich.</OPTION></SELECT></DIV>
<br><br><br><br />
<DIV>11. Choose the correct option: (wybierz prawidłowa odpowiedz)</DIV>

<br>
<DIV>a) Is it a spider? <IMG height=200 hspace=0 src="http://www.englishexercises.org/makeagame/my_documents/my_pictures/gallery/s/spider.jpg" width=200 border=0>   a) Yes, it is.  <INPUT type=checkbox value="1" name="odp22"> b) No, it isn't.  <INPUT type=checkbox value="" name="odp22"></DIV>
<br><br><br>
<DIV>b) Is it a house? <IMG height=200 hspace=0 src="http://www.englishexercises.org/makeagame/my_documents/my_pictures/gallery/e/ear.jpg" width=200 border=0>  a) No, it isn't. <INPUT type=checkbox value="1" name="odp23"> b) Yes, it is.  <INPUT type=checkbox value="" name="odp23"></DIV>
<br><br><br><br />
<DIV>12. Choose the right option: (wybierz )</DIV>
<br>
<DIV><IMG height=200 hspace=0 src="http://www.englishexercises.org/makeagame/my_documents/my_pictures/gallery/d/dance.jpg" width=200 border=0>   a) dance  <INPUT type=checkbox value="1" name="odp24"> b) swim <INPUT type=checkbox value="" name="odp24"> c) jump  <INPUT type=checkbox value="" name="odp24"></DIV>

<br><br><br>
<DIV><IMG height=200 hspace=0 src="http://www.englishexercises.org/makeagame/my_documents/my_pictures/gallery/j/jump.jpg" width=200 border=0>  a) swim <INPUT type=checkbox value="" name="odp25"> b) jump <INPUT type=checkbox value="1" name="odp25"> c) fly <INPUT type=checkbox value="" name="odp25"></DIV>
<br><br><br><br />
<DIV>13. Choose the correct option : (wybierz )</DIV>
<br>
<DIV><IMG height=92 hspace=0 src="http://www.englishexercises.org/makeagame/my_documents/my_pictures/2009/jul/1E8_Clock.jpg" width=103 border=0> a) It's one o'clock. <INPUT type=checkbox value="" name="odp26"> b) It's four o'clock. <INPUT type=checkbox value="1" name="odp26"> c) It's six o'clock. <INPUT type=checkbox value="" name="odp26"></DIV>
<br><br><br>

<DIV><IMG height=74 hspace=0 src="http://www.englishexercises.org/makeagame/my_documents/my_pictures/2009/jul/622_imagesClock2.jpg" width=74 border=0> a) It's one o'clock.  <INPUT type=checkbox value="1" name="odp27"> b) It's five o'clock. <INPUT type=checkbox value="" name="odp27"> c) It's three o'clock. <INPUT type=checkbox value="" name="odp27"></DIV>
<br><br><br><br />



<DIV>14. Match the description with a picture: (połącz obrazek z opisem )</DIV>
<br>
<DIV><IMG height=115 hspace=0 src="http://www.englishexercises.org/makeagame/my_documents/my_pictures/2009/jul/56C_imagesSun.jpg" width=108 border=0> a) It's rainy. <INPUT type=checkbox value="" name="odp28"> b) It's sunny. <INPUT type=checkbox value="1" name="odp28"> c) It's windy. <INPUT type=checkbox value="" name="odp28"></DIV>
<br><br><br>
<DIV><IMG height=86 hspace=0 src="http://www.englishexercises.org/makeagame/my_documents/my_pictures/2009/jul/C6D_imagesSad.jpg" width=65 border=0> a) She is happy. <INPUT type=checkbox value="" name="odp29"> b) She is sad. <INPUT type=checkbox value="1" name="odp29"> c) She is cold. <INPUT type=checkbox value="" name="odp29"></DIV>
<br><br><br>

<DIV><IMG height=48 hspace=0 src="http://www.englishexercises.org/makeagame/my_documents/my_pictures/2009/jul/ZF1_imagesBus.jpg" width=99 border=0>  a) It's a bus. <INPUT type=checkbox value="1" name="odp30"> b) It's a car. <INPUT type=checkbox value="" name="odp30"> c) It's a boat. <INPUT type=checkbox value="" name="odp30"></DIV>
<br><br><br><br />
<DIV>15. Choose the right option of plural : (liczba mnoga - wybierz )</DIV>
<br>
<DIV>1. apple -       a) applie <INPUT type=checkbox value="" name="odp31"> b) appless <INPUT type=checkbox value="" name="odp31"> c) apples <INPUT type=checkbox value="1" name="odp31"></DIV><br><br><br>
<DIV>2. mum -        a) mums <INPUT type=checkbox value="1" name="odp32">  b) mumies <INPUT type=checkbox value="" name="odp32"> c) mumys  <INPUT type=checkbox value="" name="odp32"></DIV><br><br><br>

<DIV>3. bus -         a) busys <INPUT type=checkbox value="" name="odp33"> b) buses <INPUT type=checkbox value="1" name="odp33">     c) buss  <INPUT type=checkbox value="" name="odp33"></DIV>
<br><br><br><br />
<DIV>16. Choose the right preposition : (wybierz)<BR></DIV>
<br>
<DIV><IMG height=85 hspace=0 src="http://www.englishexercises.org/makeagame/my_documents/my_pictures/2009/jul/9C3_imagesIn.jpg" width=85 border=0>  a) in <INPUT type=checkbox value="1" name="odp34"> b) on <INPUT type=checkbox value="" name="odp34"> c) under <INPUT type=checkbox value="" name="odp34"></DIV>
<br><br><br>
<DIV><IMG height=73 hspace=0 src="http://www.englishexercises.org/makeagame/my_documents/my_pictures/2009/jul/CC7_imagesUNDER.jpg" width=97 border=0>  a) under <INPUT type=checkbox value="1" name="odp35">  b) in <INPUT type=checkbox value="" name="odp35"> c) on <INPUT type=checkbox value="" name="odp35"></DIV>

<br><br><br>
<DIV><IMG height=74 hspace=0 src="http://www.englishexercises.org/makeagame/my_documents/my_pictures/2009/jul/A9A_imagesBehind.jpg" width=63 border=0>  a) on <INPUT type=checkbox value="" name="odp36">  b) under <INPUT type=checkbox value="" name="odp36">  c) behind <INPUT type=checkbox value="1" name="odp36"></DIV>
<br><br><br><br />



<DIV>17. Choose the right description : (wybierz)</DIV>
<br>
<DIV><IMG height=115 hspace=0 src="http://www.englishexercises.org/makeagame/my_documents/my_pictures/2009/jul/59A_imagesBedroom.jpg" width=101 border=0>  <SELECT size=1  name="odp37"><OPTION value="" selected></OPTION><OPTION value="">In the bedroom there is a bed, a lamp and a wardrobe.</OPTION><OPTION value="">In the bedroom there is a bed, a picture and a radio.</OPTION><OPTION value="1">In the bedroom there is a bed, a lamp, a picture and a computer.</OPTION></SELECT></DIV>

<br><br><br>
<DIV>   <IMG height=339 hspace=0 src="http://www.englishexercises.org/makeagame/my_documents/my_pictures/2009/jul/E55_imagesFamilyTree.jpg" width=352 border=0>  <SELECT size=1  name="odp38"><OPTION value="" selected></OPTION><OPTION value="">George is Anne's sister.</OPTION><OPTION value="1">Kate is George and Ann's daughter.</OPTION><OPTION value="">Cindy is Phil's sister.</OPTION></SELECT></DIV>
<br><br><br><br />
<DIV>18. Choose the correct verb for each sentence : (wybierz odpowiedni czasownik)</DIV>
<br>
<DIV>1. Mary <SELECT size=1  name="odp39"><OPTION value="" selected></OPTION><OPTION value="1">goes</OPTION><OPTION value="">go</OPTION><OPTION value="">gos</OPTION></SELECT> to school at 7:30 every day.</DIV><br><br><br>

<DIV>2. We <SELECT size=1  name="odp40"><OPTION value="" selected></OPTION><OPTION value="">doesn't</OPTION><OPTION value="">not</OPTION><OPTION value="1">don't</OPTION></SELECT> swim in a swimming pool on Sundays.</DIV><br><br><br>
<DIV>3. I <SELECT size=1  name="odp41"><OPTION value="" selected></OPTION><OPTION value="">plays</OPTION><OPTION value="">playing</OPTION><OPTION value="1">play</OPTION></SELECT>  football very often.</DIV>
<br><br><br><br />
<DIV>19. Write the names of the instruments: (wpisz nazwy instrumentów)</DIV>
<br>

<DIV><IMG height=200 hspace=0 src="http://www.englishexercises.org/makeagame/my_documents/my_pictures/gallery/g/guitar.jpg" width=200 border=0>   <INPUT size=6 name="odp42"></DIV><br><br><br>
<DIV><IMG height=200 hspace=0 src="http://www.englishexercises.org/makeagame/my_documents/my_pictures/gallery/p/piano.jpg" width=200 border=0>  <INPUT size=5 name="odp43"></DIV><br><br><br>
<DIV><IMG height=200 hspace=0 src="http://www.englishexercises.org/makeagame/my_documents/my_pictures/gallery/d/drum.jpg" width=200 border=0>  <INPUT size=4 name="odp44"></DIV><br><br><br>
<br><br><br><br />
<DIV>20. Insert a proper form of the verb "BE"(IS, ARE,AM) (wstaw formę czasownika BE - IS, ARE, AM)</DIV>
<br>
<DIV>1. She <INPUT size=2 name="odp45"> a nice girl.</DIV><br><br><br>
<DIV>2. We <INPUT size=3 name="odp46"> students of third grade.</DIV><br><br><br>

<DIV>3. I <INPUT size=2 name="odp47"> a pilot and that's really cool.</DIV><br><br><br>
<br><br><br><br />




<DIV>21. Choose the right description: (wybierz opis)</DIV>
<br>
<DIV><IMG height=116 hspace=0 src="http://www.englishexercises.org/makeagame/my_documents/my_pictures/2009/jul/imagesFashinalble_gir.jpg" width=55 border=0><br /><SELECT size=1  name="odp48"><OPTION value="" selected></OPTION><OPTION value="">The girl is tall, slim and she's wearing long brown dress, black boots and she has a green bag.</OPTION><OPTION value="">The girl is tall and fat. She's wearing a green dress and black boots.</OPTION><OPTION value="1">The girl is slim and has blond hair. She's wearing a green dress, black boots and sunglasses.</OPTION></SELECT></DIV>
<br><br><br><br />
<DIV>22. Choose the right option: (wybierz)</DIV>

<br>
<DIV><IMG height=127 hspace=0 src="http://www.englishexercises.org/makeagame/my_documents/my_pictures/2009/jul/4E7_imagesForbidden.jpg" width=127 border=0><br />  a) You can play football here. <INPUT type=checkbox value="" name="odp49"></DIV>
<DIV>                    b) You has to play football here . <INPUT type=checkbox value="" name="odp49"></DIV>
<DIV>                    c) You mustn't play football here.  <INPUT type=checkbox value="1" name="odp49"></DIV>
<br><br><br>
<DIV><IMG height=82 hspace=0 src="http://www.englishexercises.org/makeagame/my_documents/my_pictures/2009/jul/51F_imagesCleaning.jpg" width=113 border=0><br />   a) You have to clean it. <INPUT type=checkbox value="1" name="odp50"></DIV>
<DIV>                   b) You can't clean it. <INPUT type=checkbox value="" name="odp50"></DIV>
<DIV>                   c) You mustn't clean it. <INPUT type=checkbox value="" name="odp50"></DIV>
<br><br><br><br />

<DIV>23. Choose the right word: (wybierz) </DIV>
<br>
<DIV>1. <SELECT size=1  name="odp51"><OPTION value="" selected></OPTION><OPTION value="">Who</OPTION><OPTION value="1">How</OPTION><OPTION value="">Why</OPTION></SELECT> often do you play tennis?</DIV><br><br><br>
<DIV>2. <SELECT size=1  name="odp52"><OPTION value="" selected></OPTION><OPTION value="1">Who</OPTION><OPTION value="">How</OPTION><OPTION value="">What</OPTION></SELECT> is the best student in this class?</DIV><br><br><br>
<DIV>3. <SELECT size=1  name="odp53"><OPTION value="" selected></OPTION><OPTION value="">what</OPTION><OPTION value="">why</OPTION><OPTION value="1">when</OPTION></SELECT> do you get up?</DIV>

<br><br><br><br />
<DIV>24. Insert the correct form of the verb from the brackets : (wpisz prawidłową formę czasownika z nawiasu)</DIV>
<br>
<DIV>1. Susan likes <INPUT size=5 name="odp54"> to the park wiyh her friends. (go)</DIV><br><br><br>
<DIV>2. They hate <INPUT size=7 name="odp55">  tests every month. (write)</DIV><br><br><br>
<DIV>3. I love <INPUT size=6 name="odp56"> chocolate. (eat)</DIV>
<br><br><br><br />

<DIV>25. Complete the sentences telling waht the people are doing: (uzupełnij zdania pisząc co robią przedstawione osoby)</DIV>
<br><DIV><IMG height=148 hspace=0 src="http://www.englishexercises.org/makeagame/my_documents/my_pictures/2009/jul/A8F_imagesRunning.jpg" width=148 border=0> The man <INPUT size=10 name="odp57"> .</DIV><br><br><br>
<DIV><IMG height=124 hspace=0 src="http://www.englishexercises.org/makeagame/my_documents/my_pictures/2009/jul/F23_imagesEating.jpg" width=120 border=0>   The boy <INPUT size=9 name="odp58"> .</DIV><br><br><br>
<DIV><IMG height=122 hspace=0 src="http://www.englishexercises.org/makeagame/my_documents/my_pictures/2009/jul/37D_imagesSinging.jpg" width=119 border=0>  They <INPUT size=11 name="odp59"> .</DIV>
<br><br><br><br />



<DIV>26. Complete the story with a proper past form of verbs in brackets: (uzupelnij historyjkę czasownikami w odpowiedniej formie czasu przeszłego)</DIV>
<br>

<DIV>Three months ago Bob 1.<INPUT size=4 name="odp60"> (go) to his granmother, who lives in the village. He </DIV>
<DIV>2.<INPUT size=14 name="odp73"> (travel) a long time and  after 5 hours he finally 3. <INPUT size=7 name="odp74"> (arrive) at his granny. She was really happy and quickly 4. <INPUT size=8 name="odp61"> (prepare) a delicious meal for Bob. </DIV>
<DIV>He 5. <INPUT size=5 name="odp75"> (spend) about two weeks at  granny's. All the time he 6.<INPUT size=13 name="odp76"> (listen) to her interesting stories and ,which is more surprising, he 7. <INPUT size=11 name="odp62"> (cook) tasty biscuits with her.</DIV>
<DIV>When the last day 8. <INPUT size=4 name="odp63"> (come) Bob 9. <INPUT size=4 name="odp77"> (feel) very sad but his granny </DIV>

<DIV>10.<INPUT size=8 name="odp64"> (promise) him that next year he would stay with her almost whole month.</DIV>


<br><br><br><br />
<DIV>27. Choose the right option: (wybierz  opcję)</DIV>
<br>
<DIV>1. My mum is a good teacher. I think she <SELECT size=1  name="odp65"><OPTION value="" selected></OPTION><OPTION value="">is going get</OPTION><OPTION value="1">will get</OPTION><OPTION value="">won't get</OPTION></SELECT> an award soon.</DIV><br><br><br>
<DIV>2. I have learned a lot and I believe I  <SELECT size=1  name="odp66"><OPTION value="" selected></OPTION><OPTION value="1">will pass</OPTION><OPTION value="">is going to pass</OPTION><OPTION value="">pass</OPTION></SELECT> the exam.</DIV>

<br><br><br><br />
<DIV>28. Choose the right option : (wybierz prawidłową opcję)</DIV>
<br>
<DIV>1. She .......... changed her job recently.</DIV>
<DIV> </DIV>
<DIV>a) have  <INPUT type=checkbox value="" name="odp67"> b) has <INPUT type=checkbox value="1" name="odp67"> c) having  <INPUT type=checkbox value="" name="odp67"></DIV><br><br><br>
<DIV> </DIV>
<DIV>2. They have already ......... breakfast .</DIV>

<DIV> </DIV>
<DIV>a) eaten <INPUT type=checkbox value="1" name="odp68"> b) eat <INPUT type=checkbox value="" name="odp68"> c) eating <INPUT type=checkbox value="" name="odp68"></DIV><br><br><br><br />

<DIV>29. Write an opposite to each adjective : ( wpisz przymiotnik o przeciwstawnym znaczeniu)</DIV>
<br>
<DIV>1. good - <INPUT size=3 name="odp69"></DIV>
<DIV>2. happy - <INPUT size=3 name="odp70"></DIV>
<DIV>3. difficult - <INPUT size=4 name="odp71"></DIV>

<DIV>4. cheap - <INPUT size=9 name="odp72"></DIV>

</td>
	</tr>
	<tr>
		<td align="left" valign="top">

<br /><br />
<input class="input" type="submit" value="Zakończ test i poznaj wynik" style="width:100%"  onclick="formSubmit()"
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
