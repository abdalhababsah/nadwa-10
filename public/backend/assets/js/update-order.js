var csrf = $('meta[name=csrf-token]').attr("content");
var mainUrl = $('meta[name=base_url]').attr("content");

function updateOrder() {
    let orders = [];
    document.querySelectorAll('.order-edit').forEach(function(td) {
        orders.push({
            id: parseInt(td.getAttribute('data-id')),
            order: parseInt(td.innerText.trim())
        });
    });
    
    fetch(mainUrl+"/projects/order", {
        method: "PUT",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrf
        },
        body: JSON.stringify({orders: orders})
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Order updated successfully!');
            location.reload();
        } else {
            alert('Failed to update order.');
        }
    })
    .catch(() => alert('Error updating order.'));
}
