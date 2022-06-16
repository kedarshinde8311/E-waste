<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Service</h4>
            </div>
        </div>
        <div class="card-box">
            <form action="<?php echo base_url('admin/saveservice'); ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-3">
                                <label>Title <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <input class="form-control" name="title"
                                        value="<?php echo $id == 0 ? '' : $data->title; ?>" type="text" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    

                    <div class="col-sm-4">
                        <div class="row">
                            <div class="col-sm-3">
                                <label>Image</label>
                            </div>
                            <div class="col-sm-9">
                                <div class="profile-upload">
                                    <div class="upload-input">
                                        <input type="file" id="pic" name="pic" onchange="readURL(this);" accept="image/*" class="form-control">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-2">
                        <div>
                            <img alt="" id="blah" height="42" width="42" src="#">
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <label>Description</label>
                        <textarea class="form-control" name="body" id="body" rows="3"
                            cols="30"><?php echo $id == 0 ? '' : $data->body; ?></textarea>
                        <script>
                        CKEDITOR.replace('body');
                        </script>
                    </div>
                </div>
                <button class="btn btn-primary">Save</button>
            </form>
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
                .width(80)
                .height(80);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
</script>
