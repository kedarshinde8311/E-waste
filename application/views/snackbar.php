<style>
    #snackbar {
    visibility: hidden;
    min-width: 250px;
    margin-left: -125px;
    background-color: #333;
    color: #fff;
    text-align: center;
    border-radius: 2px;
    padding: 16px;
    position: fixed;
    z-index: 1;
    left: 50%;
    bottom: 200px;
    font-size: 17px;
    }

    #snackbar.show {
    visibility: visible;
    -webkit-animation: fadein 1.5s, fadeout 5.5s 5.5s;
    animation: fadein 1.5s, fadeout 5.5s 5.5s;
    }

    @-webkit-keyframes fadein {
    from {bottom: 0; opacity: 0;} 
    to {bottom: 200px; opacity: 1;}
    }

    @keyframes fadein {
    from {bottom: 0; opacity: 0;}
    to {bottom: 200px; opacity: 1;}
    }

    @-webkit-keyframes fadeout {
    from {bottom: 200px; opacity: 1;} 
    to {bottom: 0; opacity: 0;}
    }

    @keyframes fadeout {
    from {bottom: 200px; opacity: 1;}
    to {bottom: 0; opacity: 0;}
    }
</style>
<div id="snackbar"></div>
<script>
    function showSnackbar(color, message) {
        var x = document.getElementById("snackbar");
        x.style.backgroundColor = color;
        x.innerText = message;
        x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
    }
</script>
<?php
    if($this->session->flashdata('success_msg')){
        echo "<script>showSnackbar('green', '" . $this->session->flashdata('success_msg') . "');</script>"; 
    }
    if($this->session->flashdata('error_msg')){
        echo "<script>showSnackbar('red', '" . $this->session->flashdata('error_msg') . "');</script>"; 
    }
?>