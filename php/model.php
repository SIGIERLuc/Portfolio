<?php
try {
    $connect = mysqli_connect('db5000039469.hosting-data.io', 'dbu82893', '5Qq7wpvefufu7FxHnUg9', 'dbs34444');
} catch (Exception $e) {
    die("<script>console.log(" . $e->getMessage() . ");</script>");
}


function get_project_id($connect)
{
    $sql = "SELECT ID FROM `project`";

    $req = mysqli_query($connect, $sql) or die("<script>console.log('Erreur de requète SQL : " . $sql . "');</script>");
    if ($all_project_id = $req) {
        return $all_project_id;
    }
}

function get_project($projectID, $connect)
{
    $sql = "SELECT * FROM `project` WHERE ID = " . $projectID;
    $req_project = mysqli_query($connect, $sql) or die("<script>console.log('Erreur de requète SQL : " . $sql . "');</script>");

    if ($project_results = mysqli_fetch_array($req_project)) {
        /* echo $projectID; */
        return $project_results;
    }
}

function get_button($projectID, $connect)
{
    $sql = "SELECT `button_id` FROM `display_project` WHERE `project_id` = " . $projectID;
    $req_display_project = mysqli_query($connect, $sql) or die("<script>console.log('Erreur de requète SQL : " . $sql . "');</script>");

    if ($display_results = $req_display_project) {
        $button_array = [];
        while ($row = mysqli_fetch_row($display_results)) {
            foreach ($row as $key => $value) {
                $sql = "SELECT * FROM `button` WHERE `ID` = " . $value;
                $req_button = mysqli_query($connect, $sql) or die("<script>console.log('Erreur de requète SQL : " . $sql . "');</script>");

                if ($button_results = mysqli_fetch_array($req_button)) {
                    array_push($button_array, $button_results);
                }
            }
        }
        return $button_array;
    }
}

function get_skill($connect)
{
    $sql = "SELECT * FROM `skill`";
    $req_skill = mysqli_query($connect, $sql) or die("<script>console.log('Erreur de requète SQL : " . $sql . "');</script>");

    if ($skill = $req_skill) {
        return $skill;
    }
}
