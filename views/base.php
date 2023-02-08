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
    <div>
    <nav class="navbar bg-dark navbar-expand-md navbar-light" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand text-white pe-none"  href="<?= TemplateHelper::urlPath('home') ?>">Diabs_APS</a>
            <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-primary-emphasis" href="<?= TemplateHelper::urlPath('home') ?>">
                            <i class="fa-solid fa-house-chimney text-info pe-none"></i>Acceuil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-warning link-warning" href="<?= TemplateHelper::urlPath('score') ?>">
                            <i class="fa-solid fa-star link-warning pe-none"></i>Tableau des scores
                        </a>
                    </li>
                    <li>
                        <a class="nav-link text-danger" href="<?= TemplateHelper::urlPath('contact') ?>">
                            <i class="fa-solid fa-envelopes-bulk text-danger-emphasis pe-none"></i>Contact
                        </a>
                    </li>
                </ul>
            </div>
        </div>
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
    </div>
</body>
</html>