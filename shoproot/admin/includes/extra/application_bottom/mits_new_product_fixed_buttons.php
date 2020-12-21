<?php
/**
 * --------------------------------------------------------------
 * File: mits_new_product_fixed_buttons.php
 * Date: 22.11.2020
 * Time: 16:09
 *
 * Author: Hetfield
 * Copyright: (c) 2020 - MerZ IT-SerVice
 * Web: https://www.merz-it-service.de
 * Contact: info@merz-it-service.de
 * --------------------------------------------------------------
 */

defined('MODULE_MITS_FIXED_ADMIN_PRODUCTBUTTONS_STATUS') or define('MODULE_MITS_FIXED_ADMIN_PRODUCTBUTTONS_STATUS', 'true');

if (defined('MODULE_MITS_FIXED_ADMIN_PRODUCTBUTTONS_STATUS') && MODULE_MITS_FIXED_ADMIN_PRODUCTBUTTONS_STATUS == 'true') {
  if (strstr($PHP_SELF, FILENAME_CATEGORIES) && isset($_GET['action']) && $_GET['action'] == 'new_product') {
    ?>
    <div class="main" id="fixedbuttons">
      <input type="submit" class="button" value="<?php echo BUTTON_SAVE; ?>" <?php echo $confirm_save_entry; ?>>
      <?php
      if (isset($_GET['pID']) && $_GET['pID'] > 0) {
        echo '<br /><input type="submit" class="button" name="prod_update" value="' . BUTTON_UPDATE . '" ' . $confirm_save_entry . '/>';

        if (is_file('includes/modules/products_tags_iframe.php')) {
          include_once("includes/modules/products_tags_iframe.php");
        }
        if (function_exists('tags_iframe_link')) {
          echo '<br />' . tags_iframe_link($_GET['pID']);
        } else {
          echo '<br /><a class="button" href="' . xtc_href_link('products_tags.php', 'cpath=' . $cPath . $catfunc->page_parameter . '&current_product_id=' . $_GET['pID'] . '&action=edit&oldaction=new_product') . '" onclick="this.blur()">' . TEXT_PRODUCTS_TAGS . '</a>';
        }

        if (is_file('includes/modules/products_attributes_iframe.php')) {
          include_once("includes/modules/products_attributes_iframe.php");
        }
        if (function_exists('attributes_iframe_link')) {
          echo '<br />' . attributes_iframe_link($_GET['pID']);
        } else {
          echo '<br /><a class="button" href="' . xtc_href_link('new_attributes.php', 'cpath=' . $cPath . $catfunc->page_parameter . '&current_product_id=' . $_GET['pID'] . '&action=edit&oldaction=new_product') . '" onclick="this.blur()">' . BUTTON_EDIT_ATTRIBUTES . '</a>';
        }

        echo '<br /><a onclick="return confirmLink(\'' . CONTINUE_WITHOUT_SAVE . '\', \'\' ,this)" class="button" href="' . xtc_href_link(FILENAME_CONTENT_MANAGER, xtc_get_all_get_params(array('action', 'last_action', 'set', 'id')) . 'last_action=' . $_GET['action'] . '&action=new_products_content&set=product') . '">' . BUTTON_NEW_CONTENT . '</a>';
        echo '<br /><a class="button" href="' . xtc_catalog_href_link('product_info.php', 'products_id=' . $_GET['pID']) . '" target="_blank">' . BUTTON_VIEW_PRODUCT . '</a>';
      }
      echo '<br /><a class="button" href="' . ((isset($_GET['origin']) && $_GET['origin'] != '') ? xtc_href_link(basename($_GET['origin']), 'pID=' . (int)$_GET['pID'] . $catfunc->page_parameter) : xtc_href_link(FILENAME_CATEGORIES, 'cPath=' . $cPath . $catfunc->page_parameter . ((isset($_GET['pID']) && $_GET['pID'] != '') ? '&pID=' . (int)$_GET['pID'] : ''))) . '">' . BUTTON_CANCEL . '</a>';
      ?>
      <small><br />
        <p>MITS Fixed Admin Product Buttons &copy; by
          <a href="https://www.merz-it-service.de/" target="_blank"><span style="padding:2px;background:#ffe;color:#6a9;font-weight:bold;">Hetfield (MerZ IT-SerVice)</span></a>
        </p></small>
    </div>
    <script>
      $(document).ready(function () {
        $("#fixedbuttons").prependTo("#new_product");
      });
    </script>
    <style>
      #new_product {
        position: relative;
      }

      #fixedbuttons {
        position: fixed;
        margin-top: 10px;
        left: 1050px;
        padding: 10px;
        z-index: 2;
        text-align: center;
        width: 200px;
        background: #ffe;
        box-shadow: 0 0 0.4em #6a9;
        -moz-box-shadow: 0 0 0.4em #6a9;
        -webkit-box-shadow: 0 0 0.4em #6a9;
        border: 0.125em solid #ffe;
        border-radius: 0.9em;
        -moz-border-radius: 0.9em;
        -webkit-border-radius: 0.9em;
      }

      #fixedbuttons .button {
        width: 100%;
      }

      #fixedbuttons a.button {
        padding: 6px 0;
      }
    </style>
    <?php
  }
}