<?php
require "config_bd.php";

header('Content-Type: text/plain'); // Устанавливаем правильный заголовок

try {
    // Проверяем обязательные параметры
    if (!isset($_POST['table']) || !isset($_POST['id_stream']) || !isset($_POST['reg_date'])) {
        throw new Exception('Missing required parameters');
    }

    // Проверяем и очищаем входные данные
    $table = preg_replace('/[^a-zA-Z0-9_]/', '', $_POST['table']);
    $id_stream = intval($_POST['id_stream']);
    $reg_date = $conn->real_escape_string($_POST['reg_date']);

    // Проверяем подключение к БД
    if ($conn->connect_error) {
        throw new Exception('Database connection failed: ' . $conn->connect_error);
    }

    // Используем подготовленные выражения для безопасности
    $stmt = $conn->prepare("INSERT INTO `$table` (`id_stream`, `reg_date`) VALUES (?, ?)");
    if (!$stmt) {
        throw new Exception('Prepare failed: ' . $conn->error);
    }

    $stmt->bind_param("is", $id_stream, $reg_date);
    
    if (!$stmt->execute()) {
        throw new Exception('Execute failed: ' . $stmt->error);
    }

    echo "OK";
    
} catch (Exception $e) {
    // Логируем ошибку для администратора
    error_log('Error in add_list_com.php: ' . $e->getMessage());
    // Возвращаем сообщение об ошибке
    echo "ERROR: " . $e->getMessage();
} finally {
    // Закрываем соединение
    if (isset($stmt)) $stmt->close();
    if (isset($conn)) $conn->close();
}
?>