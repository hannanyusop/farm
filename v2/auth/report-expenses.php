<!DOCTYPE html>
<html lang="en">
    <?php include('include/head.php'); ?>

    <?php
        $nav = [
            'Dashboard' => 'home.php',
            'Report' => '#',
            'Expenses' => '#'
        ];

    $query = "SELECT * FROM expenses";
    $results = mysqli_query($db, $query);

    if(isset($_GET['delete'])) {

        $id = $_GET['delete'];

        $query = "DELETE FROM EXPENSES WHERE id='$id'";
        mysqli_query($db, $query);

        if ($_SESSION['success'] = "RECORD DELETED!!") {

            header('location: report-expenses.php');
        } else {
            array_push($errors, "Failed to delete record");
        }
    }

    ?>

    <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>

        <div id="preloader">
            <div id="status">
                <div class="bouncing-loader"><div ></div><div ></div><div ></div></div>
            </div>
        </div>

        <div class="wrapper">
            <?php include('include/sidebar.php'); ?>
            <div class="content-page">
                <div class="content">
                    <?php include('include/topbar.php'); ?>

                    <div class="container-fluid">
                        <?php include('include/breabcrumb.php') ?>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-2 clearfix">
                                            <a class="btn btn-success float-right mb-2" href="report-expenses-create.php"><i class="fa fa-plus"></i> Add Expenses</a>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <tr class="bg-info text-white text-center">
                                                    <th>Id</th>
                                                    <th>Date</th>
                                                    <th>Purpose</th>
                                                    <th>Detais</th>
                                                    <th>Total Amount</th>
                                                    <th colspan="2">Operation</th>
                                                </tr>
                                                <?php
                                                while($rows=mysqli_fetch_assoc($results))
                                                {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $rows['id'];?></td>
                                                        <td><?php echo $rows['date'];?></td>
                                                        <td><?php echo $rows['purpose'];?></td>
                                                        <td><?php echo $rows['details'];?></td>
                                                        <td><?php echo $rows['total'];?></td>
                                                        <td>
                                                            <a  class="btn btn-info btn-sm" href='report-expenses-update.php?id=<?php echo $rows['id']; ?>'>Update</a>
                                                            <a class="btn btn-danger btn-sm" href='report-expenses.php?delete=<?php echo $rows['id']; ?>' onclick="return confirm('Are you sure')">Delete</a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include('include/footer.php') ?>
            </div>
        </div>
    </body>
</html>
