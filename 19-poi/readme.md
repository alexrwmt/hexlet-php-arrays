На Google Maps и многих других карта можно искать места, находящихся рядом с выбранной точкой — например, текущим расположением. В этом задании мы реализуем подобную задачу в очень упрощенном варианте.

src/Location.php
Реализуйте функцию getTheNearestLocation(), которая находит место, ближайшее к указанной точке на карте, и возвращает его. Параметры функции:

$locations – массив мест на карте. Каждое место — это массив из двух элементов, где первый элемент — это название места, второй – точка на карте (массив из двух чисел x и y)
$point – текущая точка на карте, то есть массив из двух элементов-координат x и y
<?php

$locations = [
  ['Park', [10, 5]],
  ['Sea', [1, 3]],
  ['Museum', [8, 4]],
];

$point = [5, 5];

// Если точек нет, то возвращается null
getTheNearestLocation([], $point); // null

getTheNearestLocation($locations, $point); // ['Museum', [8, 4]]
Подсказки
Для решения этой задачи деструктуризация не нужна, но мы хотим ее потренировать, поэтому решите эту задачу без обращения к индексам массивов
Расстояние между точками высчитывается с помощью функции getDistance().