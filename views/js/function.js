
$('#frm').submit(function (event) {
    event.preventDefault()
    var formData = new FormData($('#frm')[0])
    $.ajax({
        method: "POST",
        url: "pdfs/enviar.php",
        data: formData,
        processData: false,
        contentType: false,
        async: true,
        success: function (response) {
            $("#resultado").html(response);
            $("#pdf").val("");
            removeMensagem();
           
          
        },
    });

})

function removeMensagem() {
    setTimeout(function () {
        var msg = document.getElementById("msg");
        if (msg != null) msg.parentNode.removeChild(msg);
    }, 4000);
}

function atualizarTabela(id) {

}


