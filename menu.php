<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/css/tailwind.css">
        <link rel="stylesheet" href="assets/fa/css/all.css">
        <link rel="stylesheet" href="custom.css">
        <title>Ridas - Food</title>
    </head>
    <body>
        <div class="">
            <?php
                include_once 'auth/connect.php';
                include_once 'appmenu.php';
                $request = (isset($_GET['request']) && $_GET['request'] != '') ? $_GET['request'] : 'all';
                $recipes = $conn->query("SELECT * FROM recipe");
            ?>
            <div class="py-28 px-2">
                <div class="max-w-8xl mx-auto py-4 space-y-5">
                    <div class="flex flex-col md:flex-row">
                        <div class="flex-grow text-4xl font-extrabold">Our Menu</div>
                        <div class="flex items-center gap-10 capitalize">
                            <a href="menu.php?request=all" class="">
                                <span class="<?php echo $request == 'all' ? 'text-red-400 font-bold border-b border-red-400' : '' ?>">all</span>
                            </a>
                            <?php
                                while ($recipe = $recipes->fetch_assoc()) {
                            ?>
                            <a href="menu.php?request=<?php echo $recipe['name'] ?>" class="">
                                <span class="<?php echo $request == $recipe['name'] ? 'text-red-400 font-bold border-b border-red-400' : '' ?>"><?php echo $recipe['name'] ?></span>
                            </a>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                    <div class="grid gap-20 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 px-3" id="dishlist">
                        <?php
                            if ($request == 'all') {
                                $query = $conn->query("SELECT * FROM dish ORDER BY foodName");
                            } else {
                                $recipe_id = getRecipeID($request, $conn);
                                $query = $conn->query("SELECT * FROM dish WHERE recipe='$recipe_id' ORDER BY foodName");
                            }
                            if($query->num_rows > 0){
                                while($dish = $query->fetch_assoc()){
                                    ?>
                                        <div class="py-4 rounded-lg shadow-xl border" style="height: 450px">
                                            <div class="h-2/3 bg-white w-full flex justify-center items-center">
                                                <div class="rounded-full overflow-hidden w-52 h-52 bg-red-100">
                                                    <img src="imgs/dish/<?php echo $dish['img']?>" alt="" class="h-full w-full">
                                                </div>
                                            </div>
                                            <div class="bg-gray-100 relative font-bold text-xl h-2/5 w-full flex flex-col justify-center px-6">
                                                <small class="text-gray-500"> <i class="fa fa-utensils"></i> <?php echo $dish['foodName']?></small>
                                                <div class=""><?php echo $dish['foodName'] ?></div>
                                                <div class="">
                                                    <i class="fa fa-star text-red-custom"></i>
                                                    <i class="fa fa-star text-red-custom"></i>
                                                    <i class="fa fa-star text-red-custom"></i>
                                                    <i class="fa fa-star text-red-custom"></i>
                                                    <i class="fa fa-star text-gray-300"></i>
                                                </div>
                                                <div class="">
                                                    &#8358; <?php echo $dish['price'] ?>
                                                </div>
                                                <button data-id="${dish.id}" class="absolute bg-btn-color text-sm cursor-pointer rounded-lg px-10 right-6 top-20 font-light text-white add_to_cart" style="padding:10px 45px 10px">
                                                    Add to Cart
                                                </button>
                                            </div>
                                        </div>
                                    <?php
                                }
                            }else{
                                ?>
                                    <h1>
                                        No dish found for the recipe <strong>"<?php echo $request ?>"</strong>
                                    </h1>
                                <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="assets/js/jquery.js"></script>
    <script src="custom.js"></script>
    <script>
            
        function fetchDish() {
            $.ajax({
                type:'post',
                url: 'backend/manage_dish.php',
                data:{action:'fetch_all', recipe : <?php echo $request ?>},
                dataType:'json',
                success: function (response) {
                    if (response.status == 'success') {
                        let dishes = '';
                        response.dish.forEach(function(dish){
                            dishes += `<div class="py-4 rounded-lg shadow-xl border" style="height: 450px">
                                            <div class="h-2/3 bg-white w-full flex justify-center items-center">
                                                <div class="rounded-full overflow-hidden w-52 h-52 bg-red-100">
                                                    <img src="imgs/dish/${dish.img}" alt="" class="h-full w-full">
                                                </div>
                                            </div>
                                            <div class="bg-gray-100 relative font-bold text-xl h-2/5 w-full flex flex-col justify-center px-6">
                                                <small class="text-gray-500"> <i class="fa fa-utensils"></i> ${dish.recipe.name}</small>
                                                <div class="">${dish.foodName}</div>
                                                <div class="">
                                                    <i class="fa fa-star text-red-custom"></i>
                                                    <i class="fa fa-star text-red-custom"></i>
                                                    <i class="fa fa-star text-red-custom"></i>
                                                    <i class="fa fa-star text-red-custom"></i>
                                                    <i class="fa fa-star text-gray-300"></i>
                                                </div>
                                                <div class="">
                                                    &#8358; ${dish.price}
                                                </div>
                                                <button data-id="${dish.id}" class="absolute bg-btn-color text-sm cursor-pointer rounded-lg px-10 right-6 top-20 font-light text-white add_to_cart" style="padding:10px 45px 10px">
                                                    Add to cart
                                                </button>
                                            </div>
                                        </div>`;
                        });
                        $('#dishlist').html(dishes);
                    } else {
                        alert(response.message);
                    }
                }
            })
        }
        fetchDish();

        $('#dishlist').on('click', '.add_to_cart', function () {
            countCartItem()
            $.ajax({
                type:'post',
                url:'backend/manage_cart.php',
                data:{dish_id: $(this).attr('data-id'), action:'add'},
                dataType:'json',
                success: function(response){
                    console.log(response);
                }
            })
        })
    </script>
</html>

<?php

    function getRecipeID($recipe, $conn): int {
        $queryExec = $conn->query("SELECT id FROM recipe WHERE name='$recipe'");
        if ($queryExec->num_rows > 0) {
            $recipe = $queryExec->fetch_assoc();
            return (int)$recipe['id'];
        } else {
            return 0;
        }
    }

?>