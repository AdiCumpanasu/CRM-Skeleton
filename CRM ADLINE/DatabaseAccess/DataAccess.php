<?php


/*

CODE REVIEW:
Split functions and reuse the code (read and count functions)

*/

/**
 * 	This class perform database requests and return data tables ans error messages if needed
 */
class DataAccess
{

	// The empty string
	private $stringEmpty = '';
	// The database connection
    public $con; 
	// Debugging is required if this this value is set to true
    private $debugNeeded = false;
    
	// 	Logging function write to file and print to user (if debud request is set)
	
	public function MyDebug($className, $functionName, $severity, $userMessage){
		$text = '<style>span { color : gray } .DATA { color: green }  .SQL { color: blue } .ERROR { color : red} </style>'.
			'<div>'.
				'<span class="myClass">'.$className.'</span> '.
				'<span class="myFunction">'.$functionName.'</span> '.
				'<span class="myLevel">'.$severity.'</span> '.
				'<span class="'.$severity.'">'.$userMessage.'</span> '.
			'</div>';
		$myFile = "logfile.html";
        $fh = fopen($myFile, 'a') or die("can't open file");
        fwrite($fh, $text . "</br>");
        fclose($fh);
	   if ($this->debugNeeded) { 
			echo($text);
		}
	}


    //	Create my data access object and initialize class variables
	
	function __construct(){
	
       // Check for debugging request and initializa the debug request flag
       $this->debugNeeded = isset($_GET['d']);
       $this->MyDebug('DataAccess', 'constructor', 'INFO', null);
	   
	   // Connect to the datbase using mysqli (multiquery support)
        $this->con = mysqli_connect("localhost","root",null,"test");
        if (mysqli_connect_errno())
        {
            $this->MyDebug('DataAccess', 
				'constructor', 
				'ERROR', 
				'Failed to connect to MySQL: ' . mysqli_connect_error());
        }
    }
    
    //	Archive the recieved object identified in the database by his ID
	
    public function arhiveaza($entity){
        $this->MyDebug('DataAccess', 
			'arhiveaza', 
			'INFO', 
			" Arhiveaza elementul ".$entity->id." of type: ".get_class($entity));
        
		// Prepare the qwery string
		$sql = "UPDATE `".get_class($entity)."` SET `hidden`=1  WHERE `id`=".$entity->id;
        $this->MyDebug('DataAccess', 
			'arhiveaza', 
			'SQL', 
			$sql);
			
		// Perform the actual qwery
        $result = mysqli_query($this->con, $sql);
        return mysqli_affected_rows($this->con);
    }

    //	Update the recieved object identified in the database by his ID
	
    public function update($entity){
        $this->MyDebug('DataAccess', 
			'update', 
			'INFO', 
			" Actualizeaza elementul ".$entity->id." of type: ".get_class($entity));
        
		// The array containing all the properties of this objtect
		$properties = get_object_vars($entity);
		
		// String containing the new values of the recieved object
		$newValues = '';
		
		// For every property (that has a name and a value)
		foreach ($properties as $propertyName => $propertyValue)
		{
			// If this property is not an array 
            if (! is_array($entity->{$propertyName}))
			{
				// Ignore the data and id values because they are managed 
				// by the database as current timestamp and as autoincrement
                if ($propertyName != "data" && $propertyName != "id")
                {
					// Append this property name and value
					$newValues .= " , `".$propertyName ."` = '".$propertyValue."' ";
				}
			}
			
		}

		// Trim the first coma from the begining of the string if necessary
		if (strlen($newValues) > 2){ $newValues = substr($newValues,  2); }
		
		
		
		// Prepare the qwery string
		$sql = "UPDATE `".get_class($entity)."` SET ".$newValues." WHERE `id`=".$entity->id;
		$this->MyDebug('DataAccess', 
			'update', 
			'SQL', 
			$sql);
			
        // Perform the actual qwery
        $result = mysqli_query($this->con, $sql); 
        return mysqli_affected_rows($this->con);       
    }
    
	//	Insert a new element in the data base. 
	
