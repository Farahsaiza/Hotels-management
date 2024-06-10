<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        <style>
        table{
            border: 1px solid grey;
            

            
        }
   
        td{
            border-bottom: 1px solid grey;
            width: 150px;
            text-align: center;
            padding: 10px;
        }
        .head{
            font-weight: bold;
            border-bottom: 2px black solid;
        }
        span{
            color: white;
            font-weight: 300;
            width: 30px;
            padding:5px 20px 5px 20px;
            height: 15px;
            border-radius: 15px;
        }
        button{
            color: white;
            width: 80px;
            height: 30px;
            border: 0px;
            border-radius: 13px;
            margin-right:3px;
        }
        .btn1{
            background-color:purple;
        }
        .btn2{
            background-color:pink;
        }
        a{
            color:white;
            text-decoration:none;
        }
        .btn{
            float:right;
            border-radius: 0px;
            background-color:green;
        }
       
       
    </style>
    </style>
</head>
<body style="background-color:beige; ">
    <button class="btn" ><a href="ajoutter.html">Ajouter</a></button>
    <table cellspacing="0" style="padding-top:30px" >
        <tr >
            <td class="head">Hotel</td>
            <td class="head">Numero</td>
            <td class="head">Adresse</td>
            <td class="head">Prix par nuit</td>
            <td class="head"  >Etoile</td>
            <td class="head">Nombre de place</td>
            <td class="head">operation</td>
        </tr>
    <?php  
        $host='localhost';
        $dbname='hotels';
        $username='root';
        $passe='Farah@123';

        $connexion= new PDO("mysql:host=$host; dbname=$dbname",$username, $passe);

        $requet  = $connexion ->query("select * from hotel;");

        $data= $requet-> fetchAll(PDO::FETCH_ASSOC);
    
    ?> 
     <?php foreach ($data   as $x):?>
        <tr>
            <td><?php echo $x['id_hotel']?></td>
            <td><?php echo $x['name']?></td>
            <td><?php echo $x['adresse']?></td>
            <td><?php echo $x['prix_par_nuit']?></td>
            <td><span  >
                    <?php 
                        $b=$x['nbre_etoile'];                        
                        
                        if ($b<3){
                            
                            echo "<span style='background-color:red;'>$b</span>";
                        }if ($b<5 and $b>=3){
                            echo "<span style='background-color:yellow;'>$b</span>";

                        }if($b>=5) {
                            echo "<span style='background-color:green;'>$b</span>";

                        }
                    ?>
                </span>
            </td>
            <td><?php echo $x['nombre_de_place']?></td>
            <td style="display:flex; flex-direction:row;">
                <button class='btn1'><a href="modifier.php?id_hotel=<?php echo $x['id_hotel']?>">Modifier</a></button>
                <button class='btn2'><a href="supprimer.php?id_hotel=<?php echo $x['id_hotel']?> ">supprimer</a></button>
            </td>

           

        </tr>
        <?php endforeach; ?>

        </table>
  

</body>
</html>