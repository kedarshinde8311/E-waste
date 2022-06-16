 <div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-6 col-3">
                <h4 class="page-title">Location   <?=$locationname->name?></h4>
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
                    <input type="hidden" name="fromlocationid" value="<?= $id; ?>" />
                    <table class="table table-striped custom-table" id="myTable">
                        <thead>
                            <tr><th>No</th>
                                <th>Name</th>
                                <th>Distance</th>
                            </tr>
                        </thead>
                         <tbody>
                            <?php
							$count = 1;
							foreach ($result as $row) {
                                   
								?>
                                <tr>
                                
                                <td class="text-center"><?= $count; ?></td>
                                <td><?= $row->name; ?></td>
                                <td>
                                <?= $row->distance; ?>
                                </td>
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
