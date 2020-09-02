<!DOCTYPE html>
<html lang="en">
    <?php include('include/head.php'); ?>

    <?php
        $nav = [
            'Dashboard' => 'home.php',
            'Report' => '#',
            'Sales' => '#'
        ];

    $query = "SELECT * FROM milkreport";
    $tables = mysqli_query($db, $query);

    $query = "SELECT * FROM milkreport";
    $results = mysqli_query($db, $query);

    $chart_data = '';
    while($rows = mysqli_fetch_array($results))
    {
        $chart_data .= "{ month:'".$rows["month"]."', amount:".$rows["amount"].", total:".$rows["total"]."}, ";
    }
    $chart_data = substr($chart_data, 0, -2);

    ?>

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>


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
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-2 clearfix">
                                            <a class="btn btn-success float-right mb-2" href="report-sale-create.php"><i class="fa fa-plus"></i> Add Sales Report</a>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <th>Id</th>
                                                <th>Month</th>
                                                <th>Amount (Litres)</th>
                                                <th>Total Amount (RM)</th>
                                                <th colspan="2">Operation</th>
                                                </tr>
                                                <?php
                                                while($rows=mysqli_fetch_assoc($tables))
                                                {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $rows['id'];?></td>
                                                        <td><?php echo $rows['month'];?></td>
                                                        <td><?php echo $rows['amount'];?></td>
                                                        <td><?php echo $rows['total'];?></td>
                                                        <td><a href='updatemilkreport.php?id=<?php echo $rows['id']; ?>& month=<?php echo $rows['month'];?>& amount=<?php echo $rows['amount'];?>& total=<?php echo $rows['total'];?>'>Update</a></td>
                                                        <td><a href='deletemilkreport.php?id=<?php echo $rows['id']; ?>& month=<?php echo $rows['month'];?>& amount=<?php echo $rows['amount'];?>& total=<?php echo $rows['total'];?>'>Delete</a></td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div id="chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include('include/footer.php') ?>
            </div>
        </div>
    </body>
</html>
<script>
    Morris.Area({
        element : 'chart',
        data:[<?php echo $chart_data; ?>],
        xkey:'month',
        ykeys:['amount','total'],
        labels:['Amount', 'Total Amount'],
        hideHover:'auto',
        stacked:true
    });
</script>
