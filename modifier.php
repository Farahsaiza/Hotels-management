<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form{
            display: flex;
            flex-direction:column;
            background-color:beige;
            border: 0px ;
            border-radius:10px;
            width:600px;
        }
        input, label{
            width: 300px;
            margin-left:150px;
        }
        
    </style>
</head>
<body style="display:flex;align-items:center;justify-content:center;">
    <form action="" method="POST">
        <h1 align="center">Hotels:</h1>

        <!-- <label for="">Nom</label>
        <input type="text" name="nom"><br> <br>

        <label for="">Adresse</label>
        <input type="text" name="adresse"><br> <br>

        <label for="">Prix par nuit </label>
        <input type="text" name="prix"><br> <br>

        <label for="">Etoile </label>
        <input type="number" name="etoile"><br> <br>

        <label for="">Nombre de place </label>
        <input type="text" name="place">

        <input type="submit" value="ajouter" align="center" style="width:100px;height:30px;background-color:pink;border:0px;border-radius:15px;color:white;margin:30px;margin-left:250px"> -->

        <?php  
            $host='localhost';
            $dbname='hotels';
            $username='root';
            $passe='Farah@123';

            $connexion= new PDO("mysql:host=$host; dbname=$dbname",$username, $passe);

            $id= $_GET['id_hotel'];

            $requet  = $connexion ->query("select * from hotel where id_hotel=$id");
            $data= $requet-> fetchAll(PDO::FETCH_ASSOC);
            
            
        ?>
        <?php foreach ($data   as $x):?> 
        <label for="">Nom</label>
        <input type="text" name="nom" value="<?php echo $x['name']?>"><br> <br>

        <label for="">Adresse</label>
        <input type="text" name="adresse" value="<?php echo $x['adresse']?>"><br> <br>

        <label for="">Prix par nuit </label>
        <input type="text" name="prix" value="<?php echo $x['prix_par_nuit']?>"><br> <br>

        <label for="">Etoile </label>
        <input type="number" name="etoile"  value="<?php echo $x['nbre_etoile']?>"><br> <br>

        <label for="">Nombre de place </label>
        <input type="text" name="place"  value="<?php echo $x['nombre_de_place']?>">
        
        <input type="submit" name="modifi" value="modifier" align="center" style="width:100px;height:30px;background-color:pink;border:0px;border-radius:15px;color:white;margin:30px;margin-left:250px">
            
        <?php endforeach; ?>
                
                
        <?php
            if (isset($_POST['modifi'])) {
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

                $requet  = $connexion ->prepare('update hotel set name=?,adresse=?,prix_par_nuit=?,nbre_etoile=?,nombre_de_place=? where id_hotel=?;');
                $sup= $requet-> execute([$Name,$Adresse,$prix,$etoile,$place,$id]);
                header('location: hotels.php');
                
            }  

                

                
                


        ?>
    
    

    </form>
    
</body>
</html>
        
