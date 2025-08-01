<?php
require_once ('operations.php');
require_once ('class.login.php');
$dataAccess = new Operations();
$loginAccess = new logme();

if (isset($_POST['method']))
{
  $method = $_POST['method'];
  if ($method == "user_registration") {
    $agrr = $dataAccess->user_registration($_POST);
    echo json_encode($agrr);
  }
  if ($method == "user_login") {
    $agrr = $loginAccess->user_login($_POST);
    echo json_encode($agrr);
  }
  if ($method == "save_print_details") {
    $agrr = $dataAccess->save_print_details($_POST);
    echo json_encode($agrr);
  }
  if ($method == "save_grn_sunshine") {
    $agrr = $dataAccess->save_grn_sunshine($_POST);
    echo json_encode($agrr);
  }
  if ($method == "save_grn_ey") {
    $agrr = $dataAccess->save_grn_ey($_POST);
    echo json_encode($agrr);
  }
  if ($method == "save_new_grn_ey") {
    $agrr = $dataAccess->save_new_grn_ey($_POST);
    echo json_encode($agrr);
  }
  if ($method == "save_audit_ey") {
    $agrr = $dataAccess->save_audit_ey($_POST);
    echo json_encode($agrr);
  }
  if ($method == "user_logout") {
    $agrr = $loginAccess->user_logout();
    echo json_encode($agrr);
  }
  if ($method == "barcode_demo_add") {
    $agrr = $dataAccess->addReadBarcodes($_POST);
    echo json_encode($agrr);
  }
  if ($method == "barcode_demo_clear") {
    $agrr = $dataAccess->clearBarcodeDemoTable();
    echo json_encode($agrr);
  }
}

if (isset($_GET['method']))
{
  $method = $_GET['method'];
  if ($method == "get_feed") {
    $agrr = $dataAccess->save_feed($_GET);
    echo json_encode($agrr);
  }
  if ($method == "get_unique_print_id") {
    $agrr = $dataAccess->get_unique_print_id($_GET);
    echo json_encode($agrr);
  }
  if ($method == "create_audit_summary_excel") {
    $agrr = $dataAccess->create_audit_summary_excel($_GET);
    echo json_encode($agrr);
  }
  if ($method == "get_total_asset_count_for_location") {
    $agrr = $dataAccess->get_total_asset_count_for_location($_GET);
    echo json_encode($agrr);
  }
  if ($method == "get_last_audit_location_flag") {
    $agrr = $dataAccess->get_last_audit_location_flag($_GET);
    echo json_encode($agrr);
  }
  if ($method == "update_audit_start") {
    $agrr = $dataAccess->update_audit_start($_POST);
    echo json_encode($agrr);
  }
  if ($method == "end_current_location") {
    $agrr = $dataAccess->end_current_location($_POST);
    echo json_encode($agrr);
  }
  if ($method == "update_audit_barcode_read") {
    $agrr = $dataAccess->update_audit_barcode_read($_POST);
    echo json_encode($agrr);
  }
  if ($method == "complete_audit") {
    $agrr = $dataAccess->complete_audit($_POST);
    echo json_encode($agrr);
  }
  if ($method == "get_barcode_details") {
    $agrr = $dataAccess->get_barcode_details($_GET);
    echo json_encode($agrr);
  }
  if ($method == "get_grn_details_for_asset") {
    $agrr = $dataAccess->get_grn_details_for_asset($_GET);
    echo json_encode($agrr);
  }
  if ($method == "get_asset_and_grn_details") {
    $agrr = $dataAccess->get_asset_and_grn_details($_GET);
    echo json_encode($agrr);
  }

}

?>