    public function insert($entity){
        $this->MyDebug('DataAccess', 
			'insert', 
			'INFO', 
			" Creaza elementul ".$entity->id." of type: ".get_class($entity));
 
		// Append names and values of this object properties in separate strings
		$propertyNames  = "";
		$columnValues = "";
		
		// The array containing all the properties of this objtect
		$properties = get_object_vars($entity);
        
		// For every property (that has a name and a value)        
		foreach ($properties as $propertyName => $propertyValue)
		{		
            // If this property is not an array 
            if (! is_array($entity->{$propertyName}))
			{
				// Ignore the data and id values because they are managed 
				// by the database as current timestamp and as autoincrement
                if ($propertyName != "data" && $propertyName != "id")
				{
					// Append this property name and value 
					// into separate strings
					$propertyNames	.=", `".$propertyName 	."` ";
					$columnValues	.=", '".$propertyValue	."' ";
                }       
			}
		}
		// Trim the first coma from the begining of the string if necessary
		if (strlen($propertyNames) 	> 1){ $propertyNames = 	substr($propertyNames, 1); 	}
		if (strlen($objectValues) 	> 1){ $objectValues = 	substr($objectValues, 1); 	}

		// Prepare the qwery string
		$sql = "INSERT INTO `".get_class($entity)."` ( " .$objectColumns. ") VALUES ( " . $objectValues . " ) "; 
		$this->MyDebug('DataAccess', 
			'insert', 
			'SQL', 
			$sql);
			
        // Perform the actual qwery
        $result = mysqli_query($this->con, $sql); 
        return mysqli_affected_rows($this->con);       
    }
    
	//	Get from the database the values corresponding to the properties of a specific entry 
	//  	identified by ID and return the reconstructed object
	
    public function get($entity){
        $this->MyDebug('DataAccess', 
			'get', 
			'INFO', 
			" Citeste elementul ".$entity->id." of type: ".get_class($entity)); 
		
		// Prepare the qwery string
		$sql = "SELECT * FROM `".get_class($entity)."` WHERE `id`=".$entity->id;
        $this->MyDebug('DataAccess', 
			'get', 
			'SQL', 
			$sql);
			
		// Perform the actual qwery
        $result = mysqli_query($this->con, $sql);
		
		// Collect results if exists
		if ($result)
		{
			// The array containing all the properties of this objtect
			$properties = get_object_vars($entity);
                
			// As long as I can fetch rows from the resultset
            while($row = mysqli_fetch_array($result))
            {                
                // For every property (that has a name and a value)
				foreach ($properties as $propertyName => $propertyValue)
                {
                    // If this property is not an array 
					if (! is_array($entity->{$propertyName}))
					{
                        // Asign dataset values to entity properties according to their name
                        $entity->{$propertyName} = $row[$propertyName];
						
						// Output data if requested
                        if ($this->debugNeeded)
						{ 
							$data = $entity->{$propertyName}." = ".$row[$propertyName];
							$this->MyDebug('DataAccess', 
							'get', 
							'DATA', 
							$data); 
						}
					}
                }            
            }
        }
    }
    
