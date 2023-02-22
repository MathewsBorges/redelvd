
atualizarTabela()
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
        url: "js/function/enviar.php",
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        processData: false,
        async: true,
        success: function (resposta) {
            $("#resultado").html(resposta);
            atualizarTabela()
            $("#pdf").val("")
            removeMensagem()
        }

    })

});


function atualizarTabela() {
    var nid = parseInt(document.getElementById("nid").value)
    console.log(nid);
    var formData = new FormData();
    formData.append("numero", nid)

    $.ajax({
        method: 'POST',
        url: 'js/function/listarDocumentos.php',
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        processData: false,
        async: true,
        success: function (resposta) {
            console.log(resposta);
            $("#tabelaDocumentos").html(resposta);
        }

    })
}



function removeMensagem() {
    setTimeout(function () {
        var msg = document.getElementById("msg");
        if (msg != null) msg.parentNode.removeChild(msg);
    }, 4000);
}
