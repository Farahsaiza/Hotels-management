<?php
        $Name=$_POST['nom'];
        $Adresse=$_POST['adresse'];
        $prix=$_POST['prix'];
        $etoile=$_POST['etoile'];
        $place=$_POST['place'];

        // databaseconexxion

        $host='localhost';
        $dbname='hotels';
        $username='root';
        $passe='Farah@123';

        $connexion= new PDO("mysql:host=$host; dbname=$dbname",$username, $passe);

        $requet  = $connexion ->prepare('INSERT INTO hotel VALUES (Null,?,?,?,?,?);');
        $sup= $requet-> execute([$Name,$Adresse,$prix,$etoile,$place]);
        header('location: hotels.php');
        

?>
    
    


