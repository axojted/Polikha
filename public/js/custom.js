var rememberSearch;


$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    if($(location).attr('pathname') === '/')
    {
        var navOffset = $('nav').offset().top;
        $(window).scroll(function(){
        var scrollOffset = $(window).scrollTop();
            if(scrollOffset >= 150){
                $('nav').addClass('bg-light')
                $('.navbar-brand').removeClass('invisible')
            }else{
                $('nav').removeClass('bg-light')
                $('.navbar-brand').addClass('invisible');
            }
        })
    }
    $(document).on('change','#avatar',function(e){
        e.preventDefault();
        var avatar = $('#avatar')[0].files[0];
        var form = new FormData();
        form.append('avatar',avatar);
        $.ajax({
            url: $(this).attr('alt'),
            data: form,
            type: 'POST',
            contentType: false,
            processData: false,
            cache: false,
            success: function(data){
                $('#profile-setting-avatar').attr('src','../storage/avatar/'+data);
                $('#profile-avatar').attr('src','../storage/avatar/'+data);
            }
        })
    })
    $(document).on('submit','#profile-setting-form',function(e){
        e.preventDefault();
        var username =  $('#username').val()
        var password = '';
        var last = $('#last').val();
        var first = $('#first').val();
        var email = $('#email').val();
        var number = $('#number').val();
        var facebook = $('#facebook').val();
        var twitter = $('#twitter').val();
        var instagram = $('#instagram').val();
        var description = $('#description').val();
        var form = new FormData();
        form.append('username',username);
        form.append('last',last);
        form.append('first',first);
        form.append('email',email);
        form.append('password',password);
        form.append('number',number);
        form.append('facebook',facebook);
        form.append('twitter',twitter);
        form.append('instagram',instagram);
        form.append('description',description);
        $.ajax({
            url: $(this).attr('action'),
            data: form,
            type: 'POST',
            contentType: false,
            processData: false,
            cache: false,
            success: function(data){
                $('#last').val('');
                $('#first').val('');
                $('#email').val('');
                $('#number').val('');
                $('#facebook').val('');
                $('#twitter').val('');
                $('#instagram').val('');
                $('#description').val('');
            }
        })
    })
    $(document).on('click','.react-btn',function(e){
        var id = $(this).attr('name');
        e.preventDefault();
        var method;
        $.ajax({
            url: $(this).attr('href'),
            type: 'post',
            data: {
                post_id: $(this).attr('name'),
                react: $(this).attr('alt'),
                method: 'post'
            },
            success: function(data){
                console.log(data);
                likecounter = $('.like-counter[alt='+id+']').text();
                dislikecounter = $('.dislike-counter[alt='+id+']').text();
                if(data == 'dislike'){
                    if($('.dislike-btn[name='+id+']').hasClass('react-btn-active')){
                        $('.dislike-btn[name='+id+']').removeClass('react-btn-active');
                            $('.dislike-counter[alt='+id+']').text(dislikecounter - 1);
                    }else{
                        $('.dislike-btn[name='+id+']').addClass('react-btn-active');
                        if($('.like-btn[name='+id+']').hasClass('react-btn-active')){
                            $('.like-counter[alt='+id+']').text(likecounter - 1);
                        }
                        $('.dislike-counter[alt='+id+']').text(parseInt(dislikecounter) + 1);
                    }
                    $('.like-btn[name='+id+']').removeClass('react-btn-active');
                }else if(data == 'like'){
                    if($('.like-btn[name='+id+']').hasClass('react-btn-active'))
                    {
                        $('.like-btn[name='+id+']').removeClass('react-btn-active')
                        $('.like-counter[alt='+id+']').text(likecounter - 1);
                    }else{
                        $('.like-btn[name='+id+']').addClass('react-btn-active')
                        if($('.dislike-btn[name='+id+']').hasClass('react-btn-active')){
                            $('.dislike-counter[alt='+id+']').text(dislikecounter - 1);
                        }
                        $('.like-counter[alt='+id+']').text(parseInt(likecounter) + 1);
                    }
                    $('.dislike-btn[name='+id+']').removeClass('react-btn-active');
                }
            }
        })
    })
    $(document).on('click','#follow-btn',function(e){
        e.preventDefault();
        $.ajax({
            url: $(this).attr('href'),
            type: 'post',
            data: {
                user_id: $(this).attr('name'),
                follower_id:$(this).attr('alt'),
                status: 'follow'
            },
            success: function(data){
                if($("#follow-btn").hasClass('btn-follow')){
                    $("#follow-btn").removeClass('btn-follow');
                    $("#follow-btn").addClass('btn-unfollow');
                    $("#follow-btn").text('Unfollow')
                }else{
                    $("#follow-btn").addClass('btn-follow');
                    $("#follow-btn").removeClass('btn-unfollow');
                    $("#follow-btn").text('Follow')
                }
                $('.follow-counter').html(data);
                console.log(data);
            }
        })
    })
    $(document).on('keydown','#search-input',function(e){
        let newSearch = $(this).val();
        if(e.keyCode == '13'){
            if(newSearch !== ''){
                $.ajax({
                    url: '/search',
                    type: 'post',
                    data: {
                    }
                })
            }
        }
    });
    $(document).on('focusout','#search-input',function(){
        rememberSearch = $(this).val();
        $(this).val('');
    })
    $(document).on('focus','#search-input',function(){
        $(this).val(rememberSearch);
    })
})