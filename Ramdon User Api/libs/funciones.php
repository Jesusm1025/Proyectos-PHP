<?php 

function signo_zodiaco($fecha){ 

$zodiaco = ''; 
      
list ( $ano, $mes, $dia ) = explode ( "-", $fecha ); 
$ano=intval($ano);
$mes=intval($mes);
$dia=intval($dia);
if     ( ( $mes == 1 && $dia > 19 )  || ( $mes == 2 && $dia < 19 ) )  { $zodiaco = "Acuario"; }
elseif ( ( $mes == 2 && $dia > 18 )  || ( $mes == 3 && $dia < 21 ) )  { $zodiaco = "Piscis"; } 
elseif ( ( $mes == 3 && $dia > 20 )  || ( $mes == 4 && $dia < 20 ) )  { $zodiaco = "Aries"; } 
elseif ( ( $mes == 4 && $dia > 19 )  || ( $mes == 5 && $dia < 21 ) )  { $zodiaco = "Tauro"; } 
elseif ( ( $mes == 5 && $dia > 20 )  || ( $mes == 6 && $dia < 21 ) )  { $zodiaco = "Geminis"; } 
elseif ( ( $mes == 6 && $dia > 20 )  || ( $mes == 7 && $dia < 23 ) )  { $zodiaco = "Cancer"; } 
elseif ( ( $mes == 7 && $dia > 22 )  || ( $mes == 8 && $dia < 23 ) )  { $zodiaco = "Leo"; } 
elseif ( ( $mes == 8 && $dia > 22 )  || ( $mes == 9 && $dia < 23 ) )  { $zodiaco = "Virgo"; } 
elseif ( ( $mes == 9 && $dia > 22 )  || ( $mes == 10 && $dia < 23 ) ) { $zodiaco = "Libra"; } 
elseif ( ( $mes == 10 && $dia > 22 ) || ( $mes == 11 && $dia < 22 ) ) { $zodiaco = "Escorpio"; } 
elseif ( ( $mes == 11 && $dia > 21 ) || ( $mes == 12 && $dia < 22 ) ) { $zodiaco = "Sagitario"; } 
elseif ( ( $mes == 12 && $dia > 21 ) || ( $mes == 1 && $dia < 20 ) )  { $zodiaco = "Capricornio"; } 

return $zodiaco; 

}
