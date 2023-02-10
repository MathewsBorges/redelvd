
<div class="d-flex justify-content-center align-self-center" style="margin-top: 100px;">
    <h5 class="text-center">Current PDF Projects</h5>
</div>
<div class="d-flex justify-content-center align-self-center" style="margin-top: 55px;">
    <ul>
        <?php foreach ($records as $row) : ?>
            <td>Teste</td>
            <td>31/10/2001</td>
            <td><a href="display.php?id=<?= $row['id'] ?>" target="_blank"><?= $row['project_name'] ?></a></td>
            <li></li>
        <?php endforeach; ?>
    </ul>
</div>