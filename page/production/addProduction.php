<?php
session_start(); 
$_SESSION['page'] = "addproduction";
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
    ?>

    <div class="container my-4">
        <h2>Add a Production Report</h2>

        <form action="/employee/page/production/addProduction.php" method="post">

            <div class="row">
                <div class="mb-3 col-2">
                    <label for="title" class="form-label"> Machine no. :</label>
                    <select class="form-select" id="machineno" name="machineno" autofocus >
                        <?php
                
                            for ($i=1; $i <= 12  ; $i++) { 
                                echo '<option value="'. $i.'">'.$i.'</option>';
                            }

                        ?>
                    </select>
                </div>
                <div class="mb-3 col-6">
                    <label for="title" class="form-label"> NAME :</label>
                    <select class="form-select" id="name" name="name" autofocus>
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
                <div class="mb-3 col-4">
                    <label for="title" class="form-label">PRODUCTION :</label>
                    <input type="text" class="form-control" id="production" name="production"
                        aria-describedby="emailHelp">
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-3">
                    <label for="title" class="form-label"> duty :</label>
                    <select class="form-select" id="duty" name="duty" autofocus>
                        <option value="DAY">DAY</option>
                        <option value="NIGHT">NIGHT</option>

                    </select>
                </div>
                <div class="mb-3 col-3">
                    <label for="title" class="form-label">FRAME :</label>
                    <input type="text" class="amount form-control" id="frame" name="frame">
                </div>
                <div class="mb-3 col-3">
                    <label for="title" class="form-label">T.B. :</label>
                    <input type="text" class="disc form-control " id="tb" name="tb" aria-describedby="emailHelp">
                </div>
                <div class="mb-3 col-3">
                    <label for="title" class="form-label">Date :</label>
                    <input type="date" class="form-control" id="date" name="date" value='<?php echo date('Y-m-d');?>'>
                </div>
            </div>




            <div class="d-grid gap-2">
                <button class="btn btn-secondary btn-lg" type="submit" id="adddata" name="add">Add </button>
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
                    <th scope="col">function</th>
                </tr>
            </thead>
            <tbody>

                <?php
                    $date1 = date('Y-m-d');
                                        
                    $sno = 0;
                    $sql = "SELECT * FROM `production` WHERE date ='$date1'";
                    
                    $result = mysqli_query($conn,$sql);
                    // var_dump($sql);
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
                                <td><button id='.$row['sno'].' class="pedit btn btn-sm btn-success" >Edit</button> 
                                    <button id ='. $row['sno'].' class="delete btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            ';
                        } 
                       
                    }
                    
                   
                ?>
            </tbody>
        </table>



    </div>



    <hr>

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