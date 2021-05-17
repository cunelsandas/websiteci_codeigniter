$('.datepick').datepicker({
    todayBtn: "linked",
    autoclose: true,
    todayHighlight: true,
    language: "th-th"
});

$('.select').select2({
    theme: "bootstrap4"
});

function Splitdate(date) {
    if (date != '') {
        date = date.split('/');
        date[2] = date[2] - 543;
        date = date[2] + '-' + date[1] + '-' + date[0];
    }
    return date;
}

function SplitAr(date) {
    if (date != '') {
        date = date.split('/');
        date = date[0];
    }
    return date;
}

function DateT(n) {
    var datethai = ["", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค."];
    if (n != null && n != '') {
        var SHdate = new Date(n)

        function ga(date) {
            return date < 10 ? "0" + date : date;
        }

        return ga(SHdate.getDate()) + ' ' + datethai[(SHdate.getMonth() + 1)] + ' ' + (SHdate.getFullYear() + 543);
    } else {
        return '';
    }

};
var DateNow = new Date();
DateNow = DateT(DateNow);

var TextEdit = (function () {
    function Number(num) {
        return num != null && num != undefined && num != 0 ? parseFloat(num).toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") : '';
    };

    function NumberString(num) {
        return num != null && num != undefined && num != 0 ? parseFloat(num).toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") : '';
    };

    function Text(text) {
        return text == null ? '' : text;
    };

    // function DateT(n) {
    //     if(n != ''){
    //         var SHdate = new Date(n)
    //         function ga(date) {
    //             return date < 10 ? "0" + date : date;
    //         }
    //         return ga(SHdate.getDate()) + '/' + ga((SHdate.getMonth() + 1)) + '/' + (SHdate.getFullYear() + 543);
    //     }else {
    //         return '';
    //     }
    //
    // };
    //

})();

function Textnull(text) {
    return text == null ? '' : text;
};
$('.table-data').DataTable({
    'language': {
        'sProcessing': 'กำลังดำเนินการ...',
        'sLengthMenu': 'แสดง _MENU_ แถว',
        'sZeroRecords': 'ไม่พบข้อมูล',
        'sInfo': 'แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว',
        'sInfoEmpty': 'แสดง 0 ถึง 0 จาก 0 แถว',
        'sInfoFiltered': '(กรองข้อมูล _MAX_ ทุกแถว)',
        'sInfoPostFix': '',
        'sSearch': 'ค้นหา: ',
        'sUrl': '',
        'oPaginate': {
            'sFirst': 'หน้าแรก',
            'sPrevious': 'ก่อนหน้า',
            'sNext': 'ถัดไป',
            'sLast': 'หน้าสุดท้าย'
        }
    }
});

function ajax2data(data, url, fnc) {
    $.ajax({
        type: 'POST',
        url: url,
        data: {data: data},
        dataTypes: 'JSON',
        success: function (response) {
            fnc(response);
        }, error: function (response) {
        }
    });
}

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
});
$('#summernote').summernote({
    height: 250,
    lang: 'th-TH'
});
$('#summernote-post').summernote({
    toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']]
    ],
    height: 250,
    lang: 'th-TH'
});
function add_btn() {
    var $add_btn = $('#add_btn');
    var $btn = '<button type="submit" name="submit" class="btn btn-success btn-block">บันทึก</button>';
    $add_btn.append($btn);
}
