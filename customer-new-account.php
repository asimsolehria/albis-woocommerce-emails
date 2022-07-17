<?php

/**
 * Customer new account email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-new-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates\Emails
 * @version 6.0.0
 */

defined('ABSPATH') || exit;

do_action('woocommerce_email_header', $email_heading, $email); ?>
<?php
$user_email = $email->object->user_email;
?>

<p><?php printf(esc_html__('Thank you for registering in our online shop. Your account has been successfully created.', 'email'));  ?></p>

<p><?php printf(esc_html__('You can change your details at any time under %s', 'email'),  make_clickable(esc_url(wc_get_page_permalink('myaccount'))));  ?></p>

<div class="info-bluebox" style="background:#E4EDF6;padding:25px;">
    <div><strong><?php strip_tags(printf(esc_html__('Username: %s', 'email'), strip_tags(esc_html($user_email))));
                    ?></strong></div>
    <div><strong><?php printf(esc_html__('Password:', 'email')); ?></strong> <?php printf(esc_html__('Your secret password', 'email')); ?></div>
</div>

<?php if ('yes' === get_option('woocommerce_registration_generate_password') && $password_generated && $set_password_url) : ?>
    <?php // If the password has not been set by the user during the sign up process, send them a link to set a new password 
    ?>
    <p><a href="<?php echo esc_attr($set_password_url); ?>"><?php printf(esc_html__('Click here to set your new password.', 'email')); ?></a></p>
<?php endif; ?>

<?php
/**
 * Show user-defined additional content - this is set in each email's settings.
 */
if ($additional_content) {
    echo wp_kses_post(wpautop(wptexturize($additional_content)));
}
?>

<p><?php printf(esc_html__('This is an automatically generated message. Please do not reply to this email.', 'email'));  ?></p>


<?php

do_action('woocommerce_email_footer', $email);
