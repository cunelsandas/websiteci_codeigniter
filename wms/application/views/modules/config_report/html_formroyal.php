<html>
<head>
    <title>
        Print the content of a div
    </title>

</head>

    <style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>


<?php
function DateThai($strDate)
{
    $strYear = date("Y",strtotime($strDate))+543;
    $strMonth= date("n",strtotime($strDate));
    $strDay= date("j",strtotime($strDate));
    $strHour= date("H",strtotime($strDate));
    $strMinute= date("i",strtotime($strDate));
    $strSeconds= date("s",strtotime($strDate));
    $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
    $strMonthThai=$strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear"; //, $strHour:$strMinute";
}
function MyTime($strDate)
{
    $strYear = date("Y",strtotime($strDate))+543;
    $strMonth= date("n",strtotime($strDate));
    $strDay= date("j",strtotime($strDate));
    $strHour= date("H",strtotime($strDate));
    $strMinute= date("i",strtotime($strDate));
    $strSeconds= date("s",strtotime($strDate));
    $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
    $strMonthThai=$strMonthCut[$strMonth];
    return "$strHour:$strMinute:$strSeconds";
}
?>
<?php
$servername='localhost';
$username='c47muangkaen';
$password='muan46D&';
$dbname = "c47muangkaen";
$conn = mysqli_connect($servername, $username, $password, "$dbname");
if (!$conn) {
die('Could not Connect MySql Server:' . mysql_error());
}
?>



<body>
<div id='GFG'>
<?php
$query = "SELECT * FROM blessing_word" or die("Error:" . mysqli_error());
$result = mysqli_query($conn, $query);

echo "<table border='1' align='center' width='900'>";

echo "

  <tr align='center' bgcolor='#CCCCCC'>
    <td>คำถวายพระพร</td>
    <td>ชื่อ</td>
    <td>วันที่ - เวลา</td>
  </tr>
  </div> ";
while($row = mysqli_fetch_array($result)) {
    echo "<div id='GFG' style='background-color: green;'>";
    echo "<tr>";
    echo "<td>" .$row["word"] .  "</td> ";
    echo "<td>".$row["name"] .  "</td> ";
    echo "<td>" .DateThai($row["postime"]). ' - ' .MyTime($row["postime"]). ' น.' .  "</td> ";
    echo "</tr>";
    echo "</div>";
}
echo "</table>";

?>
</div>
<br>
<input type="button" value="พิมพ์คำถวายพระพร" onclick="printDiv()">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function printDiv() {
        var divContents = document.getElementById("GFG").innerHTML;
        var a = window.open('', '', 'height=900, width=1600');
        a.document.write('<html>');
        a.document.write('<body>');
        a.document.write(divContents);
        a.document.write('</body></html>');
        a.document.close();
        a.print();
    }
</script>

</body>

</html>