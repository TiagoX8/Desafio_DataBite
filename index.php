<?php include 'templates/header.php'; ?>

<h2>Escolha um Campeonato</h2>
<form action="campeonato.php" method="GET">
    <select name="league">
        <option value="71">Campeonato Brasileiro</option>
        <option value="39">Premier League</option>
        <option value="140">La Liga</option>
    </select>
    <button type="submit">Buscar</button>
</form>

<?php include 'templates/footer.php'; ?>