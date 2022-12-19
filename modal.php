<form method="post" name="frmAddDish">
<div class="fixed flex justify-center hidden items-center w-screen h-screen bg-black bg-opacity-40 modalBody" style="z-index: 9999999999;">
    <div class="w-screen px-4">
        <div class="max-w-sm bg-white rounded-lg py-5 mx-auto">
            <div class="p-2">
                <div class="text-2xl font-bold text-my-50 "><span class="uppercase">Ridas</span> <span class="italic text-red-800" style="font-family:'Segoe Script'">foods</span></div>
            </div>
            <div class="p-2">
                <select name="recipe" id="recipe_id" required class="w-full rounded-lg py-2 px-4" >
                    <option disabled selected>Select Recipe</option>
                    <?php
                        include_once 'auth/connect.php';
                        $recipe = $conn->query("SELECT * FROM recipe");
                        while ($rec = $recipe->fetch_array()) {
                            ?>
                                <option value="<?php echo $rec['id'] ?>"> <?php echo $rec['name'] ?></option>
                            <?php
                        }
                    ?>
                </select>
                <div class="relative sm:top bg-white my-3 w-full flex flex-row  py-0 rounded-lg grid">
                    <i class="mt-3 ml-3 fa-1x fa fa-asterisk absolute text-gray-500"></i>
                    <input name="dishName" required type="text" class="focus:outline-none placeholder-gray-500 px-8 rounded-lg w-full bg-gray-50 py-2" placeholder="Dish Name"> 
                </div>
                <div class="relative sm:top bg-white my-3 w-full flex flex-row  py-0 rounded-lg grid">
                    <i class="mt-3 ml-3 fa-1x fa fa-credit-card absolute text-gray-500"></i>
                    <input name="price" required type="text" class="focus:outline-none placeholder-gray-500 px-8 rounded-lg w-full bg-gray-50 py-2" placeholder="Dish Price"> 
                </div>
                <div class="relative sm:top bg-white my-3 w-full flex flex-row  py-0 rounded-lg grid">
                    <i class="mt-3 ml-3 fa-1x fa fa-image absolute text-gray-500"></i>
                    <input name="dishimg" required type="file" class="focus:outline-none placeholder-gray-500 px-8 rounded-lg w-full bg-gray-50 py-2" placeholder="Dish Price"> 
                </div>
            </div>
            <div class="grid gap-3 capitalize px-2 text-white text-center grid-cols-2">
                <div class="bg-red-400 py-3 close cursor-pointer rounded-lg">close</div>
                <button type="submit" class="bg-green-400 py-3 cursor-pointer rounded-lg">upload</button>
            </div>
        </div>
    </div>
</div>
</form>