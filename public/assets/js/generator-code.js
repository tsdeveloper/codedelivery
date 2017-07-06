 <script>

$(document).ready(function(){

        $('#btn-code').click(function(e) {
        e.preventDefault();
        var dataString = form.serialize();

                var formAction = form.attr('action');
                var token =  $("input[name=_token]").val();
                var indication = $("input[name=indication_name]").val();
                $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

            $.ajax({
            type: "get",
            url: formAction,
            data: dataString,
            cache: false,
            success: function(data) {
        console.log(data);
        console.log("success");
    },
    error: function(data) {  
        console.log(data);
        console.log("error");                 
    }
        },"json");
     });
 });

            </script>