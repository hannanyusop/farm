<!DOCTYPE html>
<html lang="en">
    <?php include('include/head.php'); ?>

    <?php
        $nav = [
            'Dashboard' => 'home.php',
            'Vaccine' => '#',
            'Search' => '#',
        ];

    $search_result ="";
    if(isset($_GET['search']))
    {
        $date=$_GET['date'];
        $query="SELECT * FROM `vaccine` WHERE CONCAT(`id`, `date`, `stallno`, `animalid`, `vaccine`, `notes`)LIKE '%".$date."%'";
        $search_result = filterTable($query);
    }
    else{
        $query ="SELECT * FROM `vaccine`";
        $search_result = filterTable($query);
    }


    function filterTable($query)
    {
        $db = mysqli_connect('localhost', 'root', '1234', 'yoga');
        $filter_Result = mysqli_query($db, $query);
        return $filter_Result;
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
                            <div class="col-md-12">

                                <div class="card">
                                    <div class="card-body">
                                        <form>
                                            <div class="form-row align-items-center">
                                                <div class="col-6">
                                                    <label class="sr-only" for="date">Keyword</label>
                                                    <input type="text" name="date" class="form-control mb-2" id="date" value="<?= (isset($_GET['date']))? $_GET['date'] : '' ?>" placeholder="Keyword">
                                                </div>
                                                <div class="col-auto">
                                                    <button type="submit" class="btn btn-primary mb-2" name="search">Search</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div> <!-- end card-body -->
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <tr class="bg-info text-white text-center">
                                                    <th>Id</th>
                                                    <th>Date</th>
                                                    <th>Stall No</th>
                                                    <th>Animal ID</th>
                                                    <th>Vaccine / Type Of Vaccine</th>
                                                    <th>Notes / Remider</th>
                                                    <th>Operation</th>
                                                </tr>
                                                <?php while($row= mysqli_fetch_array($search_result)):?>
                                                <tr>
                                                    <td><?php echo $row['id'];?></td>
                                                    <td><?php echo $row['date'];?></td>
                                                    <td><?php echo $row['stallno'];?></td>
                                                    <td><?php echo $row['animalid'];?></td>
                                                    <td><?php echo $row['vaccine'];?></td>
                                                    <td><?php echo $row['notes'];?></td>
                                                    <td>
                                                        <a class="btn btn-outline-info btn-sm" href='vaccine-update.php?id=<?php echo $row['id']; ?>'>Update</a>
                                                        <a class="btn btn-danger btn-sm" href='vaccine-view.php?delete=<?php echo $row['id']; ?>' onclick="return confirm('Are you sure?')">Delete</a>
                                                    </td>
                                                    <?php endwhile;?>
                                            </table>
                                        </div>
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
