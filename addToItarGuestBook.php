<?php
			
/* Generated by the CoffeeCup Web Editor - www.coffeecup.com */
			
/*
Description...
			
			
			
			
@created:           13/02/2015 - 08:49:43
@today:             13/02/2015
@project:           No Project
@path:              /Users/preety/Documents/addToItarGuestBook.php
			
@author:            Your name
@company:           Your company
@Copyright:         A copyright notice

@version:           $Revision:$
*/

include 'mySQLconnect.php';


$fullName = $_REQUEST['fullName'];
$country = $_REQUEST['country'];
$employerName = $_REQUEST['employerName'];
$jobTitle = $_REQUEST['jobTitle'];
$fullAddress = $_REQUEST['fullAddress'];
$DOBMonth = $_REQUEST['DOBMonth'];
$DOBDay = $_REQUEST['DOBDay'];
$DOBYear = $_REQUEST['DOBYear'];
$month_number = date("n",strtotime($DOBMonth));
$placeOfBirth = $_REQUEST['placeOfBirth'];
$passportNumber = $_REQUEST['passportNumber'];
$emailAddress = $_REQUEST['emailAddress'];
$tel = $_REQUEST['tel'];
$dayTime = $_REQUEST['dayTime'];
$date_of_birth = $DOBYear. "-". $month_number. "-". $DOBDay;


/*
echo $fullName;
echo $country;
echo $employerName;
echo $jobTitle;
echo $fullAddress;
echo $DOBMonth;
echo $DOBDay;
echo $DOBYear;
echo $placeOfBirth;
echo $passportNumber;
echo $emailAddress;
echo $tel;
echo $dayTime;
*/


$errors = array();

	
if(strlen(trim($fullName)) === 0) {
  array_push($errors, "Please enter your name."); 
}

if($country === "Select Country") {
  array_push($errors, "Please select your country.");	
}

if(strlen(trim($employerName)) === 0) {
  array_push($errors, "Please enter your employer's name.");
}

if(strlen(trim($jobTitle)) === 0) {
  array_push($errors, "Please enter your job title.");
}

if(strlen(trim($fullAddress)) === 0) {
  array_push($errors, "Please enter your full address.");
}

if($DOBMonth === " - Month - ") {
  array_push($errors, "Please select a month.");
}

if($DOBDay === " - Day - ") {
  array_push($errors, "Please select a day.");
}

if($DOBYear === " - Year - ") {
  array_push($errors, "Please select a year.");
}

if(strlen(trim($placeOfBirth)) === 0) {
  array_push($errors, "Please enter your place of birth.");
}

if(strlen(trim($passportNumber)) === 0) {
  array_push($errors, "Please enter your place of birth.");
}

if(strlen(trim($emailAddress)) === 0) {
  array_push($errors, "Please enter your email address.");
}

if (filter_var($emailAddress, FILTER_VALIDATE_EMAIL) == false) {
  array_push($errors, "Please enter a valid email address.");
}


if (strlen(trim($tel)) === 0) {
  array_push($errors, "Please enter a telephone number.");
}

if (ctype_digit($tel) == false) {
  array_push($errors, "Please enter numerical characters only.");
}

if (strlen(trim($tel)) !== 10) {
  array_push($errors, "Please enter a valid telephone number.");
}

$errorString = "";  
foreach($errors as $err) {
	 $errorString .= ("<li>" . $err . "</li>");
}

$output = <<<PAGE
<html>
<head>
<title>Add To ITAR Guest Book</title>
</head>
<body>
<h1>There are errors on this page</h1>
<ul>
{$errorString}
</ul>
</body>
</html>
PAGE;

if (count($errors) !== 0) {
   echo $output;
   exit;
}

//	Header("Location: http://localhost/FullStackProject/itarForm.php");

$insert = "INSERT into itarEntries (full_name, country, employer_name, job_title, full_address, date_of_birth, place_of_birth, passport, email_address, telephone, day_time) "
		. "VALUES ('{$fullName}', '{$country}', '{$employerName}', '{$jobTitle}', '{$fullAddress}', '{$date_of_birth}', '{$placeOfBirth}', '{$passportNumber}', '{$emailAddress}', '{$tel}', '{$dayTime}')";
echo $insert;

 if (!$result = $dbgb->query($insert))
{
	die("Insert Failed" . $dbgb->error);
}

echo "Entry inserted";




?>
