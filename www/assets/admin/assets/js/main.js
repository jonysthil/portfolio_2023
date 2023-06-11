$(document).ready(function() {

    $('.zero-configuration').DataTable();

    $(".isActiveElement").change(function () {
        var data = $(this).prop("checked");
        var data_url = $(this).data("url");
    
        if (typeof data !== "undefined" && typeof data_url !== "undefined") {
            $.get(data_url, { data: data }, function (response) {
                $("#up-control").load(" #up-control");
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
            $(".exp_month_finish").prop( "disabled", true );
            $(".exp_year_finish").prop( "disabled", true );
        } else {
            $(".exp_month_finish").prop( "disabled", false );
            $(".exp_year_finish").prop( "disabled", false );
        }
    });

    

});