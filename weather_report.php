<?php
    $message = '';
    if(isset($_POST['submit'])):  // check form submit and  submit button 
    
        // Get type and tepmerature_value by POST method 
        $temperature = $_POST['temperature'];
        switch ($temperature) {
            case $temperature <=4:
                $message = "It's freezing!";
                break;
            case $temperature > 5 && $temperature <= 20:
                $message = "It's cool.";
                break;
            
            case $temperature > 20  && $temperature <= 40:
                $message = "It's warm.";
                break;
            case $temperature > 40:
                $message = "It's too hot.";
                break;
            default:
                $message = "invalid Temperature.";
                break;
        }
     
        
    endif;
    if(isset($_POST['reset'])):
        $temperature = '';
        $message = '';
        header("Location: weather_report.php");
    endif;
 ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Weather Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    
    <style>
        .formArea{
            margin-top: 50px;;
        }
    </style>
  </head>
  <body>
  
    <?php require_once "navbar.php";?>
    
    
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
                    <div class="formArea">
                        <div class="card">
                            <div class="card-header">Weather Report</div>
                            <div class="card-body">
                            <?php if(isset($message) && !empty($message)):?>
                                <div class="mb-3">
                                    <div class="alert alert-success" role="alert">
                                       <?= $message;?>    
                                    </div>
                                </div>
                            <?php endif;?>
                                
                                <div class="mb-3">
                                <label>Enter your temperature</label>
                                <input type="text" name="temperature" class="form-control" placeholder="ex: 80" required value="<?= isset($temperature)?$temperature:''; ?>">
                                </div>
                            </div>
                            <div class="card-footer">
                                  <button type="submit" name="reset" class="btn btn-secondary float-start">Reset</button>
                                  <button type="submit" name="submit" class="btn btn-primary float-end">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>
