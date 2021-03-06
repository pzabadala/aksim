﻿<?php 
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
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head><meta content="text/html; charset=UTF-8" http-equiv="content-type"><title>Aksim.pl - oferta</title>
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
	<div class="emptyDiv1"></div>
	<table class="basketTableMainHeader">
	<tbody>
		<tr>
		  <td>OFERTA</td>
		</tr>
	</tbody>
	</table>
	<div class="emptyDiv1"></div>
	
	<table class="basketTableHeader">
	<tbody>
		<tr>
		  <td>PRZEDSZKOLE</td>
		</tr>
	</tbody>
	</table>
	
	<div class="emptyDiv1"> </div>
	
	<table>
			<tr >
			<td width="50%"  height="470px">
					<div class="basketTableBook">
						<div class="basketTableBookImage">
							<img class="imgClass" src="books_image/przed_szlaczki.jpg" width="150" height="214">
							<br>
							<div class="BASKET">Cena: 17 z&#322;</div>
							<form action="koszyk.php" method="POST"> 
								<span class="BASKET">Ilo&#347;&#263;: </span>
								<input type="text" name="books_amount"  value="1" maxlength="2" size="1"/>
								<input type="hidden" name="book_id" value="23"/>
								<input type="hidden" name="action" value="add"/>
								<input type="submit" action='koszyk.php' value="zam&oacute;w"/></a> 
							</form>
						</div>
						<div class="basketTableBookText">
							<div class="bookTitle">SZLACZKI PRZEDSZKOLAKA</div>
							<div class="bookDesc">
								<?php
									$fd = fopen("book_desc/book_23.html", "r");
									$desc = fread($fd, filesize("book_desc/book_23.html"));
									fclose($fd);
									echo $desc;
								?>
							</div>
						</div>
					</div>	
			</td>
			<td width="50%"  height="470px">
					<div class="basketTableBook">
						<div class="basketTableBookImage">
							<img class="imgClass" src="books_image/robaczki.jpg" width="150" height="214">
							<br>
							
							<div class="BASKET">Cena: 17 z&#322;</div>
							<form action="koszyk.php" method="POST"> 
								<span class="BASKET">Ilo&#347;&#263;: </span>
								<input type="text" name="books_amount"  value="1" maxlength="2" size="1"/>
								<input type="hidden" name="book_id" value="31"/>
								<input type="hidden" name="action" value="add"/>
								<input type="submit" action='koszyk.php' value="zam&oacute;w"/></a> 
							</form>
						</div>
						<div class="basketTableBookText">
							<div class="bookTitle">Robaczki rysują szlaczki</div>
							<div class="bookDesc">
								<?php
									$fd = fopen("book_desc/book_31.html", "r");
									$desc = fread($fd, filesize("book_desc/book_31.html"));
									fclose($fd);
									echo $desc;
								?>
							</div>
						</div>
					</div>	
			</td>
		</tr>
	
		<tr height="100%">
			<td width="50%"  height="470px" >
			</td>
			
			<td width="50%"  height="470px">
					<div class="basketTableBook">
						<div class="basketTableBookImage">
							<img class="imgClass" src="books_image/cwiczenia_przedszkolaka.jpg" width="150" height="214">
							<br>
							<div class="BASKET">Cena: 17 z&#322;</div>
							<form action="koszyk.php" method="POST"> 
								<span class="BASKET">Ilo&#347;&#263;: </span>
								<input type="text" name="books_amount"  value="1" maxlength="2" size="1"/>
								<input type="hidden" name="book_id" value="25"/>
								<input type="hidden" name="action" value="add"/>
								<input type="submit" action='koszyk.php' value="zam&oacute;w"/></a> 
							</form>
						</div>
						<div class="basketTableBookText">
							<div class="bookTitle">ĆWICZENIA PRZEDSZKOLAKA</div>
							<div class="bookDesc">
								<?php
									$fd = fopen("book_desc/book_25.html", "r");
									$desc = fread($fd, filesize("book_desc/book_25.html"));
									fclose($fd);
									echo $desc;
								?>
							</div>
						</div>
					</div>	
			</td>
			
		</tr>
	</table>
	
	<table class="basketTableHeader">
	<tbody>
		<tr>
		  <td>ZERÓWKA</td>
		</tr>
	</tbody>
	</table>
	
	<table>
		
		<tr>
			<td width="50%"  height="500px">
					<div class="basketTableBook">
						<div class="basketTableBookImage">
							<img class="imgClass" src="books_image/mat_lubie_0.jpg" width="150" height="214">
							<br>
							
							<div class="BASKET">Cena: 17 z&#322;</div>
							<form action="koszyk.php" method="POST"> 
								<span class="BASKET">Ilo&#347;&#263;: </span>
								<input type="text" name="books_amount"  value="1" maxlength="2" size="1"/>
								<input type="hidden" name="book_id" value="5"/>
								<input type="hidden" name="action" value="add"/>
								<input type="submit" action='koszyk.php' value="zam&oacute;w"/></a> 
							</form>
						</div>
						<div class="basketTableBookText">
							<div class="bookTitle">MATEMATYKA? </br>TO LUBIĘ! <br>KL. "0"</div>
							<div class="bookDesc">
							<?php
									$fd = fopen("book_desc/book_5.html", "r");
									$desc = fread($fd, filesize("book_desc/book_5.html"));
									fclose($fd);
									echo $desc;
								?>
							</div>
						</div>
					</div>	
			</td>
			
			<td width="50%"  height="500px">
					<div class="basketTableBook">
						<div class="basketTableBookImage">
							<img class="imgClass" src="books_image/pol_lubie_0.jpg" width="150" height="214">
							<br>
							
							<div class="BASKET">Cena: 17 z&#322;</div>
							<form action="koszyk.php" method="POST"> 
								<span class="BASKET">Ilo&#347;&#263;: </span>
								<input type="text" name="books_amount"  value="1" maxlength="2" size="1"/>
								<input type="hidden" name="book_id" value="6"/>
								<input type="hidden" name="action" value="add"/>
								<input type="submit" action='koszyk.php' value="zam&oacute;w"/></a> 
							</form>
						</div>
						<div class="basketTableBookText">
							<div class="bookTitle">POLSKI? <br> TO LUBIĘ! </br>KL. "0"</div>
							<div class="bookDesc">
								<?php
									$fd = fopen("book_desc/book_6.html", "r");
									$desc = fread($fd, filesize("book_desc/book_6.html"));
									fclose($fd);
									echo $desc;
								?>
								</div>
						</div>
					</div>	
			</td>
			
		</tr>
		<tr>
			<td width="50%"  height="300px">
					<div class="basketTableBook">
						<div class="basketTableBookImage">
							<img class="imgClass" src="books_image/alfabet_0.jpg" width="150" height="214">
							<br>
							<div class="NEW_BOOK">NOWOŚĆ</div>
							<div class="BASKET">Cena: 17 z&#322;</div>
							<form action="koszyk.php" method="POST"> 
								<span class="BASKET">Ilo&#347;&#263;: </span>
								<input type="text" name="books_amount"  value="1" maxlength="2" size="1"/>
								<input type="hidden" name="book_id" value="7"/>
								<input type="hidden" name="action" value="add"/>
								<input type="submit" action='koszyk.php' value="zam&oacute;w"/></a> 
							</form>
						</div>
						<div class="basketTableBookText">
							<div class="bookTitle">Alfabet Młodego Przyrodnika</div>
							<div class="bookDesc">
							<?php
									$fd = fopen("book_desc/book_7.html", "r");
									$desc = fread($fd, filesize("book_desc/book_7.html"));
									fclose($fd);
									echo $desc;
								?>
							</div>
						</div>
					</div>	
			</td>
			
			<td width="50%"  height="300px">
					<!-- 
					<div class="basketTableBook">
						<div class="basketTableBookImage">
							<img class="imgClass" src="books_image/brak.jpg" width="150" height="214"> 
							<br>
							
							<div class="BASKET">Cena: 17 z&#322;</div>
							<form action="koszyk.php" method="POST"> 
								<span class="BASKET">Ilo&#347;&#263;: </span>
								<input type="text" name="books_amount"  value="1" maxlength="2" size="1"/>
								<input type="hidden" name="book_id" value="8"/>
								<input type="hidden" name="action" value="add"/>
								<input type="submit" action='koszyk.php' value="zam&oacute;w"/></a> 
							</form>
						</div>
						<div class="basketTableBookText">
							<div class="bookTitle">W MAGICZNYM ŚWIECIE LICZB I LITEREK</div>
							<div class="bookDesc">
								<?php
									//$fd = fopen("book_desc/book_8.html", "r");
									//$desc = fread($fd, filesize("book_desc/book_8.html"));
									//fclose($fd);
									//echo $desc;
								?>
							</div>
						</div>
					</div>	
					-->
			</td>
			
		</tr>
	</table>
	
	<table class="basketTableHeader">
	<tbody>
		<tr>
		  <td>KLASA 1</td>
		</tr>
	</tbody>
	</table>
	
	<table width="100%">
		<tr  height="100%">
			<td width="50%"  height="500px">
					<div class="basketTableBook">
						<div class="basketTableBookImage">
							<img class="imgClass" src="books_image/mat_lubie_1.jpg" width="150" height="214">
							<br>
							
							<div class="BASKET">Cena: 17 z&#322;</div>
							<form action="koszyk.php" method="POST"> 
								<span class="BASKET">Ilo&#347;&#263;: </span>
								<input type="text" name="books_amount"  value="1" maxlength="2" size="1"/>
								<input type="hidden" name="book_id" value="11"/>
								<input type="hidden" name="action" value="add"/>
								<input type="submit" action='koszyk.php' value="zam&oacute;w"/></a> 
							</form>
						</div>
						<div class="basketTableBookText">
							<div class="bookTitle">MATEMATYKA? </br>TO LUBIĘ! <br>KL. "1"</div>
							<div class="bookDesc">
								<?php
									$fd = fopen("book_desc/book_11.html", "r");
									$desc = fread($fd, filesize("book_desc/book_11.html"));
									fclose($fd);
									echo $desc;
								?>
							</div>
						</div>
					</div>	
			</td>
			
			<td width="50%"  height="500px">
					<div class="basketTableBook">
						<div class="basketTableBookImage">
							<img class="imgClass" src="books_image/pol_lubie_1.jpg" width="150" height="214">
							<br>
							
							<div class="BASKET">Cena: 17 z&#322;</div>
							<form action="koszyk.php" method="POST"> 
								<span class="BASKET">Ilo&#347;&#263;: </span>
								<input type="text" name="books_amount"  value="1" maxlength="2" size="1"/>
								<input type="hidden" name="book_id" value="12"/>
								<input type="hidden" name="action" value="add"/>
								<input type="submit" action='koszyk.php' value="zam&oacute;w"/></a> 
							</form>
						</div>
						<div class="basketTableBookText">
							<div class="bookTitle">POLSKI? <br> TO LUBIĘ! </br>KL. "1"</div>
							<div class="bookDesc">
								<?php
									$fd = fopen("book_desc/book_12.html", "r");
									$desc = fread($fd, filesize("book_desc/book_12.html"));
									fclose($fd);
									echo $desc;
								?>
							</div>
						</div>
					</div>	
			</td>
		</tr>
		<tr  height="100%">
			<td width="50%"  height="400px">
					<div class="basketTableBook">
						<div class="basketTableBookImage">
							<img class="imgClass" src="books_image/spr_umiesz_1_wyd_2.jpg" width="150" height="214">
							<br>
							
							<div class="BASKET">Cena: 17 z&#322;</div>
							<form action="koszyk.php" method="POST"> 
								<span class="BASKET">Ilo&#347;&#263;: </span>
								<input type="text" name="books_amount"  value="1" maxlength="2" size="1"/>
								<input type="hidden" name="book_id" value="24"/>
								<input type="hidden" name="action" value="add"/>
								<input type="submit" action='koszyk.php' value="zam&oacute;w"/></a> 
							</form>
						</div>
						<div class="basketTableBookText">
							<div class="bookTitle">SPRAWDŹ CZY UMIESZ KL."1"</div>
							<div class="bookTitleSmall">Testy z odpowiedziami</div>
							<div class="bookDesc">
								<?php
									$fd = fopen("book_desc/book_24.html", "r");
									$desc = fread($fd, filesize("book_desc/book_24.html"));
									fclose($fd);
									echo $desc;
								?>
							</div>
						</div>
					</div>	
			</td>
			<td width="50%"  height="400px">
					<div class="basketTableBook">
						<div class="basketTableBookImage">
							<img class="imgClass" src="books_image/tr_slowka1.jpg" width="150" height="214">
							<br>
							<div class="NEW_BOOK">NOWOŚĆ</div>
							<div class="BASKET">Cena: 17 z&#322;</div>
							<form action="koszyk.php" method="POST"> 
								<span class="BASKET">Ilo&#347;&#263;: </span>
								<input type="text" name="books_amount"  value="1" maxlength="2" size="1"/>
								<input type="hidden" name="book_id" value="28"/>
								<input type="hidden" name="action" value="add"/>
								<input type="submit" action='koszyk.php' value="zam&oacute;w"/></a> 
							</form>
						</div>
						<div class="basketTableBookText">
							<div class="bookTitle">Trudne słówka KL."1"</div>
							<div class="bookDesc">
								<?php
									$fd = fopen("book_desc/book_28.html", "r");
									$desc = fread($fd, filesize("book_desc/book_28.html"));
									fclose($fd);
									echo $desc;
								?>
							</div>
						</div>
					</div>	
			</td>
			
			<td width="50%"  height="400px">
					
			</td>
		</tr>
		
		<tr  height="100%">
			<td width="50%"  height="400px">
					<div class="basketTableBook">
						<div class="basketTableBookImage">
							<img class="imgClass" src="books_image/zielona_1.jpg" width="150" height="214">
							<br>
							<div class="NEW_BOOK">NOWOŚĆ</div>
							<div class="BASKET">Cena: 17 z&#322;</div>
							<form action="koszyk.php" method="POST"> 
								<span class="BASKET">Ilo&#347;&#263;: </span>
								<input type="text" name="books_amount"  value="1" maxlength="2" size="1"/>
								<input type="hidden" name="book_id" value="10"/>
								<input type="hidden" name="action" value="add"/>
								<input type="submit" action='koszyk.php' value="zam&oacute;w"/></a> 
							</form>
						</div>
						<div class="basketTableBookText">
							<div class="bookTitle">ZIELONA PODRÓŻ KL."1"</div>
							<div class="bookDesc">
								<?php
									$fd = fopen("book_desc/book_10.html", "r");
									$desc = fread($fd, filesize("book_desc/book_10.html"));
									fclose($fd);
									echo $desc;
								?>
							</div>
						</div>
					</div>	
			</td>
			<td width="50%"  height="400px">	
			</td>
		</tr>
		
	</table>
		
	<table class="basketTableHeader">
	<tbody>
		<tr>
		  <td>KLASA 2</td>
		</tr>
	</tbody>
	</table>
	
	<table width="100%">
		<tr height="100%">
			<td width="50%"  height="550px">
					<div class="basketTableBook">
						<div class="basketTableBookImage">
							<img class="imgClass" src="books_image/mat_lubie_2.jpg" width="150" height="214">
							<br>
							
							<div class="BASKET">Cena: 17 z&#322;</div>
							<form action="koszyk.php" method="POST"> 
								<span class="BASKET">Ilo&#347;&#263;: </span>
								<input type="text" name="books_amount"  value="1" maxlength="2" size="1"/>
								<input type="hidden" name="book_id" value="16"/>
								<input type="hidden" name="action" value="add"/>
								<input type="submit" action='koszyk.php' value="zam&oacute;w"/></a> 
							</form>
						</div>
						<div class="basketTableBookText">
							<div class="bookTitle">MATEMATYKA? </br>TO LUBIĘ! <br>KL. "2"</div>
							<div class="bookDesc">
								<?php
									$fd = fopen("book_desc/book_16.html", "r");
									$desc = fread($fd, filesize("book_desc/book_16.html"));
									fclose($fd);
									echo $desc;
								?>
							</div>
						</div>
					</div>	
			</td>
			
			<td width="50%"  height="550px">
					<div class="basketTableBook">
						<div class="basketTableBookImage">
							<img class="imgClass" src="books_image/pol_lubie_2.jpg" width="150" height="214">
							<br>
							
							<div class="BASKET">Cena: 17 z&#322;</div>
							<form action="koszyk.php" method="POST"> 
								<span class="BASKET">Ilo&#347;&#263;: </span>
								<input type="text" name="books_amount"  value="1" maxlength="2" size="1"/>
								<input type="hidden" name="book_id" value="17"/>
								<input type="hidden" name="action" value="add"/>
								<input type="submit" action='koszyk.php' value="zam&oacute;w"/></a> 
							</form>
						</div>
						<div class="basketTableBookText">
							<div class="bookTitle">POLSKI? <br> TO LUBIĘ! </br>KL. "2"</div>
							<div class="bookDesc">
								<?php
									$fd = fopen("book_desc/book_17.html", "r");
									$desc = fread($fd, filesize("book_desc/book_17.html"));
									fclose($fd);
									echo $desc;
								?>
							</div>
						</div>
					</div>	
			</td>
		</tr>
		<tr  height="100%">
			<td width="50%"  height="400px">
					<div class="basketTableBook">
						<div class="basketTableBookImage">
							<img class="imgClass" src="books_image/spr_umiesz_2.gif" width="150" height="214">
							<br>
							
							<div class="BASKET">Cena: 17 z&#322;</div>
							<form action="koszyk.php" method="POST"> 
								<span class="BASKET">Ilo&#347;&#263;: </span>
								<input type="text" name="books_amount"  value="1" maxlength="2" size="1"/>
								<input type="hidden" name="book_id" value="18"/>
								<input type="hidden" name="action" value="add"/>
								<input type="submit" action='koszyk.php' value="zam&oacute;w"/></a> 
							</form>
						</div>
						<div class="basketTableBookText">
							<div class="bookTitle">SPRAWDŹ CZY UMIESZ KL."2"</div>
							<div class="bookTitleSmall">Testy z odpowiedziami</div>
							<div class="bookDesc">
								<?php
									$fd = fopen("book_desc/book_18.html", "r");
									$desc = fread($fd, filesize("book_desc/book_18.html"));
									fclose($fd);
									echo $desc;
								?>
							</div>
						</div>
					</div>	
			</td>
			
			<td width="50%"  height="400px">
				<div class="basketTableBook">
						<div class="basketTableBookImage">
							<img class="imgClass" src="books_image/tr_slowka2.jpg" width="150" height="214">
							<br>
							<div class="NEW_BOOK">NOWOŚĆ</div>
							<div class="BASKET">Cena: 17 z&#322;</div>
							<form action="koszyk.php" method="POST"> 
								<span class="BASKET">Ilo&#347;&#263;: </span>
								<input type="text" name="books_amount"  value="1" maxlength="2" size="1"/>
								<input type="hidden" name="book_id" value="29"/>
								<input type="hidden" name="action" value="add"/>
								<input type="submit" action='koszyk.php' value="zam&oacute;w"/></a> 
							</form>
						</div>
						<div class="basketTableBookText">
							<div class="bookTitle">Trudne słówka KL."2"</div>
							<div class="bookDesc">
								<?php
									$fd = fopen("book_desc/book_29.html", "r");
									$desc = fread($fd, filesize("book_desc/book_29.html"));
									fclose($fd);
									echo $desc;
								?>
							</div>
						</div>
					</div>		
			</td>
		</tr>
		<tr  height="100%">
			<td width="50%"  height="400px">
					<div class="basketTableBook">
						<div class="basketTableBookImage">
							<img class="imgClass" src="books_image/zielona_2.jpg" width="150" height="214">
							<br>
							<div class="NEW_BOOK">NOWOŚĆ</div>
							<div class="BASKET">Cena: 17 z&#322;</div>
							<form action="koszyk.php" method="POST"> 
								<span class="BASKET">Ilo&#347;&#263;: </span>
								<input type="text" name="books_amount"  value="1" maxlength="2" size="1"/>
								<input type="hidden" name="book_id" value="14"/>
								<input type="hidden" name="action" value="add"/>
								<input type="submit" action='koszyk.php' value="zam&oacute;w"/></a> 
							</form>
						</div>
						<div class="basketTableBookText">
							<div class="bookTitle">ZIELONA PODRÓŻ KL."2"</div>
							<div class="bookDesc">
								<?php
									$fd = fopen("book_desc/book_14.html", "r");
									$desc = fread($fd, filesize("book_desc/book_14.html"));
									fclose($fd);
									echo $desc;
								?>
							</div>
						</div>
					</div>	
			</td>
			<td width="50%"  height="400px">	
			</td>
		</tr>
	</table>
	
	<table class="basketTableHeader">
	<tbody>
		<tr>
		  <td>KLASA 3</td>
		</tr>
	</tbody>
	</table>
		<table width="100%">
		<tr  height="100%">
			<td width="50%"  height="450px">
				<div class="basketTableBook">
						<div class="basketTableBookImage">
							<img class="imgClass" src="books_image/mat_to_lubie3.jpg" width="150" height="213">
							<br>
							<div class="NEW_BOOK">NOWOŚĆ</div>
							<div class="BASKET">Cena: 17 z&#322;</div>
							<form action="koszyk.php" method="POST"> 
								<span class="BASKET">Ilo&#347;&#263;: </span>
								<input type="text" name="books_amount"  value="1" maxlength="2" size="1"/>
								<input type="hidden" name="book_id" value="26"/>
								<input type="hidden" name="action" value="add"/>
								<input type="submit" action='koszyk.php' value="zam&oacute;w"/></a> 
							</form>
						</div>
						<div class="basketTableBookText">
							<div class="bookTitle">Matematyka? To Lubię! KL."3"</div>
							<div class="bookDesc">
								<?php
									$fd = fopen("book_desc/book_26.html", "r");
									$desc = fread($fd, filesize("book_desc/book_26.html"));
									fclose($fd);
									echo $desc;
								?>
							</div>
						</div>
					</div>	
			</td>
			
			<td width="50%"  height="450px">
					<div class="basketTableBook">
						<div class="basketTableBookImage">
							<img class="imgClass" src="books_image/pl_to_lubie3.jpg" width="150" height="214">
							<br>
							<div class="BASKET">Cena: 17 z&#322;</div>
							<form action="koszyk.php" method="POST"> 
								<span class="BASKET">Ilo&#347;&#263;: </span>
								<input type="text" name="books_amount"  value="1" maxlength="2" size="1"/>
								<input type="hidden" name="book_id" value="27"/>
								<input type="hidden" name="action" value="add"/>
								<input type="submit" action='koszyk.php' value="zam&oacute;w"/></a> 
							</form>
						</div>
						<div class="basketTableBookText">
							<div class="bookTitle">Polski? To Lubię! KL."3"</div>
							<div class="bookDesc">
								<?php
									$fd = fopen("book_desc/book_27.html", "r");
									$desc = fread($fd, filesize("book_desc/book_27.html"));
									fclose($fd);
									echo $desc;
								?>
							</div>
						</div>
					</div>	
			</td>	
		</tr>
		
		<tr  height="100%">
			<td width="50%"  height="450px">
					<div class="basketTableBook">
						<div class="basketTableBookImage">
							<img class="imgClass" src="books_image/spr_umiesz_3.gif" width="150" height="214">
							<br>
							<div class="BASKET">Cena: 17 z&#322;</div>
							<form action="koszyk.php" method="POST"> 
								<span class="BASKET">Ilo&#347;&#263;: </span>
								<input type="text" name="books_amount"  value="1" maxlength="2" size="1"/>
								<input type="hidden" name="book_id" value="21"/>
								<input type="hidden" name="action" value="add"/>
								<input type="submit" action='koszyk.php' value="zam&oacute;w"/></a> 
							</form>
						</div>
						<div class="basketTableBookText">
							<div class="bookTitle">SPRAWDŹ CZY UMIESZ KL."3"</div>
							<div class="bookTitleSmall">Testy z odpowiedziami</div>
							<div class="bookDesc">
								<?php
									$fd = fopen("book_desc/book_21.html", "r");
									$desc = fread($fd, filesize("book_desc/book_21.html"));
									fclose($fd);
									echo $desc;
								?>
							</div>
						</div>
					</div>	
			</td>
			
			
			
			<td width="50%"  height="450px">
				<div class="basketTableBook">
						<div class="basketTableBookImage">
							<img class="imgClass" src="books_image/tr_slowka3.jpg" width="150" height="214">
							<br>
							<div class="NEW_BOOK">NOWOŚĆ</div>
							<div class="BASKET">Cena: 17 z&#322;</div>
							<form action="koszyk.php" method="POST"> 
								<span class="BASKET">Ilo&#347;&#263;: </span>
								<input type="text" name="books_amount"  value="1" maxlength="2" size="1"/>
								<input type="hidden" name="book_id" value="30"/>
								<input type="hidden" name="action" value="add"/>
								<input type="submit" action='koszyk.php' value="zam&oacute;w"/></a> 
							</form>
						</div>
						<div class="basketTableBookText">
							<div class="bookTitle">Trudne słówka KL."3"</div>
							<div class="bookDesc">
								<?php
									$fd = fopen("book_desc/book_30.html", "r");
									$desc = fread($fd, filesize("book_desc/book_30.html"));
									fclose($fd);
									echo $desc;
								?>
							</div>
						</div>
					</div>	
			</td>
		</tr>
		
		<tr  height="100%">
			<td width="50%"  height="450px">
					<div class="basketTableBook">
						<div class="basketTableBookImage">
							<img class="imgClass" src="books_image/zielona_3.jpg" width="150" height="214">
							<br>
							<div class="NEW_BOOK">NOWOŚĆ</div>
							<div class="BASKET">Cena: 17 z&#322;</div>
							<form action="koszyk.php" method="POST"> 
								<span class="BASKET">Ilo&#347;&#263;: </span>
								<input type="text" name="books_amount"  value="1" maxlength="2" size="1"/>
								<input type="hidden" name="book_id" value="9"/>
								<input type="hidden" name="action" value="add"/>
								<input type="submit" action='koszyk.php' value="zam&oacute;w"/></a> 
							</form>
						</div>
						<div class="basketTableBookText">
							<div class="bookTitle">ZIELONA PODRÓŻ KL."3"</div>
							<div class="bookDesc">
								<?php
									$fd = fopen("book_desc/book_9.html", "r");
									$desc = fread($fd, filesize("book_desc/book_9.html"));
									fclose($fd);
									echo $desc;
								?>
							</div>
						</div>
					</div>	
			</td>
			<td width="50%"  height="400px">	
			</td>
		</tr>
	</table>
	
	<table class="basketTableHeader">
	<tbody>
		<tr>
		  <td>KLASA 4</td>
		</tr>
	</tbody>
	</table>
	
	<table width="100%">
		<tr  height="100%">
			<td width="50%"  height="350px">
					<div class="basketTableBook">
						<div class="basketTableBookImage">
							<img class="imgClass" src="books_image/sw_licz_4.jpg" width="150" height="214">
							<br>
							
							<div class="BASKET">Cena: 17 z&#322;</div>
							<form action="koszyk.php" method="POST"> 
								<span class="BASKET">Ilo&#347;&#263;: </span>
								<input type="text" name="books_amount"  value="1" maxlength="2" size="1"/>
								<input type="hidden" name="book_id" value="22"/>
								<input type="hidden" name="action" value="add"/>
								<input type="submit" action='koszyk.php' value="zam&oacute;w"/></a> 
							</form>
						</div>
						<div class="basketTableBookText">
							<div class="bookTitle">ŚWIAT LICZB KL."4"</div>
							<div class="bookDesc">
								<?php
									$fd = fopen("book_desc/book_22.html", "r");
									$desc = fread($fd, filesize("book_desc/book_22.html"));
									fclose($fd);
									echo $desc;
								?>
							</div>
						</div>
					</div>
			</td>
			
			<td width="50%"  height="350px">	
			</td>
		</tr>
	</table>

	<?php
		$fd = fopen("footer.html", "r");
		$footer = fread($fd, filesize("footer.html"));
		fclose($fd);
		echo $footer;
	?>

	
</div>
<p>&nbsp;</p>
</body></html>