<?php
session_start(); 
$_SESSION['page'] = "report";
include "../../functionality/conn.php";
include "../../functionality/productionCrud.php";

?>


<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">


    <title>Account - Project</title>

</head>

<body>

    <?php 
    // include "component/purchaseModal.php";
    include "../../component/addProductionModal.php";
    include "../../component/navbar.php";
    // include "../../component/alert.php";

    if (isset($_POST["search"])) {
        $_SESSION['duty'] = $_POST["duty"];
        $_SESSION['machineno'] = $_POST["machineno"];
        $_SESSION["date1"] = $_POST["date1"];
        $_SESSION["date2"] = $_POST["date2"];
        $_SESSION["name"] = $_POST["name"];
    }
    $_SESSION['duty'] = isset($_SESSION['duty'])?$_SESSION['duty']:'DAY';
    $_SESSION["date1"] =isset($_SESSION['date1'])?$_SESSION['date1']: date("Y-m-d", strtotime ( '-1 month' , strtotime (date('Y-m-d') ) ));
    $_SESSION["date2"] = isset($_SESSION['date2'])?$_SESSION['date2']: date('Y-m-d');
    $_SESSION["machineno"] = isset($_SESSION['machineno'])?$_SESSION['machineno']: 'All';
    $_SESSION["name"] = isset($_SESSION['name'])?$_SESSION['name']: 'All';
    $_SESSION["eTotal"] = isset($_SESSION['eTotal'])?$_SESSION['eTotal']: 0;
    ?>

    <div class="container my-4">
        <h2>Add a Production Report</h2>

        <form action="/employee/page/ledger/report.php" method="post">

            <div class="row">
                <div class="mb-3 col-2">
                    <label for="title" class="form-label"> Machine no. :</label>
                    <select class="form-select" id="machineno" name="machineno" >
                        <option value="All">All</option>
                        <?php
                
                            for ($i=1; $i <= 12  ; $i++) { 
                                echo '<option value="'. $i.'" >'.$i.'</option>';
                            }

                        ?>
                    </select>
                </div>
                <div class="mb-3 col-2">
                    <label for="title" class="form-label"> Name :</label>
                    <select class="form-select" id="name" name="name" autofocus>
                    <option value="All">All</option>
                        <?php
                            $sql = 'SELECT * FROM `account`';
                            $result = mysqli_query($conn,$sql);
                            $gst = '';
                            // $row = mysqli_fetch_array($result);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="'. $row["name"].'">'.$row["name"].'</option>';
                            }

                        ?>
                    </select>
                </div>
                <div class="mb-3 col-2">
                    <label for="title" class="form-label"> Duty :</label>
                    <select class="form-select" id="duty" name="duty" >
                        <option value="DAY" <?php echo $_SESSION['duty']=='DAY'?'selected':''; ?>>DAY</option>
                        <option value="NIGHT" <?php echo $_SESSION['duty']=='NIGHT'?'selected':''; ?>>NIGHT</option>
                    </select>
                </div>
                <div class="mb-3 col-3 ">
                    <label for="title" class="form-label">Start Date :</label>
                    <input type="date" class="amount form-control" id="date1" name="date1" value='<?php
                        $date = $_SESSION["date1"]?$_SESSION["date1"]:date("Y-m-d", strtotime ( '-1 month' , strtotime (date('Y-m-d') ) )) ;
                        echo $date;?>'>
                </div>
                <div class="mb-3 col-3">
                    <label for="title" class="form-label">End Date :</label>
                    <input type="date" class="disc form-control " id="date2" name="date2"
                        value='<?php echo  $_SESSION["date2"];?>'>
                </div>
            </div>

            <div class="d-grid gap-2">
                <button class="btn btn-secondary btn-lg" type="submit" id="search" name="search">search </button>
            </div>
        </form>
    </div>

    <hr>

    <div class="container my-4">

        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">Machine No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Production</th>
                    <th scope="col">duty</th>
                    <th scope="col">Frame</th>
                    <th scope="col">T.B.</th>
                    <th scope="col">Date</th>
                    <th scope="col">salary</th>
                    <th scope="col">function</th>
                </tr>
            </thead>
            <tbody>

                <?php

                if (isset($_POST["search"])) {
                   
                    $date1 =  $_POST["date1"];
                    $date2 =  $_POST["date2"];
                    $duty = $_POST["duty"];
                    $machineno = $_POST["machineno"];                   
                    $name = $_POST["name"];  
                    // var_dump($machineno);                 
                    // var_dump($name);                 
                    $sno = 0;
                    if ($machineno == 'All' && $name == 'All' ) {
                        $sql = "SELECT * FROM `production` WHERE date >='$date1' AND date <='$date2' AND duty ='$duty'  ORDER BY `production`.`date` ASC";
                    }elseif ($machineno == 'All') {
                        $sql = "SELECT * FROM `production` WHERE date >='$date1' AND date <='$date2' AND duty ='$duty' AND name='$name'  ORDER BY `production`.`date` ASC";
                    }
                    else {
                        
                        $sql = "SELECT * FROM `production` WHERE date >='$date1' AND date <='$date2' AND duty='$duty' AND machineno='$machineno' AND name='$name'  ORDER BY `production`.`date` ASC";
                    }
                    
                    // var_dump($sql);
                    $result = mysqli_query($conn,$sql);
                    
                    if ($result) {
                        # code...
                        while ($row = mysqli_fetch_assoc($result)) {
                            $sno += 1;
                            echo '
                            <tr>       
                                <td> '. $row['machineno'] .'</td>
                                <td> '. $row['name'] .'</td>
                                <td> '. $row['production'] .'</td>
                                <td> '. $row['duty'] .'</td>
                                <td> '. $row['frame'] .'</td>
                                <td> '. $row['tb'] .'</td>
                                <td> '. $row['date'] .'</td>
                                <td> '. $row['total'] .'</td>
                                <td><button id='.$row['sno'].' class="pedit btn btn-sm btn-success" >Edit</button> 
                                    <button id ='. $row['sno'].' class="delete btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            ';
                        } 
                       
                    }
                }else {
                    $date1 =  $_SESSION["date1"];
                    $date2 =  $_SESSION["date2"];
                    $duty = $_SESSION["duty"];
                    $machineno = $_SESSION["machineno"]; 
                    $name = $_SESSION["name"];                   
                    $sno = 0;
                    if ($machineno == 'All' && $name == 'All') {
                        $sql = "SELECT * FROM `production` WHERE date >='$date1' AND date <='$date2' AND duty='$duty'  ORDER BY `production`.`date` ASC";
                    }elseif ($machineno == 'All') {
                        $sql = "SELECT * FROM `production` WHERE date >='$date1' AND date <='$date2' AND duty ='$duty' AND name='$name'  ORDER BY `production`.`date` ASC";
                    }
                    else {
                        
                        $sql = "SELECT * FROM `production` WHERE date >='$date1' AND date <='$date2' AND duty='$duty' AND machineno='$machineno' AND name='$name'  ORDER BY `production`.`date` ASC";
                    }
                    
                    // var_dump($sql);
                    $result = mysqli_query($conn,$sql);
                    // var_dump( $row['partyname']);
                    
                    if ($result) {
                        # code...
                        while ($row = mysqli_fetch_assoc($result)) {
                            $sno += 1;
                            echo '
                            <tr>       
                                <td> '. $row['machineno'] .'</td>
                                <td> '. $row['name'] .'</td>
                                <td> '. $row['production'] .'</td>
                                <td> '. $row['duty'] .'</td>
                                <td> '. $row['frame'] .'</td>
                                <td> '. $row['tb'] .'</td>
                                <td> '. $row['date'] .'</td>
                                <td> '. $row['total'] .'</td>
                                <td><button id='.$row['sno'].' class="pedit btn btn-sm btn-success" >Edit</button> 
                                    <button id ='. $row['sno'].' class="delete btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            ';
                        } 
                       
                    }
                }          
                   
                ?>
            </tbody>
        </table>



    </div>



    <hr>


    <?php 
        
        if (isset($_POST['esearch'])) {

            if ($_POST["name"]==null || $_POST["name"]=='') {
                # code...
                $_SESSION["name"] = 'All';
                $date1 = $_SESSION["date1"];
                $date2 = $_SESSION["date2"];
                $duty = $_SESSION["duty"];
                
                $sql = "SELECT SUM(total) FROM `production` WHERE date>='$date1' AND date<='$date2' AND duty='$duty'  ORDER BY `production`.`date` ASC";
                // echo $sql;
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);
                // var_dump($row);
                $_SESSION['eTotal'] = $row['SUM(total)'];
          
            }else {
                $name =  $_POST['name'];
                $_SESSION["name"] =  $_POST['name'];
                $date1 = $_SESSION["date1"];
                $date2 = $_SESSION["date2"];
                $duty = $_SESSION['duty'];
                $sql = "";
                // var_dump($_SESSION["date1"]);
                // var_dump($_SESSION["date2"]);
                if ($_POST['name']=='All') {
                    $sql = "SELECT SUM(total) FROM `production` WHERE date>='$date1' AND date<='$date2' AND duty='$duty'  ORDER BY `production`.`date` ASC";
                   
                }else { 
                    $sql = "SELECT SUM(total) FROM `production` WHERE date>='$date1' AND date<='$date2' AND name='$name'  ORDER BY `production`.`date` ASC";
                }
                // var_dump($sql);
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);
                 
                $_SESSION['eTotal'] = $row['SUM(total)'];
            }
        }
    ?>
    <div class="container">
        <h5>Check Amount</h5>
        <div class="row my-2 ">
            <form action="/employee/page/ledger/report.php" method="post">
                <div class="mb-3 col-4">
                    <label for="title" class="form-label">Employee Name :</label><br>


                    <select class="form-select" id="name" name="name" autofocus>
                        <option value="All" <?php  echo $_SESSION["name"] == "All" ? "selected" : ""; ?>>All
                        </option>

                        <?php
                            $sql = 'SELECT * FROM `account`';
                            $result = mysqli_query($conn,$sql);
                           
                           
                            while ($row = mysqli_fetch_assoc($result)) {
                              
                              
                        ?>
                        <option value="<?php echo $row["name"] ?>"
                            <?php echo $_SESSION["name"] == $row["name"] ? "selected" : null; ?>>
                            <?php echo $row["name"] ?>
                        </option>

                        <?php          
                            }
                        ?>
                    </select>

                </div>

                <div class="mb-3 col-4">
                    <label for="title" class="form-label">Total balance :</label>
                    <input type="number" class="balance form-control " id="balance" name="balance"
                        value='<?php echo round($_SESSION['eTotal'], 2) ;?>'>
                </div>

                <button class=" btn btn-secondary btn-lg-sm " name="esearch" type="submit">
                    search
                </button>
            </form>


        </div>


    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();

    });
    </script>
    <script src="../../myscript.js"></script>

</body>

</html>