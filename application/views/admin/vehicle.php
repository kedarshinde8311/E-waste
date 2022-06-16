<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Vehicle</h4>
            </div>
        </div>
        <div class="card-box">
            <form action="<?php echo base_url('admin/savevehicle'); ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                <input type="hidden" id="website" name="website"/>
                    <div class="col-sm-6">
                        <div class="row">
                    <div class="col-sm-3">
                                <!-- <label>id <span class="text-danger">*</span></label> -->
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                <input type="text" hidden name="id" value="<?php echo $id; ?>" />

                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label>Name <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <input class="form-control" name="name"
                                        value="<?php echo $id == 0 ? '' : $result->name; ?>" type="text" required>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <label>Driver Name <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <input class="form-control" name="drivername"
                                        value="<?php echo $id == 0 ? '' : $result->drivername; ?>" type="text" required>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <label>Mobile no <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <input class="form-control" name="mobileno"
                                        value="<?php echo $id == 0 ? '' : $result->mobileno; ?>" type="text" required>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <label>Password<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <input class="form-control" name="password"
                                        value="<?php echo $id == 0 ? '' : $result->password; ?>" type="text" required>
                                </div>
                            </div>




                            </div>
                            <button class="btn btn-primary">Save</button>
                        </div>
                    </div>
            </form>

         </div>
    </div>
</div>