	//
    public function read($numeTabel, $coloaneNecesare, $filtre, $searchForMe, $limit){
        $this->MyDebug('DataAccess', 
			'read', 
			'INFO', 
			" Citeste tot tabelul ".$numeTabel." searching for '".$searchForMe."'");
        
        // STEP --- 1 ---
		// Prepare column names
		
		// Assume that all the columns are needed
		$numeColoane = " * ";
		
		// Prepare the string containing the requested column names
        if(count($coloaneNecesare)>0)
        {
			// Previous assumtion was wrong :)
			$numeColoane = "";
			
			// For each needed column
            foreach ($coloaneNecesare as $numeColoana)
            {
				// Append the column name to the needed columns enumeration
                $numeColoane .= ", `".$numeColoana."` "; 
            }
			
			// Trim the first comma
            if ( strlen( $numeColoane ) > 1 )  { $numeColoane = substr( $numeColoane, 1 ); }
        }
		
		// STEP --- 2 ---
		// Prepare filter conditions
		
		// Prepare WHERE clause based on filter values if any
        $stringFiltre = '';
        if (($filtre != null) && (count($filtre)>0))
		{	
			// For every filter (that has a name and a value)
			foreach ($filtre as $parametru => $valoare)
			{
				// Append the current condition to the where clause
                $stringFiltre.= " AND `".$parametru."` = '".$valoare."' ";
            }
			
            // Trim the first coma from the begining of the string if necessary
			//if ( strlen($stringFiltre) > 4 ){  $stringFiltre = substr( $stringFiltre, 4 ); }    
        }
		
		// STEP --- 3 ---
		// Prepare search condition
		
        // Prepare WHERE clause based on search string if any
        $stringSearch = "";
        if ($searchForMe != null)
        {
			// Knowing the column names is mandatory create the search conditions
            if($coloaneNecesare != null)
            {
				// For each needed column
				foreach ($coloaneNecesare as $numeColoana)
                {
					// Append the OR condition to the search string
                    $stringSearch .= "OR  `".$numeColoana."` LIKE '%".$searchForMe."%' "; 
                }
                
				// If search string has some content
				if ( strlen($stringSearch) > 3 )
				{  
					// Trim the first coma from the begining of the string if necessary
					$stringSearch = substr( $stringSearch, 3 ); 
					// Use this group of OR conditions as a single logical unit
					$stringSearch = "(".$stringSearch.")"; 
				} 
			}
        }
		
		// STEP --- 4 ---
		// Prepare rewuest condition
		
		// Prepare the qwery string
		$sql = " SELECT ".$numeColoane." FROM `".$numeTabel."` WHERE `hidden`=0 ".$stringFiltre ;
		// Evaluate if the word 'AND' is needed
		if ( strlen($stringSearch) > 0 )
		{
			$sql .= " AND ".$stringSearch;
		}
		// Append common limitations
		$sql .= " LIMIT 15 ";
		
		$this->MyDebug('DataAccess', 
			'read', 
			'SQL', 
			$sql);
			
		// Perform the actual qwery
        $result = mysqli_query($this->con, $sql);
		
		// Prepare the array of rows (this is the equivalent of a DataTable)
		$tabelRezultate = array();
		
        // Collect results if exists
		if ($result){
			// As long as I can fetch rows from the resultset
            while($row = mysqli_fetch_array($result))
            {
				$i = 0;
				// Prepare the array of columns (this is the equivalent of a DataRow)
				$randCurent = array();
				
                // For each needed column
				foreach ($row as $coloanaRow)
                {
					// Append the value of the current cell to the array of this row`s values
                    $randCurent[] = $row[$i];
                    $i++;
                }
                
				// Append the current row to the table of results
                $tabelRezultate[] =  $randCurent;
            }
        }
		$this->MyDebug('DataAccess', 
							'read', 
							'DATA', 
							json_encode($tabelRezultate)); 
							
		// Return the result table no mather the content
        return $tabelRezultate;

    }
    
    
    
    //	Count the number of the elements by criteria specified in filters
    //	json care vine in filtre: {"Name":"val","Name":"val","Name":"val", }
	    public function countBy($numeTabel, $filtre){
	
        // Check for parameters integrity
        if (($numeTabel == null) || $numeTabel == ''){
            $this->MyDebug('DataAccess', 
				'countBy', 
				'ERROR', 
				" No table name provided! ");
            return 0;
        }
        
		// Prepare WHERE clause based on filter values if any
        $stringFiltre = '';
        if (($filtre != null) && (count($filtre)>0))
		{	
			// For every filter (that has a name and a value)
			foreach ($filtre as $parametru => $valoare)
			{
				// Append the current condition to the where clause
                $stringFiltre.=' AND '.$parametru.' = '.$valoare;
            }
			
            // Trim the first coma from the begining of the string if necessary
			if (strlen($stringFiltre)>4){  $stringFiltre = substr($stringFiltre, 4); }    
        }    
        
        // Prepare the qwery string
		$sql = ' SELECT COUNT(`id`) FROM `'.$numeTabel.'` ';
		if (strlen($stringFiltre)>4) { $sql.= ' WHERE ' .$stringFiltre." "; }
        $this->MyDebug('DataAccess', 
				'countBy', 
				'SQL', 
				$sql);
        
		// Perform the actual qwery
        $result = mysqli_query($this->con, $sql);
	    // Collect results if exists
        if ($result){
            // As long as I can fetch rows from the resultset
            while($row = mysqli_fetch_array($result)){
			
				// We expect the number of records on first position
                return $row[0];
            }
        }
    }

}
?>