# Magento 1 Slovenian Translations

[![Build Status](https://travis-ci.org/symfony-si/magento1-sl-si.svg?branch=master)](https://travis-ci.org/symfony-si/magento1-sl-si)
![Progress](http://progressed.io/bar/100?title=completed)
[![Magento Connect Extension](https://img.shields.io/badge/Magento-Connnect-bc6538.svg)][magento-connect]
[![Open Software License v. 3.0](https://img.shields.io/badge/License-OSL--3.0-blue.svg)][license]
[![Latest Release](https://img.shields.io/github/release/symfony-si/magento1-sl-si.svg)][latest-release]

**About**

Slovenian (Slovenia) - `sl_SI` open source language pack for [Magento][magento]
Community Edition 1.x. Translations include entire Magento Community edition - store's
front end, administration, emails and TinyMCE editor in administration forms.

Translations follow Slovenian grammar and translation rules from [Lugos][lugos].

Supported Magento CE versions: `1.9.3.2`, `1.9.3.1`, `1.9.3.0`, `1.9.2.4`, `1.9.2.3`,
`1.9.2.2`, `1.9.2.1`, `1.9.2.0`, `1.9.1.1` and `1.9.1.0`.

Development of the extension is happening on [GitHub][github-project].

---

**O prevodu**

Slovenski (Slovenija) - `sl_SI` odprto kodni jezikovni paket za [Magento][magento]
Community Edition 1.x. Prevodi vključujejo celotno izdajo Magento Community - ospredje
trgovine, administracijo, e-pošte in urejevalnik TinyMCE v administracijskih
obrazcih.

Prevodi sledijo slovenski slovnici in pravilom slovenjenja [Lugos][lugos].

Podprte Magento CE verzije: `1.9.3.2`, `1.9.3.1`, `1.9.3.0`, `1.9.2.4`, `1.9.2.3`,
`1.9.2.2`, `1.9.2.1`, `1.9.2.0`, `1.9.1.1` in `1.9.1.0`.

Razvoj razširitve poteka na [GitHub-u][github-project].

---

## Installation

Choose **one** of the installation options below that suits your case. Enable
Slovenian locale in Magento admin at *System->Configuration->Locale Options->Locale*
and flush the Magento cache after installation to see changes.

**Option 1: Magento Connect**

Extension is available on [Magento Connect][magento-connect], which is the usual
installation of Magento 1.x extensions. Copy the extension key from Magento
Connect and use it in Magento administration at
*System->Magento Connect->Magento Connect Manager*.

![Magento Connect Manager](https://raw.githubusercontent.com/symfony-si/magento1-sl-si/master/img/magentoconnect.png)

**Option 2: Manual Installation**

in Magento Connect Manager you can also directly upload the latest package
archive [locale_sl_si-1.x.y.tgz][latest-release], where `x` and `y` are the
numbers of the latest release version:

![Direct file upload](https://raw.githubusercontent.com/symfony-si/magento1-sl-si/master/img/magentoconnect_2.png)

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

**How to customize translations?**

Replacing core translations in `app/locale/sl_SI` folder is not advised because
extension's updates will overwrite files in it.

If you'd like to replace some translations with your own, you can do so in the
theme's `translation.csv` file. For administration add
`app/design/adminhtml/default/default/locale/sl_SI/translate.csv` and override
wanted translations. For your frontend theme add
`app/design/frontend/{package}/{your_theme}/locale/sl_SI/translate.csv` and
override translations.

Some translation overrides might also need the module name prefix in
`translate.csv`:

```csv
"Mage_Catalog::Add to Cart","Dodaj v voziček"
```

When creating modules, translation files are defined in the `config.xml`:

```xml
<adminhtml>
    <translate>
        <modules>
            <Your_Module>
                <files>
                    <default>Your_Translation.csv</default>
                </files>
            </Your_Module>
        </modules>
    </translate>
</adminhtml>
```

Email templates can be customized either in administration at
`System->Transactional Emails` or by adding file templates in the theme's locale
folder with the same pattern as in the `app/locale/sl_SI/template`.

**How to use TinyMCE editor translations?**

TinyMCE editor in Magento 1 is by default using English language. Slovenian
translation for TinyMCE is also enabled if you've followed one of the above
installation procedures.

**Which PHP versions are supported?**

This sl_SI language pack supports all of the latest PHP versions including 5.3.
Magento however [recommends](http://devdocs.magento.com/guides/m1x/system-requirements.html)
to use PHP 5.4 or PHP 5.5 for current shipping versions (1.9.x). Magento 1 works
fine also on PHP 7, however some minor [hacks](http://inchoo.net/magento/its-alive/)
are required. Consider upgrading your server to PHP 7.

**Which files/folders are included in the package?**

Language pack consists of the following files/folders:

* Module configuration:

  `app/code/community/Slovenian/LocalePackSl/etc/config.xml`

* Administration layout file:

  `app/design/adminhtml/default/default/layout/slovenian/localepacksl.xml`

* Magento global module configuration:

  `app/etc/modules/Slovenian_LocalePackSl.xml`

* Slovenian translations for front end, administration and emails:

  `app/locale/sl_SI/`

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


## Magento 2

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
[lugos]: https://wiki.lugos.si/slovenjenje:pravila
[github-project]: https://github.com/symfony-si/magento1-sl-si
[magento]: https://magento.com/
