$('body').on('click', '#add-tag', function () {
    // alert();
});
// CATEGORY SECTION ...
// Delete Category Section data Sweetalert2 js...
function deleteCategory(id) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    });
    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You Won't Be Able To Delete This!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Delete Tt!',
        cancelButtonText: 'No, Cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            event.preventDefault();
            document.getElementById('delete_category_id_' + id).submit();
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your Category Data Is Safe :)',
                'error'
            )
        }
    })
}
// File input button customize & clickable choose image file browser using js...
$('body').on('click', '.file-click', function() {
    let id = $(this).attr('data-id');
    $('#' + id).click();
});
function previewCatImage(input) {
    var id = $(input).attr('id');
    // console.log(id);
    if(input.files && input.files[0]) {
        var reader = new FileReader();

        $('#show_'+id).slideUp();
        reader.onload = function(e) {
            $('#show_'+id).attr('src', e.target.result);
            $('#show_'+id).parent().attr('href', e.target.result);
            $('#show_'+id).slideDown();
        };
        reader.readAsDataURL(input.files[0]);
    }

}
// All Image see Preview using Magnify Popup js...
$('.image-link').magnificPopup({
    type: 'image',
    gallery: {
        enabled: true, // set to true to enable gallery
        preload: [1,1], // read about this option in next Lazy-loading section
        navigateByImgClick: true,
        arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>', // markup of an arrow button
        tPrev: 'Previous (Left arrow key)', // title for left button
        tNext: 'Next (Right arrow key)', // title for right button
        tCounter: '<span class="mfp-counter">%curr% of %total%</span>' // markup of counter
    },
    mainClass: 'mfp-fade', // this class is for CSS animation below
    zoom: {
        enabled: true, // By default it's false, so don't forget to enable it
        duration: 300, // duration of the effect, in milliseconds
        easing: 'ease-in', // CSS transition easing function
    }
});

