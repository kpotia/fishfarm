<?= $this->include('templates/header') ?>

<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <?= $this->include('templates/navbar') ?>

  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?= $this->include('templates/sidebar') ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
            <?php if(isset($title)):  ?>
              <?=$title ?>
                <?php else:?>
              Fishfarm
            <?php endif;?>
            </h1>
          </div>
          <div class="col-sm-6">
          
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <?= $this->renderSection('content') ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?= $this->include('templates/footer') ?>

