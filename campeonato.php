<?php
include 'api.php';

$leagueId = $_GET['league'] ?? null;
$season = 2023; 
$teamName = $_GET['team'] ?? null;

if (!$leagueId) {
    die("Erro: Nenhuma liga selecionada.");
}

$today = time(); 

$fixtures = getDataFromAPI("fixtures?league=$leagueId&season=$season");
$pastFixtures = getDataFromAPI("fixtures?league=$leagueId&season=$season&status=FT");


$isValidTeam = true;
if ($teamName) {
    $isValidTeam = false;
    
    foreach ($fixtures['response'] ?? [] as $game) {
        if (stripos($game['teams']['home']['name'], $teamName) !== false || stripos($game['teams']['away']['name'], $teamName) !== false) {
            $isValidTeam = true;
            break;
        }
    }

    
    if (!$isValidTeam) {
        $teamName = null; 
        $errorMessage = "Erro: O nome pesquisado é inválido ou inexistente.";
    }
}

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campeonato de Futebol</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">

    <h1 class="text-center mb-4">Campeonato de Futebol</h1>

    <!-- Formulário para busca por time -->
    <form method="GET" class="mb-4">
        <input type="hidden" name="league" value="<?= $leagueId ?>">
        <div class="input-group">
            <input type="text" name="team" class="form-control" placeholder="Digite o nome do time" required>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
    </form>

    <?php if ($teamName): ?>
        <h2 class="text-center">Resultados para: <strong><?= htmlspecialchars($teamName) ?></strong></h2>
    <?php elseif (isset($errorMessage)): ?>
        <div class="alert alert-danger text-center"><?= $errorMessage ?></div>
    <?php endif; ?>

    
    <div class="mb-4">
        <h2>Próximos Jogos</h2>
        <?php if ($fixtures && isset($fixtures['response']) && is_array($fixtures['response'])): ?>
            <div class="list-group">
                <?php
                $count = 0;
                foreach ($fixtures['response'] as $game):
                    $gameTimestamp = $game['fixture']['timestamp']; 
                    
                    if ($gameTimestamp < $season) {
                        continue;
                    }

                    if ($count >= 5) break; 

                    $homeTeam = $game['teams']['home']['name'];
                    $awayTeam = $game['teams']['away']['name'];
                    $matchDate = date("d/m/Y H:i", $gameTimestamp);

                    if ($teamName && stripos($homeTeam, $teamName) === false && stripos($awayTeam, $teamName) === false) {
                        continue;
                    }

                    $count++; 
                    ?>
                    <div class="list-group-item">
                        <div class="d-flex justify-content-between">
                            <strong><?= htmlspecialchars($homeTeam) ?> vs <?= htmlspecialchars($awayTeam) ?></strong>
                            <span class="badge bg-primary"><?= $matchDate ?></span>
                        </div>
                        <p>🏟 Estádio: <?= htmlspecialchars($game['fixture']['venue']['name'] ?? 'Não informado') ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>Nenhum jogo encontrado.</p>
        <?php endif; ?>
    </div>

    <!-- Exibindo os Últimos Resultados -->
    <div class="mb-4">
        <h2>Últimos Resultados</h2>
        <?php if ($pastFixtures && isset($pastFixtures['response']) && is_array($pastFixtures['response'])): ?>
            <div class="list-group">
                <?php
                $count = 0;
                foreach ($pastFixtures['response'] as $game):
                    if ($count >= 5) break; 

                    $homeTeam = $game['teams']['home']['name'];
                    $awayTeam = $game['teams']['away']['name'];
                    $homeGoals = $game['goals']['home'];
                    $awayGoals = $game['goals']['away'];
                    
                    if ($teamName && stripos($homeTeam, $teamName) === false && stripos($awayTeam, $teamName) === false) {
                        continue;
                    }

                    $count++; 
                    ?>
                    <div class="list-group-item">
                        <strong><?= htmlspecialchars($homeTeam) ?> <?= $homeGoals ?>x<?= $awayGoals ?> <?= htmlspecialchars($awayTeam) ?></strong>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>Nenhum resultado encontrado.</p>
        <?php endif; ?>
    </div>

</body>
</html>
