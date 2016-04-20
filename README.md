# Magento 1 Slovenian Translations

![Progress](http://progressed.io/bar/100?title=completed)
[![Magento Connect Extension](https://img.shields.io/badge/Magento-Connnect-bc6538.svg)][magento-connect]
[![Open Software License v. 3.0](https://img.shields.io/badge/License-OSL--3.0-blue.svg)][license]
[![GitHub release](https://img.shields.io/github/release/symfony-si/magento1-sl-si.svg?maxAge=2592000)][latest-release]


Slovenian (Slovenia) - `sl_SI` open source language pack for [Magento](https://magento.com/)
Community Edition 1.x. Translations include entire Magento Community edition - store's
front end, administration, emails and TinyMCE editor in administration forms.

Translations follow Slovenian grammar and translation rules from
[Lugos](https://wiki.lugos.si/slovenjenje:pravila).

Supported versions: Magento CE `1.9.2.4`, `1.9.2.3`, `1.9.2.2`, `1.9.2.1`, `1.9.2.0`,
`1.9.1.1` and `1.9.1.0`.

Development of the extension is happening on [GitHub](https://github.com/symfony-si/magento1-sl-si).


## Installation

Choose **one** of the installation options below that suits your case:

**Option 1: Magento Connect**

Extension is available on [Magento Connect][magento-connect], which is the usual
installation of Magento 1.x extensions. Copy the extension key from Magento
Connect and use it in Magento administration at
*System->Magento Connect->Magento Connect Manager*.

![Magento Connect Manager](https://raw.githubusercontent.com/symfony-si/magento1-sl-si/master/img/magentoconnect.png)

**Option 2: Manual Installation**

Or you can directly upload the latest package archive [locale_sl_si-1.x.y.tgz][latest-release],
where `x` and `y` are numbers of the latest release version via Magento Connect
Manager as well:

![Direct file upload](https://raw.githubusercontent.com/symfony-si/magento1-sl-si/master/img/magentoconnect_2.png)

Installing files manually without the Magento Connect Manager:

1. Download the [latest version][latest-release] and extract it locally.
2. Copy folders `app` and `js` to your Magento store document root.
3. Rename `package.xml` to the same file name as archive `locale_sl_si-1.x.y.xml`
4. Move the original archive and file `package.xml` to `var/package/` folder
5. Enable Slovenian language in Magento admin at *System->Configuration->Locale Options->Locale*.
6. Flush the Magento cache, log out and login again to see changes.

**Option 3: Composer**

Magento 1 provides [Composer](https://getcomposer.org) integration by using
[packages.firegento.com](http://packages.firegento.com/). Run the following in
command line:

```bash
$ composer require symfony-si/magento1-sl-si
```
And flush Magento cache.

**Option 4: Modman**

Another modular installation and extensions management option is
[Modman](https://github.com/colinmollenhour/modman). Inside Magento root folder
run:

```bash
$ modman init
$ modman clone git://github.com/symfony-si/magento1-sl-si.git
```


## FAQ

**Why are product attributes (Color, Weight, Tier Price, etc.) not translated?**

All products have attributes assigned. They are set when you're setting up the
store views or adding the products. You can localize attributes names at
`Catalog->Attributes->Manage Attributes`. Open the wanted attribute, switch
to `Manage Label / Options` tab and translate the attribute titles as needed. Follow
the [documentation](http://merch.docs.magento.com/ce/user_guide/catalog/product-translate.html)
for more info.

**How to leave Magento admin interface in English?**

Go to `System->Configuration->General->Locale Options` and set `Locale` to
`English (United States)`. Then in the dropdown on the left at
`Current Configuration Scope`, select your website and set `Locale` to
`slovenščina (Slovenija)`.

**How to use TinyMCE editor translations?**

TinyMCE editor in Magento 1 is by default using English language. Slovenian
translation for TinyMCE is also enabled if you've followed one of the above
installation procedures.

**Which files are include?**

Language pack consists of the following files/folders:

* Module configuration:

  `app/code/community/Slovenian/LocalePackSl/etc/config.xml`

* Administration layout file:

  `app/design/adminhtml/default/default/layout/slovenian/localepacksl.xml`

* Administration theme translation:

  `app/design/adminhtml/default/default/locale/sl_SI/translation.csv`

* Some frontend themes initial translation files:

  `app/design/frontend/`

* Magento global module configuration:

  `app/etc/modules/Slovenian_LocalePackSl.xml`

* Slovenian translations for front end, administration and emails:

  `app/locale/sl_SI/`:

* Adjusted TinyMCE setup:

  `js/slovenian/setup.js`

* TinyMCE translation files:

  `js/tiny_mce/`

* Package data file with rules for building the package, that is moved to `var/package/locale_sl_si-1.x.y.xml`:

  `package.xml`


## See Also

Magento 1.x manages its core translations through a series of CSV files located
in `app/locale/`. By default there is an `en_US` folder with English translations.

* [Add language to Magento 1.x](http://merch.docs.magento.com/ce/user_guide/store-operations/language-add.html)
* [Magento Connect - I18N and L10N section](https://www.magentocommerce.com/magento-connect/customer-experience/internationalization-localization.html) - Magento Connect is a market place to share extensions.
* [Official Magento community effort to centralize translations](https://crowdin.com/project/magento-1)
* [Magento Connect - Create Your Extension](https://www.magentocommerce.com/magento-connect/create_your_extension/)


### Magento 2

Looking for Magento 2? Slovenian translations for Magento 2 are also happening on
[GitHub](https://github.com/symfony-si/magento2-sl_si).


## Contributing and License

Contributions and improvement suggestions are welcome. In case you find an issue
with this extension, please [open issue](https://github.com/symfony-si/magento1-sl-si/issues).
The [contributing document](https://github.com/symfony-si/magento1-sl-si/blob/master/CONTRIBUTING.md)
provides more info how to help out.

This repository is released under the [Open Software License v. 3.0][license].


[magento-connect]: https://www.magentocommerce.com/magento-connect/catalog/product/view/id/30929/s/slovenian-translations/
[latest-release]: https://github.com/symfony-si/magento1-sl-si/releases/latest
[license]: https://github.com/symfony-si/magento1-sl-si/blob/master/LICENSE
