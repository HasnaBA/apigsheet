<?php

const BASE_URL_API = 'http://e-learning.alaji.fr/webservice/rest/server.php?moodlewsrestformat=json&wstoken=92e270ed7da760d3d6df191e5582337b&wsfunction=';
define('USER_ID', $_GET["id"]);

$isSubmit = isset($_POST['submit']);

if ($isSubmit) {
    //récupère les quizz
    $attempts = file_get_contents(BASE_URL_API . 'mod_quiz_get_user_attempts&quizid=202&userid=' . USER_ID);
    $data = json_decode($attempts, true);
    $attempt = end($data['attempts']);


    //récupère un résumé des questions avec réponses
    $attempts = file_get_contents(BASE_URL_API . 'mod_quiz_get_attempt_review&attemptid=' . $attempt['id']);
    $data = json_decode($attempts, true);



    // récupérer les réponses des questions

    $response = $data['questions'];
    $response1 = $response[0];
    $response2 = $response[1];
    $response3 = $response[2];
    $response4 = $response[3];

    $mark1 = (float) $response1['mark'];
    $mark2 = (float) $response2['mark'];
    $mark3 = (float) $response3['mark'];
    $mark4 = (float) $response4['mark'];

    //récupère les notes orales

    $qo1 = (bool) $_POST['gridRadios1'];
    $qo2 = (bool) $_POST['gridRadios2'];
    $qo3 = (bool) $_POST['gridRadios3'];
    $qo4 = (bool) $_POST['gridRadios4'];

    //on s'assure que la response est 0 ou 1 (toutes les valeurs <1 seront egales a 1 et inversement)
    $qo1 = $qo1 ? 1 : 0;
    $qo2 = $qo2 ? 1 : 0;
    $qo3 = $qo3 ? 1 : 0;
    $qo4 = $qo4 ? 1 : 0;
    //affiche la moyenne par question

    $question1 = ($mark1 * 0.23 + $qo1 * 0.77);
    $question2 = ($mark2 * 0.89 + $qo2 * 0.11);
    $question3 = ($mark3 * 0.52 + $qo3 * 0.48);
    $question4 = ($mark4 * 0.34 + $qo4 * 0.66);


    $responses = [$question1, $question2, $question3, $question4];
}



?>





<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Alaji</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>

        </div>
    </nav>
  

    <?php if (!$isSubmit) { ?>
        <div class="container">

            <h1>Ajouter les notes orales d'un candidat</h1>
            <form method="POST">
                <div class="form-row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="First name">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Last name">
                    </div>
                </div>
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">Question 1</legend>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gridRadios1" id="gridRadios1" value="1">
                                <label class="form-check-label" for="gridRadios1">
                                    Acquis
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gridRadios1" id="gridRadios2" value="0">
                                <label class="form-check-label" for="gridRadios2">
                                    Non acquis
                                </label>
                            </div>

                        </div>

                    </div>
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">Question 2</legend>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gridRadios2" id="gridRadios1" value="1">
                                <label class="form-check-label" for="gridRadios1">
                                    Acquis
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gridRadios2" id="gridRadios2" value="0">
                                <label class="form-check-label" for="gridRadios2">
                                    Non acquis
                                </label>
                            </div>

                        </div>

                    </div>
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">Question 3</legend>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gridRadios3" id="gridRadios1" value="1">
                                <label class="form-check-label" for="gridRadios1">
                                    Acquis
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gridRadios3" id="gridRadios2" value="0">
                                <label class="form-check-label" for="gridRadios2">
                                    Non acquis
                                </label>
                            </div>

                        </div>

                    </div>
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">Question 4</legend>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gridRadios4" id="gridRadios1" value="1">
                                <label class="form-check-label" for="gridRadios1">
                                    Acquis
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gridRadios4" id="gridRadios2" value="0">
                                <label class="form-check-label" for="gridRadios2">
                                    Non acquis
                                </label>
                            </div>

                        </div>

                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </fieldset>
            </form>

        </div>
    <?php } else { ?>

        <div class="container">
            <h1>Résultats</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Résultat</th>


                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($responses as $key => $response) { ?>
                        <tr>
                            <th scope="row">Question <?php echo $key + 1; ?></th>
                            <td><?php echo $response > 0.5 ? 'acquis' : 'Non acquis'; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>


        </div>
    <?php } ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>