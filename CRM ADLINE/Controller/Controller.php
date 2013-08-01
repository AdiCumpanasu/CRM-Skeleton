<?php
include_once("..\\DataModel\\Utilizator.php");
include_once("..\\DataModel\\Firma.php");
include_once("..\\DataModel\\Echipament.php");
include_once("..\\DataModel\\Fisier.php");
include_once("..\\DataModel\\Interactiune.php");
include_once("..\\DataModel\\PersoanaContact.php");
include_once("..\\DataModel\\Activitate.php");
include_once("..\\DataModel\\Interventie.php");
include_once("..\\DatabaseAccess\\DataAccess.php");


/**
 * @access public
 * @author TEST
 * @package Controller
 */
class Controller {
    
    public $_myDebug;
    static $dataAccess;
    
    public $obiectCurent;
    public $colectieCurenta = Array();

    
	public function __construct() {
        // Trace
        $this->_myDebug = isset($_GET['d']);
       if ($this->_myDebug) { echo get_class($this)." Construction<br>"; }
        
        $this->dataAccess = new DataAccess();
    }

	public function read($numeTabel) {
        // Trace
        if ($this->_myDebug) { echo get_class($this)." read<br>"; }
        //$json = json_decode($sJson); 
        $coloaneNecesare = $_POST["data"]["columns"];
        if ($this->_myDebug) {print_r ($_POST);}
        $this->dataAccess->MyDebug(" Number of Filters: " . count($_POST["data"]["filters"]));
        $filtre = $_POST["data"]["filters"];
        $searchString = null;
        if(isset($_POST["data"]["searchString"]))
        {
            $searchString = $_POST["data"]["searchString"];
        }
        $limit = 10;
		$this->colectieCurenta = $this->dataAccess->read($numeTabel, $coloaneNecesare, $filtre, $searchString, $limit);
    }


	public function save($numeTabel, $id) {
        // Trace
        $this->dataAccess->MyDebug("Save");
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
        

if ($id<0){
$this->dataAccess->MyDebug("Object does not exist. Create!");
	$affected_randuri = $this->dataAccess->insert($this->obiectCurent);

}
else
{
$this->dataAccess->MyDebug("Object exist. Update!");
	$affected_randuri = $this->dataAccess->update($this->obiectCurent);
}

return $affected_randuri;
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
        $this->dataAccess->MyDebug("GET EntityName: ".$numeTabel.", id: ".$id);
        $this->setObjectType($numeTabel, $id);
        if ($this->_myDebug) { echo get_class($this)." JSON = ".json_encode($this->obiectCurent)."<br>"; }
        $this->dataAccess->get($this->obiectCurent);
    }
    
      
	public function arhivare($numeTabel, $id) {
        // Trace
        if ($this->_myDebug) { echo get_class($this)." arhivare<br>"; }
        if ($this->_myDebug) { echo get_class($this)." ".$numeTabel."<br>"; }
        $this->setObjectType($numeTabel, $id);
        if ($this->_myDebug) { echo get_class($this)." JSON = ".json_encode($this->obiectCurent)."<br>"; }
        return $this->dataAccess->arhiveaza($this->obiectCurent);
		
	}

    
    
    //primeste nume tabel prin GET iar filtrele prin POST
    //parametrul este trimis de apelul de jos
    public function myCount($numeTabel){
        if($numeTabel == null || $numeTabel == '')
        {
                $this->dataAccess->MyDebug('null sau gol in myCount din Controller');
                return 0;
        } else{
        
        $filtre = $_POST["data"]["filters"];
        return $this->dataAccess->countBy($numeTabel, $filtre);
        //returneaza numar
        }
        
    }
        
    
    
    }

$firmaController = new Controller();

if(isset($_GET['get']))
{
    $firmaController->get($_GET['entity'], $_GET['get']);
    echo (json_encode($firmaController->obiectCurent));
} 
if(isset($_GET['read']))
{
    $firmaController->read($_GET['read']);
    echo (json_encode($firmaController->colectieCurenta));
} 
if(isset($_GET['arhivare']))
{
    $affected_randuri = $firmaController->arhivare($_GET['entity'], $_GET['arhivare']);
    $raspunsServer = new ServerRaspuns();
    $raspunsServer->metainformation = new Metainformation();
    $raspunsServer->metainformation->success = $affected_randuri > 0;
    $raspunsServer->data = $firmaController->obiectCurent;
    echo (json_encode($raspunsServer));
}


if(isset($_GET['save']))
{
    $affected_randuri = $firmaController->save($_GET['entity'], $_GET['save']);
    $raspunsServer = new ServerRaspuns();
    $raspunsServer->metainformation = new Metainformation();
    $raspunsServer->metainformation->success = $affected_randuri > 0;
    $raspunsServer->data = $firmaController->obiectCurent;
    echo (json_encode($raspunsServer));
}

if(isset($_GET['count']))
{
    $count = $firmaController->myCount("firma");
    echo (($count));
}

class Metainformation
{
    public $success = false;
}

class ServerRaspuns
{
    public $metainformation = null;//new Metainformation();
    public $data = null;
}


?>