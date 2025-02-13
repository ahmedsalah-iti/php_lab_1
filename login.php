<style>
table, th, td {
  border:1px solid black;
}
</style>
<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include('cap.php');
include('add.php');
function isValidLen($pass){
    return strlen($pass) > 7;
}

function welcome($name,$gender,$username,$address,$dep,$skills){
    $lineData = "";
    $mr_miss = "Animal";
    $username = htmlspecialchars($username);
    $address= htmlspecialchars($address);
    $dep= htmlspecialchars($dep);
    if ($gender == 0){
        $mr_miss = "Mr";
    }else if ($gender == 1){
        $mr_miss = "Miss";
    }
    echo htmlspecialchars("Thanks $mr_miss. $name");
    echo "<br>Please Review Your Information<br>";
    echo "UserName: $username <br>";
    echo "Address: $address <br>";
    echo "Department: $dep <br>";
    myConcat($lineData,$mr_miss);
    myConcat($lineData,$name);
    myConcat($lineData,$username);
    myConcat($lineData,$address);
    myConcat($lineData,$dep);
    $lineDataSkills ="";
    if (is_array($skills)){
    echo "Skills:<br>";
    foreach($skills as $skill){
        $skill = htmlspecialchars($skill);
        echo "- $skill <br>";
        myConcat($lineDataSkills,$skill,"$$$");
    }
    }
    myConcat($lineData,$lineDataSkills);
    if (saveToFile($lineData)){
        echo '<h1>Data is Saved Successfuly</h1>';
        fileDataToHtmlTable();
    }else{
        echo '<h1>failed to save your data.</h1>';
    }
}
if ($_SERVER['REQUEST_METHOD'] === "POST"){


if(isset($_POST['fname'],$_POST['lname']) && !empty($_POST['fname']) && !empty($_POST['lname']))
{
    if(isset($_POST['address']) && !empty($_POST['address']) ){

        if(isset($_POST['country']) && !empty($_POST['country']) ){
            if(isset($_POST['user'],$_POST['pass']) && !empty($_POST['user'])  && !empty($_POST['pass']) ){
                if(isset($_POST['dep']) && $_POST['dep'] === 'OpenSource'){
                    if(isset($_POST['gender']) && is_numeric($_POST['gender'])){
                if (isValidLen($_POST['user']) && isValidLen($_POST['pass'])){
                        if(isset($_POST['cap']) && !empty($_POST['cap'])){
                            if (isValidCap($_POST['cap'])){
                                //print_r($_POST);
                                $fName = $_POST['fname'];
                                $lName = $_POST['lname'];
                                $gender = $_POST['gender'];
                                $fullName = $fName." ".$lName;
                                $user = $_POST['user'];
                                $address = $_POST['address'];
                                $dep = $_POST['dep'];
                                $skills = "";
                                if (isset($_POST['skills']) && !empty($_POST['skills']) && is_array($_POST['skills']) && count($_POST['skills']) > 0){
                                    $skills = $_POST['skills'];
                                }
                                welcome($fullName,$gender,$user,$address,$dep,$skills);
                            }else{
                                echo "[ERROR]: Wrong Captcha !";
                            }
                        }else{
                            echo "[ERROR]: You have to type the Captcha !";
                        }
                }else{
                    echo "[ERROR]: Your username/pass length should be 8 or more.";
                }
            }else{
                echo "[ERROR]: You have to choose gender";
            }
        }else{
            echo "[ERROR]: Sorry , only the OpenSource Dep is open.";
        }
            
            }else{
                echo "[ERROR]: Your username/pass shouldnt be empty.";
            }

        }else{
            echo "[ERROR]: You have to choose country";
        }

    }else{
        echo "[ERROR]: Your Address Shouldn't be empty";
    }
    
}else{
    echo "[ERROR]: Your Name Shouldn't be Empty";
}
}else{
    echo "[ERROR]: Method Not Supported.";
}
?>