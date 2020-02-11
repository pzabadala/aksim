<?php
session_start(); 
/*validation of user input data
	0 - incorrect user data
	1 - correct user data
	2 - problems with send mail
	3 - no spam agreement
*/

$error_number = 0;

if(isset($books_array)){
}else{
		$books_array = parse_ini_file("properties/books.ini");
}
if(isset($_POST["action"])){
		$action = $_POST["action"];
}else{
	$action = "";
}

if(strcmp($action,"send")==0){
	
	if(isset($_POST["agreement"])){
		$agreement = $_POST["agreement"];
	}else{
		$agreement = "No";
	}
	if(strcmp($agreement, "Yes") == 0){
		if(valid_user_data($_POST["imie"], $_POST["nazwisko"], $_POST["adres"], $_POST["mail"], $_POST["telefon"]) == 1){
			$error_number = send_mails($_POST["imie"], $_POST["nazwisko"], $_POST["adres"], $_POST["mail"], $_POST["telefon"]);
		}
	} else{
		$error_number = 3;
	}
	
}

function getTotalPriceWithSend($books){
		$totalPrice = 0;
		$books_array = $_SESSION["books_array"];
		if(isset($books)){
			while (list($book_id, $book_amount) = each($books)) {
				$totalPrice = $totalPrice +($books_array["book_".$book_id."_price"] * $book_amount);
			}
			if(sizeof($books) == 1){
				$totalPrice = $totalPrice + 0;
			}
		}
		return $totalPrice;
	}

function getTextOrderMailToSaler($imie, $nazwisko, $adres, $email, $basketTekst, $telefon){
	$mail = "";
	$mail = $mail."Imi&#281;: ".$imie."\r\n"."<br>";
	$mail = $mail."Nazwisko: ".$nazwisko."\r\n"."<br>";
	$mail = $mail."Adres: ".$adres."\r\n"."<br>";
	$mail = $mail."Telefon: ".$telefon."\r\n"."<br>";
	
	$mail = $mail."Email: ".$email."\r\n"."<br>";
	$mail = $mail."Zam&#243;wione ksia&#380;ki: \r\n"."<br>".$basketTekst."<br>";
	$mail = $mail."\r\n&#321;aczna kwota zam&#243;wienia: ".getTotalPriceWithSend($_SESSION["books"])." z&#322;"."<br>";
	
	return $mail;
}

function getTextOrderMailToCustomer($imie, $nazwisko, $adres, $email, $basketTekst, $telefon){
	$mail = "";
	$information = "To jest mail potwierdzajacy zam&#243;wienie na stronie aksim.pl. \r\n"."<br>";
	$information = $information."Zam&#243;wienie zostanie zrealizowane po wp&#322;acie kwoty ";
	$information = $information."na poni&#380;sze konto: \r\n"."<br>";
	$information = $information."Wydawnictwo AKSIM \r\n"."<br>";
	$information = $information."Bank PKO S.A. \r\n"."<br>";
	$information = $information."97 1240 2193 1111 0010 0740 0305 \r\n"."<br>";
	$information = $information."Szczeg&#243;&#322;y zam&#243;wienia: \r\n"."<br>";
	
	$mail = $mail.$information;
	$mail = $mail."Imi&#281;: ".$imie."\r\n"."<br>";
	$mail = $mail."Nazwisko: ".$nazwisko."\r\n"."<br>";
	$mail = $mail."Adres: ".$adres."\r\n"."<br>";
	$mail = $mail."Telefon: ".$telefon."\r\n"."<br>";
	$mail = $mail."Email: ".$email."\r\n"."<br>";
	$mail = $mail."Zam&#243;wione ksia&#380;ki: \r\n"."<br>".$basketTekst;
	$mail = $mail."\r\n&#321;aczna kwota zam&#243;wienia: ".getTotalPriceWithSend($_SESSION["books"])." z&#322;"."<br>";
	return $mail;
}

function getBasketInText(){
	$text = "";
	$books_array = $_SESSION["books_array"];
	if(isBasketNotEmpty()){
		while (list($book_id, $book_amount) = each($_SESSION["books"])) {
			$text = $text."| Tytu&#322;: ".$books_array["book_".$book_id."_title"];
			$text = $text." | Ilo&#347;&#263;: ".$book_amount." |\r\n"."<br>";
		}
	}
	return $text;
}

