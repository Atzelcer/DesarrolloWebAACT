<?php
$con=mysqli_connect(hostname: "localhost",username: "root",password: "",database: "bd_hoyhoy");
if(mysqli_connect_errno()){
    echo "Error al conectarse con la base de datos";
    exit();
}else{
    echo "Conexión exitosa";
}
?>a