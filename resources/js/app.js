import bsCustomFileInput from "bs-custom-file-input";
bsCustomFileInput.init();

require("./bootstrap");

require("alpinejs");


//hide message after few seconds
$('#submitBtn').click(() => {
  setTimeout( () => {
    $('.alert').fadeOut(1000)
  }, 2500)
})

$('.btn-comment').click(() => {
  setTimeout( () => {
    $('.alert-danger').fadeOut(800)
  }, 2000)
})



