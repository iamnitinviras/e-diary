var page = 1;

$(document).ready(function (e){
    $("#load-more-data").on("click",function (e) {
        var $this = $(this);
        let url=$($this).data('url');
        page++;
        infinteLoadMore(page,url);
    });
});

function infinteLoadMore(page,url) {

    $.ajax({
        url: url + "&page=" + page,
        datatype: "html",
        type: "get",
        beforeSend: function () {
            $('.auto-load').show();
        }
    }).done(function (response) {
        $('.auto-load').hide();
        if (response.html == '') {
            $('#load_more_button').addClass('d-none');
            return;
        }
        $("#blog_parent_div").append(response.html);
    })
    .fail(function (jqXHR, ajaxOptions, thrownError) {
        console.log('Server error occured');
    });
}
