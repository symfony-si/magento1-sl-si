# Magento 1 Slovenian Translations

![Progress](http://progressed.io/bar/100?title=completed)
[![Magento Connect Extension](https://img.shields.io/badge/Magento-Connnect-bc6538.svg)](https://www.magentocommerce.com/magento-connect/)
[![Open Software License v. 3.0](https://img.shields.io/badge/License-OSL--3.0-blue.svg)](LICENSE)

## Index

* [About](#about)
* [Installation](#installation)
    * [Magento Connect](#magento-connect)
    * [Modman](#modman)
    * [Manual Installation](#manual-installation)
    * [Composer](#composer)
* [FAQ](#faq)
* [See Also](#see-also)
* [Magento 2](#magento-2)
* [Contributing and License](#contributing-and-license)


## About

Slovenian (Slovenia) open source language pack for [Magento](https://magento.com/)
Community Edition 1.x. Translations include entire Magento Community edition - store's
front end, administration, emails and TinyMCE editor in administration forms.
Extension development is available on [GitHub](https://github.com/symfony-si/magento1-sl-si).

Translations follow Slovenian grammatical rules from [Lugos](https://wiki.lugos.si/slovenjenje:pravila).

Supported versions: Magento CE `1.9.2.4`, `1.9.2.3`, `1.9.2.2`, `1.9.2.1`, `1.9.2.0`,
`1.9.1.1` and `1.9.1.0`.


## Installation

The following files/folders are included in the language pack:

* `app/code/community/Slovenian/LocalePackSl/etc/config.xml` - Module configuration
* `app/design/adminhtml/default/default/layout/slovenian/localepacksl.xml` - Layout file
* `app/etc/modules/Slovenian_LocalePackSl.xml` - Magento global module configuration
* `app/locale/sl_SI/` - Slovenian translations for front end, administration and emails.
* `js/slovenian/setup.js` - Adjusted TinyMCE setup
* `js/tiny_mce/*` - TinyMCE Slovenian translation files

Choose **one** of the installation options below that suits your case:

### Magento Connect

Extension is available on [Magento Connect](https://www.magentocommerce.com/magento-connect/),
which is the recommended method for installing extensions to Magento 1.x. Copy
extension key from Magento Connect and use it in Magento administration at
*System->Magento Connect->Magento Connect Manager*.

### Modman

Another useful installation and module management option is
[Modman](https://github.com/colinmollenhour/modman) which modularizes extensions.
Inside Magento root folder run:

```bash
$ modman init
$ modman clone git://github.com/symfony-si/magento1-sl-si.git
```

### Manual Installation

1. Download the [ZIP archive](https://github.com/symfony-si/magento1-sl-si/archive/master.zip)
and extract it locally.
2. Copy folders `app` and `js` to your Magento store document root.
3. Enable Slovenian language in Magento admin at *System->Configuration->Locale Options->Locale*.
4. Flush the Magento cache, log out and login again to see changes.

### Composer

For more info about using [Composer](https://getcomposer.org) with Magento 1, check
[packages.firegento.com](http://packages.firegento.com/). To add extension run
the following in command line:

```bash
$ composer require symfony-si/magento1-sl-si
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


## See Also

Magento 1.x manages its core translations through a series of CSV files located
in `app/locale/`. By default there is an `en_US` folder with English translations.

* [Add language to Magento 1.x](http://merch.docs.magento.com/ce/user_guide/store-operations/language-add.html)
* [Magento Connect - I18N and L10N section](https://www.magentocommerce.com/magento-connect/customer-experience/internationalization-localization.html) - Magento Connect is a market place to share extensions.
* [Official Magento community effort to centralize translations](https://crowdin.com/project/magento-1)
* [Magento Connect - Create Your Extension](https://www.magentocommerce.com/magento-connect/create_your_extension/)


## Magento 2

Looking for Magento 2? Slovenian translations for Magento 2 are located
[on GitHub](https://github.com/symfony-si/magento2-sl_si).


## Contributing and License

Contributions and suggestions are welcome. In case you find an issue with this
extension, please [open issue](https://github.com/symfony-si/magento1-sl-si/issues).
The [contributing document](https://github.com/symfony-si/magento1-sl-si/blob/master/CONTRIBUTING.md)
provides more info how to contribute.

This repository is released under the
[Open Software License v. 3.0](https://github.com/symfony-si/magento1-sl-si/blob/master/LICENSE).
