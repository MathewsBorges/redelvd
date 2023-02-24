$(".money").maskMoney({
  prefix: "R$ ",
  allowNegative: false,
  thousands: ".",
  decimal: ",",
  affixesStay: true,
});
$(".moneyDeb").maskMoney({
  prefix: "R$ ",
  allowNegative: false,
  thousands: ".",
  decimal: ",",
  affixesStay: true,
});
//Credito
$(document).on("keyup", ".money", function () {
  var total = 0;
  $(".money").each(function () {
    let valor = $(this).val() == "" ? "0" : $(this).val();
    let soma = valor.replace("R$ ", "");
    let numero = soma.replace(",", "");
    numero = numero.replace(".", "");
    numero = parseFloat(numero) == isNaN ? 0 : parseFloat(numero);
    total = total + numero;
  });
  const formatter = new Intl.NumberFormat("pt-BR", {
    style: "currency",
    currency: "BRL",
  });
  const formatted = formatter.format(total / 100);
  document.getElementById("total_creditos").value = formatted.toString();

  try {
    if (
      document.getElementById("total_debitos").value == "-R$ 0,00" ||
      document.getElementById("total_debitos").value == "R$ 0,00" ||
      document.getElementById("total_debitos").value == ""
    ) {
      document.getElementById("total").value = formatted.toString();
    } else {
      let valor =
        $("#total_debitos").val() == "" ? "0" : $("#total_debitos").val();
      let soma = valor.replace("-R$", "") || valor.replace("R$", "");
      let numero = soma.includes(",") ? soma.replace(",", "") : soma;
      numero = numero.includes(".") ? numero.replace(".", "") : numero;
      numero = parseInt(numero) == isNaN ? 0 : parseInt(numero);
      total = total - numero;
      const formato = formatter.format(total / 100);
      document.getElementById("total").value = formato.toString();
    }
  } catch (error) {
    console.log(error);
  }
});
///DEBITO=================================================
$(document).on("keyup", ".moneyDeb", function () {
  let total = 0;
  $(".moneyDeb").each(function () {
    let valor = $(this).val() == "" ? "0" : $(this).val();
    let soma = valor.replace("R$", "");

    let numero = soma.replace(",", "");
    numero = numero.replace(".", "");
    numero = parseInt(numero) == isNaN ? 0 : parseInt(numero);
    total = total - numero;
  });

  const formatter = new Intl.NumberFormat("pt-BR", {
    style: "currency",
    currency: "BRL",
  });
  const formatted = formatter.format(total / 100);
  document.getElementById("total_debitos").value = formatted.toString();

  let valor =
    $("#total_creditos").val() == "" ? "0" : $("#total_creditos").val();
  let soma = valor.replace("R$", "");
  let numero = soma.replace(",", "");
  numero = numero.replace(".", "");
  numero = parseInt(numero) == isNaN ? 0 : parseInt(numero);
  total = total + numero;

  document.getElementById("total").value = formatter
    .format(total / 100)
    .toString();
});

//Contracheque
$("#salvarCheque").on("click", function (event) {
  event.preventDefault();
  let arquivo = document.getElementById("pdf").files[0];
  let salario = document.getElementsByName("salario")[0].value;
  let ferias = document.getElementsByName("ferias")[0].value;
  let outros = document.getElementsByName("outros")[0].value;
  let convenio = document.getElementsByName("convenio")[0].value;
  let vales = document.getElementsByName("vales")[0].value;
  let emprestimos = document.getElementsByName("emprestimos")[0].value;
  let mes = document.getElementsByName("mes")[0].value;
  let nid = parseInt(document.getElementById("nid").value);
  console.log(nid);

  var formData = new FormData();
  formData.append("pdf", arquivo);
  formData.append("salario", salario);
  formData.append("ferias", ferias);
  formData.append("outros", outros);
  formData.append("convenio", convenio);
  formData.append("vales", vales);
  formData.append("emprestimos", emprestimos);
  formData.append("mes", mes);
  formData.append("codigo", nid);

  $.ajax({
    method: "POST",
    url: "../../views/pdfs/enviarCheque.php",
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
      await removeMensagem();
      window.location.reload(true);
    },
  });
});
//Avisos
$("#submit-aviso").on("click", function (event) {
  event.preventDefault();
  let nid = parseInt(document.getElementById("nid").value);
  var formData = new FormData();
  let aviso = document.getElementsByName("mensagem")[0].value;
  let prioridade = document.getElementsByName("prioridade")[0].value;
  let remetente = parseInt(document.getElementById("nid2").value);

  formData.append("mensagem", aviso);
  formData.append("prioridade", prioridade);
  formData.append("remetente", remetente);
  formData.append("numero", nid);
  formData.append("method", "insertAviso");

  $.ajax({
    method: "POST",
    url: "../../controllers/AvisoController.php",
    data: formData,
    cache: false,
    processData: false,
    contentType: false,
    processData: false,
    async: true,
    success: async function (resposta) {
      $("#resultadoAvisos").html(resposta);
      var target_offset = $("#ancoraAviso").offset();
      var target_top = target_offset.top;
      $("html, body").animate({ scrollTop: target_top }, 10);
      await removeMensagem();
      window.location.reload(true);
    },
  });
});
//Documentos

