<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head><meta content="text/html; charset=UTF-8" http-equiv="content-type"><title>Aksim.pl - kontakt</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="basketInfoDiv">
<table class="basketTable" width="976" align="center" background="Image2.jpg">
  <tr>
    <td height="265" align="right" valign="top">
        <p style="margin-right: 20px;"></a><a href="index.php" class="link1">STRONA G&#321;&Oacute;WNA</a> <span class="link1">| </span><a href="oferta.php" class="link1">OFERTA</a><span class="link1"> | </span><a href="kontakt.php" class="link1">KONTAKT</a>
		<span class="link1">|<span class="link1"> </span> 
		<span><a id="top_basket" href='koszyk.php'></a> 
		<?php //if(isBasketNotEmpty()){echo("(".getTotalPriceWithSend($_SESSION["books"])." z&#322;) ");} ?>
		</span>
		</p>
	</td>
  </tr>
</table>

<div class="emptyDiv2"></div>

	<div class="basketDivMainHeader">
		Wydawnictwo <strong>AKSIM</strong> <em>Cezary Gizi&#324;ski</em>
	</div>

	<div class="emptyDiv2"></div>
	
	<form method="post" action="wyslij.php" name="kontakt">
		<div class="basketDivHeader">
			Je&#347;li maj&#261; Pa&#324;stwo jakiekolwiek pytania prosimy o wype&#322;nienie formularza 
			kontaktowego lub zadzwonienie na poni&#380;szy numer telefonu
		</div>
		
		<div class="emptyDiv1"></div>
		
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
				<td align="left" class="TXT2" width="25%">Temat:</td><td align="left" width="75%"><input name="temat" type="text" id="temat" value="" size="50"></td>
			</tr>
			<tr>
				<td  width="25%" align="left" class="TXT2">Tw&oacute;j adres email:</td><td  width="75%"> <input name="mail" type="text" id="mail" value="" size="50"></td>
			</tr>
			<tr>
				<td  width="25%" align="left" class="TXT2">Tre&#347;&#263;:</td><td  width="75%"> <textarea name="tresc" id="tresc" rows="5" cols="38" ></textarea></td>
			</tr>
			<tr>
				<td  width="25%" align="left" class="TXT2"></td><td  width="75%"><input type="submit" value="Wy&#347;lij" /></textarea></td>
			</tr>
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