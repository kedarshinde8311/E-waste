<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-6 col-3">
                <h4 class="page-title">Blogs</h4>
            </div>
            <div class="col-sm-6 col-9 text-right m-b-20">
                <a href="<?php echo base_url('admin/blog/0'); ?>" class="btn btn btn-primary float-right"><i
                        class="fa fa-plus"></i></a>
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
                                <th>No</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Updated On</th>

                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $count = 1;
                                foreach ($result as $row) {
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $count; ?></td>
                                <td><img src="<?php echo base_url('blogpics/'.$row->id.'.png'); ?>"
                                        style="height:50px; width:60px;" /></td>
                                <td><?php echo $row->title; ?></td>
                                <td><?php echo $row->date; ?></td>
                                <td class="text-center" style="width:100px;">
                                    <a href="<?php echo base_url('admin/blog/'.$row->id); ?>" title="click to edit"><i
                                            class="material-icons">
                                            edit
                                        </i></a>&nbsp;&nbsp;
                                    <a href="<?php echo base_url('admin/deleteBlog/'.$row->id); ?>" style="color:red;"
                                        title="click to delete" onclick="return confirm('Sure to delete?');"><i
                                            class="material-icons">
                                            delete
                                        </i></a>
                                </td>
                            </tr>
                            <?php ++$count;
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
