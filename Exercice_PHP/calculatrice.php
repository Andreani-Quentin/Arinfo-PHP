<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculatrice_Script</title>
</head>
<body>

    <div id="titre_principal">
        <h1>Calculatrice</h1>
    </div>
    <div style="text-align:center;">

        <form name="formulaire" method="post" action="calculatrice.php">

            <p>Nombre 1 :<input name="nombre1" type="text" ></p>
            <p>Nombre 2 :<input name="nombre2" type="text" ></p>

            <select name="choix">
                <option value="addition">+</option>
                <option value="soustraction">-</option>
                <option value="division">/</option>
                <option value="multiplication">*</option>
            </select>

            <input type="submit" value="Calculer">
            <input type="reset" value="Effacer"><br>

        </form>
    </div>
    <div style="text-align: center; margin-top: 30px;">
    <?php
        if(isset($_POST['nombre1']) && isset($_POST['choix']) && isset($_POST['nombre2']))
        {
            
            $nombre1 = $_POST['nombre1'];
            $choix = $_POST['choix'];
            $nombre2 = $_POST['nombre2'];

            if($nombre1 != NULL && $nombre2 != NULL)
            {
                if($choix == 'division' && $nombre2 == 0)
                {
                    echo 'On peut pas diviser par 0 zebi';
                }
                else
                {  
                    if($choix == 'addition')
                    {
                        $resultat = $nombre1 + $nombre2;
                        echo 'La somme de ces deux nombres est '.$resultat;
                    }

                    if($choix == 'soustraction')
                    {
                        $resultat = $nombre1 - $nombre2;
                        echo 'La différence de ces deux nombres est '.$resultat;
                    }
                }

                if($choix == 'multiplication')
                {  
                    $resultat = $nombre1 * $nombre2;
                    echo 'Le produit de ces deux nombres est '.$resultat;
                }

                if($choix == 'division')
                {
                    $resultat = $nombre1 / $nombre2;
                    echo 'Le quotient de ces deux nombres est '.$resultat;
                }
            }
        }
        else
        {
            echo 'Veuillez renseigner tous les champs.';
        }
    ?>
    </div>

</body>
</html>