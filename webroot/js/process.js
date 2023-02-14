$(function(){

    // Ajax csrf token setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
        }
    });

    // ajax request to save citizen
    $("#frm-add-citizen").on("submit", function(){

        var postdata = $("#frm-add-citizen").serialize();
        $.ajax({
            url: "/ajax-add-citizen",
            data: postdata,
            type: "JSON",
            method: "post",
            success:function(response){

                window.location.href = '/list-citizens'
            }
        });
    });

    // ajax request to update citizen
    $(document).on("submit", "#frm-edit-citizen", function(){

        var postdata = $("#frm-edit-citizen").serialize();

        $.ajax({
            url: "/ajax-edit-citizen",
            data: postdata,
            type: "JSON",
            method: "post",
            success:function(response){

                window.location.href = '/list-citizens'
            }
        });
    });

    // ajax request to delete citizen
    $(document).on("click", ".btn-delete-citizen", function(){

        if(confirm("Вы уверены, что хотите удалить?")){

            var postdata = "citizen_name=" + $(this).attr("data-name");
            $.ajax({
                url: "/ajax-delete-citizen",
                data: postdata,
                type: "JSON",
                method: "post",
                success:function(response){

                    window.location.href = '/list-citizens'
                }
            });
        }
    });
});
