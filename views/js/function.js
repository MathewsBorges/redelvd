
$("#salvar").on("click", function (event) {
    event.preventDefault()
    console.log('entrou na função');
    var formData = new FormData();
    let arquivo = document.getElementById('pdf').files[0]
    let tipoDocumento = document.getElementById('tipoDocumento').value
    formData.append("pdf_file", arquivo)
    formData.append("tipo", tipoDocumento)
    $.ajax({
        method: "POST",
        url: "pdfs/enviar.php",
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        processData: false,
        async: true,
        success: function (resposta) {
            $("#resultado").html(resposta);
            $("#pdf").val("")
            removeMensagem();
        }

    })






})

function removeMensagem() {
    setTimeout(function () {
        var msg = document.getElementById("msg");
        if (msg != null) msg.parentNode.removeChild(msg);
    }, 4000);
}


