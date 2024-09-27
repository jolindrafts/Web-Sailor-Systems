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
                <a href="javascript:;">
                    <i class="fa fa-th"></i>
                    <span>Data Maintenance</span>
                </a>
                <ul class="sub">
                    <li><a href="sailors.php">Sailors</a></li>
                    <li><a href="boats.php">Boats</a></li>
                    <li><a href="reserves.php">Reserves</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="active">
                    <i class="fa fa-tasks"></i>
                    <span>Report</span>
                </a>
                <ul class="sub">
                    <li><a href="jlhSailors.php">Jumlah Sailors</a></li>
                    <li class="active"><a href="jlhBoats.php">Jumlah Boats</a></li>
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
                        
                        include("connection.php");
                        ?> 
                        <header class="panel-heading">
                            Report Jumlah Boats
                        </header>
                        <br />
                        <a href="#" onclick="window.print()">
                            <button class="btn btn-success">
                                <i class="fa fa-plus"></i> Print Reports Boats
                            </button>
                        </a>
                        <hr />
                        <table class="table  table-hover general-table">
                            <thead>
                            <tr>
                                <th> ID</th>
                                <th> Boats Name</th>
                                <th>Color</th>                          
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                                $viewAllBoats=mysqli_query($conn,"Select bid, bname, color from boats order by bid desc");
                                $no=0;
                                while($getViewBoats=mysqli_fetch_row($viewAllBoats))
                                {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo"$getViewBoats[0]";?>
                                        </td>
                                        <td>
                                            <?php echo"$getViewBoats[1]";?>
                                        </td>
                                        <td><?php echo"$getViewBoats[2]";?></td>
                                    </tr>
                                    <?php
                                    $no++;
                                }
                                
                            ?>
                            <tr>
                                <td colspan="2"><h4><b>Jumlah Boats</b></h4></td>
                                <td><h4><?php echo"$no";?></h4></td>
                            </tr>
                            </tbody>
                        </table>
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
