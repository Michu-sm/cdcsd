<?php
require_once __DIR__ . '/../models/Team.php';

class TeamController {
    private $team;

    public function __construct($db) {
        $this->team = new Team($db);
    }

    public function handleRequest() {
        $action = $_GET['action'] ?? 'home';
        switch ($action) {
            case 'bestTeam':
                return "Najlepsza drużyna to: <b>" . $this->team->getBestTeam() . "</b>";
            case 'bestPlayer':
                return "Najlepszy zawodnik to: <b>" . $this->team->getBestPlayer() . "</b>";
            case 'playerAgainst':
                $team = $_GET['team'] ?? '';
                return "Najlepszy zawodnik przeciwko <i>$team</i>: <b>" . $this->team->getPlayerAgainstTeam($team) . "</b>";
            default:
                return "";
        }
    }

    public function getTeamListOptions() {
        $teams = $this->team->getAllTeams();
        $options = "";
        foreach ($teams as $team) {
            $options .= "<option value='$team'>$team</option>";
        }
        return $options;
    }
}
?>
