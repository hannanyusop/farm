<!DOCTYPE html>
<html lang="en">
    <?php include('include/head.php'); ?>

    <?php
        $nav = [
            'Dashboard' => 'home.php',
            'Milk Production' => '#',
            'Sales' => '#'
        ];

        $query = "SELECT * FROM milksales";
        $results = mysqli_query($db, $query);

        if(isset($_GET['delete'])) {

            $id = $_GET['delete'];

            $query = "DELETE FROM milksales WHERE id='$id'";
            mysqli_query($db, $query);
            if ($_SESSION['success'] = "RECORD DELETED!!") {
                header('location: milk-sales-view.php');
            } else {
                array_push($errors, "Please Try Again");
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
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <tr class="bg-info text-white text-center">
                                                    <th>Id</th>
                                                    <th>Date</th>
                                                    <th>Account No</th>
                                                    <th>Name</th>
                                                    <th>Contact</th>
                                                    <th>Email</th>
                                                    <th>Litre</th>
                                                    <th>Price</th>
                                                    <th>Payment Status</th>
                                                    <th>Operation</th>
                                                </tr>
                                                <?php
                                                while($rows=mysqli_fetch_assoc($results))
                                                {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $rows['id'];?></td>
                                                        <td><?php echo $rows['date'];?></td>
                                                        <td><?php echo $rows['accno'];?></td>
                                                        <td><?php echo $rows['name'];?></td>
                                                        <td><?php echo $rows['contact'];?></td>
                                                        <td><?php echo $rows['email'];?></td>
                                                        <td><?php echo $rows['litre'];?></td>
                                                        <td><?php echo $rows['price'];?></td>
                                                        <td><?php echo $rows['paymentstatus'];?></td>
                                                        <td>
                                                            <a class="btn btn-outline-info btn-sm" href='milk-sales-update.php?id=<?php echo $rows['id']; ?>'>Update</a>
                                                            <a class="btn btn-danger btn-sm" href='milk-sales-view.php?delete=<?php echo $rows['id']; ?>' onclick="return confirm('Are you sure?')">Delete</a>
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
