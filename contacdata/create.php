<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name = $positiona = $email = $phone = "";
$name_err = $positiona_err = $email_err = $phone_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter an name.";     
    } else{
        $name = $input_name;
    }
    
     // Validate positiona
     $input_positiona = trim($_POST["positiona"]);
     if(empty($input_positiona)){
         $positiona_err = "Please enter an positiona.";     
     } else{
         $positiona = $input_positiona;
     }

      // Validate email
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter an email.";     
    } else{
        $email = $input_email;
    }
         // Validate phone
         $input_phone = trim($_POST["phone"]);
         if(empty($input_phone)){
             $phone_err = "Please enter an phone.";     
            } elseif(!filter_var($input_phone, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9]+$/")))){
                $phone_err = "กรุณากรอกเบอร์มือถือ";
            } else{
                $phone = $input_phone;
            }


    // Check input errors before inserting in database
    if(empty($name_err) && empty($position_err) ){
        // Prepare an insert statement
        $sql = "INSERT INTO contac (name, positiona, email, phone) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_name, $param_positiona, $param_email, $param_phone);
            
            // Set parameters
            $param_name = $name;
            $param_positiona = $positiona;
            $param_email = $email;
            $param_phone = $phone;
      
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>เพิ่มเจ้าหน้าที่</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>เพิ่มเจ้าหน้าที่</h2>
                    </div>
                    <p>Please fill this form and submit to add เจ้าหน้าที่ record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                  
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>ชื่อ-นามสกุล</label>
                            <textarea name="name" class="form-control"><?php echo $name; ?></textarea>
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        
                        <div class="form-group <?php echo (!empty($positiona_err)) ? 'has-error' : ''; ?>">
                            <label>ตำแหน่ง</label>
                            <textarea name="positiona" class="form-control"><?php echo $positiona; ?></textarea>
                            <span class="help-block"><?php echo $positiona_err;?></span>
                        </div>
                        
                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>email</label>
                            <textarea type="email" id="email" name="email" class="form-control"><?php echo $email; ?></textarea>
                            <span class="help-block"><?php echo $email_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>">
                            <label>phone</label>
                            <textarea name="phone" class="form-control" maxlength="10"><?php echo $phone; ?></textarea>
                            <span class="help-block"><?php echo $phone_err;?></span>
                        </div>
                  
                  


                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>