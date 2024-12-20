<?php

class Pokemon
{

    private $nom;
    private $type;
    private $force;
    private $pointDeVie;

    function __construct($nom, $type, $force, $pointDeVie)
    {
        $this->nom          = $nom;
        $this->type         = $type;
        $this->force        = $force;
        $this->pointDeVie   = $pointDeVie;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getForce()
    {
        return $this->force;
    }

    public function setForce($force)
    {
        $this->force = $force;
    }

    public function getPointDeVie()
    {
        return $this->pointDeVie;
    }

    public function setPointDeVie($pointDeVie)
    {
        $this->pointDeVie = $pointDeVie;
    }



    // FONCTION AFFICHER LES INFOS
    public function pokedex()
    {
        echo "nom :" .          $this->getNom() . "<br>"
            . "type :" .        $this->getType() . "<br>"
            . "force :" .       $this->getForce() . "<br>"
            . "PV restant :" .  $this->getPointDeVie() . "<br>";
    }

    //FONCTION FRAPPER
    public function frapper($cible)
    {
        $attakerType = $this->getType();
        $cibleType = $cible->getType();

        //CONDITION POUR RENDRE L'ATTAQUE PLUS PUISSANTE EN FONCTION DES FAIBLESSES
        if (($attakerType == 'eau'      && $cibleType == 'feu') ||
            ($attakerType == 'feu'      && $cibleType == 'plante') ||
            ($attakerType == 'plante'   && $cibleType == 'feu')
        ) {
            $forceDeFrappe = $this->getForce() + rand(1, 10) + 10;
            echo ' Attaque efficace ';
        } else {
            //LA FORCE DE FRAPPE A UN EFFET ALEATOIRE EN PLUS VIA LE RAND
            $forceDeFrappe = $this->getForce() + rand(1, 10);
            echo ' Attaque normale ';
        }

        $pvCible = $cible->getPointDeVie();
        // LA CIBLE RECOIS DES DEGATS
        $cible->recevoirDegats($pvCible - $forceDeFrappe);
    }

    //FONCTION RECEVOIR DEGATS
    public function recevoirDegats($pvRestant)
    {
        $this->setPointDeVie($pvRestant);
        // SI LES PV SONT TOUJOURS AU DESSUS DE 0 ON AFFICHE LES PV RESTANT
        if ($pvRestant > 0) {
            echo "--" . $pvRestant . "PV restant à " . $this->getNom() . "<br>";
            // SINON ON INDIQUE QUE LE POKEMON EST KO
        } else {
            echo "-- 0PV restant à " . $this->getNom() . ". Il est KO!<br>";
        }
    }
}
