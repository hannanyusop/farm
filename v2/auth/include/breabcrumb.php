<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">

                    <?php if(isset($nav)){ ?>
                        <?php foreach ($nav as $name => $url){ ?>
                            <?php if($url != "#" && $url != ""){ ?>
                                <li class="breadcrumb-item"><a href="<?= $url ?>"><?= $name ?></a></li>
                            <?php }else{ ?>
                                <li class="breadcrumb-item active"><?= $name; ?></li>
                            <?php } ?>
                        <?php $current = $name; } ?>
                    <?php } ?>
                </ol>
            </div>
            <h4 class="page-title"><?= (isset($current))? $current : "" ?></h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?php

                if (isset($_SESSION['success']) ){

                    echo '<div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show">';
                    echo $_SESSION['success'] .'<br>';
                    echo '</div>';
                    unset($_SESSION['success']);
                }
        ?>

        <?php echo display_error(); ?>
    </div>
</div>
