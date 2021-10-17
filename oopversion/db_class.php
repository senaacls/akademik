
<?php
class DatabaseClass{	
	
    private $dbhost = 'localhost';
    private $dbuname = "root";
	private $dbpwd = 'daksa';
	private $dbname = 'akademik';

    // this function is called everytime this class is instantiated		
    private $conn = NULL;
    private static $_instance;

    public static function getInstance()
    {
        if(!self::$_instance) 
        {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct()
    {
        try{
            $this->conn = new PDO("mysql:host=".$this->dbhost.";dbname=".$this->dbname, $this->dbuname, $this->dbpwd);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Error handling
            }catch(PDOException $e){
            die("Failed to connect to DB: ". $e->getMessage());
        }
    }

    // Magic method clone is empty to prevent duplication of connection
    private function __clone(){}
      
    // Get the connection	
    public function getConnection()
    {
        return $this->conn;
    }
    
    // Insert a row/s in a Database Table
    public function Insert( $statement = "" , $parameters = [] ){
        try{
            
            $this->executeStatement( $statement , $parameters );
            return $this->getConnection->lastInsertId();
            
        }catch(Exception $e){
            throw new Exception($e->getMessage());   
        }		
    }

    // Select a row/s in a Database Table
    public function Select( $statement = "" , $parameters = [] ){
        try{
            
            $stmt = $this->executeStatement( $statement , $parameters );
            return $stmt->fetchAll();
            
        }catch(Exception $e){
            throw new Exception($e->getMessage());   
        }		
    }
    
    // Update a row/s in a Database Table
    public function Update( $statement = "" , $parameters = [] ){
        try{
            
            $this->executeStatement( $statement , $parameters );
            
        }catch(Exception $e){
            throw new Exception($e->getMessage());   
        }		
    }		
    
    // Remove a row/s in a Database Table
    public function Remove( $statement = "" , $parameters = [] ){
        try{
            
            $this->executeStatement( $statement , $parameters );
            
        }catch(Exception $e){
            throw new Exception($e->getMessage());   
        }		
    }		
    
    // execute statement
    private function executeStatement( $statement = "" , $parameters = [] ){
        try{
        
            $stmt = $this->getConnection->prepare($statement);
            $stmt->execute($parameters);
            return $stmt;
            
        }catch(Exception $e){
            throw new Exception($e->getMessage());   
        }		
    }
    
}