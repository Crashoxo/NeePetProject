
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

            $('#eyseOpen-4').click(function(){
              
                $('#eyseOpen-4').hide()
                $('#eyseOpen-3').show()
                $('#chenge-2').attr('type', 'text')
            })
            $('#eyseOpen-3').click(function(){
                $('#eyseOpen-3').hide()
                $('#eyseOpen-4').show()
                $('#chenge-2').attr('type', 'password')
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


            // 新增信用卡
              $('.create-btn').click(function(){
                $('#app').fadeToggle();
              })

              $('#renew-btn').click(function(){
                $('#renew-btn').css({'background-color':'#F4F3F2'});
                $('#store-btn').css({'background-color':'rgb(248, 199, 63)'});
              })
              

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
              
              
          new Vue({
            el:'#app',
            data:{
                cardNumber: '',
                holderName:'',
                monthInput:'',
                yearInput:'',
                cvvBox:'',
            },
          })
          
          

      }).hide().fadeIn('slow');  
    });
  
 

   

// input驗證框
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

//更改按鈕，取消disabled
function renew() {
  document.getElementById('original-password').disabled=false;
  document.getElementById('chenge-new-password').disabled=false;
  document.getElementById('cfm-password').disabled=false;
}
function personal() {
  document.getElementById('burger').setAttribute('checked', 'checked');
  document.getElementById('name-form').disabled=false;
  document.getElementById('email-form').disabled=false;
  document.getElementById('phone-form').disabled=false;
  document.getElementById('sex-boy').disabled=false;
  document.getElementById('sex-gril').disabled=false;
  document.getElementById('chenge-day').disabled=false;
  document.getElementById('chenge-month').disabled=false;
  document.getElementById('chenge-year').disabled=false;
}





// 更改密碼驗證
function check_data() {
  if(document.myForm.password.value != document.myForm.re_password.value){
      alert("「密碼確認」欄位與「使用者密碼」欄位一定要相同...");
      return false;
  }
}

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


$('#renew-btn').click(function(){
  $('#renew-btn').css({'background-color':'#F4F3F2'});
  $('#store-btn').css({'background-color':'rgb(248, 199, 63)'});
})


