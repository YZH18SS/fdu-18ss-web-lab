<?php
//Fill this place

//****** Hint ******
//connect database and fetch data here

$conn = new mysqli('localhost','yzh','123456','travel');
if ($conn->connect_error){
    echo '数据库连接失败！';
    exit(0);
}



?>
<?php include 'functions.inc.php'?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Lab11</title>

      <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    
    

    <link rel="stylesheet" href="css/captions.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.css" />    

</head>

<body>
    <?php include 'header.inc.php'; ?>
    


    <!-- Page Content -->
    <main class="container">
        <div class="panel panel-default">
          <div class="panel-heading">Filters</div>
          <div class="panel-body">
            <form action="Lab11.php" method="get" class="form-horizontal">
              <div class="form-inline">
              <select id="continents" name="continent" class="form-control" >
                <option value="0">Select Continent</option>
                <?php
                //Fill this place

                //****** Hint ******
                //display the list of continents
                $sql_continents = "select * from continents ";
                $result  = $conn ->query($sql_continents);
                while($row = $result->fetch_assoc()) {
                  echo '<option value=' . $row['ContinentCode'] . '>' . $row['ContinentName'] . '</option>';
                }

                ?>
              </select>     
              
              <select name="country" class="form-control">
                <option value="0">Select Country</option>
                <?php 
                //Fill this place

                //****** Hint ******
                /* display list of countries */
//                if(!empty($_GET['continent'])){
//                    $sql_countries = "select Continent from countries where Continent =" .$_GET['continent'];
//                    $result  = $conn ->query($sql_countries);
//                    while($row = $result->fetch_assoc()) {
//                        echo '<option value=' . $row['ISO'] . '>' . $row['CountryName'] . '</option>';
//                    }
//                }
//                $sql_countries = "select Continent from countries where Continent =" .$_GET['continent'];
//                 $continent = $_GET['data'] ;
                 $sql_countries = "select * from countries";
                 echo $sql_countries;
                $result  = $conn ->query($sql_countries);
                while($row = $result->fetch_assoc()) {
                    echo '<option value=' . $row['ISO'] . '>' . $row['CountryName'] . '</option>';
                }
                ?>
              </select>    
              <input type="text"  placeholder="Search title" class="form-control" name=title>
              <button type="submit" class="btn btn-primary">Filter</button>
              </div>
            </form>

          </div>
        </div>     
                                    

		<ul class="caption-style-2">
            <?php 
            //Fill this place

            //****** Hint ******
            /* use while loop to display images that meet requirements ... sample below ... replace ???? with field data
            <li>
              <a href="detail.php?id=????" class="img-responsive">
                <img src="images/square-medium/????" alt="????">
                <div class="caption">
                  <div class="blur"></div>
                  <div class="caption-text">
                    <p>????</p>
                  </div>
                </div>
              </a>
            </li>        
            */
            if(empty($_GET['country'])){
                $sql_images = "select * from imagedetails";
            }
            else{
                $sql_images = "select * from imagedetails where CountryCodeISO =" ."'". $_GET['country'] . "'";
//                echo $sql_images;
            }
            $result = $conn ->query($sql_images);
            while($row = $result -> fetch_assoc()){
                findCountry($row['ImageID'],$row['Path'],$row['Title'],$row['Description']);
            }
            ?>
       </ul>       

      
    </main>
    
    <footer>
        <div class="container-fluid">
                    <div class="row final">
                <p>Copyright &copy; 2019 Creative Commons ShareAlike</p>
                <p><a href="#">Home</a> / <a href="#">About</a> / <a href="#">Contact</a> / <a href="#">Browse</a></p>
            </div>            
        </div>
        

    </footer>


        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<!--        <script>-->
<!--            function selectfun(){-->
<!--                var params = $("#continents option:selected").val();-->
<!--                $.ajax({-->
<!--                    async: true,-->
<!--                    type: "GET",-->
<!--                    url: "../Lab11.php",-->
<!--                    data: params,-->
<!--                    dataType: "json",-->
<!--                });-->
<!--            }-->
<!---->
<!--        </script>-->
</body>

</html>