<?php
    require_once ("inc.php");
?>

    <nav>
        <ul class="menu">
            <li><a href="frmConsultation.php">Consultation</a></li>
            <li><a href="frmSaisie.php">Saisie</a></li>
            <li><a href="logout.php">Déconnexion [<?php echo $_SESSION['auth'] ?>]</a></li>
        </ul>
    </nav>