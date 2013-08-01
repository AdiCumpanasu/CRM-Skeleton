<?php

/**
 * @access public
 * @author TEST
 * @package DataModel
 */


include_once("..\\DataModel\\Echipament.php");
include_once("..\\DataModel\\Fisier.php");
include_once("..\\DataModel\\Interactiune.php");
include_once("..\\DataModel\\Interventie.php");
include_once("..\\DataModel\\PersoanaContact.php");

class Firma {
    
    
    /**
	 * @AttributeType int
	 */
	public $id;
    
    /**
     * @AttributeType PersoanaContact
     */
	public $persoaneContact = Array();
    
        /**
     * @AttributeType Echipament
     */
	public $echipamente = Array();
    
    /**
     * @AttributeType Fisier
     */
	public $fisiere = Array();
    
    /**
     * @AttributeType Interactiune
     */
	public $Interactiune = Array();
    
	/**
	 * @AttributeType datetime
	 */
	public $data;
	/**
	 * @AttributeType string
	 */
	public $nume;
	/**
	 * @AttributeType string
	 */
	public $cod_fiscal;
	/**
	 * @AttributeType string
	 */
	public $nr_reg_comert;
	/**
	 * @AttributeType string
	 */
    public $judet;
    public $tara;
    public $localitate;
    
	public $adresa;
	/**
	 * @AttributeType string
	 */
	public $adresa_livrare;
	/**
	 * @AttributeType string
	 */
	public $banca;
	/**
	 * @AttributeType string
	 */
	public $cont_bancar;
	/**
	 * @AttributeType string
	 */
	public $telefon;
	/**
	 * @AttributeType string
	 */
	public $fax;
	/**
	 * @AttributeType string
	 */
	public $email;
	/**
	 * @AttributeType string
	 */
	public $website;
	/**
	 * @AttributeType string
	 */
	public $modalitate_plata;
	/**
	 * @AttributeType string
	 */
	public $curier;
	/**
	 * @AttributeType string
	 */
	public $seriozitate;
	/**
	 * @AttributeType string
	 */
	public $descriere;
	/**
	 * @AttributeType int
	 */
	public $utilizator_id;


    function __construct($id){
        $this->id = $id;
    }
}
?>