function valid_user_data($imie, $nazwisko, $adres, $mail, $telefon){
	$isValid = 1;
	if(strlen($imie) < 1){
		$isValid = 0;
	}
	if(strlen($nazwisko) < 1){
		$isValid = 0;
	}
	if(strlen($adres) < 1){
		$isValid = 0;
	}
	if(strlen($mail) < 1){
		$isValid = 0;
	}
	if(strlen($telefon) < 1){
		$isValid = 0;
	}
	
	return $isValid;
}

function isBasketNotEmpty(){
		if(isset($_SESSION["books"])){
			if(sizeof($_SESSION["books"]) > 0){
				return 1;
			}else{
				return 0;
			}
		}else{
			return 0;
		}
		return 0;
}

function sent_to_saler($imie, $nazwisko, $adres, $mail, $basketTekst, $telefon){
	$error_number = 2;
	
	$headers  = "From: sklep@aksim.pl\r\n";
	//$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
	$headers .= "MIME-Version: 1.0\n";
	$headers .= "Content-Type: text/html;\n";
	$headers .= "\tcharset=\"UTF-8\"\n";
	$headers .= "Content-Transfer-Encoding: 8bit\n\n";

	
	$wiadomosc = getTextOrderMailToSaler($imie, $nazwisko, $adres, $mail, $basketTekst, $telefon); 
	$temat = "ZAMOWIENIE ZE STRONY AKSIM.PL - ".$imie." ".$nazwisko;
	mail("aksim@vp.pl", $temat, $wiadomosc, $headers, $telefon);
	/*mail send*/
	$error_number = 1;
	return $error_number;
}

function sent_to_technican($imie, $nazwisko, $adres, $mail, $basketTekst, $telefon){
    $error_number = 2;
    
    $headers  = "From: sklep@aksim.pl\r\n";
    //$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
    $headers .= "MIME-Version: 1.0\n";
    $headers .= "Content-Type: text/html;\n";
    $headers .= "\tcharset=\"UTF-8\"\n";
    $headers .= "Content-Transfer-Encoding: 8bit\n\n";
    
    
    $wiadomosc = getTextOrderMailToSaler($imie, $nazwisko, $adres, $mail, $basketTekst, $telefon);
    $temat = "ZAMOWIENIE ZE STRONY AKSIM.PL - ".$imie." ".$nazwisko;
    mail("p.zabadala@gmail.com", $temat, $wiadomosc, $headers, $telefon);
    /*mail send*/
    $error_number = 1;
    return $error_number;
}

function sent_to_customer($imie, $nazwisko, $adres, $mail, $basketTekst, $telefon){

	$headers  = "From: sklep@aksim.pl\r\n"; 
    //$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
	$headers .= "MIME-Version: 1.0\n";
	$headers .= "Content-Type: text/html;\n";
	$headers .= "\tcharset=\"UTF-8\"\n";
	$headers .= "Content-Transfer-Encoding: 8bit\n\n";

	$error_number = 2;
	$wiadomosc = getTextOrderMailToCustomer($imie, $nazwisko, $adres, $mail, $basketTekst, $telefon); 
	$temat = "POTWIERDZENIE ZAMOWIENIA ZE STRONY AKSIM.PL - ".$imie." ".$nazwisko;
	mail($mail, $temat, $wiadomosc, $headers); 
	/*mail send*/
	$error_number = 1;
	return $error_number;
}

