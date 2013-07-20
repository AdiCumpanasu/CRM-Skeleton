<?php

include_once("..\\DataModel\\Utilizator.php");
include_once("..\\DataModel\\Firma.php");
include_once("..\\DataModel\\Echipament.php");
include_once("..\\DataModel\\Fisier.php");
include_once("..\\DataModel\\Interactiune.php");
include_once("..\\DataModel\\PersoanaContact.php");
include_once("..\\DataModel\\Activitate.php");
include_once("..\\DataModel\\Interventie.php");
include_once("..\\DatabaseAccess\\GetFromDb.php");
    
/**
 * @access public
 * @author TEST
 * @package Controller
 */
class Controller {
    
    public $_myDebug;
    public $dbGet;
    
    public $obiectCurent;
    public $colectieCurenta = Array();

    
	public function __construct() {
        // Trace
        $this->_myDebug = isset($_GET['d']);
        if ($this->_myDebug) { echo get_class($this)." Construction<br>"; }
        
        $this->dbGet = new GetFromDb();
    }
    

	public function creeaza() {
		// Not yet implemented
	}

	

	/**
     * @access public
     */
	public function actualizeaza() {
		// Not yet implemented
	}

	/**
     * @access public
     */
	public function listeaza_echipamente() {
		// Not yet implemented
	}

	/** 
     * @access public
     */
	public function listeaza_Interactiune() {
		// Not yet implemented
	}

	/**
     * @access public
     */
	public function listeaza_persoaneContact() {
		// Not yet implemented
	}

	/**
     * @access public
     */
	public function listeaza_fisiere() {
		// Not yet implemented
	}


	public function listeaza_activitati() {
		// Not yet implemented
	}


	public function read($numeTabel) {
        // Trace
        if ($this->_myDebug) { echo get_class($this)." read<br>"; }
        //$json = json_decode($sJson); 
        $coloaneNecesare = $_POST["data"]["columns"];
        if ($this->_myDebug) {print_r ($_POST);}
        $filtre = $_POST["data"]["filters"];
        $searchString = null;
        if(isset($_POST["data"]["searchString"]))
        {
            $searchString = $_POST["data"]["searchString"];
        }
        $limit = 10;
		$this->colectieCurenta = $this->dbGet->read($numeTabel, $coloaneNecesare, $filtre, $searchString, $limit);
    }


	public function get($numeTabel, $id) {
        // Trace
        if ($this->_myDebug) { echo get_class($this)." get<br>"; }
        if ($this->_myDebug) { echo get_class($this)." ".$numeTabel."<br>"; }
        //switch($numeTabel)
        //{
        //    case "Utilizator":
		        $this->obiectCurent = new Utilizator($id);
        //        break;
        //}
        if ($this->_myDebug) { echo get_class($this)." JSON = ".json_encode($this->obiectCurent)."<br>"; }
        $this->dbGet->get($this->obiectCurent);
    }
    
      
	public function arhivare($numeTabel, $id) {
        // Trace
        if ($this->_myDebug) { echo get_class($this)." arhivare<br>"; }
        if ($this->_myDebug) { echo get_class($this)." ".$numeTabel."<br>"; }
        switch($numeTabel)
            {
            case "Utilizator":
                $this->obiectCurent = new Utilizator($id);
                break;
            case "Firma":
                $this->obiectCurent = new Firma($id);
                break;
            case "Echipament":
                $this->obiectCurent = new Echipament($id);
                break;
            case "Fisier":
                $this->obiectCurent = new Fisier($id);
                break;
            case "Interactiune":
                $this->obiectCurent = new Interactiune($id);
                break;
            case "Interventie":
                $this->obiectCurent = new Interventie($id);
                break;
            case "PersoanaContact":
                $this->obiectCurent = new PersoanaContact($id);
                break;
                
            }
        if ($this->_myDebug) { echo get_class($this)." JSON = ".json_encode($this->obiectCurent)."<br>"; }
        $this->dbGet->arhiveaza($this->obiectCurent);
		
	}
}

$firmaController = new Controller();

if(isset($_GET['get']))
{
    $firmaController->get($_GET['entity'], $_GET['get']);
    echo (json_encode($firmaController->obiectCurent));
} else 
if(isset($_GET['read']))
{
    $firmaController->read($_GET['read']);
    echo (json_encode($firmaController->colectieCurenta));
} else 
if(isset($_GET['arhivare']))
{
    $firmaController->arhivare($_GET['entity'], $_GET['arhivare']);
    echo (json_encode($firmaController->obiectCurent));
}

?>