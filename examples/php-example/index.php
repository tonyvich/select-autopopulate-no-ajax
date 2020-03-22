<?php 
    // Create a PDO object for database
    $server     = 'localhost';
    $db_name    = 'select_autopopulate_tutorial';
    $username   = 'root';
    $password   = '';
    
    try{
        $sqldata = new PDO('mysql:host='.$server.';dbname='.$db_name,$username,$password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION) );
    }
    catch(Exception $e){
        echo $e->getMessage();
        die();
    }
    // Load the countries from database
    $countries = $sqldata->query("SELECT * FROM countries");
    // load the town from database
    $towns = $sqldata->query("SELECT * FROM towns");
?>
<html>
    <head>
        <title>Select Autopopulate No Ajax Example with PHP</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-6 mt-4">
                    <h1>Select the your country and your town</h1>
                </div>
                <div class="col-md-12 mt-4">
                    <div class="row">
                        <!-- Create the country select -->
                        <div class="form-group col-md-6">
                            <label for="countrySelect">Select your country</label>
                            <select name="country" id="countrySelect" class="form-control">
                                <?php 
                                    while( $country = $countries->fetch( PDO::FETCH_OBJ ) ){
                                ?>
                                        <option value="<?= $country->country_code ?>"><?= $country->country_name ?></option>
                                <?php
                                    }
                                ?>  
                            </select>
                        </div>
                        <!-- Create the town select -->
                        <div class="form-group col-md-6">
                            <label for="townSelect">Select your town</label>
                            <select name="townSelect" id="townSelect" class="form-control">
                                <?php 
                                    while( $town = $towns->fetch( PDO::FETCH_OBJ ) ){
                                ?>
                                        <option parent-option="<?= $town->country_code ?>" value="<?= $town->town_id ?>"><?= $town->town_name ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="../jquery.min.js"></script>
        <script src="../../src/select-autopopulate-no-ajax.js"></script>
        <script>
            $( document ).ready( function(){
                $( "#countrySelect" ).autopopulatedselect( "#townSelect" );
            })
        </script>
    </body>
</html>
