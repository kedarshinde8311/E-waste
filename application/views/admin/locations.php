 <div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-6 col-3">
                <h4 class="page-title">Locations (<?=sizeof($result);?>)</h4>
            </div>
            <div class="col-sm-6 col-9 text-right m-b-20">
                <a href="<?= base_url('admin/location/0'); ?>" class="btn btn btn-primary float-right"><i
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
                                <th>Name</th>
                                <th>Longitude</th>
                                <th>Latitude</th>
                                <th>Iswastebin</th>
                                <th>Coonected Locations</th>
                            </tr>
                        </thead>
                         <tbody>
                            <?php
							$count = 1;
							foreach ($result as $row) {
                                   
								?>
                                <tr>
                                <td class="text-center" style="width:100px;">
                                    <a href="<?= base_url('admin/location/'.$row->id); ?>" title="click to edit"><i
                                            class="material-icons">
                                            edit
                                        </i></a>&nbsp;&nbsp;
                                    <a href="<?= base_url('admin/deletelocation/'.$row->id); ?>" style="color:red;"
                                        title="click to delete" onclick="return confirm('Sure to delete?');"><i
                                            class="material-icons">
                                            delete
                                        </i></a>
                                </td>
                                <td class="text-center"><?= $count; ?></td>
                                <td><?= $row->name; ?></td>
                                <td><?= $row->longitude; ?></td>
                                <td><?= $row->latitude; ?></td>
                                <td><?= $row->iswastebin; ?></td> 
                                <td> <a href="<?= base_url('admin/routes/'.$row->id); ?>"><button class="btn btn-primary">View Connected Locations</button></a></td>
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
