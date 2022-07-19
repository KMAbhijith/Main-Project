<?php


include "connect.php";


?>
<?php


$df = mysqli_query($con, "select * from hpack_book where status=0");
$df1 = mysqli_query($con, "select * from hpack_book where status=1");
$rf = mysqli_query($con, "select * from labrefassign where LA_resultstatus=0");
$rf1 = mysqli_query($con, "select * from labrefassign where LA_resultstatus=1");
?>
<div class="row">


    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Pending Requests(Doctor Referal)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><a class="btn btn-warning" href="index.php"><?php echo mysqli_num_rows($rf) ?></a></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Pending Requests(Health Package)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><a class="btn btn-warning" href="hpacksample.php"><?php echo mysqli_num_rows($df) ?></a></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Pending uploads(Doctor Referal)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><a class="btn btn-warning" href="sample.php"><?php echo mysqli_num_rows($rf1) ?></a></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Pending uploads(Health Package)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><a class="btn btn-warning" href="hpackpending.php"><?php echo mysqli_num_rows($df1) ?></a></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>