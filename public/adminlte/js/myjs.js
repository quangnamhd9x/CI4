jQuery(document).ready(function($) {
    $('#image').click(function() {
        $('#exampleModal').modal('show');
        $('#exampleModal').on('hide.bs.modal', function() {
            var imgUrl = $('#image').val();
            $('#show_img').attr('src', imgUrl);
        });
    });
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#avatar').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
};



function addcommas(x) {
    //remove commas
    if (x !== '-') {
        retVal = x ? parseFloat(x.replace(/,/g, '')) : '';
    } else {
        retVal = '-';
        return retVal;
    }

    if (!isNaN(retVal)) {
        //apply formatting
        return retVal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    } else {
        retVal = '';
        return retVal;
    }
};

jQuery(document).ready(function($) {
    $('#example').DataTable();
});

function fnExcelReport() {
    var tab_text = '<html xmlns:x="urn:schemas-microsoft-com:office:excel">';
    tab_text = tab_text + '<head><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet>';

    tab_text = tab_text + '<x:Name>Test Sheet</x:Name>';

    tab_text = tab_text + '<x:WorksheetOptions><x:Panes></x:Panes></x:WorksheetOptions></x:ExcelWorksheet>';
    tab_text = tab_text + '</x:ExcelWorksheets></x:ExcelWorkbook></xml></head><body>';

    tab_text = tab_text + "<table border='1px'>";
    tab_text = tab_text + $('#example').html();
    tab_text = tab_text + '</table></body></html>';

    tab_text = tab_text.replace(/<A[^>]*>|<\/A>/g, ""); //remove if u want links in your table
    tab_text = tab_text.replace(/<img[^>]*>/gi, ""); // remove if u want images in your table
    tab_text = tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params
    var data_type = 'data:application/vnd.ms-excel';

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE ");

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
        if (window.navigator.msSaveBlob) {
            var blob = new Blob([tab_text], {
                type: "application/csv;charset=utf-8;"
            });
            navigator.msSaveBlob(blob, 'NhuThat.xls');
        }
    } else {
        $('#test').attr('href', data_type + ', ' + encodeURIComponent(tab_text));
        $('#test').attr('download', 'NhuThat.xls');
    }
}