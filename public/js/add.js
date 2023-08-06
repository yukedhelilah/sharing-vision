$(document).ready(function() {
    $('#draft').click( function() {
        submitForm('Draft');
    });

    $('#publish').click( function() {
        submitForm('Publish');
    });
})

function submitForm(status) {
    $.ajax({
        url: "api/v1/article/",
        type: "POST",
        data: {
            title   : $('#title').val(),
            category: $('#category').val(),
            content : $('#content').val(),
            status  : status,
        },
        success: function(response) {
            window.location.href = '/'
        },
    })
}
