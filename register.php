
<?php  
    include 'functions/init.php';

    // $sql = "SELECT * FROM users";
    // $result = query($sql);
    // confirm($result);
    // $row = fetch_array($result);
    

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href="css/bootstrap.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" href="fonts/font-awesome-4.7.0/fonts/fontawesome-webfont.svg">
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/bootstrap.js"></script>

</head>
<body>
	<div class="container">
    <?php validate_user_registration();  ?>

    <br>
    <p class="text-center display-4">ALUMNI REGISTRATION FORM</p>
    <hr>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <header class="card-header">
                    <h4 class="card-title mt-2">Sign up</h4>
                </header>
                <article class="card-body">
                    <form action="" method="post">
                        <div class="form-row">
                            <div class="col form-group">
                                <label>Name </label>
                                <input type="text" class="form-control" placeholder="" name="Name" required>
                            </div>
                            <!-- form-group end.// -->
                            <div class="col form-group">
                                <label>Student Id</label>
                                <input type="text" class="form-control" placeholder="" name="Student_id" required>
                            </div>
                            <!-- form-group end.// -->
                        </div>
                        <!-- form-row end.// -->
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" class="form-control" placeholder="" name="Email" required>
                             <small class="form-text text-muted">We'll never share your email with anyone else.</small>

                            <label>Mobile</label>
                            <input type="mobile" class="form-control" placeholder="" name="Mobile" required>
                           
                        </div>
                        <!-- form-group end.// -->
                        <div class="form-group">
                            <label class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Gender" value="option1" required>
                                <span class="form-check-label"> Male </span>
                            </label>
                            <label class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Gender" value="option2" required>
                                <span class="form-check-label"> Female</span>
                            </label>
                        </div>
                        <!-- form-group end.// -->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>City</label>
                                <input type="text" class="form-control" name="City" required>
                            </div>
                            <!-- form-group end.// -->
                            <div class="form-group col-md-6">
                                <label>Blood Group</label>
                                <select id="inputState" class="form-control" name="Blood_group" >
                                    <option> Choose...</option>
                                    <option>AB+</option>
                                    <option>AB-</option>
                                    <option selected="">A+</option>
                                    <option>A-</option>
                                    <option>O+</option>
                                    <option>O-</option>
                                </select>
                            </div>
                            <!-- form-group end.// -->
                        </div>

                        <div class="form-row">
                            <div class="col form-group">
                                <label>Job Place </label>
                                <input type="text" class="form-control" placeholder="" name="Job_place" required>
                            </div>
                            <!-- form-group end.// -->
                            <div class="col form-group">
                                <label>Job Designation</label>
                                <input type="text" class="form-control" placeholder=" " name="Job_designation" required>
                            </div>
                            <!-- form-group end.// -->
                        </div>

                         <div class="form-group">
                                <label>Address</label>
                                <textarea id="comment" name="Address" cols="40" rows="5" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                                <label>Shift</label>
                                <select id="inputState" class="form-control" name="Shift" >
                                    <option> Choose...</option>
                                    <option selected="">1st</option>
                                    <option>2nd</option>
                                </select>
                        </div>

                        <!-- form-row.// -->
                        <div class="form-group">
                            <label>Create password</label>
                            <input class="form-control" type="password" name="Password" required>
                        </div>
                        <!-- form-group end.// -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block"> Register </button>
                        </div>
                        <!-- form-group// -->
                        <small class="text-muted">By clicking the 'Sign Up' button, you confirm that you accept our <br> Terms of use and Privacy Policy.</small>
                    </form>
                </article>
                <!-- card-body end .// -->
                <div class="border-top card-body text-center">Have an account? 
                    <a href="login.php" style="color: blue;text-decoration: none;">Log In</a>
                </div>
            </div>
            <!-- card.// -->
        </div>
        <!-- col.//-->

    </div>
    <!-- row.//-->

</div>
<!--container end.//-->

<br>
<br>
</body>
</html>

