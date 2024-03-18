<?php
    $server = 'boxuxcribnh9vox3xhlg-mysql.services.clever-cloud.com'; // Aquí colocan la URL del servidor para accesar a él
    $username = 'u4lohwkmpqfgjm5j'; // Se necesita el usuario del servidor de MySQL
    $password = '6QaiBoLllLz1Gis9hmZO'; // Colocar la contraseña
    $database = 'boxuxcribnh9vox3xhlg'; // Elegir la base de datos que se requiere usar

	// Se utiliza un try catch para intentar la conexión y en caso de no establecerse nos regrese un mensaje de error y cierre la conexión
    try{
        $conn = new PDO("mysql:host=$server;dbname=$database;",$username, $password);
    } catch (PDOException $e) {
        
        die('Connection failed: '.$e->getMessage());
    }
?>