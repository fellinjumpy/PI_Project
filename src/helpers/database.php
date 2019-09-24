<?php

     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "band_db";

    // $servername = "localhost";
    // $username = "id10976808_db_admin";
    // $password = "dbadmin";
    // $dbname = "id10976808_band_db	";
    $conn = new mysqli($servername,$username,$password,$dbname);

    if($conn->connect_error){
        die("Connection Failed " . $conn->connect_error);
    }

    $action = $_POST['action'];
     
    if(isset($action)){
        switch($action) {
            case 'getAllItems':
                getAllItems();
                break;
            case 'mailSub':
                mailSub();
                break;
            case 'getItemDetails':
                getItemDetails();
                break;
                case 'checkOut':
                checkOut();
                break;
            default:
                die('Access denied for this function!');
        }
    }

    function getAllItems(){
        global $conn;
        $sql = "SELECT * FROM proionta";

        $result = $conn->query($sql);

        if($result->num_rows > 0){
            $resultData = $result->fetch_all(MYSQLI_ASSOC);
            $data['status'] = 'ok';
            $data['result'] = $resultData;
        }else{
            $data['status'] = 'err';
            $data['result'] = '';
        }
        $conn->close();
        //Return the results in json
        echo json_encode($data);
    }

    function mailSub(){
        global $conn;
        
        $mail = $_POST['email'];
        $sql = "INSERT INTO mail_list (mail) 
                VALUES ('{$mail}')";

        if($conn->query($sql) === TRUE){
            
            $data['status'] = 'ok';
            $data['result'] = $mail;
        }else{
            $data['status'] = 'err';
            $data['result'] = '';
        }

        $conn->close();
        echo json_encode($data);
        
}


function getItemDetails(){
            global $conn;
            $id = $_POST['id'];

            $data = array();

            $sql="SELECT * FROM proionta WHERE id = ${id}";
            $result = $conn->query($sql);
            
    
            if($result->num_rows > 0){
                $itemData = $result->fetch_assoc();
                $data['status'] = 'ok';
                $data['result'] = $itemData;
            }else{
                $data['status'] = 'err';
                $data['result'] = '';
            }
            $conn->close();
            //returns data as JSON format
            echo json_encode($data);
}

function checkOut(){
    global $conn;
    
    $cart = json_decode($_POST['cart']);
     
    $data = array();
    $results = array();
    
    $sql ="";

     foreach($cart as $item){
         $sql .= " UPDATE proionta set apothema = apothema - {$item->amount} 
         Where id = {$item->itemId};";
     }
      
     if (mysqli_multi_query($conn,$sql))
     {
       do
         {
            $data['status'] = 'ok';
         }
       while (mysqli_next_result($conn));
     }else{
        $data['status'] = 'error';
     }


      $conn->close();
      echo json_encode($data);
}

?>