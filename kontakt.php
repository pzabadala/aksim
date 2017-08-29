
<?php

	if(isset($_POST["action"])){
		$action = $_POST["action"];
		if(strcmp($action,"send")==0){
			if ( valid_user_data($_POST['temat'],$_POST['mail'], $_POST['tresc'] ) > 0){     
				$error_number = 1 ;
			}else{
				$error_number = send_msg();
			}
		}
	
	}else{
		$action = "not_set";
	}
	
	function send_msg(){
	
		$headers  = "From: Aksim.pl\r\n"; 
		$headers .= "MIME-Version: 1.0\n";
		$headers .= "Content-Type: text/html;\n";
		$headers .= "\tcharset=\"UTF-8\"\n";
		$headers .= "Content-Transfer-Encoding: 8bit\n\n";
	
		$valid = 0;
		$temat = $_POST['temat'];
		$wiadomosc = "e-mail: ".$_POST['mail']."\r\n"."<br>"."Tresc: ".$_POST['tresc']."  "; 
		$tematyka = "WIADOMOSC ZE STRONY AKSIM.PL - ".$temat;
		mail ("aksim@vp.pl", $tematyka, $wiadomosc, $headers); 
		return $valid;
	}

	//echo "Dziekujemy za wyslanie do nas wiadomosci,";
	//echo "Temat: <strong>".$temat."</strong><ul />";
	//echo "Twój adres e-mail: <strong>".$mail."</strong><ul />";
	//echo "Tresc: <strong>".$tresc."</strong><ul />";
	
	
	
	function valid_user_data($nick, $mail, $tresc){
		$valid = 0;
		if(strlen($nick) < 1){
			$valid = 1;
		}
		if(strlen($tresc) < 1){
			$valid = 1;
		}
		if(strlen($mail) < 1){
			$valid = 1;
		}
		return $valid;
	}
	
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head><meta content="text/html; charset=UTF-8" http-equiv="content-type"><title>Aksim.pl - kontakt</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="basketInfoDiv">
	<?php
		$fd = fopen("header.html", "r");
		$footer = fread($fd, filesize("header.html"));
		fclose($fd);
		echo $footer;
	?>

<div class="emptyDiv2"></div>

	<div class="basketDivMainHeader">
		Wydawnictwo <strong>AKSIM</strong>
	</div>

	<div class="emptyDiv2"></div>
	
	<form method="post" action="kontakt.php" name="kontakt">
		<div class="basketDivHeader">
			Je&#347;li maj&#261; Pa&#324;stwo jakiekolwiek pytania prosimy o wype&#322;nienie formularza 
			kontaktowego lub zadzwonienie na poni&#380;szy numer telefonu
		</div>
		
		<div class="emptyDiv1"></div>
		
		
		<?php
			if(strcmp($action,"send")==0){
				if($error_number == 0){
					echo("<div class='basketDivConf'> Formularz zosta&#322; wys&#322;any poprawnie. <br> Dzi&#281;kujemy </div>");
					echo("<div class='emptyDiv2'></div>");
					
				}else if($error_number == 1){
					echo("<div class='basketDivError'> Formulary nie zosta&#322; wys&#322;any poprawnie. <br> Prosz&#281; poprawi&#263; dane na formularzu </div>");
					echo("<div class='emptyDiv2'></div>");
				}
			}
		?>
		
		
		<table class="basketTable">
		<tbody>
			<tr>
				<td align="left" class="TXT2" width="25%">Numer telefonu:</td><td  class="TXT2" align="left" width="75%"><strong>514009306</strong></td>
			</tr>
		</tbody>
		</table>
		
		<div class="emptyDiv2"></div>
		<table class="basketTable">
		<tbody>
			<tr>
				<td align="left" class="TXT2" width="25%">Temat:</td><td align="left" width="75%"><input name="temat" type="text" id="temat" value="<?PHP if(isset($_POST['temat'])){echo($_POST['temat']);} ?>" size="50"></td>
			</tr>
			<tr>
				<td  width="25%" align="left" class="TXT2">Tw&oacute;j adres email:</td><td  width="75%"> <input name="mail" type="text" id="mail" value="<?PHP if(isset($_POST['mail'])){echo($_POST['mail']);} ?>" size="50"></td>
			</tr>
			<tr>
				<td  width="25%" align="left" class="TXT2">Tre&#347;&#263;:</td><td  width="75%"> <textarea name="tresc" id="tresc" rows="5" cols="38" ><?PHP if(isset($_POST['tresc'])){echo($_POST['tresc']);} ?></textarea></td>
			</tr>
			<tr>
				<td  width="25%" align="left" class="TXT2"></td><td  width="75%"><input type="submit" value="Wy&#347;lij" /></td>
			</tr>
			<input type="hidden" name="action" value="send"/>
		</tbody>
		</table>
		<div class="basketTable" align="center"></div>
	</form>
	
	<?php
		$fd = fopen("footer.html", "r");
		$footer = fread($fd, filesize("footer.html"));
		fclose($fd);
		echo $footer;
	?>
	
</div>
</body></html>