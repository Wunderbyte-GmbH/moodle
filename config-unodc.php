<?php
$CFG->theme = "moove";
$CFG->themedesignermode = "0";
$CFG->allowthemechangeonurl = "1";
$CFG->auth = "none";
$CFG->authpreventaccountcreation = "0";
$CFG->enrol_plugins_enabled = "manual,guest,self,cohort,autoenrol";
$CFG->registerauth = "";
$CFG->defaulthomepage = "1";
$CFG->frontpage = "6";
$CFG->frontpagecourselimit = "200";
$CFG->frontpageloggedin = "6";
$CFG->guestloginbutton = "0";
$CFG->langmenu = "0";
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
        'alertmsg' => "",
        'bannercontent' => "The unodcbox offers you the possibility to access high quality courses in areas with no or limited internet. ",
        'bannerheading' => "unodc in a box",
        'brandcolor' => "#2ca9de",
	'secondarymenucolor' => "#006288",
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
        'scss' => "",
        'scsspre' => "",
        'slidercap1' => "",
        'slidercount' => "0",
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
$CFG->forced_plugin_settings['core_admin'] = [
    'favicon' => "/favicon.ico",
    'logo' => "/UNODC_LOGOS.png",
    'logocompact' => "/UNODC_LOGOS.png",
];
$CFG->forced_plugin_settings['local_remote_backup_provider'] = [
    'enableuserdata' => "0",
    'enableuserprecheck' => "0",
    'remotesite' => "https://elearningunodc.org",
    'specific_export_username' => "",
    'uniqueid' => "idnumber",
];
$CFG->forced_plugin_settings['tool_moodlebox'] = [
    'buttonsinfooter' => "0",
    'datetimebuttonsinfooter' => "0",
    'ihavedonated' => "0",
    'restartshutdownbuttonsinfooter' => "0",
];
$CFG->forced_plugin_settings['tool_dataprivacy'] = [
    'requireallenddatesforuserdeletion' => "1",
    'showdataretentionsummary' => "0",
];
$CFG->forced_plugin_settings['tool_moodlenet'] = [
    'enablemoodlenet' => "0",
];

$CFG->defaultpreference_maildisplay = "0";
$CFG->country = "KE";
$CFG->enabledashboard = "0";
$CFG->minpassworddigits = "0";
$CFG->minpasswordlength = "8";
$CFG->minpasswordlower = "0";
$CFG->minpasswordnonalphanum = "0";
$CFG->minpasswordupper = "0";
$CFG->maxconsecutiveidentchars = "0";
$CFG->passwordpolicycheckonlogin = "0";
$CFG->sessiontimeout = "2419200";
$CFG->sessiontimeoutwarning = "1200";
$CFG->pathtodu = "/usr/bin/du";
$CFG->pathtogs = "/usr/bin/gs";
$CFG->pathtophp = "/usr/bin/php";
$CFG->pathtopython = "/usr/bin/python";
$CFG->additionalhtmlhead = "<link href=\"/theme/moove/unodc.css\" rel=\"stylesheet\">";
$CFG->customusermenuitems = "profile,moodle|/user/profile.php";

$CFG->session_handler_class = '\core\session\redis';
$CFG->session_redis_host = '127.0.0.1';
$CFG->session_redis_port = 6379;
$CFG->session_redis_database = 0;
$CFG->session_redis_prefix = 'musi_sess_';
$CFG->session_redis_acquire_lock_timeout = 20; // default value was 120, maximum should be the max_execution_time
$CFG->session_redis_lock_expire = 12; // 2 minutes session locking, default was 7200 --> 2hours??
$CFG->session_redis_serializer_use_igbinary = true;

$CFG->tool_forcedcache_config_array = [
    "stores" => [
        "redis01" => [
            "type" => "redis",
            "name" => "redis01",
            "config" => [
                "password" => "",
                "database" => 0,
                "prefix" => "musi_sess_",
                "server" => "127.0.0.1:6379",
                "serializer" => 2,
                "compressor" => 0
            ]
        ],
        "redis02" => [
            "type" => "redis",
            "name" => "redis02",
            "config" => [
                "database" => 1,
                "server" => "127.0.0.1:6379",
                "prefix" => "musi_",
                "password" => "",
                "serializer" => 2,
                "compressor" => 0
            ]
        ]
    ],
    "rules" => [
        "application" => [
            [
                "stores" => [
                    "redis02"
                ]
            ]
        ],
        "session" => [
            [
                "stores" => [
                    "redis01"
                ]
            ]
        ],
        "request" => []
    ]
];
$CFG->alternative_cache_factory_class = 'tool_forcedcache_cache_factory';
