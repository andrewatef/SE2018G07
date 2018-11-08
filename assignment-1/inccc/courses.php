<?php

      	include 'database.php';

        class Courses{

          private $db;
    			public function __construct(){

    					$this->db = new Database();
    			}
          public function create($name , $maxdegree , $studyyear){

    				$query="Insert into courses (name,max_degree,study_year) values ('{$name}' , $maxdegree ,$studyyear)";
    				$result = $this->db->create($query);

    			}
          public  function all(){
    				$query="Select *  from  courses ";
    				$result = $this->db->select($query);
    				$courses=[];
    				if($result)
    				{
    				while($row = $result->fetch_assoc())
    					{
    					$courses[]=$row;
    					}
    				}
    					else{
    						$courses[]="";
    					}

    				return $courses;
    			}

          public function delete($id){
            $query = "delete from courses where id = $id";
            $result = $this->db->create($query);
            $query="alter table courses drop column id";
    				$result = $this->db->create($query);
    				$query="alter table courses add id int not null auto_increment primary key";
    				$result = $this->db->create($query);
          }
          public function getc($id){
            $query="Select *  from  courses where id=$id ";
    				$result = $this->db->select($query);
    				$courses=[];
    				if($result)
    				{
    				while($row = $result->fetch_assoc())
    					{
    					$courses[]=$row;
    					}
    				}
    					else{
    						$courses[]="";
    					}

    				return $courses;
          }

        }




  ?>
