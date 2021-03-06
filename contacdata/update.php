<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name = $positiona = $email = $phone = "";
$name_err = $positiona_err = $email_err = $phone_err = "";
 
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
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
  } else{
      $phone = $input_phone;
  }

    
    
    // Check input errors before inserting in database
    if(empty($linka_err) && empty($name_err)){
        // Prepare an update statement
        $sql = "UPDATE contac SET name=?, positiona=?, email=?, phone=?  WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssi",$param_name, $param_positiona, $param_email, $param_phone, $param_id);
            
            // Set parameters
            $param_name = $name;
            $param_positiona = $positiona;
            $param_email = $email;
            $param_phone = $phone;

            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
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
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM contac WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $name = $row["name"];
                    $positiona = $row["positiona"];
                    $email = $row["email"];
                    $phone = $row["phone"];
                   
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update เอกสาร</title>
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
                        <h2>Update เจ้าหน้าที่</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
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
                            <textarea name="email" class="form-control"><?php echo $email; ?></textarea>
                            <span class="help-block"><?php echo $email_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>">
                            <label>phone</label>
                            <textarea name="phone" class="form-control"><?php echo $phone; ?></textarea>
                            <span class="help-block"><?php echo $phone_err;?></span>
                        </div>
                  
                     

                       
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>