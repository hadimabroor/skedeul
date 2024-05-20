<?php
/*** set the content type header ***/
header("Content-type: text/css");

$color = $_GET['color'];
?>

<?php if (!empty($_GET['font'])): ?>
body{
    font-family: '<?= $_GET['font'] ?>', sans-serif !important;
}

h1,h2,h3,h4,h5,h6{
    font-family: '<?= $_GET['font'] ?>', sans-serif !important;
}
<?php endif ?>



.btn-primary:not(:disabled):not(.disabled).active, .btn-primary:not(:disabled):not(.disabled):active, .show>.btn-primary.dropdown-toggle {
    color: #fff;
    background-color: #<?= $_GET['color'] ?> !important;
    border-color: #<?= $_GET['color'] ?> !important;
}

.btn-primary:hover {
    color: #fff;
    background-color: #<?= $_GET['color'] ?>;
    border-color: #<?= $_GET['color'] ?>;
}
.btn.btn-primary:hover {
    box-shadow: 0 4px 11px rgb(106 116 123 / 35%);
}

.navbar-light .navbar-nav .nav-link.active, .navbar-light .navbar-nav .nav-link:hover {
    color: #<?= $_GET['color'] ?> !important;
    transition: none
}

.form-control:focus{
    color:#495057;
    background-color:#fff;
    border-color:#<?= $_GET['color'] ?>;
    outline:0;
    box-shadow:none
}

.btn-primary.disabled,.btn-primary:disabled{
    color:#fff;
    background-color:#<?= $_GET['color'] ?>;
    border-color:#<?= $_GET['color'] ?>
}

.btn-outline-primary{
    color:#<?= $_GET['color'] ?>;
    border-color:#<?= $_GET['color'] ?>
}
.btn-outline-primary:hover{
    color:#fff;
    background-color:#<?= $_GET['color'] ?>;
    border-color:#<?= $_GET['color'] ?>
}
.btn-outline-primary.disabled,.btn-outline-primary:disabled{
    color:#<?= $_GET['color'] ?>;
    background-color:transparent
}
.btn-outline-primary:not(:disabled):not(.disabled).active,.btn-outline-primary:not(:disabled):not(.disabled):active,.show>.btn-outline-primary.dropdown-toggle{
    color:#fff;
    background-color:#<?= $_GET['color'] ?>;
    border-color:#<?= $_GET['color'] ?>
}

.btn-link{
    font-weight:500;
    color:#<?= $_GET['color'] ?>;
    text-decoration:none
}

.dropdown-item:focus,.dropdown-item:hover{
    background: #f9f9f9 !important;
    transition: 0.1s;
    color:#<?= $_GET['color'] ?> !important;
    text-decoration:none;
    background-color:transparent
}
.dropdown-item.active,.dropdown-item:active{
    color:#<?= $_GET['color'] ?>;
    text-decoration:none;
    background-color:transparent
}

.custom-file-input:focus~.custom-file-label{
    border-color:#<?= $_GET['color'] ?>;
    box-shadow:0 0 0 .2rem rgba(0,123,255,.25)
}

.navbar-light .navbar-nav .nav-link:focus,.navbar-light .navbar-nav .nav-link:hover{
    color:#<?= $_GET['color'] ?>;
}
.navbar-light .navbar-nav .nav-link.disabled{
    color:rgba(0,0,0,.3)
}
.navbar-light .navbar-nav .active>.nav-link,.navbar-light .navbar-nav .nav-link.active,.navbar-light .navbar-nav .nav-link.show,.navbar-light .navbar-nav .show>.nav-link{
    color:#<?= $_GET['color'] ?>
}
.navbar-light .navbar-text a{
    color:#<?= $_GET['color'] ?>
}
.navbar-light .navbar-text a:focus,.navbar-light .navbar-text a:hover{
    color:#<?= $_GET['color'] ?>
}

