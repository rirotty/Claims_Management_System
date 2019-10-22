//menu 
$(document).ready(function(){
    
    $('.topbar').click(function(){
        $('.nav-collapse').toggle('slide');
    });
    });


//dropdown
jQuery(document).ready(function() {
        jQuery('.sub-menu').click(function(e) {
          jQuery(this).toggleClass('active');
          jQuery('.sub li').toggleClass('active');

          e.preventDefault();
        });
      });
//arrow flip
jQuery('#sidebar .sub-menu > a').click(function () {
        var last = jQuery('.sub-menu.open', jQuery('#sidebar'));        
        jQuery('.menu-arrow').removeClass('arrow_carrot-right');
        jQuery('.sub', last).slideUp(200);
        var sub = jQuery(this).next();
        if (sub.is(":visible")) {
            jQuery('.menu-arrow').addClass('arrow_carrot-right');            
            sub.slideUp(200);
        } else {
            jQuery('.menu-arrow').addClass('arrow_carrot-down');            
            sub.slideDown(200);
        }
        var o = (jQuery(this).offset());
        diff = 200 - o.top;
        if(diff>0)
            jQuery("#sidebar").scrollTo("-="+Math.abs(diff),500);
        else
            jQuery("#sidebar").scrollTo("+="+Math.abs(diff),500);
    });
//end arrow flip
//end dropdown



$(document).ready(function(){
    $('#userName').blur(function(){
    var userName=$(this).val() ;
    $.ajax({
       url:"connect.php",
       method:"POST",
       data:{userName:userName},
       dataType:"text",
       success:function(html){
           $('#availibility').html(html);
       }
    });
    });
});

function checkPassword() {
    var password = $("#password").val();
    var confirmPassword = $("#confirmPassword").val();
    /*if ((password='')|| (confirmPassword=''))
    {
    $("#divcheckPassword").html('');
} */


     if (password != confirmPassword &&  confirmPassword != ''){
         
        $("#divcheckPassword").html('<span class="text-danger">Passwords do not match!</span>');}
    if(password == confirmPassword)
    { $("#divcheckPassword").html('<span class="text-success">Passwords match</span>');}
    }
    

/* $('#productId').change(function()
    {
        var first = $('#productId').val();
        var req = $.get('connect.php', {dd: first, action: 'ajax'});
        req.done(function(data)
       
            $('#moduleId').html(data);
        });
    });  */

$(document).ready(function(){
    $('#productId').on('change',function(){
        var productId = $(this).val();
        if(productId){
            $.ajax({
                type:'GET',
                url:'connect.php?productId='+productId,
                success:function(html){
                    $('#moduleId').html(html);
                }
            }); 
        }else{
            $('#moduleId').html('<option value="">Select product first</option>');
            
 
        }
    });
    });


                            