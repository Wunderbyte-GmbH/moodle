# AGENTS.md

## Overview
Moodle 4.5 LMS on branch `MOODLE_405_DEVDAVID`, PHP core with JS AMD modules. Plugins as git submodules (e.g., `mod/booking`, `local/shopping_cart`).

### Core Architectural Standards

* **Namespacing (PSR-4)**: Use Level 2 namespaces. For `mod_datalynx`, classes in `mod/datalynx/classes/` must use the namespace `mod_datalynx`. **Note:** Files in `classes/local/` belong to the namespace `mod_datalynx` (the directory name `local` is omitted from the namespace).
* **Moodle 4.5+ Hooks API**: Prefer `db/hooks.php` over legacy callbacks or observers where available (e.g., user login, navigation, output).
* **JavaScript (ESM Over AMD)**: For Moodle 4.5+, prioritize **ES Modules** in `amd/src/` (compiled via Grunt). Use modern `export/import` and avoid `define()`.
* **Output & UI**: Use Mustache templates in `templates/` exclusively. For Moodle 4.5, stick to **Bootstrap 4** but be already compliant with **Bootstrap 5.3**; for Moodle 5.0+, prepare for **Bootstrap 5.3** (rename `data-` to `data-bs-`).
* **Database**: Use the `$DB` global. Never write raw SQL. Use `local_savepoint` for transactional integrity.
* **Privacy API**: All plugins must implement `\core_privacy\local\request\plugin_provider` to be compliant.
- **Templates**: Render via `$OUTPUT->render_from_template('mod_booking/template', $data)`.
- **Events/Hooks**: Events subclass `\core\event\base`, observed in `db/events.php`. Hooks in `db/hooks.php`.
- **APIs**: External functions in `classes/external/` extending `\core_external\external_api`, declared in `db/services.php`.
- **Plugin classes**: live in the plugin directory in the `classes/local/` path. local is not part of the namespace.

### Workflow & Tooling

* **Build System**: Use `npx grunt` for compiling JS/SCSS and generating `amd/build/`.
* **Testing (Strict Requirement)**:
* **PHPUnit**: Extend `advanced_testcase`. Use data generators (`$this->getDataGenerator()->create_module('datalynx')`).
* **Behat**: Use Moodle-standard selectors. Address `MoveTargetOutOfBoundsException` by using `"link" "region"` selectors and ensuring notifications are dismissed. Always use headless and stop on failure. Example usage: vendor/bin/behat --profile=headlessgeckodriver --config /var/moodledata-b/behatrun/behat/behat.yml --tags=@mod_datalynx --stop-on-failure .

- **Git**: Use git only in the submodules.
- **Testing**: PHPUnit: `php admin/tool/phpunit/cli/init.php` (once), `vendor/bin/phpunit --testsuite mod_booking_testsuite`. Behat: `php admin/tool/behat/cli/init.php`, `vendor/bin/behat --config /var/moodledata-b/behatrun/behat/behat.yml`.
- **Build**: `npm install`; `npx grunt` (or `npx grunt watch`); `npx grunt --root=mod/booking` for plugins.
- **Lint**: `vendor/bin/phpcs --standard=Moodle file.php`; `npx grunt eslint`.
- **Upgrade**: After `db/` changes, `php admin/cli/upgrade.php`.

* **XMLDB**: Use the XMLDB editor for `db/install.xml`. Never edit XML directly.
* **CI/CD**: Follow the git submodule workflow provided.

### Specific File Patterns

* **version.php**: Must include `$plugin->requires` (set to 2024100400 for 4.5) and `$plugin->component`.
* **externallib.php**: Use the modern `\core_external\external_api` class instead of externallib.php
* **Object Oriented**: Avoid `lib.php` or `locallib.php` if possible.

## Conventions
- Define `MOODLE_INTERNAL` before includes (tests auto-bootstrap).
- Provide `lang/en/` and `lang/de/` strings.
- Config via `config.php` (symlink to `config405.php`): DB `moodle405@localhost`, dataroot `/var/405_moodledata`.
- Node.js `>=22.11.0 <23` (`.nvmrc`); PHP 8.1–8.3.
- Examples: `mod/booking/classes/booking.php` (namespace `mod_booking`), `mod/booking/db/upgrade.php` (xmldb upgrades), `mod/booking/amd/src/bookit.js`.

Reference: `CLAUDE.md` for details.</content>
<parameter name="filePath">/var/www/html/moodle/AGENTS.md
