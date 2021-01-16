<?= $this->extend('templates/dashboard') ?>

<?= $this->section('content') ?>
    <div class="row">
      <div class="card col-8">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>
  <?php if(session()->get('success')): ?>
  <div class="alert alert-success" role="alert">
    <?= session()->get('success') ?>
  </div>
  <?php endif; ?>
      <form action="#" method="post">
      <div class="input-group mb-3">
          <input type="text" class="form-control" name="firstname" value="<?= set_value('firstname')?>" placeholder="Firstname">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="lastname" value="<?= set_value('lastname')?>" placeholder="Full name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" value="<?= set_value('email')?>" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" value="<?= set_value('password')?>" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="confirm_password" value="<?= set_value('confirm_password')?>" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <?php if(isset($validation)):?>
          <div class="col-12">
            <div class="alert alert-danger" role="alert">
              <?= $validation->listErrors();?>
            </div>
          </div>

        <?php endif;?>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- <a href="/fishfarm_ci/public/sales" class="text-center">I already have a membership</a> -->
    </div>
    <!-- /.form-box -->
  </div>
    </div>
<?= $this->endSection() ?>