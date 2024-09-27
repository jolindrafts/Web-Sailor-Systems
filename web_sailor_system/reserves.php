<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="images/favicon.png">

    <title>Sailors Systems Application  </title>


    <link href="bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />

 
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

</head>

<body>

<section id="container" >
<header class="header fixed-top clearfix">
<div class="brand">

    <a href="#" class="logo" style="color:white">
        <b>Sailors Systems</b>
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>

<div class="top-nav clearfix">
    <ul class="nav pull-right top-menu">
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <span class="username">Hi. Admin</span>
                <b class="caret"></b>
            </a>
            <!-- <ul class="dropdown-menu extended logout">
                <li><a href="logout.phps"><i class="fa fa-key"></i> Log Out</a></li>
            </ul> -->
        </li>
    </ul>
</div>
</header>
<aside>
    <div id="sidebar" class="nav-collapse">
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
            <li class="sub-menu">
                <a href="javascript:;" class="active">
                    <i class="fa fa-th"></i>
                    <span>Data Maintenance</span>
                </a>
                <ul class="sub">
                    <li><a href="sailors.php">Sailors</a></li>
                    <li><a href="boats.php">Boats</a></li>
                    <li class="active"><a href="reserves.php">Reserves</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-tasks"></i>
                    <span>Report</span>
                </a>
                <ul class="sub">
                    <li><a href="jlhSailors.php">Jumlah Sailors</a></li>
                    <li><a href="jlhBoats.php">Jumlah Boats</a></li>
                    <li><a href="rtgSailors.php">Rata-Rata Rating Sailors</a></li>
                    <li><a href="rtgAgeSailors.php">Rata-Rata Age Sailors</a></li>

                </ul>
            </li>
           
        </ul></div>    
    </div>
