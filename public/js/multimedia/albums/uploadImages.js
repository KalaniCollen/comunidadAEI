// let data = document.getElementById('js-data');
// Dropzone.options.jsDropzone = {
//     paramName: "file",
//     acceptedFiles: 'image/*',
//     parallelUploads: 8,
//     maxFiles: 8,
//     maxFilesize: 2, // Tamaño máximo de archivo 2MB
//     addRemoveLinks: true,
//     autoProcessQueue: false,
//     uploadMultiple: true,
//     dictDefaultMessage: "Agregar imagenes al album",
//     init: function() {
//         let submitButton = document.querySelector("#js-btn-submit");
//         jsDropzone = this;
//
//         submitButton.addEventListener("click", function() {
//             jsDropzone.processQueue();
//         });
//     },
//     successmultiple: function() {
//         this.removeAllFiles();
//         dataImages();
//     }
// };
//
// function dataImages() {
//     $.get('/imagenes', function(data) {
//         console.log(data.length);
//     });
// }
