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
                                                    <th colspan="2">Operation</th>
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
                                                        <td><a href='updatemilksale.php?id=<?php echo $rows['id']; ?>& date=<?php echo $rows['date'];?>& accno=<?php echo $rows['accno'];?>& name=<?php echo $rows['name'];?>& contact=<?php echo $rows['contact'];?>& email=<?php echo $rows['email'];?>& litre=<?php echo $rows['litre'];?>& price=<?php echo $rows['price'];?>& paymentstatus=<?php echo $rows['paymentstatus'];?>'>Update</a></td>
                                                        <td><a href='deletemilksales.php?id=<?php echo $rows['id']; ?>& date=<?php echo $rows['date'];?>& accno=<?php echo $rows['accno'];?>& name=<?php echo $rows['name'];?>& contact=<?php echo $rows['contact'];?>& email=<?php echo $rows['email'];?>& litre=<?php echo $rows['litre'];?>& price=<?php echo $rows['price'];?>& paymentstatus=<?php echo $rows['paymentstatus'];?>'>Delete</a></td>
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
