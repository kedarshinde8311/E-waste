<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Wastebin</h4>
            </div>
        </div>
        <div class="card-box">
            <form action="<?php echo base_url('admin/savewastebin'); ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                        <div class="col-sm-3">
                                <label>id <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <input class="form-control" name="id" id="id"
                                        value="<?php echo $id == 0 ? '' : $result->id; ?>" <?php echo $id == 0 ? '' : 'readonly'; ?>  type="number" required>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <label>Name <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <input class="form-control" name="name" id="name"
                                        value="<?php echo $id == 0 ? '' : $result->name; ?>" type="text" required>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <label>Longitude <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <input class="form-control" name="longitude" id="longitude"
                                        value="<?php echo $id == 0 ? '' : $result->longitude; ?>" type="text" required>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <label>Latitude <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <input class="form-control" name="latitude" id="latitude"
                                        value="<?php echo $id == 0 ? '' : $result->latitude; ?>" type="text" required>
                                </div>
                            </div>

                           


                            <button class="btn btn-primary">Save</button>
                        </div>
                    </div>
            </form>

         </div>
    </div>
</div>
