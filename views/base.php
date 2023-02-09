<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="<?= TemplateHelper::assetPath('css/style.css') ?>" rel="stylesheet">
    <title> <?php echo $title ?></title>
</head>
<body>
<?php   if(isset($_SESSION['notif'])) { ?>
            <div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
                <p><?= $_SESSION['notif']['messages'] ?></p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
           <?php unset($_SESSION['notif']);
        } ?>

<nav class="navbar navbar-expand-md bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand text-info" href="<?= TemplateHelper::urlPath('home') ?>">
            <i class="fa-solid fa-house-chimney text-info pe-none me-2"></i>Diabs_APS
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link text-warning" aria-current="page" href="<?= TemplateHelper::urlPath('score') ?>">
                <i class="fa-solid fa-star text-warning"></i> Tableau des scores</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-danger-emphasis" href="<?= TemplateHelper::urlPath('contact') ?>">
                <i class="fa-solid fa-envelopes-bulk text-danger-emphasis"></i> Contact</a>
                </li>
            </ul>
        </div>
    </div>
    <li class="nav-item dropdown position-absolute top-0 end-0">
        <a class="nav-link dropdown-toggle text-info" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-circle-user text-light"></i> Déjà inscrit ?
        </a>
    <ul class="dropdown-menu text-bg-light">
        <li><a class="dropdown-item text-bg-light" href="<?= TemplateHelper::urlPath('registration') ?>">Se connecter <i class="fa-regular fa-face-smile-beam"></i></a></li>
        <li><hr class="dropdown-divider text-bg-dark"></li>
        <li><a class="dropdown-item text-bg-light" href="#">S'inscrire <i class="fa-regular fa-face-smile-wink"></i></a></li>
    </ul>
    </li>
</nav>
    <div id="header">
        <img src="<?= TemplateHelper::assetPath('images/cat.png') ?>" alt="bootstrap" class="img-circle">
    </div>

    <div id="mainContainer">
        <?= $mainContainer ?>
    </div>

    <footer id="footer" class="border border-light rounded">
        <div class="contain">
            <ul class="nav">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Features</a></li>
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Pricing</a></li>
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">FAQs</a></li>
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">About</a></li>
            </ul>
        </div>
        <div class="footer-reseaux">
            <h3>Nos réseaux <i class="fa-solid fa-globe"></i></h3>
            <ul class="liste-media">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">
                        <i class="icons fa-brands fa-facebook text-primary"></i>Facebook/
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">
                        <i class=" icons fa-brands fa-github text-info"></i>Github/
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">
                        <i class="icons fa-brands fa-linkedin-in"></i>Linkedin/
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">
                        <i class="fa-brands fa-discord"></i>Discord/
                    </a>
                </li>
            </ul>
        </div>
        <div>
            <h6 class="copyright ">&copy; 2023 Criac, Inc, All rights reserved.</h6>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script>
        const divAlert = document.getElementById("alert"); 
        if(divAlert) {
            setTimeout(() => {
                divAlert.remove();
            },("divAlert", "5000")); 
        }

    </script>
</body>
</html>