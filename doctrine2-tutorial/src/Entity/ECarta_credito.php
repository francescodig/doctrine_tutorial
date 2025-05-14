<?php

namespace App\Entity;
use App\Entity\EUtente;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="carta_credito")
 */

class ECarta_credito{

    /**
    * @ORM\Id
     * @ORM\Column(type="string")
     */
    private $numeroCarta;
    /**
     * @ORM\Column(type="string")
     */
    private $nomeCarta;
    /**
     * @ORM\Column(type="datetime")
     */
    private $dataScadenza;
    /**
     * @ORM\Column(type="string", length=3)
     */
    private $cvv;
    /**
     * @ORM\Column(type="string")
     */
    private $nomeIntestatario;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EUtente", inversedBy="carta_credito")
     * @ORM\JoinColumn(name="utente_id", referencedColumnName="id", nullable=false)
     */
    private $utente;


    public function __construct($numero_carta, $nome_carta, $data_scadenza, $cvv, $nome_intestatario, $utente) {
        $this->numeroCarta = $numero_carta;
        $this->nomeCarta = $nome_carta;
        $this->dataScadenza = $data_scadenza;
        $this->cvv = $cvv;
        $this->nomeIntestatario = $nome_intestatario;
        $this->utente = $utente;
    }

    //Getter
    public function getNumeroCarta(){
        return $this->numeroCarta;
    }

    public function getNominativo(){
        return $this->nomeCarta;
    }

    public function getDataScadenza(){
        return $this->dataScadenza;
    }

    public function getCvv(){
        return $this->cvv;
    }

    public function getNomeIntestatario(){
        return $this->nomeIntestatario;
    }

    //Setter
    public function setNumeroCarta($numero_carta){
        $this->numeroCarta = $numero_carta;
    }

    public function setNominativo($nomeCarta){
        $this->nome_carta = $nomeCarta;
    }

    public function setDataScadenza($data_scadenza){
        $this->dataScadenza = $data_scadenza;
    }

    public function setCvv($cvv){
        $this->cvv = $cvv;
    }
    
    public function setNomeIntestatario($nome_intestatario){
        $this->nomeIntestatario = $nome_intestatario;
    }

    
}