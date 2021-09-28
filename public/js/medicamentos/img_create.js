$(document).ready(function(){
    $('#foto').on('change', function(){
        var file = e.target.files[0];
        var reader = new FileReader();
        reader.onload = (e) => {
            $("#picture").setAttribute('src', e.target.result);
        };
        reader.readAsDataURL(file);
    });
});