.navbar-dark .navbar-nav .nav-link:focus,.navbar-dark .navbar-nav .nav-link:hover{
    color:#<?= $_GET['color'] ?>
}
.navbar-dark .navbar-nav .active>.nav-link,.navbar-dark .navbar-nav .nav-link.active,.navbar-dark .navbar-nav .nav-link.show,.navbar-dark .navbar-nav .show>.nav-link{
    color:#<?= $_GET['color'] ?>
}

.badge-primary{
    color:#fff;
    background-color:#<?= $_GET['color'] ?>
}

.bg-primary{
    background-color:#<?= $_GET['color'] ?>!important
}

.text-primary{
    color:#<?= $_GET['color'] ?>!important
}

.btn.btn-light-primary{
    background:rgba(40,110,251,.1);
    color:#<?= $_GET['color'] ?>
}
.btn.btn-light-primary:hover{
    color:#fff;
    background-color:#<?= $_GET['color'] ?>;
    box-shadow:0 4px 11px rgba(40,110,251,.35)
}

.badge-primary-soft{
    background-color: rgba(106,116,123,.1);
    color: #<?= $_GET['color'] ?>;
}
a.badge-primary-soft:focus,a.badge-primary-soft:hover{
    background-color:rgba(106,116,123,.1);
    color:#<?= $_GET['color'] ?>
}

.badge-white-soft.active{
    background-color:#fff;
    color:#<?= $_GET['color'] ?>
}
.badge-white-soft.active:focus,.badge-white-soft.active:hover{
    background-color:#f6f9fc;
    color:#<?= $_GET['color'] ?>
}

.bg-primary::-moz-selection{
    color:#<?= $_GET['color'] ?>;
    background:#fff
}
.bg-primary::selection{
    color:#<?= $_GET['color'] ?>;
    background:#fff
}
.bg-primary{
    color:#<?= $_GET['color'] ?>;
    background:#fff
}

.svg-injector{
    width:auto;
    height:auto;
    fill:none;
    stroke:currentcolor;
    stroke-width:0;
    stroke-linecap:round;
    stroke-linejoin:round;
    color:#<?= $_GET['color'] ?>
}

.breadcrumb .breadcrumb-item a{
    color:#<?= $_GET['color'] ?>
}

::-moz-selection{
    color:#fff;
    background:#<?= $_GET['color'] ?>
}
::selection{
    color:#fff;
    background:#<?= $_GET['color'] ?>
}
::-moz-selection{
    color:#fff;
    background:#<?= $_GET['color'] ?>
}
.navbar-dark .navbar-text a{
    color:#<?= $_GET['color'] ?>
}
.navbar-dark .navbar-text a:focus,.navbar-dark .navbar-text a:hover{
    color:#<?= $_GET['color'] ?>
}

.scroll-to-top{
    font-size:20px;
    text-align:center;
    color: #<?= $_GET['color'] ?>;
    background-color: rgba(40,110,251,.1);
    text-decoration:none;
    position:fixed;
    bottom:20px;
    right:20px;
    display:none;
    border-radius:50%;
    width:35px;
    height:35px;
    line-height:35px;
    z-index:9999;
    outline:0;
    -webkit-transition:all .3s ease;
    -moz-transition:all .3s ease;
    -o-transition:all .3s ease
}
.scroll-to-top i{
    color:#<?= $_GET['color'] ?>
}
.scroll-to-top:hover{
    color:#fff;
    background:#<?= $_GET['color'] ?>
}
.icon-style-two .icon{
    display:inline-block;
    vertical-align:middle;
    border-radius:50px;
    padding:10px;
    line-height:2.2rem;
    text-align:center;
    background-color:rgba(<?= $_GET['rgb'] ?>,.1) !important;
    color:#<?= $_GET['color'] ?>;
    height:3.5rem;
    width:3.5rem
}

.icon-style-small .icon {
    background-color:rgba(<?= $_GET['rgb'] ?>,.1);
}

