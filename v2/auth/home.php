<!DOCTYPE html>
<html lang="en">
    <?php include('include/head.php'); ?>

    <?php
        $nav = [
            'Dashboard' => 'home.php'
        ];

        $c_month = date('m');
        $c_year = date('Y');

    $collected = mysqli_query($db, "SELECT * FROM collectmilk");
    $feed = mysqli_query($db, "SELECT * FROM cowfeed");
    $vaccine = mysqli_query($db, "SELECT * FROM vaccine");

    $currentMonth = [
        'collected' => mysqli_query($db, "SELECT * FROM collectmilk WHERE YEAR(date) = $c_year AND MONTH(date) = $c_month"),
        'feed' => mysqli_query($db, "SELECT * FROM cowfeed WHERE YEAR(date) = $c_year AND MONTH(date) = $c_month"),
        'vaccine' => mysqli_query($db, "SELECT * FROM vaccine WHERE YEAR(date) = $c_year AND MONTH(date) = $c_month")
    ];

    $milkreport = mysqli_query($db,"SELECT sum(total) as ttl FROM milkreport");
    $row = mysqli_fetch_array($milkreport);
    $total_sales = $row['ttl'];

    $expenses = mysqli_query($db,"SELECT sum(total) as ttl FROM expenses");
    $expenses_r = mysqli_fetch_array($expenses);
    $total_expenses = $expenses_r['ttl'];

    $latestMilk = mysqli_query($db, "SELECT * FROM collectmilk ORDER BY id DESC LIMIT 5");

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
                            <div class="col-12">
                                <div class="card widget-inline">
                                    <div class="card-body p-0">
                                        <div class="row no-gutters">
                                            <div class="col-sm-6 col-xl-3">
                                                <div class="card shadow-none m-0">
                                                    <div class="card-body text-center">
                                                        <i class="uil-store-alt text-muted" style="font-size: 24px;"></i>
                                                        <h3><span><?php echo $collected->num_rows; ?></span></h3>
                                                        <p class="text-muted font-15 mb-0">Total Milk Collected</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-xl-3">
                                                <div class="card shadow-none m-0 border-left">
                                                    <div class="card-body text-center">
                                                        <i class="uil-crockery text-muted" style="font-size: 24px;"></i>
                                                        <h3><?php echo $feed->num_rows; ?></h3>
                                                        <p class="text-muted font-15 mb-0">Total Cow Feed</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-xl-3">
                                                <div class="card shadow-none m-0 border-left">
                                                    <div class="card-body text-center">
                                                        <i class="uil-bill text-muted" style="font-size: 24px;"></i>
                                                        <h3>RM <?php echo $total_expenses ?></h3>
                                                        <p class="text-muted font-15 mb-0">Total Expensese</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-xl-3">
                                                <div class="card shadow-none m-0 border-left">
                                                    <div class="card-body text-center">
                                                        <i class="uil-dollar-sign text-muted" style="font-size: 24px;"></i>
                                                        <h3>RM <?php echo $total_sales ?></h3>
                                                        <p class="text-muted font-15 mb-0">Total Sales</p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div> <!-- end row -->
                                    </div>
                                </div> <!-- end card-box-->
                            </div> <!-- end col-->
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-4">Current Month Data </h4>
                                        <div class="row text-center mt-2 py-2">
                                            <div class="col-4">
                                                <h3 class="font-weight-normal">
                                                    <span><?php echo $currentMonth['collected']->num_rows ?></span>
                                                </h3>
                                                <p class="text-muted mb-0">Collected</p>
                                            </div>
                                            <div class="col-4">
                                                <h3 class="font-weight-normal">
                                                    <span><?php echo $currentMonth['feed']->num_rows ?></span>
                                                </h3>
                                                <p class="text-muted mb-0">Feed</p>
                                            </div>
                                            <div class="col-4">
                                                <h3 class="font-weight-normal">
                                                    <span><?php echo $currentMonth['vaccine']->num_rows ?></span>
                                                </h3>
                                                <p class="text-muted mb-0"> Vaccinated</p>
                                            </div>
                                        </div>
                                        <!-- end row-->

                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->

                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-3">New Milk Collection List</h4>

                                        <div class="table-responsive">
                                            <table class="table table-centered table-nowrap table-hover mb-0">
                                                <tbody>
                                                <?php while($rows=mysqli_fetch_assoc($latestMilk)) { ?>
                                                <tr>
                                                    <td>
                                                        <h5 class="font-14 my-1"><a href="javascript:void(0);" class="text-body"><?php echo $rows['date'] ?></a></h5>
                                                        <span class="text-muted font-13"><?php echo $rows['animalid'] ?></span>
                                                    </td>
                                                    <td>
                                                        <span class="text-muted font-13">Amount</span> <br>
                                                        <span class="badge badge-success"><?php echo $rows['litre'] ?> Litre</span>
                                                    </td>
                                                    <td>
                                                        <span class="text-muted font-13">Collected By</span>
                                                        <h5 class="font-14 mt-1 font-weight-normal"><?php echo $rows['collectedby'] ?></h5>
                                                    </td>
                                                    <td>
                                                        <span class="text-muted font-13">Stall Number</span>
                                                        <h5 class="font-14 mt-1 font-weight-normal"><?php echo $rows['stallno'] ?></h5>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                        </div> <!-- end table-responsive-->

                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>

                    </div>
                </div>
                <?php include('include/footer.php') ?>
            </div>
        </div>
    </body>
</html>
