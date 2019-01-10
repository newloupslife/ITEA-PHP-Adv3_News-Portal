var $likeBtn = $('#js-post-like-btn');

$likeBtn.on('click', function (e) {
    e.preventDefault();

    var $this = $(this);
    var apiAndpoint = $this.attr('href');

    $.ajax({
        method: 'POST',
        url: apiAndpoint
    }).done(function (response) {
        $this.html(response.count);
    });
});

$('#js-post-dislike-btn').on('click', function (e) {
    e.preventDefault();

    $likeBtn.html('Like');
});
