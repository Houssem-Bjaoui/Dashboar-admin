<?php
session_start();

include "functions.php";

$info = getinfo();
$clients=getclients();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Inclusion du fichier de style -->
    <link rel="stylesheet" href="profile_style.css">
    <link rel="stylesheet" href="table_style.css">



    <title>Dashboard| Admin</title>
</head>

<body>

    <!-- Barre de navigation -->
    <div class="container">

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
               
            </div>
            <!--============ Cards===========-------->
            <div class="cardBox">
                <div class="card">
                    <div class="cardInfo">
                        <div class="numbers"><?php echo $info['users'][0]; ?></div>
                        <div class="cardName">Clients</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="people-circle-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div class="cardInfo">
                        <div class="numbers"><?php echo $info['Airlines'][0]; ?></div>
                        <div class="cardName">Airlines</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="airplane-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div class="cardInfo">
                        <div class="numbers"><?php echo $info['hotels'][0]; ?></div>
                        <div class="cardName">Hotels</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="bed-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div class="cardInfo">
                        <div class="numbers"><?php echo $info['vols'][0]; ?></div>
                        <div class="cardName">Vols</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="paper-plane-outline">></ion-icon>
                    </div>
                </div>
            </div>

            <div class="table-container">
      
<h2>Tableau des clients</h2>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th> Name</th>
                            <th>Email</th>

                        </tr>
                    </thead>
                    <tbody>
                   
                    <?php
                        foreach ($clients as $i => $client) {
                            $i++;
                            echo '<tr>
                         <td>' . $i . '</td>
                         <td>' . $client[1] . '</td>
                         <td>' . $client[2] . '</td>
                        
                     </tr>';
                        }
                        ?>
                    </tbody>
                </table>

            </div>
  
        </div>
        <!--====================Javascript=================  -->
        <script src="main.js"></script>
        <!-- Inclure le script Ionicons pour les navigateurs modernes -->
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</body>

</html>