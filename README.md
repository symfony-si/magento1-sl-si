# Magento Slovenian translations

![Progress](http://progressed.io/bar/100?title=completed)
[![Magento Connect Extension](https://img.shields.io/badge/Magento-Connnect-bc6538.svg)](https://www.magentocommerce.com/magento-connect/)
[![MIT License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)

## Index

* [About](#about)
* [Installation](#installation)
* [FAQ](#faq)
* [Further reading](#further-reading)
* [Magento 2](#magento-2)
* [Contributing and license](#contributing-and-license)

### About

Slovenian (Slovenia) open source language pack for [Magento](https://magento.com/) Community
Edition 1.x. Translations include store's front end, administration, emails and
Tiny MCE editor which is used in some administration forms. Development of the
extension's source code is located on [GitHub](https://github.com/symfony-si/magento-sl_SI).

Translations follow Slovenian grammatical rules from [Lugos](https://wiki.lugos.si/slovenjenje:pravila).

Supported Magento versions: Magento CE `1.9.2.3`, `1.9.2.2`, `1.9.2.1`, `1.9.2.0`,
`1.9.1.1` and `1.9.1.0`.

In case you find an issue with this extension, please
[open a ticket](https://github.com/symfony-si/magento-sl_SI/issues).

### Installation

You have multiple options to install this extension into your store.

**Magento Connect**

Extension is available on [Magento Connect](https://www.magentocommerce.com/magento-connect/),
which is the recommended method for installing extensions to Magento 1.x. Copy
extension key from Magento Connect and use it in Magento administration at
*System->Magento Connect->Magento Connect Manager*.

**Custom installation**

1. Download the [ZIP archive](https://github.com/symfony-si/magento-sl_SI/archive/master.zip)
and extract it locally.
2. Copy folder sl_SI to your Magento store at `app/locale/sl_SI/`.
3. Enable Slovenian language in Magento admin at *System->Configuration->Locale Options->Locale*.
4. Flush the Magento cache, log out and login again to see changes.

### FAQ

**How to leave Magento admin interface in English?**

Go to *System->Configuration->General->Locale Options* and set *Locale* to
*English (United States)*. Then in the dropdown on the left at
*Current Configuration Scope*, select your website and set *Locale* to *Slovenian*.

### Further reading

Magento 1.x manages its core translations through a series of CSV files located
in `app/locale/`. By default there is an `en_US` folder with English translations.

* [Add language to Magento 1.x](http://merch.docs.magento.com/ce/user_guide/store-operations/language-add.html)
* [Magento Connect - I18N and L10N section](https://www.magentocommerce.com/magento-connect/customer-experience/internationalization-localization.html) - Magento Connect is a market place to share extensions.
* [Official Magento community effort to centralize translations](https://crowdin.com/project/magento-1)
* [Magento Connect - Create Your Extension](https://www.magentocommerce.com/magento-connect/create_your_extension/)

### Magento 2

Magento 1.x branch is used by a lot of projects which may not upgrade so soon to
Magento 2 yet. However many production stores successfully run already. For
translating Magento 2 and more information please refer to
[Magento 2 Slovenian language pack](https://github.com/symfony-si/magento2-sl_si).

### Contributing and license

Contributions are very appreciated and welcome. Please check the
[contributing](https://github.com/symfony-si/magento-sl_SI/blob/master/CONTRIBUTING.md)
document for guidelines and documentation on how to use this source code.

Repository is released under the [MIT license](https://github.com/symfony-si/magento-sl_SI/blob/master/LICENSE).
