<?php
// define constants
define('PATH_IMAGES', 'images/');
define('MIME_PNG', 'image/png');
define('MIME_JPG', 'image/jpeg');
//form variables
$fName = "";
$lName = "";
$email = "";
$dob = "";
$course1 = "";
$course2 = "";
$course3 = "";
$course4 = "";
$image = "";
$emailAddress = "w0265131@nscc.ca";
$fNameErr = $lNameErr = $emailErr = $dobErr = $course1Err = $course2Err = $course3Err = $course4Err = $imageErr="";

//holds post values for courses
$coursesEnrolled = [];
$courseArray = [];
$file = "";
$shortName = "";

    //handling text inputs - if input is not empty, assign corresponding variable to it. If it is empty, provide error message
    if($_POST['fName'] !== ""){
        $fName = $_POST['fName'];
    }else{
        $fNameErr = "Please Enter Your First Name.";
    }
    if($_POST['lName'] !== ""){
        $lName = $_POST['lName'];     
    }else{
        $lNameErr = "Please Enter Your Last Name.";
    }
    if($_POST['email'] !== ""){
        $email = $_POST['email'];     
    }else{
        $emailErr = "Please Enter Your Email.";
    }
    if($_POST['dob'] !== ""){
        //regular expression checking for date of birth YYYY-MM-DD format
        if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$_POST['dob'])){
            $dob = $_POST['dob']; 
        }else{
            $dobErr = "Please use YYYY-MM-DD format.";
        } 
    }else{
        $dobErr = "Please Enter Your Date of Birth.";
    }
    //handling form selects - if selected push it to the course array
    //course 1 selection
    if(isset($_POST['course1'])) 
    {
       $course1 = $_POST['course1'];
       array_push($courseArray, $course1);
    }else{
        $course1Err = "Please Choose a Course 1 Option.";
    }
    //course 2 selection
    if(isset($_POST['course2'])) 
    {
       $course2 = $_POST['course2'];
       array_push($courseArray, $course2);
    }else{
        $course2Err = "Please Choose a Course 2 Option.";
    }    
    //course 3 selection
    if(isset($_POST['course3'])) 
    {
       $course3 = $_POST['course3'];
       array_push($courseArray, $course3);
    }else{
        $course3Err = "Please Choose a Course 3 Option.";
    }
    //course 4 selection
    if(isset($_POST['course4'])) 
    {
       $course4 = $_POST['course4'];
       array_push($courseArray, $course4);
    }else{
        $course4Err = "Please Choose a Course 4 Option.";
    }
    //handle image upload
    if (is_uploaded_file($_FILES['imageToUpload']['tmp_name'])) {
            $name = $_FILES['imageToUpload']['name'];
            // get mime type
            $mime = $_FILES['imageToUpload']['type'];
            //check if image file is of the right type
            if (isAllowedUpload($mime)) {                
                move_uploaded_file($_FILES['imageToUpload']['tmp_name'], PATH_IMAGES. $_FILES['imageToUpload']['name']);               
            }else{
                $imageErr = "Please Upload a JPG or PNG Image.";
            }
    }else{
        $name = "default.jpg";
    }
    //check error variables, if one is not empty there is an error in the form and the user is redirected with the error message
    if ( $fNameErr !== "" || $lNameErr !== "" || $emailErr !== "" || $dobErr !== "" || $course1Err !== "" || $course2Err !== "" || $course3Err !== "" || $course4Err !== "" || $imageErr !== "") {
        header('Location: form-assignment1.php?firstNameError='.$fNameErr.'&lastNameError='.$lNameErr.'&emailError='.$emailErr.'&dobError='.$dobErr.'&course1Error='.$course1Err.'&course2Error='.$course2Err.'&course3Error='.$course3Err.'&course4Error='.$course4Err.'&imageError='.$imageErr.'');
        exit;
    }
    //if we make it this far, write to files 
        writeToFiles($courseArray, $fName, $lName);
        $coursesEnrolled = readCourses($courseArray, $coursesEnrolled);  

