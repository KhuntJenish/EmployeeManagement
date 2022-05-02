<?php
session_start(); 
$_SESSION['page'] = "account";
include "../../functionality/conn.php";
if ($_SESSION['logout'] == true) {
    header("location: login.php");
}  
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

    <title>account panal</title>
</head>

<body>
    <?php 
        include "../../component/navbar.php";
        include "../../component/accountModal.php";
        include "../../functionality/accountCrud.php";

    ?>
   
   <div class="container">

       <div class="row my-3">

       <?php 
            $sql = 'SELECT * FROM `account`';
            $result  = mysqli_query($conn,$sql);
            // $row = mysqli_fetch_assoc($result);
            // var_dump($row);

            while ($row = mysqli_fetch_assoc($result)) {
                // echo $row['pname'];
                echo ' 
                 <div class="card m-2 col-4" style="width: 18rem;">
                    <div class="card-body">
                        
                        <h5 class="card-title">'.$row['name'].'</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Mobile No : '.$row['mobile'].'</h6>
                        <p class="card-text"  style="margin-bottom: 0.5rem;">Category : <span>'.$row['category'].'</span></p>
                        <p class="card-text"  style="margin-bottom: 0.5rem;"">Adhar : <span>'.$row['adhar'].'</span></p>
                        <button type="button" class="edit btn btn-success" id="'.$row['sno'].'">edit</button>
                        <button type="submit" class="delete btn btn-danger" name="'.$row['sno'].'">delete</button>
                        
                        
                    </div>
                 </div> 
            ';
            }
       ?>
    
         
       </div>
   </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
   

    // edit button click sale modalevent
    aedits = document.getElementsByClassName("edit");
    Array.from(aedits).forEach((element) => {
        element.addEventListener("click", (e) => {
                const btn = document.getElementById("account");
                btn.innerText = 'update';
                btn.name = 'update';
                pname = btn.parentNode.parentNode.childNodes[1].childNodes[1].childNodes[1].childNodes[3];
                adhar = btn.parentNode.parentNode.childNodes[1].childNodes[1].childNodes[3].childNodes[3];
                category = btn.parentNode.parentNode.childNodes[1].childNodes[1].childNodes[5].childNodes[3];
                mobile = btn.parentNode.parentNode.childNodes[1].childNodes[1].childNodes[7].childNodes[3];
                sno = btn.parentNode.parentNode.childNodes[1].childNodes[1].childNodes[7].childNodes[5];
                console.log( btn.parentNode.parentNode.childNodes[1].childNodes[1].childNodes[7]);
                //Fillup value in modal    
                // panme
                pname.value = e.target.parentNode.childNodes[1].innerText;
                // // adhar
                adhar.value =  e.target.parentNode.childNodes[7].childNodes[1].innerText;
                
                // // category
                category.value = e.target.parentNode.childNodes[5].childNodes[1].innerText;
                
                console.log(e.target.parentNode.childNodes[7].childNodes[1].innerText);
                // // mobile
                no = e.target.parentNode.childNodes[3].innerText;
                mobile.value =no.split(" ")[3];
                
                // // address
                // aline1.value = e.target.parentNode.childNodes[5].childNodes[0].innerText; 
                // aline2.value = e.target.parentNode.childNodes[5].childNodes[2].innerText; 
                // city.value = e.target.parentNode.childNodes[5].childNodes[4].innerText; 
                // pincode.value = e.target.parentNode.childNodes[5].childNodes[6].innerText; 
                // state_Country.value = e.target.parentNode.childNodes[5].childNodes[8].innerText; 
                
                sno.value = e.target.id;
             
            
                console.log("edit");
                $("#accountModal").modal({
                    show: false,
                    keyboard: false,
                    backdrop: "static",
                });
                $("#accountModal").modal("show");
                console.log("edit");
            })
    });        
    
    // edit button click sale modalevent
    aadd = document.getElementsByClassName("accountadd");
    Array.from(aadd).forEach((element) => {
        element.addEventListener("click", (e) => {
            const btn = document.getElementById("account");
            btn.innerText = 'add';
            btn.name = 'add';
            console.log(btn);
                console.log("edit");
                $("#accountModal").modal({
                    show: false,
                    keyboard: false,
                    backdrop: "static",
                });
                $("#accountModal").modal("show");
                console.log("edit");
            })
    });
     
    // delete button click event
    adelete = document.getElementsByClassName("delete");
    Array.from(adelete).forEach((element) => {
        element.addEventListener("click", (e) => {
            sno = e.target.name;
            console.log(sno);
            if (confirm("Are you sure delete this Notes!")) {
                console.log("yes");
                window.location = `/page/master/account.php?delete=${sno}`;
            } else {
                console.log("no");
            }
        });
    });

    function reload() {
        // window.location = `/account/index.php?delete=${sno}`;
        location.reload();
        console.log('reload');
    }
   
    </script>
</body>

</html>



