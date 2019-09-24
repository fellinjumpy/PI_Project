<?php

     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "band_db";

    // $servername = "localhost";
    // $username = "id10976808_db_admin";
    // $password = "dbadmin";
    // $dbname = "id10976808_band_db";
    
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

function seedDatabase(){
    global $conn;
    $titlos = [
        "All of us Vinyl",
        "Queen Album CDs",
        "Alhoyz Ring SET",
        "Departure Album",
        "Live in China DVD",
        "Bass Rings SET",
        "Live in Japan DVD",
        "Countdown Album",
        "Live in USA DVD",
        "Live in UK DVD",
        "Alhoyz T-Shirt Tie",
        "Mord Ring Set",
        "Departure Vinyl",
        "Console AD-15",
        "Queen Vinyl"
    ];
    
    $perigrafi = [
        "urabitur dictum ullamcorper ornare. Donec bibendum bibendum diam quis viverra. Etiam quis egestas sem, et vestibulum purus. Nullam fringilla, lacus nec placerat luctus, urna lacus lacinia mauris" ,
        "Sed finibus pulvinar suscipit. Suspendisse non velit ut purus mollis feugiat quis sit amet enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce sagittis tincidunt ante, ac tincidunt tortor ullamcorper vel. Duis euismod faucibus nisi, at tempor sem sollicitudin accumsan",
        "Morbi faucibus, erat eu varius consequat, tortor justo efficitur metus, vitae suscipit neque ",
        "Morbi sollicitudin auctor odio, non elementum felis molestie at. Donec dignissim imperdiet tempor. Nulla augue libero, tempus sed fringilla id",
        "s purus tempus efficitur imperdiet. Vestibulum vestibulum pulvinar neque vel gravida. Etiam sit amet ex sed odio luctus condimentum ac ut purus. Proin luctus est eget odio efficitur rhoncus.",
        "urabitur dictum ullamcorper ornare. Donec bibendum bibendum diam quis viverra. Etiam quis egestas sem, et vestibulum purus. Nullam fringilla, lacus nec placerat luctus, urna lacus lacinia mauris" ,
        "Sed finibus pulvinar suscipit. Suspendisse non velit ut purus mollis feugiat quis sit amet enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce sagittis tincidunt ante, ac tincidunt tortor ullamcorper vel. Duis euismod faucibus nisi, at tempor sem sollicitudin accumsan",
        "Morbi faucibus, erat eu varius consequat, tortor justo efficitur metus, vitae suscipit neque ",
        "Morbi sollicitudin auctor odio, non elementum felis molestie at. Donec dignissim imperdiet tempor. Nulla augue libero, tempus sed fringilla id",
        "s purus tempus efficitur imperdiet. Vestibulum vestibulum pulvinar neque vel gravida. Etiam sit amet ex sed odio luctus condimentum ac ut purus. Proin luctus est eget odio efficitur rhoncus.",
        "urabitur dictum ullamcorper ornare. Donec bibendum bibendum diam quis viverra. Etiam quis egestas sem, et vestibulum purus. Nullam fringilla, lacus nec placerat luctus, urna lacus lacinia mauris" ,
        "Sed finibus pulvinar suscipit. Suspendisse non velit ut purus mollis feugiat quis sit amet enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce sagittis tincidunt ante, ac tincidunt tortor ullamcorper vel. Duis euismod faucibus nisi, at tempor sem sollicitudin accumsan",
        "Morbi faucibus, erat eu varius consequat, tortor justo efficitur metus, vitae suscipit neque ",
        "Morbi sollicitudin auctor odio, non elementum felis molestie at. Donec dignissim imperdiet tempor. Nulla augue libero, tempus sed fringilla id",
        "s purus tempus efficitur imperdiet. Vestibulum vestibulum pulvinar neque vel gravida. Etiam sit amet ex sed odio luctus condimentum ac ut purus. Proin luctus est eget odio efficitur rhoncus."
    
    ];
    
    $timi = [
        rand(25, 150) / 10,
        rand(12, 57) / 10,
        rand(15 , 98) / 10,
        rand(50, 250) / 10,
        rand(300, 2100) / 10,
        rand(25, 150) / 10,
        rand(12, 57) / 10,
        rand(15 , 98) / 10,
        rand(7 , 50) / 10,
        rand(1500, 3000) / 10,
        rand(2, 150) / 10,
        rand(5, 57) / 10,
        rand(15 , 98) / 10,
        rand(3000, 5000) / 10,
        rand(20, 50) / 10
    ];
    
    $apothema = [
        rand(10,50),
        rand(10,50),
        rand(10,50),
        rand(10,70),
        rand(10,34),
        rand(10,50),
        rand(10,50),
        rand(10,50),
        rand(10,70),
        rand(10,34),
        rand(10,50),
        rand(10,50),
        rand(10,50),
        rand(10,70),
        rand(10,34)
    ];
    
    $eikona = [
        "https://images.unsplash.com/photo-1461360228754-6e81c478b882?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1353&q=80",
        "https://images.unsplash.com/photo-1563380796418-2b797de14a96?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=949&q=80",
        "https://images.unsplash.com/photo-1501046791521-e24baf06e55b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80",
        "https://images.unsplash.com/photo-1542885421-3fb3de1f9f0b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=633&q=80",
        "https://images.unsplash.com/13/unsplash_523b1f5aafc42_1.JPG?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1354&q=80",
        "https://images.unsplash.com/photo-1519274034685-40f13b4b3bd6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80",
        "https://images.unsplash.com/photo-1488036106564-87ecb155bb15?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=675&q=80",
        "https://images.unsplash.com/photo-1560527341-725efe8887d9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80",
        "https://images.unsplash.com/photo-1562633484-f8eb6f29cf63?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=700&q=80",
        "https://images.unsplash.com/photo-1564106977735-c5a2f6083e18?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=646&q=80",
        "https://images.unsplash.com/photo-1543132220-e7fef0b974e7?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80",
        "https://images.unsplash.com/photo-1554047310-ab6170fc7b10?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80",
        "https://images.unsplash.com/photo-1468164016595-6108e4c60c8b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80",
        "https://images.unsplash.com/photo-1457689146074-bd667e343a9c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80",
        "https://images.unsplash.com/photo-1505672984986-b7c468c7a134?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80"
    ];
    
    for ($i = 5 ; $i < 15; $i++ ){
    
        $sql = "INSERT INTO proionta (titlos,perigrafi,timi,apothema,eikona) 
            VALUES 
            (
                '${titlos[$i]}',
                '${perigrafi[$i]}',
                ${timi[$i]},
                ${apothema[$i]},
                '${eikona[$i]}')";
    
            if ($conn->query($sql) === TRUE) {
                echo "New record added successfuly";
                
            } else {
                echo ("Error: " . $sql . "<br>" . $conn->error);
            }
    }
    $conn->close();
}
?>