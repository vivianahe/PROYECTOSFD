<?php
session_start();
extract($_REQUEST);
if (!isset($_SESSION['idAdmin'])) {
    header("location:../../");
}
error_reporting(1);

?>
<br>
<div class="foot">
    <div class="container">
        <div class="row">
            <div class="col-xs-8">
                <p>@bootstrap</p>
            </div>
            <div class="col-xs-4">
                <div class="pull-right hidden-xs">
                </div>
                <strong>Copyright SFD &copy; 2018 </strong> All rights
                reserved.
            </div>
        </div>
    </div>
    <div class="col-md-12 footer-bottom bg-red-active" id="irarriba"><br>
        <center><a class="scroll-link"><i class="fas fa-arrow-up fa-2x"></i></a></center>
    </div> 
</div>

