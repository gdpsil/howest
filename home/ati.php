<?php

// ----------------------------------------------------------------
// pasar info de clientes cvs a la base clientes
// ----------------------------------------------------------------

// conexión
$conn = mysqli_connect('localhost','root','t7jm33p','howest');
if(mysqli_connect_error()){
    die('Error connecting '.mysqli_connect_error() );
    exit();
}
echo "Conectado Correctamente <br>";

//echo '$_SERVER[PHP_SELF]: ' . $_SERVER['PHP_SELF'] . '<br />';
//echo 'Dirname($_SERVER[PHP_SELF]: ' . dirname($_SERVER['PHP_SELF']) . '<br>';

$directorio= dirname(__FILE__);
//echo "basename  : ".$directorio."<br>";

$cvs = fopen('ti_3.csv','r');

while(($row = fgetcsv($cvs,1000,",")) !== FALSE){

    $cadenafecha = substr($row[7],6,4).'/'.substr($row[7],3,2).'/'.substr($row[7],0,2); 

    //echo "Fecha es: ".$row[7]."  - Fecha cambiada: ".$cadenafecha." - nuevo formato: ".$fechacadena."<br>";
    echo 'cli :'. $row[0].' ot: '. $row[1].'- oc: '.$row[2].' - fecha: '.$row[7].' - strtotime: '.$cadenafecha.'   - NewDate: '. '<br>';
    //.$fechacadena.' Final: '.$fechafinal2. '<br>';


    if(empty($row[8])){
        $nuser=0;
    }else{
        $nuser=$row[8];
    }
//    $nom = $row[1]."-".$row[2];
//    $dom = $row[3]."-".$row[4];
//    $tel = $row[8]."-".$row[9]."-".$row[10]."-".$row[11]."-".$row[12];
//    $cto = $row[13]."-".$row[14]."-".$row[15]."-".$row[16]."-".$row[17];
//    echo "Nombre: ".$nom."  Domicilio :".$dom."<br>";

$r2 = preg_replace('([^A-Za-z0-9 !])', '', $row[2]);
$r3 = preg_replace('([^A-Za-z0-9 !])', '', $row[3]);
$r4 = preg_replace('([^A-Za-z0-9 !])', '', $row[4]);
$r5 = preg_replace('([^A-Za-z0-9 !])', '', $row[5]);
$r6 = preg_replace('([^A-Za-z0-9 !])', '', $row[6]);
    
$sql ="insert into ot (cliente,ot,oc,embalaje1,entrega1,entrega2,observaciones,fecha,nu_ser) values ('$row[0]','$row[1]','$row[2]','$r3','$r4','$r5','$r6','$cadenafecha','$nuser') ";    
$resultado= mysqli_query($conn,$sql)or die("error al insertar: ".mysqli_error($conn));


/*if ($resultado){
        echo "Todo bien";
    }else{
        echo "mal  ".$resultado;
    }*/

}
fclose($cvs);


?>