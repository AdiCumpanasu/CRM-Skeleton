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
    
    public function get($entity){
        // Trace
        if ($this->_myDebug) { echo get_class($this)." Citeste elementul ".$entity->id." of type: ".get_class($entity). "<br>"; }
        
        // Interogare
        $result = mysqli_query($this->con,"SELECT * FROM ".get_class($entity)." WHERE id=".$entity->id);
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
    
    public function read($numeTabel, $coloaneNecesare, $filtre, $limit){
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
        if(count($filtre)>0)
        {
            
            $sqlFiltre ;
           
            foreach ($filtre as $var_name => $value)
            {
                $sqlFiltre .= "AND  `".$var_name."` = '".$value."' "; 
            }
          
            $sqlString .=$sqlFiltre;
        }
        // Limit
        $sqlString.=" LIMIT ";        
        $sqlString.= $limit;
        
        
        
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
