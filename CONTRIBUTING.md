# Contribution Guidelines

You are most welcome to suggest improvements, report
[issues](https://github.com/symfony-si/magento-sl_SI/issues), or send pull
requests:

* Fork this repository over GitHub
* Set up your local repository

  ```bash
$ git clone git@github.com:your_username/magento-sl_SI
$ cd magento-sl_SI
$ git remote add upstream git://github.com/symfony-si/magento-sl_SI
$ git config branch.master.remote upstream
```
* Make changes and send pull request

  ```bash
$ git add .
$ git commit -m "Update files"
$ git push origin
```

## Translation guidelines

Translating should follow guidelines and rules from
[Lugos](https://wiki.lugos.si/slovenjenje:pravila).

## Magento Connect extension

Extension is also uploaded to Magento Connect. File
[bin/generator.php](bin/generator.php) is used to generate Magento extension
for publishing on Magento Connect.

Following creates sl_SI.tgz file that is uploaded on Magento Connect:

```bash
$ php bin/generator.php
```

### Generating extension description

Magento Connect provides HTML description of the extension. Here is a simple way
to convert README.md content to HTML with [Melody](http://melody.sensiolabs.org/)
and provided PHP script:

```bash
$ sudo sh -c "curl http://get.sensiolabs.org/melody.phar -o /usr/local/bin/melody && chmod a+x /usr/local/bin/melody"
$ melody run bin/makeReadme.php
```
