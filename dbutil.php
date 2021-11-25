<?php

class DbUtil{
	public static $loginUser = "dz8pa"; 
   public static $loginPass = "carryiousgeorge1";
   public static $host = "mysql01.cs.virginia.edu"; // local host
   public static $schema = "dz8pa_roomreservation"; // DB Schema
	
	public static function loginConnection(){
      $loginUser = "dz8pa"; 
      $loginPass = "carryiousgeorge1";
      $host = "mysql01.cs.virginia.edu"; // local host
      $schema = "dz8pa_roomreservation";
      $dsn = "mysql:host=$host;dbname=$schema";

		try
      {
         $db = new PDO($dsn, $loginUser, $loginPass);
         
         // dispaly a message to let us know that we are connected to the database 
         echo "<p>You are connected to the database --- Yay!!</p>";
      }
      catch (PDOException $e)     // handle a PDO exception (errors thrown by the PDO library)
      {
         // Call a method from any object, use the object's name followed by -> and then method's name
         // All exception objects provide a getMessage() method that returns the error message 
         $error_message = $e->getMessage();        
         echo "<p>An error occurred while connecting to the database: $error_message </p>";
      }
      catch (Exception $e)       // handle any type of exception
      {
         $error_message = $e->getMessage();
         echo "<p>Error message: $error_message </p>";
      }
		
		return $db;
	}

   public static function displayVars(){
      echo "loginuser: " . $loginUser;
      echo "loginpass: " . $loginPass;
      echo "host: " . $host;
      echo "schema: " . $schema;

   }
	
}
// DSN (Data Source Name) specifies the host computer for the MySQL datbase 
// and the name of the database. If the MySQL datbase is running on the same server
// as PHP, use the localhost keyword to specify the host computer

// To connect to a MySQL database, need three arguments: 
// - specify a DSN, username, and password

// Create an instance of PDO (PHP Data Objects) which connects to a MySQL database
// (PDO defines an interface for accessing databases)
// Syntax: 
//    new PDO(dsn, username, password);


/** connect to the database **/


?>
