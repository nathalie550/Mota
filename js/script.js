// Get the modal
var modal = document.getElementById("myModal");
var btn = document.getElementById("menu-item-82"); // Get the button that opens the modal
var btn2 = document.querySelector(".myBtn2"); // Get the button that opens the modal
var span = document.getElementsByClassName("modal-content")[0]; // Get the <span> element that closes the modal
console.log('fichier js')
if (btn) {  // When the user clicks on the button, open the modal
    btn.addEventListener('click', function () {
        modal.style.display = "block";
    });
};

if (btn2) {
    btn2.addEventListener('click', function () {
        modal.style.display = "block";
    });
};

// When the user clicks on <span> (x), close the modal
if (onclick) {
    span.onclick = ('onclick', function () {
        modal.style.display = "none";
    });
};


/***************************************FILTRES PAGE D ACCEUIL*************************/

/*faire un appel Ajax pour utiliser la fonction  WP_Query  afin d’obtenir les photos.*/
document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('#ajax_call')) {
        document.querySelector('#ajax_call').addEventListener('click', function () {
            let formData = new FormData();
            formData.append('action', 'request_photos');

            fetch(script_js.ajax_url, {
                method: 'POST',
                body: formData,
            }).then(function (response) {
                if (!response.ok) {
                    throw new Error('Network response error.');
                };

                return response.json();
            }).then(function (data) {
                data.posts.forEach(function (post) {
                    document.querySelector('#ajax_return').insertAdjacentHTML('beforeend', '<div class="col-12 mb-5">' + post.post_title + '</div>');
                });
            }).catch(function (error) {
                console.error('There was a problem with the fetch operation: ', error);
            });
        });
    }
});

