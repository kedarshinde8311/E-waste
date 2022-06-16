<?php	include('snackbar.php'); ?>
<style>
    h3{
        color: #1D9700;
        font-size: 32px;
        font-weight: 500;
        font-family: "Great Vibes";
    }
</style>
<div class="main-container col1-layout wow bounceInUp animated animated" style="visibility: visible;">

    <div class="main">
        <div class="product-view container">
            <div class="row">
            <div class="col-lg-2"></div>
                <div class="col-lg-8 well" style="background-color:white;">
                    <div class="row">
                        <div class="col-lg-12" style="text-align:center;"> 
                            <img src="<?php echo base_url(); ?>/assets/img/logo.png" width="250" height="131">
                            <h3 style="color:#82BE42;">
                                Nurturing health into your life !
                            </h3>
                        <hr />
                        <h2 style="color:#82BE42;">Thank you for purchasing from Relife Mantra!</h2>
                        <br />
                        <h4 style="color:black;">Your order details has been sent to your registered email-<?= $customer->email; ?></h4>
                        </div>
                        <div class="col-lg-12 text-center">
                            <hr />
                            <a href="<?= base_url('products'); ?>" class="default-btn">Explore Other products</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="height:300px;"></div>
<script>
    var total = parseFloat("0");
    var products = [];
    localStorage.setItem("products", JSON.stringify(products));
    var customproducts = [];
    localStorage.setItem("customproducts", JSON.stringify(customproducts));
    localStorage.setItem("total", total);
</script>