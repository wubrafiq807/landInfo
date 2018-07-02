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
                <li class="breadcrumb-item active">Add Land Info</li>
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
                        <h4>Add New Land Info</h4>

                    </div>
                    <div class="card-body">
                        <div class="input-states">
                            <form class="form-horizontal" name="reg" method="POST" action="<?php echo base_url("admin/saveLandInfo") ?>">
                                <div class="form-group has-success">
                                    <div class="row">
                                        <label class="col-sm-3 control-label">Land Info Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="name" name="name" class="form-control" value="<?php if (isset($landInfo['name'])) echo $landInfo['name']; ?>" >

                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-3 control-label">Land Info Amount</label>
                                        <div class="col-sm-9">
                                            <input type="number" id="amount" name="amount" class="form-control" value="<?php if (isset($landInfo['amount'])) echo $landInfo['amount']; ?>" >

                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 control-label">Choose Union</label>
                                        <div class="col-sm-9">
                                            <select name="union_id" id="union_id" class="form-control">
                                                <option value="">Select</option>
                                                <?php foreach ($unionList as $union) { ?>
                                                    <option <?php if (isset($landInfo['union_id']) && $landInfo['union_id'] == $union['id']) echo 'selected="selected"'; ?> value="<?php echo $union['id'] ?>"><?php echo $union['name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-3 control-label">Choose Mouza</label>
                                        <div class="col-sm-9">
                                            <select name="mouza_id" id="mouza_id" class="form-control">
                                                <option value="">Select</option>

                                                <?php if ($edit) {
                                                    foreach ($mouzaList as $mouza) { ?>
                                                        <option <?php if (isset($landInfo['mouza_id']) && $landInfo['mouza_id'] == $mouza['id']) echo 'selected="selected"'; ?> value="<?php echo $mouza['id'] ?>"><?php echo $mouza['name'] ?></option>
    <?php }
} ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-3 control-label">Choose Razassa</label>
                                        <div class="col-sm-9">
                                            <select name="razassa_id" id="razassa_id" class="form-control">
                                                <option value="">Select</option>

                                                <?php foreach ($razassaList as $razasa) { ?>
                                                    <option <?php if (isset($landInfo['razassa_id']) && $landInfo['razassa_id'] == $razasa['id']) echo 'selected="selected"'; ?> value="<?php echo $razasa['id'] ?>"><?php echo $razasa['name'] ?></option>
<?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-3 control-label">Choose Holing</label>
                                        <div class="col-sm-9">
                                            <select name="holding_id" id="holding_id" class="form-control">
                                                <option value="">Select</option>

                                                <?php if ($edit) {
                                                    foreach ($holdingList as $holding) { ?>
                                                        <option <?php if (isset($landInfo['holding_id']) && $landInfo['holding_id'] == $holding['id']) echo 'selected="selected"'; ?> value="<?php echo $holding['id'] ?>"><?php echo $holding['holding_no'] ?></option>
    <?php }
} ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>



                                <div class="form-group has-warning">
                                    <div class="row">
                                        <label class="col-sm-3 control-label"></label>
                                        <div class="col-sm-9">
                                            <?php if (isset($edit) && $edit) { ?>
                                                <input type="hidden" name="id" value="<?php echo $landInfo['id'] ?>">
                                                <button type="submit"  class="btn btn-info req-save-update-btn">Update</button>
<?php } else { ?>
                                                <button type="submit" class="btn btn-info req-save-update-btn">Save</button>
<?php } ?>
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
                amount: "required",
                union_id: "required",
                mouza_id: "required",
                razassa_id: "required",
                holding_id: "required",

            },

            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function (form) {
                form.submit();
            }
        });
    });
    $('#union_id').on('change', function () {
        
        jQuery
                .ajax({
                    type: "POST",
                    url: "<?php echo base_url("admin/getMouzaListByUnion") ?>",
                    dataType: 'json',
                    data: {
                        union_id: $('#union_id').val(),
                       
                    },
                    success: function (res) {

                        $('#mouza_id').empty();
                        var html='<option value="">Select</option>';
                        for(var i=0;i<res.mouzaList.length;i++){
                            html+='<option value="'+res.mouzaList[i].id+'">'+res.mouzaList[i].name+'</option>';
                        }
                        $('#mouza_id').append(html);
                    }
                });
    });
     $('#mouza_id').on('change', function () {
        
        jQuery
                .ajax({
                    type: "POST",
                    url: "<?php echo base_url("admin/getHoldingListByMouza") ?>",
                    dataType: 'json',
                    data: {
                        mouza_id: $('#mouza_id').val(),
                       
                    },
                    success: function (res) {

                        $('#holding_id').empty();
                        var html='<option value="">Select</option>';
                        for(var i=0;i<res.holdingList.length;i++){
                            html+='<option value="'+res.holdingList[i].id+'">'+res.holdingList[i].holding_no+'</option>';
                        }
                        $('#holding_id').append(html);
                    }
                });
    });
    
</script>
