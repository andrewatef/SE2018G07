<?php
      	include 'database.php';

        class Grades{

          private $db;

          public function __construct(){
              $this->db = new Database();
          }

          public  function all(){
            $query="Select *  from  grades ";
            $result = $this->db->select($query);
            $grades=[];
            if($result)
            {
            while($row = $result->fetch_assoc())
              {
              $grades[]=$row;
              }
            }
              else{
                $grades[]="";
              }

            return $grades;
          }

          public function createG($sid , $cid , $deg  ){
            $query="Insert into grades (student_id , course_id , degree ) values ($sid , $cid , $deg )";
            $result = $this->db->create($query);
          }

          public function getg($id){
            $query="Select *  from  grades where id=$id ";
    				$result = $this->db->select($query);
    				$grades=[];
    				if($result)
    				{
    				while($row = $result->fetch_assoc())
    					{
    					$grades[]=$row;
    					}
    				}
    					else{
    						$grades[]="";
    					}

    				return $grades;
          }

          public function delete($id){
            $query = "delete from grades where id = $id";
            $result = $this->db->create($query);
            $query="alter table grades drop column id";
    				$result = $this->db->create($query);
    				$query="alter table grades add id int not null auto_increment primary key";
    				$result = $this->db->create($query);
          }

        }

 ?>
