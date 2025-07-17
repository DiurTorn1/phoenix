<?php
require "config_bd.php";

// Получаем имя таблицы из POST запроса
$table_name = $_POST['table_name'];

// Формируем SQL-запрос
$sql = "SELECT * FROM `$table_name`"; // Оборачиваем имя таблицы в обратные кавычки для экранирования

// Выполняем запрос
$result = $conn->query($sql);

// Проверяем результат запроса
if ($result === false) {
    // Если запрос не выполнен, выводим сообщение об ошибке
    $errorMessage = mysqli_error($conn);
    $errorData = array(
        'status' => 'error',
        'message' => "Ошибка при выполнении запроса: $errorMessage",
        'data' => null
    );
    echo json_encode($errorData);
} else {
    // Если запрос выполнен успешно, извлекаем результаты
    $news_events = $result->fetch_all(MYSQLI_ASSOC);
    $resultData = array(
        'status' => 'success',
        'message' => 'Данные получены успешно',
        'data' => $news_events
    );
    echo json_encode($resultData);
}

// Закрываем соединение с базой данных
$conn->close();
?>