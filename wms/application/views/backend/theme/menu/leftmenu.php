<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 19/2/2561
 * Time: 14:05
 */
$menu = GetGroupMenu();
?>
<div id="accordion">
    <?php foreach ($menu as $key => $menu) : ?>
        <div class="card">
            <div class="text-center" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-success btn-block" data-toggle="collapse"
                            data-target="#<?php echo $menu['id'] ?>"
                            aria-expanded="true"
                            aria-controls="collapseOne">
                        <?php echo $menu['name'] ?>
                    </button>
                </h5>
            </div>
            <div id="<?php echo $menu['id'] ?>" class="collapse" aria-labelledby="headingOne"
                 data-parent="#accordion">
                <div class="card-body">
                    <ul style="list-style-type: none;padding: 0;margin: 0;">
                        <?php $submenu = GetMenuSub($menu['id']) ?>
                        <?php foreach ($submenu as $item): ?>
                            <li>
                                <a href="<?php echo site_url($item['controller'] . '/' . $item['name_type']) ?>"
                                   class="btn btn-outline-light btn-block text-left text-dark"><?php echo $item['sub_name'] ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

