<?php
$CFG->theme = "moove";
$CFG->themedesignermode = "0";
$CFG->auth = "none";
$CFG->authpreventaccountcreation = "0";
$CFG->enrol_plugins_enabled = "manual,guest,self,cohort,autoenrol";
$CFG->registerauth = "";
$CFG->defaulthomepage = "1";
$CFG->frontpage = "6";
$CFG->frontpagecourselimit = "200";
$CFG->frontpageloggedin = "6";
$CFG->forced_plugin_settings['auth_none'] = [
        'field_lock_address' => "locked",
        'field_lock_alternatename' => "locked",
        'field_lock_city' => "unlocked",
        'field_lock_country' => "unlocked",
        'field_lock_department' => "locked",
        'field_lock_description' => "unlocked",
        'field_lock_email' => "unlocked",
        'field_lock_firstname' => "unlocked",
        'field_lock_firstnamephonetic' => "locked",
        'field_lock_idnumber' => "locked",
        'field_lock_institution' => "locked",
        'field_lock_lang' => "unlocked",
        'field_lock_lastname' => "unlocked",
        'field_lock_lastnamephonetic' => "locked",
        'field_lock_middlename' => "locked",
        'field_lock_phone1' => "locked",
        'field_lock_phone2' => "locked",
];
$CFG->forced_plugin_settings['enrol_autoenrol'] = [
        'autounenrolaction' => "0",
        'availabilityplugins' => "grouping,profile",
        'defaultenrol' => "1",
        'defaultrole' => "5",
        'enrolperiod' => "0",
        'expiredaction' => "0",
        'expirynotify' => "0",
        'expirynotifyhour' => "6",
        'expirythreshold' => "86400",
        'loginenrol' => "1",
        'longtimenosee' => "0",
        'maxenrolled' => "0",
        'newenrols' => "1",
        'removegroups' => "1",
        'selfunenrol' => "1",
        'sendcoursewelcomemessage' => "0",
];
$CFG->forced_plugin_settings['theme_moove'] = [
	'logo' => $CFG->wwwroot . "/theme/moove/pix/giz-logo.svg",
	'favicon' => $CFG->wwwroot . "/theme/moove/pix/gizico.ico",
        'alertmsg' => "",
        'bannercontent' => "The atingibox offers you the possibility to access high quality courses in areas with no or limited internet. ",
        'bannerheading' => "atingi in a box",
        'brandcolor' => "#5700c3",
        'clientscount' => "1",
        'clientsfrontpage' => "0",
        'clientsimage1' => "",
        'clientssubtitle' => "Clients that believe in us",
        'clientstitle' => "Our clients",
        'clientsurl1' => "",
        'courselistview' => "0",
        'coursepresentation' => "1",
        'disablefrontpageloginbox' => "0",
        'disableteacherspic' => "0",
        'displaymarketingbox' => "0",
        'facebook' => "",
        'forumcustomtemplate' => "0",
        'forumhtmlemailfooter' => "",
        'forumhtmlemailheader' => "",
        'getintouchcontent' => "",
        'googleanalytics' => "",
        'instagram' => "",
        'linkedin' => "",
        'loginbgimg' => "",
        'mail' => "",
        'mobile' => "",
        'navbarbg' => "#ff3b68",
        'navbarbghover' => "#ff3b68",
        'navbarheadercolor' => "",
        'numbersfrontpage' => "0",
        'preset' => "default.scss",
        'presetfiles' => "",
        'scss' => " @media (max-width: 767.98px) {
body.drawer-open-left, body.drawer-open-right {
    overflow-y: visible;
}
}

@media (max-width:988px) {
button.btn:not(.nav-link), .btn.btn-primary {
      padding: 5px 5px !important;
    border-radius: 5px;
    background-color: #ff3b68;
    -webkit-transition: all .2s ease;
    -o-transition: all .2s ease;
    transition: all .2s ease;
    color: #fff;
    font-size: 11px;
    line-height: 1.2em;
    text-align: center;
}
}

.instructions div, .instructions div p {
    color: #fff;
}
#page-site-index #frontpage-available-course-list h2:before, #page-site-index #frontpage-available-course-list h2:after {
display:none;
}
.courses .card img{
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}
.courses .card {
    border-radius: 10px;
}
#page-site-index.drawer-open-left #mooveslideshow .carousel-caption .title, #page-site-index.drawer-open-left #mooveslideshow .carousel-caption .caption {
   font-size: 42px;
}
#page-site-index #mooveslideshow .carousel-caption .title, #page-site-index #mooveslideshow .carousel-caption .caption {
    color: #fff;
    background-color: transparent !important;
    max-width: unset;
}

