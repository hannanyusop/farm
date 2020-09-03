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

    if(isset($_GET['id'])){

        $id = $_GET['id'];
        $edit_state = true;
        $rec =mysqli_query($db, "SELECT * FROM collectmilk WHERE id=$id");
        $record =mysqli_fetch_array($rec);
        $id =$record['id'];
        $date =$record['date'];
        $stallno =$record['stallno'];
        $animalid =$record['animalid'];
        $litre =$record['litre'];
        $collectedby =$record['collectedby'];


        if(isset($_POST['update'])){

            $date = mysqli_real_escape_string($db, $_POST['date']);
            $stallno= mysqli_real_escape_string($db, $_POST['stallno']);
            $animalid = mysqli_real_escape_string($db, $_POST['animalid']);
            $litre = mysqli_real_escape_string($db, $_POST['litre']);
            $collectedby = mysqli_real_escape_string($db, $_POST['collectedby']);



            if (empty($date)) { array_push($errors, "Date is required"); }
            if (empty($stallno)) { array_push($errors, "Stall No is required"); }
            if (empty($animalid)) { array_push($errors, "Animal ID is required"); }
            if (empty($litre)) { array_push($errors, "Litre is required"); }
            if (empty($collectedby)) { array_push($errors, "Collected By is required"); }

            // update 400pt if there are no errors in the form
            if (count($errors) == 0) {
                $query="UPDATE collectmilk SET date='$date', stallno='$stallno',animalid='$animalid',litre='$litre',collectedby='$collectedby' WHERE collectmilk.id=$id";
                mysqli_query($db ,$query);
                if($_SESSION['success'] = "RECORD UPDATED!!"){
                    header('location: milk-collection-view-new.php');
                }else {
                    array_push($errors, "Please Try Again");
                }
            }
        }

    }else{
        header('location: milk-collection-view-new.php');
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
