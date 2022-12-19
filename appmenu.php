<div class="fixed z-50 bg-white topNav w-full top-0 p-3 md:bg-opacity-0">
    <div class="max-w-8xl relative flex mx-auto flex-col md:flex-row">
        <a href="" class="md:hidden absolute top-1 right-14">
            <div class="relative">
                <img src="" class="bottom-1 cursor-pointer relative">
                <div class="absolute px-1  bg-red-500 -top-1 -right-1 rounded-full border-2 border-white text-white" id="cart2" style="font-size: 10px"></div>
            </div>
        </a>
        <div class="absolute h-10 flex justify-center bars items-center w-10 text-white right-1 -top-2 rounded-lg shadow-lg md:hidden cursor-pointer border-2 border-white bg-red-500">
            <i class="fa fa-bars"></i>
        </div>
        <div class="flex-grow font-bold text-lg"><span class="uppercase">Ridas</span> <span class="italic text-red-custom" style="font-family:'Segoe Script'">foods</span></div>
        <div class="menu hidden md:flex flex-col md:flex-row mt-5 md:mt-0 gap-16">
            <div class="flex flex-col md:flex-row gap-12 capitalize">
                <div class="">
                    <a href="index.php" class="text-red-400 font-bold border-b border-red-400">home</a>
                </div>
                <div class="">
                    <a href="index.php#explore" class="hover:text-red-400 hover:font-bold hover:border-b hover:border-red-400">menu</a>
                </div>
                <div class="">
                    <a href="index.php#about" class="hover:text-red-400 hover:font-bold hover:border-b hover:border-red-400">about</a>
                </div>
                <div class="">
                    <a href="index.php#blog" class="hover:text-red-400 hover:font-bold hover:border-b hover:border-red-400">blog</a>
                </div>
                <div class="">
                    <div id="status"></div>
                </div>
            </div>
            <div class="flex gap-12">
                <span class="hidden md:block cursor-pointer" id="showCheckout">
                    <div class="relative">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 9H19.938L20.438 7H8V5H21.72C21.872 5 22.022 5.03466 22.1586 5.10134C22.2952 5.16801 22.4148 5.26495 22.5083 5.38479C22.6019 5.50462 22.6668 5.6442 22.6983 5.79291C22.7298 5.94162 22.7269 6.09555 22.69 6.243L20.19 16.243C20.1358 16.4592 20.011 16.6512 19.8352 16.7883C19.6595 16.9255 19.4429 17 19.22 17H5C4.73478 17 4.48043 16.8946 4.29289 16.7071C4.10536 16.5196 4 16.2652 4 16V4H2V2H5C5.26522 2 5.51957 2.10536 5.70711 2.29289C5.89464 2.48043 6 2.73478 6 3V9ZM6 23C5.46957 23 4.96086 22.7893 4.58579 22.4142C4.21071 22.0391 4 21.5304 4 21C4 20.4696 4.21071 19.9609 4.58579 19.5858C4.96086 19.2107 5.46957 19 6 19C6.53043 19 7.03914 19.2107 7.41421 19.5858C7.78929 19.9609 8 20.4696 8 21C8 21.5304 7.78929 22.0391 7.41421 22.4142C7.03914 22.7893 6.53043 23 6 23ZM18 23C17.4696 23 16.9609 22.7893 16.5858 22.4142C16.2107 22.0391 16 21.5304 16 21C16 20.4696 16.2107 19.9609 16.5858 19.5858C16.9609 19.2107 17.4696 19 18 19C18.5304 19 19.0391 19.2107 19.4142 19.5858C19.7893 19.9609 20 20.4696 20 21C20 21.5304 19.7893 22.0391 19.4142 22.4142C19.0391 22.7893 18.5304 23 18 23Z" fill="black"/>
                        </svg>
                        <small class="absolute top-0 right-4" id="nCartItem">
                            
                        </small>
                    </div>
                </span>
            </div>
        </div>
    </div>