function send_mails($imie, $nazwisko, $adres, $mail, $telefon){
	if(valid_user_data($imie, $nazwisko, $adres, $mail, $telefon) == 1){
		$basketTekst = getBasketInText();
		sent_to_technican($imie, $nazwisko, $adres, $mail, $basketTekst, $telefon);
		if(sent_to_customer($imie, $nazwisko, $adres, $mail, $basketTekst, $telefon) == 1 && sent_to_saler($imie, $nazwisko, $adres, $mail, $basketTekst, $telefon) == 1 ){
			$_SESSION["books"] = array();
			return 1;
		}else{
			return 2;
		}
	}else{
		return 0;
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<script type="text/javascript">
 window.onunload = refreshParent;
 function refreshParent() {              
	var loc = window.opener.location;             
	window.opener.location = loc;                       
	}      
</script>

<head><meta content="text/html; charset=UTF-8" http-equiv="content-type"><title>Aksim.pl</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class='basketTableMainHeader'> Potwierdzenie zam&#243;wienia </div>

	<?php
	if(strcmp($action,"send")==0){
		if($error_number == 1){
			echo("<div class='basketDivConf'> Zg&#322;oszenie wys&#322;ane poprawnie. <br> Dzi&#281;kujemy </div>");
			echo("<div class='emptyDiv2'></div>");
			
		}else if($error_number == 0){
			echo("<div class='basketDivError'> Zg&#322;oszenie nie zosta&#322;o wys&#322;ane. <br> Prosz&#281; poprawi&#263; dane adresowe </div>");
			echo("<div class='emptyDiv2'></div>");
		/*tutaj mozna sprawdzac ktore pole jest wypelnione niepoprawnie*/
		}else if($error_number == 2){
			echo("<div class='basketDivError'> Zg&#322;oszenie nie zosta&#322;o wys&#322;ane. <br> Prosz&#281; spr&#243;buj p&#243;&#378;niej </div>");
			echo("<div class='emptyDiv2'></div>");
		/*tutaj mozna sprawdzac ktore pole jest wypelnione niepoprawnie*/
		}else if($error_number == 3){
			echo("<div class='basketDivError'> Zg&#322;oszenie nie zosta&#322;o wys&#322;ane. <br>Proszę wyraź zgodę na otrzymywanie materiałów handlowych.</div>");
			echo("<div class='emptyDiv2'></div>");
		/*tutaj mozna sprawdzac ktore pole jest wypelnione niepoprawnie*/
		}
	}
	?>

	<div class='basketDiv'> Prosz&#281; o podanie danych oraz adresu na kt&#243;ry ma zosta&#263; wys&#322;ana przesy&#322;ka.</div>
	<div class='emptyDiv1'></div>
	
	<form method="post" action="wyslij_koszyk.php" name="kontakt">
		<input type="hidden" name="action" value="send"/>
		<table class="basketTable">
			<tbody>
				<tr>
					<td align="left" class="TXT2" width="25%">Imi&#281;: </td><td align="left" width="75%"><input name="imie" type="text" value="<?PHP if(isset($_POST['imie'])){echo($_POST['imie']);} ?>" size="50"></td>
				</tr>
				<tr>
					<td  width="25%" align="left" class="TXT2">Nazwisko: </td><td  width="75%"> <input name="nazwisko" type="text" value="<?PHP if(isset($_POST['nazwisko'])){echo($_POST['nazwisko']);} ?>" size="50"></td>
				</tr>
				<tr>
					<td  width="25%" align="left" class="TXT2">Numer telefonu: </td><td  width="75%"> <input name="telefon" type="text" value="<?PHP if(isset($_POST['telefon'])){echo($_POST['telefon']);} ?>" size="50"></td>
				</tr>
				<tr>
					<td  width="25%" align="left" class="TXT2">Adres:</td><td  width="75%"> <textarea type="text" name="adres" rows="5" cols="38" ><?PHP if(isset($_POST['adres'])){echo($_POST['adres']);} ?> </textarea></td>
				</tr>
				<tr>
					<td  width="25%" align="left" class="TXT2">Tw&oacute;j adres email:</td><td  width="75%"> <input name="mail" type="text" id="mail"  size="50" value="<?PHP if(isset($_POST['mail'])){echo($_POST['mail']);} ?>"></td>
				</tr>
				<tr>
					<td  width="25%" align="left" class="TXT2"></td><td  width="75%"></td>
				</tr>
			</tbody>
		</table>
		
		<div class='emptyDiv1'></div>
	
		<table class="basketTable">
			<tbody>
				<tr>
					<td align="left" class="TXT4" width="100%">Wyrażam zgodę na otrzymywanie, na moje konto poczty elektronicznej informacji handlowych wysyłanych przez wydawnictwo AKSIM.</td>
				</tr>
				<tr>
					<td align="left"><input name="agreement" type="checkbox" value="Yes"></td>
				</tr>
			</tbody>
		</table>
		
		<div class='emptyDiv1'></div>
	
		<div class='basketDiv'>
			Przesy&#322;ka zostanie wys&#322;ana dopiero po wp&#322;aceniu pieni&#281;dzy na poni&#380;sze konto:
			<br>WYDAWNICTWO AKSIM
			<br>Bank PKO S.A.
			<br>97 1240 2193 1111 0010 0740 0305
			<br>Szczeg&#243;&#322;owe informacje na temat transakcji zostan&#261; przes&#322;ane na wskazany adres email.
		</div>
		
		<div class='emptyDiv1'></div>
		
		<?php
			if($error_number != 1){
				echo("<div class='basketTableHeader'><input type='submit' value='Wy&#347;lij' /></div>");
			}
			
		?>
		
	</form>
	
</body>
</html>