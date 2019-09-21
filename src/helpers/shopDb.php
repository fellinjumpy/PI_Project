<?php
 
 



class Items {
    private $rows;
    protected $conn = null;
    public function connect(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "band_db";
        $this->conn = new mysqli($servername,$username,$password,$dbname);

        if($this->conn->connect_error){
            die("connection Failed " . $conn->connect_error);
           
        }
    }

    public function getAllItems(){
            $sql = "SELECT * FROM proionta";

            $result = $this->conn->query($sql);

            //Check if we have results
            if ($result->num_rows > 0) {
        
                $rows = $result->fetch_all(MYSQLI_ASSOC);
    
            }else {
                echo "0 results";
            }

            $this->rows = $rows ;
            return $this->rows;
    }

    public function getItemDetails($id){
        
            $data = array();
             
            //get user data from the database
            $sql="SELECT * FROM proionta WHERE id = ${id}";
            $result = $this->conn->query($sql);
            
    
            if($result->num_rows > 0){
                $userData = $result->fetch_assoc();
                $data['status'] = 'ok';
                $data['result'] = $userData;
            }else{
                $data['status'] = 'err';
                $data['result'] = '';
            }
            
            //returns data as JSON format
            return json_encode($data);
         
    }
}

?>