<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 17/2/2561
 * Time: 9:23
 */
?>
<!doctype html>
<html lang="en">
<head>

    <style>
        @font-face {
            font-family: 'fc_lamoonbold';
            src: url('font/fc_lamoon_bold_ver_1.00-webfont.eot');
            src: url('font/fc_lamoon_bold_ver_1.00-webfont.eot?#iefix') format('embedded-opentype'),
            url('font/fc_lamoon_bold_ver_1.00-webfont.woff2') format('woff2'),
            url('font/fc_lamoon_bold_ver_1.00-webfont.woff') format('woff'),
            url('font/fc_lamoon_bold_ver_1.00-webfont.ttf') format('truetype'),
            url('font/fc_lamoon_bold_ver_1.00-webfont.svg#fc_lamoonbold') format('svg');
            font-weight: normal;
            font-style: normal;

        }

        @font-face {
            font-family: 'fc_lamoonregular';
            src: url('font/fc_lamoon_regular_ver_1.00-webfont.eot');
            src: url('font/fc_lamoon_regular_ver_1.00-webfont.eot?#iefix') format('embedded-opentype'),
            url('font/fc_lamoon_regular_ver_1.00-webfont.woff2') format('woff2'),
            url('font/fc_lamoon_regular_ver_1.00-webfont.woff') format('woff'),
            url('font/fc_lamoon_regular_ver_1.00-webfont.ttf') format('truetype'),
            url('font/fc_lamoon_regular_ver_1.00-webfont.svg#fc_lamoonregular') format('svg');
            font-weight: normal;
            font-style: normal;

        }
    </style>

    <meta charset="UTF-8">
<!--    <meta name="viewport"-->
<!--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
    <meta name="viewport" content="width=1600, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="logo.png" type="image/icon type">

    <?php
    $title = isset($data['set']['subject']) ? $data['set']['subject'] : '';
    $set_no = isset($data['set']['no']) ? $data['set']['no'] : '';
    $files = isset($data['table_name']) ? search_img_one($data['table_name'], $set_no) : '';
    $folder_name = isset($data['folder_name']) ? $data['folder_name'] : '';
    $uri = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    ?>
    <meta property="og:url" content="<?php echo $uri ?>"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="<?php echo $title; ?>"/>
    <meta property="og:description" content="<?php echo $title; ?>"/>
    <meta property="og:image" content="<?php echo get_ul($files, $folder_name) ?>"/>

    <link rel="stylesheet" href="<?php echo base_url('assets/css/menu-top-ct.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/animate.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/plugin/datepicker-thai/datepicker.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/font/thsarabunnew.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/font/THFahkwang.css') ?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/plugin/font-awesome/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/plugin/datepicker-thai/datepicker.css') ?>">

    <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
    <!--    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>-->
    <script src="<?php echo base_url('assets/js/popper.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>

    <script src="<?php echo base_url('assets/plugin/auto-format/jquery.maskedinput.js') ?>"></script>

    <script src="<?php echo base_url('assets/plugin/parallax/parallax.min.js') ?>"></script>

    <script src="<?php echo base_url('assets/plugin/datepicker-thai/bootstrap-datepicker.js') ?>"></script>
    <script src="<?php echo base_url('assets/plugin/datepicker-thai/bootstrap-datepicker-thai.js') ?>"></script>
    <script src="<?php echo base_url('assets/plugin/datepicker-thai/bootstrap-datepicker.th.js') ?>"></script>

    <link rel="stylesheet" href="<?php echo base_url('assets/plugin/select2/select2.min.css') ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/plugin/select2/select2-bootstrap4.css') ?>"/>

    <link rel="stylesheet" href="<?php echo base_url('assets/plugin/dataTable/css/dataTables.bootstrap4.min.css') ?>"/>
    <script src="<?php echo base_url('assets/plugin/select2/select2.min.js') ?>"></script>

    <link href="<?php echo base_url('assets/plugin/viewer/viewer.css') ?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/plugin/viewer/viewer.js') ?>"></script>

    <script src="<?php echo base_url('assets/plugin/dataTable/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/plugin/dataTable/js/dataTables.bootstrap4.min.js') ?>"></script>

    <script src="<?php echo base_url('assets/plugin/pagination/jquery.twbsPagination.js') ?>"></script>

    <link href="<?php echo base_url('assets/plugin/fullcalendar/fullcalendar.css') ?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/plugin/fullcalendar/moment.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/plugin/fullcalendar/fullcalendar.js') ?>"></script>
    <script src="<?php echo base_url('assets/plugin/fullcalendar/locale/th.js') ?>"></script>

    <link href="<?php echo base_url('assets/plugin/summernote/summernote-bs4.css') ?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/plugin/summernote/summernote-bs4.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/plugin/summernote/lang/summernote-th-TH.js') ?>"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/plugin/froala_editor/css/froala_editor.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/plugin/froala_editor/css/froala_style.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/plugin/froala_editor/css/plugins/code_view.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/plugin/froala_editor/css/plugins/colors.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/plugin/froala_editor/css/plugins/emoticons.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/plugin/froala_editor/css/plugins/image_manager.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/plugin/froala_editor/css/plugins/image.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/plugin/froala_editor/css/plugins/line_breaker.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/plugin/froala_editor/css/plugins/table.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/plugin/froala_editor/css/plugins/char_counter.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/plugin/froala_editor/css/plugins/video.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/plugin/froala_editor/css/plugins/fullscreen.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/plugin/froala_editor/css/plugins/file.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/plugin/froala_editor/css/plugins/quick_insert.css') ?>">

<!--    <link rel="icon" href="--><?php //echo base_url('img/icon.ico') ?><!--" type="image/icon" sizes="16x16">-->
    <link rel="icon" href="<?php echo get_img('icon.ico', '') ?>" type="image/icon" sizes="16x16">
    <title><?php echo WEBNAME; ?></title>

</head>