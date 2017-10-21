# Contribution guidelines

You are most welcome to suggest improvements, report
[issue](https://github.com/symfony-si/magento1-sl-si/issues), or send a pull
request:

* Fork this repository over GitHub
* Set up your local repository

  ```bash
$ git clone git@github.com:your_username/magento1-sl-si
$ cd magento1-sl-si
$ git remote add upstream git://github.com/symfony-si/magento1-sl-si
$ git config branch.master.remote upstream
```
* Make changes and send pull request

  ```bash
$ git add .
$ git commit -m "Update files"
$ git push origin
```

## Translation rules

Translations must follow Slovenian translation rules from
[Lugos](https://wiki.lugos.si/slovenjenje:pravila).

## Development practices

Composer can be also used to separate local development of the module from Magento
Store. After cloning the repository, install the dependencies and run tests:

```bash
$ composer install
$ phpunit
```

## Release process

*(For repository maintainers)*

This repository follows [semantic versioning](http://semver.org). When source
code changes or new features are implemented, a new version (e.g. `1.x.y`) is
released by the following release process:

* **1. Extension package**

  Create extension package `locale_sl_si-1.x.y.tgz` with [bin/release](bin/release)
  and provide a new release version. For example, to release the `1.0.4`:

  ```bash
  $ ./bin/release 1.0.4
  ```
  Release script automatically updates version in [config.xml](app/code/community/Slovenian/LocalePackSl/etc/config.xml)
  and creates tar gzip archive based on the [package_template.xml](package_template.xml).

* **2. Update changelog:**

  Create an entry in [CHANGELOG.md](CHANGELOG.md) describing all the changes
  from previous release.

* **3. Tag new release:**

  Tag a new version on [GitHub](https://github.com/symfony-si/magento1-sl-si/releases),
  and attach `locale_sl_si-1.x.y.tgz` as a binary file.

* **3. Magento Marketplace:**

  Submit `locale_sl_si-1.x.y.tgz` to
  [Magento Marketplace](https://marketplace.magento.com/peterkokot-locale-sl-si.html)
  for review and publishing.
