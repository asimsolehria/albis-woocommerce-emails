<?php

/**
 * Customer processing order email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-processing-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates\Emails
 * @version 3.7.0
 */

if (!defined('ABSPATH')) {
	exit;
}

/*
 * @hooked WC_Emails::email_header() Output the email header
 */
do_action('woocommerce_email_header', $email_heading, $email); ?>

<?php /* translators: %s: Customer first name */ ?>
<p class="greeting-line"><?php printf(esc_html__('Hi %s,', 'email'), esc_html($order->get_billing_first_name() . ' ' . $order->get_billing_last_name())); ?></p>

<?php /* translators: %s: Order number */ ?>
<p><?php __('Just to let you know &mdash; we\'ve received your order , and it is now being processed:', 'email'); ?></p>

<?php
if ($additional_content) {
	echo wp_kses_post(wpautop(wptexturize($additional_content)));
}
?>


<?php /* translators: %s: Order number */ ?>
<p class="no-reply"><?php printf(esc_html__('This is an automatically generated message. Please do not reply to this email.', 'email')); ?></p>




<?php

/*
 * @hooked WC_Emails::order_details() Shows the order details table.
 * @hooked WC_Structured_Data::generate_order_data() Generates structured data.
 * @hooked WC_Structured_Data::output_structured_data() Outputs structured data.
 * @since 2.5.0
 */
do_action('woocommerce_email_order_details', $order, $sent_to_admin, $plain_text, $email);

/*
 * @hooked WC_Emails::order_meta() Shows order meta data.
 */
do_action('woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text, $email);

/*
 * @hooked WC_Emails::customer_details() Shows customer details
 * @hooked WC_Emails::email_address() Shows email address
 */
do_action('woocommerce_email_customer_details', $order, $sent_to_admin, $plain_text, $email);

/**
 * Show user-defined additional content - this is set in each email's settings.
 */


/**
 * Custom avertising
 */
?>
<table style="empty-cells:show" class="advertising" border="0" cellpadding="10" cellspacing="0" width="100%">
	<tr>
		<td colspan="2" valign="top">
			<img style="max-width:unset" src="https://albis.entwicklung.online/wp-content/uploads/2021/06/kissen-stacks-mit-blumen.png" alt="albis_logo" width="220">
		</td>
		<td colspan="2" valign="top">
			<h2>
				<?php esc_html_e('Discover the power of herbs:', 'email'); ?>
			</h2>
			<p><?php esc_html_e('In the duvets and pillows of our new Olena line, integrated scented sachets with a blend of soothing and refreshing Swiss herbs and flowers ensure a particularly restful sleep.', 'email'); ?></p>
			<br>
		</td>
	</tr>
	<tr>
		<!-- <td colspan="4" style="text-align:right">
		<a style="background:#BB2F34; color:white; width:auto; padding:10px 25px;  text-decoration: none;" href="https://albis.entwicklung.online/kategorie/produktlinien/olena/"><?php esc_html_e('Discover:', 'email'); ?></a>
		</td> -->
		<td colspan="3">

		</td>
		<td align="center" style="background-color:#BB2F34;display:block;mso-padding-alt:14px 40px 14px 40px;"><a href="https://albis.entwicklung.online/kategorie/produktlinien/olena/" style="color:#FFFFFF;display:block;font-family:'Poppins', DejaVu Sans, Verdana, sans-serif;font-size:14px;font-weight:600;letter-spacing:1px;line-height:24px;padding:14px 40px 14px 40px;text-decoration:none;white-space:nowrap;">Discover</a></td>
	</tr>
</table>
<?php

/*
 * @hooked WC_Emails::email_footer() Output the email footer
 */
do_action('woocommerce_email_footer', $email);
