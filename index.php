<?php
//adding the application details on database
include('includes/config.php');
if(isset($_POST['submit']))
{ 
    $full_name=$_POST['full_name'];
    $student_number=$_POST['student_number'];
    $sport_code=$_POST['sport_code'];
    $course=$_POST['course'];
    $address=$_POST['address'];
    $id_number=$_POST['id_number'];
    $phone_number=$_POST['phone_number'];
    $next_of_kin_name=$_POST['next_of_kin_name'];
    $next_of_kin_phone=$_POST['next_of_kin_phone'];
    $medical_condition=$_POST['medical_condition'];
    $medical_details=$_POST['medical_details'];
    $medical_aid_name=$_POST['medical_aid_name'];
    $medical_aid_number=$_POST['medical_aid_number'];
    $signed_date=$_POST['signed_date'];
    $signature=$_POST['signature'];
    $created_at=date('Y-m-d H:i:s', time());
    $updated_at=date('Y-m-d H:i:s', time());
        
    mysqli_query($conn,"INSERT INTO tblapp (full_name, student_number, sport_code, course, address, id_number, phone_number, next_of_kin_name,
     next_of_kin_phone, medical_condition, medical_details, medical_aid_name, medical_aid_number, signed_date, signature,
     created_at, updated_at) VALUES ('$full_name','$student_number','$sport_code','$course','$address','$id_number','$phone_number',
     '$next_of_kin_name','$next_of_kin_phone','$medical_condition','$medical_details','$medical_aid_name','$medical_aid_number','$signed_date','$signature',
     '$created_at','$updated_at')") or die(mysqli_error());
     echo "<script>window.location = 'thank_you.php'; </script>";
} 
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="vendors/images/logo.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/logo.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/logo.png">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title> SIM | FORM</title>
  </head>
  <style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
.flex-row {
    display: flex;
}
.wrapper {
    border: 1px solid #4b00ff;
    border-right: 0;
}
canvas#signature-pad {
    background: #fff;
    width: 100%;
    height: 100%;
    cursor: crosshair;
}
button#clear {
    height: 100%;
    background: #4b00ff;
    border: 1px solid transparent;
    color: #fff;
    font-weight: 600;
    cursor: pointer;
}
button#clear span {
    transform: rotate(90deg);
    display: block;
}
  </style>
  <body>
  <nav class="navbar navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="/sport_office_system/login.php">
        <i class="fa fa-sign-in text-light"> login</i>
    </a>
  </div>
