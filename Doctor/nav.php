<?php


include "connect.php";

if (isset($_SESSION['doctor'])) {
?>
    <?php
    $ri = $_SESSION['doctor'];
    $query = "select * from doctor where Log_id='$ri'";
    $res = mysqli_query($con, $query);
    $r = mysqli_fetch_array($res);
    $query2 = "select * from specializations where  D_specialization_id='$r[D_specialization_id]' and Dept_id='$r[Dept_id]'";
    $res2 = mysqli_query($con, $query2);
    $sp = mysqli_fetch_array($res2);
    ?>
    <?php
    $pic = "select Pro_pics from profileimages where Log_id =$ri and Utype_id=2 ";
    $check = mysqli_query($con, $pic);
    $fe = mysqli_fetch_array($check);
    ?>
    <!-- HEADER DESKTOP-->
    <header class="header-desktop">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="header-wrap">
                    <!-- <form class="form-header" action="" method="POST">
                       <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                        <button class="au-btn--submit" type="submit">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                    </form>-->
                    <div class="header-button">

                        <div class="account-wrap">
                            <div class="account-item clearfix js-item-menu">
                                <div class="image">
                                    <img src="../uploadedimg/<?php echo $fe['Pro_pics']; ?>" alt="John Doe" />
                                </div>
                                <div class="content">
                                    <a class="js-acc-btn" href="docprofile.php"><?php echo $r['D_name']; ?></a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="image">
                                            <a href="#">
                                                <img src="../uploadedimg/<?php echo $fe['Pro_pics']; ?>" alt="John Doe" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h5 class="name">
                                                <a href="#"><?php echo $r['D_name']; ?></a>
                                            </h5>
                                            <span class="email"><?php echo $r['D_pos']; ?>&nbsp;<?php echo $sp['D_specializations']; ?></span>
                                        </div>
                                    </div>

                                    <?php if (isset($_SESSION['doctor'])) { ?>
                                        <div class="account-dropdown__footer">
                                            <a href="logout.php">
                                                <i class="zmdi zmdi-power"></i>Logout</a>
                                        </div><?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- END HEADER DESKTOP-->
<?php
}


?>