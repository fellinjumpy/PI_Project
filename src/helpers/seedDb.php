<?php 

include("db.php");

$titlos = [
    "Album v1 CD",
    "Album v2 CD",
    "EP v1 CD",
    "T-Shirt",
    "Album 1-2 Vinyl"
];

$perigrafi = [
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
    rand(70, 250) / 10,
    rand(2500, 5000) / 10
];

$apothema = [
    rand(10,100),
    rand(10,100),
    rand(10,100),
    rand(10,100),
    rand(10,100)
];

$eikona = [
    "https://images.unsplash.com/photo-1507041957456-9c397ce39c97?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80",
    "https://images.unsplash.com/photo-1484662020986-75935d2ebc66?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80",
    "https://images.unsplash.com/photo-1529443601747-2d02ab3da2c8?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1348&q=80",
    "https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80",
    "https://images.unsplash.com/photo-1441974231531-c6227db76b6e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1351&q=80"
];

for ($i = 0 ; $i < 5; $i++ ){

    $sql = "INSERT INTO proionta (titlos,perigrafi,timi,apothema,eikona) 
        VALUES 
        (
            '${titlos[$i]}',
            '${perigrafi[$i]}',
            ${timi[$i]},
            ${apothema[$i]},
            '${eikona[$i]}')";

        if ($conn->query($sql) === TRUE) {
            consoleLog("New record created successfully");
            
        } else {
            consoleLog("Error: " . $sql . "<br>" . $conn->error);
        }
}
$conn->close();
consoleLog("Seed Done, connection closed");