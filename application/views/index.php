<!DOCTYPE html>
<html>
    <head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css') ?>" >

        <!-- Optional theme -->
        <link rel="stylesheet" href="<?php echo base_url('css/bootstrap-theme.min.css') ?>" >

        <!-- Latest compiled and minified JavaScript -->
        <script src="<?php echo base_url('js/bootstrap.min.js') ?>" ></script>

    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url() ?>">Home</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">

                    </ul>
                    <form class="navbar-form navbar-left" action="<?php echo base_url() ?>" method="post">
                        <div class="form-group">
                            <input type="text" name="holding_no" class="form-control" placeholder="Search By Holding Number">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                    <ul class="nav navbar-nav navbar-right">



                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="container">
            <?php if (isset($landInfoList) && !empty($landInfoList)) { ?>
                <div class="row">
                    <?php foreach ($landInfoList as $info) { ?>
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">

                                <div class="caption">
                                    <h3>Name:<?php echo $info['name'] ?></h3>
                                    <p>Amount:<?php echo $info['amount'] ?></p>
                                    <small>Holding No:<?php echo $info['holding'] ?></small>
                                    <p><a href="<?php echo base_url('viewInfo') ?>?id=<?php echo $info['id'] ?>" class="btn btn-primary" role="button">View Details</a> </p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>


                </div>
            <?php } else { ?>
                <div class="alert alert-warning">
                    <strong>Warning!</strong> No Record Found.
                </div>
            <?php } ?>

        </div>

    </body>
</html>

