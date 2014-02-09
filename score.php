<?php
session_start();
error_reporting(E_ALL);
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

/*We're going to store the score as an object of class Score.  We can do different things with a score:
1) We can store a score.
2) We can retrieve a list of the last 10 high scores.*/

class Score implements JsonSerializable {

	private $score;
	private $user;
	private $highScores = array();
	private $userID;

	private $pdo;

    public function __construct($pdo, $user = "", $score = "") {
    	$this->setUser($user);
        $this->setScore($score);
        $this->pdo = $pdo;
    }

	public function setUser($user){
		$this->user = trim($user);
	}
	public function getUser(){
		return $this->user;
	}

	public function setScore($score){
		$this->score = trim($score);
	}
	public function getScore(){
		return $this->score;
	}

	public function storeScore(){

	}

	public function getHighScores(){

	}

    public function jsonSerialize(){

    }
}

$error = false;
$errorMsg = "";
$method = "";

$host = "localhost";
$dbType = "mysql";
$dbUser = "root";
$dbPass = "mysqlpassword";
$db = "peek.com";

try{
	$pdo = new PDO("$dbType:host=$host;dbname=$db", $dbUser, $dbPass);
}catch (PDOException $e){
	$errorMsg = "Could not connect to server: ".$e->getMessage();
	die($errorMsg);
}

?>