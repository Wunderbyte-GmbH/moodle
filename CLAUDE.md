# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Overview

This is a Moodle 4.5 installation on branch **`MOODLE_405_DEVDAVID`** — an open-source LMS written in PHP with JavaScript (AMD modules via RequireJS/Rollup). It includes the standard Moodle core plus a number of third-party and custom plugins managed as **git submodules**.

## Git Workflow

The working branch is `MOODLE_405_DEVDAVID`. Always ensure you are on this branch before committing:
```bash
git checkout MOODLE_405_DEVDAVID
```

The third-party/custom plugins are git submodules. After cloning or switching branches, initialize them with:
```bash
git submodule update --init --recursive
```

To update all submodules to their latest tracked commits:
```bash
git submodule update --remote
```

When committing submodule pointer changes, stage the submodule directory (e.g., `git add mod/booking`) and commit from the root repo.

## Commands

### PHP Testing (PHPUnit)

Initialize PHPUnit (required once, and after DB changes):
```bash
php admin/tool/phpunit/cli/init.php
```

Run all tests:
```bash
vendor/bin/phpunit
```

Run a single test file:
```bash
vendor/bin/phpunit path/to/tests/my_test.php
```

Run a specific test suite (e.g., a plugin):
```bash
vendor/bin/phpunit --testsuite mod_booking_testsuite
```

Run a single test method:
```bash
vendor/bin/phpunit --filter test_method_name path/to/tests/my_test.php
```

After adding/removing plugins, rebuild phpunit.xml from phpunit.xml.dist:
```bash
php admin/tool/phpunit/cli/util.php --buildconfig
```

### Behat (browser/acceptance tests)

Initialize Behat:
```bash
php admin/tool/behat/cli/init.php
```

Run Behat tests:
```bash
vendor/bin/behat --config /var/moodledata-b/behatrun/behat/behat.yml
```

Run a specific feature:
```bash
vendor/bin/behat --config /var/moodledata-b/behatrun/behat/behat.yml path/to/tests/behat/my.feature
```

### JavaScript / CSS (Grunt)

Install dependencies:
```bash
npm install
```

Build all JS and CSS (required after editing AMD source files or SCSS):
```bash
npx grunt
```

Build only for a specific component (run from within the component directory, or specify):
```bash
npx grunt --root=mod/booking
```

Watch for changes during development:
```bash
npx grunt watch
```

### PHP Linting (PHPCS)

```bash
vendor/bin/phpcs --standard=phpcs.xml path/to/file.php
```

### JavaScript Linting (ESLint)

```bash
npx grunt eslint
```

## Architecture

### Plugin System

Moodle uses a strict plugin architecture. All plugins follow the same directory layout and naming conventions:

- **`mod/`** — Activity modules (e.g., `mod/booking`, `mod/datalynx`, `mod/mooduell`)
- **`local/`** — Local plugins for site-specific functionality (e.g., `local/shopping_cart`, `local/wunderbyte_table`, `local/musi`)
- **`auth/`** — Authentication plugins (e.g., `auth/saml2`)
- **`blocks/`** — Sidebar blocks (e.g., `blocks/userprofile_update`)
- **`enrol/`** — Enrollment plugins (e.g., `enrol/autoenrol`)
- **`filter/`** — Text filters (e.g., `filter/multilang2`, `filter/shortcodes`)
- **`theme/`** — Themes (e.g., `theme/boost_union`, `theme/moove`)
- **`availability/condition/`** — Availability conditions (e.g., `availability/condition/wb_profile`)
- **`user/profile/field/`** — Custom profile field types

Each plugin has a `version.php` declaring its `$plugin->version`, `$plugin->requires`, and `$plugin->component` (the frankenstyle name, e.g., `mod_booking`).

### Key Plugin Structure (within any plugin directory)

- `version.php` — Plugin metadata
- `lib.php` — Core callbacks (hook implementations, module info functions)
- `classes/` — PSR-4 autoloaded PHP classes (namespaced as `plugintype_pluginname\`)
- `db/install.xml` — Database schema (managed via XMLDB editor, **never edit manually**)
- `db/upgrade.php` — Database upgrade steps
- `db/access.php` — Capability definitions
- `db/events.php` — Event observers
- `db/tasks.php` — Scheduled/ad-hoc task definitions
- `db/services.php` — External API (web service) definitions
- `lang/en/plugintype_pluginname.php` — English language strings
- `amd/src/` — JavaScript AMD module sources (compiled to `amd/build/`)
- `templates/` — Mustache templates
- `tests/` — PHPUnit tests (files ending in `_test.php`)
- `tests/behat/` — Behat feature files

### Database Layer

Moodle uses its own DML abstraction (`$DB` global). **Never use raw SQL directly** — always use `$DB->get_records()`, `$DB->insert_record()`, etc. Schema is defined in `db/install.xml` via XMLDB format. Upgrades are handled in `db/upgrade.php` via `xmldb_*_upgrade()`.

### JavaScript (AMD Modules)

Source files live in `amd/src/*.js` and are compiled to `amd/build/*.min.js` by Grunt (using Rollup + Babel). Always edit source files, never the built files. RequireJS loads modules lazily in the browser. ES modules are supported via Rollup.

### Templates (Mustache)

PHP renders templates via `$OUTPUT->render_from_template('component/template_name', $data)`. Templates live in `templates/` within each component. JavaScript can also render them via `Templates.render()`.

### External API / Web Services

External functions are declared in `db/services.php`, implemented as classes in `classes/external/`. They must extend `\core_external\external_api` and define `execute_parameters()` and `execute_returns()`.

### Hooks / Events

- **Events**: fired via `\core\event\base` subclasses, observed via `db/events.php`
- **Hooks**: declared in `db/hooks.php` (newer callback system replacing legacy `lib.php` callbacks)

### Local Configuration

The active config file is `config.php` (symlinked or copied from `config405.php`). It targets:
- Database: MariaDB, `moodle405` on `localhost`
- Webroot: `http://localhost/moodle`
- Dataroot: `/var/405_moodledata`
- Behat dataroot: `/var/moodledata-b`, wwwroot: `http://localhost/401_behat`

### Custom/Third-party Plugins in This Install

All third-party and Wunderbyte plugins are git submodules tracked in `.gitmodules`. Key ones:

- `local/shopping_cart`, `local/wunderbyte_table`, `local/musi`, `local/entities` — Wunderbyte plugins
- `mod/booking` — Wunderbyte booking module
- `mod/datalynx` — Datalynx activity
- `auth/saml2` — SAML2 authentication
- `theme/boost_union` — Boost Union theme

## Development Notes

- Node.js version constraint: `>=22.11.0 <23` (check with `.nvmrc`)
- PHP versions supported: 8.1–8.3
- After modifying `db/install.xml` or `db/upgrade.php`, run the upgrade via the admin UI or `php admin/cli/upgrade.php`
- The `MOODLE_INTERNAL` constant must be defined before most Moodle files are included directly; tests bootstrap this automatically
- Test classes must be in the `tests/` directory with suffix `_test.php` and extend `\advanced_testcase` or `\basic_testcase`
- Always provide language strings for German and English
