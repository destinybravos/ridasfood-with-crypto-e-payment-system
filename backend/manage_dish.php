<?php
    include_once '../auth/connect.php';
    $response =  [];
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        // Save Dish Information
        if ($action == 'save') {
            $recipe = $_POST['recipe'];
            $dish = $_POST['dish'];
            $price = $_POST['price'];
            $image = uploadImage($_FILES['image']);
            $query = $conn->query("INSERT INTO dish(recipe, foodName, price, img) VALUES('$recipe','$dish','$price','$image')");
            if ($query) {
                $response['status'] = "success";
                $response['message'] = 'Successfully uploaded dish "' . $dish . '"';
            }else{
                $response['status'] = "error";
                $response['message'] = "UNEXPECTED! " . $conn->error;
            }
        }
        // Fetch All Dish Information
        elseif ($action == 'fetch_all'){
            $query = $conn->query("SELECT * FROM dish ORDER BY foodName");
            if($query->num_rows > 0){
                $dishes = [];
                while($dish = $query->fetch_assoc()){
                    $dish['recipe'] = fetchRecipe($dish['recipe'], $conn);
                    array_push($dishes, $dish);
                }
                $response['status'] = "success";
                $response['dish'] = $dishes;
                $response['message'] = "Fetched records for all dishes";
            }else{
                $response['status'] = "success";
                $response['dish'] = [];
                $response['message'] = "No records for all dishes";
            }
        }
        elseif ($action == 'remove') {
            $id = $_POST['data'];
            $query = $conn->query("DELETE  FROM dish WHERE id={$id}");
            if ($query == true) {
                $response['status'] = "success";
                $response['message'] = "Dish deleted from records";
            }else{
                $response['status'] = "error";
                $response['message'] = "error in connection";
            }
        }
        // If action is not specified
        else{
            $response['status'] = "error";
            $response['message'] = "Request not understood. Please specify prefared function.";
        }
    } else {
        $response['status'] = "error";
        $response['message'] = "Invaid or Missing data in request";
    }
    
    echo json_encode($response);


    // Custom Functions
    function uploadImage($image)
    {
        $tempname = $image['tmp_name'];
        $name = $image['name'];
        $file = time() . $name;
        $path= '../imgs/dish/' . $file;
        if (move_uploaded_file($tempname, $path)) {
            return $file;
        }else{
            return 'default.png';
        }
    }
    function fetchRecipe($recipe_id, $conn)
    {
        $query = $conn->query("SELECT id, name FROM recipe WHERE id='$recipe_id'");
        $recipe = $query->fetch_assoc();
        return $recipe;
    }
?>