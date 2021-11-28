<?php

class DbUtil{
	
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
         // echo "<p>You are connected to the database --- Yay!!</p>";
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
}

?>
