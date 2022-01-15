function login(){
    var user_name = $('#user_name').val();
    var password = $('#password').val();
    var alert_div = document.getElementById("alert");

    if(user_name == "" || password == ""){
        $('#alert').empty()
        alert_div.innerHTML += '<div class="alert alert-danger">Incomplete fields</div>';
        return false;
    }

    $.ajax({
        url:"loginFetch.php",
        method:"POST",
        data:{
            user_name:user_name,
            password:password
        },
        dataType:"JSON",
        success:function(data){
            if(data == 1){
                window.location = "index.php";
            } else if(data == 2){
                $('#alert').empty()
                alert_div.innerHTML += '<div class="alert alert-danger">Incorrect User Name or Password</div>';
            }
        }
    })
}