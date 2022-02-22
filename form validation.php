<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form validation</title>
</head>
<body>
<?php
$nameErr = $emailErr = $genderErr = $businessErr =$websiteErr= "";
$name = $email = $gender  = $business = $comment = $website= "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (empty($_POST["name"])){
        $nameErr = "Name is required";
    }else{
        $name = test_input ($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-']*$/",$name)) {
            $nameErr = "Only letters and whitespace allowed";
        }
    }
    if (empty($_POST["email"])){
        $emailErr = "Email is required";
    }else{
        $email = test_input($_POST["email"]);
        if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }
    if (empty($_POST["Business"])) {
        $businessErr = "Business idea is required";
    }else {
        $business = test_input($_POST["business"]);
    }
    if (empty($_POST["website"])){
        $website = "";
    }else{
        $website = test_input($_POST["website"]);
        //check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    }
    if (empty($_POST["comment"])) {
        $comment = "";
    }else{
        $comment = test_input($_POST["comment"]);
    }
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    }else{
        $gender = test_input($_POST["gender"]);
    }
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<h2>Business Registration Form</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);
?>">
    Name: <input type="text" name="name">;
    <span class="error">* <?php echo $nameErr;?></span>
    <br><br>
    Email: <input type="text" name="email">
    <span class="error">* <?php echo $emailErr;?></span>
    <br><br>
    Business Idea: <input type="text" name="business">;
    <span class="error">* <?php echo $businessErr;?></span>
    <br><br>
    Website: <input type="text" name="website">;
    <span class="error">* <?php echo $websiteErr;?></span>
    <br><br>
    Comment: <textarea name="comment" rows="5" cols="40"></textarea>
    <br><br>
    Gender: <input type="radio" name="gender"value="Male">Male
    <input type="radio"id="gender"value="Female">Female
    <input type="radio"id="gender"value="Other">Other
    <span class="error">* <?php echo $genderErr;?></span>
    <br><br>
    <input type="submit" name="submit"value="Submit">
</form>

<?php
echo "<h2>Your Input</h2>>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $business;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;

?>
</body>
</html>
 