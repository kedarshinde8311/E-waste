<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Review: <?= $product->name; ?></h4>
            </div>
        </div>
        <div class="card-box">
            <form action="<?php echo base_url('admin/updateReview'); ?>" method="post" enctype="multipart/form-data"
                autocomplete="off">
                <div class="row">
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />                    
                    <div class="col-sm-6">
                        <label>Customer Name<span class="text-danger">*</span></label>
                        <input class="form-control" name="name" value="<?php echo $id == 0 ? '' : $data->name; ?>" type="text" required>                        
                    </div>
                    <div class="col-sm-6">
                        <label>Mobile No<span class="text-danger">*</span></label>
                        <input class="form-control" name="mobileno" value="<?php echo $id == 0 ? '' : $data->mobileno; ?>" type="text" required>
                    </div>
                    <div class="col-sm-3">
                        <br />
                        <label>Rating<span class="text-danger">*</span></label>
                        <input class="form-control" name="rating" value="<?php echo $id == 0 ? '' : $data->rating; ?>" type="number" min=1 max=5 required>
                    </div>
                    <div class="col-sm-9">
                        <br />
                        <label>Review<span class="text-danger">*</span></label>
                        <input class="form-control" name="review" value="<?php echo $id == 0 ? '' : $data->review; ?>" type="text" required>
                    </div>
                </div>
                <div class="m-t-20">
                    <button class="btn btn-primary submit-btn" onclick="return validate()">Save</button>
                </div>
            </form>
        </div>

    </div>
</div>