<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de IMC</title>
    <link rel="stylesheet" href="style.css ">
</head>

<body>
    <div class="container">
        <p class="title">Seja Bem-vindo(a)</p>
        <p class="subtitle">Siga o formulario para calcular seu Indice de Massa Corporal (IMC)</p>

        <div class="form-container">
            <form method="get">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>

                <label for="idade">Idade:</label>
                <input type="text" id="idade" name="idade" required>

                <label for="peso">Peso (kg):</label>
                <input type="number" id="peso" name="peso" step="0.1" required>

                <label for="altura">Altura (m):</label>
                <input type="text" id="altura" name="altura" required oninput="mascaraAltura(this)">

                <input type="submit" value="Calcular IMC">
            </form>

            <?php
            if (isset($_GET["peso"]) && $_GET["altura"]) {
                $nome = $_GET["nome"];
                $idade = $_GET["idade"];
                $peso = (float)$_GET["peso"];
                $altura = (float)$_GET["altura"];
                $imc = round(num: $peso / ($altura * $altura),  precision: 2);
                $resultado = $imc <= 18.5 ? "Você está abaixo do peso" : ($imc <= 25 ? "Você está peso normal" : ($imc <= 30 ? "Você com sobrepeso" : "Você está obeso"));
                $cores_resultado_imc = $imc <= 18.5 ? "color: #ffff; background-color: #981a1c" : ($imc <= 25 ? "color: #ffff; background-color: #99db49" : ($imc <= 30 ? "color: #ffff; background-color: #981a1c" : "color: #ffff; background-color: #c21b12"));
                $cores_resultado_tabela = $imc <= 18.5 ? "color: #981a1c; font-weight: bold;" : ($imc <= 25 ? "color: #99db49; font-weight: bold;" : ($imc <= 30 ? "color: #981a1c; font-weight: bold;" : "color: #c21b12; font-weight: bold;"));
            }
            ?>
        </div>
        <div class="result-container">
            <p class="title-result">Obrigado pelas informações, <?= $nome ?></p>
            <p class="result">Seu IMC foi: <span style="<?= $cores_resultado_imc ?>"><?= $imc ?></span> </p>
            <p class="classi"><span style="<?= $cores_resultado_tabela ?>"><?= $resultado ?></span></p>
        </div>
    </div>
    <script>
        function mascaraAltura(el) {
            // Remove tudo que não for número
            let valor = el.value.replace(/\D/g, '');

            // Se estiver vazio, sai
            if (!valor) {
                el.value = '';
                return;
            }

            // Coloca a vírgula (ou ponto) antes dos dois últimos dígitos
            if (valor.length === 1) {
                el.value = '0,' + valor;
            } else if (valor.length === 2) {
                el.value = '0,' + valor;
            } else {
                let inteiro = valor.slice(0, -2);
                let decimal = valor.slice(-2);
                el.value = inteiro + ',' + decimal;
            }
        }
    </script>

</body>

</html>