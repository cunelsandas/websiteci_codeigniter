<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 26/4/2561
 * Time: 9:10
 */
?>
<div class="row mt-2">
    <div class="col-2"></div>
    <div class="col-3 pr-lg-1">
        <select name="permission" id="permission" multiple="multiple" class="form-control" size="10">
            <?php foreach ($permission as $pKey => $pVal): ?>
                <option value="<?php echo $pVal['sub_id'] ?>"><?php echo $pVal['sub_name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="col-2 text-center pl-lg-0 pr-lg-0  mt-auto mb-auto">
        <div class="row">
            <div class="col-12 mt-2">
                <a class="btn btn-success btn-action text-white" data-site="<?php echo $site_permission; ?>"> >> </a>
            </div>
            <div class="col-12 mt-2">
                <a class="btn btn-danger btn-action text-white" data-site="<?php echo $site_delpermission; ?>"> << </a>
            </div>
        </div>
    </div>
    <div class="col-3 pl-lg-1">
        <select name="user-permission" id="user-permission" multiple="multiple" class="form-control" size="10">
            <?php foreach ($user_permission as $upKey => $upVal): ?>
                <option value="<?php echo $upVal['sub_id'] ?>"><?php echo $upVal['sub_name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>

<script>
    var $data = [], $BtnAction = $('.btn-action'), $permission = $('#permission'),
        $UserPermission = $('#user-permission'), $user = $('#user');
    $BtnAction.click(function () {
        $data = {
            Permission: $permission.val(),
            UserPermission: $UserPermission.val(),
            User: $user.val(),
            data: $user.val()
        };
        load_page($data, $(this).attr('data-site'), div);
    });
</script>