</nav>
<br>
<form action="" method="POST">
<div class="card m-5 bg-light">
    <div class="card-body p-4">
    <table style="width: 100%;border-raduis:20%;">
    <thead>
        <tr>
            <th style="text-align: right;"><img src="vendors/images/logo.png">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <div class="h1" style="text-align: center;"><strong>SPORT DEPARTMENT</strong></div>
                <div class="h3" style="text-align: center;"><u>Sport &nbsp;Indemnity&nbsp;</u></div>
                <p><br></p>
                <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="inputPassword6" class="col-form-label">Name &amp; Surname:</label>
                        <input type="text" class="form-control" name="full_name" require="true" placeholder="Enter your name and surname">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="inputPassword6" class="col-form-label">Student Number:</label>
                        <input type="text" class="form-control" name="student_number" require="true" pattern="[0-9]{9}"  placeholder="Enter your student number">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="inputPassword6" class="col-form-label">Sport Code:</label>
                        <select class="form-select" aria-label="Default select example" name="sport_code" require="true"> 
                            <option selected>Select sport code</option>
                            <option value="Chess">Chess</option>
                            <option value="Table tennis">Table tennis</option>
                            <option value="Aerobics">Aerobics</option>
                            <option value="Boxing">Boxing</option>
                            <option value="Pool">Pool</option>
                            <option value="Ultimate Frisbee">Ultimate Frisbee</option>
                            <option value="Tennis">Tennis</option>
                            <option value="Handball">Handball</option>
                            <option value="Softball">Softball</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="inputPassword6" class="col-form-label">Instructional Program (Course):</label>
                        <input type="text" name="course"  class="form-control"  require="true" placeholder="Enter your course">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="inputPassword6" class="col-form-label">Address While Studying:</label>
                        <input type="text" name="address"  class="form-control"  require="true" placeholder="Enter your study address">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="inputPassword6" class="col-form-label">Identity Number:</label>
                        <input type="text" name="id_number"  class="form-control" placeholder="Enter your ID Number" pattern="[0-9]{13}"  require="true">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="inputPassword6" class="col-form-label">Contact Number:</label>
                        <input type="text" name="phone_number"  placeholder="Enter your phone number e.g 0811234567" pattern="[0-9]{10}"  class="form-control"  require="true">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="inputPassword6" class="col-form-label">Next of Kin (Name &amp; Surname):</label>
                        <input type="text" name="next_of_kin_name"  class="form-control" placeholder="Enter your next of kin full name"  require="true">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="inputPassword6" class="col-form-label">Next of Kin Contact Number:</label>
                        <input type="text" name="next_of_kin_phone"  class="form-control" placeholder="Enter your next of kin phone number e.g 0811234567" pattern="[0-9]{10}" require="true">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="inputPassword6" class="col-form-label">Medical Condition:</label>
                        <input type="text" name="medical_condition"  class="form-control" placeholder="Enter your medical condition">
                    </div>
                </div>
                <p><br></p>
                <p class="mt-2">Any pertinent information concerning your medical condition?</p>
                <div class="col-lg-7">
                    <div class="form-group">
                        <label for="inputPassword6" class="col-form-label">if so please give details:</label>
                        <input type="text" name="medical_details"  class="form-control" placeholder="Enter your details">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="inputPassword6" class="col-form-label">Medical Aid Name:</label>
                        <input type="text" name="medical_aid_name"  class="form-control" placeholder="Enter your medical aid name">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="inputPassword6" class="col-form-label">Medical Aid Number:</label>
                        <input type="text" name="medical_aid_number"  class="form-control" placeholder="Enter your medical aid number e.g 0811234567" pattern="[0-9]{10}">
                    </div>
                </div>
                <p><br></p>              
                <p>I hereby concert to my participation in all games and tournaments tours, trips, sporting excursions arranged by WSU and /or conducted under its authority.</p><br>
                <p>Whilst it is recognized that this institution will take every precaution to ensure the safety and well-being of its students. I hereby indemnify and hold blameless this institution, its staff, and other agents against all claims which may arise in consequence of death of or any injury sustained by myself during the course of such sporting event, from whatsoever nature attributed to this institution, save that liability shall not be excluded under indemnity for loss occasioned by a deliberate act of wilful misconduct attributed to the University.</p>
               <br>
                <p>I the event of me being injured I hereby authorize the University, its staff, and other agents to procure such medical treatment/surgery as may its/their absolute discretion be deemed necessary. I undertake to indemnity the University, its staff, and other agents from all medical and hospital costs occasioned thereby.</p>
                <p><br></p>   
                </div>
                <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label for="inputPassword6" class="col-form-label">Signed at East London, on :</label>
                </div>
                <div class="col-auto">
                    <input type="datetime-local" name="signed_date" require="true" class="form-control" aria-describedby="passwordHelpInline">
                </div>
                <!-- <p><br></p> -->
                <div class="col-auto"></div>
                <div class="col-auto">
                    <label for="inputPassword6" class="col-form-label">Signature:</label>
                </div>
                <input type="hidden" name="signature" id="signature">
                <div class="col-auto">
                        <div class="flex-row">
                            <div class="wrapper">
                                <canvas id="signature-pad" width="400" height="200"></canvas>
                            </div>
                            <div class="clear-btn">
                                <button id="clear"><span> Clear </span></button>
                            </div>
                        </div>
                </div>
                <p><br></p>
                <p><br></p>
                <div class="col-lg-6">
                    <div class="form-group">
                        <input type="submit" name="submit" id="save" class="btn btn-success" class="form-control">
                    </div>
                </div>
            </td>
        </tr>
    </tbody>
</table>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.3.5/signature_pad.min.js" integrity="sha512-kw/nRM/BMR2XGArXnOoxKOO5VBHLdITAW00aG8qK4zBzcLVZ4nzg7/oYCaoiwc8U9zrnsO9UHqpyljJ8+iqYiQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
       var canvas = document.getElementById("signature-pad");

       function resizeCanvas() {
           var ratio = Math.max(window.devicePixelRatio || 1, 1);
           canvas.width = canvas.offsetWidth * ratio;
           canvas.height = canvas.offsetHeight * ratio;
           canvas.getContext("2d").scale(ratio, ratio);
       }
       window.onresize = resizeCanvas;
       resizeCanvas();

       var signaturePad = new SignaturePad(canvas, {
        backgroundColor: 'rgb(250,250,250)'
       });

       document.getElementById("clear").addEventListener('click', function(){
        signaturePad.clear();
       })
document.getElementById("save").addEventListener("click", function() {

if (signaturePad.isEmpty()) {
    alert("Please provide signature first.");
} else {
document.getElementById("signature").value = signaturePad.toDataURL();
}
});
   </script>
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
