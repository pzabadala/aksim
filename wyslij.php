<?php
if (!nick || !mail || !temat || !tresc)
{     
echo "Nie uzupe�ni�e� wszystkich rubryk."; 
exit;  
} 

$wiadomosc = 
"Imie: ".$_POST['nick']." 

e- mail: ".$_POST['mail']." 

Tresc: ".$_POST['tresc']."  "; 

$tematyka = "WIADOMO�� ZE STRONY AKSIM.PL - ".$temat;


mail ("aksim@vp.pl", $tematyka, $wiadomosc ); 

echo "Dziekujemy za wyslanie do nas wiadomosci,";
echo "Temat: <strong>".$temat."</strong><ul />";
echo "Tw�j adres e-mail: <strong>".$mail."</strong><ul />";
echo "Tresc: <strong>".$tresc."</strong><ul />";
?>
