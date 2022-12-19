<?php
    $title = 'Wallet';
    include_once 'walletModal.php';
    include_once 'auth/authmenu.php';
?>
<div class="fixed px-3 py-1 rounded-l-lg z-40 cursor-pointer bg-my-400 text-white right-0 openModal">Add Wallet</div>
<div class="md:ml-72 px-2 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 xl:grid-cols-3 py-10 gap-6 lg:px-5 py-5" id="dishlist">
    
</div>
<script>
    $('.close').on('click',function () {
        $('.modalBody').addClass('hidden')
    })
    $('.openModal').on('click',function(){
        $('.modalBody').removeClass('hidden')
    })

    $('form[name=frmWallet]').on('submit', function(e){
        e.preventDefault();
        let frmData = new FormData();
        frmData.append('action', 'save');
        frmData.append('walletName', $('input[name=walletName]').val());
        frmData.append('walletAddress', $('input[name=walletAddress]').val());
        frmData.append('walletQr', $('input[name=walletQr]')[0].files[0]);
        $.ajax({
            type:'post',
            url: 'backend/manage_wallet.php',
            cache: false,
            contentType: false,
            processData: false,
            data:frmData,
            dataType:'json',
            success: function (response) {
                if (response.status == 'success') {
                    $('form[name=frmAddDish]').trigger('reset');
                    fetchWallet();
                    $('.close').trigger('click');
                }else{
                    alert(response.message);
                }
            }
        })
    })

    function fetchWallet() {
        $.ajax({
            type:'post',
            url: 'backend/manage_wallet.php',
            data:{action:'fetch_all'},
            dataType:'json',
            success: function (response) {
                if (response.status == 'success') {
                    let wallets = '';
                    response.wallet.forEach(function(wallet){
                        wallets += `<div class="py-4 rounded-lg shadow-xl border" style="height: 450px">
                                        <div class="h-2/3 bg-white w-full flex justify-center items-center">
                                            <div class="rounded-full overflow-hidden w-52 h-52 bg-red-100">
                                                <img src="imgs/dish/${wallet.walletQr}" alt="" class="h-full w-full">
                                            </div>
                                        </div>
                                        <div class="bg-gray-100 relative font-bold text-xl h-2/5 w-full flex justify-between items-center px-6">
                                            <div class=" w-8/12">
                                                <div class="capitalize">${wallet.walletName}</div>
                                                <div class="capitalize text-xs truncate">${wallet.walletAddress}</div>
                                            </div>
                                            
                                            <div>
                                                <button id='${wallet.id}' class=" remove capitalize bg-btn-color text-sm cursor-pointer rounded-lg  font-light text-white" style="padding:10px 20px 10px">
                                                    remove
                                                </button>
                                            </div>
                                        </div>
                                    </div>`;
                    });
                    $('#dishlist').html(wallets);
                } else {
                    alert(response.message);
                }
            }
        })
    }
    fetchWallet();

    $('#dishlist').on('click', '.remove', function () { 
        let id = $(this).attr('id');
        if (confirm('are you want to remove dish?')) {
            $.ajax({
                type: "post",
                url: "backend/manage_wallet.php",
                data: {action:'remove', data:id},
                dataType: "json",
                success: function (response) {
                    if (response.status == 'success') {
                        fetchWallet();
                    }else{
                        alert(response.message)
                    }
                }
            });
        }
        
    });
</script>