</div>
<div class="fixed flex justify-center items-center w-screen h-screen bg-black bg-opacity-40 backdrop-blur-sm hidden" style="z-index: 99999;" id="checkout">
    <div class="w-screen px-4">
        <div class="max-w-sm bg-white rounded-lg py-5 mx-auto">
            <div class="p-2">
                <div class="text-2xl font-bold text-my-50 "><span class="uppercase">Ridas</span> <span class="italic text-red-400" style="font-family:'Segoe Script'">foods</span></div>
            </div>
            <div class="">
                <form name="order" class="">
                    <div name="order" class="">
                        <!-- Div for fetching Food Items -->
                        <div class="p-2 divide-y" id="boxl"></div> 
                        <!-- Input for  -->
                        <input type="hidden" name="food" id="food" >
                        <input type="hidden" name="action" value="submitOrder">
                        <div class="text-right p-2">
                            <span class="font-bold text-xl">Total:</span> &#8358;<span id="box2"></span>
                        </div>
                    </div>
                    <div class="p-2 hidden">
                        <div class="relative ">
                            <i class="mt-3 ml-3 fa-1x fa fa-user absolute text-gray-500"></i>
                            <input type="text"  required value="" placeholder="Full Name " name="fullname" id="ee" class="border placeholder:capitalize focus:outline-none placeholder-gray-500 pl-10 rounded-lg w-full bg-gray-50 py-2">
                        </div>
                        <div name="seat" class="relative sm:top bg-white my-3 w-full flex flex-row  py-0 rounded-lg grid">
                            <i class="mt-3 ml-3 fa-1x fa absolute right-4 text-my-500"></i>
                            <i class="mt-3 ml-3 fa-1x fa fa-couch absolute text-gray-500"></i>
                            <input name="seat" type="number" required class="border focus:outline-none placeholder-gray-500 pl-10 rounded-lg w-full bg-gray-50 py-2" placeholder="Enter Seat Number"> 
                        </div>
                        <div class="py-2">
                            
                            <div name="payType" class="grid grid-cols-2 gap-2 capitalize">
                                <div class="">
                                    <input type="radio" checked required value="crypto" name="mode" id="ee">
                                    <label for="ee" class="w-full">cryto currency</label>
                                </div>
                                <!-- <div class="">
                                    <input type="radio" required value="wallet" name="mode" id="moni">
                                    <label for="moni" class="w-full">connect</label>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="hidden">
                        <div class="p-2 hidden" id="card">
                            
                        <p class=" font-serif font-bold">Select wallet address below</p>
                        <select name="wallet" id="walletData" class="w-full capitalize h-10 bg-gray-100 border p-1 px-2 rounded">
                            <option selected value="">Select Wallet</option>
                        </select>
                        <div class="mt-3 text-sm">
                            <div>
                                <p>Wallet Address</p>
                            </div>
                            <div id="walletAddress">

                            </div>
                        </div>
                        <div class="mt-3 text-sm">
                            <div>
                                <p>Wallet Qr-code</p>
                            </div>
                            <div id="imgsrc">
                                
                            </div>
                        </div>
                            <!-- <div class="relative sm:top bg-white shadow-2xl my-3 w-full flex flex-row  py-0 rounded-lg grid">
                                <i class="mt-3 ml-3 fa-1x fa absolute right-3 text-my-500"></i>
                                <i class="mt-3 ml-3 fa-1x fa fa-couch absolute text-gray-500"></i>
                                <input name="user" type="number" class="border focus:outline-none placeholder-gray-500 pl-10 rounded-lg w-full bg-gray-50 py-2" placeholder="Enter Card Number"> 
                            </div>
                            <div class="py-2">
                                <div class="grid grid-cols-3 gap-2">
                                    <div class="">
                                        <div class ="relative sm:top bg-white shadow-2xl my-3 w-full flex flex-row  py-0 rounded-lg grid">
                                            <i class="mt-3 ml-3 fa-1x fa absolute right-3 text-my-500"></i>
                                            <i class="mt-3 ml-3 fa-1x fa fa-couch absolute text-gray-500"></i>
                                            <input name="user" type="text" class="border focus:outline-none placeholder-gray-500 pl-10 rounded-lg w-full bg-gray-50 py-2" placeholder="00/00"> 
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="relative sm:top bg-white shadow-2xl my-3 w-full flex flex-row  py-0 rounded-lg grid">
                                            <i class="mt-3 ml-3 fa-1x fa absolute right-3 text-my-500"></i>
                                            <i class="mt-3 ml-3 fa-1x fa fa-couch absolute text-gray-500"></i>
                                            <input name="user" type="number" class="border focus:outline-none placeholder-gray-500 pl-10 rounded-lg w-full bg-gray-50 py-2" placeholder="CVV"> 
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="relative sm:top bg-white shadow-2xl my-3 w-full flex flex-row  py-0 rounded-lg grid">
                                            <i class="mt-3 ml-3 fa-1x fa absolute right-3 text-my-500"></i>
                                            <i class="mt-3 ml-3 fa-1x fa fa-couch absolute text-gray-500"></i>
                                            <input name="user" type="number" class="border focus:outline-none placeholder-gray-500 pl-10 rounded-lg w-full bg-gray-50 py-2" placeholder="****"> 
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <div class="p-2 hidden" id="cash">
                            <div class="relative sm:top bg-white shadow-2xl my-3 w-full flex flex-row  py-0 rounded-lg grid">
                                <i class="mt-3 ml-3 fa-1x fa absolute right-3 text-my-500"></i>
                                <i class="mt-3 ml-3 fa-1x fa fa-couch absolute text-gray-500"></i>
                                <input name="cash" type="number" id="moniH" class="border focus:outline-none placeholder-gray-500 pl-10 rounded-lg w-full bg-gray-50 py-2" placeholder="Enter Cash At Hand"> 
                            </div>
                            <div class="py-2">
                                Your Balance : &#8358;<span id="balan"></span>
                                <input type="hidden" name="balan">
                                <input type="hidden" name="email">
                                <input type="hidden" name="totalPay">
                            </div>
                        </div>
                    </div>
                </form>
                <div class="grid gap-3 capitalize px-2 text-white text-center grid-cols-2">
                    <div class="bg-red-400 py-3 close cursor-pointer rounded-lg" id="prev">close</div>
                    <button class="bg-gray-200 py-3 text-gray-400 rounded-lg" disabled style="" name="nextF">Next</button>
                    <div class="bg-green-400 py-3 cursor-pointer rounded-lg" id="next" name="nextM">next</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="fixed flex justify-center items-center w-screen h-screen bg-black bg-opacity-40 backdrop-blur-sm hidden balanceM" style="z-index: 99999;">
    <div class="w-screen px-4">
        <div class="max-w-sm bg-white px-3 rounded-lg py-5 mx-auto">
            <div class="text-2xl font-bold text-my-50 "><span class="uppercase">Ridas</span> <span class="italic text-red-400" style="font-family:'Segoe Script'">foods</span></div>
            <div class="">
                <div class="relative sm:top bg-white my-3 w-full flex flex-row  py-0 rounded-lg grid">
                    <i class="mt-3 ml-3 fa-1x fa absolute right-3 text-my-500"></i>
                    <i class="mt-3 ml-3 fa-1x fa fa-phone-alt absolute text-gray-500"></i>
                    <input name="phone" type="text" id="balPhone" class="border focus:outline-none placeholder-gray-500 pl-10 rounded-lg w-full bg-gray-50 py-2" placeholder="Enter Phone Number">
                    <div class="text-xs text-red-500 balanceerr hidden">
                        * Please enter your phone Number
                    </div> 
                </div>
                <div class="relative sm:top bg-white my-3 w-full flex flex-row  py-0 rounded-lg grid">
                    <i class="mt-3 ml-3 fa-1x fa absolute right-3 text-my-500"></i>
                    <i class="mt-3 ml-3 fa-1x fa fa-user absolute text-gray-500"></i>
                    <input name="email" type="text" id="balMail" class="border focus:outline-none placeholder-gray-500 pl-10 rounded-lg w-full bg-gray-50 py-2" placeholder="Enter Email (Optional)"> 
                </div>
            </div>
            <div class="">
                <div class="bg-my-400 bg-opacity-40 text-center py-3 text-white font-bold cursor-pointer hover:bg-red-200 rounded-lg  uppercase continue">continue</div>
            </div>
        </div>
    </div>
