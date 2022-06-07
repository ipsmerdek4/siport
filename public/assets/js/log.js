
        $('.btn--pass').click(function(e){ 
          var target = e.currentTarget; 
          $(target).hasClass('hide')? showPassword() : hidePassword() ; 
        });

        function showPassword(){
            $('.btn--pass').removeClass('hide').addClass('show');
            $('.u-pass-d').attr('type','text');
            $('#ico-pass').removeClass('ion-ios-eye').addClass('ion-eye-disabled'); 
            $("#ico-pass").css("font-size", "21px");

        } 
        
        function hidePassword(){
            $('.btn--pass').removeClass('show').addClass('hide');
            $('.u-pass-d').attr('type','password');
            $('#ico-pass').removeClass('ion-eye-disabled').addClass('ion-ios-eye'); 
            $("#ico-pass").css("font-size", "25px");
        } 
