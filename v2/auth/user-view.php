<!DOCTYPE html>
<html lang="en">
    <?php include('include/head.php'); ?>

    <?php

        if($_SESSION['user']['usertype'] != 'admin'){
            array_push($errors, "Not Authorized");
            header('location: home.php');
        }

        $nav = [
            'Dashboard' => 'home.php',
            'Vaccine' => '#',
            'Search' => '#',
        ];

    $search_result ="";
    if(isset($_GET['search']))
    {
        $date=$_GET['date'];
        $query="SELECT * FROM `multi_user` WHERE CONCAT(`username`, `fullname`, `email`, `phoneno`, `icnum`)LIKE '%".$date."%'";
        $results = mysqli_query($db, $query);
    }
    else{
        $query = "SELECT * FROM multi_user";
        $results = mysqli_query($db, $query);
    }

    if(isset($_GET['delete'])){

        $id = $_GET['id'];
        $query = "DELETE FROM multi_user WHERE id='$id'";
        mysqli_query($db , $query);
        if($_SESSION['success'] = "RECORD DELETED!!"){
            header('location: user-view.php');
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
                                        <form>
                                            <div class="form-row align-items-center">
                                                <div class="col-6">
                                                    <label class="sr-only" for="date">Keyword</label>
                                                    <input type="text" name="date" class="form-control mb-2" id="date" value="<?= (isset($_GET['date']))? $_GET['date'] : '' ?>" placeholder="Keyword">
                                                </div>
                                                <div class="col-auto">
                                                    <button type="submit" class="btn btn-primary mb-2" name="search">Search</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div> <!-- end card-body -->
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <tr class="bg-info text-white text-center">
                                                    <th>Id</th>
                                                    <th>Full Name</th>
                                                    <th>User Type</th>
                                                    <th>Email</th>
                                                    <th>Phone Number</th>
                                                    <th>IC Number</th>
                                                    <th>Address</th>
                                                    <th>Salary</th>
                                                    <th>Joining Date</th>
                                                    <th>Operation</th>
                                                </tr>
                                                <?php
                                                while($rows=mysqli_fetch_assoc($results))
                                                {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $rows['id'];?></td>
                                                        <td><?php echo $rows['fullname'];?></td>
                                                        <td><?php echo $rows['usertype'];?></td>
                                                        <td><?php echo $rows['email'];?></td>
                                                        <td><?php echo $rows['phoneno'];?></td>
                                                        <td><?php echo $rows['icnum'];?></td>
                                                        <td><?php echo $rows['address'];?></td>
                                                        <td><?php echo $rows['salary'];?></td>
                                                        <td><?php echo $rows['joiningdate'];?></td>
                                                        <td><a class="btn btn-danger btn-sm" href='user-view.php?delete=<?php echo $rows['id']; ?>' onclick="return confirm('Are you sure?')">Delete</a></td>
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
