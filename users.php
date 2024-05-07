<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Users</title>
    <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assests/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="assests/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assests/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="assests/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assests/dist/css/adminlte.min.css">
<body class="hold-transition sidebar-mini">
    <?php
    include_once 'include/header.php';
    include_once 'include/navbar.php';
    include_once 'include/sidebar.php';
    ?>

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
            <button class="btn btn-primary" data-toggle="modal" data-target="#users">Add User</button>
            <!-- Modal -->
<div class="modal fade" id="users" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <form action="config/datainsert.php" method="post">
            <label for="fname">First Name:</label>
            <input type="text" class="form-control" name="fname" placeholder="First Name" required><br>
            <label for="lname">Last Name:</label>
            <input type="text" class="form-control" name="lname" placeholder="Last Name" required><br>
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" placeholder="Email Address" required><br>
            <label for="phone">Phone Number:</label>
            <input type="number" class="form-control" name="phone" placeholder="Phone Number" required><br>
            <label for="pass">Password:</label>
            <input type="password" class="form-control" name="pass" placeholder="Password" required><br>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="adduser">Add User</button>
          </form>
      </div>
    </div>
  </div>
</div>
        <!-- /Modal -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with minimal features & hover style</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>User ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email Address</th>
                    <th>Phone Number</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    include_once 'config/db_con.php';
                    $sql = "SELECT * FROM users";
                    $result = mysqli_query($con, $sql);

                    if (mysqli_num_rows($result) > 0) {
                      $Num = 0;
                      foreach ($result as $row) {
                        $Num++;
                    ?>
                  <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['fname']; ?></td>
                    <td><?php echo $row['lname']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td>
                      <button type="submit" class="btn btn-sm btn-info"data-toggle="modal" data-target="#edit<?php echo $Num; ?>" name="edit" value="<?php echo $row['id'] ?>">Edit</button>
                      <button type="submit" class="btn btn-sm btn-danger" name="delete">Delete</button>
            <!-- Modal -->
            <div class="modal fade" id="edit<?php echo $Num; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <form action="config/datainsert.php" method="post">
                        <label for="fname">First Name:</label>
                        <input type="text" class="form-control" name="fname" value="<?php echo $row['fname']; ?>" required><br>
                        <label for="lname">Last Name:</label>
                        <input type="text" class="form-control" name="lname" value="<?php echo $row['lname']; ?>" required><br>
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>" required><br>
                        <label for="phone">Phone Number:</label>
                        <input type="number" class="form-control" name="phone" value="<?php echo $row['phone']; ?>" required><br>
                        <label for="pass">Password:</label>
                        <input type="password" class="form-control" name="pass" value="<?php echo $row['pass']; ?>" required><br>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="edituser">Edit User</button>
                      </form>
                  </div>
                </div>
              </div>
            </div>
        <!-- /Modal -->
                    </td>
                  </tr>
                  <?php
                      }
                    }
                    ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>User ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email Address</th>
                    <th>Phone Number</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card --> 
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <!-- jQuery -->
<script src="assests/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assests/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="assests/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assests/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assests/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assests/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assests/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assests/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="assests/plugins/jszip/jszip.min.js"></script>
<script src="assests/plugins/pdfmake/pdfmake.min.js"></script>
<script src="assests/plugins/pdfmake/vfs_fonts.js"></script>
<script src="assests/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="assests/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="assests/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="assests/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assests/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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

    <?php
    include_once 'include/footer.php';
    ?>
</body>
</html>