<div class="navbar">
    <div class="navbar-logo">🏠 RealEstate</div>

    <div class="navbar-links">
        <!-- Public links (visible to everyone) -->
        <a href="/">Accueil</a>
        <a href="property/property_list.php">Liste des biens</a>
        <?php
            // If user is logged in, show private action links
            if(isset($_SESSION['agent_id'])) {
        ?>
            <a href="add_property.php">Ajout un bien</a>
            <a href="add_agent.php">Ajout un agent</a>
            <a href="logout.php">Déconnexion</a>
        <?php
            } else {
                // If user is not logged in, show login link
                ?>
                    <a href="login.php">Connexion</a>
                <?php
            }
        ?>
    </div>
</div>