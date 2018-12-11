<?php
if(!isset($_SESSION)) session_start();
if(1){
header("Content-Type: text/html;charset=UTF-8");
?>
<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Angkot Malang : Peta jalur angkot malang" />
<meta name="keywords" content="Angkot, Malang, pariwisata, jalan, peta" />
<meta name="author" content="Sabri Sangjaya Yudha Kusuma Putra"/>
<!-- Le styles -->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="assets/css/font-awesome.css">
<!--[if IE 7]>
<link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css">
<![endif]-->
<link href="assets/css/bootplus.css" rel="stylesheet">
<link href="assets/css/bootplus-responsive.css" rel="stylesheet">
<link href="assets/css/docs.css" rel="stylesheet">
<link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/img/favicon.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/img/favicon.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/img/favicon.png">
<link rel="apple-touch-icon-precomposed" href="assets/img/favicon.png">
<link rel="shortcut icon" href="assets/img/favicon.png">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="assets/js/html5shiv.js"></script>
<![endif]-->
<style>
.containerbody{background:#fff;padding:20px;}
@font-face {
font-family: 'icomoon';
src:  url('fonts/icomoon.eot?8l1ne8');
src:  url('fonts/icomoon.eot?8l1ne8#iefix') format('embedded-opentype'),
url('fonts/icomoon.ttf?8l1ne8') format('truetype'),
url('fonts/icomoon.woff?8l1ne8') format('woff'),
url('fonts/icomoon.svg?8l1ne8#icomoon') format('svg');
font-weight: normal;
font-style: normal;
}
[class^="iconn-"], [class*=" iconn-"] {
/* use !important to prevent issues with browser extensions that change fonts */
font-family: 'icomoon' !important;
speak: none;
font-style: normal;
font-weight: normal;
font-variant: normal;
text-transform: none;
line-height: 1;
/* Better Font Rendering =========== */
-webkit-font-smoothing: antialiased;
-moz-osx-font-smoothing: grayscale;
}
.iconn-text:before {
content: "\e900";
}
.iconn-logo:before {
content: "\e901";
}
.iconn-rpl:before {
content: "\e902";
}
</style>
<!-- <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script> -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap-transition.js"></script>
<script src="assets/js/bootstrap-alert.js"></script>
<script src="assets/js/bootstrap-modal.js"></script>
<script src="assets/js/bootstrap-dropdown.js"></script>
<script src="assets/js/bootstrap-scrollspy.js"></script>
<script src="assets/js/bootstrap-tab.js"></script>
<script src="assets/js/bootstrap-tooltip.js"></script>
<script src="assets/js/bootstrap-popover.js"></script>
<script src="assets/js/bootstrap-button.js"></script>
<script src="assets/js/bootstrap-collapse.js"></script>
<script src="assets/js/bootstrap-carousel.js"></script>
<script src="assets/js/bootstrap-typeahead.js"></script>
<script src="assets/js/bootstrap-affix.js"></script>
<script src="assets/js/holder/holder.js"></script>
<script src="assets/js/google-code-prettify/prettify.js"></script>
<script src="assets/js/application.js"></script>

<style>
.embed-responsive {
position: relative;
display: block;
height: 0;
padding: 0;
overflow: hidden;
}
.embed-responsive .embed-responsive-item,
.embed-responsive iframe,
.embed-responsive embed,
.embed-responsive object,
.embed-responsive video {
position: absolute;
top: 0;
bottom: 0;
left: 0;
width: 100%;
height: 100%;
border: 0;
}
.embed-responsive-16by9 {
padding-bottom: 56.25%;
}
.embed-responsive-4by3 {
padding-bottom: 75%;
}


</style>

<link rel="stylesheet" type="text/css" href="./slick/slick.css">
<link rel="stylesheet" type="text/css" href="./slick/slick-theme.css">
<script src="./slick/slick.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
$(document).on('ready', function() {
$(".center").slick({
infinite: true,
arrows: false,
autoplay: true,
autoplaySpeed: 5000,
slidesToShow: 1,
slidesToScroll: 1
});
});
</script>
<script type="text/javascript" src="assets/jquery.fancybox.pack.js?v=2.1.7"></script>
<link rel="stylesheet" type="text/css" href="assets/jquery.fancybox.css?v=2.1.7" media="screen" />
<style>
.fancybox .col-md-3{
	margin-bottom:30px;
}
	.fancybox-lock .fancybox-overlay {
    overflow: auto;
        overflow-y: auto;
    overflow-y: scroll;
    background: rgba(0,0,0,0.6);
	}
</style>
<?php
}
?>