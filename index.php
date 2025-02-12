<?php
include('cap.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab1 - Registeration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-6">
                <div class="card p-4 shadow-sm">
                    <h4 class="text-center mb-4">Registeration</h4>
                    <form action="login.php">
                        <div class="mb-3">
                            <label for="fname" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter your first name">
                        </div>
                        <div class="mb-3">
                            <label for="lname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter your last name">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter your Address"></textarea>
                        </div>
                        <div class="mb-3">
    <label for="country" class="form-label">Country</label>
    <select class="form-control" id="country" name="country">
        <option value="">Select your country</option>
        <option value="egypt">Egypt</option>
        <option value="usa">United States</option>
        <option value="uk">United Kingdom</option>
        <option value="germany">Germany</option>
        <option value="france">France</option>
        <option value="canada">Canada</option>
        <option value="australia">Australia</option>
    </select>
</div>
<div class="mb-3">
    <label class="form-label">Gender</label>
    <div>
        <input type="radio" id="male" name="gender" value="0">
        <label for="male">Male</label>
    </div>
    <div>
        <input type="radio" id="female" name="gender" value="1">
        <label for="female">Female</label>
    </div>
</div>





<div class="mb-3">
    <label class="form-label">Skills</label>
    <div>
        <input type="checkbox" id="html" name="skills[]" value="HTML">
        <label for="html">HTML</label>
    </div>
    <div>
        <input type="checkbox" id="css" name="skills[]" value="CSS">
        <label for="css">CSS</label>
    </div>
    <div>
        <input type="checkbox" id="javascript" name="skills[]" value="JavaScript">
        <label for="javascript">JavaScript</label>
    </div>
    <div>
        <input type="checkbox" id="python" name="skills[]" value="Python">
        <label for="python">Python</label>
    </div>
    <div>
        <input type="checkbox" id="cplus" name="skills[]" value="C++">
        <label for="cplus">C++</label>
    </div>
</div>


                        <div class="mb-3">
                            <label for="user" class="form-label">Username</label>
                            <input type="user" class="form-control" id="user" name="user" placeholder="Enter your username">
                        </div>
                        <div class="mb-3">
                            <label for="pass" class="form-label">Password</label>
                            <input type="pass" class="form-control" id="pass" name="pass" placeholder="Enter your username">
                        </div>
                        <div class="mb-3">
                            <label for="dep" class="form-label">Department</label>
                            <input type="dep" class="form-control" id="dep" name="dep" placeholder="OpenSource" value="OpenSource" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="cap" class="form-label">Please Insert The Captcha Code: <?php echo getCap();?></label>
                            <input type="cap" class="form-control" id="cap" name="cap" placeholder="Type Captcha Code Here.">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
