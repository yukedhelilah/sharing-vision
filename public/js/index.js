$(document).ready(function() {
    getData();
})

function getData() {
    $.ajax({
        url: "api/v1/article/100/0",
        type: "GET",
        beforeSend: function() {
            $('#tb-published > tbody, #tb-drafts > tbody, #tb-trashed > tbody').empty();
        },
        success: function(response) {
            noPublished = 1;
            noDrafts    = 1;
            noTrashed   = 1;
            $.each(response.data, function(key, value) {
                action = `<a href="edit/`+ value.id +`" class="btn btn-primary btn-sm waves-effect waves-light mx-1"><i class="fa fa-edit"></i></a>`;
                action += `<a onclick="deleteData(`+ value.id +`)" class="btn btn-danger btn-sm waves-effect waves-light mx-1"><i class="fa fa-trash"></i></a>`;
                if(value.status == 'Publish'){
                    $('#tb-published > tbody').append(`
                        <tr>
                            <td>`+ (noPublished++) +`</td>
                            <td>`+ value.title +`</td>
                            <td>`+ value.category +`</td>
                            <td class="text-center">`+ action +`</td>
                        </tr>
                    `);
                } else if(value.status == 'Draft'){
                    $('#tb-drafts > tbody').append(`
                        <tr>
                            <td>`+ (noDrafts++) +`</td>
                            <td>`+ value.title +`</td>
                            <td>`+ value.category +`</td>
                            <td class="text-center">`+ action +`</td>
                        </tr>
                    `);
                } else if(value.status == 'Trash'){
                    $('#tb-trashed > tbody').append(`
                        <tr>
                            <td>`+ (noTrashed++) +`</td>
                            <td>`+ value.title +`</td>
                            <td>`+ value.category +`</td>
                            <td class="text-center">`+ action +`</td>
                        </tr>
                    `);
                }
            })
        },
    })
}

function deleteData(id) {
    $.ajax({
        url: "api/v1/article/"+id,
        type: "DELETE",
        success: function(response) {
            getData();
        },
    })
}
