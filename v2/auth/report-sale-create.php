<!DOCTYPE html>
<html lang="en">
    <?php include('include/head.php'); ?>

    <?php
        $nav = [
            'Dashboard' => 'home.php',
            'Report' => '#',
            'Sales' => '#',
            'Create' => '#'
        ];

    // variable declaration
    $month = "";
    $amount = "";
    $total= "";
    $errors = array();

    // REGISTER USER
    if (isset($_POST['reg_add'])) {
        // receive all input values from the form
        $month= mysqli_real_escape_string($db, $_POST['month']);
        $amount = mysqli_real_escape_string($db, $_POST['amount']);
        $total = mysqli_real_escape_string($db, $_POST['total']);

        // form validation: ensure that the form is correctly filled
        if (empty($month)) { array_push($errors, "Month is required"); }
        if (empty($amount)) { array_push($errors, "Amount (Litre) is required"); }
        if (empty($total)) { array_push($errors, "Total Amount is required"); }

        // register user if there are no errors in the form
        if (count($errors) == 0) {
            $query = "INSERT INTO milkreport (month, amount, total) 
  			  VALUES( '$month', '$amount', '$total')";

            if(mysqli_query($db, $query)){
                $_SESSION['success'] = "ADDED!!";
                header('location: report-sale.php');
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
                                                    <label for="date" class="col-3 col-form-label">Month</label>
                                                    <div class="col-9">
                                                        <input type="month" name="month" class="form-control" id="date" value="<?php echo $date ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label for="amount" class="col-3 col-form-label">Amount(Litre)</label>
                                                    <div class="col-9">
                                                        <input type="number" step=".01" name="amount" class="form-control" id="amount" value="<?php echo $amount ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label for="total" class="col-3 col-form-label">Total(RM)</label>
                                                    <div class="col-9">
                                                        <input type="number" step=".01" name="total" class="form-control" id="total" value="<?php echo $total ?>">
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
