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

	public function read($numeTabel) {
        // Trace
        if ($this->_myDebug) { echo get_class($this)." read<br>"; }
        //$json = json_decode($sJson); 
        $coloaneNecesare = $_POST["data"]["columns"];
        if ($this->_myDebug) {print_r ($_POST);}
        $this->dbGet->logSQL(" Number of Filters: " . count($_POST["data"]["filters"]));
        $filtre = $_POST["data"]["filters"];
        $searchString = null;
        if(isset($_POST["data"]["searchString"]))
        {
            $searchString = $_POST["data"]["searchString"];
        }
        $limit = 10;
		$this->colectieCurenta = $this->dbGet->read($numeTabel, $coloaneNecesare, $filtre, $searchString, $limit);
    }


	public function save($numeTabel, $id) {
        // Trace
        $this->dbGet->logSQL("Save");
        $this->setObjectType($numeTabel, $id);
        $properties = get_object_vars($this->obiectCurent);
        foreach ($properties as $propertyName => $propertyValue)
        {
            if (! is_array($this->obiectCurent->{$propertyName}))
            {
                if(isset($_POST['data'][$propertyName]))
                {
                    $this->obiectCurent->{$propertyName} = $_POST['data'][$propertyName];
                }
            }
       }
        
$newValues = "";
$properties = get_object_vars($_POST["data"]);
foreach ($properties as $propertyName => $propertyValue)
                {
                    //if (! is_array($entity->{$propertyName}))
                        {
$this->setObjectType->{$propertyName} = $propertyValue;

}
}
if ($id<0){
$this->dbGet->logSQL("Object does not exist. Create!");
	$this->dbGet->insert($this->obiectCurent);
}
else
{
$this->dbGet->logSQL("Object exist. Update!");
	$this->dbGet->update($this->obiectCurent);
}
}

private function setObjectType($numeTabel, $id)
{
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
}

	public function get($numeTabel, $id) {
        // Trace
        $this->dbGet->logSQL("GET EntityName: ".$numeTabel.", id: ".$id);
        $this->setObjectType($numeTabel, $id);
        if ($this->_myDebug) { echo get_class($this)." JSON = ".json_encode($this->obiectCurent)."<br>"; }
        $this->dbGet->get($this->obiectCurent);
    }
    
      
	public function arhivare($numeTabel, $id) {
        // Trace
        if ($this->_myDebug) { echo get_class($this)." arhivare<br>"; }
        if ($this->_myDebug) { echo get_class($this)." ".$numeTabel."<br>"; }
        $this->setObjectType($numeTabel, $id);
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

else 
if(isset($_GET['save']))
{
    $firmaController->save($_GET['entity'], $_GET['save']);
    echo (json_encode($firmaController->obiectCurent));
}


?>