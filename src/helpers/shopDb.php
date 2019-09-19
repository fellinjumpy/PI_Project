<?php
 
 



class Items {
    private $rows;
    protected $conn = null;
    public function connect(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "band_db";
        require 'console.php';
       $this->conn = new mysqli($servername,$username,$password,$dbname);

        if($this->conn->connect_error){
            die("connection Failed " . $conn->connect_error);
            consoleLog("Connection Failed.");
        }else{
            consoleLog("connected");
        }

    }

    public function getAllItems(){
            $sql = "SELECT * FROM proionta";

            $result = $this->conn->query($sql);

            //Check if we have results
            if ($result->num_rows > 0) {
                $rows = $result->fetch_all(MYSQLI_ASSOC);
                // $num_rows = $result->num_rows ;
                // for($i=0; $i<$num_rows; $i++){
                //     echo implode('<p>',$rows[$i]);
                // }
            }else {
                echo "0 results";
            }
            $this->rows = $rows ;
            return $this->rows;
    }
}

?>