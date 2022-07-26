<?php

/**
 * Customer Reset Password email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-reset-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates\Emails
 * @version 4.0.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

?>

<?php do_action('woocommerce_email_header', $email_heading, $email); ?>
<?php
$user_email = $email->user_email;
?>

<h3>Sehr geehrte(r) <?php echo $user_login;?></h3>
<p><?php esc_html_e('Someone has requested a new password for the following account on albis.ch', 'email'); ?></p>

<?php /* translators: %s: Customer username */ ?>
<div class="info-bluebox" style="background:#E4EDF6;padding:25px;">
	<div class="remove-link-dec"><h3><?php strip_tags(printf(esc_html__('Username: %s', 'email'), strip_tags(esc_html($user_email))));
																		?></h3></div>
</div>

<p style="padding-bottom:50px"><?php esc_html_e('If you didn\'t make this request, just ignore this email. If you\'d like to proceed:', 'email'); ?>
	<a class="link" href="<?php echo esc_url(add_query_arg(array('key' => $reset_key, 'id' => $user_id), wc_get_endpoint_url('lost-password', '', wc_get_page_permalink('myaccount')))); ?>"><?php // phpcs:ignore 																																														
																																																?>
		<?php esc_html_e('Click here to reset your password', 'email'); ?>
	</a>
</p>
<p class="no-reply"><?php printf(esc_html__('This is an automatically generated message. Please do not reply to this email.', 'email')); ?></p>

<?php
/**
 * Show user-defined additional content - this is set in each email's settings.
 */
if ($additional_content) {
	echo wp_kses_post(wpautop(wptexturize($additional_content)));
}

do_action('woocommerce_email_footer', $email);
