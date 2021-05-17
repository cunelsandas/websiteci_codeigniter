<?php
$servername='localhost';
$username='c47muangkaen';
$password='muan46D&';
$dbname = "c47muangkaen";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
if(!$conn){
    die('Could not Connect MySql Server:' .mysql_error());
}

if(isset($_POST['submit']))
{
    $word = $_POST['word'];
    $name = $_POST['name'];

    $sql = "INSERT INTO blessing_word (word, name) VALUES ('$word', '$name')";

    if (mysqli_query($conn, $sql)) {
        echo "กำลังพิมพ์คำถวายพระพร !";
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    header( "refresh: 1; url=/royal.php" );
    mysqli_close($conn);
}
?>