<meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<script type="text/javascript" src="../../../../assets/plugin/dataTable/js/jquery.dataTables.min.js"></script>
<!--<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>-->
<style>
    body {
        font-family: "FC Lamoon",Serif;
        font-size: 16px;
    }
    @media only screen and (max-width: 600px) {
        * {
            font-size: 14px;
        }
    }
</style>

<div id="electric">


    <div class="container">

        <div class="card card-shadow">
            <div class="card-header">
                <div align="center">
                    <div align="top center"><?php echo"<a style='font-size:28px;text-decoration:underline'>ระบบ RSS เชื่อมโยงระบบจัดซื้อจัดจ้าง (EGP)</a>";?></div><br>
                </div>
                <br>
                <div style="font-size: 20px">
                    <iframe id='subject_only'  src='http://egp.itglobal.co.th/itg/6500706' width="100%" height="400px" frameborder="none" " ></iframe>
                </div>
            </div>
           <div class="col-lg-12 text-center" style="margin: 0 auto;"> <button class="btn btn-outline-secondary" onclick="goBack()">ย้อนกลับ</button></div>

            <script>
                function goBack() {
                    window.history.back();
                }
            </script>
        </div>
    </div>
</div>

