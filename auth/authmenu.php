<?php 
    include_once 'connect.php';
    session_start();
    if(!isset($_SESSION['active_user_id'])){
        header('location:authpage.html');
    };
    $user_id=$_SESSION['active_user_id'];
    $query_my_data = $conn->query("SELECT * FROM users WHERE id='$user_id'");
    $my_data = $query_my_data->fetch_array();
    $user_level = $my_data['role'];
    $username = $my_data['fullName'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/tailwind.css">
    <link rel="stylesheet" href="assets/fa/css/all.css">
    <link rel="stylesheet" href="custom.css">
    <link rel="stylesheet" href="assets/material_icon/material-icons.css">
    <!-- <link rel="stylesheet" href="assets/remixicon/remixicon.css"> -->
    <title><?php echo $title?></title>
</head>
<body class="" style="font-family:'Bahnschrift">
    <div class="sidenav -ml-72 transition-all duration-500 md:ml-0 w-72 z-20 flex flex-col fixed bg-gray-100 h-full overflow-y-auto shadow-md py-5">
        <div class="flex py-9 justify-center">
            <div class="flex items-center gap-2">
                <div class="text-2xl font-bold text-my-50 "><span class="uppercase">Ridas</span> <span class="italic text-red-800" style="font-family:'Segoe Script'">foods</span></div>
            </div>
        </div>
        <div class="flex-grow">
            <div class="w-full">
                <a href="dashborad.php" class="">
                    <div class="py-4 px-3 w-full hover:bg-white hover:text-red-300 <?php if($title == 'dashboard'){ echo 'border-r-4 border-my-400 bg-my-50 text-white';}?>">
                        <i class="fa fa-tachometer-alt text-xs"></i> Dashboard
                    </div>
                </a>
                <?php
                    if($user_level == 0 ){
                        echo 'customer';
                    }elseif($user_level == 1){
                        ?>
                            <a href="Recipe.php" class="">
                                <div class="py-4 px-3 w-full hover:bg-white hover:text-red-300 <?php if($title == 'Add Recipe'){ echo 'border-r-4 border-my-400 bg-my-50 text-white';}?>">
                                    <i class="fa fa-bullhorn text-xs"></i> Recipe
                                </div>
                            </a>
                            <a href="addDish.php" class="">
                                <div class="py-4 px-3 w-full hover:bg-white hover:text-red-300 <?php if($title == 'Dishes'){ echo 'border-r-4 border-my-400 bg-my-50 text-white';}?>">
                                    <i class="fa fa-bullhorn text-xs"></i> Dish
                                </div>
                            </a>
                            <a href="wallet.php" class="">
                                <div class="py-4 px-3 w-full hover:bg-white hover:text-red-300 <?php if($title == 'Wallet'){ echo 'border-r-4 border-my-400 bg-my-50 text-white';}?>">
                                    <i class="fab fa-bitcoin"></i> Wallet
                                </div>
                            </a>
                        <?php
                    }else{
                        ?>
                            <a href="balence.php" class="">
                                <div class="py-4 px-3 w-full hover:bg-white hover:text-red-300 <?php if($title == 'Add Recipe'){ echo 'border-r-4 border-my-400 bg-my-50 text-white';}?>">
                                    <i class="fa fa-bullhorn text-xs"></i> Balanceing
                                </div>
                            </a>
                        <?php
                    }
                ?>
                
            </div>
        </div>
        <div class="">
            <form name="auth" class="p-0 w-full flex flex-col">
                <input type="hidden" name="action" value="logout">
                <button class=" flex justify-center items-center text-gray-500 gap-x-3 w-auto">
                    <span class="flex h-9 w-9 justify-center items-center text-white bg-my-900 rounded-full">
                        <i class="fa fa-sign-out-alt text-xs"></i>
                    </span>
                    Log Out
                </button>
            </form>
        </div>
        <div class="fixed w-screen lg:pr-9 md:pr-4 pr-2 py-4 top-0 right-0 lg:flex hidden justify-end">
            <div class="profileData">
                <div class="flex gap-3 ">
                    <div class="flex items-center gap-3 profileData">
                        <div class="flex flex-col items-end">
                            <div class="">
                                <span class="bg-my-400 py-1 px-2 capitalize text-white rounded-full text-xs">
                                    <?php
                                        if($user_level == 0 ){
                                            echo 'customer';
                                        }elseif($user_level == 1){
                                            echo 'sales person';
                                        }else{
                                            echo 'balanceing';
                                        }
                                    ?>
                                </span>
                            </div>
                            <div class="capitalize text-lg" style="font-family:'Bahnschrift'">
                                <?php echo $username ?>
                            </div>
                        </div>
                        <img src="assets/avatars/3.jpeg" class="w-12 h-12 rounded-full" srcset="">
                    </div>
                    <!-- <div class="beller bg-white h-12 w-12 cursor-pointer relative flex justify-center items-center rounded-full">
                        <a href="" class="hidden md:block">
                            <div class="relative">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6 9H19.938L20.438 7H8V5H21.72C21.872 5 22.022 5.03466 22.1586 5.10134C22.2952 5.16801 22.4148 5.26495 22.5083 5.38479C22.6019 5.50462 22.6668 5.6442 22.6983 5.79291C22.7298 5.94162 22.7269 6.09555 22.69 6.243L20.19 16.243C20.1358 16.4592 20.011 16.6512 19.8352 16.7883C19.6595 16.9255 19.4429 17 19.22 17H5C4.73478 17 4.48043 16.8946 4.29289 16.7071C4.10536 16.5196 4 16.2652 4 16V4H2V2H5C5.26522 2 5.51957 2.10536 5.70711 2.29289C5.89464 2.48043 6 2.73478 6 3V9ZM6 23C5.46957 23 4.96086 22.7893 4.58579 22.4142C4.21071 22.0391 4 21.5304 4 21C4 20.4696 4.21071 19.9609 4.58579 19.5858C4.96086 19.2107 5.46957 19 6 19C6.53043 19 7.03914 19.2107 7.41421 19.5858C7.78929 19.9609 8 20.4696 8 21C8 21.5304 7.78929 22.0391 7.41421 22.4142C7.03914 22.7893 6.53043 23 6 23ZM18 23C17.4696 23 16.9609 22.7893 16.5858 22.4142C16.2107 22.0391 16 21.5304 16 21C16 20.4696 16.2107 19.9609 16.5858 19.5858C16.9609 19.2107 17.4696 19 18 19C18.5304 19 19.0391 19.2107 19.4142 19.5858C19.7893 19.9609 20 20.4696 20 21C20 21.5304 19.7893 22.0391 19.4142 22.4142C19.0391 22.7893 18.5304 23 18 23Z" fill="black"/>
                                </svg>
                            </div>
                        </a>
                        <div class="p-1 absolute border-2 -top-1 right-1 border-white rounded-full bg-red-400 text-xs text-white px-2">0</div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <div class="sticky top-0 bg-white z-10 md:ml-72 pl-2 lg:pl-5 relative">
        <div class="lg:hidden profileData">
            <div class="flex gap-3 pt-3 items-center">
                <div class="flex items-center gap-3 order-2">
                    <div class="flex flex-col order-2">
                        <div class="">
                            <span class="bg-my-400 py-1 px-2 text-white rounded-full" style="font-size:10px">
                                <?php
                                    if($user_level == 0 ){
                                        echo 'customer';
                                    }elseif($user_level == 1){
                                        echo 'sales person';
                                    }else{
                                        echo 'balanceing';
                                    }
                                ?>
                            </span>
                        </div>
                        <div class="capitalize text-sm" style="font-family:'Bahnschrift'"><?php echo $username ?></div>
                    </div>
                    <img src="assets/avatars/3.jpeg" class="w-8 h-8 rounded-full" srcset="">
                </div>
                <!-- <div class="beller bg-white h-8 w-8 cursor-pointer relative flex justify-center items-center rounded-full">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 9H19.938L20.438 7H8V5H21.72C21.872 5 22.022 5.03466 22.1586 5.10134C22.2952 5.16801 22.4148 5.26495 22.5083 5.38479C22.6019 5.50462 22.6668 5.6442 22.6983 5.79291C22.7298 5.94162 22.7269 6.09555 22.69 6.243L20.19 16.243C20.1358 16.4592 20.011 16.6512 19.8352 16.7883C19.6595 16.9255 19.4429 17 19.22 17H5C4.73478 17 4.48043 16.8946 4.29289 16.7071C4.10536 16.5196 4 16.2652 4 16V4H2V2H5C5.26522 2 5.51957 2.10536 5.70711 2.29289C5.89464 2.48043 6 2.73478 6 3V9ZM6 23C5.46957 23 4.96086 22.7893 4.58579 22.4142C4.21071 22.0391 4 21.5304 4 21C4 20.4696 4.21071 19.9609 4.58579 19.5858C4.96086 19.2107 5.46957 19 6 19C6.53043 19 7.03914 19.2107 7.41421 19.5858C7.78929 19.9609 8 20.4696 8 21C8 21.5304 7.78929 22.0391 7.41421 22.4142C7.03914 22.7893 6.53043 23 6 23ZM18 23C17.4696 23 16.9609 22.7893 16.5858 22.4142C16.2107 22.0391 16 21.5304 16 21C16 20.4696 16.2107 19.9609 16.5858 19.5858C16.9609 19.2107 17.4696 19 18 19C18.5304 19 19.0391 19.2107 19.4142 19.5858C19.7893 19.9609 20 20.4696 20 21C20 21.5304 19.7893 22.0391 19.4142 22.4142C19.0391 22.7893 18.5304 23 18 23Z" fill="black"/>
                    </svg>
                    <div class="absolute border-2 top-2 right-2 border-white rounded-full bg-red-400" style="padding:2px"></div>
                </div> -->
            </div>
        </div>
        <div class="absolute bg-my-500 rounded-lg border-2 cursor-pointer md:hidden bars text-white right-3 top-2 px-2" style="padding-top:5px">
            <i class="fa fa-bars fa-2x"></i>
        </div>
        <div class="text-lg capitalize md:text-2xl lg:text-4xl lg:py-5">
            <?php echo $title?>
        </div>
    </div>
</body>
<script src="assets/js/jquery.js"></script>
<script src="assets/fa/js/all.js"></script>
<script src="custom.js"></script>
</html>