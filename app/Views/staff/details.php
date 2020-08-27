<?= $this->extend('templates/dashboard') ?>

<?= $this->section('content') ?>
<div class="row">

    <div class="col-10 bg-white">

        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Staff Details</h5>
            </div>
            <div class="card-body">
                <ul class="list-unstyled">
                    
                    <li> ID: <?=$staff['id']?></li>
                    <li> Name: <?=$staff['firstname'].' '.$staff['surname']?></li>
                    <li> Role: <?=$staff['role']?></li>
                    <li> Contact: <?=$staff['contact']?></li>
                    <li> Email: <?=$staff['email']?></li>
                    
                    <li> Address: <?=$staff['address']?></li>
                    <a href="staff/edit/<?=$staff['id'] ?>" class="btn btn-secondary">edit</a>
                    <a href="staff/delete/<?=$staff['id'] ?>" class="btn btn-danger">delete</a>
                    
                </ul>
            </div>
        </div>

    </div>

</div>
<?= $this->endSection() ?>