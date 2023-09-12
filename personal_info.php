<?php 
    $name = "Nazmul Hossain";
    $age = 30;
    $country = "Bangladesh";
    $about_me = "My Name is Nazmul Hossain, I am from Raijbpur, Kurigram district. I have competed my Bachelor of Science (BSc) degree in Computer Science and Engineering (CSE) from Southeast University.";

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Personal Information</title>
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
                    <div class="formArea">
                        <div class="card">
                            <div class="card-header">Personal Information</div>
                            <div class="card-body">
                                <div class="mb-3">
                                <p><?php echo "My name is: $name";?></p>
                                <p><?php echo "My age is: $age";?></p>
                                <p><?php echo "I am from:  $country";?></p>
                                <p><?php echo "About myself:  $about_me";?></p>
                                    
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>
