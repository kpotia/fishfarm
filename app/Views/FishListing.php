<?= $this->extend('templates/dashboard') ?>

<?= $this->section('content') ?>
    <div class="row">
        <table class='table '>
            <thead>
                <tr>
                    <th>Fish ID</th>
                    <th>Fish Name</th>
                    <th>Fish Description</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($fishes as $fish): ?>
                    <tr>
                        <td> <?=$fish['id'] ?></td>
                        <td> <?=$fish['name'] ?></td>
                        <td> <?=$fish['description'] ?></td>
                        <td>
                            <a href="edit/" class="btn">edit</a> 
                            <a href="delete/" class="btn">delete</a> 
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?= $this->endSection() ?>