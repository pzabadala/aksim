<?php
if (!nick || !mail || !temat || !tresc)
{     
echo "Nie uzupe³ni³eœ wszystkich rubryk."; 
exit;  
} 

$wiadomosc = 
"Imie: ".$_POST['nick']." 

e- mail: ".$_POST['mail']." 

Tresc: ".$_POST['tresc']."  "; 

$tematyka = "WIADOMOŒÆ ZE STRONY AKSIM.PL - ".$temat;


mail ("aksim@vp.pl", $tematyka, $wiadomosc ); 

echo "Dziekujemy za wyslanie do nas wiadomosci,";
echo "Temat: <strong>".$temat."</strong><ul />";
echo "Twój adres e-mail: <strong>".$mail."</strong><ul />";
echo "Tresc: <strong>".$tresc."</strong><ul />";
?>
