<?php
require 'includes/dbh.inc.php';
session_start();
if(isset($_SESSION['useruid'])){
  $name = $_SESSION['useruid'];
  $id = $_SESSION['userId'];
}
else{
  header("Location: login.html");
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>MySpace | Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="style.css">
</head>
<body>

    <header class="header-fixed">
      <div class="header-limiter">        
          <h1><a href="#">My<span>Space</span></a></h1>          
          <nav class="navback">
              <a href="#">Home</a>
              <a onclick="scrollWin()">Pricing</a>
              <a onclick="scrollWin()">Follow Us</a>
              <a href="includes/logout.inc.php" name="logout-submit">Logout</a>
          </nav>
      </div>
    </header>

    <div class="topnav">
      <a href="book.html">Book Now</a>
      <a href="#">Offers</a>
      <a href="#">Booking History</a>
      <a href="#">Ratings</a>
      <a id="userid" style="float:right ;cursor: context-menu;"></a>
      <a style="float: right; cursor: context-menu;">Welcome,</a>
    </div>

    <div class="row1">
      <div class="column">
        <div class="card2" onclick="location.href='#'">
          <div class="subcard">
              <img src="report.svg" style="height: 70px; margin-top: 32px;filter: invert()">
          </div>
          <a class="accountlabel">19</a>
          <p>Booking Count/History</p>
        </div>
      </div>

      <div class="column">
        <div class="card2" onclick="location.href='#'">
          <div class="subcard1">
              <img src="ticket.svg" style="height: 70px; margin-top: 32px;filter: invert()">
          </div>
          <a class="accountlabel">1</a>
          <p>Current Booking</p>
        </div>
      </div>
      
      <div class="column">
        <div class="card2" id="myBtn">
          <div class="subcard2">
              <img src="carcheck1.svg" style="height: 70px; margin-top: 30px;filter: invert() ">
          </div>
          <a class="accountlabel">
            <?php 
                  $sql = "SELECT * FROM vehicle_details WHERE vehicleUserId=$id";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                      $i=0;
                      while($row = $result->fetch_assoc()) {
                        $i++;
                      }
                      echo $i;
                  } else { echo 0; }
              ?>
            </a>
          <p>Add Vehicles</p>
        </div>
      </div>
      
      <div class="column">
        <div class="card2" id="myBtn1">
          <div class="subcard3">
            <img src="rupee.svg" style="height: 60px; margin-top: 35px; filter: invert()">
          </div>
          <a class="accountlabel"><?php
                      $sql = "SELECT accountBalance FROM account_details WHERE accountUserId=$id";
                      $result = $conn->query($sql);
                      $row = $result->fetch_assoc();
                      echo $row["accountBalance"];
                    ?></h5></a>
          <p>Manage Account</p>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="leftcolumn">
        <div class="card">
          <h2>EASY PARKING</h2>
          <h5>Automate Your Parking</h5>
          <div class="parkingintro" style="height:300px; background-color: rgb(255, 255, 255);">
              <div class="row1">
                <div class="column">
                  <div class="card3">
                    <img src="hand-cursor.svg" style="height: 60px; margin-top: 10%; ">
                    <p style="font-size: 18px; margin-top: 20%; color: rgb(0, 0, 0);">Select the cheapest, closest parking to your destination.</p>
                  </div>
                </div>
                <div class="column">
                    <div class="card3">
                      <img src="stopwatch.svg" style="height: 65px; margin-top: 10%;">
                      <p style="font-size: 18px; margin-top: 17.5%; color: rgb(0, 0, 0);">Set time period.</p>
                    </div>
                  </div>
                <div class="column">
                  <div class="card3">
                    <img src="credit-card.svg" style="height: 65px; margin-top: 10%;">
                    <p style="font-size: 18px; margin-top: 17.5%; color: rgb(0, 0, 0);">Get a guaranteed parking spot in advance with your credit card.</p>
                  </div>
                </div>
                <div class="column">
                  <div class="card3">
                    <img src="parked-car.svg" style="height: 80px; margin-top: 6%;">
                    <p style="font-size: 18px; margin-top: 15.8%; color: rgb(0, 0, 0);">Head to your destination and you'll find a spot waiting for you.</p>
                  </div>
                </div>
              </div>
          </div>
          <p style="color: rgb(75, 180, 5)">#easyparking</p>
        </div>
        <div class="card">
          <h2>PRICING</h2>
          <p>We always recommend that you pre-book for the best rates.</p>
          <div style="height:300px; background-color: rgb(255, 255, 255);">
            <div class="column">
              <div class="card3">
                <img src="bicycle.svg" style="height: 60px; margin-top: 10%;">
                <p style="font-size: 20px; margin-top: 20%; color: rgb(0, 0, 0);">Free</p>
              </div>
          </div>
          <div class="column">
              <div class="card3">
                <img src="motorcycle.svg" style="height: 60px; margin-top: 10%; ">
                <p style="font-size: 20px; margin-top: 20%; color: rgb(0, 0, 0);">&#8377 10/Hour</p>
                <p style="font-size: 14px;  color: rgb(0, 0, 0);">500 IND rupee every month</p>
                <h4 style="color: rgb(93, 211, 14)">Best Value</h4>
              </div>
          </div>
          <div class="column">
              <div class="card3">
                <img src="sedan.svg" style="height: 65px; margin-top: 10%;">
                <p style="font-size: 20px; margin-top: 17.5%; color: rgb(0, 0, 0);">&#8377 20/Hour</p>
                <p style="font-size: 14px;  color: rgb(0, 0, 0);">1000 IND rupee every month</p>
                <h4 style="color: rgb(93, 211, 14)">Best Value</h4>
              </div>
          </div>
          <div class="column">
              <div class="card3">
                <img src="jeep.svg" style="height: 80px; margin-top: 6%;">
                <p style="font-size: 20px; margin-top: 15.8%; color: rgb(0, 0, 0);">&#8377 25/Hour</p>
                <p style="font-size: 14px;  color: rgb(0, 0, 0);">1200 IND rupee every month</p>
              </div>
          </div>
        </div>
        <h5>* Terms and Conditions Apply</h5>
        <button class="btn_book" onclick="window.location.href = 'book.html';">Book Now</button>
        </div>
        <div class="card">
            <h2>MEMBERSHIP</h2>
            <p>Create your own limits. Gain acces to exciting offers.</p>
            <div style="height:300px; background-color: rgb(255, 255, 255);">
                <div class="column">
                  <div class="card3">
                    <img src="star.svg" style="height: 60px; margin-top: 10%;">
                    <h4 style="color: rgb(211, 76, 14)">Guest</h4>
                    <p style="font-size: 18px; margin-top: 20%; color: rgb(0, 0, 0);">Regular Charges</p>
                    <p style="font-size: 14px;  color: rgb(0, 0, 0);">200/500/1000/1200 IND rupee every month.</p>
                  </div>
              </div>
              <div class="column">
                  <div class="card3">
                    <img src="crown.svg" style="height: 60px; margin-top: 10%; ">
                    <h4 style="color: rgb(211, 76, 14)">Premium</h4>
                    <p style="font-size: 18px; margin-top: 20%; color: rgb(0, 0, 0);">&#8377 0 For 4 Hours Per Day *</p>
                    <p style="font-size: 14px;  color: rgb(0, 0, 0);">2000 IND rupee every month</p>
                    <h4 style="color: rgb(93, 211, 14)">Best Value</h4>
                  </div>
              </div>
              </div>
              <h5 style="margin-top: 5%;">* Regular charges after 4 hours per day for premium account.</h5>
              <button class="btn_book" id="myBtn2">Go Premium</button>
          </div>
      </div>
      <div class="rightcolumn">
        <div class="card">
          <h2>About Company</h2>
          <div class="fakeimg" style="height:100px; background-color: #ff4d4d"><h2 style="margin-top: 25px; font-size: 40px; color: white;">MySpace</h2></div>
          <p>MySpace is a new company that provides expertise in Parking Automation solutions and Parking Slot Booking to resolve its client's Parking Difficulties.</p>
        </div>
        <div class="card1">
          <h3>Parking Venues</h3>
          <div class="fakeimg"><p>Esquare</p></div>
          <div class="fakeimg"><p>Cinepolis</p></div>
          <div class="fakeimg"><p>PVR Cinemas</p></div>
          <div class="fakeimg"><p>Westend Mall</p></div>
          <div class="fakeimg"><p>Phoenix Market City</p></div>
          <div class="fakeimg"><p>Mangala</p></div>
          <div class="fakeimg"><p>INOX</p></div>
          <h5>* Check Availability</h5>
        </div>
        <div class="card">
          <h3>Follow Us</h3>
          <p>Some text..</p>
        </div>
        <div class="card">
            <h3>Qoutes</h3>
            <p>I'm a very firm believer in karma, and put it this way: I get a lot of good parking spots.</p>
            <p style="color: rgb(75, 180, 5)">- Cheers To MySpace.</p>
          </div>
      </div>
    </div>

                                      <!-- modal for manage account -->

    <div id="myModal1" class="modal1">
      <!-- Modal content -->
      <div class="modal-content1">
        <span class="close1">&times;</span>
        <div class="row">
          <div class="leftcolumn">
          <div class="card">
              <h4>Current Balance:  <?php
                      $sql = "SELECT accountBalance FROM account_details WHERE accountUserId=$id";
                      $result = $conn->query($sql);
                      $row = $result->fetch_assoc();
                      echo $row["accountBalance"];
                    ?>
                </h4>
              <div class="row">
                    <div class="col-20">
                      <label for="vno">Deposit Amount</label>
                    </div>
                    <div class="col-30">
                      <input type="number" id="vno" name="amount" placeholder="Enter amount.." required>
                      <button onclick="alertFunction()" style="border:none; padding: 12px 18px; background:#33cc33; float:right; border-radius:2px; color:white; font-weight:bold; margin-top:5px; cursor:pointer;">Add Funds</button>
                      <button onclick="alertFunction()" style="border:none; padding: 12px 18px; background:#33cc33; float:right; border-radius:2px; color:white; font-weight:bold; margin-top:5px; margin-right:5px; cursor:pointer;">Go Premium</button>
                    </div>
                  </div>
              
            </div>
            <div class="card">
              <h2>Transaction History</h2>
              <div class="fakeimg" style="height:250px; overflow-y:scroll;">
              <table id="myTable">
                  <thead>
                    <tr>
                      <th>Sr.No.</th>
                      <th>Date/Time</th>
                      <th>Amount</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $sql = "SELECT transactionDateTime, transactionAmount FROM transaction_details WHERE transactionUserId=$id";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                      // output data of each row
                          $i=1;
                          while($row = $result->fetch_assoc()) {
                            echo "<tr><td>" . $i. "</td><td>" . $row["transactionDateTime"] . "</td><td>". $row["transactionAmount"]. "</td></tr>";
                            $i++;
                          }
                          echo "</table>";
                      } else { echo "0 results"; }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>


          <div class="rightcolumn">
            <div class="card">
            <h4>Membership:</h4>
            <div class="column">
                  <div class="card3">
                    <img src="crown.svg" style="height: 60px; margin-top: 10%; ">
                    <h4 style="color: rgb(211, 76, 14)">Premium</h4>
                    <p style="font-size: 18px; margin-top: 20%; color: rgb(0, 0, 0);">&#8377 0 For 4 Hours Per Day *</p>
                    <p style="font-size: 14px;  color: rgb(0, 0, 0);">2000 IND rupee every month</p>
                    <h4 style="color: rgb(93, 211, 14)">Best Value</h4>
                  </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>

                                      <!-- modal for add vehicles -->

    <div id="myModal" class="modal">
      <!-- Modal content -->
      <div class="modal-content">
        <span class="close">&times;</span>
        <div class="row">
          <div class="leftcolumn">
            <div class="card">
              <h2>Register Vehicle</h2>
              <h5>Vehicle Details:</h5>
              <div class="fakeimg" style="height:250px;">
                <form action="includes/vehicles.inc.php" method="post">
                  <div class="row">
                    <div class="col-20">
                      <label for="vno">Vehicle Number</label>
                    </div>
                    <div class="col-30">
                      <input type="text" id="vno" name="vehicle_no" placeholder="Vehilce number including characters.." required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-20">
                      <label for="vehicle_type">Vehicle Type</label>
                    </div>
                    <div class="col-30">
                      <select id="country" name="vehicle_type" required>
                        <option value="">Select</option>
                        <option value="motorcycle">Motorcycle</option>
                        <option value="sedan">Sedan</option>
                        <option value="suv">SUV</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <input type="submit" name="submit_vehicle" id="submit_vehicle" value="Register Vehicle">
                  </div>
                  </form>
              </div>
              <h4>Note:</h4>
              <p>Please enter valid vehicle details.</p>
            </div>
          </div>


          <div class="rightcolumn">
            <div class="card">
              <h2>Registered Vehicles</h2>
              <h5>Maximum of 5 Vehicles are allowed.</h5>
              <div class="registered" style="height:300px;">
                <table id="myTable">
                  <thead>
                    <tr>
                      <th>Sr.No.</th>
                      <th>Vehicle Type</th>
                      <th>Vehicle No.</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $sql = "SELECT vehicleId, vehicleNo, vehicleType FROM vehicle_details WHERE vehicleUserId=$id";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                      // output data of each row
                          $i=1;
                          while($row = $result->fetch_assoc()) {
                            echo "<tr><td>" . $i. "</td><td>" . $row["vehicleType"] . "</td><td>". $row["vehicleNo"]. "</td></tr>";
                            $i++;
                          }
                          echo "</table>";
                      } else { echo "0 results"; }
                      
                    ?>
                  </tbody>
                </table>
              </div>
              <h5>Total - <?php 
                      $sql = "SELECT * FROM vehicle_details WHERE vehicleUserId=$id";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                          $i=0;
                          while($row = $result->fetch_assoc()) {
                            $i++;
                          }
                          echo $i;
                      } else { echo 0; }
                      $conn->close();
                  ?>
                /5</h5>
              </div>
            </div>
          </div>
        </div>
      </div>


    <div class="footer">
      <p>
        ©<i class="fa fa-heart"></i>2019
        <a target="_blank">MangoProduction</a>
      </p>
    </div>

