<?= $this->extend('templates/dashboard') ?>

<?= $this->section('content') ?>
<div class="row">

    <div class="col-10 bg-white">

        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Title</h5>
                <p class="card-text">Content</p>
            </div>
            <div class="card-body">
                <ul class="list-unstyled">
                    <li>property: value</li>
                </ul>
            </div>
        </div>

    </div>

</div>
<?= $this->endSection() ?>