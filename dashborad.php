<?php
    $title = 'dashboard';
    // include_once 'modal.php';
    include_once 'auth/authmenu.php';

    $qry = "SELECT SUM(price) AS price FROM foodorders ";
    $res = $conn->query($qry);
    
    $total = 0;
    $row =  $res->fetch_assoc();
    $total = $row['price'];

    $sql = "SELECT SUM(FoodStatus) AS FoodStatus FROM foodorders WHERE FoodStatus='1'";
    $result = $conn->query($sql);
    
    $totalServe = 0;
    $rec =  $result->fetch_assoc();
    $totalServe = $rec['FoodStatus'];

?>
<div class="md:ml-72 px-2 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 xl:grid-cols-2 gap-6 lg:px-5 py-5">
    <div class="py-3 text-white bg-red-400 rounded-lg px-4 shadow-lg">
        <div class="border-b py-1 capitalize text-xs">
            todays open orders
        </div>
        <div class="text-6xl py-4">
            &#8358; <?php echo $total ?>
        </div>
    </div>
    <div class="py-3 px-4 text-white bg-blue-400 rounded-lg shadow-lg">
        <div class="border-b py-1 capitalize text-xs">
            total served today
        </div>
        <div class="text-6xl py-4">
            <?php 
                
                echo $totalServe;
            ?>
        </div>
    </div>
    <!-- <div class="py-3 px-4 text-white bg-green-400 rounded-lg shadow-lg">
        <div class="border-b py-1 capitalize text-xs">
            total balance today
        </div>
        <div class="text-6xl py-4">
        &#8358; 0
        </div>
    </div> -->
    <div class="sm:col-span-2 md:col-span-2 xl:col-span-3 py-3">
        Order Details
        <div class="mt-4 capitalize py-2 px-3 bg-my-500 text-white grid grid-cols-7 lg:grid-cols-8">
            <div class="text-left">
                fullname
            </div>
            <div class="col-span-3 text-left">my orderList</div>
            <div class="hidden lg:block">seat</div>
            <div class="hidden md:block">amount</div>
            <div class="">payment</div>
            <div class="text-center">served</div>
        </div>
        <div class="divide-y">
            <?php
                $query_order = $conn->query("SELECT * FROM foodorders");
                while ($orders = $query_order->fetch_array()) {
                    ?>
                        <div class="py-2 px-3 cursor-pointer gap-3 bg-gray-50 hover:bg-red-50 text-black grid grid-cols-7 lg:grid-cols-8 orderList" id="<?php echo $orders['sn'] ?>">
                            <div class="capitalize"><?php echo $orders['fullname'] ?></div>
                            <div class="col-span-3">
                                <div class="flex w-full">
                                    <div class=" overflow-ellipsis truncate">
                                        <?php echo $orders['food'] ?>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden lg:block"><?php echo $orders['seat'] ?></div>
                            <div class="hidden md:block">&#8358;<?php echo $orders['price'] ?></div>
                            <div class="col-span-2 md:col-span-1">
                                <?php
                                    if ($orders['paymentstatus'] == '0') {
                                        ?>
                                            <div class="text-center bg-yellow-400 rounded py-1 px-2 pay" id="<?php echo $orders['sn'] ?>" name="1">Not confirm</div>
                                        <?php
                                    } else {
                                        ?>
                                            <div class="text-center bg-green-400 rounded-lg py-1 px-2 " id="<?php echo $orders['sn'] ?>" name="0">Comfirmed</div>
                                        <?php
                                    }
                                ?>
                            </div>
                            <div class="col-span-2 md:col-span-1">
                                <?php
                                    if ($orders['FoodStatus'] == '0') {
                                        ?>
                                            <div class="text-center bg-red-400 rounded-lg py-1 px-2 updateOrder" id="<?php echo $orders['sn'] ?>" name="1">Not served</div>
                                        <?php
                                    } else {
                                        ?>
                                            <div class="text-center bg-green-400 rounded-lg py-1 px-2" id="<?php echo $orders['sn'] ?>" name="0">Served</div>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                    <?php
                }
            ?>
        </div>
        <div class="modalBox"></div>
    </div>
</div>
<script>
    $('.close').on('click',function () {
        $(this).parent().parent().parent().parent().addClass('hidden')
    })
    $('.orderList').on('click',function(){
        var data = {
            action:'modalList',
            val:$(this).attr('id')
        }
        $.ajax({
            type: 'post',
            url:'auth/query.php',
            data: data,
            dataType:'html',
            success: function(res){
                $('.modalBox').html(res)
            }
        })
    })
    $('.modalBox').on('click','#close',function(){
        $('.modalBox').html('')
    })
    $('.orderList').on('click','.pay',function(){
        var data = {
            id : $(this).attr('id') ,
            action : 'pay',
            value : $(this).attr('name')
        }
        if (confirm('Are you sure ?')) {
            $.ajax({
                type: "post",
                url: "auth/query.php",
                data: data,
                dataType: "json",
                success: function (response) {
                    if (response.message =='success') {
                        window.location = ''
                    } else {
                        alert(response.message)
                    }
                }
            });
        }
    })
    $('.modalBox').on('click','.updateOrder',function(){
        var data = {
            order : $(this).attr('id') ,
            action : 'updataOrder',
            value : $(this).attr('name')
        }
        if (confirm('Are you sure ?')) {
            $.ajax({
                type: "post",
                url: "auth/query.php",
                data: data,
                dataType: "json",
                success: function (response) {
                    if (response.message =='success') {
                        window.location = ''
                    } else {
                        alert(response.message)
                    }
                }
            });
        }
    });

    
</script>