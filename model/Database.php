<?php 
require_once 'Config.php';


class Database extends Config {

    private static $db = null;

    function __construct() {
		if ( null == self::$db ) { 
			try { 
				self::$db = new PDO( "mysql:host=".$this->hostname.";"."dbname=".$this->dbname, $this->username, $this->password); 
			}
			catch(PDOException $e) { 
				die($e->getMessage()); 
				echo 'Erreur de connexion : ' . $e->getMessage();
    		}
   		}
   		return self::$db;
	}

	function prepare($sql,$val = array()){
		$res = self::$db->prepare($sql);
		foreach($val as $key => $value){
			var_dump($key,$value);
			$res->bindValue($key,$value);
		}
		var_dump($res);
		$res->execute();
		$return = $res->fetchAll(PDO::FETCH_ASSOC);
		return $return;
	}
	
	
	
}