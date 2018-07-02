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
                <li class="breadcrumb-item active">Add Mouza</li>
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
                        <h4>Add New Mouza</h4>

                    </div>
                    <div class="card-body">
                        <div class="input-states">
                            <form class="form-horizontal" name="reg" method="POST" action="<?php echo base_url("admin/saveMouza") ?>">
                                <div class="form-group has-success">
                                    <div class="row">
                                        <label class="col-sm-3 control-label">Mouza name</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="name" name="name" class="form-control" value="<?php if (isset($mouza['name'])) echo $mouza['name']; ?>" >
                                           
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <label class="col-sm-3 control-label">Choose Union</label>
                                        <div class="col-sm-9">
                                            <select name="union_id" class="form-control">
                                                <option value="">Select</option>
                                                <?php foreach ($unionList as $union){?>
                                                <option <?php if(isset($mouza['union_id']) && $mouza['union_id']==$union['id']) echo 'selected="selected"';?> value="<?php echo $union['id']?>"><?php echo $union['name']?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                               

                                <div class="form-group has-warning">
                                    <div class="row">
                                        <label class="col-sm-3 control-label"></label>
                                        <div class="col-sm-9">
                                            <?php if(isset($edit)&& $edit){?>
                                            <input type="hidden" name="id" value="<?php echo $mouza['id']?>">
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
                union_id: "required",
              

            },

            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function (form) {
                form.submit();
            }
        });
    });

</script>
