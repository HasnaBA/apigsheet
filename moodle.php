<?php

define('USER_ID', $_GET["id"]);
const BASE_URL_API = 'http://e-learning.alaji.fr/webservice/rest/server.php?moodlewsrestformat=json&wstoken=92e270ed7da760d3d6df191e5582337b&wsfunction=';
//récupère les users
$content = file_get_contents(BASE_URL_API . 'core_user_get_users&criteria[0][key]=core_user_get_users&criteria[0][key]=email&criteria[0][value]=%' . USER_ID);
$data = json_decode($content, true);
$users = $data['users'][0];







?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Modification</th>
                </tr>
            </thead>
            <?php foreach ($users as $key => $user) { ?>
            <tbody>
                <tr>
                    <th scope="row"><?php echo $key+1 ?></th>
                    <td><?php $user['nom'];?></td>
                    <td><?php $user['prénom'];?></td>
                    <td><button type="button" class="btn btn-secondary">modifier</button></td>
                </tr>
            <?php } ?>
                
            </tbody>
        </table>
    </div>
</body>

</html>