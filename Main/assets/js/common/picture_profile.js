$(document).ready(function(){
    // Prepare the preview for profile picture
        $("#profile-picture").change(function(){
            readprofileURL(this);
        });

        $("#skin-picture").change(function(){
            readskinURL(this);
        });
});
    function readprofileURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
    
            reader.onload = function (e) {
                $('#profilePicturePreview').attr('src', e.target.result).fadeIn('slow');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function readskinURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
    
            reader.onload = function (e) {
                $('#skinPicturePreview').attr('src', e.target.result).fadeIn('slow');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }