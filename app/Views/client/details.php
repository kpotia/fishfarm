<?= $this->extend('templates/dashboard') ?>

<?= $this->section('content') ?>
<div class="row">

    <div class="col-10 bg-white">

        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Client Details</h5>
            </div>
            <div class="card-body">
                <ul class="list-unstyled">
                    
                    <li> ID: <?=$client['id']?></li>
                    <li> Name: <?=$client['firstname'].' '.$client['surname']?></li>
                    <li> Role: <?=$client['role']?></li>
                    <li> Contact: <?=$client['contact']?></li>
                    <li> Email: <?=$client['email']?></li>
                    
                    <li> Address: <?=$client['address']?></li>
                    <a href="client/edit/<?=$client['id'] ?>" class="btn btn-secondary">edit</a>
                    <a href="client/delete/<?=$client['id'] ?>" class="btn btn-danger">delete</a>
                    
                </ul>
            </div>
        </div>

    </div>

</div>
<?= $this->endSection() ?>