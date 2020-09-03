<!DOCTYPE html>
<html lang="en">
    <?php include('include/head.php'); ?>

    <?php
        $nav = [
            'Dashboard' => 'home.php',
            'Cow Feed' => '#',
            'Create' => '#'
        ];

    $date = "";
    $stallno  = "";
    $animalid = "";
    $notes = "";
    $errors = array();

    // call the register() function if register_btn is clicked
    if (isset($_POST['register_btn'])) {
        register();
    }


    // REGISTER USER
    if (isset($_POST['reg_add'])) {
        // receive all input values from the form
        $date = mysqli_real_escape_string($db, $_POST['date']);
        $stallno= mysqli_real_escape_string($db, $_POST['stallno']);
        $animalid = mysqli_real_escape_string($db, $_POST['animalid']);
        $notes = mysqli_real_escape_string($db, $_POST['notes']);

        // form validation: ensure that the form is correctly filled
        if (empty($date)) { array_push($errors, "Date is required"); }
        if (empty($stallno)) { array_push($errors, "Stall No is required"); }
        if (empty($animalid)) { array_push($errors, "Animal ID is required"); }
        if (empty($notes)) { array_push($errors, "Notes/ Reminder is required"); }

        // register user if there are no errors in the form
        if (count($errors) == 0) {
            $query = "INSERT INTO cowfeed (date, stallno, animalid, notes) 
  			  VALUES('$date', '$stallno', '$animalid', '$notes')";
            if(mysqli_query($db, $query)){

                $_SESSION['success'] = "ADDED!!";
                header('location: feed-view.php');
                exit();
            }else {
                array_push($errors, "Please Try Again");
            }
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
                            <div class="col-lg-6 offset-lg-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <form class="form-horizontal" method="post">
                                                <div class="form-group row mb-3">
                                                    <label for="date" class="col-3 col-form-label">Date</label>
                                                    <div class="col-9">
                                                        <input name="date" type="date" class="form-control" id="date" value="<?php echo $date ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label for="stallno" class="col-3 col-form-label">Stall Number</label>
                                                    <div class="col-9">
                                                        <input name="stallno" type="text" class="form-control" id="stallno" value="<?php echo $stallno ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label for="animalid" class="col-3 col-form-label">Animal Id</label>
                                                    <div class="col-9">
                                                        <input name="animalid" type="text" class="form-control" id="animalid" value="<?php echo $animalid ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label for="notes" class="col-3 col-form-label">Notes/Remainder</label>
                                                    <div class="col-9">
                                                        <textarea name="notes" class="form-control" id="notes"><?php echo $notes ?></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group mb-0 justify-content-end row">
                                                    <div class="col-9">
                                                        <button type="submit" class="btn btn-info" name="reg_add">Create</button>
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
