<?php
    $title = 'dashboard';
    // include_once 'modal.php';
    include_once 'auth/authmenu.php';
?>
<div class="md:ml-72 px-2 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 xl:grid-cols-3 gap-6 lg:px-5 py-5">
    <div class="py-3 text-white bg-red-400 rounded-lg px-4 shadow-lg">
        <div class="border-b py-1 capitalize text-xs">
            todays open orders
        </div>
        <div class="text-6xl py-4">
            464
        </div>
    </div>
    <div class="py-3 px-4 text-white bg-blue-400 rounded-lg shadow-lg">
        <div class="border-b py-1 capitalize text-xs">
            total served today
        </div>
        <div class="text-6xl py-4">
        345
        </div>
    </div>
    <div class="py-3 px-4 text-white bg-green-400 rounded-lg shadow-lg">
        <div class="border-b py-1 capitalize text-xs">
            total balance today
        </div>
        <div class="text-6xl py-4">
        &#8358;345
        </div>
    </div>
    <div class="sm:col-span-2 md:col-span-2 xl:col-span-3 py-3">
        Order Details
        <div class="mt-4  py-2 px-3 bg-my-500 text-white grid grid-cols-6 lg:grid-cols-7">
            <div class="col-span-4 text-left">customer Email</div>
            <div class="hidden lg:block">Code</div>
            <div class="hidden md:block">amount</div>
            <div class="text-center">update</div>
        </div>
        <div class="divide-y">
            <?php
                $query_order = $conn->query("SELECT * FROM foodorders WHERE balance !='0'");
                while ($orders = $query_order->fetch_array()) {
                    ?>
                        <div class="py-2 px-3 cursor-pointer gap-3 bg-gray-50 hover:bg-red-50 text-black grid grid-cols-6 lg:grid-cols-7">
                            <div class="col-span-4">
                                <div class="flex w-full">
                                    <div class=" overflow-ellipsis truncate">
                                        <?php echo $orders['cMail'] ?>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden lg:block"><?php echo $orders['AccOde'] ?></div>
                            <div class="hidden md:block">&#8358;<?php echo $orders['balance'] ?></div>
                            <div class="col-span-2 md:col-span-1">
                                <div class="text-center bg-my-200 rounded-lg py-1 px-2 updatePay" id="<?php echo $orders['sn'] ?>" name="1">Payed</div>
                            </div>
                        </div>
                    <?php
                }
            ?>
        </div>
    </div>
</div>
<script>
    $('.close').on('click',function () {
        $(this).parent().parent().parent().parent().addClass('hidden')
    })
</script>