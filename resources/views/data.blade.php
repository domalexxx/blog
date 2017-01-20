<?php
namespace App\Http\Controllers;

use DB;
//Include database configuration file
if(isset($_POST["country_id"]) && !empty($_POST["country_id"])){
    //Get all state data
    // $query = $db->query("SELECT * FROM states WHERE country_id = ".$_POST['country_id']." AND status = 1 ORDER BY state_name ASC");
    $states = DB::select('select * from states where country_id = '.$_POST["country_id"].' AND status = 1 ORDER BY state_name ASC');
    //Count total number of rows
    // $rowCount = $query->num_rows;
    
    //Display states list
    if($states > 0){
        echo '<option value="">Select state</option>';
        // while($row = $query->fetch_assoc()){ 
        //     echo '<option value="'.$row['state_id'].'">'.$row['state_name'].'</option>';
        // }
        foreach ($states as $state) {
                echo '<option value="'.$state->state_id.'">'.$state->state_name.'</option>';
            }
    }else{
        echo '<option value="">State not available</option>';
    }
}
if(isset($_POST["state_id"]) && !empty($_POST["state_id"])){
    //Get all city data
    $cities = DB::select('select * from cities where state_id = '.$_POST["state_id"].' AND status = 1 ORDER BY city_name ASC');
    
    //Count total number of rows
    
    //Display cities list
    if($cities > 0){
        echo '<option value="">Select city</option>';
        foreach ($cities as $city) {
                echo '<option value="'.$city->city_id.'">'.$city->city_name.'</option>';
            }
    }else{
        echo '<option value="">City not available</option>';
    }
}
?>
