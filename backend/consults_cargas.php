<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carga";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão com o banco de dados falhou: " . $conn->connect_error);
}

$consulta = 'SELECT * FROM carga';
$query = mysqli_prepare($conn, $consulta);

if ($query) {
    mysqli_stmt_execute($query);
    $result = mysqli_stmt_get_result($query);

    while ($dados = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . date("d-m-Y", strtotime($dados['DATA'])) . "</td>";
        echo "<td>" . htmlspecialchars($dados['OPERACAO']) . "</td>";
        echo "<td>" . htmlspecialchars($dados['HORA']) . "</td>";
        echo "<td>" . htmlspecialchars($dados['RECEBIDO']) . "</td>";
        echo "<td>" . htmlspecialchars($dados['RT']) . "</td>";
        echo "<td>" . htmlspecialchars($dados['DESCRICAO']) . "</td>";
        echo "<td>" . htmlspecialchars($dados['SUBCLASSE']) . "</td>";
        echo "<td>" . htmlspecialchars($dados['TIPO']) . "</td>";
        echo "<td>" . htmlspecialchars($dados['ORIGEM']) . "</td>";
        echo "<td>" . htmlspecialchars($dados['DESTINO']) . "</td>";
        echo "<td>" . date("d-m-Y", strtotime($dados['PREVISAO'])) . "</td>";
        echo "<td>" . date("d-m-Y / H:i", strtotime($dados['SAIDA'])) . "</td>";
        echo "<td>" . htmlspecialchars($dados['QUANTIDADE']) . "</td>";
        echo "<td>" . htmlspecialchars($dados['PESO']) . "</td>";
        echo "<td>" . htmlspecialchars($dados['RETIRADO']) . "</td>";
        echo "<td>" . htmlspecialchars($dados['IDENTIFICACAO']) . "</td>";
        echo "<td>" . htmlspecialchars($dados['EMPRESA']) . "</td>";
        echo "<td>" . htmlspecialchars($dados['VALOR']) . "</td>";
        
        echo "<td>  <a href='consulta_carga_por_id.php?id=" . $dados['ID'] . "'>Imprimir Relatório</a></td>";
        // Coloque aqui a parte de edição/exclusão, se necessário.
        echo "</tr>";
    }
} else {
    // Tratar erros na preparação da consulta.
    echo "Erro na consulta.";
}

mysqli_close($conn);
?>
