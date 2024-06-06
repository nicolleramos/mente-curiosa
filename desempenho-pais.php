<?php 
include './php/verifica_login.php';
include './dados/conexao.php';

$id_usuario = $_SESSION['id']; 

$sql = "SELECT historico.id, historico.qtd_estrelas, historico.data_hora, atividades.nome_atividade 
        FROM historico 
        JOIN atividades ON historico.id_atividade = atividades.id 
        WHERE historico.id_usuario = $id_usuario
        ORDER BY historico.data_hora ASC";

$result = $conexao->query($sql);

$atividades = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $atividades[] = $row;
    }
}

$totalEstrelas = 0;
$totalAtividades = count($atividades);
$atividadesDetalhes = [];

foreach ($atividades as $atividade) {
    $totalEstrelas += $atividade['qtd_estrelas'];
    if (!isset($atividadesDetalhes[$atividade['nome_atividade']])) {
        $atividadesDetalhes[$atividade['nome_atividade']] = [
            'total_estrelas' => 0,
            'vezes_completadas' => 0
        ];
    }
    $atividadesDetalhes[$atividade['nome_atividade']]['total_estrelas'] += $atividade['qtd_estrelas'];
    $atividadesDetalhes[$atividade['nome_atividade']]['vezes_completadas']++;
}

$mediaEstrelas = $totalAtividades > 0 ? $totalEstrelas / $totalAtividades : 0;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Progresso da Criança</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 18px;
            text-align: left;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Progresso da Criança</h1>
    <p>Total de Estrelas: <?php echo $totalEstrelas; ?></p>
    <p>Média de Estrelas por Atividade: <?php echo round($mediaEstrelas, 2); ?></p>

    <h2>Detalhes por Atividade</h2>
    <table>
        <thead>
            <tr>
                <th>Nome da Atividade</th>
                <th>Total de Estrelas</th>
                <th>Vezes Completadas</th>
                <th>Média de Estrelas</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($atividadesDetalhes as $nome => $detalhes): ?>
                <tr>
                    <td><?php echo htmlspecialchars($nome); ?></td>
                    <td><?php echo $detalhes['total_estrelas']; ?></td>
                    <td><?php echo $detalhes['vezes_completadas']; ?></td>
                    <td><?php echo round($detalhes['total_estrelas'] / $detalhes['vezes_completadas'], 2); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
