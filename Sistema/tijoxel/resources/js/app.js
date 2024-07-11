//import "./bootstrap";
import Dropzone from "dropzone";
Dropzone.autoDiscover = false;
const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "Sube el archivo aqui",
    acceptedFiles: ".pdf",
    addRemoveLinks: true,
    dictRemoveFile: "Borrar",
    maxFiles: 1,
    uploadMultiple: false,
});
dropzone.on("sending", function (file, xhr, formData) {
    console.log("sending" + formData);
});
dropzone.on("success", function (file, response) {
    console.log("success" + response);
});
dropzone.on("error", function (file, message) {
    console.log("error" + file);
    console.log("error" + message);
});
dropzone.on("removedfile", function () {
    console.log("Archivo Eliminado");
});
