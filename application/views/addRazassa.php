<?php include 'header.php' ?>
<!-- End header header -->
<!-- Left Sidebar  -->
<?php include'leftSideBar.php' ?>
<!-- End Left Sidebar  -->
<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Dashboard</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin') ?>">Home</a></li>
                <li class="breadcrumb-item active">Add Razassa</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->

        <!-- /# row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title">
                        <h4>Add New Razassa</h4>

                    </div>
                    <div class="card-body">
                        <div class="input-states">
                            <form class="form-horizontal" name="reg" method="POST" action="<?php echo base_url("admin/saveRazassa") ?>">
                                <div class="form-group has-success">
                                    <div class="row">
                                        <label class="col-sm-3 control-label">Razassa name</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="name" name="name" class="form-control" value="<?php if (isset($razassa['name'])) echo $razassa['name']; ?>" >
                                            <span class="name_valid_err" style="color: red"></span> <input
                                                type="hidden" value="0" id="nameAlready">
                                            <input
                                                type="hidden" id="name_update"
                                                value="<?php if (isset($razassa['name'])) echo $razassa['name']; ?>" />
                                        </div>
                                    </div>
                                </div>
                                
                               

                                <div class="form-group has-warning">
                                    <div class="row">
                                        <label class="col-sm-3 control-label"></label>
                                        <div class="col-sm-9">
                                            <?php if(isset($edit)&& $edit){?>
                                            <input type="hidden" name="id" value="<?php echo $razassa['id']?>">
                                            <button type="submit"  class="btn btn-info req-save-update-btn">Update</button>
                                            <?php } else{?>
                                            <button type="submit" class="btn btn-info req-save-update-btn">Save</button>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /# column -->


            <!-- /# column -->
        </div>
        <!-- /# row -->


        </form>
    </div>
</div>
</div>
<!-- /# card -->
</div>
<!-- /# column -->
</div>
<!-- /# row -->

<!-- End PAge Content -->
</div>
<!-- End Container fluid  -->
<?php include'footer.php' ?>    


<script>

    $(function () {
       

        $("form[name='reg']").validate({
            // Specify validation rules
            rules: {

                name: "required",
              

            },

            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function (form) {
                form.submit();
            }
        });
    });

</script>