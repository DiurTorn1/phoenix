<?php
require "config_bd.php"; // Подключение к базе данных

// Подготовленный запрос
$sql = "DELETE FROM `sell_users_permission` 
        WHERE product_id = ? 
        AND user_email = ?";

// Подготавливаем запрос
$stmt = $conn->prepare($sql);

if ($stmt) {
    // Привязываем параметры
    $stmt->bind_param("ss", $_POST['product_id'], $_POST['user_email']);

    // Выполняем запрос
    if ($stmt->execute()) {
        echo "OK";
    } else {
        echo "Ошибка при выполнении запроса: " . $stmt->error;
    }

    // Закрываем запрос
    $stmt->close();
} else {
    echo "Ошибка при подготовке запроса: " . $conn->error;
}

// Закрываем соединение с базой данных
$conn->close();
?>