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
            'User' => '#',
            'Create' => '#'
        ];
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
                            <div class="col-lg-6 offset-lg-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <form method="post" class="form-horizontal">
                                                <div class="form-group row mb-3">
                                                    <label for="username" class="col-3 col-form-label">Username</label>
                                                    <div class="col-9">
                                                        <input type="text" name="username" class="form-control" id="username" value="<?php echo $username ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label for="fullname" class="col-3 col-form-label">Full Name</label>
                                                    <div class="col-9">
                                                        <input type="text" name="fullname" class="form-control" id="fullname" value="<?php echo $fullname ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label for="usertype" class="col-3 col-form-label">usertype</label>
                                                    <div class="col-9">
                                                        <select name="usertype" id="usertype" class="form-control">
                                                            <option value=""></option>
                                                            <option value="admin" <?= ($usertype == "admin")? "selected": "" ?>>Admin</option>
                                                            <option value="user" <?= ($usertype == "user")? "selected": "" ?>>User</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label for="email" class="col-3 col-form-label">Email</label>
                                                    <div class="col-9">
                                                        <input type="email" name="email" class="form-control" id="email" value="<?php echo $email ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label for="phoneno" class="col-3 col-form-label">Phone Number</label>
                                                    <div class="col-9">
                                                        <input type="text" name="phoneno" class="form-control" id="phoneno" value="<?php echo $phoneno ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label for="icnum" class="col-3 col-form-label">IC NUMBER</label>
                                                    <div class="col-9">
                                                        <input type="text" name="icnum" class="form-control" id="icnum" value="<?php echo $icnum ?>">
                                                    </div>
                                                </div><div class="form-group row mb-3">
                                                    <label for="address" class="col-3 col-form-label">Address</label>
                                                    <div class="col-9">
                                                        <textarea class="form-control" name="address" id="address" rows="5"><?php echo $address; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label for="salary" class="col-3 col-form-label">Salary</label>
                                                    <div class="col-9">
                                                        <input type="text" name="salary" class="form-control" id="salary" value="<?php echo $salary ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label for="joiningdate" class="col-3 col-form-label">Joining Date</label>
                                                    <div class="col-9">
                                                        <input type="date" name="joiningdate" class="form-control" id="joiningdate" value="<?php echo $joiningdate ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label for="password" class="col-3 col-form-label">Password</label>
                                                    <div class="col-9">
                                                        <input type="password" name="password_1" class="form-control" id="password">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label for="password_2" class="col-3 col-form-label">Confirm Password</label>
                                                    <div class="col-9">
                                                        <input type="text" name="password_2" class="form-control" id="password_2" >
                                                    </div>
                                                </div>

                                                <div class="form-group mb-0 justify-content-end row">
                                                    <div class="col-9">
                                                        <button type="submit" class="btn btn-info" name="register_btn"> Add New user</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> <!-- end tab-content-->

                                    </div>  <!-- end card-body -->
                                </div>  <!-- end card -->
                            </div>
                        </div>
                    </div>
                </div>
                <?php include('include/footer.php') ?>
            </div>
        </div>
    </body>
</html>
