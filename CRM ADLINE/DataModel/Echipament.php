<?php
/**
 * @access public
 * @author TEST
 * @package DataModel
 */


include_once("..\\DataModel\\Interventie.php");

class Echipament {
    
	/**
	 * @AttributeType int
	 */
	public $id;
    
    /**
     * @AttributeType Interventie
     */
	public $Interventii = Array();
    
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
	public $descriere;
	/**
	 * @AttributeType datetime
	 */
	public $data_achizitie;
	/**
	 * @AttributeType int
	 */
	public $utilizator_id;
	/**
	 * @AttributeType int
	 */
	public $firma_id;


}
?>