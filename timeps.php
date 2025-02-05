<?php include 'templates/header.php'; ?>

<form action="time.php" method="GET">
    <input type="text" name="team" placeholder="Digite o nome do time">
    <button type="submit">Buscar</button>
</form>

<?php
include 'api.php';

if (isset($_GET['team'])) {
    $teamName = $_GET['team'];

    
    $teams = getDataFromAPI("teams?search=$teamName");
    if (!empty($teams['response'])) {
        $teamId = $teams['response'][0]['team']['id'];

        
        $upcomingMatches = getDataFromAPI("fixtures?team=$teamId&next=5");
        $lastMatches = getDataFromAPI("fixtures?team=$teamId&last=5");

        echo "<h2>Próximos Jogos de $teamName</h2>";
        foreach ($upcomingMatches['response'] as $game) {
            echo "<p>{$game['teams']['home']['name']} vs {$game['teams']['away']['name']} - {$game['fixture']['date']}</p>";
        }

        echo "<h2>Últimos Resultados de $teamName</h2>";
        foreach ($lastMatches['response'] as $game) {
            echo "<p>{$game['teams']['home']['name']} {$game['goals']['home']} x {$game['goals']['away']} {$game['teams']['away']['name']}</p>";
        }
    } else {
        echo "<p>Time não encontrado.</p>";
    }
}
?>

<?php include 'templates/footer.php'; ?>