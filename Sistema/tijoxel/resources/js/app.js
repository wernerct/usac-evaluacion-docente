//import "./bootstrap";
import Dropzone from "dropzone";
Dropzone.autoDiscover = false;
document.addEventListener("DOMContentLoaded", function () {
    const dropzoneElement = document.querySelector("#dropzone");

    if (dropzoneElement) {
        const dropzone = new Dropzone("#dropzone", {
            dictDefaultMessage: "Sube el archivo aquí",
            acceptedFiles: ".pdf",
            addRemoveLinks: true,
            dictRemoveFile: "Borrar",
            maxFiles: 1,
            uploadMultiple: false,
            init: function () {
                //alert("dropzone creado");
                if (document.querySelector('[name="archivo"]').value.trim()) {
                    const archivoPublicado = {};
                    archivoPublicado.size = 1234;
                    archivoPublicado.name =
                        document.querySelector('[name="archivo"]').value;
                    this.options.addedfile.call(this, archivoPublicado);
                    this.options.thumbnail.call(
                        this,
                        archivoPublicado,
                        `uploads/${archivoPublicado.name}`
                    );
                    archivoPublicado.previewElement.classList.add(
                        "dz-success",
                        "dz-complete"
                    );
                }
            },
        });

        dropzone.on("sending", function (file, xhr, formData) {
            console.log("sending", formData);
        });

        dropzone.on("success", function (file, response) {
            console.log("success", response);
            document.querySelector('[name="archivo"]').value = response.archivo;
        });

        dropzone.on("error", function (file, message) {
            console.log("error", file);
            console.log("error", message);
        });

        dropzone.on("removedfile", function () {
            console.log("Archivo Eliminado");
        });
    }
});
