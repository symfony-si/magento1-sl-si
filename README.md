# Magento Slovenian translations

![Progress](http://progressed.io/bar/100?title=completed)
[![MIT License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)


## About

Slovenian translations for [Magento](https://magento.com/) Community Edition 1.x.

Supported Magento:

* Magento CE 1.9.2.3
* Magento CE 1.9.2.2
* Magento CE 1.9.2.1
* Magento CE 1.9.2.0
* Magento CE 1.9.1.1
* Magento CE 1.9.1.0


## Installation

* Download the [repository arhive](https://github.com/symfony-si/magento-sl_SI/archive/master.zip)
  and extract it locally.
* Copy folder sl_SI to your Magento store at `app/locale/sl_SI/`
* Enable Slovenian language in Magento admin at `System->Configuration->Locale Options->Locale`.
* Flush the Magento cache. Log out and login again to see changes.

**FAQ**

* *How to leave Magento admin interface in English?*

  Go to `System->Configuration->General->Locale Options` and set `Locale` to
  `English (United States)`. Then in the dropdown on the left
  `Current Configuration Scope`, select your website and set `Locale` to Slovenian.


## Learn more about Magento translations

### Magento 1.x

Magento 1.x manages its core
translations through a series of CSV files located in `app/locale/`. By default there
is a `en_US` folder with English translation.

### Magento 2.x

Magento 1.x branch has been used by a lot of projects which may not upgrade so
soon to Magento 2.x. yet. However many production stores successfully run already.

### Other resources:

* [Add language to Magento 1.x](http://merch.docs.magento.com/ce/user_guide/store-operations/language-add.html)
* [Magento Connect - I18N and L10N section](https://www.magentocommerce.com/magento-connect/customer-experience/internationalization-localization.html) - Magento Connect is a market place to share extensions.
* [Official Magento community effort to centralize translations](https://crowdin.com/project/magento-1)
* [Official Magento 2.x translations](https://crowdin.com/project/magento-2)
* [Magento user guide - Adding a Language](http://merch.docs.magento.com/ce/user_guide/store-operations/language-add.html)
* [Magento Connect - Create Your Extension](https://www.magentocommerce.com/magento-connect/create_your_extension/)


## Contributing

Contributions are very appreciated and welcome. Please check [contributing](CONTRIBUTING.md)
document for more info.


## License

This repository is released under the [MIT license](LICENSE).
