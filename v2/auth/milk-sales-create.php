<!DOCTYPE html>
<html lang="en">
    <?php include('include/head.php'); ?>

    <?php
        $nav = [
            'Dashboard' => 'home.php',
            'Milk Production' => '#',
            'Sales' => 'milk-sales-view.php',
            'Create' => '#'
        ];

    // variable declaration
    $date = "";
    $accno  = "";
    $name = "";
    $contact = "";
    $email = "";
    $litre = "";
    $price = "";
    $paymentstatus = "";
    $errors = array();

    // call the register() function if register_btn is clicked
    if (isset($_POST['register_btn'])) {
        register();
    }


    // REGISTER USER
    if (isset($_POST['reg_add'])) {
        // receive all input values from the form
        $date = mysqli_real_escape_string($db, $_POST['date']);
        $accno= mysqli_real_escape_string($db, $_POST['accno']);
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $contact = mysqli_real_escape_string($db, $_POST['contact']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $litre = mysqli_real_escape_string($db, $_POST['litre']);
        $price = mysqli_real_escape_string($db, $_POST['price']);
        $paymentstatus = mysqli_real_escape_string($db, $_POST['paymentstatus']);

        // form validation: ensure that the form is correctly filled
        if (empty($date)) { array_push($errors, "Date is required"); }
        if (empty($accno)) { array_push($errors, "Account No is required"); }
        if (empty($name)) { array_push($errors, "Name is required"); }
        if (empty($contact)) { array_push($errors, "Contact is required"); }
        if (empty($email)) { array_push($errors, "Email  is required"); }
        if (empty($litre)) { array_push($errors, "Litre is required"); }
        if (empty($price)) { array_push($errors, "Price  is required"); }
        if (empty($paymentstatus)) { array_push($errors, "Payment Status is required"); }

        // register user if there are no errors in the form
        if (count($errors) == 0) {
            $query = "INSERT INTO milksales (date, accno, name, contact, email, litre, price, paymentstatus) 
  			  VALUES('$date', '$accno', '$name', '$contact', '$email', '$litre' ,'$price' ,'$paymentstatus')";
            mysqli_query($db, $query);
            if($_SESSION['success'] = "ADDED!!"){
                header('location: index.php');
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
                                                        <input type="date" name="date" class="form-control" id="date" placeholder="Date" value="<?php echo $date; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label for="accno" class="col-3 col-form-label">Account Number</label>
                                                    <div class="col-9">
                                                        <input type="text" name="accno" class="form-control" id="accno" placeholder="Account Number" value="<?php echo $accno; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label for="name" class="col-3 col-form-label">Name</label>
                                                    <div class="col-9">
                                                        <input type="text" name="name" class="form-control" id="name" placeholder="Account Number" value="<?php echo $name; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label for="contact" class="col-3 col-form-label">Contact</label>
                                                    <div class="col-9">
                                                        <input type="text" name="contact" class="form-control" id="contact" placeholder="Contact" value="<?php echo $contact; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label for="email" class="col-3 col-form-label">Email</label>
                                                    <div class="col-9">
                                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?php echo $email; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label for="litre" class="col-3 col-form-label">Amount Sold(Litre)</label>
                                                    <div class="col-9">
                                                        <input type="number" step="0.01" name="litre" class="form-control" id="litre" placeholder="Amount Sold in Litre" value="<?php echo $litre; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label for="price" class="col-3 col-form-label">Price(RM)</label>
                                                    <div class="col-9">
                                                        <input type="number" step="0.01" min="0.10" name="price" class="form-control" id="price" placeholder="Price" value="<?php echo $price; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label for="paymentstatus" class="col-3 col-form-label">Payment Status</label>
                                                    <div class="col-9">
                                                        <select id="paymentstatus" name="paymentstatus" class="form-control" required>
                                                            <option value=""></option>
                                                            <option value="done">Done</option>
                                                            <option value="pending">Pending</option>
                                                        </select>
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
