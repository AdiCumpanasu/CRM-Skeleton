<?php

/**
 * GetDbObject short summary.
 *
 * GetDbObject description.
 *
 * @version 1.0
 * @author TEST
 */
class GetFromDb
{
    public $con; 
    private $_myDebug;
    
    function __construct(){
        // Trace
       $this->_myDebug = isset($_GET['d']);
        if ($this->_myDebug) { echo get_class($this)." Construction<br>"; }
        
        // Connect
        $this->con = mysqli_connect("localhost","root",null,"test");
        
        // Check connection
        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    }
    
    
    public function arhiveaza($entity){
        if ($this->_myDebug) { echo get_class($this)." Sterge elementul ".$entity->id." of type: ".get_class($entity). "<br>"; }
        $query = "UPDATE ".get_class($entity)." SET `hidden`=1  WHERE `id`=".$entity->id;
        $result = mysqli_query($this->con, $query);
        
        
    }

    public function update($entity){
        if ($this->_myDebug) { echo get_class($this)." Actualizeaza elementul ".$entity->id." of type: ".get_class($entity). "<br>"; }

$newValues = "";
$properties = get_object_vars($entity);
                $this->logSQL("get from db inainte de foreach");
                $properties = get_object_vars($entity);
foreach ($properties as $propertyName => $propertyValue)
                {
                    if (! is_array($entity->{$propertyName}))
                    if ($propertyName != "data" && $propertyName != "id")
                        {
					$newValues.=" ,`".$propertyName ."` = '".$propertyValue."' ";
					}
				}
if (strlen($newValues) > 2){$newValues = substr($newValues,  2); }

$query = "UPDATE ".get_class($entity)." SET ".$newValues." WHERE `id`=".$entity->id;

$this->logSQL($entity->id);
$this->logSQL($query);
        $result = mysqli_query($this->con, $query);
        
        
    }
    
    public function insert($entity){
        if ($this->_myDebug) { echo get_class($this)." Creaza elementul ".$entity->id." of type: ".get_class($entity). "<br>"; }

$objectColumns  = "";
$objectValues = "";
$properties = get_object_vars($entity);
                
foreach ($properties as $propertyName => $propertyValue)
                {
                    if (! is_array($entity->{$propertyName}))
                        {
                        // (!($propertyName == "data" || $propertyName == "id")){
					    if ($propertyName != "data" && $propertyName != "id"){
					        $objectColumns.=", `".$propertyName ."` ";
					        $objectValues.=", '".$propertyValue."' ";
                        }       
					}
				}
if (strlen($objectColumns) > 1){ $objectColumns= substr($objectColumns, 1); }
if (strlen($objectValues) > 1){ $objectValues= substr($objectValues, 1); }

$query = "INSERT INTO ".get_class($entity)." ( " .$objectColumns. ") VALUES ( " . $objectValues . " ) "; 
    // Trace
        if ($this->_myDebug) { echo get_class($this)." Citeste elementul ".$entity->id." of type: ".get_class($entity). "<br>"; }
        $this->logSQL("GET");
        $this->logSQL($query);  
        
        
        $result = mysqli_query($this->con, $query);
    
        
    }
    
    public function get($entity){
        // Trace
        if ($this->_myDebug) { echo get_class($this)." Citeste elementul ".$entity->id." of type: ".get_class($entity). "<br>"; }
        $this->logSQL("GET: ".$entity->id);
        $sqlString = "SELECT * FROM ".get_class($entity)." WHERE id=".$entity->id;
        $this->logSQL($sqlString);
        // Interogare
        $result = mysqli_query($this->con, $sqlString);
        if ($result){
            while($row = mysqli_fetch_array($result))
            {
                $properties = get_object_vars($entity);
                
                foreach ($properties as $propertyName => $propertyValue)
                {
                    if (! is_array($entity->{$propertyName}))
                        //print_r($entity);
                        //echo ("<br>");
                        //print_r($row);
                        
                        // Modificare obiect intitial
                        if ($this->_myDebug) { echo get_class($this)." ".$entity->{$propertyName}."= ". $row[$propertyName]."<br>"; }
                        $entity->{$propertyName} = $row[$propertyName];
                }                
            }
        }
    }
    
    public function logSQL($sqlString){
        //return;
        $myFile = "logfile.html";
        $fh = fopen($myFile, 'a') or die("can't open file");
        fwrite($fh, $sqlString . "</br>");
        fclose($fh);
    }
    
    public function read($numeTabel, $coloaneNecesare, $filtre, $searchString, $limit){
        // Trace
        if ($this->_myDebug) { echo get_class($this)." Citeste tot tabelul ".$numeTabel. "<br>"; }
        
        // Interogare
        $sqlString = "SELECT ";
        
        // Ce coloane aduce
        if(count($coloaneNecesare)>0)
        {
            $numeColoane ;
            foreach ($coloaneNecesare as $numeColoana)
            {
                $numeColoane .= ",`".$numeColoana."` "; 
            }
            $numeColoane = substr($numeColoane, 1);
            $sqlString .=$numeColoane;
        }
        else
        {
            $sqlString .="*";
        }
        $sqlString .=" FROM ".$numeTabel;
        $sqlString .=" WHERE hidden=0 ";
        // Cum gaseste randurile valide
        $this->logSQL(" Number of filters: ".count($filtre));;
        if(count($filtre)>0)
        {
            
            $sqlFiltre ;
           
            foreach ($filtre as $var_name => $value)
            {
                $sqlFiltre .= "AND  `".$var_name."` = '".$value."' "; 
            }
          
            $sqlString .=$sqlFiltre;
        } 
        $searchClause = "";
        if ($searchString != null)
        {
            if(count($coloaneNecesare)>0)
            {
                
                $numeColoane ;
                $filterString = "";
                foreach ($coloaneNecesare as $numeColoana)
                {
                    $filterString .= "OR  `".$numeColoana."` LIKE '%".$searchString."%' "; 
                }
                if ($filterString != "")
                {
                    $searchClause = " AND ( ".substr($filterString, 3)." ) ";
                }
            }
        }
        $sqlString.=$searchClause;      
        // Limit
        $sqlString.=" LIMIT ";        
        $sqlString.= $limit;
        
        $this->logSQL("READ");
        $this->logSQL($sqlString);
        
        if ($this->_myDebug) { echo ( get_class($this)." SQL = ". $sqlString."<br>"); }
        $result = mysqli_query($this->con, $sqlString);
        $TabelCurent = array();
        if ($result){
            while($row = mysqli_fetch_array($result))
            {
                if ($this->_myDebug) { echo get_class($this)."  read: ".count($row)."<br>"; }
                
                $RandCurent = array();
                foreach ($coloaneNecesare as $numeColoana)
                {
                    $RandCurent[] = $row[$numeColoana];
                }
                $TabelCurent[] =  $RandCurent;
            }  
        }
        return $TabelCurent;
    }
    
}
