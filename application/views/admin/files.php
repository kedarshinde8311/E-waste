<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="page-title">Files</h4>
            </div>
        </div>
        <div class="card-box">
            <div class="row">
                        <form action="<?= base_url('admin/savefile');?>" method="post" enctype="multipart/form-data" class="new-added-form" >
                            <div class="row">
								<div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label>Title *</label>
                                    <input type="text" name="title" placeholder="" class="form-control" value="" required>
                                </div>
								<div class="col-lg-4 col-12 form-group mg-t-30">
                                    <label class="text-dark-medium">Picture</label>
                                    <input type="file" name="filename" onchange="readURL(this);" accept="image/*" class="form-control-file">
								</div>
								<div class="col-lg-2 col-12 form-group mg-t-30">
									<img alt="" id="blah" height="50px" width="100px" src="#">
								</div>
                                <div class="col-12 form-group mg-t-8">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table display data-table text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Preview</th>
                                        <th>Path</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $count = 1;
                                    foreach($result as $row) {
                                        ?>
                                    <tr>
                                        <td>
                                        <a href="<?php echo base_url('admin/deletefile/'.$row->id); ?>"
                                            style="color:red;" title="click to delete"
                                            onclick="return confirm('Sure to delete?');"><i class="material-icons">
                                                delete
                                            </i></a>
                                        </td>
                                        <td><?= $count;?></td>
                                        <td><?= $row->title;?></td>
                                        <td><img src="<?= base_url('files/' . $row->filename);?>" style="height:50px;width:50px;" /></td>
                                        <td><span class="btn btn-primary" onclick="copy(this)"><?= base_url('files/' . $row->filename);?></span></td>
                                    </tr>
                                    <?php $count++;
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
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(80);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function copy(that){
        var inp =document.createElement('input');
        document.body.appendChild(inp)
        inp.value =that.textContent
        inp.select();
        document.execCommand('copy',false);
        inp.remove();
        showSnackbar("green", "string copeid");
    }
</script>
