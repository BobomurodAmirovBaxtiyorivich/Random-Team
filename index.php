<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

require 'src/Random_Team.php';
require 'helpers.php';

$r_team = new Random_Team();

if ($uri == '/') {
    $teams = $r_team->get();

    view('home', ['teams' => $teams]);
} elseif ($uri == '/store') {
    if (isset($_POST['f_n'])) {
        $r_team->store($_POST['f_n']);

        header('Location: /');
    }
} elseif ($uri == '/create') {

    if (isset($_POST['sub_team'])) {
        $teams = $r_team->get();

        $count = count($teams) % $_POST['count'];

        $random_teams = [];

        $all_teams = [];

        foreach ($teams as $team) {
            $all_teams[] = $team['full_name'];
        }

        $random_members = [];

        while (true) {
            for ($i = 0; $i < $_POST['count']; $i++) {
                $random_member = array_rand($all_teams);
                if (!in_array($all_teams[$random_member], $random_teams)) {
                    $random_members[$i] = $all_teams[$random_member];
                    unset($all_teams[$random_member]);
                }
            }

            $random_teams[] = $random_members;

            if (count($all_teams) == $count) {
                break;
            }

        }

        $all_teams = array_values($all_teams);

        $random_members = [];

        if (count($all_teams) > 0) {
            while (true) {
                for ($i = 0; $i <= count($all_teams); $i++) {
                    $random_member = array_rand($all_teams);
                    if (!in_array($all_teams[$random_member], $random_teams)) {
                        $random_members[$i] = $all_teams[$random_member];
                        unset($all_teams[$random_member]);
                    }
                }

                for ($i = 0; $i <= count($random_members); $i++) {
                    $random_m = array_rand($random_members);
                    $random_team = array_rand($random_teams);

                    if (!in_array($random_members[$random_m], $random_teams[$random_team]) and count($random_teams[$random_team]) <= $_POST['count'] + 1) {
                        $random_teams[$random_team][] = $random_members[$random_m];
                        unset($random_members[$random_m]);
                    }
                }

                if (count($all_teams) == 0) {
                    break;
                }

            }
        }

        $i = 1;
        foreach ($random_teams as $team) {
            echo '<h1 align="center">' . $i . '-team| ' . implode(', ', $team) . '</h1>';
            $i++;
        }

        echo '<h1 align="center"><a href="/" class="btn btn-primary">Back to main</a></h1>';
    }

} elseif ($uri == '/delete') {
    if (isset($_GET['id'])) {
        $r_team->delete($_GET['id']);
        header('Location: /');
    }
}