.btn.btn-light-primary {
    background-color:rgba(<?= $_GET['rgb'] ?>,.1);
}

.btn.btn-light-primary:hover {
    box-shadow: 0 4px 11px rgba(<?= $_GET['rgb'] ?>,.35);
}

.badge-primary-soft {
    background-color:rgba(<?= $_GET['rgb'] ?>,.1);
}

.list-style1 i{
    color:#<?= $_GET['color'] ?>;
    font-size:12px;
    background:rgba(<?= $_GET['rgb'] ?>,.1);
    border-radius:30px;
    padding:7px;
    line-height:13px
}

.hover-primary:hover{
    color:#<?= $_GET['color'] ?>;
    transition:all .3s ease-in-out
}

.fill-primary{
    fill:#<?= $_GET['color'] ?>
}

.overlay-primary:before{
    background-color:#<?= $_GET['color'] ?>
}

@media (max-width:991.98px){
    .navbar-dark .navbar-nav .nav-link:hover{
        color:#6a747b;
        color:#<?= $_GET['color'] ?>
    }
    .navbar-dark .navbar-nav .nav-link:focus{
        color:#<?= $_GET['color'] ?>
    }
}


.footer-list-style li a:hover{
    color:#<?= $_GET['color'] ?>
}



.footer-list-style-two li a:hover{
    color:#<?= $_GET['color'] ?>;
    text-decoration: underline;
}

.footer-title-style2:after{
    position:absolute;
    content:'';
    background:#<?= $_GET['color'] ?>;
    width:60px;
    height:2px;
    bottom:2px;
    left:0;
    right:0;
    margin:0 auto
}

.accordion>.card .btn-link:after{
    background:0 0;
    content:"-";
    right:17px;
    left:inherit;
    font-size:20px;
    height:auto;
    -webkit-transform:none;
    transform:none;
    width:auto;
    position:absolute;
    color:#<?= $_GET['color'] ?>;
    top:0;
    bottom:0;
    margin:auto 0;
    height:34px
}

.social-icon li a{
    font-size:1.16rem;
    color:#<?= $_GET['color'] ?>
}

.social-icon3 li a{
    width:35px;
    height:35px;
    line-height:35px;
    border:1px solid #<?= $_GET['color'] ?>;
    text-align:center;
    border-radius:50%;
    font-size:15px;
    display:inline-block
}
.social-icon3 li a:hover{
    background-color:#<?= $_GET['color'] ?>;
    color:#fff
}

.tab-style-one .resp-tabs-list li.resp-tab-active{
    border:1px solid #<?= $_GET['color'] ?>;
    border-bottom:none;
    border-color:#<?= $_GET['color'] ?>!important;
    margin-bottom:-1px;
    border-top:4px solid #<?= $_GET['color'] ?>!important;
    border-bottom:0 #fff solid;
    border-bottom:none;
    background-color:#fff;
    color:#<?= $_GET['color'] ?>;
    -ms-border-top-left-radius:5px;
    -webkit-border-top-left-radius:5px;
    -moz-border-top-left-radius:5px;
    -o-border-top-left-radius:5px;
    -ms-border-top-right-radius:5px;
    -webkit-border-top-right-radius:5px;
    -moz-border-top-right-radius:5px;
    -o-border-top-right-radius:5px;
    -ms-border-radius-top-left:5px;
    -webkit-border-radius-top-left:5px;
    -moz-border-radius-top-left:5px;
    -o-border-radius-top-left:5px;
    -ms-border-radius-topright:5px;
    -webkit-border-radius-topright:5px;
    -moz-border-radius-topright:5px;
    -o-border-radius-topright:5px;
    border-top-left-radius:5px;
    border-top-right-radius:5px;
    border-top:none!important;
    border-left:none!important;
    border-right:none!important
}


