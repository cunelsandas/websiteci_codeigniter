<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 17/1/2561
 * Time: 13:40
 */

function ExpoldDate($date)
{
    if ($date != '') {
        $Date = explode('/', $date);
        return $Date[2] - 543 . '-' . $Date[1] . '-' . $Date[0];
    }
    return '0000-00-00';

}

function DateB($strDate)
{
    if ($strDate != '') {
        list ($y, $m, $d) = explode('-', $strDate);
        $dob = sprintf("%02d/%02d/%04d", $d, $m, $y + 543);
        return $dob;
    }
}

function DateThaiNa($strDate)
{
    if ($strDate != '') {
        $strMonthCut = Array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
        list ($y, $m, $d) = explode('-', $strDate);
        $strMonthThai = $strMonthCut[number_format($m)];
        $dob = sprintf("%02d $strMonthThai %04d", $d, $y + 543);

        return $dob;
    }
//    return "$strDay $strMonthThai $strYear"; //, $strHour:$strMinute";
}

function thai_date_and_time_short($time)
{
    $thai_month_arr_short = array('0' => '', '1' => 'ม.ค.', '2' => 'ก.พ.', '3' => 'มี.ค.', '4' => 'เม.ย.', '5' => 'พ.ค.', '6' => 'มิ.ย.', '7' => 'ก.ค.', '8' => 'ส.ค.', '9' => 'ก.ย.', '10' => 'ต.ค.', '11' => 'พ.ย.', '12' => 'ธ.ค.');
    $thai_date_return = date('j', $time);
    $thai_date_return .= '&nbsp;&nbsp;' . $thai_month_arr_short[date('n', $time)];
    $thai_date_return .= ' ' . (date('Y', $time) + 543);
    $thai_date_return .= ' ' . date('H:i:s', $time);
    if ($time != '') {
        return $thai_date_return;
    } else {
        return '';
    }
}

function thai_date($time)
{
    $thai_day_arr = array("อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัสบดี", "ศุกร์", "เสาร์");
    $thai_month_arr = array(
        "0" => "",
        "1" => "มกราคม",
        "2" => "กุมภาพันธ์",
        "3" => "มีนาคม",
        "4" => "เมษายน",
        "5" => "พฤษภาคม",
        "6" => "มิถุนายน",
        "7" => "กรกฎาคม",
        "8" => "สิงหาคม",
        "9" => "กันยายน",
        "10" => "ตุลาคม",
        "11" => "พฤศจิกายน",
        "12" => "ธันวาคม"
    );
    $thai_date_return = "วัน" . $thai_day_arr[date("w", $time)];
    $thai_date_return .= "ที่ " . date("j", $time);
    $thai_date_return .= " เดือน" . $thai_month_arr[date("n", $time)];
    $thai_date_return .= " พ.ศ." . (date("Y", $time) + 543);
    $thai_date_return .= "  " . date("H:i", $time) . " น.";
    return $thai_date_return;
}

function DateTimeThai($strDate)
{
    $strYear = date("Y", strtotime($strDate)) + 543;
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strHour = date("H", strtotime($strDate));
    $strMinute = date("i", strtotime($strDate));
    $strSeconds = date("s", strtotime($strDate));
    $strMonthCut = Array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
    $strMonthThai = $strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear เวลา : $strHour:$strMinute:$strSeconds";
}

?>
