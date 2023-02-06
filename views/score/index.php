<?php $title = 'Page des scores'; ?>

<h1 class="d-flex justify-content-center">Page des scores</h1>

<table class="table table-hover table-bordered border-secondary table-sm caption-top">
    <caption>Liste des joueurs</caption>
    <thead class="table-dark">
        <tr>
            <th scope="col">Pseudo</th>
            <th scope="col">Score</th>
            <th scope="col">Temps</th>
            <!-- <th scope="col">Rank</th> -->
        </tr>
    </thead>
    <tbody class="table-group-divider">
        <?php foreach($scores as $s): ?>
            <tr>
                <td class="table-primary"><?= $s['username'] ?></td>
                <td class="table-warning"><?= $s['score'] ?> pièces</td>
                <td class="table-secondary"><?= $s['timely'] ?> secondes</td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

