<?php
function set_secure_cookie($name, $value, $expiry_days) {
    $expiry_time = time() + ($expiry_days * 86400); 
    
    $options = [
        'expires' => $expiry_time,
        'path' => '/',
        'domain' => '',
        'secure' => false,
        'httponly' => true,
        'samesite' => 'Lax'
    ];

    setcookie($name, $value, $options);
}

function get_recent_products() {
    if (isset($_COOKIE['recent_products'])) {
        $data = json_decode($_COOKIE['recent_products'], true);
        if (is_array($data)) {
            return $data;
        }
    }
    return [];
}

function add_recent_product($product_id) {
    $product_id = (int) $product_id;
    if ($product_id <= 0) return;

    $recent = get_recent_products();

    $recent = array_filter($recent, function($id) use ($product_id) {
        return $id !== $product_id;
    });

    array_unshift($recent, $product_id);

    if (count($recent) > 5) {
        array_pop($recent);
    }

    set_secure_cookie('recent_products', json_encode(array_values($recent)), 7);
}
?>