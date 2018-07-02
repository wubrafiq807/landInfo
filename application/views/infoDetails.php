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
            <form>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control"  value="<?php echo $info['name'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="amount">Amount:</label>
                    <input type="number" class="form-control" value="<?php echo $info['amount'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Union:</label>
                    <input type="text" class="form-control"  value="<?php echo $info['union'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Mouza:</label>
                    <input type="text" class="form-control"  value="<?php echo $info['mouza']?>" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Razassa:</label>
                    <input type="text" class="form-control"  value="<?php echo $info['razassa']?>" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Holding Number:</label>
                    <input type="text" class="form-control"  value="<?php echo $info['holding']?>" readonly>
                </div>
                <a href="<?php echo base_url() ?>" class=" form-control btn btn-info">Back</a>

            </form>

        </div>

    </body>
</html>

