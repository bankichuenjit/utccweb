<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$head = $linka = $linkb= $linkc= $linkd = $post =  "";
$head_err = $linka_err = $linkb_err  = $linkc_err = $linkd_err = $post_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
  // Validate head
  $input_head = trim($_POST["head"]);
  if(empty($input_head)){
      $head_err = "Please enter an head.";     
  } else{
      $head = $input_head;
  }
  
  // Validate linka
  $input_linka = trim($_POST["linka"]);
  if(empty($input_linka)){
      $linka_err = "Please enter an link.";     
  } else{
      $linka = $input_linka;
  }

   // Validate linkb
   $input_linkb = trim($_POST["linkb"]);
   if(empty($input_linkb)){
       $linkb_err = "Please enter an link.";     
   } else{
       $linkb = $input_linkb;
   }

    // Validate linkc
  $input_linkc = trim($_POST["linkc"]);
  if(empty($input_linkc)){
      $linkc_err = "Please enter an link.";     
  } else{
      $linkc = $input_linkc;
  }

   // Validate linkd
   $input_linkd = trim($_POST["linkd"]);
   if(empty($input_linkd)){
       $linkd_err = "Please enter an link.";     
   } else{
       $linkd = $input_linkd;
   }

  
  // Validate post
  $input_post = trim($_POST["post"]);
  if(empty($input_post)){
      $post_err = "Please enter an post.";     
  } else{
      $post = $input_post;
  }
    
    // Check input errors before inserting in database
    if(empty($head_err) && empty($linka_err) && empty($linkb_err) && empty($linkc_err) && empty($linkd_err) && empty($post_err)){
        // Prepare an update statement
        $sql = "UPDATE work SET head=?, linka=?, linkb=?, linkc=?, linkd=?, post=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssi", $param_head ,$param_linka ,$param_linkb ,$param_linkc ,$param_linkd, $param_post, $param_id);
            
           // Set parameters
           $param_head = $head;
           $param_linka = $linka;
           $param_linkb = $linkb;
           $param_linkc = $linkc;
           $param_linkd = $linkd;
           $param_post = $post;
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
        $sql = "SELECT * FROM work WHERE id = ?";
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
                    $head = $row["head"];
                    $linka = $row["linka"];
                    $linkb = $row["linkb"];
                    $linkc = $row["linkc"];
                    $linkd = $row["linkd"];
                    $post = $row["post"];
                  
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
    <title>Update ผลงานกองอาคารและสิ่งแวดล้อม</title>
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
                        <h2>Update ผลงานกองอาคารและสิ่งแวดล้อม</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                    <div class="form-group <?php echo (!empty($head_err)) ? 'has-error' : ''; ?>">
                            <label>หัวข้อผลงาน</label>
                            <textarea name="head" class="form-control"><?php echo $head; ?></textarea>
                            <span class="help-block"><?php echo $head_err;?></span>
                        </div>
                    <div class="form-group <?php echo (!empty($linka_err)) ? 'has-error' : ''; ?>">
                            <label>link image1</label>
                            <textarea name="linka" class="form-control"><?php echo $linka; ?></textarea>
                            <span class="help-block"><?php echo $linka_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($linkb_err)) ? 'has-error' : ''; ?>">
                            <label>link image2</label>
                            <textarea name="linkb" class="form-control"><?php echo $linkb; ?></textarea>
                            <span class="help-block"><?php echo $linkb_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($linkc_err)) ? 'has-error' : ''; ?>">
                            <label>link image3</label>
                            <textarea name="linkc" class="form-control"><?php echo $linkc; ?></textarea>
                            <span class="help-block"><?php echo $linkc_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($linkd_err)) ? 'has-error' : ''; ?>">
                            <label>link image4</label>
                            <textarea name="linkd" class="form-control"><?php echo $linkd; ?></textarea>
                            <span class="help-block"><?php echo $linkd_err;?></span>
                        </div>
                      
                        <div class="form-group <?php echo (!empty($post_err)) ? 'has-error' : ''; ?>">
                            <label>post เนื้อหา</label>
                            <textarea name="post" class="form-control"><?php echo $post; ?></textarea>
                            <span class="help-block"><?php echo $post_err;?></span>
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