// document.getElementById("form").addEventListener("submit", function(event) {
//     event.preventDefault(); // Impede o envio do formulário
    
//     // Função de validação do nome (somente letras, mínimo de 2 caracteres)
//     function validarNome(nome) {
//         return nome.length >= 2 && /^[A-Za-zÀ-ÿ\s]+$/.test(nome);
//     }

//     // Função de validação de e-mail
//     function validarEmail(email) {
//         const regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
//         return regex.test(email);
//     }

//     // Função de validação de cidade (somente letras e espaço)
//     function validarCidade(cidade) {
//         return cidade.length >= 3 && /^[A-Za-zÀ-ÿ\s]+$/.test(cidade);
//     }

//     // Obter os valores dos campos
//     const nome = document.getElementById("nome").value;
//     const sobrenome = document.getElementById("sobrenome").value;
//     const email = document.getElementById("email").value;
//     const cidade = document.getElementById("cidade").value;

//     // Validar cada campo
//     if (!validarNome(nome)) {
//         alert("O nome deve ter no mínimo 2 caracteres e conter apenas letras.");
//         return;
//     }

//     if (!validarNome(sobrenome)) {
//         alert("O sobrenome deve ter no mínimo 2 caracteres e conter apenas letras.");
//         return;
//     }


//     if (!validarEmail(email)) {
//         alert("E-mail inválido. Verifique o formato.");
//         return;
//     }

//     if (!validarCidade(cidade)) {
//         alert("A cidade deve ter no mínimo 3 caracteres e conter apenas letras.");
//         return;
//     }

//     alert("Formulário enviado com sucesso!");

// });

