# src\Arrays.php

Реализуйте функцию ```apply()```, которая применяет указанную операцию к переданному массиву и возвращает новый массив. Всего нужно реализовать три операции:

- reset — сброс массива
- remove — удаление значения по индексу
- change — обновление значения по индексу

```php
<?php

use function App\Arrays\apply;

$cities = ['moscow', 'london', 'berlin', 'porto'];

// Сброс в пустой массив
apply($cities, 'reset'); // []

// Удаление значения по индексу
apply($cities, 'remove', 1); // ['moscow', 'berlin', 'porto']
// Изменение значения по индексу
apply($cities, 'change', 0, 'miami'); // ['miami', 'london', 'berlin', 'porto']