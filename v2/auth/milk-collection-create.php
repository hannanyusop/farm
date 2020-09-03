<!DOCTYPE html>
<html lang="en">
    <?php include('include/head.php'); ?>

    <?php
        $nav = [
            'Dashboard' => 'home.php',
            'Milk Production' => '#',
            'Create' => '#'
        ];

    // variable declaration
    $date = "";
    $stallno  = "";
    $animalid = "";
    $litre = "";
    $collectedby = "";
    $errors = array();
//    $_SESSION['success'] = "";


    // call the register() function if register_btn is clicked
    if (isset($_POST['register_btn'])) {
        milkRegister();
    }

    function milkRegister()
    {
        // REGISTER USER
        if (isset($_POST['reg_add'])) {
            // receive all input values from the form
            $date = mysqli_real_escape_string($db, $_POST['date']);
            $stallno = mysqli_real_escape_string($db, $_POST['stallno']);
            $animalid = mysqli_real_escape_string($db, $_POST['animalid']);
            $litre = mysqli_real_escape_string($db, $_POST['litre']);
            $collectedby = mysqli_real_escape_string($db, $_POST['collectedby']);

            // form validation: ensure that the form is correctly filled
            if (empty($date)) {
                array_push($errors, "Date is required");
            }
            if (empty($stallno)) {
                array_push($errors, "Stall No is required");
            }
            if (empty($animalid)) {
                array_push($errors, "Animal ID is required");
            }
            if (empty($litre)) {
                array_push($errors, "Litre is required");
            }
            if (empty($collectedby)) {
                array_push($errors, "Collected By is required");
            }

            // register user if there are no errors in the form
            if (count($errors) == 0) {
                $query = "INSERT INTO collectmilk (date, stallno, animalid, litre, collectedby) 
  			  VALUES('$date', '$stallno', '$animalid', '$litre' ,'$collectedby')";
                mysqli_query($db, $query);
                if ($_SESSION['success'] = "ADDED!!") {
                    header('location: index.php');
                    exit();
                } else {
                    array_push($errors, "Please Try Again");
                }
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
                                                        <input type="date" name="date" class="form-control" id="date" placeholder="Date" value="<?= $date ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label for="stallno" class="col-3 col-form-label">Stall No</label>
                                                    <div class="col-9">
                                                        <input type="text" name="stallno" class="form-control" id="stallno" placeholder="Stall No" value="<?= $stallno ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label for="animalid" class="col-3 col-form-label">Animal ID</label>
                                                    <div class="col-9">
                                                        <input type="text" name="animalid" class="form-control" id="animalid" placeholder="Animal ID" value="<?= $animalid ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label for="litre" class="col-3 col-form-label">Litre(L)</label>
                                                    <div class="col-9">
                                                        <input type="number" name="litre" step="0.01" class="form-control" id="litre" placeholder="Litre" value="<?= $litre ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label for="collectedby" class="col-3 col-form-label">Collected By</label>
                                                    <div class="col-9">
                                                        <input type="text" name="collectedby" class="form-control" id="collectedby" placeholder="Collected By" value="<?= $collectedby ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group mb-0 justify-content-end row">
                                                    <div class="col-9">
                                                        <button type="submit" class="btn btn-info" name="reg_add">Add</button>
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
