<?php
  session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
  body {font-family: Arial, Helvetica, sans-serif;}

  /* Full-width input fields */
  input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
  }

  /* Set a style for all buttons */
  button {
    background-color: #04AA6D;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
  }

  button:hover {
    opacity: 0.8;
  }

  /* Extra styles for the cancel button */
  .cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
  }

  /* Center the image and position the close button */
  .imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
  }

  img.avatar {
    width: 40%;
    border-radius: 50%;
  }

  .container {
    padding: 16px;
  }

  span.psw {
    float: right;
    padding-top: 16px;
  }

  /* The Modal (background) */
  .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
  }

  /* Modal Content/Box */
  .modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
  }

  /* The Close Button (x) */
  .close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
  }

  .close:hover,
  .close:focus {
    color: red;
    cursor: pointer;
  }

  /* Add Zoom Animation */
  .animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
  }

  @-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)}
    to {-webkit-transform: scale(1)}
  }

  @keyframes animatezoom {
    from {transform: scale(0)}
    to {transform: scale(1)}
  }

  /* Change styles for span and cancel button on extra small screens */
  @media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
  }
  </style>
  </head>
<body>

<center><h2>SEWA Sign-in</h2></center>

<center><button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Log In</button></center>
<center><button onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Sign Up</button></center>

<div id="id01" class="modal">

  <form class="modal-content animate" action="includes/login.inc.php" method="post">


    <div class="container">
      <label for="Phone Number"><b>Phone Number</b></label>
      <input type="text" placeholder="Enter Phone Number" name="phonenumber_login" required="">

      <button type="submit" name="submit1">Log In</button>

    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>

    </div>
  </form>
</div>

<center><?php
    if (isset($_GET["error"])) {
      if ($_GET["error"] == "emptyinput") {
        echo "<p>Fill In all fields</p>";
      }
      if ($_GET["error"] == "wrongLogin") {
        echo "<p>Incorrect Login</p>";
      }
      if ($_GET["error"] == "none_login") {
        echo "<p>You Have Logged In</p>";
      }
    }
 ?></center>

<div id="id02" class="modal">

  <form class="modal-content animate" action="includes/signup.inc.php" method="post">

    <div class="container">
      <label for="Phone Number"><b>Phone Number</b></label>
      <input type="text" placeholder="Enter Phone Number" name="phonenumber" required="">
      <label for="First Name"><b>Name</b></label>
      <input type="text" placeholder="Enter Name" name="name" required="">
      <label for="Address"><b>Email Address</b></label>
      <input type="text" placeholder="Enter Email Address" name="address" required="">


      <label>
          <div class="container" style="background-color:#FFFFFF">
            <input type="checkbox" checked="checked" name="tos" required>
                  <button type="button" onclick="document.getElementById('id03').style.display='block'" class="cancelbtn"><u>Terms of Service</u></button>

          </div>
      </label>

      <button type="submit" name="submit"><b>Sign Up<b></button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <center><button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button></center>

    </div>
  </form>
