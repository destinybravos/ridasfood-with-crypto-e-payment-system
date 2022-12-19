<?php
    $title = 'Dishes';
    include_once 'modal.php';
    include_once 'auth/authmenu.php';
?>
<div class="fixed px-3 py-1 rounded-l-lg z-40 cursor-pointer bg-my-400 text-white right-0 openModal">Add Dish</div>
<div class="md:ml-72 px-2 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 xl:grid-cols-3 py-10 gap-6 lg:px-5 py-5" id="dishlist">
    
</div>
<script>
    $('.close').on('click',function () {
        $('.modalBody').addClass('hidden')
    })
    $('.openModal').on('click',function(){
        $('.modalBody').removeClass('hidden')
    })

    $('form[name=frmAddDish]').on('submit', function(e){
        e.preventDefault();
        let frmData = new FormData();
        frmData.append('action', 'save');
        frmData.append('recipe', $('select[name=recipe]').val());
        frmData.append('dish', $('input[name=dishName]').val());
        frmData.append('price', $('input[name=price]').val());
        frmData.append('image', $('input[name=dishimg]')[0].files[0]);
        $.ajax({
            type:'post',
            url: 'backend/manage_dish.php',
            cache: false,
            contentType: false,
            processData: false,
            data:frmData,
            dataType:'json',
            success: function (response) {
                if (response.status == 'success') {
                    $('form[name=frmAddDish]').trigger('reset');
                    fetchDish();
                    $('.close').trigger('click');
                }else{
                    alert(response.message);
                }
            }
        })
    })

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
                                            <button id='${dish.id}' class="absolute remove capitalize bg-btn-color text-sm cursor-pointer rounded-lg px-10 right-6 top-20 font-light text-white" style="padding:10px 20px 10px">
                                                remove
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

    $('#dishlist').on('click', '.remove', function () { 
        let id = $(this).attr('id');
        if (confirm('are you want to remove dish?')) {
            $.ajax({
                type: "post",
                url: "backend/manage_dish.php",
                data: {action:'remove', data:id},
                dataType: "json",
                success: function (response) {
                    if (response.status == 'success') {
                        fetchDish();
                    }else{
                        alert(response.message)
                    }
                }
            });
        }
        
    });
</script>