<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Location</h4>
            </div>
        </div>
        <div class="card-box">
            <form action="<?php echo base_url('admin/savelocation'); ?>" method="post" enctype="multipart/form-data">

            <?php
            $readonly = "";
                if($id!=0)
                {
                    if($result->iswastebin == "yes")
                    {
                        $readonly = "readonly";
                    }
                }
            ?>
                <div class="row">
                    <div class="col-sm-6">
                    <input hidden class="form-control" name="id" id="id"
                                        value="<?php echo $id == 0 ? '' : $result->id; ?>" <?php echo $id == 0 ? '' : 'readonly'; ?>  type="number">
                               
                        <div class="row">
                        

                        <div class="col-sm-3">
                                <!-- <label>Is Wastebin <span class="text-danger">*</span></label> -->
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                <!-- <select id="iswastebin" onchange="changename()" name="iswastebin" class="form-control">
                                <?php
                                   //     echo "<option value='no' " . ($id == 0 ? "" : ($result->iswastebin =="no" ? "selected" : "")) . ">No</option>";
                                     //   echo "<option value='yes' " . ($id == 0 ? "" : ($result->iswastebin =="yes" ? "selected" : "")) . ">Yes</option>";
                                     
                                ?>
                            </select> -->
                                  
                            </div>

                                </div>
                            <div class="col-sm-3">
                                <label>Name <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <input class="form-control" name="name" id="name"  <?php echo $readonly;  ?>
                                        value="<?php echo $id == 0 ? '' : $result->name; ?>"  required type="text" >
                             
                                <!-- <select id="wastebins" name="wastebinid" style="display: none;" class="form-control">
                                        <?php
                                    // foreach($wastebins as $wastebin)
                                    // {
                                    //     echo "<option value='" . $wastebin->id . "' " . ($id == 0 ? "" : ($result->wastebinid == $wastebin->id ? "selected" : "")) . ">" . $wastebin->name . "</option>";
                                    // }
                                ?>
                                </select> -->
                                </div>
                            </div>

                            <div id="divlongitude1"  class="col-sm-3">
                                <label>Longitude <span class="text-danger">*</span></label>
                            </div>
                            <div id="divlongitude2" class="col-sm-9">
                                <div class="form-group">
                                    <input class="form-control" name="longitude" id="longitude"  <?php echo $readonly;  ?>
                                        value="<?php echo $id == 0 ? '' : $result->longitude; ?>" type="text" required >
                                </div>
                            </div>

                            <div id="divlatitude1" class="col-sm-3">
                                <label>Latitude <span class="text-danger">*</span></label>
                            </div>
                            <div id="divlatitude2" class="col-sm-9">
                                <div class="form-group">
                                    <input class="form-control" name="latitude" id="latitude"  <?php echo $readonly;  ?>
                                        value="<?php echo $id == 0 ? '' : $result->latitude; ?>" type="text" required>
                                </div>
                            </div>
                                    
                            <?php
							$count = 1;
							foreach ($locations as $row) {
                                    

                                    $checked = "";
                                    foreach($connectednodes as $node)
                                    {
                                        if($row->id == $node->id){
                                            $checked = "checked";
                                            break;
                                        }
                                    }
                                   echo("<br>");
								?>
                                 <div id="divlatitude2" class="col-sm-9">
                                     <label>
                                <input type="checkbox" id="tolocationid<?php echo $count;?>" name="tolocationid<?php echo $count;?>" value="<?php echo $row->id;?>" <?= $checked; ?>><?php echo $row->name;?>
                                </label>
                            </div>
                             <?php 
                            ++$count;
								}
                                ?>
                                <input hidden id="count" name="count" value=<?php echo $count;?> />
                               

                            <button input="" class="btn btn-primary">Save</button>
                        </div>
                    </div>
            </form>

         </div>
    </div>
</div>
     <script>
                // function changename()
                // {
                //     var iswastebin = document.getElementById("iswastebin").value;
                //     if(iswastebin=="yes")
                //     {
                //         document.getElementById("name").style.display = "none";
                //         document.getElementById("divlongitude1").style.display = "none";
                //         document.getElementById("divlongitude2").style.display = "none";
                //         document.getElementById("divlatitude1").style.display = "none";
                //         document.getElementById("divlatitude2").style.display = "none";
                //         document.getElementById("wastebins").style.display = "block";
                        
                //     }
                //     else{
                //         document.getElementById("name").style.display = "block";
                //         document.getElementById("divlongitude1").style.display = "block";
                //         document.getElementById("divlongitude2").style.display = "block";
                //         document.getElementById("divlatitude1").style.display = "block";
                //         document.getElementById("divlatitude2").style.display = "block";
                //         document.getElementById("wastebins").style.display = "none";
                //     }
                // }
                // changename();
    </script>