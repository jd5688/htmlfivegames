<?php
  $xml = <<<DEM
    <?xml version="1.0" encoding="UTF-8"?>
    <xs:schema xmlns:xs="http://www.w3.org/2001/XMLSchema" elementFormDefault="qualified">
      <xs:element name="bill_to_address1" type="xs:string"/>
      <xs:element name="bill_to_address2" type="xs:string"/>
      <xs:element name="bill_to_city" type="xs:string"/>
      <xs:element name="bill_to_company" type="xs:string"/>
      <xs:element name="bill_to_country" type="xs:string"/>
      <xs:element name="bill_to_first_name" type="xs:string"/>
      <xs:element name="bill_to_last_name" type="xs:string"/>
      <xs:element name="bill_to_state" type="xs:string"/>
      <xs:element name="bill_to_zip" type="xs:string"/>
      <xs:element name="card_auth_ticket" type="xs:string"/>
      <xs:element name="card_exp_month" type="xs:string"/>
      <xs:element name="card_exp_year" type="xs:string"/>
      <xs:element name="card_number" type="xs:string"/>
      <xs:element name="card_type" type="xs:string"/>
      <xs:element name="check_number" type="xs:string"/>
      <xs:element name="purchase_order_number" type="xs:string"/>
      <xs:element name="cost" type="xs:string"/>
      <xs:element name="cost_change" type="xs:string"/>
      <xs:element name="coupon">
        <xs:complexType>
          <xs:sequence>
            <xs:element ref="merchant_id"/>
            <xs:element ref="order_id"/>
            <xs:element ref="coupon_code"/>
            <xs:element ref="coupon_accounting_code"/>
            <xs:element ref="base_coupon_code"/>
          </xs:sequence>
        </xs:complexType>
      </xs:element>
      <xs:element name="has_customer_profile" type="xs:string"/>
      <xs:element name="customer_profile">
        <xs:complexType>
          <xs:sequence>
            <xs:element ref="email"/>
            <xs:element ref="terms"/>
            <xs:element ref="qb_class"/>
            <xs:element ref="qb_code" minOccurs="0"/>
          </xs:sequence>
        </xs:complexType>
      </xs:element>
      <xs:element name="coupon_accounting_code" type="xs:string"/>
      <xs:element name="coupon_code" type="xs:string"/>
      <xs:element name="base_coupon_code" type="xs:string"/>
      <xs:element name="current_stage" type="xs:string"/>
      <xs:element name="payment_status" type="xs:string"/>
      <xs:element name="day_phone" type="xs:string"/>
      <xs:element name="delivery_date" type="xs:string"/>
      <xs:element name="description" type="xs:string"/>
      <xs:element name="email" type="xs:string"/>
      <xs:element name="gift_email" type="xs:string"/>
      <xs:element name="evening_phone" type="xs:string"/>
      <xs:element name="export">
        <xs:complexType>
          <xs:sequence>
            <xs:element ref="export_location"/>
            <xs:element ref="order" minOccurs="0" maxOccurs="unbounded"/>
          </xs:sequence>
        </xs:complexType>
      </xs:element>
      <xs:element name="export_location" type="xs:string"/>
      <xs:element name="fax" type="xs:string"/>
      <xs:element name="free_shipping" type="xs:string"/>
      <xs:element name="accounting_code" type="xs:string"/>
      <xs:element name="gift" type="xs:string"/>
      <xs:element name="gift_charge" type="xs:string"/>
      <xs:element name="gift_charge_accounting_code" type="xs:string"/>
      <xs:element name="gift_message" type="xs:string"/>
      <xs:element name="gift_wrap_accounting_code" type="xs:string"/>
      <xs:element name="gift_wrap_cost" type="xs:string"/>
      <xs:element name="gift_wrap_title" type="xs:string"/>
      <xs:element name="item">
        <xs:complexType>
          <xs:sequence>
            <xs:element ref="merchant_id"/>
            <xs:element ref="order_id"/>
            <xs:element ref="item_id"/>
            <xs:element ref="item_index"/>
            <xs:element ref="quantity"/>
            <xs:element ref="description"/>
            <xs:element ref="cost"/>
            <xs:element ref="unit_cost_with_discount"/>
            <xs:element ref="total_cost_with_discount"/>
            <xs:element ref="cogs"/>
            <xs:element ref="actual_cogs"/>
            <xs:element ref="pricing_tier_name" minOccurs="0" maxOccurs="1"/>
            <xs:element ref="barcode" minOccurs="0" maxOccurs="1"/>
            <xs:element ref="manufacturer_sku" minOccurs="0" maxOccurs="1"/>
            <xs:element ref="customs_description" minOccurs="0" maxOccurs="1"/>
            <xs:element ref="country_of_origin" minOccurs="0" maxOccurs="1"/>
            <xs:element ref="item_weight"/>
            <xs:element ref="tax_free"/>
            <xs:element ref="special_product_type"/>
            <xs:element ref="free_shipping"/>
            <xs:element ref="accounting_code"/>
            <xs:element ref="discount"/>
            <xs:element ref="channel_partner_item_id" minOccurs="0" maxOccurs="1"/>
            <xs:element ref="distribution_center_code"/>
            <xs:element ref="kit"/>
            <xs:element ref="kit_component"/>
            <xs:element ref="quantity_refunded" minOccurs="0" maxOccurs="1"/>
            <xs:element ref="total_refunded" minOccurs="0" maxOccurs="1"/>
            <xs:element ref="component_unit_value" minOccurs="0" maxOccurs="1"/>
            <xs:element ref="option" minOccurs="0" maxOccurs="unbounded"/>
            <xs:element ref="lot" minOccurs="0" maxOccurs="unbounded"/>
          </xs:sequence>
        </xs:complexType>
      </xs:element>
      <xs:element name="transaction_details">
        <xs:complexType>
          <xs:sequence>
            <xs:element ref="transaction_detail" minOccurs="0" maxOccurs="unbounded"/>
          </xs:sequence>
        </xs:complexType>
      </xs:element>
      <xs:element name="transaction_detail">
        <xs:complexType>
          <xs:sequence>
            <xs:element ref="transaction_id"/>
            <xs:element ref="transaction_gateway"/>
            <xs:element ref="transaction_timestamp"/>
            <xs:element ref="transaction_successful"/>
            <xs:element ref="extended_details"/>
          </xs:sequence>
        </xs:complexType>
      </xs:element>
      <xs:element name="extended_details">
        <xs:complexType>
          <xs:sequence>
            <xs:element ref="extended_detail" minOccurs="0" maxOccurs="unbounded"/>
          </xs:sequence>
        </xs:complexType>
      </xs:element>
      <xs:element name="extended_detail">
        <xs:complexType>
          <xs:sequence>
            <xs:element ref="extended_detail_name"/>
            <xs:element ref="extended_detail_value"/>
          </xs:sequence>
        </xs:complexType>
      </xs:element>
      <xs:element name="transaction_id" type="xs:string"/>
      <xs:element name="transaction_gateway" type="xs:string"/>
      <xs:element name="transaction_timestamp" type="xs:string"/>
      <xs:element name="transaction_successful" type="xs:string"/>
      <xs:element name="extended_detail_name" type="xs:string"/>
      <xs:element name="extended_detail_value" type="xs:string"/>
      <xs:element name="lot_number" type="xs:string"/>
      <xs:element name="lot_expiration" type="xs:string"/>
      <xs:element name="lot_quantity" type="xs:string"/>
      <xs:element name="item_id" type="xs:string"/>
      <xs:element name="item_index" type="xs:string"/>
      <xs:element name="item_weight" type="xs:string"/>
      <xs:element name="merchant_id" type="xs:string"/>
      <xs:element name="merchant_notes" type="xs:string"/>
      <xs:element name="option">
        <xs:complexType>
          <xs:sequence>
            <xs:element ref="merchant_id"/>
            <xs:element ref="order_id"/>
            <xs:element ref="item_id"/>
            <xs:element ref="item_index"/>
            <xs:element ref="option_id"/>
            <xs:element ref="option_name"/>
            <xs:element ref="option_value"/>
            <xs:element ref="cost_change"/>
            <xs:element ref="weight_change"/>
          </xs:sequence>
        </xs:complexType>
      </xs:element>
      <xs:element name="option_id" type="xs:string"/>
      <xs:element name="option_name" type="xs:string"/>
      <xs:element name="option_value" type="xs:string"/>
      <xs:element name="channel_partner_code" type="xs:string"/>
      <xs:element name="channel_partner_order_id" type="xs:string"/>
      <xs:element name="payment_date_time" type="xs:string"/>
      <xs:element name="shipping_date_time" type="xs:string"/>
      <xs:element name="lot">
        <xs:complexType>
          <xs:sequence>
            <xs:element ref="lot_number"/>
            <xs:element ref="lot_expiration"/>
            <xs:element ref="lot_quantity"/>
          </xs:sequence>
        </xs:complexType>
      </xs:element>
      <xs:element name="order">
        <xs:complexType>
          <xs:sequence>
            <xs:element ref="merchant_id"/>
            <xs:element ref="order_id"/>
            <xs:element ref="channel_partner_code" minOccurs="0"/>
            <xs:element ref="channel_partner_order_id" minOccurs="0"/>
            <xs:element ref="order_date"/>
            <xs:element ref="order_type"/>
            <xs:element ref="current_stage"/>
            <xs:element ref="payment_status"/>
            <xs:element ref="payment_date" minOccurs="0"/>
            <xs:element ref="payment_date_time" minOccurs="0"/>
            <xs:element ref="shipping_date" minOccurs="0"/>
            <xs:element ref="shipping_date_time" minOccurs="0"/>
            <xs:element ref="bill_to_company"/>
            <xs:element ref="bill_to_title"/>
            <xs:element ref="bill_to_first_name"/>
            <xs:element ref="bill_to_last_name"/>
            <xs:element ref="bill_to_address1"/>
            <xs:element ref="bill_to_address2"/>
            <xs:element ref="bill_to_city"/>
            <xs:element ref="bill_to_state"/>
            <xs:element ref="bill_to_zip"/>
            <xs:element ref="bill_to_country"/>
            <xs:element ref="tax_county"/>
            <xs:element ref="ship_to_company"/>
            <xs:element ref="ship_to_title"/>
            <xs:element ref="ship_to_first_name"/>
            <xs:element ref="ship_to_last_name"/>
            <xs:element ref="ship_to_address1"/>
            <xs:element ref="ship_to_address2"/>
            <xs:element ref="ship_to_city"/>
            <xs:element ref="ship_to_state"/>
            <xs:element ref="ship_to_zip"/>
            <xs:element ref="ship_to_country"/>
            <xs:element ref="shipping_method"/>
            <xs:element ref="lift_gate"/>
            <xs:element ref="shipping_tracking_number" minOccurs="0"/>
            <xs:element ref="gift"/>
            <xs:element ref="email"/>
            <xs:element ref="gift_email" minOccurs="0"/>
            <xs:element ref="mailing_list"/>
            <xs:element ref="day_phone"/>
            <xs:element ref="evening_phone"/>
            <xs:element ref="fax"/>
            <xs:element ref="check_number" minOccurs="0"/>
            <xs:element ref="purchase_order_number" minOccurs="0"/>
            <xs:element ref="card_type" minOccurs="0"/>
            <xs:element ref="card_number" minOccurs="0"/>
            <xs:element ref="card_exp_month" minOccurs="0"/>
            <xs:element ref="card_exp_year" minOccurs="0"/>
            <xs:element ref="card_auth_ticket" minOccurs="0"/>
            <xs:element ref="payment_method"/>
            <xs:element ref="item" minOccurs="0" maxOccurs="unbounded"/>
            <xs:element ref="gift_wrap_title" minOccurs="0"/>
            <xs:element ref="gift_wrap_cost" minOccurs="0"/>
            <xs:element ref="weight"/>
            <xs:element ref="subtotal"/>
            <xs:element ref="tax_rate"/>
            <xs:element ref="tax_rate_country" minOccurs="0" maxOccurs="1"/>
            <xs:element ref="tax_rate_state" minOccurs="0" maxOccurs="1"/>
            <xs:element ref="tax_rate_county" minOccurs="0" maxOccurs="1"/>
            <xs:element ref="tax_rate_city" minOccurs="0" maxOccurs="1"/>
            <xs:element ref="tax_rate_postal_code" minOccurs="0" maxOccurs="1"/>
            <xs:element ref="tax"/>
            <xs:element ref="shipping_handling_total"/>
            <xs:element ref="shipping_handling_total_discount"/>
            <xs:element ref="gift_charge" minOccurs="0"/>
            <xs:element ref="surcharge_transaction_fee"/>
            <xs:element ref="surcharge_transaction_percentage"/>
            <xs:element ref="surcharge"/>
            <xs:element ref="total"/>
            <xs:element ref="currency_code"/>

            <xs:element ref="actual_profit_analyzed"/>
            <xs:element ref="actual_profit_review"/>
            <xs:element ref="actual_profit_shipping"/>
            <xs:element ref="actual_profit_other_cost"/>
            <xs:element ref="actual_profit_fulfillment"/>
            <xs:element ref="actual_profit_payment_processing"/>
            <xs:element ref="actual_profit_profit"/>

            <xs:element ref="subtotal_refunded" minOccurs="0"/>
            <xs:element ref="other_refunded" minOccurs="0"/>
            <xs:element ref="tax_refunded" minOccurs="0"/>
            <xs:element ref="shipping_handling_refunded" minOccurs="0"/>
            <xs:element ref="buysafe_refunded" minOccurs="0"/>
            <xs:element ref="total_refunded" minOccurs="0"/>
            <xs:element ref="refund_by_user" minOccurs="0"/>
            <xs:element ref="refund_dts" minOccurs="0"/>
            <xs:element ref="rma" minOccurs="0"/>

            <xs:element ref="special_instructions"/>
            <xs:element ref="gift_message" minOccurs="0"/>
            <xs:element ref="merchant_notes"/>
            <xs:element ref="delivery_date" minOccurs="0"/>
            <xs:element ref="subtotal_discount"/>
            <xs:element ref="gift_charge_accounting_code"/>
            <xs:element ref="gift_wrap_accounting_code"/>
            <xs:element ref="surcharge_accounting_code"/>
            <xs:element ref="shipping_method_accounting_code"/>
            <xs:element ref="payment_method_accounting_code"/>
            <xs:element ref="payment_method_deposit_to_account"/>
            <xs:element ref="tax_country_accounting_code"/>
            <xs:element ref="tax_state_accounting_code"/>
            <xs:element ref="tax_county_accounting_code"/>
            <xs:element ref="tax_city_accounting_code"/>
            <xs:element ref="tax_postal_code_accounting_code"/>
            <xs:element ref="referral_code" minOccurs="0"/>
            <xs:element ref="advertising_source" minOccurs="0"/>
            <xs:element ref="screen_branding_theme_code"/>
            <xs:element ref="custom_field_1" minOccurs="0"/>
            <xs:element ref="custom_field_2" minOccurs="0"/>
            <xs:element ref="custom_field_3" minOccurs="0"/>
            <xs:element ref="custom_field_4" minOccurs="0"/>
            <xs:element ref="custom_field_5" minOccurs="0"/>
            <xs:element ref="buysafe_bond_cost" minOccurs="0"/>
            <xs:element ref="buysafe_bond_shopping_cart_id" minOccurs="0"/>
            <xs:element ref="buysafe_bond_available" minOccurs="0"/>
            <xs:element ref="buysafe_bond_free" minOccurs="0"/>
            <xs:element ref="buysafe_bond_wanted" minOccurs="0"/>
            <xs:element ref="coupon" minOccurs="0" maxOccurs="unbounded"/>
            <xs:element ref="sales_rep_code" minOccurs="0"/>
            <xs:element ref="has_customer_profile" minOccurs="0"/>
            <xs:element ref="customer_profile" minOccurs="0" maxOccurs="1"/>
            <xs:element ref="transaction_details" minOccurs="0" maxOccurs="1"/>
            <xs:element ref="customer_ip_address" minOccurs="0"/>
            <xs:element ref="tier_1_affiliate_oid" minOccurs="0"/>
            <xs:element ref="tier_1_affiliate_sub_id" minOccurs="0"/>
            <xs:element ref="tier_2_affiliate_oid" minOccurs="0"/>
            <xs:element ref="tier_3_affiliate_oid" minOccurs="0"/>
            <xs:element ref="tier_4_affiliate_oid" minOccurs="0"/>
            <xs:element ref="tier_5_affiliate_oid" minOccurs="0"/>
            <xs:element ref="auto_order_code" minOccurs="0"/>
            <xs:element ref="auto_order_original_order_id" minOccurs="0"/>
            <xs:element ref="auto_order_status" minOccurs="0"/>
            <xs:element ref="auto_order_last_rebill" minOccurs="0"/>
            <xs:element ref="upsell_path_code" minOccurs="0"/>
            <xs:element ref="test_order"/>
          </xs:sequence>
        </xs:complexType>
      </xs:element>
      <xs:element name="terms" type="xs:string"/>
      <xs:element name="qb_class" type="xs:string"/>
      <xs:element name="qb_code" type="xs:string"/>
      <xs:element name="bill_to_title" type="xs:string"/>
      <xs:element name="ship_to_title" type="xs:string"/>
      <xs:element name="mailing_list" type="xs:string"/>
      <xs:element name="actual_profit_analyzed" type="xs:string"/>
      <xs:element name="actual_profit_review" type="xs:string"/>
      <xs:element name="actual_profit_shipping" type="xs:string"/>
      <xs:element name="actual_profit_other_cost" type="xs:string"/>
      <xs:element name="actual_profit_fulfillment" type="xs:string"/>
      <xs:element name="actual_profit_payment_processing" type="xs:string"/>
      <xs:element name="actual_profit_profit" type="xs:string"/>
      <xs:element name="subtotal_refunded" type="xs:string"/>
      <xs:element name="other_refunded" type="xs:string"/>
      <xs:element name="tax_refunded" type="xs:string"/>
      <xs:element name="shipping_handling_refunded" type="xs:string"/>
      <xs:element name="buysafe_refunded" type="xs:string"/>
      <xs:element name="total_refunded" type="xs:string"/>
      <xs:element name="component_unit_value" type="xs:string"/>
      <xs:element name="refund_by_user" type="xs:string"/>
      <xs:element name="refund_dts" type="xs:string"/>
      <xs:element name="rma" type="xs:string"/>
      <xs:element name="screen_branding_theme_code" type="xs:string"/>
      <xs:element name="custom_field_1" type="xs:string"/>
      <xs:element name="custom_field_2" type="xs:string"/>
      <xs:element name="custom_field_3" type="xs:string"/>
      <xs:element name="custom_field_4" type="xs:string"/>
      <xs:element name="custom_field_5" type="xs:string"/>
      <xs:element name="buysafe_bond_cost" type="xs:string"/>
      <xs:element name="buysafe_bond_shopping_cart_id" type="xs:string"/>
      <xs:element name="buysafe_bond_available" type="xs:string"/>
      <xs:element name="buysafe_bond_free" type="xs:string"/>
      <xs:element name="buysafe_bond_wanted" type="xs:string"/>
      <xs:element name="sales_rep_code" type="xs:string"/>
      <xs:element name="order_date" type="xs:string"/>
      <xs:element name="order_id" type="xs:string"/>
      <xs:element name="order_type" type="xs:string"/>
      <xs:element name="payment_date" type="xs:string"/>
      <xs:element name="referral_code" type="xs:string"/>
      <xs:element name="advertising_source" type="xs:string"/>
      <xs:element name="payment_method" type="xs:string"/>
      <xs:element name="payment_method_accounting_code" type="xs:string"/>
      <xs:element name="payment_method_deposit_to_account" type="xs:string"/>
      <xs:element name="quantity" type="xs:string"/>
      <xs:element name="ship_to_address1" type="xs:string"/>
      <xs:element name="ship_to_address2" type="xs:string"/>
      <xs:element name="ship_to_city" type="xs:string"/>
      <xs:element name="ship_to_company" type="xs:string"/>
      <xs:element name="ship_to_country" type="xs:string"/>
      <xs:element name="ship_to_first_name" type="xs:string"/>
      <xs:element name="ship_to_last_name" type="xs:string"/>
      <xs:element name="ship_to_state" type="xs:string"/>
      <xs:element name="ship_to_zip" type="xs:string"/>
      <xs:element name="shipping_date" type="xs:string"/>
      <xs:element name="shipping_handling_total" type="xs:string"/>
      <xs:element name="shipping_handling_total_discount" type="xs:string"/>
      <xs:element name="shipping_method" type="xs:string"/>
      <xs:element name="lift_gate" type="xs:string"/>
      <xs:element name="shipping_method_accounting_code" type="xs:string"/>
      <xs:element name="shipping_tracking_number" type="xs:string"/>
      <xs:element name="special_instructions" type="xs:string"/>
      <xs:element name="special_product_type" type="xs:string"/>
      <xs:element name="subtotal" type="xs:string"/>
      <xs:element name="subtotal_discount" type="xs:string"/>
      <xs:element name="surcharge" type="xs:string"/>
      <xs:element name="surcharge_accounting_code" type="xs:string"/>
      <xs:element name="surcharge_transaction_fee" type="xs:string"/>
      <xs:element name="surcharge_transaction_percentage" type="xs:string"/>
      <xs:element name="tax" type="xs:string"/>
      <xs:element name="tax_city_accounting_code" type="xs:string"/>
      <xs:element name="tax_country_accounting_code" type="xs:string"/>
      <xs:element name="tax_county" type="xs:string"/>
      <xs:element name="tax_county_accounting_code" type="xs:string"/>
      <xs:element name="tax_free" type="xs:string"/>
      <xs:element name="tax_postal_code_accounting_code" type="xs:string"/>
      <xs:element name="tax_rate" type="xs:string"/>
      <xs:element name="tax_rate_country" type="xs:string"/>
      <xs:element name="tax_rate_state" type="xs:string"/>
      <xs:element name="tax_rate_county" type="xs:string"/>
      <xs:element name="tax_rate_city" type="xs:string"/>
      <xs:element name="tax_rate_postal_code" type="xs:string"/>
      <xs:element name="tax_state_accounting_code" type="xs:string"/>
      <xs:element name="total" type="xs:string"/>
      <xs:element name="currency_code" type="xs:string"/>
      <xs:element name="weight" type="xs:string"/>
      <xs:element name="weight_change" type="xs:string"/>
      <xs:element name="discount" type="xs:string"/>
      <xs:element name="unit_cost_with_discount" type="xs:string"/>
      <xs:element name="total_cost_with_discount" type="xs:string"/>
      <xs:element name="cogs" type="xs:string"/>
      <xs:element name="actual_cogs" type="xs:string"/>
      <xs:element name="pricing_tier_name" type="xs:string"/>
      <xs:element name="barcode" type="xs:string"/>
      <xs:element name="manufacturer_sku" type="xs:string"/>
      <xs:element name="customs_description" type="xs:string"/>
      <xs:element name="country_of_origin" type="xs:string"/>
      <xs:element name="channel_partner_item_id" type="xs:string"/>
      <xs:element name="distribution_center_code" type="xs:string"/>
      <xs:element name="kit" type="xs:string"/>
      <xs:element name="kit_component" type="xs:string"/>
      <xs:element name="quantity_refunded" type="xs:string"/>
      <xs:element name="customer_ip_address" type="xs:string"/>
      <xs:element name="tier_1_affiliate_oid" type="xs:string"/>
      <xs:element name="tier_1_affiliate_sub_id" type="xs:string"/>
      <xs:element name="tier_2_affiliate_oid" type="xs:string"/>
      <xs:element name="tier_3_affiliate_oid" type="xs:string"/>
      <xs:element name="tier_4_affiliate_oid" type="xs:string"/>
      <xs:element name="tier_5_affiliate_oid" type="xs:string"/>
      <xs:element name="auto_order_code" type="xs:string"/>
      <xs:element name="auto_order_original_order_id" type="xs:string"/>
      <xs:element name="auto_order_status" type="xs:string"/>
      <xs:element name="auto_order_last_rebill" type="xs:string"/>
      <xs:element name="upsell_path_code" type="xs:string"/>
      <xs:element name="test_order" type="xs:string"/>
    </xs:schema>
DEM;
?>

<form method="post" action="xmlPostBackExample.php">
  <input type="hidden" name="xml" value='<?php echo base64_encode($xml);?>'/>
  <input type="submit" name="submit" value="Submit"/>
</form>