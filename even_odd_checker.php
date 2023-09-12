<?php
    $message = '';
    if(isset($_POST['submit'])):  // check form submit and  submit button 
    
        // Get type and tepmerature_value by POST method 
        $number = $_POST['number'];
       if($number%2==0){
           $message = "This $number number is <b>Even</b>";
       }else{
           $message = "This $number number is <b>Odd</b>";
       }
       
    endif;
    if(isset($_POST['reset'])):
        $marks = '';
        $message = '';
        header("Location: even_odd_checker.php");
    endif;
 ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Even Odd  Checker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    
    <style>
        .formArea{
            margin-top: 50px;;
        }
    </style>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
                    <div class="formArea">
                        <div class="card">
                            <div class="card-header"> Even Odd Checker</div>
                            <div class="card-body">
                            <?php if(isset($message) && !empty($message)):?>
                                <div class="mb-3">
                                    <div class="alert alert-success" role="alert">
                                       <?= $message;?>    
                                    </div>
                                </div>
                            <?php endif;?>
                                
                                <div class="mb-3">
                                <label>Enter your number</label>
                                <input type="text" name="number" class="form-control" placeholder="ex: 80" required value="<?= isset($number)?$number:''; ?>">
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
