# yii2-bootstrap-markdown-widget

bootstrap markdown

[![Latest Stable Version](https://poser.pugx.org/xutl/yii2-bootstrap-markdown-widget/v/stable.png)](https://packagist.org/packages/xutl/yii2-bootstrap-markdown-widget)
[![Total Downloads](https://poser.pugx.org/xutl/yii2-bootstrap-markdown-widget/downloads.png)](https://packagist.org/packages/xutl/yii2-bootstrap-markdown-widget)
[![Dependency Status](https://www.versioneye.com/php/xutl:yii2-bootstrap-markdown-widget/dev-master/badge.png)](https://www.versioneye.com/php/xutl:yii2-bootstrap-markdown-widget/dev-master)
[![License](https://poser.pugx.org/xutl/yii2-bootstrap-markdown-widget/license.svg)](https://packagist.org/packages/xutl/yii2-bootstrap-markdown-widget)


Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist xutl/yii2-bootstrap-markdown-widget
```

or add

```
"xutl/yii2-bootstrap-markdown-widget": "~1.0.0"
```

to the require section of your `composer.json` file.

Usage
-----

```php
use xutl\bootstrap\markdown\Markdown;


echo $form->field($model, 'file')->widget(Markdown::::classname(),[
//etc
]);
```

## License

This is released under the MIT License. See the bundled [LICENSE.md](LICENSE.md)
for details.