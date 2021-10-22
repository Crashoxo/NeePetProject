
    $('.member-system-part a').on('click', function(e) {      
      e.preventDefault();                   
      var url = this.href;                    
    
      $('.member-system-part a.member-current').removeClass('member-current');  
      $(this).addClass('member-current');             
    
      $('#member-container').remove();                           
      $('#member-userinfo').load(url + ' #member-userinfo',function(){

        $('.member-title-text').click(function(){
          
        });
        $('#eyseOpen-2').click(function(){
              
                $('#eyseOpen-2').hide()
                $('#eyseOpen').show()
                $('#original-password').attr('type', 'text')
            })
            $('#eyseOpen').click(function(){
                $('#eyseOpen').hide()
                $('#eyseOpen-2').show()
                $('#original-password').attr('type', 'password')
            })



            
     

            
// ------------------------users-password.php-----------------------
            $('#eyseOpen-4').click(function(){
              
                $('#eyseOpen-4').hide()
                $('#eyseOpen-3').show()
                $('#chenge-new-password').attr('type', 'text')
            })
            $('#eyseOpen-3').click(function(){
                $('#eyseOpen-3').hide()
                $('#eyseOpen-4').show()
                $('#chenge-new-password').attr('type', 'password')
            })

            $('#eyseOpen-6').click(function(){
              
                $('#eyseOpen-6').hide()
                $('#eyseOpen-5').show()
                $('#cfm-password').attr('type', 'text')
            })
            $('#eyseOpen-5').click(function(){
                $('#eyseOpen-5').hide()
                $('#eyseOpen-6').show()
                $('#cfm-password').attr('type', 'password')
            })

// -----------------------------------creditcard----------------------------------------

            // 新增信用卡
              $('.create-btn').click(function(){
                $('#app').fadeToggle();
              })

              $('#renew-btn').click(function(){
                $('#renew-btn').css({'background-color':'#F4F3F2'});
                $('#store-btn').css({'background-color':'rgb(248, 199, 63)'});
              })
              



// -----------------------------------------common-------------------------------------------
              var inputs = document.querySelectorAll('input')
              inputs.forEach(function(input){
                input.addEventListener('input',function(){
                  if(input.checkValidity()){
                    input.classList.add('valid')
                  }else{
                    input.classList.remove('valid')
                  }
                })
              })
              
              
          // new Vue({
          //   el:'#app',
          //   data:{
          //       cardNumber: '',
          //       holderName:'',
          //       monthInput:'',
          //       yearInput:'',
          //       cvvBox:'',
          //   },
          // })
          
          

      }).hide().fadeIn('slow');  
    });
  
    
   

   

// input驗證框
// var inputs = document.querySelectorAll('input')
// inputs.forEach(function(input){
//   input.addEventListener('input',function(){
//     if(input.checkValidity()){
//       input.classList.add('valid')
//     }else{
//       input.classList.remove('valid')
//     }
//   })
// })




// function fsub(){
//   document.getElementsByName('userChange').submit();
// }

// ------------------------users-password.php--------------------------------------------

//更改按鈕，取消disabled
// $(document).ready(function() {
//   $(window).on('load', function () {
//     $(".renew-btn").click(function(){
//       document.getElementById('chenge-new-password').disabled=false;
//       document.getElementById('cfm-password').disabled=false;
//       $(this).hide();
//       $('.renew-btn').css({'background-color':'#F4F3F2'});
//       alert("hhh");
//       console.log('hh');
//     }); 
//   });
// });


function renew() {
  // document.getElementById('original-password').disabled=false;
  document.getElementById('chenge-new-password').disabled=false;
  document.getElementById('cfm-password').disabled=false;
  document.getElementById('renew-btn').innerText = "確認";
}

// 更改密碼驗證
var ik=false;
function check_data() {
  if(document.myForm.password.value != document.myForm.re_password.value){
    alert("「密碼確認」錯誤");
    return false;
  }
  else if(ik==false){
    alert('「舊密碼」錯誤');
    return false;
  }
  else{
    alert('變更成功');
    return true;
  }
}

    function checkAccount(){
      ik=false;
        const xhttp = new XMLHttpRequest();
        let pwd = document.myForm.oldpassword.value;

        xhttp.onreadystatechange = function(){
          if (this.readyState == 4 && this.status == 200) {
            mesg = xhttp.responseText.trim();
            if(mesg==0){
              document.myForm.oldpassword.value = '';
              // document.getElementById('oldpassword').setAttribute("placeholder","密碼錯誤請重新輸入");
              document.getElementById('oldpassword').innerText='密碼錯誤請重新輸入';
              ik=false;
            }
            else{
              ik=true;
              document.getElementById('oldpassword').innerText='舊密碼';
            }
          }
        };

        xhttp.open("POST", "oldpasswordcheckC.php");
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("oldpassword="+pwd);

    }





// ------------------------users-html.php--------------------------------------------------------


function personal() {
  document.getElementById('burger').setAttribute('checked', 'checked');
  document.getElementById('renew-btn').style.display = 'none';
}



//---------------------credit-card-------------------------------------------------------------------
// 關閉新增信用卡視窗
function closeBtn(){
  document.querySelector('#app').style.display = 'none'
}


function turnback() {
  document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(-180deg)';
  document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(0deg)';
}
function turnfront() {
  document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(0deg)';
  document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(180deg)';
}

// document.getElementById('myff').addEventListener('keydown', logKey);
// document.getElementById('member-userinfo').addEventListener('keydown', logKey);

function cin(e) {
  document.getElementById('cardNumber').innerText = document.getElementById('cardNumberin').value;
}
function hin(e) {
  document.getElementById('holderName').innerText = document.getElementById('holderNamein').value;
}
function min(e) {
  document.getElementById('monthInput').innerText = document.getElementById('monthInputin').value;
}
function yin(e) {
  document.getElementById('yearInput').innerText = '/' + document.getElementById('yearInputin').value;
}
function cvvin(e) {
  document.getElementById('cvvBox').innerText = document.getElementById('cvvBoxin').value;
}

function cpaste(e) {
  setTimeout(()=>{
    document.getElementById('change').setAttribute('placeholder',document.getElementById('cardNumberin').value.slice(0, 4) + '  ****  ****  ****') ;
  }, 400);

    document.querySelector('#app').style.display = 'none'
  
}
function cclear(e) {
  setTimeout(()=>{
    document.getElementById('change').setAttribute('placeholder','') ;  }, 400);
}

// $('#renew-btn').click(function(){
//   $('#renew-btn').css({'background-color':'#F4F3F2'});
//   $('#store-btn').css({'background-color':'rgb(248, 199, 63)'});
// })




 