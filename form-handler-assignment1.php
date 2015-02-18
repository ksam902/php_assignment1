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
$emailAddress = "w0265131@nscc.ca";

$courseArray = [];
$file = "";
$shortName = "";

if (!empty($_POST)) {
    //handling text inputs
    if($_POST['fName'] !== " "){
        $fName = $_POST['fName'];
    }
    if($_POST['lName'] !== " "){
        $lName = $_POST['lName'];     
    }
    if($_POST['email'] !== " "){
        $email = $_POST['email'];     
    }
    if($_POST['dob'] !== " "){
        $dob = $_POST['dob'];     
    }
    //handling form selects
    //course 1 selection
    if(isset($_POST['course1'])) 
    {
       $course1 = $_POST['course1'];
       array_push($courseArray, $course1);
    }else{
        $course1 = "No Course Selected";
    }
    //course 2 selection
    if(isset($_POST['course2'])) 
    {
       $course2 = $_POST['course2'];
       array_push($courseArray, $course2);
    }else{
        $course2 = "No Course Selected";
    }    
    //course 3 selection
    if(isset($_POST['course3'])) 
    {
       $course3 = $_POST['course3'];
       array_push($courseArray, $course3);
    }else{
        $course3 = "No Course Selected";
    }
    //course 4 selection
    if(isset($_POST['course4'])) 
    {
       $course4 = $_POST['course4'];
       array_push($courseArray, $course4);
    }else{
        $course4 = "No Course Selected";
    }
    if (is_uploaded_file($_FILES['imageToUpload']['tmp_name'])) {
            $name = $_FILES['imageToUpload']['name'];
            // get mime type
            $mime = $_FILES['imageToUpload']['type'];
            if (isAllowedUpload($mime)) {                
                move_uploaded_file($_FILES['imageToUpload']['tmp_name'], PATH_IMAGES. $_FILES['imageToUpload']['name']);               
            }
    }
    //readCourse($courseArray);

    writeToFiles($courseArray, $fName, $lName);
}
function readCourse(){
    // $filename = "../../files/txt/$firstCourse";
    // $whattoread = @fopen($filename, "r") or die("Couldn't open file");
    // $file_contents = fread($whattoread, filesize($filename));
    // $new_file_contents = nl2br($file_contents);
    // $msgOne = "$new_file_contents";
    // fclose($whattoread);    
}
function writeToFiles($courseArray, $fName, $lName){
    $name = $fName." ".$lName[0].".";
    $course = "";

    foreach ($courseArray as $value) {
        switch ($value) {
            case "Accounting 11":
                $course = $value;
                echo $course . " ". $name;
                break;
            case "Biology 11":
                $course = $value;
                echo $course . " ". $name;
                break;
            case "Communications 12":
                $course = $value;
                echo $course . " ". $name;
                break;
            case "Digital Arts 11":
                $course = $value;
                echo $course . " ". $name;
                break;
            case "English 12":
                $course = $value;
                echo $course . " ". $name;
                break;
            case "French 11":
                $course = $value;
                echo $course . " ". $name;
                break;
            case "History 12":
                $course = $value;
                echo $course . " ". $name;
                break;
            case "Law 12":
                $course = $value;
                echo $course . " ". $name;
                break;
            case "Physical Education 10":
                $course = $value;
                echo $course . " ". $name;
                break;
            case "Robotics 11":
                $course = $value;
                echo $course . " ". $name;
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



    // $msg = "<html><body><table style='background: red; height: 800px; width: 800px;'><tr><td>";
    // $to = $emailAddress;
    // $subject = $fName . " " . $lName . "'s Survey Results";
    // $mailheaders = "From: High School Time Tracker Form";
    // mail($to, $subject, $msg, $mailheaders);

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
            <h4>Great! Thanks <strong><?php echo $fName; ?></strong> for responding to our survey!</h4>
            <p><strong>Student's Name : </strong><?php echo $fName . " " . $lName ?></p>
            <p><strong>Student's E-Mail Address : </strong><?php echo $email ?></p>
            <br/>
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
            <div id="imageUpload">
                <strong>Image Uploaded : </strong>
            </div>
            <div id="printButton">
                <input id="btnPrint" type="submit" name="submit" class="btn btn-default" value="Print">
            </div>       
        </div>
    </div>
</body>
</html>