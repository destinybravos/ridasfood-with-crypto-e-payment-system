<?php
    include_once '../auth/connect.php';
    $response =  [];
    $ip = $_SERVER['REMOTE_ADDR'];

    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        // Add dish to cart
        if ($action == 'add') {
            $item_id = $_POST['dish_id'];
            // check if dish already exists in cart
            $query = $conn->query("SELECT * FROM cart WHERE item_id='$item_id'");
            if ($query and $query->num_rows > 0) {
                $item = $query->fetch_assoc();
                $num_item = (int)$item['qty'] + 1;
                $amount = $num_item * fetchDishPrice($item_id, $conn);
                $query_update = $conn->query("UPDATE cart SET qty='$num_item', amount='$amount' WHERE item_id='$item_id'");
                if ($query_update) {
                    $response['status'] = "success";
                    $response['message'] = "Item update to cart successfully";
                }
            }else{
                $amount = fetchDishPrice($item_id, $conn);
                $query_insert = $conn->query("INSERT INTO cart(ip, item_id, amount) VALUES('$ip', '$item_id', '$amount')");
                if ($query_insert) {
                    $response['status'] = "success";
                    $response['message'] = "Item added to cart successfully";
                }
            }
        }
        // Fetch All Dish Information
        elseif ($action == 'fetch_all'){
            $query = $conn->query("SELECT * FROM cart ORDER BY created_at");
            if($query->num_rows > 0){
                $items = [];
                while($cart = $query->fetch_assoc()){
                    $cart['dish'] = fetchDish($cart['item_id'], $conn);
                    array_push($items, $cart);
                }
                $response['status'] = "success";
                $response['items'] = $items;
                $response['message'] = "Fetched records for all cart items";
            }else{
                $response['status'] = "success";
                $response['items'] = [];
                $response['message'] = "Cart is empty";
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
    function fetchDishPrice($dish_id, $conn)
    {
        $query = $conn->query("SELECT price FROM dish WHERE id='$dish_id'");
        $dish = $query->fetch_assoc();
        return $dish['price'];
    }

    function fetchDish($dish_id, $conn)
    {
        $query = $conn->query("SELECT * FROM dish WHERE id='$dish_id'");
        $dish = $query->fetch_assoc();
        return $dish;
    }
?>