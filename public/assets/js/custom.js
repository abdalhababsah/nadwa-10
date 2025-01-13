var mainUrl = $('meta[name=base_url]').attr("content");

function getNearestFormAction(element) { 
    const form = element.closest('form'); 
    return form ? form.action : null; 
}
Dropzone.autoDiscover = false;
var url = getNearestFormAction(document.getElementById('imageDropzone'));

const myDropzone = new Dropzone("#imageDropzone", {
    url: url,
    autoProcessQueue: false,
    uploadMultiple: true,
    addRemoveLinks: true,
    acceptedFiles: "image/*",
    parallelUploads: 10,
    maxFiles: 10,
    paramName: "images[]",
});

document.getElementById('submitBtn').addEventListener('click', function () {
    this.disabled = true;

    // Create a new FormData object
    const formData = new FormData();

    // Append all input fields manually
    formData.append('_token', document.querySelector('input[name="_token"]').value);
    formData.append('title', document.getElementById('title').value);
    formData.append('category', document.getElementById('category').value);
    formData.append('description', document.getElementById('description').value);

    // Append additional images
    myDropzone.getAcceptedFiles().forEach(file => {
        formData.append("images[]", file);
    });
    if (document.getElementById('image').files[0]) {
        formData.append('image_path', document.getElementById('image').files[0]);
    }

    // Check if the input element with name '_method' exists
    var methodInput = document.querySelector('input[name="_method"]');
    if (methodInput) {
        formData.append('_method', methodInput.value);
    }

    // Check if the input element with name '_method' exists
    var imageIds = document.querySelectorAll('input[name="images_id[]"]');
    if (imageIds) {
        $i = 0;
         imageIds.forEach(function(imageId) { 
            formData.append('images_id['+$i+']', imageId.value); 
            $i++;
        }); 
    }

    // Submit the form via Fetch API    
    fetch(url, {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
        },
        body: formData
    })
        .then(response => {
            if (!response.ok) {
                return response.json().then(error => {
                    throw error;
                });
            }
            
            return response.json();
        })
        .then(data => {
            // Redirect to index on success
            window.location.href = mainUrl+'/latest-works';
        })
        .catch(error => {
            console.error('Error:', error);
            this.disabled = false;

            // Optionally display validation errors
            if (error.errors) {
                Object.keys(error.errors).forEach(field => {
                    const errorElement = document.getElementById(`${field}_error`);
                    if (errorElement) {
                        errorElement.style.display = 'inline';
                        errorElement.textContent = error.errors[field][0];
                    }
                });
            }
        });
});