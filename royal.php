<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<style>
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
    @import url(font/thsarabunnew.css);
    @import url('https://fonts.googleapis.com/css2?family=Charm&display=swap');


    html {
        scroll-behavior: smooth;
    }


    .red-square {
        width: 100%;
        height: 300px;
        position: absolute;
        left: 50%;
        top: 140%;
        transform: translate(-50%, -50%);
    }
    

    #section1 {
        height: 100vh;
    }

    #blessingsign {
        height: 100vh;
    }
    #section3 {
        height: 600px;
        background-color: white;
    }
    img {
        position: absolute;
        /*left:200px;*/
        top: 0px;
        z-index: -1;
        width: 100%;
        height: auto;
    }

    p {
        font-family:THSarabunNew;
        font-size: 25px;
        font-weight: bold;
        color: #4d2800;
        z-index: 1;
        padding-top: 340px;
        padding-left: 650px;
    }

    .clickable {
        height: 130%;
        width: 50%;
        margin-left: 50%;
        top: 0;
        float: right;
        z-index: 1;
    }
    .clickable2 {
        height: 100%;
        width: 50%;
        left: 0;
        top: 0;

        position: absolute;
        z-index: 1;
</style>
<html>
<head>
    <title> ทีฆายุโก โหตุ มหาราชา ด้วยเกล้าด้วยกระหม่อมขอเดชะ ข้าพระพุทธเจ้า คณะผู้บริหาร พนักงานจ้าง สภาชิกสภา และเจ้าหน้าที่เทศบาลเมืองเมืองแกนพัฒนา  </title>
    <meta name="Generator" content="EditPlus">
    <meta name="Author" content="">
    <meta name="Keywords" content="">
    <meta name="Description" content="">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="icon" href="logo.png" type="image/icon type">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body style="background-color: #ffffcc">
<div class="main" id="section1">
    <a href="index.php"><span class="clickable"></span></a>

    <br>
    <div>
        <img style="height: auto" src="1504252.png">

        <p>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;

            <!--        <p>Click on the link to see the "smooth" scrolling effect.</p>-->
            <!--        <p>Note: Remove the scroll-behavior property to remove smooth scrolling.</p>-->

    </div>
</div>
<br>
<br>
<br>

<a href="#blessingsign" class="clickable2"><img src="imgindex/button/1.png" style="margin-top: 105%;margin-left:20%;width: 300px;height: 80px" ></a>

<a href="index.php" class="clickable"><img src="imgindex/button/2.png" style="margin-top: 52.5%;margin-left:20%;width: 300px;height: 80px" ></a>

<div class="main" id="blessingsign">
<!--    <h2>Section 2</h2>-->
    <form action="insert.php" method="post">
        <!--    <div>-->
        <!--        <img class="center" style="width: 600px;margin-left:17% " align="middle" src="11789913944839.jpg">-->
        <!--    </div>-->
        <!--    <div>-->
        <!--        <img class="center" style="margin-left: 17%;width: 600px;margin-top: 20%" src="11789913899120.jpg">-->
        <!--    </div>-->

        <div class="red-square" style="margin-top: 2%">
            <div class="form-group">
                <label style="color: black;font-family:'Charm', cursive;font-size: 1.5rem;text-align: center;margin-left: 40%;text-decoration: underline">ขอเชิญร่วมลงนามถวายพระพร</label><br>
                <label style="font-family:'Charm', cursive;font-size: 1.5rem;color: black; margin-left: 38%">เนื่องในโอกาสวันเฉลิมพระชนมพรรษา</label><br>
                <label style="font-family:'Charm', cursive;font-size: 1.5rem;color: black;margin-left: 25%;">พระบาทสมเด็จพระปรเมนทรรามาธิบดีศรีสินทรมหาวชิราลงกรณ พระวชิรเกล้าเจ้าอยู่หัว</label><br>
                <br>
                <div style="margin-left: 22%;width: 50%">
                <label style="font-family: 'Charm', cursive;color: black">พิมพ์คำถวายพระพร</label>
                <!--        <select class="form-control" name="word" style="font-family:'Charm', cursive;font-size: 1.5rem ">-->
                <!--            <option value="0">---------------เลือกคำถวายพระพร----------------</option>-->
                <!--            <option value="ขอพระองค์ทรงพระเจริญยิ่งยืนนาน">ขอพระองค์ทรงพระเจริญยิ่งยืนนาน</option>-->
                <!--            <option value="ขอพระองค์ทรงมีพระพลานามัยที่สมบูรณ์ แข็งแรง">ขอพระองค์ทรงมีพระพลานามัยที่สมบูรณ์ แข็งแรง</option>-->
                <!--            <option value="ขอพระองค์ทรงอยู่คู่ฟ้าแผ่นดินสยามยิ่งยืนนาน">ขอพระองค์ทรงอยู่คู่ฟ้าแผ่นดินสยามยิ่งยืนนาน</option>-->
                <!--            <option value="ขอให้พระองค์เป็นดั่งร่มโพธิ์ร่มไทรของพสกนิการไทยตลอดกาลนานเทอญ">ขอให้พระองค์เป็นดั่งร่มโพธิ์ร่มไทรของพสกนิการไทยตลอดกาลนานเทอญ</option>-->
                <!--        </select>-->
                    <div style="font-family:'Charm', cursive; ">
                <textarea rows="6" cols="100" type="text" name="word" class="form-control" required=""  oninvalid="this.setCustomValidity('กรุณาพิมพ์คำถวายพระพร')"
                          oninput="setCustomValidity('')"></textarea>
                    </div>
                </div>
            <div class="form-group col-4" style="margin-left: 21%">
                <label style="font-family: 'Charm', cursive;color: black;font-size: 1.1rem">ข้าพระพุทธเจ้า</label>
                <input type="text" name="name" class="form-control" style="font-family: 'Charm', cursive;" placeholder="ชื่อ - นามสกุล" required="" oninvalid="this.setCustomValidity('กรุณากรอกชื่อ - นามสกุล')"
                       oninput="setCustomValidity('')">
            </div>
                <i class="far fa-pen-nib"></i><input type="submit" style="font-family: 'Charm', cursive;margin-left: 22%" class="btn btn-warning" name="submit" value="ลงนามถวายพระพร">
    </form>
</div>

<marquee  height="250px" style="margin-top: 20%;font-family: 'Charm', cursive;" scrolldelay="200" behavior="scroll" direction="down" onmouseover="this.stop();" onmouseout="this.start();" >
    <?php
    $sql ="SELECT * FROM blessing_word";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))
        {
            echo '<label style="color: black;margin-left:25%;font-size:1.3rem;"> ' .$row['word'].'<br>'. 'ด้วยเกล้าด้วยกระหม่อมข้าพระพุทธเจ้า' .$row['name'].'</label>'.'<br>'.'<br>';
        }
    }
    ?>


</marquee>


<!--         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
<!--		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
<!--		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ด้วยเกล้าด้วยกระหม่อม-->
<!--      <br>-->

<!--   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้าพระพุทธเจ้า ผู้บริหาร สมาชิกสภา ข้าราชการ และพนักงาน-->
<!--      <br>-->
<!--       &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;-->
<!--      เทศบาลเมืองเมืองแกนพัฒนา  จังหวัดเชียงใหม่</p>-->
<!--			<br>-->
<p><a href="default.php"></a></p>

</div>

<!-- <div style="margin-left: 25%;">-->
<!--     <a href="#blessingsign"><img src="imgindex/button/1.png" style="width:300px; height:80px"></a>-->
<!-- </div>-->
<!-- <div style="margin-left: 60%">-->
<!--     <img src="imgindex/button/2.png" style="margin-top: 60%;width: 300px;height: 80px" >-->
<!-- </div>-->


</body>
</html>
