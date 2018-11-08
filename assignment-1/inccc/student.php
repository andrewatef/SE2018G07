<?php
		include 'database.php';


		class Student{

			private $name;
			private $db;
			public function __construct(){
					$this->db = new Database();
			}
			public function createe($name){
				$query="Insert into students (name) values ('{$name}')";
				$result = $this->db->create($query);
			}

			public  function all(){
				$query="Select *  from  students ";
				$result = $this->db->select($query);
				$students=[];
				if($result)
				{
				while($row = $result->fetch_assoc())
					{
					$students[]=$row;
					}
				}
					else{
						$students[]="";
					}

				return $students;
			}
			public function delete($id){
				$query = "delete from students where id = $id";
				$result = $this->db->create($query);
				$query="alter table students drop column id";
				$result = $this->db->create($query);
				$query="alter table students add id int not null auto_increment primary key";
				$result = $this->db->create($query);

			}

		}



 ?>
