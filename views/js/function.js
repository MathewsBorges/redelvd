
<<<<<<< HEAD
$("#salvar").on("click", function (event) {
    event.preventDefault()
    console.log('entrou na função');
    var formData = new FormData();
    let arquivo = document.getElementById('pdf').files[0]
    let tipoDocumento = document.getElementById('tipoDocumento').value
    formData.append("pdf_file", arquivo)
    formData.append("tipo", tipoDocumento)
=======
$('#frm').submit(function (event) {
    event.preventDefault()
    var formData = new FormData($('#frm')[0])
>>>>>>> a5d5d8b96b76cbc6ca08bfb9b55dfeb696f1f02d
    $.ajax({
        method: "POST",
        url: "pdfs/enviar.php",
        data: formData,
<<<<<<< HEAD
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





=======
        processData: false,
        contentType: false,
        async: true,
        success: function (response) {
            $("#resultado").html(response);
            $("#pdf").val("");
            removeMensagem();
           
          
        },
    });
>>>>>>> a5d5d8b96b76cbc6ca08bfb9b55dfeb696f1f02d

})

function removeMensagem() {
    setTimeout(function () {
        var msg = document.getElementById("msg");
        if (msg != null) msg.parentNode.removeChild(msg);
    }, 4000);
}

<<<<<<< HEAD
=======
function atualizarTabela(id) {

}

>>>>>>> a5d5d8b96b76cbc6ca08bfb9b55dfeb696f1f02d

