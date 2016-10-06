<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <title> CodeClass Challenge </title>
    <link type="text/css" href="./bootstrap.min.css" rel="stylesheet" />
    <script src="./"></script>
</head>
<body>
    <div class="container">
        <h3> Generate your free Gif's Here</h3>
        <form action="index.php" method="post">
        <div class="form-horizontal">
            <input class="form-control" type="text" name="inputBox"/>  <!-- input field for search -->
            <input type="submit" class="btn btn-primary center-block" name="submit" value="SEARCH" />
        </div> <br>
        </form>
    </div>
    <?php
    require_once 'Giphy.php';   //import the Giphy api class
    $giphy = new Giphy();
    $count = 1;     //initialises the variable for iterating through the result array
        if (isset($_POST['submit']) && !empty($_POST['inputBox']))
        {
            $arr = explode(' ',trim($_POST['inputBox']));   //strips whitespace from user input
            $inputBox = $arr[0];    //gets the first word
            $results = $giphy->search($inputBox);   //calls the search method
            while ($count < 11)
            {
                echo "<div class='col-xs-6 col-md-3'>
                <img src=' {$results['data'][$count]['images']['fixed_height']['url']} ' class='thumbnail img-responsive' style='margin:4%; width:100%; height:200px; '> 
                </div> ";
                $count++;
            }
        }
    ?>
</body>
</html>