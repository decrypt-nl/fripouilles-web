<h1 class="text-center">Liste des utilisateurs</h1>
<hr class="w-50 mx-auto">
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Utilisateur</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $u): ?>
            <tr>
                <td><?= $u['id'] ?></td>
                <td>
                    <a href="<?= TemplateHelper::urlPath('user/view/'.$u['id']) ?>"><?= $u['name'] ?></a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

