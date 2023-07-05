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

$cvs = fopen('CLIENTES.csv','r');

while(($row = fgetcsv($cvs,1000,",")) !== FALSE){
    echo 'cliente :'. $row[0].' nombre '. $row[1].'-'.$row[2].' - domicilio '.$row[3].'-'.$row[4].' - Cod Pos: '.$row[5]. '<br>';

    //$sql ="INSERT INTO clientes (cliente,nombre) values ('$row[0]','$row[1]' ) ";
    $nom = $row[1]."-".$row[2];
    $dom = $row[3]."-".$row[4];
    $tel = $row[8]."-".$row[9]."-".$row[10]."-".$row[11]."-".$row[12];
    $cto = $row[13]."-".$row[14]."-".$row[15]."-".$row[16]."-".$row[17];
    echo "Nombre: ".$nom."  Domicilio :".$dom."<br>";
    $sql ="insert into clientes (cliente,nombre,domicilio,codigopostal,localidad,pais,telefonos,contactos,comentarios) values ('$row[0]','$nom','$dom','$row[5]','$row[6]','$row[6]','$tel','$cto','$row[18]') ";
    
    
    //$sql = "INSERT INTO clientes (cliente,nombre,domicilio,codigopostal,localidad,pais,telefonos,contacto,comentario) VALUES (";
    //$sql.="$row[0],$row[1].'-'.$row[2],$row[3].'-'.$row[4],$row[5],$row[6],$row[7],$row[8].'-'.$row[9].'-'.$row[10].'-'.$row[11].'-'.$row[12],$row[13].'-'.$row[14],";
    //$sql.="$row[15].'-'.$row[16].'-'.$row[17],$row[18])";
    
    
    $resultado= mysqli_query($conn,$sql)or die("error al insertar: ".mysqli_error($conn));
    if ($resultado){
        echo "Todo bien";
    }else{
        echo "mal  ".$resultado;
    }

}
fclose($cvs);


?>