## About Felicity Config

Felicity Config provides a very easy way to set and get config in PHP

## Usage

Set config with the static `set` method, or if passing `Config::getInstance()` in via dependency injection, use the `setItem` method.

```php
<?php

use felicity\config\Config;

Config::set('myConfig', 'myVal');
Config::set('myArrayConfig.MyArrayKey.MyOtherKey', 'myVal')
    ->setItem('MyOtherConfig', 'MyOtherVal');
```

Get config with the static `get` method, or if passing `Config::getInstance()` in via dependency injection, use the `getItem` method.

```php
<?php

use felicity\config\Config;

$myConfig = Config::get('myConfig', 'defaultVal');
$myOtherConfig = Config::get('MyConfigArray.MyConfigKey');
```

## License

Copyright 2017 BuzzingPixel, LLC

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at [http://www.apache.org/licenses/LICENSE-2.0](http://www.apache.org/licenses/LICENSE-2.0).

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
