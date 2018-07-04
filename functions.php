<?php

	class dataOps{

		public $conn;
		private $_supportedFormats = ['image/jpg','image/png','image/jpeg',
 		'image/gif'];

 		

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
		public function retrieveAnnounce(){
			$sql = "SELECT * FROM announcements";
			$announceArray = array();
			$res = mysqli_query($this->conn, $sql);

			while($row = mysqli_fetch_assoc($res)){
				$announceArray[] = $row;
				//populate itemarray with data inside table
			}
			return $announceArray;
		}
		public function retrieveUsers(){
			$sql = "SELECT * FROM users";
			$userArray = array();
			$res = mysqli_query($this->conn, $sql);

			while($row = mysqli_fetch_assoc($res)){
				$userArray[] = $row;
				//populate itemarray with data inside table
			}
			return $userArray;
		}

		public function insertExercise($type, $name,$description,$file){
			if(is_array($file)){
 				if(in_array($file['type'], $this->_supportedFormats)){

 					move_uploaded_file($file['tmp_name'], 'img/'.$file['name']);
 					echo "Image uploaded successfully";

 				}else{
 					echo "File type is not supported";
 				}
 			}else{
 				echo "No file was uploaded";
 			}

 			$filepath = 'img/'.$file['name'];
			$sql = "INSERT INTO exercises(type,name, description, filepath)
					VALUES ('$type', '$name','$description','$filepath')";
			$res = mysqli_query($this->conn,$sql);

			return $res;
		}
		public function insertAnnounce($type, $title,$body){
			date_default_timezone_set('Asia/Hongkong');  
			$date = date('Y-m-d H:i:s');
			$sql = "INSERT INTO announcements(type,title, body, timesubmitted)
					VALUES ('$type', '$title','$body','$date')";
			$res = mysqli_query($this->conn,$sql);

			return $res;
		}

		public function updateExercise($type, $name,$description,$file,$id){
			if(is_array($file)){
 				if(in_array($file['type'], $this->_supportedFormats)){

 					move_uploaded_file($file['tmp_name'], 'img/'.$file['name']);
 					echo "Image uploaded successfully";

 				}else{
 					echo "File type is not supported";
 				}
 			}else{
 				echo "No file was uploaded";
 			}
 			$filepath = 'img/'.$file['name'];
			$sql = "UPDATE exercises SET type='$type', name='$name',description='$description', filepath='$filepath' WHERE exercise_id='$id'";
			$res = mysqli_query($this->conn,$sql)  or die (mysqli_error($this->conn));

			return $res;
		}
		public function updateAnnounce($title,$body,$id){
			
			$sql = "UPDATE announcements SET title='$title',body='$body' WHERE a_id='$id'";
			$res = mysqli_query($this->conn,$sql)  or die (mysqli_error($this->conn));

			return $res;
		}
		public function updateUser($type,$id){
			
			$sql = "UPDATE users SET preferredprogram='$type' WHERE user_id='$id'";
			$res = mysqli_query($this->conn,$sql)  or die (mysqli_error($this->conn));

			return $res;
		}
		public function updateAdmin($id){
			
			$sql = "UPDATE users SET usertype='2' WHERE user_id='$id'";
			$res = mysqli_query($this->conn,$sql)  or die (mysqli_error($this->conn));

			return $res;
		}
		public function updateUsertoadmin($id){
			
			$sql = "UPDATE users SET usertype='1' WHERE user_id='$id'";
			$res = mysqli_query($this->conn,$sql)  or die (mysqli_error($this->conn));

			return $res;
		}
		public function deleteExercise($id){
			$sql = "DELETE FROM exercises WHERE exercise_id='$id'";
			$res = mysqli_query($this->conn,$sql)  or die (mysqli_error($this->conn));

			return $res;
		}
		public function deleteAnnounce($id){
			$sql = "DELETE FROM announcements WHERE a_id='$id'";
			$res = mysqli_query($this->conn,$sql)  or die (mysqli_error($this->conn));

			return $res;
		}
		public function deleteUser($id){
			$sql = "DELETE FROM users WHERE user_id='$id'";
			$res = mysqli_query($this->conn,$sql)  or die (mysqli_error($this->conn));

			return $res;
		}


	}

?>