# twill-numeric-input

This is a test.

## Installation

Add to composer.json:
```
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/pboivin/twill-numeric-input"
        }
    ],
```

Run:
```
npm install vue-numeric --save

composer require pboivin/twill-numeric-input 

php artisan vendor:publish --provider='PBoivin\TwillNumericInput\ServiceProvider' --tag=components

php artisan twill:build
```

## Usage

Form field:
```
    @formField('twill-numeric-input::field', [
        'name' => 'price',
        'label' => 'Price',
        'thousandSeparator' => ',',
    ])
```

Block:
```
    @formField('block_editor', ['blocks' => ['number-list']])
```

Repeater:
```
    @formField('repeater', ['type' => 'number-item'])
```
