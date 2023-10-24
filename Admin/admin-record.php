<?php
session_start();
error_reporting(0);
include('../connect.php');
if (strlen($_SESSION['admin-username']) == "") {
  header("Location: login.php");
} else {
}
$username = $_SESSION['admin-username'];


date_default_timezone_set('Africa/Lagos');
$current_date = date('Y-m-d');

$sql = "select * from admin where username='$username'";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Record|Dashboard</title>
  <link rel="icon" type="image/png" sizes="16x16" href="../images/fav.png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->

  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

  <script type="text/javascript">
    function Activate(fullname) {
      if (confirm("ARE YOU SURE YOU WISH TO ACTIVATE " + " " + fullname + "FROM THE SYSTEM ?")) {
        return true;
      }
      else {
        return false;
      }

    }

  </script>

  <script type="text/javascript">
    function Deactivate(fullname) {
      if (confirm("ARE YOU SURE YOU WISH TO DEACTIVATE " + " " + fullname + "FROM THE SYSTEM  ?")) {
        return true;
      }
      else {
        return false;
      }

    }

  </script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Home</a>
        </li>

      </ul>

      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">


      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="../images/south-east-asian-institute-of-technology-logo-removebg-preview.png" alt=" Logo" width="230"
          height="99" class="" style="opacity: .8; background-color: #fff">
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../<?php echo $row['photo']; ?>" alt="User Image" width="220" height="192"
              class="img-circle elevation-2">
          </div>
          <div class="info">
            <a href="#" class="d-block">
              <?php echo $row['fullname']; ?>
            </a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <?php
            include('sidebar.php');

            ?>


          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">&nbsp;</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Admin Record</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <p>&nbsp;</p>
            <table width="1049" border="0" align="center">
              <tr>
                <td width="1043" height="214">
                  <div class="card">
                    <div class="card-header">
                      <h4>Admin Record </h4>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table width="106%" align="center" class="table table-bordered table-striped" id="example1">
                        <thead>
                          <tr>
                            <th width="3%">
                              <div align="center">#</div>
                            </th>
                            <th width="13%">
                              <div align="center">Username</div>
                            </th>
                            <th width="8%">
                              <div align="center">Photo</div>
                            </th>
                            <th width="7%">
                              <div align="center">Password</div>
                            </th>
                            <th width="6%">
                              <div align="center">Designation</div>
                            </th>
                            <th width="6%">
                              <div align="center">fullname</div>
                            </th>
                            <th width="8%">
                              <div align="center">Email</div>
                            </th>
                            <th width="8%">
                              <div align="center">Status</div>
                            </th>
                            <th width="16%">
                              <div align="center">Action</div>
                            </th>

                          </tr>
                        </thead>
                        <div align="center"></div>

                        <tbody>
                          <?php
                          $sql = "SELECT * FROM admin order by username ASC";
                          $result = $conn->query($sql);
                          $cnt = 1;
                          while ($row = $result->fetch_assoc()) { ?>
                            <tr class="gradeX">
                              <td height="47">
                                <div align="center">
                                  <?php echo $cnt; ?>
                                </div>
                              </td>
                              <td>
                                <div align="center">
                                  <?php echo $row['username']; ?>
                                </div>
                              </td>
                              <td>
                                <div align="center"><span class="controls"><img src="../<?php echo $row['photo']; ?>"
                                      width="50" height="43" border="2" /></span></div>
                              </td>
                              <td>
                                <div align="center">
                                  <?php echo $row['password']; ?>
                                </div>
                              </td>
                              <td>
                                <div align="center">
                                  <?php echo $row['designation']; ?>
                                </div>
                              </td>
                              <td>
                                <div align="center">
                                  <?php echo $row['fullname']; ?>
                                </div>
                              </td>
                              <td>
                                <div align="center">
                                  <?php echo $row['email']; ?>
                                </div>
                              </td>
                              <td>
                                <div align="center">
                                  <?php echo $row['status']; ?>
                                </div>
                              </td>
                              <td>
                                <div class="btn-group">
                                  <button type="button" class="btn btn-danger btn-flat">Action</button>
                                  <button type="button" class="btn btn-danger btn-flat dropdown-toggle dropdown-icon"
                                    data-toggle="dropdown">
                                    <span class="sr-only">Toggle Dropdown</span>
                                  </button>
                                  <div class="dropdown-menu" role="menu">
                                    <?php if (($row['status']) == (('Active'))) { ?>
                                      <a class="dropdown-item" href="block-unblock-admin.php?id=<?php echo $row['ID']; ?>"
                                        onClick="return Deactivate('<?php echo $row['fullname']; ?> ');">Deactivate</a>
                                    <?php } else { ?>
                                      <a class="dropdown-item" href="block-unblock-admin.php?uid=<?php echo $row['ID']; ?>"
                                        onClick="return Activate('<?php echo $row['fullname']; ?> ');">Activate</a>
                                    <?php } ?>
                                    <a class="dropdown-item" href="edit-admin.php?id=<?php echo $row['ID']; ?>">Edit</a>
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <?php $cnt = $cnt + 1;
                          } ?>
                        </tbody>
                        <tfoot>
                        </tfoot>
                      </table>

                    </div>
                    <!-- /.card-body -->
                  </div>
                  <table width="392" border="0" align="right">
                    <tr>
                      <td width="386"></td>
                    </tr>
                  </table>
                  <p>&nbsp;</p>
                </td>
              </tr>

            </table>
            <p>
              <!-- /.card -->
            </p>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid --><!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">

    </div>
    <?php include('footer.php'); ?>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- Page specific script -->
  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
</body>

</html>