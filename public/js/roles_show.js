$(document).ready(function () {
    $('.js-like-role').on('click', function (e) {
        e.preventDefault();

        var $link = $(e.currentTarget);
        $link.toggleClass('fa-heart-o').toggleClass('fa-heart');

        $.ajax({
            method: 'POST',
            url: $link.attr('href')
        }).done(function (data) {
            $('.js-like-role-count').html(data.hearts);
        })


    })
})