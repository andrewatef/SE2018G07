<?php include "config.php";

		class Database{

			public $host= DB_HOST ;
			public $username = DB_USER;
			public $password = DB_PASS;
			public $db_name =DB_NAME;

			public $link;
			public $error;

			public function __construct()
			{

				$this->connect();
			}
			private function connect(){
				$this->link = new mysqli($this->host,$this->username,$this->password,$this->db_name);
				if(!$this->link){
					$this->error = "connection failed: ".$this->link->connect_error;
					return false;
				}
			}
			public function create($query){
				$result = $this->link->query($query) or die($this->link->errir.__LINE__);

			}
			public function select($query){
				$result = $this->link->query($query) or die($this->link->errir.__LINE__);
				if($result){
					return $result;
				}else{
					return false;
				}
			}
			public function selectq($query){
				$result = $this->link->query($query) or die($this->link->errir.__LINE__);

				if($result){
					while($row =$result->fetch_assoc()){
						$info[]=$row;
					}

				}else{
					return $info[]="";
				}
				return $info;
			}

			public function insert($query){
				$insert_row = $this->link->query($query) or die($this->link->errir.__LINE__);
				if($insert_row){
					header("Location: index.php?msg=".urlencode('Record Added'));
					exit();
				}else{
					die('Error: ('.$this->link->errno .') '.$this->link->error);
				}

			}
			public function update($query){
				$update_row = $this->link->query($query) or die($this->link->errir.__LINE__);
				if($update_row){
					header("Location: index.php?msg=".urlencode('Record Updated'));
					exit();
				}else{
					die('Error: ('.$this->link->errno .') '.$this->link->error);
				}

			}
			public function delete($query){
				$delete_row = $this->link->query($query) or die($this->link->errir.__LINE__);
				if($delete_row){
					header("Location: index.php?msg=".urlencode('Record Deleted'));
					exit();
				}else{
					die('Error: ('.$this->link->errno .') '.$this->link->error);
				}

			}



		}



 ?>
