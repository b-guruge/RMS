<?php 

//sunshine maximum character lengths for barcode
$sun_pcode=8;
$sun_barcode=12;
$sun_start_sequence=6;
$sun_title=30;
$sun_price=10;
$sun_batch_min_char=2;
$sun_pcode_length_msg = "Maximum Character length for product code is " . $sun_pcode;
$sun_barcode_length_msg = "Maximum Character length for barcode is " . $sun_barcode;
$sun_title_length_msg = "Maximum Character length for title is " . $sun_title;
$sun_batch_min_char_length_msg = "Minimum Character length for batch no. is " . $sun_batch_min_char;
$sun_price_length_msg = "Maximum Character length for price is " . $sun_price;
$sun_start_sequence_msg = "Maximum Character length for start sequence is ". $sun_start_sequence;

//sunshine
$print_save_proc = "save_print_sunshine";
$grn_save_sunshine = "save_grn_sunshine";
$barcode_fixletter_manual = "CM";
$barcode_fixletter_auto = "CA";
$barcode_title = "Sunshine Healthcare Lanka Ltd.";

//ey
$grn_save_ey = "save_grn_ey";
$bl_nbl_nti_assets_proc = "get_bl__nbl_nti_assets";
$update_location_audit_start_proc = "update_audit_location_start";

//General
$timezone = "Asia/Colombo";
$found_assets_title = "Found Assets";
$nbl_assets_title = "Non - Belonging Assets";
$nti_assets_title = "Missing Assets";


$save_audit = "save_audit_header";
$grn_products_table_column_headers = "grn_products_table_column_headers";
$grn_products_table_columns = "grn_products_table_columns";


?>