.tab-style-one .resp-tabs-list li.resp-tab-active:after{
    content:"";
    background:#<?= $_GET['color'] ?>;
    height:1px;
    width:100%;
    position:absolute;
    bottom:-1px;
    left:0;
    margin:0 auto;
    right:0
}

.html-code .copy-clipboard:hover{
    background:#<?= $_GET['color'] ?>;
    color:#fff!important
}

ul.pagination li a {
    background: #f1f1f1;
    padding: 10px 20px;
    color: #<?= $_GET['color'] ?>;
    font-size: 14px;
    font-weight: 500;
    border-radius: 4px;
    margin-right: 4px;
}

ul.pagination li a:hover {
    background:#<?= $_GET['color'] ?>;
    color: #fff !important;
}

.pagination>.active>a{ 
    z-index: 2;
    color: #fff;
    cursor: default;
    background-color: #<?= $_GET['color'] ?> !important;
    border-color: #514adf !important;
}

.icon-plan i {
    background-color: rgba(<?= $_GET['rgb'] ?>,.1);
    border-color: #<?= $_GET['color'] ?>;
    font-size: 16px;
    color: #<?= $_GET['color'] ?>;
    padding: 20px;
    border-radius: 50px;
}

.purple .pricing-label {
  background: #cad2ff;
  color: #<?= $_GET['color'] ?>;
}

.purple .price-tag {
  color: #<?= $_GET['color'] ?>;
}

.ui-state-default:hover {
	background: rgba(40,110,251,.1);
	color: #<?= $_GET['color'] ?>;
}

.ui-state-active {
	background: rgba(40,110,251,.1);
	color: #<?= $_GET['color'] ?>;
}

.staff-rdo > input + div:hover{
    border: 2px solid #<?= $_GET['color'] ?>;
}

.staff-rdo > input:checked + div {
    background-color: #fff;
    border: 2px solid #<?= $_GET['color'] ?>;
    border-radius: 4px;
}

.bg-primary-soft{
    background-color: rgba(<?= $_GET['rgb'] ?>,.1);
    color: #<?= $_GET['color'] ?>;
}

.ui-timepicker-standard .ui-state-hover {
    border: 1px solid #fff !important;
    background-color: rgba(40,110,251,.1) !important;
    color: #<?= $_GET['color'] ?> !important;
}

.learn-more{
    color: #<?= $_GET['color'] ?> !important;
    text-decoration: underline;
}

.btn-aceptar{
    text-decoration: none;
    padding: 5px 10px;
    border-radius: 4px !important;
    color: #<?= $_GET['color'] ?> !important;
    border: 1px solid #<?= $_GET['color'] ?> !important;
    background-color: #fff !important;
    font-size: 12px !important;
}

.btn-aceptar:hover{
    text-decoration: none;
    padding: 5px 10px;
    border-radius: 4px !important;
    color: #fff !important;
    border: 1px solid #<?= $_GET['color'] ?> !important;
    background-color: #<?= $_GET['color'] ?> !important;
    font-size: 12px !important;
}

.service-rdo > input + div:hover{
    border: 2px solid #<?= $_GET['color'] ?>;
}

.service-rdo > input{ 
    visibility: hidden; 
    position: absolute;
}

.service-rdo > input:checked + div {
    background-color: #fff;
    border: 2px solid #<?= $_GET['color'] ?>;
    border-radius: 4px;
}

.slider-section .owl-theme .owl-nav [class*=owl-]{
    background:#<?= $_GET['color'] ?>;
    color:#fff;
    width:3rem;
    height:3rem
}
.slider-section .owl-theme .owl-nav [class*=owl-]:hover{
    background:#fff;
    color:#<?= $_GET['color'] ?>
}
.btn-primary {
    color: #fff;
    background-color: #<?= $_GET['color'] ?>;
    border-color: #<?= $_GET['color'] ?>;
}







.team-card:hover .docitem-footer, .team-card:hover .docitem-footer h6, .team-card:hover .docitem-footer p {
    background-color: #<?= $_GET['color'] ?> !important;
    color: #fff !important;
}

