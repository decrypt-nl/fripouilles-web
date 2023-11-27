<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="style.css" rel="stylesheet">
    <title> <?php echo $title ?></title>
</head>
<body>

<nav class="navbar navbar-expand-md bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand text-info" href="accueil.php">
            <i class="fa-solid fa-house-chimney text-info pe-none me-2"></i>Les Fripouilles |
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link text-danger-emphasis" href="modifier.php">
                <i class="fa-solid fa-envelopes-bulk text-danger-emphasis"></i> Modifier mes données</a>
                </li>
            </ul>
        </div>
    </div>
    <li class="nav-item dropdown position-absolute top-0 end-0">
        <a class="nav-link dropdown-toggle text-info" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-circle-user text-light"></i> Déjà inscrit ?
        </a>
    <ul class="dropdown-menu text-bg-white">
        <li><a class="dropdown-item text-bg-success" href="connexion.php">Se connecter<i class="fa-regular fa-face-smile-beam"></i></a></li>
        <li><hr class="dropdown-divider text-bg-dark"></li>
        <li><a class="dropdown-item text-bg-success" href="registration.php">S'inscrire<i class="fa-regular fa-face-smile-wink"></i></a></li>
        <li><hr class="dropdown-divider text-bg-dark"></li>
        <li><a class="dropdown-item text-bg-danger" href="deconnexion.php">Me déconnecté<i class="fa-solid fa-face-frown-open"></i></a></li>
    </ul>
    </li>
</nav>
<div id="header">
    
</div>
