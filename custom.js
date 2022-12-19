$(document).ready(function() {
    window.addEventListener('scroll',function (){
        $scrolled = window.scrollY;
        if($scrolled > 150){
            $('.topNav').addClass('shadow-lg md:bg-opacity-100')
        }else{
            $('.topNav').removeClass('shadow-lg md:bg-opacity-100')
        }
    })
    $('.bars').on('click',function(){
        $('.menu').toggleClass('hidden flex')
    })
    $('.bars').click(()=>{
        $('.sidenav').toggleClass('-ml-72')
    })
    

    $('.switch').click(function(){
        $display = $(this).parent().parent().parent().siblings('div[name='+ $(this).attr('id') +']')
        $display.removeClass('hidden')
        $display.siblings().addClass('hidden')
    })

    $('form[name=auth]').on('submit', function (ev){
        ev.preventDefault();
        $formData = $(this)
        $data = $(this).serialize();
        $.ajax({
            type: 'post',
            url:'auth/query.php',
            data: $data,
            dataType:'json',
            success: function(res){
                if(res.msg == 'login'){
                    window.location.href = 'dashborad.php'
                }else if(res.msg == 'logout'){
                    window.location.href = 'dashborad.php'
                }else{
                    $('.msg').text(res.msg)
                    $formData.trigger('reset')
                }
            }
        })
    });

    $('.updateOrder').on('click', function(){
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
                        
                    }
                }
            });
        }
    })

    $('.updatePay').on('click', function(){
        var data = {
            order : $(this).attr('id') ,
            action : 'updataPay',
            value : '0'
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
                        
                    }
                }
            });
        }
    })
})