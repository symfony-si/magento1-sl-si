# Contribution Guidelines

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


## Translation Rules

Translations must follow Slovenian translation rules from
[Lugos](https://wiki.lugos.si/slovenjenje:pravila).


## Release Process

*(For repository maintainers)*

This repository follows [semantic versioning](http://semver.org). When source
code changes or new features are implemented, a new version (e.g. `1.x.y`) is
released by the following release process:

* **1. Extension Package**

    Create extension package `locale_sl_si-1.x.y.tgz` with [bin/release](bin/release)
    and provide a new release version, for example to simply release `1.0.4`:

    ```bash
$ php ./bin/release 1.0.4
```
    Release script automatically updates version in [config.xml](app/code/community/Slovenian/LocalePackSl/etc/config.xml)
    and creates tar gzip archive based on the [package_template.xml](package_template.xml).
    It generates also `README.html` from the one in Markdown for updating Magento
    Connect extension description.

* **2. Update Changelog:**

    Create an entry in [CHANGELOG.md](CHANGELOG.md) describing all the changes
    from previous release.

* **3. Magento Connect:**

    Publish `locale_sl_si-1.x.y.tgz` on [Magento Connect](https://www.magentocommerce.com/magento-connect/catalog/product/view/id/30929/s/slovenian-translations/)
    and if needed update description of extension.

* **4. Tag new release:**

    Tag a new version on [GitHub](https://github.com/symfony-si/magento1-sl-si/releases),
    and attach `locale_sl_si-1.x.y.tgz` as a binary file.
