<!DOCTYPE html>
<html lang="en">
    <?php include('include/head.php'); ?>

    <?php
        $nav = [
            'Dashboard' => 'home.php',
            'Report' => '#',
            'Sales' => '#',
            $_GET['id'] => '#',
            'Edit' => '#'
        ];

    if(isset($_GET['id'])){

        $id = $_GET['id'];
        $edit_state = true;
        $rec =mysqli_query($db, "SELECT * FROM milkreport WHERE id=$id");
        $record =mysqli_fetch_array($rec);
        $id =$record['id'];
        $month =$record['month'];
        $amount =$record['amount'];
        $total =$record['total'];

        if(isset($_POST['update'])){

            $month = mysqli_real_escape_string($db, $_POST['month']);
            $amount= mysqli_real_escape_string($db, $_POST['amount']);
            $total = mysqli_real_escape_string($db, $_POST['total']);

            if (empty($month)) { array_push($errors, "Month is required"); }
            if (empty($amount)) { array_push($errors, "Amount is required"); }
            if (empty($total)) { array_push($errors, "Total Amount is required"); }

            if (count($errors) == 0) {

                $query="UPDATE milkreport SET month='$month', amount='$amount',total='$total' WHERE milkreport.id=$id";

                if(mysqli_query($db ,$query)){

                    $_SESSION['success'] = "Record updated!";
                    header('location: report-sale.php');
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
                                                    <label for="month" class="col-3 col-form-label">Month</label>
                                                    <div class="col-9">
                                                        <input type="month" name="month" class="form-control" id="month" value="<?php echo $month ?>">
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
