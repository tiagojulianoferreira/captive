<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Cativo</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #2E3A4D; /* Cor de fundo em verde escuro */
            color: #FFFFFF; /* Cor do texto em branco */
            margin: 0;
            padding: 0;
        }

        #container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #394B5F; /* Cor de fundo do contêiner em verde mais escuro */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
            color: #FFFFFF; /* Cor do texto em branco */
        }

        h2 {
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .dropdown {
            position: relative;
            display: inline-block;
            cursor: pointer;
            margin-bottom: 10px;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #394B5F; /* Cor de fundo do dropdown em verde mais escuro */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            border-radius: 4px;
            color: #FFFFFF; /* Cor do texto em branco */
            padding: 10px;
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        label {
            font-size: 16px;
            margin-bottom: 8px;
            color: #96A7C2; /* Cor do texto em cinza claro */
        }

        input {
            height: 36px;
            font-size: 16px;
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #96A7C2; /* Cor da borda em cinza claro */
            border-radius: 4px;
            background-color: #2E3A4D; /* Cor de fundo em verde escuro */
            color: #FFFFFF; /* Cor do texto em branco */
        }

        hr {
            border: none;
            border-top: 1px solid #96A7C2; /* Cor da linha em cinza claro */
            margin: 20px 0;
        }

        button {
            height: 40px;
            font-size: 18px;
            border: none;
            border-radius: 4px;
            color: #FFFFFF; /* Cor do texto em branco */
            cursor: pointer;
            margin-bottom: 10px;
        }

        .button-help {
            height: 40px;
            font-size: 18px;
            border: none;
            border-radius: 4px;
            background-color: #2196F3; /* Cor de fundo do botão de ajuda em azul */
            color: #FFFFFF; /* Cor do texto em branco */
            cursor: pointer;
        }

        /* Adicione estilos adicionais conforme necessário */
        .accept-connect-btn {
            background-color: #4CAF50; /* Cor de fundo do botão ACEITA E CONECTAR em verde */
            padding-inline: 20px;
            font-size: 22px;
            font-weight: bolder;
        }

        .accordion {
            background-color: #2196F3; /* Cor de fundo do botão LER REGRAS DE ACESSO em azul */
        }

        .panel {
            display: none; /* Por padrão, o painel está oculto */
            background-color: #394B5F; /* Cor de fundo do conteúdo do acordeão em verde mais escuro */
        }

        /* Adiciona um pouco mais de espaçamento entre os itens */
        label, input, hr, .buttons-container {
            margin-bottom: 20px;
        }

    </style>
</head>
<body>

<div id="container">
    <h2>Acesso IFSC</h2>

    <form id="accessForm" method="post">
        <label for="auth_user">Nome de Usuário:</label>
        <input type="text" id="auth_user" name="auth_user" oninput="checkUserInput()">

        <label for="auth_pass">Senha:</label>
        <input type="password" id="auth_pass" name="auth_pass">

        <hr>

        <label for="auth_voucher">Voucher:</label>
        <input type="text" id="auth_voucher" name="auth_voucher" placeholder="Insira o Voucher" oninput="checkVoucherInput()">

        <button class="accordion" type="button" onclick="toggleAccordion('rules-content')">
            <span class="icon">📘</span> LER REGRAS DE ACESSO
        </button>
        <div class="panel" id="rules-content">
            <ul>
                <li>Regra 1</li>
                <li>Regra 2</li>
                <!-- Adicione mais itens conforme necessário -->
            </ul>
        </div>

        <div class="buttons-container">
            <button type="submit" class="accept-connect-btn">Aceitar e Conectar</button>
            <a class="link-help" href="#" onclick="toggleHelpMenu()">Ajuda?</a>
        </div>
        <div class="help-content" id="help-menu">
            <p>Texto de ajuda...</p>
            <!-- Adicione mais informações de ajuda conforme necessário -->
        </div>
    </form>
</div>
    
<script>
    function toggleHelpMenu() {
            var helpMenu = document.getElementById("help-menu");
            helpMenu.style.display = (helpMenu.style.display === "block") ? "none" : "block";
        }
    function toggleAccordion(panelId) {
        var panel = document.getElementById(panelId);
        panel.style.display = (panel.style.display === "block") ? "none" : "block";
        var accordionBtn = document.querySelector('.accordion');
        accordionBtn.classList.toggle('active');
    }

    function checkUserInput() {
        var userInput = document.getElementById("auth_user").value;
        var voucherInput = document.getElementById("auth_voucher");

        // Desativa o campo de voucher se o campo de usuário estiver preenchido
        if (userInput !== "") {
            voucherInput.disabled = true;
        } else {
            voucherInput.disabled = false;
        }
    }

    function checkVoucherInput() {
        var voucherInput = document.getElementById("auth_voucher");
        var userInput = document.getElementById("auth_user");

        // Desativa o campo de usuário se o campo de voucher estiver preenchido
        if (voucherInput.value !== "") {
            userInput.disabled = true;
        } else {
            userInput.disabled = false;
        }
    }

    document.getElementById("accessForm").addEventListener("submit", function(event) {
        event.preventDefault();
        // Adicione aqui a lógica para manipular o envio do formulário
    });
</script>

</body>
</html>