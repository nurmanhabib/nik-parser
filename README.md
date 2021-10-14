# NIK Parser (Indonesia)

NIK Parser is used to parse a Population Identification Number that is valid in Indonesia or commonly called NIK. NIK is an arrangement of numbers that have meaning. Each NIK may contain information:

- Area of origin (village, sub-district, city/district, and provincial level)
- Sex (male or female)
- Date of birth

This process only relies on information from the ID code, there is no need to connect to the Dukcapil service. Especially for parsing the area of origin requires a valid area database issued by the Ministry of Home Affairs (I am currently developing it)

## Installation

Use the package manager [composer](https://getcomposer.org) to install nik-parser.

```bash
composer install nurmanhabib/nik-parser
```

## Usage

```php
<?php

require "vendor/autoload.php";

use Nurmanhabib\NIKParser\NIKParser;

$nik = "1050245708900001";
$parser = new NIKParser($nik);

echo $parser->getDateOfBirth()->toDateString(); // Output: 1990-08-17
echo $parser->getSex(); // Output: female
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)
