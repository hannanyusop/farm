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


    if(isset($_GET['delete'])){

        $id =$_GET['delete'];
        $query = "DELETE FROM VACCINE WHERE id='$id'";
        mysqli_query($db , $query);
        if($_SESSION['success'] = "RECORD DELETED!!"){
            header('location: vaccine-view.php');
        }else {
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
                                                            <a class="btn btn-outline-info btn-sm" href='vaccine-update.php?id=<?php echo $rows['id']; ?>'>Update</a>
                                                            <a class="btn btn-danger btn-sm" href='vaccine-view.php?delete=<?php echo $rows['id']; ?>' onclick="return confirm('Are you sure?')">Delete</a>
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
