<?php class Database{
        public static function connection(){            
            $hostname = "localhost";
            $port = "3306";
            $database = "db_app_web_php";
            $username = "root";
            $password = "";
			$pdo = new PDO("mysql:host=$hostname;port=$port;dbname=$database;charset=utf8",$username,$password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;
		}
	}
    ?>