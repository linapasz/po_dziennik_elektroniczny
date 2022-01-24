<?php
session_start();
require('config.php');
//klasa do logowania
class School extends Dbconfig {	
    protected $hostName;
    protected $connectionName;
    protected $password;
	protected $dbName;
	private $connectionTable = 'dostep'; 
	private $studentTable = 'uczniowie'; 
	private $classesTable = 'lekcje';
	private $sectionsTable = 'klasy';
	private $userTable = 'uzytkownicy'; 
	private $subjectsTable = 'przedmioty';
	private $attendanceTable = 'obecnosci';
	private $gradesTable = 'ocenyczastkowe';
	private $finalgradesTable = 'ocenykoncowe';
	private $parentsTable = 'rodzice';
	private $messagesTable = 'wiadomosci';
	private $dbConnect = false;
	public $usertype;
    public function __construct(){
        if(!$this->dbConnect){ 		
			$database = new dbConfig();            
            $this -> hostName = $database -> serverName;
            $this -> connectionName = $database -> userName;
            $this -> password = $database ->password;
			$this -> dbName = $database -> dbName;			
            $conn = new mysqli('localhost', 'root','', 'edziennik');
            if($conn->connect_error){
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            } else{
                $this->dbConnect = $conn;
            }
        }
    }
	private function getNumRows($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;
	}	
	public function loginStatus (){
		if(empty($_SESSION["userid"])) {
			header("Location: index.php");
		}
	}
	public function isLoggedin (){
		if(!empty($_SESSION["userid"])) {	
			return true;
		} else {
			return false;
		}
	}
	public function login(){		
		$errorMessage = '';
		if(!empty($_POST["login"]) && $_POST["id"]!='') {	
			$id = $_POST["id"];
			$sqlQuery = "SELECT * FROM ".$this->userTable." 
				WHERE iduz='".$id."'";
			$resultSet = mysqli_query($this->dbConnect, $sqlQuery) or die("error".mysql_error());
			$isValidLogin = mysqli_num_rows($resultSet);
			if($isValidLogin){
				$connectionDetails = mysqli_fetch_assoc($resultSet);
				$_SESSION["userid"] = $connectionDetails['iduz'];
				$_SESSION["usertype"] = $connectionDetails['typuzytkownika'];
				header("location: dashboard.php"); 		
			} else {		
				$errorMessage = "Invalid login!";		 
			}
		}
		return $errorMessage; 		
	}	
}
?>