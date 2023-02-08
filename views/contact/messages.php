<?php 
$title = 'Boite à messages'; 
?>
  <div class="alert alert-danger alert-dismissible fade show- <?php echo $_SESSION['notif']['type']; ?>" role="alert">
    <strong>Erreur survenue !</strong> Veuillez réessayer plus tard.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<h1 class="d-flex justify-content-center">Ma boîte à message</h1>
<table class="table table-hover table-bordered border-secondary table-sm caption-top">
    <caption>Liste des messages</caption>
        <thead class="table-dark">
            <tr>
                <th scope="col">Email</th>
                <th scope="col">Message du joueur</th>
                <th scope="col"></th>
            </tr>
        </thead>
    <tbody class="table-group-divider">
    <tr><?php foreach($messages as $m): ?>
      <td class="table-primary"><?= $m['email'] ?></td>

      <td class="table-primary"><?= $m['message'] ?></td>

      <td class="table-primary">
      <div class="btn-group" role="group">
      <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
      Modifier <i class="fa-regular fa-pen-to-square"></i>
      </button>
      <ul class="dropdown-menu dropdown-menu-dark">
      <li><button class="dropdown-item btn" name="answer"  type="button">Répondre <i class="fa-solid fa-comment-dots"></i></button></li>
      <li><a href="<?php TemplateHelper::urlPath('contact/delete/'. $m['id']) ?>" class="dropdown-item btn" name="delete">Supprimer <i class="fa-solid fa-trash-can"></i></a></li>
    </ul>
    </div>
    </td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>