</div>
<center><?php
    if (isset($_GET["error"])) {
      if ($_GET["error"] == "emptyinput") {
        echo "<p>Fill In all fields</p>";
      }
      if ($_GET["error"] == "stmtfailed") {
        echo "<p>Something went wrong try again</p>";
      }
      if ($_GET["error"] == "phonenumbertaken") {
        echo "<p>Phone Number taken</p>";
      }
      if ($_GET["error"] == "usernametaken") {
        echo "<p>User name taken</p>";
      }
      if ($_GET["error"] == "none") {
        echo "<p>You have signed up</p>";
      }
    }
 ?></center>

 <div id="id03" class="modal">
   <form class="modal-content animate" action="includes/signup.inc.php" method="post">
     <center><p>Dear Client,</p></center>
     <p>Guarantee Fair Beauty Salon DBA SEWA or Em Lash Studio desire and goal is to make sure that you are fully satisfied with the products and services you receive, period. If for any reason you are dissatisfied with your service PRIOR to leaving the studio, please notify your professional and they will do their best to make it right. If you are still not satisfied PRIOR to leaving the studio, we will remove any products that were applied if applicable and you will not be charged.</p></center>
     <p>Fair Beauty Salon DBA SEWA or Em Lash Studio does not guarantee any product or service AFTER you leave our studio. Fair Beauty Salon DBA SEWA or Em Lash studio does not guarantee BROWS, EYELASH, WAXING, TINTING or any other service for ANY length of time. Fair Beauty Salon DBA SEWA or Em Lash Studio does not offer any free touch ups for any services, including but not limited to Lash services, or any studio services. Fair Beauty Salon DBA SEWA or Em Lash Studio will provide complimentary glue touch ups for Lash services at its sole discretion.</p>
     <p>Waiver: If you have sensitive skin or any known allergies, it is the recommendation of Fair Beauty Salon DBA SEWA or Em Lash Studio that you consult with your health care provider prior to having any services performed. Client assumes all responsibility for any adverse reaction to products or services rendered. Further, Client agrees to hold Fair Beauty Salon DBA SEWA or Em Lash Studio harmless for any such adverse reaction if it occurs.</p>
     <p>I understand that there are risks associated with having artificial eyelashes applied to and/or removed from my natural lashes. I understand that the eyelash extensions will be applied to the natural lash as determined by the technician so as not to create excessive weight on the natural eyelash thereby preserving the health, growth and natural look of the client’s natural eyelashes. ___ I understand that as part of the procedure, eye irritation, pain, itching discomfort and in rare cases eye infection may occur. ___ I understand and agree that if I experience any of these issues with my lashes I will contact my technician and have the eyelash extensions removed immediately and consult a physician at my own expense. ___ I understand that even though the technician may apply and remove the eyelash extensions properly, that adhesive material may become dislodged during or after the procedure, which may irritate my eyes or require further follow up care. ___ I understand and agree to follow the aftercare instructions provided by my technician. ___ Failure to follow the aftercare instructions may cause the eyelash extensions to fall out. ___ I understand that in order to have the eyelash extensions applied to my eyelashes I will need to keep my eyes closed for duration of 60-180 minutes during the procedure. I also understand that I will need to be lying in a reclined position. Any medical conditions that might be aggravated by lying still for a prolonged period of time may mean that I will not be able to have the procedure performed on my eyes. ___ This agreement will remain in e‑ect for this procedure and all future procedures conducted by my technician or any other technician conducting business at the salon/spa listed below. I understand that this agreement is binding and that I have read and fully understand all information above. I represent that I am over the age of 18 years.</p></center>
     <p>I release my technician or salon/spa from all liability associated with this procedure. There are no guarantees for the bonding time length of the eyelash extensions. Our company or salon is not responsible for any technician errors. I understand that I have been advised to follow the aftercare protocol from my technician so as to avoid any discomfort or adverse side effects after the procedure has been completed.</p>
     <p>Privacy Notice: Fair Beauty Salon DBA SEWA or Em Lash Studio does not share your information contained within your client profile with any 3rd party. If you have opted in to have text messages and or email alert notices sent to you, you consent to pay all charges you incur from your carrier and provider for these services. You may opt out any time by deselecting the text message check box and or by deleting your email address within your client profile.</p>
     <p>Fair Beauty Salon DBA SEWA or Em Lash Studio may conduct video surveillance of any portion of its portion of its premises at any time. the only exception being private areas of restrooms, showers, spa rooms, and dressing rooms, and the vide cameras will be positioned in appropriate places within and around studio and used in order to help promote the safety and security of people and property. I hereby give my consent to such video surveillance at any time the company may choose.</p>
     <p>I hereby release Fair Beauty Salon DBA SEWA or Em Lash Studio from all liability, including liability, for negligence, associated with the enforcement of these policies and or any searches or surveillance undertaken pursuant to these policies.</p>
    <div class="container" style="background-color:#f1f1f1">
       <center><button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Close</button></center>

   </div>
   </form>

 </div>

</body>
</html>
