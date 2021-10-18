<?php 
require_once 'Config.php';


class Database extends Config 
{

    private static $db = null;

    function __construct() {
		if ( null == self::$db ) { 
			try { 
				self::$db = new PDO( "mysql:host=".$this->hostname.";"."dbname=".$this->dbname, $this->username, $this->password); 
			}
			catch(PDOException $e) { 
				echo 'Erreur de connexion : ' . $e->getMessage();
    		}
   		}
   		return self::$db;
	}

	function prepare($sql,$val = array()){
		$res = self::$db->prepare($sql);
		foreach($val as $key => $value){
			$res->bindValue($key,$value);
		}
		$res->execute();
		$return = $res->fetchAll(PDO::FETCH_ASSOC);
		return $return;
	}
	
	
	
}