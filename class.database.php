<?php
// database class
class database {
    protected static $connection;
    
    var $hostname="localhost";
    var $username="root";
    var $password="";
    var $database="ptsawit";

    public function __construct() {
        
    }

    public function connect() {    
        if(!isset(self::$connection)) {               
            self::$connection = new mysqli($this->hostname,$this->username,$this->password,$this->database);
        }

        // If connection was not successful, handle the error
        if(self::$connection === false) {
            // Handle error - notify administrator, log to a file, show an error screen, etc.
            return false;
        }

        self::$connection -> query("SET NAMES 'utf8'");

        return self::$connection;
    }


    public function query($query) {
        // Connect to the database
        $connection = $this -> connect();
        // Query the database
        $result = $connection -> query($query);

        return $result;
    }

    public function multi_query($query){
        // Connect to the database
        $connection = $this -> connect();

        // Query the database
        $result = $connection -> multi_query($query);

        return $result;
    }

    public function insert($query) {
        // Connect to the database
        $connection = $this -> connect();

        // Query the database
        $connection -> query($query);
        // Get inserted id
        $insertid = $connection -> insert_id;

        return $insertid;
    }

    public function select($query) {
        $rows = array();
        $result = $this -> query($query);
        if($result === false) {
            return false;
        }
        while ($row = $result -> fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function num_rows($query) {
        $result = $this -> query($query);
    
        if($result === false) {
            $count = 0;
        }
        else $count = $result->num_rows;
        
        return $count;
    }

    /**
     * Fetch the last error from the database
     * 
     * @return string Database error message
     */
    public function error() {
        return self::$connection -> error;
    }

    /**
     * Quote and escape value for use in a database query
     *
     * @param string $value The value to be quoted and escaped
     * @return string The quoted and escaped string
     */
    public function escape($value) {
        $connection = $this -> connect();
        return $connection -> real_escape_string(trim($value));
    }
}

$database = new database();
?>