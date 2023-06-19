$(document).ready(function() {

    $('.zero-configuration').DataTable();

    $(".isActiveElement").change(function () {
        var data = $(this).prop("checked");
        var data_url = $(this).data("url");
    
        if (typeof data !== "undefined" && typeof data_url !== "undefined") {
            $.get(data_url, { data: data }, function (response) {
                $("#up-control-" + response).load(" #up-control-" + response);
                toastr.success('The status changed successfully', 'Modifying data', { "closeButton": true });
            });
        }
    });

    $(".changeOrder").sortable();

    $(".changeOrder").on("sortupdate", function(event, ui){
        
        var data = $(this).sortable("serialize");
        var data_url = $(this).data("url");
        $.get(data_url, {data : data}, function(response){
            for(var i=0; i<response.length; i++) {
                $(".orden-"+response[i]).load(" .orden-"+response[i]);
                $(".loop-"+response[i]).load(" .loop-"+response[i]);
            }
            toastr.success('Changed the order of the list', 'Modifying data', { "closeButton": true });
        });
    });

    $(".activeLastDate").change(function () {
        var data = $(this).prop("checked");
        if(data) {
            $(".date_month_finish").prop( "disabled", true );
            $(".date_year_finish").prop( "disabled", true );
        } else {
            $(".date_month_finish").prop( "disabled", false );
            $(".date_year_finish").prop( "disabled", false );
        }
    });

    $(".select_category").change(function () {
        var data = $(this).prop("checked");
        var value = $(this).val();
        var data_url = $(this).data("url");

        $.get(data_url, {data : data, value : value}, function(response){
            console.log(response);
            toastr.success('The categories were modified', 'Modifying data', { "closeButton": true });
        });

    });

    $(".isHeadElement").click(function () {
        var data_id = $(this).data('id');
        var data_proy = $(this).data('proy');
        var data_head = $(this).data('head');
        var data_url = $(this).data("url");

        $.get(data_url, { 
            data_id : data_id, 
            data_head : data_head,
            data_proy : data_proy
        }, function (response) {
            //console.log(response);
            for(var i=1; i<=response; i++) {
                $('#select-head-'+i).load(' #select-head-'+i);
                console.log('#select-head-'+i);
            }
            toastr.success('The status changed successfully', 'Modifying data', { "closeButton": true });
            //window.location.reload(true);
            //window.location.replace(window.location.href + '#sec_gallery');
            //window.location.href='#sec_gallery'
        });
    });

});