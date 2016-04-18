# Contribution Guidelines

You are most welcome to suggest improvements, report
[issues](https://github.com/symfony-si/magento1-sl-si/issues), or send pull
requests:

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

## Translation guidelines

Translating should follow guidelines and rules from
[Lugos](https://wiki.lugos.si/slovenjenje:pravila).

## Magento Connect extension

Extension is also uploaded to Magento Connect. File [bin/build](bin/build) is
used to generate Magento extension `locale_sl_si.tgz`:

```bash
$ php ./bin/build
```

### Generating extension description

Magento Connect provides HTML description of the extension. Here is a simple way
to convert README.md content to HTML with [Melody](http://melody.sensiolabs.org/)
and provided PHP script:

```bash
$ sudo sh -c "curl http://get.sensiolabs.org/melody.phar -o /usr/local/bin/melody && chmod a+x /usr/local/bin/melody"
$ melody run bin/makeReadme.php
```
