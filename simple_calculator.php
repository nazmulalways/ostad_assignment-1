<?php
    $message = '';
    if(isset($_POST['submit'])):  // check form submit and  submit button 
    
        // Get values by POST method 
        $number1 = $_POST['number1'];
        $number2 = $_POST['number2'];
        $operation = $_POST['operation'];
       
      
   
         
        if((is_numeric($number1) && is_numeric($number2)) && ($number1 !=0 && $number2!=0)){
            switch ($operation) {
                case 'addition':
                    $result = $number1+$number2;
                    break;
                case 'subtraction':
                    $result = $number1-$number2;
                    break;
                
                case 'multiplication':
                    $result = $number1*$number2;
                    break;
                case 'division':
                    $result = $number1/$number2;
                    break;
                
                default:
                    $result = 0;
                    break;
            }
        }elseif($number1 ==0 && $number2 ==0){
            $result = 0;
        }else{
            $invalid_msg ="Number Must be a numeric value"; 
        }
        
        if(isset($result)){
            $message = "Result: $result";
        }else {
            $message = $invalid_msg??'';
        }
        
    endif;
    if(isset($_POST['reset'])):
        $number1 = '';
        $number2 = '';
        $result = '';
        $message = '';
        header("Location: simple_calculator.php");
    endif;
 ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simple Calculator</title>
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
                            <div class="card-header">Simple Calculator</div>
                            <div class="card-body">
                                <?php if(isset($message) && !empty($message)):?>
                                    <div class="mb-3">
                                        <div class="alert alert-success" role="alert">
                                        <?= $message;?>    
                                        </div>
                                    </div>
                                <?php endif;?>
                                    
                                <div class="mb-3">
                                    <label>Enter your first number</label>
                                    <input type="text" name="number1" class="form-control" placeholder="ex: 40" required value="<?= isset($number1)?$number1:''; ?>">
                                </div>
                                <div class="mb-3">
                                    <label>Enter your second number</label>
                                    <input type="text" name="number2" class="form-control" placeholder="ex: 80" required value="<?= isset($number2)?$number2:''; ?>">
                                </div>
                                
                                <div class="mb-3">
                                    <label>Operation</label>
                                    <select name="operation" class="form-control">
                                        <option value="addition" <?= isset($operation) && $operation=="addition"?"selected":"";?> >addition</option>
                                        <option value="subtraction" =<?= isset($operation) && $operation=="subtraction"?"selected":"";?> >subtraction</option>
                                        <option value="multiplication" = <?= isset($operation) && $operation=="multiplication"?"selected":"";?> >multiplication</option>
                                        <option value="division" <?= isset($operation) && $operation=="division"?"selected":"";?> >division</option>
                                    </select>
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