.pagelayout-frontpage #region-main> .card {
background: #f3f3f3;
}
#page {
background:#fff;
}
nav.fixed-top.navbar {
box-shadow:none;
}
#page-header > .col-12 > .card,
#region-main > .card {
    border-radius: 10px ;
}
button.btn:not(.nav-link),.btn.btn-primary {
    padding: 15px 30px;
    border-radius: 10px;
    background-color: #ff3b68;
    -webkit-transition: all .2s ease;
    transition: all .2s ease;
    color: #fff;
    font-size: 18px;
    line-height: 1.2em;
    text-align: center;
}
.btn-default {    
    padding: 15px 30px;
    border-radius: 10px;
    -webkit-transition: all .2s ease;
    transition: all .2s ease;
    font-size: 18px;
    line-height: 1.2em;
    text-align: center;
}

.pagelayout-frobtn btn-defaultntpage.drawer-open-right #page-header {
    position: absolute;
    right: 390px;
}
.pagelayout-frontpage #page-header .card {
    border:none;
}
.pagelayout-frontpage #page-header .card {
    background: transparent;
}
.pagelayout-frontpage #page-header .page-context-header {
    display:none !important;
}
.pagelayout-frontpage #page-header #action-menu-toggle-2 {
    color:white;
}
#top-footer {
background-image:none !important;
background: #fff;
}
.col-md-7.contact>h3 {
display:none;
}
body,p,a,div {
   font-family: \'Varela Round\', sans-serif;
}
body,p,div {
color: #5b5b5b;
}
h1 {
color: #ff3b68;
}
h1,h2,h3,h4,h5,h6 {
font-family: \'Varela Round\', sans-serif;
font-weight: 600; 
}
.carousel-indicators {
display: none;
}
.btn:focus {
    outline: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
}
#fitem_id_contactphone{
    display: none;
}
.aalink.focus, #page-footer a:not([class]).focus, .arrow_link.focus, a:not([class]).focus, .activityinstance > a.focus, .aalink:focus, #page-footer a:not([class]):focus, .arrow_link:focus, a:not([class]):focus, .activityinstance > a:focus {
    background-color: transparent;
}
#page-footer, .mobilefooter,  #id_moodle_optional, #id_moodle_interests, #id_moodle_additional_names, #id_moodle_picture, #fitem_id_description_editor, #fitem_id_timezone, #fitem_id_country, #fitem_id_moodlenetprofile, #fitem_id_city, #fitem_id_maildisplay, #page-user-edit #fitem_id_email, #page-site-index #loginbox #boxForm p.my-2, [data-key=\"calendar\"], [data-key=\"privatefiles\"], .forgetpass {
  display: none;
}
.signup-form ::placeholder {
  color: #fff;
}
label[for=username]::after {
    content: \"On your first login select a username. Use your existing username, if you have already logged in once\";
    display: block;
    font-size: small;
}
label[for=password]::after {
    content: \"Use a simple password you remember. Consider it might be visible to teachers and admins!\";
    display: block;
    font-size: small;
}
body.notloggedin #loginbox #boxForm {
    background-color: #eee;
}
#page-site-index .frontpage-course-list-all .card a {
    max-height: 200px;
    overflow: hidden;
}
@media (min-width: 1200px) {
.container, .container-sm, .container-md, .container-lg, .container-xl {
    max-width: 2400px;
}
}

#page-site-index.notloggedin #page-header {
    min-height: 100px;
}
element {

}
nav.navbar .navbar-brand .logo img {
    max-height: 55px;
}",
        'scsspre' => "",
        'slidercap1' => "",
        'slidercount' => "1",
        'sliderenabled' => "0",
        'sliderfrontpage' => "0",
        'sliderimage1' => "",
        'slidertitle1' => "",
        'sponsorscount' => "1",
        'sponsorsfrontpage' => "0",
        'sponsorsimage1' => "",
        'sponsorssubtitle' => "",
        'sponsorstitle' => "",
        'sponsorsurl1' => "",
        'telegram' => "",
        'topfooterimg' => "",
        'twitter' => "",
        'website' => "",
        'whatsapp' => "",
        'youtube' => "",
];
$CFG->pathtodu = "/usr/bin/du";
$CFG->pathtogs = "/usr/bin/gs";
$CFG->pathtophp = "/usr/bin/php";
$CFG->pathtopython = "/usr/bin/python";
