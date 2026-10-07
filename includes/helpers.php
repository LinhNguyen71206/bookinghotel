<?php
/* ============================================================
 * includes/helpers.php - Hàm tiện ích dùng chung cho các trang
 * ============================================================ */

/* Escape dữ liệu trước khi in ra HTML (chống XSS). Dùng: <?= e($value) ?> */
function e($value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

/* Định dạng tiền VND: 1200000 -> "1.200.000 ₫" */
function formatPrice($amount): string
{
    return number_format((float) $amount, 0, ',', '.') . ' ₫';
}

/* Số đêm giữa hai ngày 'Y-m-d' (ngày trả phải sau ngày nhận) */
function calculateNights(string $checkIn, string $checkOut): int
{
    return (int) (new DateTime($checkIn))->diff(new DateTime($checkOut))->days;
}

/* Tổng tiền = giá/đêm x số đêm x số phòng (VND) */
function calculateTotal(int $pricePerNight, int $nights, int $quantity): int
{
    return $pricePerNight * $nights * $quantity;
}