$(function () {
    // Initialize DataTable without pagination and disable sorting on the first column (Order)
    $("#table").DataTable({
        "paging": false,
        "ordering": false, // Disable ordering on all columns
        "searching": false
    });

    $("#tableBodyContents").sortable({
        items: "tr",
        cursor: 'move',
        opacity: 0.6,
        update: function() {
            sendOrderToServer();
        }
    });

    function sendOrderToServer() {

        var order = [];
        var token = $('meta[name="csrf-token"]').attr('content');
        var mainUrl = $('meta[name=base_url]').attr("content")

        $('tr.tableRow').each(function(index,element) {
            order.push({
                id: $(this).attr('data-id'),
                position: index+1
            });
        });

        $.ajax({
            type: "PUT",
            dataType: "json",
            url: mainUrl+"/projects/order",
            data: {
                order: order,
                _token: token
            },
            success: function(response) {
                if (response.status == "success") {
                    console.log(response);
                } else {
                    console.log(response);
                }
            }
        });
    }
});

