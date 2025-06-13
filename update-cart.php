<?php
session_start();

if (isset($_POST['id']) && isset($_POST['quantity'])) {
    $id = $_POST['id'];
    $qty = intval($_POST['quantity']);

    foreach ($_SESSION['cart_item'] as &$item) {
        if ($item['d_id'] == $id) {
            $item['quantity'] = $qty;
            break;
        }
    }
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error']);
}
?>
