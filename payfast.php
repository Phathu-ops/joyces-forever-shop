<?php
// Toggle sandbox or live
$is_live = true; // Set to true when going live

$merchant_id = $is_live ? "YOUR_LIVE_ID" : "10000100";
$merchant_key = $is_live ? "YOUR_LIVE_KEY" : "46f0cd694581a";

$return_url = "https://yourdomain.com/thank-you.html";
$cancel_url = "https://yourdomain.com/cancelled.html";
$notify_url = "https://yourdomain.com/ipn.php";

$amount = $_POST['amount'];
$item_name = $_POST['item_name'];

$query = array(
  "merchant_id" => $merchant_id,
  "merchant_key" => $merchant_key,
  "return_url" => $return_url,
  "cancel_url" => $cancel_url,
  "notify_url" => $notify_url,
  "amount" => number_format((float)$amount, 2, '.', ''),
  "item_name" => $item_name
);

$base_url = $is_live ? "https://www.payfast.co.za" : "https://sandbox.payfast.co.za";
header("Location: " . $base_url . "/eng/process?" . http_build_query($query));
exit;
?>
