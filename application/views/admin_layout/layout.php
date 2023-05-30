<!DOCTYPE html>
<html lang="en">
<head>
		<?php $this->load->view('admin_layout/head'); ?>
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
	<?php $this->load->view('admin_layout/navbar'); ?>

  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

	<?php $this->load->view('admin_layout/sidebar'); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 fw-bold">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
		<?php $this->load->view($content, $this->data); ?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
	<?php $this->load->view('admin_layout/footer'); ?>
	
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<?php $this->load->view('admin_layout/js',$this->data); ?>

<script src="<?= base_url('/assets/js/sweetalert.min.js') ?>"></script>
<script>
    $(document).ready(function() {
        <?php if (isset($sweet_alert)): ?>

				swal(
					"<?php echo $sweet_alert['title']; ?>",
				 	"<?php echo $sweet_alert['text']; ?>",
					"<?php echo $sweet_alert['type']; ?>");
        <?php endif; ?>
    });
</script>

</body>
</html>
