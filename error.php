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
            margin: 5%;
            padding: 0;
            background-image: url(captiveportal-fachada2.png);
            background-repeat: no-repeat, repeat;
            background-size: cover; /* Resize the background image to cover the entire container */
            height: 100%; /* You must set a specified height */
        }

        #container {
            max-width: 600px;
            margin: 0 auto;
            padding: 14px;
            background-color: #394B5F; /* Cor de fundo do contêiner em verde mais escuro */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
            color: #FFFFFF; /* Cor do texto em branco */
        }

        h2 {
            font-size: 22px;
            text-align: center;
            margin-bottom: 16px;
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
            font-size: 14px;
            margin-bottom: 10px;
            color: #96A7C2; /* Cor do texto em cinza claro */
        }

        input {
            height: 32px;
            font-size: 14px;
            padding: 8px;
            margin-bottom: 14px;
            border: 1px solid #96A7C2; /* Cor da borda em cinza claro */
            border-radius: 4px;
            background-color: #2E3A4D; /* Cor de fundo em verde escuro */
            color: #FFFFFF; /* Cor do texto em branco */
        }

        hr {
            border: none;
            border-top: .5px solid #96A7C2; /* Cor da linha em cinza claro */
            margin: 14px 0;
        }

        button {
            height: 32px;
            font-size: 18px;
            border: none;
            border-radius: 4px;
            color: #FFFFFF; /* Cor do texto em branco */
            cursor: pointer;
            margin-bottom: 10px;
        }

        .button-help {
            height: 32px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            background-color: #2196F3; /* Cor de fundo do botão de ajuda em azul */
            color: #FFFFFF; /* Cor do texto em branco */
            cursor: pointer;
        }

        /* Adicione estilos adicionais conforme necessário */
        .accept-connect-btn {
            background-color: #4CAF50; /* Cor de fundo do botão ACEITA E CONECTAR em verde */
            padding-inline: 18px;
            font-size: 20px;
            font-weight: bolder;
        }

        .accordion {
            background-color: #447094; /* Cor de fundo do botão LER REGRAS DE ACESSO em azul */
        }

        .panel {
            display: none; /* Por padrão, o painel está oculto */
            background-color: #394B5F; /* Cor de fundo do conteúdo do acordeão em verde mais escuro */
            font-size: 14px;
        }
        .panel ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .panel li {
            margin-left: 5px; /* Ajuste a margem esquerda conforme necessário */
            padding: 5px;
            border-bottom: 1px solid #96A7C2; /* Adicione uma linha de separação entre os itens da lista */
        }

        /* Adiciona um pouco mais de espaçamento entre os itens */
        label, input, hr, .buttons-container {
            margin-bottom: 18px;
        }
        .link-help {
            font-size: 16px;
            color: #2196F3; /* Cor do texto em azul */
            cursor: pointer;
            margin-left: 20px;
        }

        .help-content {
            display: none;
        }
        #logo {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
            margin-bottom: 10px; /* Ajuste a margem inferior conforme necessário */
        }
        .scroll-down-icon {
            font-size: 24px;
            cursor: pointer;
            transition: color 0.3s;
            display: none; /* Inicia oculto */
        }

        .scroll-down-icon:hover {
            color: #4CAF50; /* Cor ao passar o mouse */
        }
        .error-label {
            font-size: 16px;
            color: #FFA500; /* Cor do texto em vermelho para indicar um erro */
            margin-bottom: 10px;
            display: block;
        }

    </style>
</head>
<body>

