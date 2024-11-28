<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

require 'Random_Team.php';
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
} elseif ($uri == '/create_teams') {
    $teams = $r_team->get();

    $count = count($teams);

    $random_teams = [];

    $all_teams = [];

    foreach ($teams as $team) {
        $all_teams[] = $team['full_name'];
    }

    if ($count % 3 == 0)
    {
        while (true) {
                $first_member = array_rand($all_teams);

                $second_member = array_rand($all_teams);

                $third_member = array_rand($all_teams);

                if ($first_member != $second_member and $first_member != $third_member and $second_member != $third_member)
                {
                    $random_teams[] = $all_teams[$first_member] . ', ' . $all_teams[$second_member] . ', ' . $all_teams[$third_member];

                    unset($all_teams[$first_member]);
                    unset($all_teams[$second_member]);
                    unset($all_teams[$third_member]);
                }

                if (count($all_teams) == 0)
                {
                    break;
                }
        }
        print_r($random_teams);
    }
//    else{
//        if ($count % 3 == 1){
//
//            while (true) {
//                    $first_member = array_rand($all_teams);
//
//                    $second_member = array_rand($all_teams);
//
//                    $third_member = array_rand($all_teams);
//
//                    if ($first_member != $second_member and $first_member != $third_member and $second_member != $third_member)
//                    {
//                        $random_teams[] = $all_teams[$first_member] . ', ' . $all_teams[$second_member] . ', ' . $all_teams[$third_member];
//
//                        unset($all_teams[$first_member]);
//                        unset($all_teams[$second_member]);
//                        unset($all_teams[$third_member]);
//                    }
//
//                    if (empty($first_member) and empty($second_member))
//                    {
//                        $random_team = array_rand($random_teams);
//                        $random_teams[$random_team] = $random_teams[$random_team] . ', ' . $all_teams[$third_member];
//                        break;
//                    } elseif (empty($first_member) and empty($third_member))
//                    {
//                        $random_team = array_rand($random_teams);
//                        $random_teams[$random_team] = $random_teams[$random_team] . ', ' . $all_teams[$second_member];
//                        break;
//                    } elseif (empty($third_member) and empty($second_member))
//                    {
//                        $random_team = array_rand($random_teams);
//                        $random_teams[$random_team] = $random_teams[$random_team] . ', ' . $all_teams[$first_member];
//                        break;
//                    }
//
//                }
//
//            print_r($random_teams);
//        }
//    }



}