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
                    <li class="active"><a href="boats.php">Boats</a></li>
                    <li><a href="reserves.php">Reserves</a></li>
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
                        
                        include("connection.php");
                        if(isset($_GET['viewUpdate']))
                        {
                             ?>
                            <header class="panel-heading">
                                Form Update Data Boats
                            </header>
                            <br />
                            <?php
                            $viewUpdate=$_GET['viewUpdate'];
                                if(isset($_GET['mssgInfo']))
                                {
                                    ?>
                                    <span class="badge bg-success">Horree. Data Is Successful Update (Auto Refresh 3 Second)</span>
                                    <meta http-equiv="refresh" content="5;url=boats.php">
                                    
                                        <br /><br />
                                    <?php
                                }

                                if(isset($_POST['proses']))
                                {
                                    $bId=$_POST['bId'];
                                    $bName=$_POST['bName'];
                                    $color=$_POST['color'];

                                    if(empty($bId) || empty($bName) || empty($color))
                                    {
                                        ?>
                                        <span class="badge bg-warning">Sorry. Data Cannot Be Processed. Because Data is Empty</span>
                                        
                                        <br /><br />
                                        <?php
                                    }
                                    else
                                    {
                                        mysqli_query($conn,"Update boats set bid='$bId', bname='$bName', color='$color' where bid='$viewUpdate'");
                                        ?>
                                        <meta http-equiv="refresh" content="0;url=boats.php?viewUpdate=<?php echo"$viewUpdate";?>&mssgInfo=success">
                                        <?php
                                    }
                                }
                            $detailBoats=mysqli_fetch_row(mysqli_query($conn,"Select bid, bname, color from boats where bid='$viewUpdate'"));
                            ?>
                                <form method="POST" action="boats.php?viewUpdate=<?php echo"$viewUpdate";?>">
                                    <b>Boats Id</b><br />
                                    <input type="text" name="bId" class="form-control" style="width:170px;color:black" min="1" max="10" placeholder="Input Boats Id" oninput="this.value = this.value.replace(/[^0-9.,]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo"$detailBoats[0]";?>" readonly><br />
                                    <b>Boats Name</b><br />
                                    <input type="text" name="bName" class="form-control" style="color:black" placeholder="Input Boats Name" value="<?php echo"$detailBoats[1]";?>"><br />
                                    <b>Boats Color</b><br />
                                    <input type="text" name="color" class="form-control" style="color:black" placeholder="Input Boats Color" value="<?php echo"$detailBoats[2]";?>"><br />
                                    
                                    <button type="submit" name="proses" class="btn btn-danger">Update Data Boats</button>
                                </form>
                                <?php
                        }
                        else
                        {
                            if(isset($_GET['delete']))
                            {
                                $delete=$_GET['delete'];
                                mysqli_query($conn,"Delete from boats where bid='$delete'");
                                ?>
                                <span class="badge bg-success">Horree. Data Is Successful Delete (Auto Refresh 3 Second)</span>
                                <meta http-equiv="refresh" content="5;url=boats.php">
                                
                                    <br /><br />
                                <?php
                            }

                            if(isset($_GET['add']))
                            {
                                ?>
                                <header class="panel-heading">
                                    Form Add Data Boats
                                </header>
                                <br />
                                <?php
                                if(isset($_GET['mssgInfo']))
                                {
                                    ?>
                                    <span class="badge bg-success">Horree. Data Is Successful Save (Auto Refresh 3 Second)</span>
                                    <meta http-equiv="refresh" content="5;url=boats.php">
                                    
                                        <br /><br />
                                    <?php
                                }

                                if(isset($_POST['proses']))
                                {
                                    $bId=$_POST['bId'];
                                    $bName=$_POST['bName'];
                                    $color=$_POST['color'];

                                    if(empty($bId) || empty($bName) || empty($color))
                                    {
                                        ?>
                                        <span class="badge bg-warning">Sorry. Data Cannot Be Processed. Because Data is Empty</span>
                                        
                                        <br /><br />
                                        <?php
                                    }
                                    else
                                    {
                                        $cekBId=mysqli_num_rows(mysqli_query($conn,"Select * from boats where bid='$bId'"));
                                        if($cekBId>0)
                                        {
                                            ?>
                                            <span class="badge bg-warning">Sorry. Boats Id Is Available</span>
                                            
                                            <br /><br />
                                            <?php
                                        }
                                        else
                                        {
                                            mysqli_query($conn,"Insert into boats set bid='$bId', bname='$bName', color='$color'");
                                            ?>
                                            <meta http-equiv="refresh" content="0;url=boats.php?add=ok&mssgInfo=success">
                                            <?php
                                        }
                                    }
                                }
                                ?>
                                <form method="POST" action="boats.php?add=ok">
                                    <b>Boats Id</b><br />
                                    <input type="text" name="bId" class="form-control" style="width:170px;color:black" min="1" max="10" placeholder="Input Boats Id" oninput="this.value = this.value.replace(/[^0-9.,]/g, '').replace(/(\..*)\./g, '$1');"><br />
                                    <b>Boats Name</b><br />
                                    <input type="text" name="bName" class="form-control" style="color:black" placeholder="Input Boats Name"><br />
                                    <b>Boats Color</b><br />
                                    <input type="text" name="color" class="form-control" style="color:black" placeholder="Input Boats Color" ><br />
                                    
                                    <button type="submit" name="proses" class="btn btn-danger">Add Data Boats</button>
                                </form>
                                <?php
                            }
                            else
                            {
                                ?> 
                                <header class="panel-heading">
                                    List Data Boats
                                </header>
                                <br />
                                <a href="boats.php?add=ok">
                                    <button class="btn btn-success">
                                        <i class="fa fa-plus"></i> Add Boats
                                    </button>
                                </a>
                                <hr />
                                <table class="table  table-hover general-table">
                                    <thead>
                                    <tr>
                                        <th> ID</th>
                                        <th> Boats Name</th>
                                        <th>Color</th>
                                        <th>Action</th>                                
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                        $viewAllBoats=mysqli_query($conn,"Select bid, bname, color from boats order by bid desc");
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
                                                <td>
                                                    <a href="boats.php?viewUpdate=<?php echo"$getViewBoats[0]";?>">
                                                        <button class="btn btn-info">
                                                            <i class="fa fa-edit"></i> Update
                                                        </button>
                                                    </a>
                                                    <a href="boats.php?delete=<?php echo"$getViewBoats[0]";?>">
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
