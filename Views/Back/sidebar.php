<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Cuisinet<sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Khayri.php-->

    <li class="nav-item">

        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdmin" aria-expanded="true" aria-controls="collapseAdmin">
            <i class=""></i>
            <span>ADMINS</span>
        </a>
        <div id="collapseAdmin" class="collapse" aria-labelledby="headingAdmin" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Gérer Les admins</h6>
                <a class="collapse-item" href="ajouterAdmin.php">Ajouter un Admin</a>
                <a class="collapse-item" href="afficherAdmin.php">Afficher Les Admins</a>
            </div>
        </div>


        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEmployes" aria-expanded="true" aria-controls="collapseEmployes">
            <i class=""></i>
            <span>Employés</span>
        </a>
        <div id="collapseEmployes" class="collapse" aria-labelledby="headingEmployes" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Gérer les employés:</h6>
                <a class="collapse-item" href="ajouterEmploye.php">Ajouter un Employé</a>
                <a class="collapse-item" href="afficherEmployes.php">Afficher Les employés</a>

            </div>
        </div>

        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseClients" aria-expanded="true" aria-controls="collapseClients">
            <i class=""></i>
            <span>Clients</span>
        </a>
        <div id="collapseClients" class="collapse" aria-labelledby="headingEmployes" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Gérer les clients:</h6>
                <a class="collapse-item" href="ajouterClient.php">Ajouter un Client</a>
                <a class="collapse-item" href="afficherClients.php">Afficher Les clients</a>

            </div>
        </div>
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePlats" aria-expanded="true" aria-controls="collapsePlats">
            <i class=""></i>
            <span>Plats</span>
        </a>
        <div id="collapsePlats" class="collapse" aria-labelledby="headingPlats" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Gérer les Plats:</h6>
                <a class="collapse-item" href="ajouterPlat.php">Ajouter un Plat</a>
                <a class="collapse-item" href="afficherPlats.php">Afficher Les Plats</a>

            </div>
        </div>
   <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePromos" aria-expanded="true" aria-controls="collapsePromos">
            <i class=""></i>
            <span>Promos</span>
        </a>
        <div id="collapsePromos" class="collapse" aria-labelledby="headingPromos" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Gérer les Promotions:</h6>
                <a class="collapse-item" href="ajouterPromo.php">Ajouter une promotions</a>
                <a class="collapse-item" href="afficherPromos.php">Afficher Les promotions</a>

            </div>
        </div>

    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar -->
