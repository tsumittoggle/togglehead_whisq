// Make notices dismissible
jQuery(document).ready( function() {
	jQuery( '.notice.is-dismissible' ).each( function() {
		var $this = jQuery( this ),
			$button = jQuery( '<button type="button" class="notice-dismiss"><span class="screen-reader-text"></span></button>' ),
			btnText = commonL10n.dismiss || '';

		// Ensure plain text
		$button.find( '.screen-reader-text' ).text( btnText );

		$this.append( $button );

		$button.on( 'click.notice-dismiss', function( event ) {
			event.preventDefault();
			$this.fadeTo( 100 , 0, function() {
				//alert();
				jQuery(this).slideUp( 100, function() {
					jQuery(this).remove();
					var data = {
						action: "admin_notices"
					};
					var admin_url= jQuery("#admin_url").val();
					jQuery.post( admin_url + "/admin-ajax.php", data, function( response ) {
					});
				});
			});
		});
	});
});