<!DOCTYPE html>
<html lang="en">
    <?php include('include/head.php'); ?>

    <?php
        $nav = [
            'Dashboard' => 'home.php',
            'Report' => '#',
            'Expenses' => '#',
            'Create' => '#'
        ];

        if(isset($_GET['id'])){

            $id =$_GET['id'];
            $edit_state = true;
            $rec =mysqli_query($db, "SELECT * FROM expenses WHERE id=$id");

            $record =mysqli_fetch_array($rec);

            $date =$record['date'];
            $purpose =$record['purpose'];
            $details =$record['details'];
            $total =$record['total'];

            if(isset($_POST['update'])){

                $date = mysqli_real_escape_string($db, $_POST['date']);
                $purpose = mysqli_real_escape_string($db, $_POST['purpose']);
                $details = mysqli_real_escape_string($db, $_POST['details']);
                $total = mysqli_real_escape_string($db, $_POST['total']);



                if (empty($date)) { array_push($errors, "Date is required"); }
                if (empty($purpose)) { array_push($errors, "Purpose is required"); }
                if (empty($details)) { array_push($errors, "Details is required"); }
                if (empty($total)) { array_push($errors, "Total Amount is required"); }

                // update 400pt if there are no errors in the form
                if (count($errors) == 0) {
                    $query="UPDATE expenses SET date='$date', purpose='$purpose',details='$details',total='$total' WHERE expenses.id=$id";
                    mysqli_query($db ,$query);
                    if($_SESSION['success'] = "RECORD UPDATED!!"){
                        header('location: report-expenses-update.php');
                        exit();

                    }else {
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
                                                        <input type="date" name="date" class="form-control" id="date" value="<?php echo $date ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label for="purpose" class="col-3 col-form-label">Purpose</label>
                                                    <div class="col-9">
                                                        <input type="text" name="purpose" class="form-control" id="purpose" value="<?php echo $purpose ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label for="details" class="col-3 col-form-label">Details</label>
                                                    <div class="col-9">
                                                        <input type="text" name="details" class="form-control" id="details" value="<?php echo $details ?>">
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
                                                        <button type="submit" class="btn btn-info" name="update">Update</button>
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
