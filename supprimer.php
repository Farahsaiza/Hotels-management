<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php  
        $host='localhost';
        $dbname='hotels';
        $username='root';
        $passe='Farah@123';

        $connexion= new PDO("mysql:host=$host; dbname=$dbname",$username, $passe);

        $id= $_GET['id_hotel'];

        $requet  = $connexion ->prepare('DELETE FROM hotel WHERE id_hotel=? ');
        $sup= $requet-> execute([$id]);
        header('location: hotels.php');
    
    ?> 
</body>
</html>