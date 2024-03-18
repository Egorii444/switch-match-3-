<!DOCTYPE html>
<html>
<head>
    <title>Меню ресторана</title>
</head>
<body>
<h2>Меню ресторана</h2>
<form method="post">
    <label>Выберите блюда из меню, вводя их номера через запятую:</label><br>
    <input type="text" name="items"><br><br>
    <input type="submit" value="Посчитать стоимость">
</form>

<?php
// Массив с ценами блюд
$menu = array(
    1 => 100, // Цена за бургер
    2 => 80,  // Цена за пиццу
    3 => 50,  // Цена за салат
    4 => 120, // Цена за стейк
    5 => 70   // Цена за суп
);

// Проверяем, были ли отправлены номера блюд из формы
if(isset($_POST['items'])) {
    // Получаем номера блюд из формы
    $selectedItems = explode(",", $_POST['items']);
    $totalCost = 0;

    // Считаем общую стоимость заказа
    foreach ($selectedItems as $item) {
        $item = intval($item);
        switch ($item) {
            case 1:
            case 2:
            case 3:
            case 4:
            case 5:
                $totalCost += $menu[$item];
                break;
            default:
                echo "<p>Некорректный номер блюда: $item</p>";
        }
    }

    // Выводим итоговую стоимость заказа
    echo "<p>Итоговая стоимость заказа: $totalCost рублей</p>";
}
?>
</body>
</html>