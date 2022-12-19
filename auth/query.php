<?php
    session_start();
    include_once 'connect.php';
    $action=$_POST['action'];
    if($action == 'login'){
        $user =$_POST['user'];
        $pwd =md5($_POST['pwd']);
        login($user,$pwd,$conn);
    }elseif ($action == 'register') {
        $fullName =$_POST['firstname'] .' '.$_POST['lastname'];
        $mail =$_POST['email'];
        $phone =$_POST['phone'];
        // $department =$_POST['department'];
        // $level =$_POST['level'];
        $pwd = md5($_POST['pwd']);
        $query = $conn->query("SELECT * FROM users WHERE (email='$mail' OR phone='$phone') AND pwd='$pwd'");
        if($query->num_rows < 1){
            $register = $conn->query("INSERT INTO users (fullName,pwd,email,phone)VALUE('$fullName','$pwd','$mail','$phone')");
            if($register){
                login($mail,$pwd,$conn);
            }
        }else{
            echo 'Email already Exists';
        }
    }elseif ($action == 'logout') {
        session_destroy();
        echo json_encode([
            'msg'=>'logout'
        ]);
    }elseif ($action == 'forgotten') {
        $user =$_POST['user'];
        $query = $conn->query("SELECT * FROM users WHERE phone='$user' OR email='$user'");
        if($query->num_rows == 1){
            $users = $query->fetch_assoc();
            $_SESSION['active_user_id'] = $users['id'];
            echo json_encode([
                'status'=>'good',
                'users' => $users
            ]);
        }else{
            echo json_encode([
                'status'=>'bad',
                'msg'=>'Details are Incorrect'
            ]);
        }
    }elseif ($action == 'submitOrder') {
        $food =$_POST['food'];
        $fullName =$_POST['fullname'];
        $seat =$_POST['seat'];
        $mode =$_POST['mode'];
        $price =$_POST['totalPay'];
        $email =$_POST['email'];
        $balan =$_POST['balan'];
        $code = codeGen(8);
        $order = $conn->query("INSERT INTO foodorders (food, fullname,seat,modeOfPayment,balance,price,cMail,AccOde)VALUE('$food', '$fullName', '$seat','$mode','$balan','$price','$email','$code')");
        if($order){
            $ip = $_SERVER['REMOTE_ADDR'];
            $del = $conn->query("DELETE FROM cart WHERE ip='$ip'");
            if($del){
                echo json_encode([
                    'status'=>'good'
                ]);
            }
        }
    }elseif ($action == 'updataPay') {
        $val = $_POST['value'];
        $id = $_POST['order'];
        $update = $conn->query("UPDATE foodorders SET balance= '$val' WHERE sn='$id'");
        if ($update) {
            echo json_encode([
                'message' => 'success',
                'val' => $val
            ]);
        }
    }elseif ($action == 'updataOrder') {
        $val = $_POST['value'];
        $id = $_POST['order'];
        $update = $conn->query("UPDATE foodorders SET FoodStatus = '$val' WHERE sn='$id'");
        if ($update) {
            echo json_encode([
                'message' => 'success',
                'val' => $val
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'something went wrong'
            ]);
        }
        
    }elseif ($action == 'pay') {
        $val = $_POST['value'];
        $id = $_POST['id'];
        $update = $conn->query("UPDATE foodorders SET paymentstatus = '$val' WHERE sn='$id'");
        if ($update) {
            echo json_encode([
                'message' => 'success',
                'val' => $val
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'something went wrong'
            ]);
        }
        
    }elseif ($action == 'addRecipe') {
        $Recipe = $_POST['Recipe'];
        $reip = $conn->query("INSERT INTO recipe (name)VALUE('$Recipe')");
        if($reip){
            echo json_encode([
                'status'=>'good'
            ]);
        }
    }elseif ($action == 'modalList') {
        $id = $_POST['val'];
        $query_order = $conn->query("SELECT * FROM foodorders WHERE sn='$id'");
        $list = $query_order->fetch_assoc();
        $text = $list['food'];
        ?>
            <div class="fixed flex justify-center items-center top-0 right-0 z-40 w-screen h-screen bg-black bg-opacity-40">
                <div class="w-full p-3">
                    <div class="bg-white p-4 pb-1 max-w-sm mx-auto">
                        <div class="text-2xl font-bold text-my-50 "><span class="uppercase">Ridas</span> <span class="italic text-red-400" style="font-family:'Segoe Script'">foods</span></div>
                        <div class="">Order <hr></div>
                        <div class="py-2">
                            <?php
                                $num = 0;
                                $a = explode(',', $text );
                                while ($num < count($a)-1) {
                                    ?>
                                        <div class=""> <span class="pr-2"><?php echo $num+1 . '.' ?></span><?php echo $a[$num] ?></div>
                                    <?php
                                    $num++;
                                }
                            ?>
                        </div>
                        <div class="">
                            <hr>
                            <div class="grid text-center grid-cols-2 gap-3 py-2">
                                <div class="py-4 hover:bg-gray-100 cursor-pointer" id="close">
                                    close
                                </div>
                                <?php
                                    if ($list['FoodStatus'] == '0') {
                                        ?>
                                            <div class="py-4 capitalize bg-my-200 text-white cursor-pointer updateOrder" id="<?php echo $list['sn'] ?>" name="1">
                                                not served
                                            </div>
                                        <?php
                                    } else {
                                        ?>
                                            <div class="py-4 capitalize bg-green-400 text-white cursor-pointer updateOrder" id="<?php echo $list['sn'] ?>" name="0">
                                                served
                                            </div>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }elseif ($action == 'removeFromCart') {
        $id = $_POST['val'];
        $reip = $conn->query("DELETE FROM cart WHERE id='$id'");
    }elseif ($action == 'delRep') {
        $RecipeID = $_POST['val'];
        $reip = $conn->query("DELETE FROM recipe WHERE id='$RecipeID'");
        if($reip){
            echo json_encode([
                'status'=>'good'
            ]);
        }
    }



    function codeGen($lenght){
        $letter = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle($letter),0,$lenght);
    }

    function login($log,$pwd,$conn){
        $query = $conn->query("SELECT * FROM users WHERE (phone='$log' OR email='$log') AND pwd='$pwd'");
        if($query->num_rows == 1){
            $users = $query->fetch_assoc();
            $_SESSION['active_user_id'] = $users['id'];
            echo json_encode([
                'status'=>'good',
                'msg'=>'login',
                'users' => $users
            ]);
        }else{
            echo json_encode([
                'status'=>'bad',
                'msg'=>'Login Details are Incorrect'
            ]);
        }
    }
?>



