$.noConflict();
jQuery( document ).ready(function( $ ) {
$('#editordata').summernote({
height: 300,
callbacks: {
onImageUpload: function(files) {
uploadFile(files[0]);
}
}

});

function uploadFile(file) {
data = new FormData();
data.append("file", file);

$.ajax({
data: data,
type: "POST",
url: "<?php echo base_url(); ?>admin/upload",
cache: false,
contentType: false,
processData: false,
success: function(url) {
console.log(url);
$('#editordata').summernote("insertImage", url);
}
});
}
});