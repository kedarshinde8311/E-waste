</div>
<div class="sidebar-overlay" data-reff=""></div>
<script src="<?php echo base_url(); ?>assets/admin/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/jquery.slimscroll.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/Chart.bundle.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/chart.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/app.js"></script>

<script>
function mySearch() {
    var input, filter, table, tr, td, i;
    input = document.getElementById("search");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 2; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        var show = false;
        for (j = 0; j < td.length; j++) {
            if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                show = true;
                break;
            }
        }
        if (show)
            tr[i].style.display = "";
        else
            tr[i].style.display = "none";
    }
}
</script>

</body>


<!-- Mirrored from dreamguys.co.in/preclinic/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Mar 2019 05:10:56 GMT -->

</html>