<?php
session_start();
include("functions.php");


$vols = getvols();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Inclusion du fichier de style -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="table_style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    
    <title>Dashboard| Admin</title>
</head>


<body>

    <!-- Barre de navigation -->
    <div class="container-fluid p-0">

    <?php
include('template/nav_bar.php');
?>



        <!-- Contenu principal -->
        <div class="main">
            <div class="topbar">
                <!-- Bouton pour ouvrir le menu de navigation -->
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <!-- button ajouter hotel -->
                <div class="button">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ajoutModal"><strong>+Ajouter VOL</strong></button>
                </div>
            </div>
            <div class="table-container">
                <h2>Manage Vols</h2>
                <?php


                if (isset($_GET['ajout']) && $_GET['ajout'] == "ok") {
                    print '
    <div class="alert alert-success">
        Hotel ajoutee avec succes
    </div>';
                }
                ?>

                <?php
                if (isset($_GET['delete']) && $_GET['delete'] == "ok") {
                    print '
    <div class="alert alert-success">
        Hotel supprimee avec succes
    </div>';
                }
                ?>

                <?php
                if (isset($_GET['edit']) && $_GET['edit'] == "ok") {
                    print '
    <div class="alert alert-success">
        Hotel modifiée avec succes
    </div>';
                }
                ?>

                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Airlines</th>
                            <th>départ</th>
                            <th>arrivé</th>
                            <th>durée de vol</th>

                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($vols as $i => $vol) {
                            $i++;
                            echo '<tr>
                         <td>' . $i . '</td>
                         <td>' . $vol[1] . '</td>
                         <td>' . $vol[2] . '</td>
                         <td>' . $vol[3] . '</td>
                         <td>' . $vol[6] . '</td>
                         <td>

                         <button data-bs-toggle="modal" data-bs-target="#modifModal" class="btn btn-success">Modify</button>

                         <a href="suppvol.php?idv=' . $vol['0'] . '">
                             <button class="btn btn-danger">Delete</button>
                             </a>
                         </td>
                     </tr>';
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>


    </div>


    <!-- Ajout Modal -->
<div class="modal fade" id="ajoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter Vol</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="ajoutvol.php" method="post">
                    <div class="form-group">
                        Airline: <input type="text" name="airline" class="form-control">
                    </div>
                    <div class="form-group">
                        Départ: <input type="text" name="depart" class="form-control">
                    </div>
                    <div class="form-group">
                        Arrivée: <input type="text" name="arrive" class="form-control">
                    </div>
                    <div class="form-group">
                        Date de départ: <input type="date" name="date" class="form-control">
                    </div>
                    <div class="form-group">
                        Heure de départ: <input type="time" name="heure" class="form-control">
                    </div>
                    <div class="form-group">
                        Durée de vol: <input type="time" name="duree" class="form-control">
                    </div>
                    <div class="form-group">
                        Classe: <input type="text" name="classe" class="form-control">
                    </div>
                    <div class="form-group">
                        Tarif: <input type="number" step="0.01" name="tarif" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    

<?php foreach ($vols as $index => $vol) { ?>
    <div class="modal fade" id="modifModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modifier Vol</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="modifiervol.php" method="post">
                    <input type="hidden" name="idv" value="<?php echo $vol['0']; ?>" >
                    <div class="form-group">
                        Airline: <input type="text" name="airline" class="form-control" value="<?php echo $vol['1']; ?>">
                    </div>
                    <div class="form-group">
                        Départ: <input type="text" name="depart" class="form-control" value="<?php echo $vol['2']; ?>">
                    </div>
                    <div class="form-group">
                        Arrivée: <input type="text" name="arrive" class="form-control" value="<?php echo $vol['3']; ?>">
                    </div>
                    <div class="form-group">
                        Date de départ: <input type="date" name="date" class="form-control" value="<?php echo $vol['4']; ?>">
                    </div>
                    <div class="form-group">
                        Heure de départ: <input type="time" name="heure" class="form-control" value="<?php echo $vol['5']; ?>">
                    </div>
                    <div class="form-group">
                        Durée de vol: <input type="time" name="duree" class="form-control" value="<?php echo $vol['6']; ?>">
                    </div>
                    <div class="form-group">
                        Classe: <input type="text" name="classe" class="form-control" value="<?php echo $vol['7']; ?>">
                    </div>
                    <div class="form-group">
                        Tarif: <input type="number" step="0.01" name="tarif" class="form-control" value="<?php echo $vol['8']; ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php } ?>





    <!--====================Javascript=================  -->
    <script src="main.js"></script>
    <!-- Inclure le script Ionicons pour les navigateurs modernes -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>

     <!-- Inclure le script bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>