.cbtn-fill {
    font-weight: 500;
    padding: 15px 30px;
    min-width: 150px;
    text-align: center;
    border-radius: 5px;
    color: #fff;
    background: #<?= $_GET['color'] ?> !important;
    transition: all .3s ease-in-out 0s;
}

.dept-item-icon{
    background-color: #fff;
    border-radius: 50%;
    color: #<?= $_GET['color'] ?> !important;
    border: 1px solid #<?= $_GET['color'] ?> !important;
    padding: 25px;
    font-size: 16px;
}

.dept-item:hover .dept-item-icon {
  background-color: #<?= $_GET['color'] ?> !important;
  color: #fff !important;
}

.owlstyle-3:hover {
    background-color: #<?= $_GET['color'] ?> !important;
    color: #fff;
    padding: 10px 12px;
    border-radius: 50px;    
    font-size: 18px;
}

.owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span {
    background: #<?= $_GET['color'] ?> !important;
    opacity: 1;
    -webkit-box-shadow: 0 3px 8px 0 rgba(0, 0, 0, 0.25);
    -moz-box-shadow: 0 3px 8px 0 rgba(0, 0, 0, 0.25);
    box-shadow: 0 3px 8px 0 rgba(0, 0, 0, 0.25);
}

.team-card:hover .team_info {
  background-color: #<?= $_GET['color'] ?> !important;
}

.team_social a{
    color: #<?= $_GET['color'] ?> !important;
}

.team-card:hover .team_social a{
  color: #fff !important;
}

.contact-service a{
  color: #<?= $_GET['color'] ?> !important;
}

.powered-by a{
  color: #<?= $_GET['color'] ?> !important;
}

.owlstyle-1:hover {
    background-color: rgba(<?= $_GET['rgb'] ?>,.6) !important;
    color: #fff;
    padding: 20px 22px;
    border-radius: 50px;
}

ul.style3#pills-tab li a.nav-link.active p.icon-style-small i{
    color: #<?= $_GET['color'] ?> !important;
    background: #efefef !important;
}

ul.style3#pills-tab li a.nav-link.active {
    color: #fff;
    background-color: #<?= $_GET['color'] ?> !important;
    border: 1px solid #f1f1f1 !important;
}

.pick-date span {
    color: #<?= $_GET['color'] ?> !important;
    border-bottom: 1px dotted #2d54de;
}

.nav-pills .nav-link.active,.nav-pills .show>.nav-link{
    color: #fff;
    background-color: #<?= $_GET['color'] ?> !important;
}

.nav .nav-link:not(.active):hover {
    border-left-color: #<?= $_GET['color'] ?> !important;
    background: rgba(40,110,251,.1);
    color:#<?= $_GET['color'] ?> !important;
}

.ui-datepicker-header {
    height: 50px;
    line-height: 50px;
    color: #fff;
    background: #<?= $_GET['color'] ?> !important;
    margin-bottom: 10px;
    font-weight: 500;
    font-size: 18px;
    margin-top: -10px;
    margin-left: -10px;
    margin-right: -10px;
}

.ui-datepicker-calendar thead tr th span {
    display: block;
    width: 40px;
    color: #<?= $_GET['color'] ?> !important;
    margin-bottom: 5px;
    font-size: 15px;
 }

.home1-email a{
    color: #<?= $_GET['color'] ?> !important;
}

.social-icon3 li a{
    width:35px;
    height:35px;
    line-height:35px;
    border:1px solid #<?= $_GET['color'] ?> !important;
    color: #<?= $_GET['color'] ?> !important;
    text-align:center;
    border-radius:50%;
    font-size:15px;
    display:inline-block
}

.social-icon3 li a:hover {
    background-color: #<?= $_GET['color'] ?> !important;
    color: #fff !important;
}

