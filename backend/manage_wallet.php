<?php
    include_once '../auth/connect.php';
    $response =  [];
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        // Save Dish Information
        if ($action == 'save') {
            $walletName = $_POST['walletName'];
            $walletAddress = $_POST['walletAddress'];
            $image = uploadImage($_FILES['walletQr']);
            $query = $conn->query("INSERT INTO wallets(walletName, walletAddress, walletQr) VALUES('$walletName','$walletAddress','$image')");
            if ($query) {
                $response['status'] = "success";
                $response['message'] = 'Successfully uploaded Wallet "' . $walletName . '"';
            }else{
                $response['status'] = "error";
                $response['message'] = "UNEXPECTED! " . $conn->error;
            }
        }
        // Fetch All wallet Information
        elseif ($action == 'fetch_all'){
            $query = $conn->query("SELECT * FROM wallets ORDER BY id");
            if($query->num_rows > 0){
                $wallets = [];
                while($wallet = $query->fetch_assoc()){
                    // $wallet['recipe'] = fetchRecipe($dish['recipe'], $conn);
                    array_push($wallets, $wallet);
                }
                $response['status'] = "success";
                $response['wallet'] = $wallets;
                $response['message'] = "All Wallet fetched";
            }else{
                $response['status'] = "success";
                $response['dish'] = [];
                $response['message'] = "No records for all Wallet";
            }
        }
        elseif ($action == 'remove') {
            $id = $_POST['data'];
            $query = $conn->query("DELETE  FROM wallets WHERE id={$id}");
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