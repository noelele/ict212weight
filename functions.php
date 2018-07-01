<?php

	class dataOps{

		public $conn;

		public function __construct(){
			//connect to db
			$this -> conn = mysqli_connect("localhost","root","","weighttrack");
										//host, username,password,database name
			if($this -> conn){
				
			}else{
				echo "Error connecting to database: ".mysqli_error();
			}
		}

		public function registerUser($fname, $lname, $username, $password, $preferredprogram, $usertype){
			$sql = "INSERT INTO users(fname, lname, username, password, preferredprogram, usertype)
					VALUES ('$fname', '$lname', '$username', '$password', '$preferredprogram', '$usertype')";
			$res = mysqli_query($this->conn,$sql) or die (mysqli_error($this->conn));

			return $res;
		}

		public function retrieveExercise(){
			$sql = "SELECT * FROM exercises";
			$exerciseArray = array();
			$res = mysqli_query($this->conn, $sql);

			while($row = mysqli_fetch_assoc($res)){
				$exerciseArray[] = $row;
				//populate itemarray with data inside table
			}
			return $exerciseArray;
		}

	}

?>