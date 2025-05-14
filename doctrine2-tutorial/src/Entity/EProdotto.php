<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection; 

/**
 * @ORM\Entity
 * @ORM\Table(name="prodotto")
 */


class EProdotto {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string")
     */
    private $nome;
    /**
     * @ORM\Column(type="string")
     */
    private $descrizione;
    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $costo;
    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\EOrdine", mappedBy="prodotti")
     */
    private $ordini;

    public function __construct($id ,$nome, $descrizione, $costo) {
        $this->id = uniqid();
        $this->nome = $nome;
        $this->descrizione = $descrizione;
        $this->costo = $costo;
        $this->ordini = new ArrayCollection();
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getDescrizione() {
        return $this->descrizione;
    }

    public function getCosto() {
        return $this->costo;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setDescrizione($descrizione) {
        $this->descrizione = $descrizione;
    }
    
    public function setCosto($costo) {
        $this->costo = $costo;
    }

}

?>