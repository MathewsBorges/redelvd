$('.money').maskMoney({
    prefix: 'R$ ',
    allowNegative: false,
    thousands: '.',
    decimal: ',',
    affixesStay: true
});
$('.moneyDeb').maskMoney({
    prefix: 'R$ ',
    allowNegative: false,
    thousands: '.',
    decimal: ',',
    affixesStay: true
});

$(document).on("keyup", ".money", function () {

    var total = 0;
    $(".money").each(function () {
        let valor = $(this).val() == "" ? "0" : $(this).val();
        let soma = valor.replace("R$ ", "")
        let numero = soma.replace(",", "")
        numero = numero.replace(".", "")
        numero = parseFloat(numero) == isNaN ? 0 : parseFloat(numero)
        total = total + numero;

    });
    const formatter = new Intl.NumberFormat('pt-BR', {
        style: 'currency',
        currency: 'BRL'
    })
    const formatted = formatter.format(total / 100);
    document.getElementById('total_creditos').value = formatted.toString();

    try {
        if (document.getElementById('total_debitos').value == "-R$ 0,00" || document.getElementById('total_debitos').value == "R$ 0,00" || document.getElementById('total_debitos').value == "") {
            document.getElementById('total').value = formatted.toString();

        } else {
            let valor = $('#total_debitos').val() == "" ? "0" : $('#total_debitos').val();
            let soma = valor.replace("-R$", "") || valor.replace("R$", "")
            let numero = soma.includes(",") ? soma.replace(",", "") : soma
            numero = numero.includes(".") ? numero.replace(".", "") : numero
            numero = parseInt(numero) == isNaN ? 0 : parseInt(numero)
            total = total - numero;
            const formato = formatter.format(total / 100);
            document.getElementById('total').value = formato.toString();

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
        let soma = valor.replace("R$", "")

        let numero = soma.replace(",", "")
        numero = numero.replace(".", "")
        numero = parseInt(numero) == isNaN ? 0 : parseInt(numero)
        total = total - numero;


    });

    const formatter = new Intl.NumberFormat('pt-BR', {
        style: 'currency',
        currency: 'BRL'
    })
    const formatted = formatter.format(total / 100);
    document.getElementById('total_debitos').value = formatted.toString();

    let valor = $('#total_creditos').val() == "" ? "0" : $('#total_creditos').val();
    let soma = valor.replace("R$", "")
    let numero = soma.replace(",", "")
    numero = numero.replace(".", "")
    numero = parseInt(numero) == isNaN ? 0 : parseInt(numero)
    total = total + numero;

    document.getElementById('total').value = formatter.format(total / 100).toString();


});











function removeMensagem() {
    setTimeout(function () {
        var msg = document.getElementById("msg-success");

        if (msg != null) msg.parentNode.removeChild(msg);
    }, 5000);
}
document.onreadystatechange = () => {
    if (document.readyState === 'complete') {
        removeMensagem();
    }
}