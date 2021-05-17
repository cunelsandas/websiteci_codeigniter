<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 9/4/2561
 * Time: 15:04
 */
//var_dump($set_data);
?>
<div class="card card-shadow">
    <div class="card-header">
        <h2><?php echo $head; ?></h2>
    </div>
    <div class="card-body">
        <form action="<?php echo $site; ?>" method="post">
            <div class="row mb-2">
                <div class="col-lg-2 text-lg-right">
                    <b>หน่วยงาน :</b>
                </div>
                <div class="col-lg-8">
                    <select name="type" id="type" class="form-control">
                        <?php foreach ($officer_type as $otKey => $otVal): ?>
                            <option value="<?php echo $otVal['office_type_id'] ?>" <?php echo IsSelect($set_data['offid'], $otVal['office_type_id']) ?>><?php echo $otVal['office_type_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-2 text-lg-right">
                    <b>ชื่อสายงานหลัก :</b>
                </div>
                <div class="col-lg-8" id="set_workgroup"
                     data-set="<?php echo isset($set_data['workgroupid']) ? $set_data['workgroupid'] : ''; ?>">
                    <?php if (isset($work_type)): ?>
                        <select name="work_type" id="work_type" class="form-control">
                            <?php foreach ($work_type as $wtKey => $wtVal): ?>
                                <option value="<?php echo $wtVal['id'] ?>" <?php echo IsSelect($set_data['workgroupid'], $wtVal['id']) ?>><?php echo $wtVal['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    <?php else: ?>
                        <input type="text" class="form-control" value="<?php echo IsVal($set_data['name']) ?>"
                               name="work_name">
                    <?php endif; ?>
                </div>
            </div>
            <?php if (isset($work_type)): ?>
                <div class="row mb-2">
                    <div class="col-lg-2 text-lg-right">
                        <b>ชื่อสายงานย่อย :</b>
                    </div>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" value="<?php echo IsVal($set_data['name']) ?>"
                               name="name">
                    </div>
                </div>
            <?php endif; ?>
            <div class="row mb-2">
                <div class="col-lg-2 text-lg-right">
                    <b>ลำดับการแสดงผล :</b>
                </div>
                <div class="col-lg-8">
                    <input type="text" class="form-control" value="<?php echo IsVal($set_data['listno']) ?>"
                           name="listno">
                </div>
            </div>
            <div class="row mb-2" id="site" data-site="<?php echo site_url('officer/search_group') ?>">
                <div class="col-lg-8 offset-lg-2">
                    <button type="submit" class="btn btn-success btn-block">บันทึก</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php if (isset($work_type)): ?>
    <script>
        var $type_off = $('#type');
        var $select = '';
        var $set_workgroup = $('#set_workgroup').attr('data-set');
        $type_off.change(function () {
            ajax2data({select: $type_off.val(), type: ''}, $('#site').attr('data-site'), function (d) {
                add_select('#work_type', d, 'หัวหน้าฝ่าย/เจ้าหน้าที่');
            });
        });

        function add_select(id, data, name) {
            $(id).empty();
            $(id).append($('<option>', {
                value: 0,
                text: name
            }));
            $.each(data, function (i, item) {
                $select = '';
                $select = item.id == $set_workgroup ? true : false;
                $(id).append($('<option>', {
                    value: item.id,
                    text: item.name,
                    selected: $select
                }));
            });
        }

        ajax2data({select: $type_off.val(), type: ''}, $('#site').attr('data-site'), function (d) {
            add_select('#work_type', d, 'หัวหน้าฝ่าย/เจ้าหน้าที่');
        });
    </script>
<?php endif; ?>