.custom-control-input:checked~.custom-control-label::before {
    color: #fff;
    border-color: #<?= $_GET['color'] ?> !important;
    background-color: #<?= $_GET['color'] ?> !important;
}

.scroll-to-top{
    background-color:rgba(<?= $_GET['rgb'] ?>,.1);
}

.ui-state-active {
    background:rgba(<?= $_GET['rgb'] ?>,.1);
}

.ui-state-default:hover {
    background:rgba(<?= $_GET['rgb'] ?>,.1);
}

.nav .nav-link:not(.active):hover {
    background:rgba(<?= $_GET['rgb'] ?>,.1);
}

.dept-item.t3:hover {
    border: 1px solid #<?= $_GET['color'] ?> !important;
}

.dept-item.t3:hover h5 {
  color: #<?= $_GET['color'] ?> !important;
}

.dept-item.t3:hover .category-icon {
  background:rgba(<?= $_GET['rgb'] ?>,.1);
  border: 1px solid rgba(<?= $_GET['rgb'] ?>,.2) !important;
}

.category-icon i{
    color: #<?= $_GET['color'] ?>;
    font-size: 20px;
    font-weight: bold;
}

.btn.btn-light:hover {
    background:#<?= $_GET['color'] ?>;
    border-color: #<?= $_GET['color'] ?>;
    color: #fff;
    box-shadow: 0 4px 11px rgba(<?= $_GET['rgb'] ?>,.2);
}

.staff-border-1:hover{
    border-color: #<?= $_GET['color'] ?>;
}

.owlstyle-2:hover {
    background: #<?= $_GET['color'] ?> !important;
    color: #fff !important;
    padding: 10px 12px;
    border-radius: 50px;
    font-size: 18px;
}

.owlstyle-3:hover {
    background-color: #<?= $_GET['color'] ?>; !important;
    color: #fff !important;
    padding: 10px 12px;
    border-radius: 50px;    
    font-size: 18px;
}

.mribbon {
    margin: 0;
    text-align: center;
    background: #<?= $_GET['color'] ?>;
    color: white;
    padding: 0.3em 0 0.5em 0;
    position: absolute;
    top: 0;
    right: 0;
    font-size: 105%;
    transform: translateX(30%) translateY(0%) rotate(45deg);
    transform-origin: top left;
    z-index: 989;
}

.mribbon:before, .mribbon:after {
    content: '';
    position: absolute;
    top: 0;
    margin: 0 -1px;
    width: 100%;
    height: 100%;
    background: #<?= $_GET['color'] ?>;
}

.list-unstyled > li > a.text-gray:hover {
    color: #<?= $_GET['color'] ?> !important;
}

.hover-primary:hover {
    color: #<?= $_GET['color'] ?> !important;
}

.hover-border-primary:hover {
    border: 1px solid #<?= $_GET['color'] ?> !important;
}

.hover-text-primary:hover {
    color: #<?= $_GET['color'] ?> !important;
    text-decoration: underline;
}

.owlstyle-2 {
    background-color: rgba(<?= $_GET['rgb'] ?>,.1) !important;
    color: #<?= $_GET['color'] ?> !important;
}

.owlstyle-3 {
    background-color: rgba(<?= $_GET['rgb'] ?>,.1) !important;
    color: #<?= $_GET['color'] ?> !important;
}

.owl-theme .owl-dots .owl-dot span {
    background: #<?= $_GET['color'] ?> !important;
    transition: all 0.3s ease;
    -webkit-transition: all 0.3s ease;
    -webkit-box-shadow: 0 3px 8px 0 rgba(<?= $_GET['rgb'] ?>,.2) !important;
    -moz-box-shadow: 0 3px 8px 0 rgba(<?= $_GET['rgb'] ?>,.2) !important;
    box-shadow: 0 3px 8px 0 rgba(<?= $_GET['rgb'] ?>,.2) !important;
    opacity: .4;
}
