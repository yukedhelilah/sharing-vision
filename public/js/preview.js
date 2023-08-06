$(document).ready(function() {
    getData();
})

function getData() {
    $.ajax({
        url: "api/v1/article/100/0",
        type: "GET",
        beforeSend: function() {
            $('#preview').empty();
        },
        success: function(response) {
            $.each(response.data, function(key, value) {
                if(value.status == 'Publish'){
                    $('#preview').append(`
                        <div class="col-sm-6 col-lg-4">
                            <div class="card">
                                <img src="assets/images/small/img-3.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">`+ value.title +`</h5>
                                    <p class="card-text">`+ value.content +`</p>
                                </div>
                            </div>
                        </div>
                    `);
                }
            })
        },
    })
}
