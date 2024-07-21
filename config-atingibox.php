<?php  // Moodle configuration file

$CFG->wwwroot   = 'http://atingibox.home';
$CFG->dataroot  = '/var/www/moodledata';
$CFG->admin     = 'admin';
$CFG->tempdir   = '/var/www/moodledata/tmp';
$CFG->pathtodot = '/usr/bin/dot';
$CFG->pathtodu = '/usr/bin/du';
$CFG->pathtogs = '/usr/bin/gs';
$CFG->pathtophp = '/usr/bin/php';
$CFG->pathtopython = '/usr/bin/python3';
$CFG->passwordpolicy = 0;
$CFG->emailchangeconfirmation = 0;

$CFG->backuptempdir = '/var/www/moodledata/backup';
$CFG->xsendfile = 'X-Accel-Redirect';
$CFG->xsendfilealiases = array('/dataroot/' => $CFG->dataroot);
$CFG->customfiletypes = array(
  (object)array(
    'extension' => 'crt',
    'icon' => 'sourcecode',
    'type' => 'application/x-x509-ca-cert',
    'customdescription' => 'X.509 CA certificate'
  )
);
$CFG->site_is_public = false;
$CFG->showcampaigncontent = false;
$CFG->showservicesandsupportcontent = false;

$CFG->tool_forcedcache_config_array = [
    'stores' => [
	'APCu' => [
            'type' => 'apcu',
	    'name' => 'APCu',
            'config' => [
                'prefix' => 'apcu_',
            ],
        ],
        'redis01' => [
            'type' => 'redis',
            'name' => 'redis01',
            'config' => [
                'password' => '',
                'database' => 0,
                'prefix' => 'sess_',
                'server' => '127.0.0.1:6379',
                'serializer' => 2,
                'compressor' => 0
            ],
        ],
        'redis02' => [
            'type' => 'redis',
            'name' => 'redis02',
            'config' => [
                'database' => 1,
                'server' => '127.0.0.1:6379',
                'prefix' => 'app_',
                'password' => '',
                'serializer' => 2,
                'compressor' => 0
            ],
	],
	'local_file' => [
            'type' => 'file',
            'config' => [
                'path' => '/tmp/local-cache-file',
                'autocreate' => 1,
            ],
        ],
	'shared_file' => [
            'type' => 'file',
            'config' => [
                'path' => '/var/www/moodledata/cache',
                'autocreate' => 1,
            ],
        ],
    ],
    'rules' => [
	 'application' => [
            // These 3 definitions are localizable, but also very small and highly
            // requested so are great candidates for APCu.
            [
                'conditions' => [
                    'name' => 'core/plugin_functions',
                ],
                'stores' => ['redis02'],
            ],
            [
                'conditions' => [
                    'name' => 'core/string',
                ],
                'stores' => ['redis02'],
            ],
            [
                'conditions' => [
                    'name' => 'core/langmenu',
                ],
                'stores' => ['redis02'],
            ],
            // This is another special case similar to coursemodinfo below,
            // this cache has a very large number items so we would put it
            // into local and shared files, but don't due to MDL-69088.
            // In practice this doesn't matter as rebuilding these items is
            // relatively quick, unlike coursemodinfo which is very costly.
            [
                'conditions' => [
                    'name' => 'core/htmlpurifier',
                ],
                'stores' => ['local_file'],
            ],
            // Course mod info is a special case because it is so large so we
            // use files instead of redis for the shared stacked cache.
            [
                'conditions' => [
                    'name' => 'core/coursemodinfo',
                ],
                'stores' => ['local_file', 'shared_file'],
            ],
            // Everything else which is localizable we have in both a local
            // cache backed by a shared case to warm up the local caches faster
            // while auto scaling in new front ends.
            [
                'conditions' => [
                    'canuselocalstore' => true,
                ],
                'stores' => ['local_file', 'redis02'],
            ],
            // Anything left over which cannot be localized just goes into shared
            // redis as is.
            [
                'stores' => ['redis02'],
            ]
        ],    
        'session' => [
            [
                'stores' => [
                    'redis01'
                ]
            ]
        ],
        'request' => []
    ]
];
$CFG->alternative_cache_factory_class = 'tool_forcedcache_cache_factory';
$CFG->enableasyncbackup = '1';

$CFG->theme = 'moove';
$CFG->themedesignermode = '0';
$CFG->auth = 'none';
$CFG->authpreventaccountcreation = '0';
$CFG->enrol_plugins_enabled = 'manual,guest,self,cohort,autoenrol';
$CFG->registerauth = '';
$CFG->defaulthomepage = '1';
$CFG->frontpage = '6';
$CFG->frontpagecourselimit = '200';
$CFG->frontpageloggedin = '6';
$CFG->forced_plugin_settings['auth_none'] = [
        'field_lock_address' => 'locked',
        'field_lock_alternatename' => 'locked',
        'field_lock_city' => 'unlocked',
        'field_lock_country' => 'unlocked',
        'field_lock_department' => 'locked',
        'field_lock_description' => 'unlocked',
        'field_lock_email' => 'unlocked',
        'field_lock_firstname' => 'unlocked',
        'field_lock_firstnamephonetic' => 'locked',
        'field_lock_idnumber' => 'locked',
        'field_lock_institution' => 'locked',
        'field_lock_lang' => 'unlocked',
        'field_lock_lastname' => 'unlocked',
        'field_lock_lastnamephonetic' => 'locked',
        'field_lock_middlename' => 'locked',
        'field_lock_phone1' => 'locked',
        'field_lock_phone2' => 'locked',
];
$CFG->forced_plugin_settings['enrol_autoenrol'] = [
        'autounenrolaction' => '0',
        'availabilityplugins' => 'grouping,profile',
        'defaultenrol' => '1',
        'defaultrole' => '5',
        'enrolperiod' => '0',
        'expiredaction' => '0',
        'expirynotify' => '0',
        'expirynotifyhour' => '6',
        'expirythreshold' => '86400',
        'loginenrol' => '1',
        'longtimenosee' => '0',
        'maxenrolled' => '0',
        'newenrols' => '1',
        'removegroups' => '1',
        'selfunenrol' => '1',
        'sendcoursewelcomemessage' => '0',
];
$CFG->additionalhtmlhead = "<script>
window.addEventListener(\"load\", function() {
    if (document.body.id === \"page-login-index\") {
        const lang = document.documentElement.lang;

        const placeholders = {
            en: {
                username: \"Choose a username or enter the one you already have.\",
                password: \"Choose a simple password!\"
            },
            fr: {
                username: \"Choisir un nom d'utilisateur ou entrer celui déjà choisi.\",
                password: \"Choisir un mot de passe simple!\"
            },
            es: {
                username: \"Elija un nombre de usuario o ingrese el que ya tiene.\",
                password: \"¡Elija una contraseña simple!\"
            }
        };

        const selectedPlaceholders = placeholders[lang] || placeholders['en'];

        const usernameInput = document.getElementById(\"username\");
        const passwordInput = document.getElementById(\"password\");

        if (usernameInput) {
            usernameInput.setAttribute(\"placeholder\", selectedPlaceholders.username);
            passwordInput.setAttribute(\"placeholder\", selectedPlaceholders.password);
        }
    }
});
</script>";

$CFG->additionalhtmlfooter = "<footer class=\"footer text-center\">
  <div class=\"container\">
    <img src=\"http://atingibox.home/pluginfile.php/1/theme_moove/loginbgimg/1716365762/atingi-footer.png\" alt=\"Atingi Footer Image\" class=\"img-fluid\">
  </div>
</footer>";

$CFG->directorypermissions = 02777;


