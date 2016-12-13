# Tiix/Form

[![Latest Unstable Version](https://poser.pugx.org/tiix/form/v/unstable)](https://packagist.org/packages/tiix/form)
[![License](https://poser.pugx.org/tiix/form/license)](https://packagist.org/packages/tiix/form)

Framework agnostic form builder

## Install

Via Composer

``` bash
$ composer require tiix/form
```

## Usage

Default builder

``` php
$builder = Tiix\Form\Builder::createDefaultBuilder();

// create default form
$form = $builder->build(\Tiix\Form\Form::class, $url, $defaults)
    // add fields
    ->addField(new Tiix\Form\Field\TextField('name', 'label'))
    
    // add buttons
    ->addButton(new Tiix\Form\Button\Submit('name', 'label')

    ->getForm();
    
$form->render();
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email :author_email instead of using the issue tracker.

## Credits

- [:author_name][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/:vendor/:package_name.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/:vendor/:package_name/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/:vendor/:package_name.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/:vendor/:package_name.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/:vendor/:package_name.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/tiix/form
[link-travis]: https://travis-ci.org/:vendor/:package_name
[link-scrutinizer]: https://scrutinizer-ci.com/g/:vendor/:package_name/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/:vendor/:package_name
[link-downloads]: https://packagist.org/packages/tiix/form
[link-author]: https://github.com/timurbakarov
[link-contributors]: ../../contributors
