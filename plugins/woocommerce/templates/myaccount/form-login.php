<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php wc_print_notices(); ?>

<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

<div class="u-columns col2-set" id="customer_login">

	<div class="u-column1 col-1 <?php if(is_page('login')){ echo "account-login"; }?>">

<?php endif; ?>

		<h2><?php _e( 'Welcome', 'woocommerce' ); ?></h2>
		<p class="part-text">EASILY USING</p>

		<form class="woocomerce-form woocommerce-form-login login" method="post">

			<?php do_action( 'woocommerce_login_form' ); ?>

			<p class="using-mail">
				<span class="left-line"></span>
				<span class="part-text">OR USING EMAIL</span>
				<span class="right-line"></span>
			</p>

			<?php do_action( 'woocommerce_login_form_start' ); ?>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<!-- <label for="username"><?php //_e( 'Username or email address', 'woocommerce' ); ?> <span class="required">*</span></label> -->
				<input type="text" placeholder="<?php _e( 'Username or email address', 'woocommerce' ); ?>" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( $_POST['username'] ) : ''; ?>" />
			</p>
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<!-- <label for="password"><?php //_e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label> -->
				<input placeholder="<?php _e( 'Password', 'woocommerce' ); ?>" class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" />
			</p>

            <div class="form-row">
			<label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
					<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever"  checked/> <span><?php _e( 'Remember me', 'woocommerce' ); ?></span>
			</label>
			<p class="woocommerce-LostPassword lost_password">
				<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php _e( 'Forget password?', 'woocommerce' ); ?></a>
			</p>
			</div>
<!--  <div class="captcha-block">
      <div class="g-recaptcha" data-sitekey="6LfQaCwUAAAAAIAyB_TWN9OVIgjEfyMrY4PQWesj"></div>
      <input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">
  </div> -->
			<p class="form-row text-center">
				<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
				<input type="submit" class="woocommerce-Button button feature-btn" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>" />
			</p>

			<p class="re-log">New to wishq? <span><a href="<?php echo esc_url( home_url( '/sign-up/' ) ); ?>">Create Account</a></span></p>

			<?php do_action( 'woocommerce_login_form_end' ); ?>

		</form>

<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

	</div>

	<div class="u-column2 col-2 <?php if(is_page('sign up')){ echo "account-registration"; } ?>" >

		<h2><?php _e( 'YOU ARE NOT A MEMEBER YET', 'woocommerce' ); ?></h2>
		<p class="part-text">EASILY USING</p>

		<form method="post" class="register" id="reg">
            <?php do_action( 'woocommerce_login_form' ); ?>
			<?php do_action( 'woocommerce_register_form' ); ?>
			<p class="using-mail">
				<span class="left-line"></span>
				<span class="part-text">OR USING EMAIL</span>
				<span class="right-line"></span>
			</p>
			<?php do_action( 'woocommerce_register_form_start' ); ?>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="reg_username"><?php _e( 'Username', 'woocommerce' ); ?> <span class="required">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( $_POST['username'] ) : ''; ?>" />
				</p>

			<?php endif; ?>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="reg_email"><?php _e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
				<input type="email" placeholder="Your Email Address" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( $_POST['email'] ) : ''; ?>" />
			</p>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="reg_password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
					<input type="password" placeholder="Choose Password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" />
				</p>

			<?php endif; ?>
			<?php do_action( 'woocommerce_register_form_end' ); ?>
			 <p class="woocommerce-form-row contact-field woocommerce-form-row--wide form-row form-row-wide">
       <input type="tel" style="display: none;" class="input-text" placeholder="Mobile Number" maxlength="14" name="billing_phone" id="reg_billings_phone" value="<?php esc_attr_e( $_POST['billing_phone'] ); ?>" />
       </p>

<!--  <div class="captcha-block">
      <div class="g-recaptcha" data-sitekey="6LfQaCwUAAAAAIAyB_TWN9OVIgjEfyMrY4PQWesj"></div>
      <input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">
  </div> -->

			<!-- Spam Trap -->
			<div style="<?php echo ( ( is_rtl() ) ? 'right' : 'left' ); ?>: -999em; position: absolute;"><label for="trap"><?php _e( 'Anti-spam', 'woocommerce' ); ?></label><input type="text" name="email_2" id="trap" tabindex="-1" autocomplete="off" /></div>

			<p class="woocomerce-FormRow form-row">
				<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
				<input type="submit" class="woocommerce-Button button" name="register" value="<?php esc_attr_e( 'SIGN UP', 'woocommerce' ); ?>" />
			</p>


		</form>
		<p class="re-log">Already have an account? <span><a href="<?php echo esc_url( home_url( '/login/' ) ); ?>">Login!</a></span></p>

	</div>

</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