</aside>
    <section id="main-content">
        <section class="wrapper">

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                   
                    <div class="panel-body">
                        <?php
                        date_default_timezone_set("Asia/Jakarta");
                        include("connection.php");
                        if(isset($_GET['ubid']) || isset($_GET['usid']) || isset($_GET['udays']))
                        {
                             ?>
                            <header class="panel-heading">
                                Form Update Data Boats
                            </header>
                            <br />
                            <?php
                            $ubid=$_GET['ubid'];
                            $usid=$_GET['usid'];
                            $udays=$_GET['udays'];

                                if(isset($_GET['mssgInfo']))
                                {
                                    ?>
                                    <span class="badge bg-success">Horree. Data Is Successful Update (Auto Refresh 3 Second)</span>
                                    <meta http-equiv="refresh" content="5;url=reserves.php">
                                    
                                        <br /><br />
                                    <?php
                                }

                                if(isset($_POST['proses']))
                                {
                                   $sId=$_POST['sId'];
                                    $bId=$_POST['bId'];
                                    $day=$_POST['days'];
                                        $days=date("d/m/y",strtotime($day));

                                    if(empty($sId) || empty($bId) || empty($days))
                                    {
                                        ?>
                                        <span class="badge bg-warning">Sorry. Data Cannot Be Processed. Because Data is Empty</span>
                                        
                                        <br /><br />
                                        <?php
                                    }
                                    else
                                    {
                                        mysqli_query($conn,"update reserves set sid='$sId', bid='$bId', days='$days' where sid='$usid' and bid='$ubid' and days='$udays'");
                                        ?>
                                        <meta http-equiv="refresh" content="0;url=reserves.php?ubid=<?php echo"$ubid";?>&usid=<?php echo"$usid";?>&udays=<?php echo"$udays";?>&mssgInfo=success">
                                        <?php
                                    }
                                }
                                $detailReserves=mysqli_fetch_row(mysqli_query($conn,"Select sid, bid, days from reserves where bid='$ubid' and sid='$usid' and days='$udays'"));
                                ?>
                                <form method="POST" action="reserves.php?ubid=<?php echo"$ubid";?>&usid=<?php echo"$usid";?>&udays=<?php echo"$udays";?>">
                                    <b>Sailors</b><br />
                                        <?php
                                        $getSid=mysqli_query($conn,"Select sid, sname from sailors order by sid asc");
                                        ?>
                                        <select name="sId" class="form-control" style="color:black">
                                            <option value="">Selected Sailors</option>
                                            <?php
                                            while($viewSid=mysqli_fetch_row($getSid))
                                            {
                                                if($detailReserves[0]==$viewSid[0])
                                                {
                                                    ?>
                                                    <option value="<?php echo"$viewSid[0]";?>" selected><?php echo"SID: $viewSid[0], Name: $viewSid[1]";?></option>
                                                    <?php
                                                }
                                                else
                                                {
                                                    ?>
                                                    <option value="<?php echo"$viewSid[0]";?>"><?php echo"SID: $viewSid[0], Name: $viewSid[1]";?></option>
                                                    <?php
                                                }                                                
                                            }
                                            ?>
                                        </select>   
                                    <br />
                                    <b>Boats</b><br />
                                    <?php
                                        $getBid=mysqli_query($conn,"Select bid, bname from boats order by bid asc");
                                        ?>
                                        <select name="bId" class="form-control" style="color:black">
                                            <option value="">Selected Boats</option>
                                            <?php
                                            while($viewBid=mysqli_fetch_row($getBid))
                                            {
                                                if($detailReserves[1]==$viewBid[0])
                                                {
                                                    ?>
                                                    <option value="<?php echo"$viewBid[0]";?>" selected><?php echo"BID: $viewBid[0], Name: $viewBid[1]";?></option>
                                                    <?php
                                                }
                                                else
                                                {
                                                    ?>
                                                    <option value="<?php echo"$viewBid[0]";?>"><?php echo"BID: $viewBid[0], Name: $viewBid[1]";?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>   
                                    <br />
                                    <b>Days</b><br />
                                    <?php 
                                    if(!empty($detailReserves[2]))
                                    {
                                        $pchdate=explode("/",$detailReserves[2]);
                                        $dy=$pchdate[0];$mt=$pchdate[1];$yr=$pchdate[2];
                                        $gb=$mt."/".$dy."/".$yr;
                                        $date=date_create($gb);
                                    }
                                  
                                    ?>
                                    <input type="date" name="days" class="form-control" style="color:black" placeholder="Input Days" value="<?php echo date_format($date,"Y-m-d");?>"><br />
                                    
                                    <button type="submit" name="proses" class="btn btn-danger">Update Data Reserves</button>
                                </form>
                                <?php
                        }
                        else
                        {
                            if(isset($_GET['bid']) || isset($_GET['sid']) || isset($_GET['days']))
                            {
                                $bid=$_GET['bid'];
                                $sid=$_GET['sid'];
                                $days=$_GET['days'];
                                mysqli_query($conn,"Delete from reserves where bid='$bid' and sid='$sid' and days='$days'");
                                ?>
                                <span class="badge bg-success">Horree. Data Is Successful Delete (Auto Refresh 3 Second)</span>
                                <meta http-equiv="refresh" content="5;url=reserves.php">
                                
                                    <br /><br />
                                <?php
                            }

                            if(isset($_GET['add']))
                            {
                                ?>
                                <header class="panel-heading">
                                    Form Add Data Reserves
                                </header>
                                <br />
                                <?php
                                if(isset($_GET['mssgInfo']))
                                {
                                    ?>
                                    <span class="badge bg-success">Horree. Data Is Successful Save (Auto Refresh 3 Second)</span>
                                    <meta http-equiv="refresh" content="5;url=reserves.php">
                                    
                                        <br /><br />
                                    <?php
                                }

                                if(isset($_POST['proses']))
                                {
                                    $sId=$_POST['sId'];
                                    $bId=$_POST['bId'];
                                    $day=$_POST['days'];
                                        $days=date("d/m/y",strtotime($day));

                                    if(empty($sId) || empty($bId) || empty($days))
                                    {
                                        ?>
                                        <span class="badge bg-warning">Sorry. Data Cannot Be Processed. Because Data is Empty</span>
                                        
                                        <br /><br />
                                        <?php
                                    }
                                    else
                                    {
                                        mysqli_query($conn,"Insert into reserves set sid='$sId', bid='$bId', days='$days'");
                                        ?>
                                        <meta http-equiv="refresh" content="0;url=reserves.php?add=ok&mssgInfo=success">
                                        <?php
                                    }
                                }
                                ?>
                                <form method="POST" action="reserves.php?add=ok">
                                    <b>Sailors</b><br />
                                        <?php
                                        $getSid=mysqli_query($conn,"Select sid, sname from sailors order by sid asc");
                                        ?>
                                        <select name="sId" class="form-control" style="color:black">
                                            <option value="">Selected Sailors</option>
                                            <?php
                                            while($viewSid=mysqli_fetch_row($getSid))
                                            {
                                                ?>
                                                <option value="<?php echo"$viewSid[0]";?>"><?php echo"SID: $viewSid[0], Name: $viewSid[1]";?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>   
                                    <br />
                                    <b>Boats</b><br />
                                    <?php
                                        $getBid=mysqli_query($conn,"Select bid, bname from boats order by bid asc");
                                        ?>
                                        <select name="bId" class="form-control" style="color:black">
                                            <option value="">Selected Boats</option>
                                            <?php
                                            while($viewBid=mysqli_fetch_row($getBid))
                                            {
                                                ?>
                                                <option value="<?php echo"$viewBid[0]";?>"><?php echo"BID: $viewBid[0], Name: $viewBid[1]";?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>   
                                    <br />
                                    <b>Days</b><br />
                                    <input type="date" name="days" class="form-control" style="color:black" placeholder="Input Days" ><br />
                                    
                                    <button type="submit" name="proses" class="btn btn-danger">Add Data Reserves</button>
                                </form>
                                <?php
                            }
                            else
                            {
                                ?> 
                                <header class="panel-heading">
                                    List Data Reserves
                                </header>
                                <br />
                                <a href="reserves.php?add=ok">
                                    <button class="btn btn-success">
                                        <i class="fa fa-plus"></i> Add Reserves
                                    </button>
                                </a>
                                <hr />
                                <table class="table  table-hover general-table">
                                    <thead>
                                    <tr>
                                        <th>Sailors</th>
                                        <th>Boats</th>
                                        <th>Days</th>
                                        <th>Action</th>                                
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                        $viewAllReserves=mysqli_query($conn,"Select sailors.sname, sailors.rating, sailors.age, boats.bname, boats.color, reserves.sid, reserves.bid, reserves.days from sailors, boats, reserves where boats.bid=reserves.bid and sailors.sid=reserves.sid");
                                        while($getViewReserves=mysqli_fetch_row($viewAllReserves))
                                        {
                                            ?>
                                            <tr>
                                                <td>
                                                    <b>SID</b>: <?php echo"$getViewReserves[5]";?>
                                                    <br /> 
                                                    <b>Sailors Name</b>: <?php echo"$getViewReserves[0]";?>
                                                    <br /> 
                                                    <b>Sailors Rating</b>: <?php echo"$getViewReserves[1]";?>
                                                    <br /> <b>Sailors Age</b>:  <?php echo"$getViewReserves[2]";?>
                                                </td>
                                                <td>
                                                    <b>BID</b>: <?php echo"$getViewReserves[6]";?>
                                                    <br /> 
                                                    <b>Boats Name</b>: <?php echo"$getViewReserves[3]";?>
                                                    <br /> 
                                                    <b>Boats Rating</b>: <?php echo"$getViewReserves[4]";?>
                                                </td>
                                                <td><?php echo"$getViewReserves[7]";?></td>
                                                <td>
                                                    <a href="reserves.php?ubid=<?php echo"$getViewReserves[6]";?>&usid=<?php echo"$getViewReserves[5]";?>&udays=<?php echo"$getViewReserves[7]";?>">
                                                        <button class="btn btn-info">
                                                            <i class="fa fa-edit"></i> Update
                                                        </button>
                                                    </a>
                                                    <a href="reserves.php?bid=<?php echo"$getViewReserves[6]";?>&sid=<?php echo"$getViewReserves[5]";?>&days=<?php echo"$getViewReserves[7]";?>">
                                                        <button class="btn btn-danger">
                                                            <i class="fa fa-ban"></i> Delete
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        
                                    ?>
                                    </tbody>
                                </table>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </section>
            </div>
        </div>
        </section>
    </section>
</section>
<script src="js/jquery.js"></script>
<script src="bs3/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/easypiechart/jquery.easypiechart.js"></script>
<script src="js/sparkline/jquery.sparkline.js"></script>
<script src="js/flot-chart/jquery.flot.js"></script>
<script src="js/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="js/flot-chart/jquery.flot.resize.js"></script>
<script src="js/flot-chart/jquery.flot.pie.resize.js"></script>

<script src="js/scripts.js"></script>

</body>
</html>
