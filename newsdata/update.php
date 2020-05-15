<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$linka = $head = $post = $posta = "";
$linka_err = $head_err = $post_err  = $posta_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate linka
    $input_linka = trim($_POST["linka"]);
    if(empty($input_linka)){
        $linka_err = "Please enter an link.";     
    } else{
        $linka = $input_linka;
    }
    
    
    // Validate head
    $input_head = trim($_POST["head"]);
    if(empty($input_head)){
        $head_err = "Please enter an head.";     
    } else{
        $head = $input_head;
    }
    
    // Validate post
    $input_post = trim($_POST["post"]);
    if(empty($input_post)){
        $post_err = "Please enter an post.";     
    } else{
        $post = $input_post;
    }


    // Validate posta
    $input_posta = trim($_POST["posta"]);
    if(empty($input_posta)){
        $posta_err = "Please enter an posta.";     
    } else{
        $posta = $input_posta;
    }

    
    // Check input errors before inserting in database
    if(empty($linka_err) && empty($head_err) && empty($post_err)&& empty($posta_err)){
        // Prepare an update statement
        $sql = "UPDATE news SET linka=?, head=?, post=?, posta=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssi", $param_linka, $param_head, $param_post, $param_posta, $param_id);
            
            // Set parameters
            $param_linka = $linka;
            $param_head = $head;
            $param_post = $post;
            $param_posta = $posta;
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
        $sql = "SELECT * FROM news WHERE id = ?";
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
                    $linka = $row["linka"];
                    $head = $row["head"];
                    $post = $row["post"];
                    $posta = $row["posta"];
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
    <title>Update ข่าว/กิจกรรม</title>
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
                        <h2>Update ข่าว/กิจกรรม</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($linka_err)) ? 'has-error' : ''; ?>">
                            <label>link image</label>
                            <textarea name="linka" class="form-control"><?php echo $linka; ?></textarea>
                            <span class="help-block"><?php echo $linka_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($head_err)) ? 'has-error' : ''; ?>">
                            <label>head หัวข้อ</label>
                            <textarea name="head" class="form-control"><?php echo $head; ?></textarea>
                            <span class="help-block"><?php echo $head_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($post_err)) ? 'has-error' : ''; ?>">
                            <label>post หัวข้อ</label>
                            <textarea name="post" class="form-control"><?php echo $post; ?></textarea>
                            <span class="help-block"><?php echo $post_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($posta_err)) ? 'has-error' : ''; ?>">
                            <label>post เนื้อหา</label>
                            <textarea name="posta" class="form-control"><?php echo $posta; ?></textarea>
                            <span class="help-block"><?php echo $posta_err;?></span>
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