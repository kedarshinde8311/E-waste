 <div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-6 col-3">
                <h4 class="page-title">Vehicles (<?=sizeof($result);?>)</h4>
            </div>
            <div class="col-sm-6 col-9 text-right m-b-20">
                <a href="<?= base_url('admin/vehicle/0'); ?>" class="btn btn btn-primary float-right"><i
                        class="fa fa-plus"></i> Add New</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <input type="text" value="" id="search" name="search" onkeyup="mySearch()"
                    class="form-control pull-right" autocomplete="off" placeholder="Search...">
            </div>
            <br /><br /><br />
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table" id="myTable">
                        <thead>
                            <tr>
                            						
                                <th></th>
                                <th>No</th>
                                <th>Vehicle No</th>
                                <th>Driver Name</th>
                                <th>Mobileno</th>
                                <th>Password </th>
                            </tr>
                        </thead>
                         <tbody>
                            <?php
							$count = 1;
							foreach ($result as $row) {
                                   
								?>
                                <tr>
                                <td class="text-center" style="width:100px;">
                                    <a href="<?= base_url('admin/vehicle/'.$row->id); ?>" title="click to edit"><i
                                            class="material-icons">
                                            edit
                                        </i></a>&nbsp;&nbsp;
                                    <a href="<?= base_url('admin/deletevehicle/'.$row->id); ?>" style="color:red;"
                                        title="click to delete" onclick="return confirm('Sure to delete?');"><i
                                            class="material-icons">
                                            delete
                                        </i></a>
                                </td>
                                <td class="text-center"><?= $count; ?></td>
                                <td><?= $row->name; ?></td>
                                <td><?= $row->drivername; ?></td>
                                <td><?= $row->mobileno; ?></td>
                                <td><?= $row->password; ?></td> 
                            </tr>
                            <?php 
                            ++$count;
								}?>
                        </tbody> 
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>  
