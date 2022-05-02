<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/home.php">Khodal Fashion</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php
            if ($_SESSION['page'] == "index" || $_SESSION['page'] == "register"  || $_SESSION['page'] == "about") {
              echo '<ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link
                  ';if ($_SESSION["page"] == "index") {
                    echo 'active';
                  }
                echo '" href="/index.php">Login</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link ';if ($_SESSION["page"] == "register") {
                    echo 'active';
                  }
                echo '" href="/register.php">Register</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/about.php">About</a>
                </li>
                </ul>
                ';
            }else {
              echo '
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle ';
                      if ($_SESSION["login"] == "user") {
                        echo 'disabled';
                      }
                     echo '" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Master
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/page/master/account.php">Account</a></li>
                        <li><a class="dropdown-item" href="#">Product</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                      </ul>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Transaction
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/page/transaction/addProduction.php">Production Entry</a></li>
                        <li><a class="dropdown-item" href="/page/transaction/adddhagacuting.php">Dhagacuting Entry</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                      </ul>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle ';
                      if ($_SESSION["login"] == "user") {
                        echo 'disabled';
                      }
                      echo '" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Ledger
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/page/ledger/report.php">Report</a></li>
                        <li><a class="dropdown-item" href="/page/ledger/dhagacutingReport.php">Dhagacuting Report</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                      </ul>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/logout.php">logout</a>
                    </li>
                  </ul>

                ';
            }
          
      ?>

            <div class="d-flex">

                <input class="form-control me-2" type="search" placeholder="<?php 
                if ($_SESSION['logout']) {
                   echo 'Search'; 
                } else {
                  echo $_SESSION['username'].'-(online)';
                }
                ?>
                " aria-label="Search">
                <button class="btn btn-outline-success me-2" type="submit">Search</button>
                <!-- <img src="photo/3.png" width="35" height="35" alt="error"> -->
                <?php
            if ($_SESSION['page'] == "account") {
              echo '<button class="accountadd btn btn-success me-2" type="button">Add</button>'; 
            }
            if ($_SESSION['page'] == "product") {
              echo '<button class="productadd btn btn-success me-2" type="button">Add</button>'; 
            }
            if ($_SESSION['logout'] == false) {
              echo '<button class="productadd btn btn-success me-2 " id="logout" type="button" onclick=logout()>Logout</button>'; 
            }
        ?>
            </div>
        </div>
    </div>
</nav>