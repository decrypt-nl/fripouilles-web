<h1 class="text-center">Tableau des scores</h1>
<hr class="w-50 mx-auto">
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th scope="col">Score ID</th>
            <th scope="col">Utilisateur</th>
            <th scope="col">Score</th>
            <th scope="col">Temps</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($scores as $s): ?>
            <tr>
                <td><?= $s['id'] ?></td>
                <td><?= $s['username'] ?></td>
                <td><?= $s['score'] ?></td>
                <td><?= $s['time'] ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

