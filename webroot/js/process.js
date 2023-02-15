$(function(){

    // Ajax csrf token setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
        }
    });

    // ajax request to save citizen
    $("#frm-add-citizen").on("click", function(){

        var postdata = $("#frm-citizen").serialize();

        $.ajax({
            url: "/ajax-add-citizen",
            data: postdata,
            type: "JSON",
            method: "post",
            success:function(response){

                window.location.href = '/'
            }
        });
    });

    // ajax request to update citizen
    $("#frm-edit-citizen").on("click", function(){

        var postdata = $("#frm-citizen").serialize();

        $.ajax({
            url: "/ajax-edit-citizen",
            data: postdata,
            type: "JSON",
            method: "post",
            success:function(response){

                window.location.href = '/'
            }
        });
    });

    // ajax request to delete citizen
    $(document).on("click", ".btn-delete-citizen", function(){

        if(confirm("Вы уверены, что хотите удалить?")){

            var postdata = "id=" + $(this).attr("data-id");
            $.ajax({
                url: "/ajax-delete-citizen",
                data: postdata,
                type: "JSON",
                method: "post",
                success:function(response){

                    window.location.href = '/'
                }
            });
        }
    });
});
