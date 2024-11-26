# src\Arrays.php
Реализуйте функцию ```calculateAverage()```, которая высчитывает среднее арифметическое элементов массива. Благодаря этой функции мы наконец-то посчитаем среднюю температуру по больнице :)

# Примеры
```php
<?php

$temperatures = [37.5, 34, 39.3, 40, 38.7, 41.5];

calculateAverage($temperatures); // 38.5
В случае пустого массива функция должна вернуть 0. Для этого в коде можно использовать guard expression:

<?php

$temperatures = [];

calculateAverage($temperatures); // 0