<?php  // Moodle configuration file

unset($CFG);
global $CFG;
$CFG = new stdClass();

$CFG->dbtype    = 'mariadb';
$CFG->dblibrary = 'native';
$CFG->dbhost    = 'localhost';
$CFG->dbname    = 'moodle';
$CFG->dbuser    = 'moodlebox';
$CFG->dbpass    = 'Moodlebox4$';
$CFG->prefix    = 'mdl_';
$CFG->dboptions = array (
  'dbpersist' => 0,
  'dbport' => '',
  'dbsocket' => '',
  'dbcollation' => 'utf8mb4_unicode_ci',
);

$CFG->wwwroot   = 'http://atingibox.home';
$CFG->dataroot  = '/var/www/moodledata';
$CFG->admin     = 'admin';
$CFG->tempdir   = '/var/www/moodledata/tmp';
$CFG->pathtodot = "/usr/bin/dot";
$CFG->pathtodu = "/usr/bin/du";
$CFG->pathtogs = "/usr/bin/gs";
$CFG->pathtophp = "/usr/bin/php";
$CFG->pathtopython = "/usr/bin/python3";

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

$CFG->directorypermissions = 0777;
require_once(__DIR__ . '/lib/setup.php');

// There is no php closing tag in this file,
// it is intentional because it prevents trailing whitespace problems!

