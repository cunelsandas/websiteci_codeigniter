<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 19/2/2561
 * Time: 14:04
 */
//$menu = GetMenu();

$menu = GetGroupMenu();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <a class="navbar-brand btn btn-dark text-light" href="<?php echo site_url('home') ?>">WMSi</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon text-light"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <?php foreach ($menu as $key => $menu): ?>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle btn btn-dark" href="#" id="navbarDropdownMenuLink"
                       data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <?php echo $menu['name']; ?>
                        <?php $submenu = GetMenuSub($menu['id']); ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <?php foreach ($submenu as $item): ?>
                            <a class="dropdown-item"
                               href="<?php echo site_url($item['controller'] . '/' . $item['name_type']) ?>"><?php echo $item['sub_name']; ?></a>
                        <?php endforeach; ?>
                    </div>
                </li>
            </ul>
        <?php endforeach; ?>
    </div>
</nav>
