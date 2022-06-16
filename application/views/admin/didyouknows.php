<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-6 col-lg-6">
                <h4 class="page-title">Did You Knows [<?= sizeof($results); ?>]</h4>
            </div>
            <div class="col-md-6">
                <input type="text" value="" id="search" name="search" onkeyup="mySearch()"
                    class="form-control pull-right" autocomplete="off" placeholder="Search...">
            </div>
        </div>
        <div class="card-box">
            <div class="row">
                <div class="col-lg-12">
                    <form autocomplete="off" action="<?php echo base_url('admin/savedidyouknow'); ?>" method="post"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12">
                                <label>Sr.No<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input class="form-control" name="srno" value="" type="number">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label>Description<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                <textarea class="form-control" name="description" id="body" rows="3"
                            cols="30"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card-box">
            <div class="row">
                <div class="col-lg-12">
                    <br />
                    <div class="table-responsive">
                        <table class="table table-striped custom-table" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Sr.No</th>
                                    <th>Description</th>
                                    <th>Action</th>                                  
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 1;
                                foreach ($results as $row) {

                                    ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    
                                    <td><?php echo $row->srno;?></td>
                                    <td><?php echo $row->description;?></td>
                                    <td class="text-center" style="width:100px;">
                                        
                                        <a href="<?php echo base_url('admin/deletedidyouknow/' . $row->id); ?>"
                                            style="color:red;" title="click to delete"
                                            onclick="return confirm('Sure to delete?');"><i class="material-icons">
                                                delete
                                            </i></a>
                                    </td>
                                    
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