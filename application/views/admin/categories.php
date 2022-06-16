<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-6 col-lg-6">
                <h4 class="page-title">Categories</h4>
            </div>
            <div class="col-md-6">
                <input type="text" value="" id="search" name="search" onkeyup="mySearch()"
                    class="form-control pull-right" autocomplete="off" placeholder="Search...">
            </div>
        </div>

        <div class="card-box">
            <div class="row">
                <div class="col-lg-6">
                    <form action="<?php echo base_url('admin/savecategories'); ?>" method="post"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" class="form-control" name="id"
                                        value="<?php echo $id == 0 ? '0' : $id; ?>" readonly />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label>Category<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input class="form-control" name="title"
                                        value="<?php echo $id == 0 ? '' : $result->title; ?>" type="text">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label>Icon<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-sm-12">
                                <div class="profile-upload">
                                    <div class="upload-input">
                                        <input type="file" id="pic" name="pic" onchange="readURL(this);"
                                            class="form-control" multiple>
                                    </div>
                                </div>
                                <br>
                            </div>
							<div class="col-lg-12">
                                <label>Show On Home Page<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <select name="showonhome" class="form-control">
										<option value="Yes" <?php echo $id == 0 ? '' : ($result->showonhome == "Yes" ? "selected" : "") ?>>Yes</option>
										<option value="No" <?php echo $id == 0 ? '' : ($result->showonhome == "No" ? "selected" : "") ?>>No</option>
									</select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                Sr No
                                <div class="form-group">
                                    <input class="form-control" name="srno" value="<?php echo $id == 0 ? '' : $result->srno; ?>" type="number" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-6">
                    <br />
                    <div class="table-responsive">
                        <table class="table table-striped custom-table" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th> Category</th>
									<th> Show On Home</th>
                                    <th>SrNo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($results)) {
                                    $count = 1;
                                    foreach ($results as $row) {
                                        ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td><img class="thumbnail" src="<?php echo base_url('categorypics/' . $row->imagename . '.png'); ?>"
                                        style="height:30px; width:60px;" /></td>
                                    <td><?php echo $row->title; ?></td>
									<td><?php echo $row->showonhome; ?></td>
                                    <td><?php echo $row->srno; ?></td>
                                    <td class="text-center" style="width:100px;">
                                        <a href="<?php echo base_url('admin/categories/'.$row->id); ?>"
                                            title="click to edit"><i class="material-icons">
                                                edit
                                            </i></a>&nbsp;&nbsp;
                                        <a href="<?php echo base_url('admin/deletecategories/'.$row->id); ?>"
                                            style="color:red;" title="click to delete"
                                            onclick="return confirm('Sure to delete?');"><i class="material-icons">
                                                delete
                                            </i></a>
                                    </td>
                                </tr>
                                <?php ++$count;
    }
}
?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
