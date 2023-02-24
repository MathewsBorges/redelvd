$("#salvar").on("click", function (event) {
  event.preventDefault();
  console.log("entrou na função");
  var formData = new FormData();
  let arquivo = document.getElementById("pdf").files[0];
  let tipoDocumento = document.getElementById("tipoDocumento").value;
  formData.append("pdf_file", arquivo);
  formData.append("tipo", tipoDocumento);

  $.ajax({
    method: "POST",
    url: "../../views/pdfs/enviar.php",
    data: formData,
    cache: false,
    processData: false,
    contentType: false,
    processData: false,
    async: true,
    success: async function (resposta) {
      $("#resultado").html(resposta);
      var target_offset = $("#ancora").offset();
      var target_top = target_offset.top;
      $("html, body").animate({ scrollTop: target_top }, 10);
      $("#pdf").val("");
      await removeMensagem();
    },
  });
});

function excluirArquivo(id) {
  var formData = new FormData();
  formData.append("numero", id);
  formData.append("method", "apagarArquivo");
  $.ajax({
    method: "POST",
    url: "../../controllers/FuncionarioController.php",
    data: formData,
    cache: false,
    processData: false,
    contentType: false,
    processData: false,
    async: true,
    success: function (resposta) {
      $("#resultadoArquivos").html(resposta);
      var target_offset = $("#ancora").offset();
      var target_top = target_offset.top;
      $("html, body").animate({ scrollTop: target_top }, 10);
      removeMensagem();
    },
  });
}


function excluirDocumentoFarmacia(id) {
  var formData = new FormData();
  formData.append("numero", id);
  formData.append("method", "apagarArquivo");

  $.ajax({
    method: "POST",
    url: "../../controllers/EmpresaController.php",
    data: formData,
    cache: false,
    processData: false,
    contentType: false,
    processData: false,
    async: true,
    success: function (resposta) {
      $("#resultadoArquivos").html(resposta);
      var target_offset = $("#ancora").offset();
      $("[col-arquivo=" + id + "]").remove();
      var target_top = target_offset.top;
      $("html, body").animate({ scrollTop: target_top }, 10);
      removeMensagem();
    },
  });
}


$("#salvar-arquivo").on("click", function (event) {
  event.preventDefault();

  var formData = new FormData();
  let arquivo = document.getElementById("pdf").files[0];
  let tipoDocumento = document.getElementById("inputGroupSelect01").value;
  formData.append("pdf_file", arquivo);
  formData.append("tipo", tipoDocumento);

  $.ajax({
    method: "POST",
    url: "../../views/pdfs/enviarfarmacias.php",
    data: formData,
    cache: false,
    processData: false,
    contentType: false,
    processData: false,
    async: true,
    success: async function (resposta) {
      $("#resultadoArquivos").html(resposta);
      // var target_offset = $("#ancora").offset();
      // var target_top = target_offset.top;
      // $("html, body").animate({ scrollTop: target_top }, 10);
      $("#pdf").val("");
      $("#conteudo-pagina").load("../../views/Loja.php")
      removeMensagem();
    },
  });
});



function removeMensagem() {
  setTimeout(function () {
    var msg = document.getElementById("msg");
    if (msg != null) msg.parentNode.removeChild(msg);
  }, 5000);
}

// document.onreadystatechange = () => {
//   if (document.readyState === "complete") {
//     removeMensagem();
//   }
// };