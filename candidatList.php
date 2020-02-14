<?php

const BASE_URL_API = 'http://e-learning.alaji.fr/webservice/rest/server.php?moodlewsrestformat=json&wstoken=92e270ed7da760d3d6df191e5582337b&wsfunction=';
//récupère les users
$content = file_get_contents(BASE_URL_API . 'core_enrol_get_enrolled_users&courseid=41');
$data = json_decode($content, true);
$candidates = $data;
$link = 'grades.php';
$target = 'index.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1> Liste des candidats</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Modification</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($candidates as $candidate) { ?>
                    <tr>
                        <th scope="row"></th>
                        <td> <?php echo $candidate["firstname"]; ?></td>
                        <td> <?php echo $candidate["lastname"]; ?></td>
                        <td><button type="button" class="btn btn-secondary"> modifier </button></td>
                    </tr>
                <?php } ?>


            </tbody>
        </table>
    </div>
</body>

</html>