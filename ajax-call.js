 setInterval(function(){

              $.ajax({
              url: "script/ajax_call.php",
              dataType: 'text',
              success: function (response){
                if(response != 0){
                    $('#notificationCount').html(response);
                }else{
                    $('#notificationCount').html("");
                }
              },
              error: function (response){
                  alert('something went wrong please contact to administrator');
              }
          });


          },1000);