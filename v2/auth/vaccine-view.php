<!DOCTYPE html>
<html lang="en">
    <?php include('include/head.php'); ?>

    <?php
        $nav = [
            'Dashboard' => 'home.php',
            'Vaccine' => '#',
            'View' => '#'
        ];

    $query = "SELECT * FROM vaccine";
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
                                                    <th>Stall No</th>
                                                    <th>Animal ID</th>
                                                    <th>Vaccine / Type Of Vaccine</th>
                                                    <th>Notes / Reminder</th>
                                                    <th>Operation</th>
                                                </tr>
                                                <?php
                                                while($rows=mysqli_fetch_assoc($results))
                                                {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $rows['id'];?></td>
                                                        <td><?php echo $rows['date'];?></td>
                                                        <td><?php echo $rows['stallno'];?></td>
                                                        <td><?php echo $rows['animalid'];?></td>
                                                        <td><?php echo $rows['vaccine'];?></td>
                                                        <td><?php echo $rows['notes'];?></td>
                                                        <td>
                                                            <a class="btn btn-outline-info btn-sm" href='updatevaccine.php?id=<?php echo $rows['id']; ?>& date=<?php echo $rows['date'];?>& stallno=<?php echo $rows['stallno'];?>& animalid=<?php echo $rows['animalid'];?>& vaccine=<?php echo $rows['vaccine'];?>& notes=<?php echo $rows['notes'];?>'>Update</a>
                                                            <a class="btn btn-danger btn-sm" href='deletevaccine.php?id=<?php echo $rows['id']; ?>& date=<?php echo $rows['date'];?>& stallno=<?php echo $rows['stallno'];?>& animalid=<?php echo $rows['animalid'];?>& vaccine=<?php echo $rows['vaccine'];?>& notes=<?php echo $rows['notes'];?>'>Delete</a>
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