<?php
require_once("inscription.php");
$tableau=Clients::listeclients();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Liste de tous les gens inscrits </h1>
    <?php if(is_array($tableau) && count($tableau)>0) {?>
        <table>
     <?php foreach($tableau as $tab){?>
        <tr border:1>
            <td><?=$tab['Nom']?></td>
            <td><?=$tab['Prenom']?></td>
            <td><?=$tab['telephone']?></td>
            <td><?=$tab['Dateinsc']?></td>
        </tr>
        <?php }?>
        </table>
    <?php } ?>
</body>
</html>
