<!DOCTYPE html>
<html>
<head>
    <title>Cálculo de Diferença</title>
    <style>
        @media print {
            form, .novo-dados, button[name="novo"] {
                display: none;
            }
        }
    </style>
</head>
<body>

<?php
// Recebe os valores do formulário
$entrada = $_POST['entrada'] ?? null;
$saida = $_POST['saida'] ?? null;
$placa = $_POST['placa'] ?? '';
$cliente = $_POST['cliente'] ?? '';

if ($entrada !== null && $saida !== null) {
    $diferenca = abs($entrada - $saida);

    // Data/hora no fuso de São Paulo
    date_default_timezone_set('America/Sao_Paulo');
    $data_entrada = date('d/m/Y H:i');
    $data_saida = date('d/m/Y H:i');

    echo "<div class='imprimir'>";
    echo "<h2>Sucata Alves</h2>";
    echo "<hr>";
    echo "Data/Hora da Entrada: $data_entrada<br></br>";
    echo "Data/Hora da Saída: $data_saida<br><br>";
    echo "Placa: $placa<br>";
    echo "Cliente: $cliente<br><br>";
    echo "Tara: $entrada<br>";
    echo "Peso de Saída: $saida<br>";
    echo "Peso Bruto: $diferenca<br>";
    echo "</div>";

    echo "<button onclick='window.print()'>Imprimir</button>";
    echo "<form method='post'><button name='novo' type='submit'>Digitar Novos Dados</button></form>";
    echo "<hr>";
}
?>

<?php if (!isset($_POST['entrada']) || isset($_POST['novo'])): ?>
<form method="post" action="">
    <label for="placa">Placa:&nbsp;&nbsp;&nbsp;</label>
    <input type="text" name="placa" id="placa" required><br>
    <label for="cliente">Cliente:</label>
    <input type="text" name="cliente" id="cliente" required><br><br>

    <label for="entrada">Tara:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input type="number" name="entrada" id="entrada" required><br>

    <label for="saida">Peso de Saída:</label>
    <input type="number" name="saida" id="saida" required><br><br>

    <input type="submit" value="Calcular">
</form>
<?php endif; ?>

</body>
</html>