function readCourses($courseArray, $courses){
    foreach ($courseArray as $value) {
        $filename = "courses/$value";
        $whattoread = @fopen($filename, "r") or die("Couldn't open file");
        $file_contents = fread($whattoread, filesize($filename));
        $new_file_contents = nl2br($file_contents);
        $msgOne = "$new_file_contents";
        array_push($courses, $msgOne);  
        fclose($whattoread);   
    }  
    return $courses;
}
function writeToFiles($courseArray, $fName, $lName){
    $name = $fName." ".$lName[0].".";
    $course = "";

    foreach ($courseArray as $value) {
        switch ($value) {
            case "Accounting 11":
                $course = $value;
                //echo $course . " ". $name;
                break;
            case "Biology 11":
                $course = $value;
                //echo $course . " ". $name;
                break;
            case "Communications 12":
                $course = $value;
                //echo $course . " ". $name;
                break;
            case "Digital Arts 11":
                $course = $value;
                //echo $course . " ". $name;
                break;
            case "English 12":
                $course = $value;
                //echo $course . " ". $name;
                break;
            case "French 11":
                $course = $value;
                //echo $course . " ". $name;
                break;
            case "History 12":
                $course = $value;
                //echo $course . " ". $name;
                break;
            case "Law 12":
                $course = $value;
                //echo $course . " ". $name;
                break;
            case "Physical Education 10":
                $course = $value;
                //echo $course . " ". $name;
                break;
            case "Robotics 11":
                $course = $value;
                //echo $course . " ". $name;
                break;                                               
            default:
                echo "You did not choose a course!";
        }
            $file = fopen("courses/$course", "a") or die("Unable to open file!");
            fwrite($file, "\n".$name);
            fclose($file);
    }
}
function isAllowedUpload($mime) {   
    if (($mime == MIME_PNG) || ($mime == MIME_JPG)) {
        return true;
    } 
    return false;    
}
    //format and send both emails.
    $msg = "First Name : " . $fName . ".</br>";
    $msg .= "Last Name : " . $lName . ".</br>";
    $msg .= "Email : " . $email . ".</br>";
    $msg .= "D.O.B. : " . $dob . ".</br>";
    $msg .= "Course 1 : " . $course1 . ".</br>";
    $msg .= "Course 2 : " . $course2 . ".</br>";
    $msg .= "Course 3 : " . $course3 . ".</br>";
    $msg .= "Course 4 : " . $course4 . ".</br>";
    $to = $email;
    $mailheaders = "From: High School Course Registration";
    //email to student
    mail($to, $subject, $msg, $mailheaders);
    //email to administrator
    $to = $emailAddress;
    mail($to, $subject, $msg, $mailheaders);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP : Assignment 1</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="stylesheet.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/Javascript" src="form.js"></script>    
</head>
<body>
    <div class="jumbotron">
      <div class="container text-center">
        <h2>Confirmation <small>:  A Summary of Your Student Course Tracker</small></h2>
      </div>
    </div>    
    <div id="summary" class="container col-md-16">
        <div id="container">
            <div id="imgStudent">
                <?php
                    echo '<img src="http://nscc-php.local/assignment1/images/' . $name . '">';
                ?>
            </div> 
            <div>          
                <!-- <h4>Great! Thanks <strong><?php echo $fName; ?></strong> for responding to our survey!</h4> -->
                <p><strong>Student's Name : </strong><?php echo $fName . " " . $lName ?></p>
                <p><strong>Student's E-Mail Address : </strong><?php echo $email ?></p>
            </div>
            <h5>SUMMARY</h5>
            <div id="studentInfo">
                <h5>STUDENT INFO</h5>         
                <p><strong>First Name :</strong> <?php echo $fName; ?>.</p>
                <p><strong>Last Name :</strong> <?php echo $lName; ?>.</p>
                <p><strong>Email :</strong> <?php echo $email; ?>.</p>
                <p><strong>D.O.B. :</strong> <?php echo $dob; ?>.</p>
            </div>
            <div id="courseSelection">
                <h5>COURSE SELECTION</h5>
                <p><strong>Course 1 :</strong> <?php echo $course1; ?>.</p>
                <p><strong>Course 2 :</strong> <?php echo $course2; ?>.</p>
                <p><strong>Course 3 :</strong> <?php echo $course3; ?>.</p>
                <p><strong>Course 4 :</strong> <?php echo $course4; ?>.</p>
            </div>
            <div id="printButton">
                <input id="btnPrint" type="submit" name="submit" class="btn btn-default" value="Print">
            </div>       
        </div>
    </div>
    <?php
        for($i = 0; $i<count($coursesEnrolled); $i++) {
            echo    "<div class='container col-md-16 course'>
                        <div id='container'>
                            <div class='btnCourse'>
                                <h3><input type='submit' name='btnCourse' class='btn btn-default toggle-course' id='btnCourse$i' value='$courseArray[$i]'></h3>
                            </div>
                            <div class='course-content'>
                                $coursesEnrolled[$i]
                            </div>
                        </div>
                    </div>";    
        }
    ?>
</body>
</html>