var csrf = $('meta[name=csrf-token]').attr("content");
var mainUrl = $('meta[name=base_url]').attr("content");

function updateOrder() {
    let orders = [];
    document.querySelectorAll('.order-edit').forEach(function(td) {
        const id = parseInt(td.getAttribute('data-id'));
        const orderValue = td.innerText.trim();
        const order = parseInt(orderValue, 10);

        if (!isNaN(id) && !isNaN(order) && /^\d+$/.test(orderValue)) {
            orders.push({
            id: id,
            order: order
            });
        }else {
            // If the order value is invalid, alert the user and skip this entry
            td.classList.add('text-bg-danger');
            alert('Invalid order value for ID: ' + id);
            return;
        }
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
