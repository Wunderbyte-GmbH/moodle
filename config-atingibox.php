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

$CFG->directorypermissions = 0777;

require_once(__DIR__ . '/lib/setup.php');

// There is no php closing tag in this file,
// it is intentional because it prevents trailing whitespace problems!

