<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Liga Planet</title></head>
<body>
    <h1>Liga Planet - Aplikacja PHP MVC</h1>
    <ul>
        <li><a href="?action=bestTeam">Wskaż najlepszą drużynę</a></li>
        <li><a href="?action=bestPlayer">Wskaż najlepszego zawodnika</a></li>
    </ul>

    <form method="GET">
        <input type="hidden" name="action" value="playerAgainst">
        <label>Wybierz drużynę:</label>
        <select name="team">
            <?= \$controller->getTeamListOptions(); ?>
        </select>
        <button type="submit">Wskaż zawodnika na tę drużynę</button>
    </form>

    <hr>
    <div>
        <?= \$output ?>
    </div>
</body>
</html>
