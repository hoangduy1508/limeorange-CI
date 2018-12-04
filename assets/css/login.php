<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="login-wrap">
    <div class="login">
        <div id="loginMessage"></div>
		<div class="title-center">ĐĂNG NHẬP OK-MEMBERSHIP</div>
        <div class="login-inner">
        <p class="membership-text2">
            Chân thành chúc mừng bạn đã gia nhập làm hội viên của OK-MEMBERSHIP
        <br><br>
        OK-MEMBERSHIP ở đây là tư cách thành viên của Hội viên tổng hợp. Thành viên gia nhập vào OK-MEMBERSHIP có thể sử dụng riêng các trang LIME ORANGE, KCLIVE, BW PROJECT mà không cần gia nhập làm thành viên. Bạn nào có sẵn ID của một trong ba trang KCLIVE, LIME ORANGE, BW thì có thể đăng nhập theo ID ở trang đó.


        </p>
        <div class="link with">
            <p class="link-sns-tit ">ĐĂNG NHẬP BẰNG</p>
            
            <div class="link-sns">
                <a href="{$urlLoginFacebook}" title="Đăng nhập với tài khoản Facebook">
                    <img src="themes/public/default/images/login-facebook.png">
                </a>
                <a href="{$urlLoginGoogle}" title="Đăng nhập với tài khoản Google">
                    <img src="themes/public/default/images/login-google.png">
                </a>
            </div>
        
            
        </div>

		<form id="frmLogin" name="frmLogin" action="post" method="">
            <p class="with-text">ĐĂNG NHẬP BẰNG EMAIL</p>
			<!-- login-item -->
			<div class="login-box">

				<div class="login-item">
					<span class="login-label">TÀI KHOẢN</span>
					<input type="text" id="email" class="login-input" name="account" value="">
				</div>
				<div class="login-item ">
					<span class="login-label">MẬT KHẨU</span>
					<input type="password" class="login-input" name="password" value="">
				</div>
                <input type="hidden" name="url_referer" id="url_referer" value="{$url_referer}" />
				
			</div>
           <input type="submit" style="cursor: pointer;" class="login-btn" name="" value="ĐĂNG NHẬP">
            <a rel="nofollow" href="http://okmember.com/main/index?preview_page=KC" class="join-link register-btn">ĐĂNG KÝ</a>
			<!--//END login-item -->
		</form>        
          
            <ul class="forgot">
                <li class="forgot-link">
                    <a href="http://okmember.com/account/findAccount?preview_page=KC">Quên tài khoản?</a>
                </li>
                <li class="forgot-link">
                    <a href="http://okmember.com/account/findPassword?preview_page=KC">Quên mật khẩu?</a>
                </li>
            </ul>
        </div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){    
    $("input[name=account]").bind('focus', function(e){
      e.preventDefault();
    });
    $("input[name=account]").focus();
    
    $('form#frmLogin').on('submit',function(){        
        try{
            var a = $("input[name=account]").val();
            var p = $("input[name=password]").val();
            var u = $('input[name=url_referer]').val();
            if(a == '')
            {
                fx.displayInnerHtml('loginMessage', 'Vui lòng nhập email của bạn!', 5000);
                $("input[name=account]").focus();
                return false;
            }
            else
            {
                reg = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if(!a.match(reg))
                {
                    fx.displayInnerHtml('loginMessage', 'Email bạn nhập không hợp lệ!', 5000);
                    $("input[name=account]").focus();
                    return false;
                }    
            }
            if(p == '')
            {
                fx.displayInnerHtml('loginMessage', 'Vui lòng nhập mật khẩu của bạn!', 5000);
                $("input[name=password]").focus();
                return false;
            }
            $.ajax({
                url : base_url + 'member_ajax/login/',
                type: 'POST',
                dataType : "json",
                data:{account:a,password:p,url_referer: u},
                success:function(data){
                    if(data.error == '0'){
                        if(typeof data.redirect == 'string' && data.redirect != '')
                        {
                            setTimeout(function(){location.href = data.redirect}, (500));
                        }
                    }
                    else
                    {
                        fx.displayInnerHtml('loginMessage', data, 3000);
                    }
                }
            });
        }catch(e){
            console.log('Đã có lỗi xảy ra ở client:' + e.message);
        }
        return false;
    });    
});
</script>