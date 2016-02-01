<script>
    $('#make_admin').on('click',function(e){
        e.preventDefault();
        var form = $(this).parents('form');
        swal({
                    title: "Are you sure?",
                    text: "You will give this user all privileges",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes!",
                    allowEscapeKey: true,
                    allowOutsideClick:false
                },
                function(isConfirm){
                    if (isConfirm)
                    {
                        form.submit();
                    }
                });})
</script>

<script>
    $('#make_user').on('click',function(e){
        e.preventDefault();
        var form = $(this).parents('form');
        swal({
                    title: "Are you sure?",
                    text: "You will remove all privileges from this administrator",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes!",
                    allowEscapeKey: true,
                    allowOutsideClick:false
                },
                function(isConfirm){
                    if (isConfirm)
                    {
                        form.submit();
                    }
                });})
</script>
@if($user->level==0)
    <script>
        $('#del').on('click',function(e){
            e.preventDefault();
            var form = $(this).parents('form');
            swal({
                        title: "Are you sure?",
                        text: "You will not be able to recover user's account",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, delete it!",
                        allowEscapeKey: true,
                        allowOutsideClick:false
                    },
                    function(isConfirm){
                        if (isConfirm)
                        {
                            form.submit();
                        }
                    });})
    </script>
@elseif($user->level==1)
    <script>
        $('#del').on('click',function(e){
            e.preventDefault();
            var form = $(this).parents('form');
            swal({
                        title: "Are you sure?",
                        text: "You will delete a fellow administrator's account, as well as all of his files",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, delete it!",
                        allowEscapeKey: true,
                        allowOutsideClick:false
                    },
                    function(isConfirm){
                        if (isConfirm)
                        {
                            form.submit();
                        }
                    });})
    </script>
@endif

@if (Session::has('email_edited'))<script>swal({
        title:"Good job!",
        text:"You successfully changed user's email address",
        type:"success",
        timer:2000,
    })</script>
@endif

@if (Session::has('acc_admin'))<script>swal({
        title:"Good job!",
        text:"You successfully made a user an administrator",
        type:"success",
        timer:2000,
    })</script>
@endif

@if (Session::has('acc_not_admin'))<script>swal({
        title:"Good job!",
        text:"You successfully made an administrator a user",
        type:"success",
        timer:2000,
    })</script>
@endif

@if (Session::has('username_edited'))<script>swal({
        title:"Good job!",
        text:"You successfully changed user's username",
        type:"success",
        timer:2000,
    })</script>
@endif

@if (Session::has('pass_edited'))<script>swal({
        title:"Good job!",
        text:"You successfully changed user's email password",
        type:"success",
        timer:2000,
    })</script>
@endif

@if (Session::has('img_edited'))<script>swal({
        title:"Good job!",
        text:"You successfully changed user's profile image",
        type:"success",
        timer:2000
    })</script>
@endif