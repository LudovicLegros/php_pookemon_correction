<?php
include('Pokemon.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>

<body>
    <?php


    //CREATION DE MES POKEMONS
    $pikachu    = new Pokemon("Pikachu", "Foudre", 20, 35);
    $carapuce   = new Pokemon("Carapuce", "eau", 10, 50);
    $dracaufeu  = new Pokemon("Dracaufeu", "feu", 13, 60);
    $rondoudou  = new Pokemon("Rondoudou", "Fée", 15, 40);
    $ronflex    = new Pokemon("Ronflex", "Normal", 1, 100);


    //FONCTION D'ARENE DE COMBAT POKEMON
    function arenePokemon($pokemon1, $pokemon2)
    {
        //TANT QU'UN POKEMON A PLUS DE 0 PV LE COMBAT CONTINU
        while ($pokemon1->getPointDeVie() > 0 && $pokemon2->getPointDeVie() > 0) {
            // ON DETERMINE QUI TAPE A CHAQUE TOUR VIA UN RAND 2
            $whoHit = rand(1, 2);
            //SI 1 LE PREMIER POKEMON TAPE
            if ($whoHit == 1) {
                echo $pokemon1->getNom() . " frappe " . $pokemon2->getNom();
                $pokemon1->frapper($pokemon2);
                // SI 2 LE DEUXIEME POKEMON TAPE
            } else {
                echo $pokemon2->getNom() . " frappe " . $pokemon1->getNom();
                $pokemon2->frapper($pokemon1);
            }
        }
    }





    //LANCEMENT D'UN COMBAT POKEMON
    arenePokemon($carapuce, $dracaufeu);





    ?>
</body>

</html>