<?php 
	function getTotalPriceWithSend($books){
		$totalPrice = 0;
		$books_array = parse_ini_file("properties/books.ini");
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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="js/jquery.vortex.min.js"></script>



<head><meta content="text/html; charset=UTF-8" http-equiv="content-type"><title>Aksim.pl</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body >

<div class="basketInfoDiv">
	<?php
		$fd = fopen("header.html", "r");
		$footer = fread($fd, filesize("header.html"));
		fclose($fd);
		echo $footer;
	?>
	<div class="emptyDiv1"></div>
			<div class="basketTableMainHeader">
				Witamy Pa&#324;stwa na stronie naszego Wydawnictwa!
			</div>
	<div class="emptyDiv1"></div>
			
		<div id="mainInfoDiv">
				   <p class="TXT3">&nbsp;Wydawnictwo
				  AKSIM wychodz&#261;c naprzeciw oczekiwaniom m&#322;odych czytelnik&oacute;w stara si&#281;
				  tworzy&#263; &#263;wiczenia, kt&oacute;re ucz&#261; i bawi&#261;. W ofercie wydawniczej mo&#380;na
				  znale&#378;&#263; zar&oacute;wno pozycje w&#322;asne oraz wsp&oacute;&#322;pracuj&#261;cych z nami na zasadzie
				  partnerstwa innych oficyn. AKSIM ma w&#322;asn&#261; sie&#263; przedstawicieli
				  handlowych, kt&oacute;rzy obs&#322;uguj&#261; ksi&#281;garnie, lokalne hurtownie, jak r&oacute;wnie&#380;
				  bezpo&#347;rednio nauczycieli. 
				  </p>
				  <p class="TXT3">
				  &nbsp;AKSIM proponuje dzieciom oraz
				  ich wychowawcom nowocze&#347;nie wydane &#263;wiczenia w r&oacute;&#380;norodnych formach
				  graficznych, cz&#281;sto wzbogacane uprzyjemniaj&#261;cymi nauk&#281; obrazki. Dzi&#281;ki
				  niekonwencjonalnym rozwi&#261;zaniom wydawca bawi i uczy dzieci kocha&#263;
				  ksi&#261;&#380;ki, rozbudza ich wyobra&#378;ni&#281;, zach&#281;ca do rozwijania zdolno&#347;ci. W
				  ofercie Wydawnictwa AKSIM znajduj&#261; si&#281; g&#322;&oacute;wnie &#263;wiczenia edukacyjne dla
				  najm&#322;odszych. Wszystkie oferowane przez AKSIM &#263;wiczenia osi&#261;gaj&#261;
				  najwy&#380;szy poziom edytorski i merytoryczny, dzi&#281;ki wsp&oacute;&#322;pracy zar&oacute;wno z
				  do&#347;wiadczonymi jak i &#380;&#261;dnymi sukcesu m&#322;odymi autorami, doradcami
				  metodycznymi i nauczycielami. Oferta wydawnictwa jest stale poszerzana
				  i aktualizowana o najnowsze wytyczne MEN.
				  </p>
				  <p class="TXT3">
				  Zapraszamy do zapoznania si&#281; z nasz&#261; ofert&#261; na obecny rok szkolny.
				 </p>
				 <p class="TXT3">Z powa&#380;aniem <br>
				 <em>Zarz&#261;d Wydawnictwa AKSIM</em></p>
		</div>		
	</div>
	
	<div class="basketInfoDiv">
		<div class="emptyDiv1"></div>
		<table class="NewsHeader">
		<tbody>
			<tr>
				<td>NOWO&#346;&#262;</td>
			</tr>
		</tbody>
		</table>
		<div id="vortex" onclick="goToOferta()">
			<img class="imgClass" src="books_image/tr_slowka3.jpg"   width="100"  >
			<img class="imgClass" src="books_image/tr_slowka2.jpg" width="100" >
			<img class="imgClass" src="books_image/tr_slowka1.jpg" width="100" >
			<img class="imgClass" src="books_image/mat_to_lubie3.jpg" width="100" >
			<img class="imgClass" src="books_image/pl_to_lubie3.jpg"  width="100" >
			<img class="imgClass" src="books_image/zielona_3.jpg"  width="100" >
			<img class="imgClass" src="books_image/zielona_2.jpg"  width="100" >
			<img class="imgClass" src="books_image/zielona_1.jpg"  width="100" >
			<img class="imgClass" src="books_image/robaczki.jpg"  width="100" >
			<img class="imgClass" src="books_image/alfabet_0.jpg"  width="100" >
			
			<script>
			$(window).load(function() {
				$('#vortex').vortex({
					initialPosition: 270,
					speed: 150
				});
			});
			function goToOferta() {
				window.open("oferta.php","_self");
			}
			</script>
		
		</div>
	</div>
	
	
	<div class="basketInfoDiv">
	<?php
		$fd = fopen("footer.html", "r");
		$footer = fread($fd, filesize("footer.html"));
		fclose($fd);
		echo $footer;
	?>
	</div>


</body></html>