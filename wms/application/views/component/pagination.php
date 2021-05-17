<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 26/3/2561
 * Time: 15:55
 */
?>
<div class="row">
    <div class="col-lg-12">
        <nav aria-label="Page navigation example">
            <ul class="pagination pagination-sm justify-content-center">
                <?php
                $pageShow = 5;
                $pagelimit = floor($pageShow / 2);
                $disback = ($pageNow == 1) ? 'disabled' : '';
                $disgo = ($pageNow == $page || $page == 0) ? 'disabled' : '';
                $Page2 = $pageNow > $pagelimit ? $pageNow + $pagelimit : $pageShow;
                $PageChk = $Page2 - $page;
                $Page1 = $Page2 - $page > 0 ? $pageNow - ($pagelimit + $PageChk) : $pageNow - $pagelimit;
                //                echo $PageChk;
                ?>
                <li class="page-item <?php echo $disback; ?>">
                    <a class="page-link" href="#" tabindex="-1" data-href="<?php echo $site . 1 ?>">หน้าแรก</a>
                </li>
                <li class="page-item <?php echo $disback; ?>">
                    <a class="page-link" href="#" tabindex="-1" data-href="<?php echo $site . ($pageNow - 1) ?>">ย้อนกลับ</a>
                </li>

                <?php if ($page != 0): ?>
                    <?php
                    $active = 'active';
                    $x = 0;
                    for ($i = 1; $i <= $page; $i++):?>
                        <?php if ($i != $pageNow && $i >= $Page1 && $i <= $Page2): ?>
                            <li class="page-item">
                                <a class="page-link" href="" data-href="<?php echo $site . $i ?>"><?php echo $i ?></a>
                            </li>
                        <?php elseif ($i == $pageNow): ?>
                            <li class="page-item active">
                                <a class="page-link" href="" data-href="<?php echo $site . $i ?>"><?php echo $i ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endfor; ?>
                <?php else: ?>
                    <li class="page-item active">
                        <a class="page-link" href="" data-href="<?php echo $site . (1) ?>">1</a>
                    </li>
                <?php endif; ?>

                <li class="page-item <?php echo $disgo; ?>">
                    <a class="page-link" href="" data-href="<?php echo $site . ($pageNow + 1) ?>">ถัดไป</a>
                </li>
                <li class="page-item <?php echo $disgo; ?>">
                    <a class="page-link" href="" data-href="<?php echo $site . ($page); ?>">หน้าสุดท้าย</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