function excluirCheque(id) {
  var formData = new FormData();
  formData.append("numero", id);
  formData.append("method", "excluirCheque");
  $.ajax({
    method: "POST",
    url: "../../controllers/ChequeController.php",
    data: formData,
    cache: false,
    processData: false,
    contentType: false,
    processData: false,
    async: true,
    success: async function (resposta) {
      $("#resultado").html(resposta);
      $("[col=" + id + "]").remove();
      var target_offset = $("#ancora").offset();
      var target_top = target_offset.top;
      $("html, body").animate({ scrollTop: target_top }, 10);
      await removeMensagem();
      //window.location.reload(true);
    },
  });
}

$("#anexar").on("click", function (event) {
  event.preventDefault();
  let arquivo = document.getElementById("inputGroupFile04").files[0];
  let nid = parseInt(document.getElementById("nid").value);
  let tipo = document.getElementById("inputGroupSelect01").value;

  var formData = new FormData();
  formData.append("pdf_file", arquivo);
  formData.append("tipo", tipo);
  formData.append("codigo", nid);

  $.ajax({
    method: "POST",
    url: "pdfs/enviar.php",
    data: formData,
    cache: false,
    processData: false,
    contentType: false,
    processData: false,
    async: true,
    success: async function (resposta) {
      $("#resultadoArquivos").html(resposta);
      var target_offset = $("#ancoraArquivos").offset();
      var target_top = target_offset.top;
      $("html, body").animate({ scrollTop: target_top }, 10);
      await removeMensagem();
      window.location.reload(true);
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
    success: async function (resposta) {
      $("#resultadoArquivos").html(resposta);
      console.log(window.location.pathname);
      if (window.location.pathname == "/views/Funcionario.php") location.reload(true);

      setTimeout(() => {
        $("#conteudo-pagina").load("../../views/Documentos.php");
      }, 500);

      var target_offset = $("#ancoraArquivos").offset();
      var target_top = target_offset.top;
      $("html, body").animate({ scrollTop: target_top }, 10);
    },
  });
}

function excluirAviso(id) {
  var formData = new FormData();
  formData.append("numero", id);
  formData.append("method", "removerAviso");
  $.ajax({
    method: "POST",
    url: "../../controllers/AvisoController.php",
    data: formData,
    cache: false,
    processData: false,
    contentType: false,
    processData: false,
    async: true,
    success: async function (resposta) {
      $("#resultadoAvisos").html(resposta);

      var target_offset = $("#ancoraAviso").offset();
      var target_top = target_offset.top;
      $("html, body").animate({ scrollTop: target_top }, 10);
      // await removeMensagem();
      location.reload(true);
    },
  });
}

function removeMensagem() {
  setTimeout(function () {
    var msg = document.getElementById("msg");
    if (msg != null) msg.parentNode.removeChild(msg);
  }, 5000);
}

function removeMensagens() {
  setTimeout(function () {
    var msg = document.getElementById("msg-success");

    if (msg != null) msg.parentNode.removeChild(msg);
  }, 5000);
}

document.onreadystatechange = () => {
  if (document.readyState === "complete") {
    removeMensagens();
    removeMensagem();
  }
};