<div id="container">
    <img id="logo" src="captiveportal-logotipo.png" alt="Logo IFSC">
    <label class="error-label">Credenciais Inválidas, tente novamente.</label>
 
    <form id="accessForm" method="post" action="$PORTAL_ACTION$" onsubmit="return validateForm()">
        <label for="auth_user">Nome de Usuário:</label>
        <input type="text" id="auth_user" name="auth_user" oninput="checkUserInput()" placeholder="Usuário">

        <label for="auth_pass">Senha:</label>
        <input type="password" id="auth_pass" name="auth_pass" placeholder="Senha">

        <hr>

        <label for="auth_voucher">Voucher:</label>
        <input type="text" id="auth_voucher" name="auth_voucher" placeholder="Insira o Voucher" oninput="checkVoucherInput()">
        <input name="redirurl" type="hidden" value="$PORTAL_REDIRURL$">
        <input name="zone" type="hidden" value="$PORTAL_ZONE$">

        <button class="accordion" type="button" onclick="toggleAccordion('rules-content');showScrollDownIcon()">
            <span class="icon">📘</span> LER REGRAS DE ACESSO
        </button>
        <div class="panel" id="rules-content">
            <ul>
                <li>Rede exclusiva para visitantes. Solicite seu usuário e senha na recepção ou com o suporte técnico local.
                </li>
                <li>Servidores do IFSC devem usar a rede IFSC-ADM cou cancelamento.om suas credenciais da Intranet. </li>
                <li>Alunos do IFSC devem usar a rede IFSC-ALUNOS com suas credenciais do Portal do Aluno.</li>
                <li>O IFSC não presta suporte para configuração de equipamentos pessoais para fazer uso deste serviço.
                </li>
                <li>O IFSC não se responsabiliza por qualquer dano causado (software e hardware) nos equipamentos que fazem uso deste serviço.</li>
                <li>As credenciais de acesso (usuário e senha) são de uso individual e não devem ser compartilhadas com terceiros, sob pena de suspensão.
                </li>
                <li>O usuário não poderá fazer uso deste serviço para violar leis brasileiras, internacionais, de propriedade intelectual e as resoluções do IFSC, podendo ser identificado e responsabilizado.
                </li>
                <li>Não é permitido fazer uso de programas e recursos que causem ou tentem causar a indisponibilidade de serviços de rede ou que prejudiquem de alguma forma as atividades de outros usuários.</li>
                <li>Não é permitido utilizar programas de compartilhamento de arquivos P2P (Peer-to-peer) tais como Utorrent, Emule, etc.
                </li>
                <li>O IFSC se reserva o direito de monitorar o uso deste serviço e fornecer informações sobre seus usuários para as autoridades brasileiras.</li>
                <li>Ao clicar no botão, você afirma que leu e aceita para uso da rede do IFSC</li>
                <!-- Adicione mais itens conforme necessário -->
            </ul>
        </div>
        <div id="scrollReminder" style="text-align: center; color: #96A7C2; margin-top: 10px;">
            <span class="scroll-down-icon" onclick="smoothScrollToRules()">🡇</span>
        </div>
        <div class="buttons-container">
            <button name="accept" type="submit" class="accept-connect-btn" value="Continue">Aceitar e Conectar</button>
            <a class="link-help" href="#" onclick="toggleHelpMenu()">Ajuda?</a>
        </div>
        <div class="help-content" id="help-menu">
            <p>Você deve escolher entre acessar usando um <b>Usuário/Senha</b> pré-cadastrados ou um <b>Voucher</b>, que é um código que você deve ter recebido previamente.</p>
            <p>Certifique-se de ter inserido as credenciais corretas.</p>
            <p>É importante ler as REGRAS DE ACESSO à rede do IFSC Campus Tubarão.</p>
            <p>Em caso de problemas você pode contatar <b>suporte.ti.tub@ifsc.edu.br</b></p>
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
        function showScrollDownIcon() {
            var scrollReminder = document.getElementById('scrollReminder');
            scrollReminder.style.display = 'block';
        }
        function smoothScrollToRules() {
            var panel = document.getElementById('rules-content');
            if (panel.style.display === 'block') {
                panel.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start',
                    inline: 'nearest'
                });
            }
        }
        function focusAcceptButton() {
            var panel = document.getElementById('rules-content');
            if (panel.style.display === 'block') {
                var acceptButton = document.querySelector('.accept-connect-btn');
                acceptButton.focus();
            }
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
            // event.preventDefault();
            // Adicione aqui a lógica para manipular o envio do formulário
        });

        function validateForm() {    var userInput = document.getElementById("auth_user").value;
            var passInput = document.getElementById("auth_pass").value;
            var voucherInput = document.getElementById("auth_voucher").value;

            // Verifica se pelo menos um dos campos (usuário, senha, ou voucher) está preenchido
            if (userInput === "" && passInput === "" && voucherInput === "") {
                alert("Preencha pelo menos um dos campos: Usuário/Senha ou Voucher.");
                return false; // Impede o envio do formulário
            }

            // Adicione outras verificações conforme necessário

            return true; //
            
    }
      
    </script>
    
    </body>
    </html>
