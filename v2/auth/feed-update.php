<!DOCTYPE html>
<html lang="en">
    <?php include('include/head.php'); ?>

    <?php
        $nav = [
            'Dashboard' => 'home.php',
            'Cow Feed' => '#',
            $_GET['id'] => '#',
            'Edit' => '#'
        ];

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $edit_state = true;
            $rec =mysqli_query($db, "SELECT * FROM cowfeed WHERE id=$id");
            $record =mysqli_fetch_array($rec);
            $id =$record['id'];
            $date =$record['date'];
            $stallno =$record['stallno'];
            $animalid =$record['animalid'];
            $notes =$record['notes'];

            if(isset($_POST['update'])) {

                $date = mysqli_real_escape_string($db, $_POST['date']);
                $stallno = mysqli_real_escape_string($db, $_POST['stallno']);
                $animalid = mysqli_real_escape_string($db, $_POST['animalid']);
                $notes = mysqli_real_escape_string($db, $_POST['notes']);


                if (empty($date)) {
                    array_push($errors, "Date is required");
                }
                if (empty($stallno)) {
                    array_push($errors, "Stall No is required");
                }
                if (empty($animalid)) {
                    array_push($errors, "Animal ID is required");
                }
                if (empty($notes)) {
                    array_push($errors, "Notes / Reminder is required");
                }

                // update 400pt if there are no errors in the form
                if (count($errors) == 0) {
                    $query = "UPDATE cowfeed SET date='$date', stallno='$stallno',animalid='$animalid',notes='$notes' WHERE cowfeed.id=$id";
                    mysqli_query($db, $query);
                    if ($_SESSION['success'] = "RECORD UPDATED!!") {
                        header('location: feed-view.php');
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
