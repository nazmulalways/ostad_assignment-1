<?php
    $message = '';
    if(isset($_POST['submit'])):  // check form submit and  submit button 
    
        // Get type and tepmerature_value by POST method 
        $marks = $_POST['marks'];
        switch ($marks) {
            case $marks >= 80 && $marks <= 100:
                $grade = 'A+';
                break;
            case $marks >= 70 && $marks <= 79:
                $grade = 'A';
                break;
            
            case $marks >= 60 && $marks <= 69:
                $grade = 'A-';
                break;
            case $marks >= 50 && $marks <= 59:
                $grade = 'B';
                break;
            
            case $marks >= 40 && $marks <= 49:
                $grade = 'C';
                break;
            
            case $marks >= 33 && $marks <= 39:
                $grade = 'D';
                break;
            
            case $marks >= 0 && $marks <= 32:
                $grade = 'F';
                break;
            
            default:
                $grade = 0;
                break;
        }
        if($grade==0 || empty($grade)){
            $message = "Sorry! You have entered invalid marks";
        }else{
            $message = "Congratulations!! you got $grade";
        }
        
    endif;
    if(isset($_POST['reset'])):
        $marks = '';
        $message = '';
        header("Location: grade_calculator.php");
    endif;
 ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Grade Calculator</title>
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
                            <div class="card-header">Grade Calculator</div>
                            <div class="card-body">
                            <?php if(isset($message) && !empty($message)):?>
                                <div class="mb-3">
                                    <div class="alert alert-success" role="alert">
                                       <?= $message;?>    
                                    </div>
                                </div>
                            <?php endif;?>
                                
                                <div class="mb-3">
                                <label>Enter your marks</label>
                                <input type="text" name="marks" class="form-control" placeholder="ex: 80" required value="<?= isset($marks)?$marks:''; ?>">
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
