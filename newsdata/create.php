<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$linka = $head = $post = $posta = "";
$linka_err = $head_err = $post_err  = $posta_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
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
        // Prepare an insert statement
        $sql = "INSERT INTO news (linka, head, post, posta) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_linka, $param_head, $param_post, $param_posta);
            
            // Set parameters
            $param_linka = $linka;
            $param_head = $head;
            $param_post = $post;
            $param_posta = $posta;
            
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
    <title>ข่าว / กิจกรรม</title>
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
                        <h2>ข่าว / กิจกรรม</h2>
                    </div>
                    <p>Please fill this form and submit to add news record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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


                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>