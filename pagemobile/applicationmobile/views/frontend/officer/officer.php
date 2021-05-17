<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 22/3/2561
 * Time: 9:56
 */
$history = '';
?>
<style>
    /*chart*/

    .line {
        margin-left: auto;
        margin-right: auto;
        border-left: 1px dashed #000000;
        width: 0px;
        height: 4em;

    }

    .picbox-big {
        text-align: center;
        margin-left: auto;
        margin-right: auto;
        border: 1px solid #606060;

        color: #000000;
        transition: all 0.5s;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
        border-radius: 5px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        width: 120px;
        height: 180px;
    }

    .picbox-big:hover {
        -webkit-transform: scale(1.5);
        background-color: #efefef;
        color: black;

        transform: scale(1.5);
        -ms-transform: scale(1.5);
        -webkit-transform: scale(1.5);
    }

    .picbox-big img {
        /*	transform: scale(0.5, 0.5);
            -ms-transform: scale(0.5, 0.5);
            -webkit-transform: scale(0.5, 0.5);
            */

        margin-bottom: 10px;
        transition: all 0.5s;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
        width: 120px;
        height: 180px;
    }

    .picbox {
        text-align: center;
        margin-left: auto;
        margin-right: auto;
        border: 1px solid #606060;

        color: #000000;
        transition: all 0.5s;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
        border-radius: 5px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        width: 180px;
        height: 200px;
        font-size: 12px;
    }

    .picbox:hover {
        -webkit-transform: scale(1.5);
        background-color: #efefef;
        color: black;

        transform: scale(1.5);
        -ms-transform: scale(1.5);
        -webkit-transform: scale(1.5);
    }

    .picbox img {
        /*	transform: scale(0.5, 0.5);
            -ms-transform: scale(0.5, 0.5);
            -webkit-transform: scale(0.5, 0.5);
            */

        margin-bottom: 10px;
        transition: all 0.5s;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
        width: 100px;
        height: 120px;
    }

    /* -----------*/
    .hold {
        position: relative;

    }

    .org_title { /* ป้ายชื่อสายงาน*/
        font-size: 12px;
        color: #274ad8;
        margin-bottom: 5px;
        padding: 2px;
    }

    .tree {
        font-size: 8px;
        z-index: 1;
        color: white;
        margin: 0 auto;
        padding-bottom: 50px;
        display: inline-block;

        width: auto;
        /*width:100%; */

        /*   margin-left: auto;
            margin-right: auto;
            */
        background-color: #D8D9DB;
    }

    .tree ul {
        z-index: 1;
        padding-top: 20px;
        position: relative;
        transition: all 0.5s;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
        font-size: 10px;

    }

    .tree li {
        font-size: 8px;
        float: left;
        text-align: center;
        list-style-type: none;
        position: relative;
        padding: 20px 5px 0 5px;
        transition: all 0.5s;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
    }

    /*We will use ::before and ::after to draw the connectors*/
    .tree li::before, .tree li::after {
        content: '';
        position: absolute;
        top: 0;
        right: 50%;
        border-top: 1px solid #000000;
        width: 50%;
        height: 20px;
    }

    .tree li:after {
        right: auto;
        left: 50%;
        border-left: 1px solid #000000;
    }

    /*We need to remove left-right connectors from elements without
any siblings*/
    .tree li:only-child::after, .tree li:only-child::before {
        display: none;
    }

    /*Remove space from the top of single children*/
    .tree li:only-child {
        padding-top: 0;
    }

    /*Remove left connector from first child and
right connector from last child*/
    .tree li:first-child::before, .tree li:last-child::after {
        border: 0 none;
    }

    /*Adding back the vertical connector to the last nodes*/
    .tree li:last-child::before {
        border-right: 1px solid #000000;
        border-radius: 0 5px 0 0;
        -webkit-border-radius: 0 5px 0 0;
        -moz-border-radius: 0 5px 0 0;
    }

    .tree li:first-child::after {
        border-radius: 5px 0 0 0;
        -webkit-border-radius: 5px 0 0 0;
        -moz-border-radius: 5px 0 0 0;
    }

    /*Time to add downward connectors from parents*/
    .tree ul ul::before {
        content: '';
        position: absolute;
        top: 0;
        border-left: 1px solid #000000;
        width: 0;
        height: 20px;
        margin-left: -1px;
    }

    .tree li a {
        border: 1px solid #000000;
        padding: 5px 10px;
        text-decoration: none;
        color: #666;
        /* font-family: arial, verdana, tahoma; */
        /* font-size: 11px; */
        display: inline-block;
        border-radius: 5px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        transition: all 0.5s;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
    }

    /*Time for some hover effects*/
    /*We will apply the hover effect the the lineage of the element also*/
    .tree li a:hover, .tree li a:hover + ul li a {
        background: #c8e4f8;
        color: #000;
        border: 1px solid #94a0b4;
    }

    /*Connector styles on hover*/
    .tree li a:hover + ul li::after, .tree li a:hover + ul li::before, .tree li a:hover + ul::before, .tree li a:hover + ul ul::before {
        border-color: #94a0b4;
    }

    li a.just-line {
        display: none;
    }

    a.just-line + ul {
        padding-top: 74px;
    }

    a.just-line + ul:before {
        height: 74px;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-shadow">
                <div class="card-header text-center">
                    <h2><?php echo $head; ?></h2>
                </div>
                <div class="card-body" style="background-color: #D8D9DB;">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <?php $rsChk = $this->db->select('*')->from('tb_officer_subworkgroup')->where($type)->get()->result_array();
//                            if ($rsChk) {
                                $ChkRow = count($rsChk);  // จำนวนสายงานย่อย
//                            } ?>
                            <div class="tree" id="orgchart">
                                <?php
                                $rsWg = $this->db->select('*')->from($table_name)->where($type)
                                    ->where('workgroupid', 0)->where('status >', 0)
                                    ->order_by('nolist')
                                    ->get()
                                    ->result_array();
                                if ($rsWg) :
                                    $numrow1 = count($rsWg);
                                    if ($numrow1 > 0): ?>
                                        <ul>
                                            <?php
                                            $i = 0;
                                            foreach ($rsWg as $WgKey => $WgVal):
                                                $i += 1;
                                                $path = isset(search_img($table_name, $WgVal['no'])[0]['filename']) ? search_img($table_name, $WgVal['no'])[0]['filename'] : '' ?>
                                                <div class="picbox">
                                                    <?php echo $WgVal['workgroup']; ?>
                                                    <br>
                                                    <img src="<?php echo get_ul($path, $folder_name) ?>">
                                                    <br>
                                                    <?php echo $WgVal['name']; ?>
                                                    <br>
                                                    <?php echo $WgVal['position']; ?>
                                                </div>
                                                <?php echo $history;
                                                if ($i < $numrow1) {
                                                    echo "<span class='line'></span>";
                                                } ?>
                                            <?php endforeach;
                                            $rsw = $this->db->select('*')->from('tb_officer_workgroup')
                                                ->where($type)->order_by('listno')->get()->result_array();
                                            if ($rsw):
                                                $numrow2 = count($rsw); ?>
                                                <ul>
                                                    <?php foreach ($rsw AS $dWorkGroup): ?>
                                                        <li>
                                                            <span class='org_title'><?php echo $dWorkGroup['name']; ?></span>
                                                            <?php
                                                            $rs = $this->db->select('*')->from($table_name)->where($type)
                                                                ->where('workgroupid', $dWorkGroup['id'])->where('subworkgroupid', 0)
                                                                ->where('status >', 0)->order_by('nolist')->get()->result_array();
                                                            $numrow3 = count($rs);
                                                            if ($numrow3 > 0):
                                                                $y = 0;
                                                                foreach ($rs AS $dataWg): $y += 1;
                                                                    $path = isset(search_img($table_name, $dataWg['no'])[0]['filename']) ? search_img($table_name, $dataWg['no'])[0]['filename'] : '' ?>
                                                                    <div class="picbox">
                                                                        <?php echo $dataWg['workgroup']; ?>
                                                                        <br>
                                                                        <img src="<?php echo get_ul($path, $folder_name) ?>">
                                                                        <br>
                                                                        <?php echo $dataWg['name']; ?>
                                                                        <br>
                                                                        <?php echo $dataWg['position']; ?>
                                                                    </div>
                                                                    <?php echo $history;
                                                                    if ($y < $numrow3) {
                                                                        echo "<span class='line'></span>";
                                                                    } ?>
                                                                <?php endforeach; ?>
                                                            <?php endif;
                                                            $rsSub = $this->db->select('*')->from('tb_officer_subworkgroup')
                                                                ->where('workgroupid', $dWorkGroup['id'])
                                                                ->order_by('listno')->get()->result_array();
                                                            ?>
                                                            <ul>
                                                                <?php foreach ($rsSub AS $dSub): ?>
                                                                    <li>
                                                                        <span class='org_title'><?php echo $dSub['name']; ?></span>
                                                                        <?php
                                                                        $rsOff = $this->db->select('*')->from($table_name)->where($type)
                                                                            ->where('workgroupid', $dWorkGroup['id'])
                                                                            ->where('subworkgroupid', $dSub['id'])
                                                                            ->where('status >', 0)->order_by('nolist')->get()->result_array();
                                                                        $numrow4 = count($rsOff);
                                                                        if ($numrow4 > 0):
                                                                            ?>
                                                                            <ul>
                                                                                <li>
                                                                                    <?php $z = 0;
                                                                                    foreach ($rsOff AS $dOff): $path = isset(search_img($table_name, $dOff['no'])[0]['filename']) ? search_img($table_name, $dOff['no'])[0]['filename'] : '' ?>
                                                                                        <div class="picbox">
                                                                                            <?php echo $dOff['workgroup']; ?>
                                                                                            <br>
                                                                                            <img src="<?php echo get_ul($path, $folder_name) ?>">
                                                                                            <br>
                                                                                            <?php echo $dOff['name']; ?>
                                                                                            <br>
                                                                                            <?php echo $dOff['position']; ?>
                                                                                        </div>
                                                                                        <?php echo $history;
                                                                                        if ($z < $numrow4) {
                                                                                            echo "<span class='line'></span>";
                                                                                        } ?>
                                                                                    <?php endforeach; ?>
                                                                                </li>
                                                                            </ul>
                                                                        <?php endif; ?>
                                                                    </li>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php endif; ?>
                                        </ul>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-lg-12 text-center">
                            <a href="#" onclick="window.history.back()" class="btn btn-outline-secondary">ย้อนกลับ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        var Row = "<?php echo $ChkRow?>";
        var dwidth = document.getElementById("orgchart").offsetWidth;
        var picboxWidth = ((dwidth * 0.75) / Row);
        if (Row > 4) {
            if (picboxWidth > 130) {
                picboxWidth = 130;
            }
            var imgWidth = picboxWidth - 10;
            $('.picbox').css('width', picboxWidth + 'px');
            $('.picbox img').css('width', imgWidth + 'px');
        }
    });
</script>