</div>
<script src="../assets/js/jquery.js"></script>

<script>

    var order = [] 
    var modalForm = 0;
    var payType = 'card'
    var totalPay = 0;

    $('input[name=mode]').on('click',function(){
        payType = $(this).val();
    })

    $('#next').on('click',function(){
        if(modalForm == 2){
            if (payType == 'cash') {
                if ($('#moniH').val() + 1 > totalPay) {
                    if ($('input[name=balan]').val() > 0) {
                        $('.balanceM').removeClass('hidden')
                        $('.continue').on('click',function () {
                            if ($('#balPhone').val() == '') {
                                $('.balanceerr').removeClass('hidden')
                            }else{
                                var email = $('#balPhone').val() + $('#balMail').val()
                                // $('input[name=email]').val(email)
                                payNow()
                            }
                        })
                    } else {
                        payNow()
                    }
                } else {
                    alert('Sorry! Your cash is lower than what you ordered for')
                }
            } else {
                $('input[name=balan]').val('0')
                payNow()
            }
        }
        var show = modalForm+1
        if(modalForm < 1){
            $(this).parent().siblings().children().addClass('hidden');
            $(this).parent().siblings().children()[show].classList = 'p-2'
            modalForm = show
        }else if(modalForm < 2){
            $('#' + payType).removeClass('hidden');
            $('#' + payType).siblings().addClass('hidden');
            $(this).parent().siblings().children().addClass('hidden');
            $(this).parent().siblings().children()[show].classList = 'p-2'
            modalForm = show
        }
        if(modalForm > 1){
            $(this).text('order')
        }else{
            $('#prev').text('prevoius')
        }
    })
    $('#prev').on('click',function(){
        if(modalForm == 0){
            $('#checkout').addClass('hidden')
        }
        var show = modalForm-1
        if (modalForm > 0) {
            $(this).parent().siblings().children().addClass('hidden');
            $(this).parent().siblings().children()[show].classList = 'p-2'
            modalForm = show
        }
        if(modalForm < 1){
            $(this).text('close')
        }else{
            $('#next').text('next')
        }
    })

    $('#showCheckout').on('click',function(){
        $('#checkout').removeClass('hidden')
        loadList()
        if (order.length > 0) {
            $('div[name=nextM]').removeClass('hidden')
            $('button[name=nextF]').addClass('hidden')
        } else {
            $('button[name=nextF]').removeClass('hidden')
            $('div[name=nextM]').addClass('hidden')
        }
    })

    $('#boxl').on('click' , '.removeItem' , function () {
        var data = {
            action:'removeFromCart',
            val: $(this).attr('id')
        }
        $.ajax({
            type: "post",
            url: "auth/query.php",
            data: data,
            success: function (response) {
                loadList()
            }
        });
        
    })

    $('#moniH').on('keyup', function(){
        if ($(this).val() - totalPay > 0) {
            $('#balan').html($(this).val() - totalPay);
            $('input[name=balan]').val($(this).val() - totalPay)
        } else {
            $('#balan').html('0');
            $('input[name=balan]').val('0')
        }
    })

    function loadList() {
        $myArr = [];
        var number = 0;
        totalPay = 0;
        var food = ''
        $.ajax({
            type:'post',
            url: 'backend/manage_cart.php',
            data:{action:'fetch_all'},
            dataType:'json',
            async:false,
            success: function (response) {
                $cart = '';
                if (response.status == 'success') {
                    response.items.forEach((item, i) => {
                        food = food + item.dish.foodName + ','
                        totalPay = totalPay + parseInt(item.amount) 
                        $myArr += `
                            <div class="flex w-full py-2">
                                <div class="px-2 cursor-pointer removeItem" id="${item.id}"><i class="fa fa-times"></i></div>
                                <div class="px-2 cursor-pointer"> ${item.qty} - </div>
                                <div class="flex-grow capitalize"> ${item.dish.foodName}</div>
                                <div class="">&#8358; ${item.amount}</div>
                            </div>
                        `;
                        number++
                    });
                    order = response.items;
                    countCartItem();
                    $('#boxl').html($myArr);
                    $('#box2').html(totalPay);
                    $('input[name=totalPay]').val(totalPay);
                    $('#food').val(food);
                }
            }
        })
    }

    function loadWallet(){
        $.ajax({
            type: "post",
            url: "backend/manage_wallet.php",
            data: {action: 'fetch_all'},
            dataType: "json",
            success: function (response) {
                $data = "";
                console.log(response);
                if(response.status == 'success'){
                    response.wallet.forEach((wallet, i) => { 
                        $data += `
                            <option value="${wallet.walletName}" class="captilazie walletData" dataimage="${wallet.walletQr}" dataAddress="${wallet.walletAddress}">${wallet.walletName}</option>
                        `;
                    });
                    $('#walletData').html($data)
                }
            }
        });
    }
    loadWallet()

    // $('.walletData').click(function () { 
    //     $data = $(this).attr('data');
    //     console.log($data);
    // });

    $('#walletData').change(function () { 
        var selected = $(this).find('option:selected', this);
        var image = [];
        var address = [];

        selected.each(function() {
            image.push($(this).attr('dataimage'));
            address.push($(this).attr('dataAddress'))
        });

        $imageSrc = `<img src="imgs/dish/${image}" alt="">`;
        $('#imgsrc').html($imageSrc)


        $walletAdress = `<p class="text-xs">${address}</p>`;
        $('#walletAddress').html($walletAdress)
        
    });

    function payNow() {
        var data = $('form[name=order]').serialize();
        $.ajax({
            type: "post",
            url: "auth/query.php",
            data:data ,
            dataType: "json",
            success: function (response) {
                if(response.status == 'good'){
                    alert('Your order have been Made')
                    window.location = ''
                }
            }
        });
    }
    function countCartItem(){
        $.ajax({
            type:'post',
            url: 'backend/manage_cart.php',
            data:{action:'fetch_all'},
            dataType:'json',
            async:false,
            success: function (response) {
                if (response.items.length > 0) {
                    $('#nCartItem').html(`<span class="bg-red-500 text-white rounded-full h-5 w-5 flex item-center justify-center">${response.items.length}</span>`);
                }
            }
        })
    }
    countCartItem();
</script>