</body>
                                  <!-- ajax script -->

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

                                  <!-- header script -->

            <script>
                $(document).ready(function(){
                    var showHeaderAt = 150;
                    var win = $(window),
                            body = $('body');
                    if(win.width() > 400){
                        win.on('scroll', function(e){
                            if(win.scrollTop() > showHeaderAt) {
                                body.addClass('fixed');
                            }
                            else {
                                body.removeClass('fixed');
                            }
                        });
                    }
                });
            </script>

                                  <!-- welcome user script -->

            <script>
                var val = "<?php echo $name ?>";
                document.getElementById('userid').innerHTML = val;
            </script>

                                  <!-- pricing/follow scroll -->

            <script>
              function scrollWin() {
                  window.scrollTo({ top: 550, behavior: 'smooth' });
              }
              function alertFunction(){
                alert("Payment APIs are not yet developed.");
              }
            </script>

                                  <!-- add vehicle modal script -->

            <script>
                var modal = document.getElementById("myModal");
                var btn = document.getElementById("myBtn");
                var span = document.getElementsByClassName("close")[0];

                btn.onclick = function() {
                  modal.style.display = "block";
                }

                span.onclick = function() {
                  modal.style.display = "none";
                }

                window.onclick = function(event) {
                  if (event.target == modal) {
                    modal.style.display = "none";
                  }
                }
              </script>

                                    <!-- manage account modal script -->

              <script>
                var modal1 = document.getElementById("myModal1");
                var btn1 = document.getElementById("myBtn1");
                var btn2 = document.getElementById("myBtn2");
                var span1 = document.getElementsByClassName("close1")[0];

                btn1.onclick = function() {
                  modal1.style.display = "block";
                }

                btn2.onclick = function() {
                  modal1.style.display = "block";
                }

                span1.onclick = function() {
                  modal1.style.display = "none";
                }

                window.onclick = function(event) {
                  if (event.target == modal1) {
                    modal1.style.display = "none";
                  }
                }
              </script>

</html>
