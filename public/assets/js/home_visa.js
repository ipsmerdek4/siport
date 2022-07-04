
          (function($) {
            $.fn.inputFilter = function(callback, errMsg) {
              return this.on("input keydown keyup mousedown mouseup select contextmenu drop focusout", function(e) {
                if (callback(this.value)) {
                  // Accepted value
                  if (["keydown","mousedown","focusout"].indexOf(e.type) >= 0){
                    $(this).removeClass("input-error");
                    this.setCustomValidity("");
                  }
                  this.oldValue = this.value;
                  this.oldSelectionStart = this.selectionStart;
                  this.oldSelectionEnd = this.selectionEnd;
                } else if (this.hasOwnProperty("oldValue")) {
                  // Rejected value - restore the previous one
                  $(this).addClass("input-error");
                  this.setCustomValidity(errMsg);
                  this.reportValidity();
                  this.value = this.oldValue;
                  this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                } else {
                  // Rejected value - nothing to restore
                  this.value = "";
                }
              });
            };
          }(jQuery));

          $(document).ready(function() {

                  $('.card-number').inputFilter(function(value) {
                      return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 9999999999999999); 
                  }, "Max 16 Digit Number"); 

                  $('.card-expiry-month').inputFilter(function(value) {
                      return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 99); 
                  }, "Max 2 Digit Number"); 

                  $('.card-expiry-year').inputFilter(function(value) {
                      return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 9999); 
                  }, "Max 4 Digit Number"); 

                  var options = {
                      performAuthentication: function(redirect_url){
                          openDialog(redirect_url);
                      },
                      onSuccess: function(response){ 
                          $.ajax({
                              type: "post",
                              url: "/checkout/request",
                              data: {
                                id_encrypt: $('.id_encrypt').val(), 
                                order_id: response.order_id,
                                bank: response.bank, 
                                payment_type: response.payment_type,
                                currency: response.currency,
                                gross_amount: response.gross_amount,
                                no_card: $('.card-number').val(),
                                name_card: $('.name-numbers').val(),
                                transaction_status: response.transaction_status,
                                status_message: response.status_message,
                                transaction_time: response.transaction_time
                              },
                              dataType: "json",
                              success: function (response) {
                                  console.log(response); 
                                  if (response.sts == 200) { 
                                    closeDialog(); 
                                    Swal.fire({
                                              title: 'Success',
                                              text: 'Your Payment is Successful',
                                              icon: 'success',
                                              showConfirmButton: false, 
                                              showDenyButton: true,
                                              denyButtonText: 'Close',
                                            }).then((result) => { 
                                                if (result.isDenied) {
                                                    document.location.href = '/myorder';
                                                }
                                            });
                                  }
                              }
                          });


                      },
                      onFailure: function(response){ 
                        $.ajax({
                              type: "post",
                              url: "/checkout/request",
                              data: {
                                id_encrypt: $('.id_encrypt').val(), 
                                order_id: response.order_id,
                                bank: response.bank, 
                                payment_type: response.payment_type,
                                currency: response.currency,
                                gross_amount: response.gross_amount,
                                no_card: $('.card-number').val(),
                                name_card: $('.name-number').val(),
                                transaction_status: response.transaction_status,
                                status_message: response.status_message,
                                transaction_time: response.transaction_time
                              },
                              dataType: "json",
                              success: function (responseX) { 
                                    closeDialog(); 
                                    Swal.fire({
                                          title: 'Error',
                                          text: response.status_message,
                                          icon: 'error',          
                                          showConfirmButton: false, 
                                          showDenyButton: true,
                                          denyButtonText: 'Close',
                                    }).then((result) => {
                                        if (result.isDenied) {
                                            document.location.href = '/myorder';
                                        }
                                    });

                              }
                          }); 
                      },
                      onPending: function(response){
                          $.ajax({
                              type: "post",
                              url: "/checkout/request",
                              data: {
                                id_encrypt: $('.id_encrypt').val(), 
                                order_id: response.order_id,
                                bank: response.bank, 
                                payment_type: response.payment_type,
                                currency: response.currency,
                                gross_amount: response.gross_amount,
                                no_card: $('.card-number').val(),
                                name_card: $('.name-number').val(),
                                transaction_status: response.transaction_status,
                                status_message: response.status_message,
                                transaction_time: response.transaction_time
                              },
                              dataType: "json",
                              success: function (responseX) { 
                                    closeDialog(); 
                                    Swal.fire({
                                          title: 'Error',
                                          text: response.status_message,
                                          icon: 'error',          
                                          showConfirmButton: false, 
                                          showDenyButton: true,
                                          denyButtonText: 'Close',
                                    }).then((result) => {
                                        if (result.isDenied) {
                                            document.location.href = '/myorder';
                                        }
                                    });

                              }
                          }); 
                      }
                  };

                  function openDialog(url) {
                      $.featherlight({
                          iframe: url, 
                          iframeMaxWidth: '100%', 
                          iframeWidth: 450, 
                          iframeHeight: 500,
                          closeOnClick: false,
                          closeOnEsc: false,
                          closeIcon: 'X'
                      });
                  }

                  function closeDialog() {
                      $.featherlight.close();
                  }
 
                  $(".submit-button-visa").click(function (event) { 
                      $('.cardnumbermsg').html(' ');
                      $('.cardholdermsg').html(' ');
                      $('.expirationmsg1').html(' ');
                      $('.expirationmsg2').html(' ');
                      $('.cvvmsg').html(' '); 
                      
                      var nilaix = 0;
                      let name = $('.name-numbers').val();
                      var card = {
                          "card_number": $(".card-number").val(),
                          "card_exp_month": $(".card-expiry-month").val(),
                          "card_exp_year": $(".card-expiry-year").val(),
                          "card_cvv": $(".card-cvv").val()
                      }; 
 
                      event.preventDefault(); 

                      if (card.card_number == "") {  
                          $('.cardnumbermsg').append('<b class="text-danger">Card Number cannot be empty</b>');
                      }else{  
                          $('.cardnumbermsg').html(' ');
                          nilaix += 1;  
                      }
                       
                      if (name == "") {  
                          $('.cardholdermsg').append('<b class="text-danger">Cardholder Name cannot be empty</b>');
                      }else{  
                          $('.cardholdermsg').html(' ');
                          nilaix += 1;  
                      }
                       
                      if (card.card_exp_month == "") {  
                          $('.expirationmsg1').append('<b class="text-danger">Expiration Date Month cannot be empty</b>');
                      }else{  
                          $('.expirationmsg1').html(' ');
                          nilaix += 1;  
                      }
                      
                      if (card.card_exp_year == "") {  
                          $('.expirationmsg2').append('<b class="text-danger"><br>Expiration Date Year cannot be empty</b>');
                      }else{  
                          $('.expirationmsg2').html(' ');
                          nilaix += 1;  
                      }
                      
                      if (card.card_cvv == "") {  
                          $('.cvvmsg').append('<b class="text-danger">Card CVV cannot be empty</b>');
                      }else{  
                          $('.cvvmsg').html(' ');
                          nilaix += 1;  
                      }
                        
                       
                      if (nilaix == 5) {
                            MidtransNew3ds.getCardToken(card, getCardTokenCallback);  
                            return false;  
                      }else{ 
                        return false;  
                      }
                       

                  });


                  // callback functions
                  var getCardTokenCallback = {
                      onSuccess: function(response) { 
                          var token_id = response.token_id;  
                          var id_encrypt = $('.id_encrypt').val();  
                          $.ajax({
                              type: 'POST',
                              url: '/checkout', 
                              data: {
                                token_id: token_id,
                                id_encrypt: id_encrypt,
                              },
                              dataType: "json",
                              success: function(responseX){  
                                  let dataResult = JSON.stringify(responseX, null, 2);
                                  let dataObj = JSON.parse(dataResult); 
                                  if (dataObj.redirect_url){ 
                                      MidtransNew3ds.authenticate(dataObj.redirect_url, options); 
                                  }  
                              },
                              error: function(xhr, status, error){
                                  console.error(xhr);
                              }
                          });
                             
                      },
                      onFailure: function(response) { 
                          console.log('Fail to get card token_id, response:', response);
                          closeDialog(); 
                      }
                  };
  
          });