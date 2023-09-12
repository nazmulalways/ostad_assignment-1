<?php
    $message = '';
    if(isset($_POST['submit'])):  // check form submit and  submit button 
    
        // Get type and tepmerature_value by POST method 
        
        $marks1 = $_POST['marks1'];
        $marks2 = $_POST['marks2'];
        $marks3 = $_POST['marks3'];
        
        $avg = number_format(($marks1+$marks2+$marks3)/3,2);
        switch ($avg) {
            case $avg >= 80 && $avg <= 100:
                $grade = 'A+';
                break;
            case $avg >= 70 && $avg <= 79:
                $grade = 'A';
                break;
            
            case $avg >= 60 && $avg <= 69:
                $grade = 'A-';
                break;
            case $avg >= 50 && $avg <= 59:
                $grade = 'B';
                break;
            
            case $avg >= 40 && $avg <= 49:
                $grade = 'C';
                break;
            
            case $avg >= 33 && $avg <= 39:
                $grade = 'D';
                break;
            
            case $avg >= 0 && $avg <= 32:
                $grade = 'F';
                break;
            
            default:
                $grade = 0;
                break;
        }
        if($grade==0 || empty($grade)){
            $message = "Sorry! You have entered invalid marks";
        }else{
            $message = "Congratulations!! you got $grade and your score is: $avg";
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
  
    <?php require_once "navbar.php";?>
    
    
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
                                    <label>Enter your First marks </label>
                                    <input type="text" name="marks1" class="form-control" placeholder="ex: 80" required value="<?= isset($marks1)?$marks1:''; ?>">
                                </div>
                                
                                <div class="mb-3">
                                    <label>Enter your second marks</label>
                                    <input type="text" name="marks2" class="form-control" placeholder="ex: 50" required value="<?= isset($marks2)?$marks2:''; ?>">
                                </div>
                                
                                 <div class="mb-3">
                                    <label>Enter your third marks</label>
                                    <input type="text" name="marks3" class="form-control" placeholder="ex: 60" required value="<?= isset($marks3)?$marks3:''; ?>">
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
