<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-6 col-lg-6">
                <h4 class="page-title">Ads</h4>
            </div>
        </div>
        <div class="card-box">
            <div class="row">
                <div class="col-lg-5">
                    <form action="<?php echo base_url('admin/savead'); ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12">
                                <label>Title<span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <input class="form-control" name="title" value="" type="text">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label>Sr No<span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <input class="form-control" name="srno" value="" type="number" min=1 required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label>Image<span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <input type="file" id="pic" name="pic" class="form-control" accept="image/*" required >
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-7">
                    <br />
                    <div class="table-responsive">
                        <table class="table table-striped custom-table" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Action</th>
                                    <th> Image</th>
                                    <th>Title</th>                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 1;
                                foreach ($results as $row) {

                                    ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td class="text-center" style="width:100px;">
                                        <a href="<?php echo base_url('admin/deletead/' . $row->id); ?>"
                                            style="color:red;" title="click to delete"
                                            onclick="return confirm('Sure to delete?');"><i class="material-icons">
                                                delete
                                            </i></a>
                                    </td>
                                    <td> <img src="<?php echo base_url('ads/' . $row->id . '.png'); ?>"
                                            style="width:100px;" />
                                    </td>
                                    <td><?php echo $row->title; ?></td>
                                    
                                </tr>
                                <?php ++$count;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>