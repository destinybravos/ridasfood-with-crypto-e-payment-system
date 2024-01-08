<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/css/tailwind.css">
        <link rel="stylesheet" href="assets/fa/css/all.css">
        <link rel="stylesheet" href="custom.css">
        <title>Ridas-Food</title>
    </head>
    <body>
        <div class="">
            <?php
                include_once 'auth/connect.php';
                include_once 'appmenu.php';
                $request = (isset($_GET['request']) && $_GET['request'] != '') ? $_GET['request'] : 'all';
                $recipes = $conn->query("SELECT * FROM recipe");
            ?>
            <div class="bg-red-50 w-full">
                <div class="" style="height: 92vh">
                    <div class="max-w-8xl mx-auto h-full flex items-center">
                        <div class="grid gap-1 px-3 grid-cols-1 mt-8 md:grid-cols-5">
                            <div class="md:col-span-2 order-2 flex flex-col justify-center space-y-12">
                                <div class="space-y-5">
                                    <div class="font-extrabold w-full text-6xl">
                                        Good Foods are good investments.
                                    </div>
                                    <div class="text-lg leading-7 max-w-md">
                                        get fresh foodin an easy way, <span class="uppercase">Ridas</span> <span class="italic text-red-custom" style="font-family:'Segoe Script'">foods</span> is after the well being of your stomach
                                    </div>
                                </div>
                                <div>
                                    <span class="bg-btn-color rounded-lg text-white px-8 py-4 bg-opacity-25">
                                        Get Started
                                    </span>
                                </div>
                            </div>
                            <div class="md:col-span-3 flex justify-center md:order-2">
                                <img src="imgs/Group 508.png" class="bottom-1 relative h-11/12" style="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center bg-red-50 py-4 pb-48 w-full">
                    <div class="h-14 rounded-2xl relative" style="border: 1px solid black;padding:3px 6px 3px">
                        <div class="bg-black rounded-full relative top-10" style="padding: 3px"></div>
                    </div>
                </div>
            </div>
            <div class="py-28" id="explore">
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
                        <div class="py-4 rounded-lg shadow-xl border" style="height: 450px">
                            <div class="h-2/3 bg-white w-full flex justify-center items-center">
                                <div class="rounded-full overflow-hidden w-52 h-52 bg-red-100">
                                    <img src="imgs/spicy-food-in-wooden-bowl.webp" alt="" class="h-full w-full">
                                </div>
                            </div>
                            <div class="bg-gray-100 relative font-bold text-xl h-2/5 w-full flex flex-col justify-center px-6">
                                <div class="">Efo (Vegetable)</div>
                                <div class="">
                                    <i class="fa fa-star text-red-custom"></i>
                                    <i class="fa fa-star text-red-custom"></i>
                                    <i class="fa fa-star text-red-custom"></i>
                                    <i class="fa fa-star text-red-custom"></i>
                                    <i class="fa fa-star text-gray-300"></i>
                                </div>
                                <div class="">
                                    &#8358; 2040
                                </div>
                                <button class="absolute bg-btn-color text-sm cursor-pointer rounded-lg px-10 right-6 top-20 font-light text-white" style="padding:10px 45px 10px">
                                    Add to cart
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="text-right px-4 pt-12">
                        <span>
                            <a href="menu.php" class="bg-my-400 text-white px-4 py-2 rounded-lg">
                                view more <i class="fa fa-arrow-right"></i>
                            </a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="bg-red-50" id="about">
                <div class="grid max-w-8xl px-4 mx-auto grid-cols-1 md:grid-cols-2 gap-16">
                    <div class="">
                        <img src="imgs/Group 506.png" class="bottom-1 relative" style="height: 560px">
                    </div>
                    <div class="py-28 space-y-16">
                        <div class="space-y-4">
                            <div class="text-5xl font-extrabold max-w-xl">
                                About Us We have provide a quality driver
                            </div>
                            <div class="text-lg">
                                <p>Best cooks and best delivery guys all at your service.</p>
                                <p>Hot tasty food will reach you in 60 minutes</p>
                            </div>
                        </div>
                        <div class="">
                            <span class="bg-btn-color rounded-md text-white px-14 py-4 bg-opacity-25">
                                Explore
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-40 space-y-9" id="blog">
                <div class="text-5xl font-extrabold space-y-3 text-center">
                    <div class="">Blog Our Latest </div>
                    <div class="max-w-md text-gray-500 text-base font-light mx-auto">
                        Have you every browsed food blogs like ours and wondered how to start a food blog of uour very own
                    </div>
                </div>
                <div class="max-w-8xl mx-auto">
                    <div class="grid gap-20 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 px-3">
                        <div class="border overflow-hidden rounded-lg shadow-xl flex flex-col" style="height: 450px">
                            <div class="bg-gray-50 h-1/2 flex-grow-1">
                                <div class="rounded-full overflow-hidden mx-auto top-7 relative w-44 h-44 bg-red-100"></div>
                            </div>
                            <div class="text-center h-1/2 flex flex-col justify-center flex-grow-1 space-y-4">
                                <div class="space-y-1">
                                    <div class="font-bold text-xl">How to prepare Abacha</div>
                                    <div class="px-10 text-gray-400 text-sm">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Qui culpa earum dicta deleniti! Nostrum iusto omnis quisquam ratione neque asperiores facilis perferendis quaerat labore? Sequi corporis tempore voluptate sed similique!</div>
                                </div>
                                <div class="uppercase text-red-500">read more</div>
                            </div>
                        </div>
                        <div class="border overflow-hidden rounded-lg shadow-xl flex flex-col" style="height: 450px">
                            <div class="bg-gray-50 h-1/2 flex-grow-1">
                                <div class="rounded-full overflow-hidden mx-auto top-7 relative w-44 h-44 bg-red-100"></div>
                            </div>
                            <div class="text-center h-1/2 flex flex-col justify-center flex-grow-1 space-y-4">
                                <div class="space-y-1">
                                    <div class="font-bold text-xl">Spaghetti Recipe</div>
                                    <div class="px-10 text-gray-400 text-sm">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Qui culpa earum dicta deleniti! Nostrum iusto omnis quisquam ratione neque asperiores facilis perferendis quaerat labore? Sequi corporis tempore voluptate sed similique!</div>
                                </div>
                                <div class="uppercase text-red-500">read more</div>
                            </div>
                        </div>
                        <div class="border overflow-hidden rounded-lg shadow-xl flex flex-col" style="height: 450px">
                            <div class="bg-gray-50 h-1/2 flex-grow-1">
                                <div class="rounded-full overflow-hidden mx-auto top-7 relative w-44 h-44 bg-red-100"></div>
                            </div>
                            <div class="text-center h-1/2 flex flex-col justify-center flex-grow-1 space-y-4">
                                <div class="space-y-1">
                                    <div class="font-bold text-xl">Benefit of Egui Soup</div>
                                    <div class="px-10 text-gray-400 text-sm">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Qui culpa earum dicta deleniti! Nostrum iusto omnis quisquam ratione neque asperiores facilis perferendis quaerat labore? Sequi corporis tempore voluptate sed similique!</div>
                                </div>
                                <div class="uppercase text-red-500">read more</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="" id="">
                <div class="bg-red-50 py-32 px-4 gap-y-20 justify-center items-center">
                    <div class="font-extrabold text-4xl text-center space-y-3">
                        <div class="">Join Our Member And Get</div>
                        <div class="text-red-custom">Discount Up to 50%</div>
                        <div class="">
                            <div class="py-1 flex relative max-w-xl mx-auto">
                                <input type="text" placeholder="Enter Your Email Here" class="border text-base w-full pr-52 focus:ring-red-400 focus:border-red-400 relative px-5 placeholder-gray-400 py-6 -right-1 border-red-400 rounded-lg flex-grow">
                                <span class="bg-btn-color absolute text-base -right-1 uppercase rounded-lg z-10 text-white px-16 py-6 bg-opacity-25" style="top: 5px">
                                    sign in
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-black py-32 PX-4">
                    <div class="max-w-8xl gap-6 mx-auto grid grid-cols-1 md:grid-cols-9">
                        <div class="md:col-span-3 py-3 space-y-4">
                            <div class="text-2xl font-bold text-gray-100"><span class="uppercase">Ridas</span> <span class="italic text-red-custom" style="font-family:'Segoe Script'">foods</span></div>
                            <div class="text-gray-300 w-60 pr-0">Food is any substance consumed to provide nutritional support for an organism</div>
                        </div>
                        <div class="md:col-span-2 py-3 space-y-4">
                            <div class="text-2xl font-bold text-gray-100">Information</div>
                            <div class="text-gray-300 w-60 space-y-2 pr-0">
                                <div class="">About Us</div>
                                <div class="">More Search</div>
                                <div class="">Online Order</div>
                                <div class="">Support</div>
                            </div>
                        </div>
                        <div class="md:col-span-2 py-3 space-y-4">
                            <div class="text-2xl font-bold text-gray-100">Our Services</div>
                            <div class="text-gray-300 w-60 space-y-2 pr-0">
                                <div class="">Lunch</div>
                                <div class="">Dinner</div>
                                <div class="">Catering</div>
                                <div class="">Privacy</div>
                            </div>
                        </div>
                        <div class="md:col-span-2 py-3 space-y-4">
                            <div class="text-2xl font-bold text-gray-100">Contact Us</div>
                            <div class="text-gray-300 w-60 space-y-2 pr-0">
                                <div class="">+23409208253</div>
                                <div class="">Ridas-Food@gmail.com</div>
                                <div class="">Terms & Condition</div>
                            </div>
                        </div>
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
                data:{action:'fetch_all'},
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