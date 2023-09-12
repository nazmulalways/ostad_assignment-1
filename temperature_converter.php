<?php
    $message = '';
    if(isset($_POST['submit'])):  // check form submit and  submit button 
    
        // Get type and tepmerature_value by POST method 
        $type = $_POST['type'];
        $tepmerature_value = $_POST['tepmerature_value'];
        
         // convert celsius to Fahrenheit
        if($type=='celsius'){
            $fahrenheit= number_format(($tepmerature_value*9/5)+32,2);
            $message = "$tepmerature_value Celsius = $fahrenheit Fahrenheit";
        } 
        
        // convert fahrenheit to celsius
        if($type=='fahrenheit'){
           $celsius= number_format(5/9*($tepmerature_value-32),2);
           $message = "$tepmerature_value Fahrenheit = $celsius Celsius";
        }
        
    endif;
    if(isset($_POST['reset'])):
        $type = '';
        $tepmerature_value = '';
        $message = '';
        header("Location: temperature_converter.php");
    endif;
 ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Temperature Converter</title>
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
                            <div class="card-header">Temperature Converter</div>
                            <div class="card-body">
                            <?php if(isset($message) && !empty($message)):?>
                                <div class="mb-3">
                                    <div class="alert alert-success" role="alert">
                                       <?= $message;?>    
                                    </div>
                                </div>
                            <?php endif;?>
                                <div class="mb-3">
                                    <label>Select  type</label>
                                    <select name="type" class="form-control" required>
                                        <option value="">select</option>
                                        <option value="celsius" <?= isset($type) && $type==="celsius"?"selected":''; ?>>Celsius to fahrenheit</option>
                                        <option value="fahrenheit" <?= isset($type) && $type==="fahrenheit"?"selected":''; ?>>Fahrenheit to celsiuss</option>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label>Temperature Value</label>
                                <input type="text" name="tepmerature_value" class="form-control" placeholder="ex: 30" required value="<?= isset($tepmerature_value)?$tepmerature_value:''; ?>">
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
