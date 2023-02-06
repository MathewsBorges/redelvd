const form = document.getElementById("form")
const formAviso = document.getElementById("form-aviso");

// Inputs ----------------------------------------
const nome = document.getElementById("nome")
const data = document.getElementById("data")
const cpf = document.getElementById("cpf")
const email = document.getElementById("email")
const telefone = document.getElementById("telefone")
const endereco = document.getElementById("endereco")
const cep = document.getElementById("cep")
const loja = document.getElementById("loja")
const cidade = document.getElementById("cidade")
const cargo = document.getElementById("cargo")
const aviso = document.getElementById("aviso")

// -------------------------------------------------

//Bootstrap validation ---------

const validar = (input, validacao) => {
    switch (validacao) {
        case true:
            input.classList.add("is-valid")
            input.classList.remove("is-invalid")
            break;
        case false:
            input.classList.add("is-invalid")
            input.classList.remove("is-valid")
            break;

        default:
            break;
    }

}

function validateEmail(email) {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}


//-------------------------------

form.addEventListener("submit", function (e) {

    nome.value != "" ? validar(nome, true) : validar(nome, false);

    if (email.value != "") {
        validateEmail(email.value) ? validar(email, true) : validar(email, false);
    } else {
        validar(email, true);
    }


    let celular = telefone.value
    celular.length >= 8 ? validar(telefone, true) : validar(telefone, false);

    let numCpf = cpf.value
    numCpf.length == 14 ? validar(cpf, true) : validar(cpf, false);

    const regex = /[0-9]/;
    let address = endereco.value
    let test = isNaN(address);
    console.log(test);
    endereco.value != "" && regex.test(address) && test ? validar(endereco, true) : validar(endereco, false);

    let cepTest = cep.value

    cep.value != "" && cepTest.length != 9 ? validar(cep, false) : validar(cep, true);

    cidade.value != "" ? validar(cidade, true) : validar(cidade, false);
    data.value != "" ? validar(data, true) : validar(data, false);
    loja.value != "" ? validar(loja, true) : validar(loja, false);
    cargo.value != "" ? validar(cargo, true) : validar(cargo, false);

    let form_elements = document.getElementsByClassName("is-valid");
    console.log(form_elements.length);

    if (form_elements.length != 10) e.preventDefault()




})

formAviso.addEventListener("submit", (e) => {

    aviso.value != "" ? validar(aviso, true) : validar(aviso, false);


    if (aviso.value == "") e.preventDefault()


})


let btnEditar = document.getElementById("editar")
let btnSalvar = document.getElementById("submit")
let btnCancelar = document.getElementById("cancelar")


btnEditar.addEventListener("click", (e) => {

    e.preventDefault()

    btnEditar.setAttribute("disabled", "")
    btnCancelar.removeAttribute("disabled", "")
    btnSalvar.removeAttribute("disabled", "")
    nome.removeAttribute("disabled", "")
    data.removeAttribute("disabled", "")
    cpf.removeAttribute("disabled", "")
    email.removeAttribute("disabled", "")
    telefone.removeAttribute("disabled", "")
    endereco.removeAttribute("disabled", "")
    cep.removeAttribute("disabled", "")
    loja.removeAttribute("disabled", "")
    cidade.removeAttribute("disabled", "")
    cargo.removeAttribute("disabled", "")


})

form.addEventListener("reset", (e) => {


    btnEditar.removeAttribute("disabled", "")
    btnCancelar.setAttribute("disabled", "")
    btnSalvar.setAttribute("disabled", "")
    nome.setAttribute("disabled", "")
    data.setAttribute("disabled", "")
    cpf.setAttribute("disabled", "")
    email.setAttribute("disabled", "")
    telefone.setAttribute("disabled", "")
    endereco.setAttribute("disabled", "")
    cep.setAttribute("disabled", "")
    loja.setAttribute("disabled", "")
    cidade.setAttribute("disabled", "")
    cargo.setAttribute("disabled", "")
})


function suaFuncao() {

    history.pushState({}, null, 'http://localhost:8000/views/crudUsuario.php?success');

}













