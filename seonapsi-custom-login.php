<?php
/*
Plugin Name: Seonapsi Custom Login
Plugin URI: https://seonapsi.com
Description: Personalizza la pagina di login di WordPress con il tuo stile
Version: 1.0.0
Author: Seonapsi
Author URI: https://seonapsi.com
License: GPLv2 or later
*/

// Aggiungi l'opzione di personalizzazione del logo, dello sfondo e dei colori del form di login

wp_enqueue_style( 'wp-color-picker' );
wp_enqueue_script( 'wp-color-picker' );

///////////////////////////////////////////////
add_action('admin_menu', 'seonapsi_custom_login_menu');
function seonapsi_custom_login_menu()
{
    add_submenu_page(
		'themes.php',
        'Seonapsi Custom Login',
        '🎨 Seonapsi Custom Login',
        'manage_options',
        'seonapsi-custom-login',
        'seonapsi_custom_login_options_page'
    );
}

function seonapsi_custom_login_options_page()
{
    if (!current_user_can('manage_options')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }

    if (isset($_POST['seonapsi_custom_login_form_submitted'])) {
        $bg_color = sanitize_text_field($_POST['seonapsi_custom_login_bg_color']);
        update_option('seonapsi_custom_login_bg_color', $bg_color);

        $logo = sanitize_text_field($_POST['seonapsi_custom_login_logo']);
        update_option('seonapsi_custom_login_logo', $logo);

        $logo_width = sanitize_text_field($_POST['seonapsi_custom_login_logo_width']);
        update_option('seonapsi_custom_login_logo_width', $logo_width);

        $logo_height = sanitize_text_field($_POST['seonapsi_custom_login_logo_height']);
        update_option('seonapsi_custom_login_logo_height', $logo_height);

        $form_bg_color = sanitize_text_field($_POST['seonapsi_custom_login_form_bg_color']);
        update_option('seonapsi_custom_login_form_bg_color', $form_bg_color);
		
		$form_radius = sanitize_text_field($_POST['seonapsi_custom_login_form_radius']);
        update_option('seonapsi_custom_login_form_radius', $form_radius);

        $form_color = sanitize_text_field($_POST['seonapsi_custom_login_form_color']);
        update_option('seonapsi_custom_login_form_color', $form_color);

        $form_field_bg_color = sanitize_text_field($_POST['seonapsi_custom_login_form_field_bg_color']);
        update_option('seonapsi_custom_login_form_field_bg_color', $form_field_bg_color);

        $form_field_color = sanitize_text_field($_POST['seonapsi_custom_login_form_field_color']);
        update_option('seonapsi_custom_login_form_field_color', $form_field_color);

        $form_field_focus_color = sanitize_text_field($_POST['seonapsi_custom_login_form_field_focus_color']);
        update_option('seonapsi_custom_login_form_field_focus_color', $form_field_focus_color);
		
		$form_field_radius = sanitize_text_field($_POST['seonapsi_custom_login_form_field_radius']);
        update_option('seonapsi_custom_login_form_field_radius', $form_field_radius);

        $button_bg_color = sanitize_text_field($_POST['seonapsi_custom_login_button_bg_color']);
        update_option('seonapsi_custom_login_button_bg_color', $button_bg_color);

        $button_color = sanitize_text_field($_POST['seonapsi_custom_login_button_color']);
        update_option('seonapsi_custom_login_button_color', $button_color);

        $button_hover_bg_color = sanitize_text_field($_POST['seonapsi_custom_login_button_hover_bg_color']);
        update_option('seonapsi_custom_login_button_hover_bg_color', $button_hover_bg_color);

        $button_hover_color = sanitize_text_field($_POST['seonapsi_custom_login_button_hover_color']);
        update_option('seonapsi_custom_login_button_hover_color', $button_hover_color);
		
		$button_radius = sanitize_text_field($_POST['seonapsi_custom_login_button_radius']);
        update_option('seonapsi_custom_login_button_radius', $button_radius);

        $form_shadow = isset($_POST['seonapsi_custom_login_form_shadow']) ? 1 : 0;
        update_option('seonapsi_custom_login_form_shadow', $form_shadow);
		
		$form_border = isset($_POST['seonapsi_custom_login_form_border']) ? 1 : 0;
        update_option('seonapsi_custom_login_form_border', $form_border);

        echo '<div class="notice notice-success"><p>' . __('Settings saved.') . '</p></div>';
    }

    $bg_color = get_option('seonapsi_custom_login_bg_color', '#f1f1f1');
    $logo = get_option('seonapsi_custom_login_logo', '');
    $logo_width = get_option('seonapsi_custom_login_logo_width', '184px');
    $logo_height = get_option('seonapsi_custom_login_logo_height', 'auto');
    $form_bg_color = get_option('seonapsi_custom_login_form_bg_color', '#fff');
    $form_color = get_option('seonapsi_custom_login_form_color', '#333');
    $form_field_bg_color = get_option('seonapsi_custom_login_form_field_bg_color', '#f1f1f1');
    $form_field_radius = get_option('seonapsi_custom_login_form_field_radius', '0');
	$form_radius = get_option('seonapsi_custom_login_form_radius', '0');
	$form_field_color = get_option('seonapsi_custom_login_form_field_color', '#333');
    $form_field_focus_color = get_option('seonapsi_custom_login_form_field_focus_color', '#80bdff');
    $button_bg_color = get_option('seonapsi_custom_login_button_bg_color', '#0073aa');
    $button_color = get_option('seonapsi_custom_login_button_color', '#fff');
    $button_hover_bg_color = get_option('seonapsi_custom_login_button_hover_bg_color', '#006799');
    $button_hover_color = get_option('seonapsi_custom_login_button_hover_color', '#fff');
	$button_radius = get_option('seonapsi_custom_login_button_radius', '0');
    $form_shadow = get_option('seonapsi_custom_login_form_shadow', 0);
	$form_border = get_option('seonapsi_custom_login_form_border', 0);
    ?>

    <div class="wrap">
	
<script type="text/javascript">
   jQuery(document).ready(function() {
      jQuery('.colorPicker').wpColorPicker();
   });
</script>


        <h1 style="padding:10px 20px 10px 20px;background-color:white; border-radius:10px;box-shadow: 0 10px 33px 13px rgba(0,0,0,.12)!important;margin-top:10px;margin-bottom:10px;margin-bottom:20px;"><?php _e('Seonapsi Custom Login', 'seonapsi-custom-login'); ?> 🎨</h1>
<form method="post" action="">
<table class="form-table"style="width:1200px;">
<tr valign="top">
<th scope="row"style="width:200px;"><?php _e('Colore Sfondo Pagina', 'seonapsi-custom-login'); ?></th>
<td style="width:200px;">
<input type="text" name="seonapsi_custom_login_bg_color" class="colorPicker" value="<?php echo esc_attr($bg_color); ?>" />
<p>Cambia il colore della pagina</p>
</td>
<td rowspan="16" valign="top"  style="width:300px!important;vertical-align: top!important;">
	<h2>Come funziona?</h2>
	<p>Questo plugin modifica la schermata di login di Wordpress senza appesantire il tuo sito⚡️. 
		<br>
	<b>STEP 1:</b>Utilizza le impostazioni a sinistra per modificare la schermata di login.<br>
	<b>STEP 2:</b>Salva per vedere le modifiche nel box👇🏼.</p>
	<br>	
<div id="donate-button-container">
<div id="donate-button"></div>
<script src="https://www.paypalobjects.com/donate/sdk/donate-sdk.js" charset="UTF-8"></script>
<script>
PayPal.Donation.Button({
env:'production',
hosted_button_id:'29WDZRRQ2P8Y6',
image: {
src:'https://pics.paypal.com/00/s/YTkyYjE5NzEtOTExZC00MDJiLThlZGEtYWRjYjViNGEyYmI4/file.PNG',
alt:'Fai una donazione con il pulsante PayPal',
title:'PayPal - The safer, easier way to pay online!',
}
}).render('#donate-button');
	</script><p style="color:#b5b6b6;">Donami un ☕️ o una 🍕 virtuale e dammi la carica per sviluppare nuove funzionalità!♥️</p>
</div>

	<h2>Anteprima</h2>
	<p style="color:red;">Salva le modifiche per visualizzare l'anteprima. </p><br>
	<iframe credentialless id="frame" height="600px" width="100%"scrolling="no" src="/wp-admin" style="margin-bottom:-90px"></iframe>
</td>
</tr>
<tr valign="top">
<th scope="row"><?php _e('Logo: URL', 'seonapsi-custom-login'); ?></th>
<td>
<input type="text" id="seonapsi_media_mngr" name="seonapsi_custom_login_logo" placeholder="Clicca qui" value="<?php echo esc_attr($logo); ?>" />
<p>Clicca per selezionare o caricare l'immagine</p>
	</td>
</tr>
<tr valign="top">
<th scope="row"><?php _e('Logo: larghezza', 'seonapsi-custom-login'); ?></th>
<td>
<input type="text" name="seonapsi_custom_login_logo_width" placeholder="es. 100px" value="<?php echo esc_attr($logo_width); ?>" />
<p>Regola la larghezza dell'immagine</p>
	</td>
</tr>
<tr valign="top">
<th scope="row"><?php _e('Logo: altezza', 'seonapsi-custom-login'); ?></th>
<td>
<input type="text" name="seonapsi_custom_login_logo_height" placeholder="es. 100px" value="<?php echo esc_attr($logo_height); ?>" />
<p>Regola l'altezza dell'immagine</p>
	</td>
</tr>
<tr valign="top">
<th scope="row"><?php _e('Form: colore sfondo', 'seonapsi-custom-login'); ?></th>
<td>
<input type="text" name="seonapsi_custom_login_form_bg_color" class="colorPicker" value="<?php echo esc_attr($form_bg_color); ?>" />
</td>
</tr>
<tr valign="top">
<th scope="row"><?php _e('Form: colore testo', 'seonapsi-custom-login'); ?></th>
<td>
<input type="text" name="seonapsi_custom_login_form_color" class="colorPicker" value="<?php echo esc_attr($form_color); ?>" />
</td>
</tr>
<tr valign="top">
<th scope="row"><?php _e('Form: angoli bordi', 'seonapsi-custom-login'); ?></th>
<td>
<input type="number" name="seonapsi_custom_login_form_radius" value="<?php echo esc_attr($form_radius); ?>" />
</td>
</tr>
<tr valign="top">
<th scope="row"><?php _e('Togli il bordo al form', 'seonapsi-custom-login'); ?></th>
<td>
<input type="checkbox" name="seonapsi_custom_login_form_border" <?php checked($form_border, 1); ?> />
	<p>flagga</p>
	</td>
</tr>
<tr valign="top">
<th scope="row"><?php _e('Campi: colore sfondo', 'seonapsi-custom-login'); ?></th>
<td>
<input type="text" name="seonapsi_custom_login_form_field_bg_color" class="colorPicker" value="<?php echo esc_attr($form_field_bg_color); ?>" />
</td>
</tr>
<tr valign="top">
<th scope="row"><?php _e('Campi: colore testo', 'seonapsi-custom-login'); ?></th>
<td>
<input type="text" name="seonapsi_custom_login_form_field_color" class="colorPicker" value="<?php echo esc_attr($form_field_color); ?>" />
</td>
</tr>
<tr valign="top">
<th scope="row"><?php _e('Campi: colore focus', 'seonapsi-custom-login'); ?></th>
<td>
<input type="text" name="seonapsi_custom_login_form_field_focus_color" class="colorPicker" value="<?php echo esc_attr($form_field_focus_color); ?>" />
</td>
</tr>
<tr valign="top">
<th scope="row"><?php _e('Campi: Angolo bordi', 'seonapsi-custom-login'); ?></th>
<td>
<input type="number" name="seonapsi_custom_login_form_field_radius" value="<?php echo esc_attr($form_field_radius); ?>" />
</td>
</tr>
<tr valign="top">
<th scope="row"><?php _e('Pulsante: colore sfondo', 'seonapsi-custom-login'); ?></th>
<td>
<input type="text" name="seonapsi_custom_login_button_bg_color" class="colorPicker" value="<?php echo esc_attr($button_bg_color); ?>" />
</td>
</tr>
<tr valign="top">
<th scope="row"><?php _e('Pulsante: colore sfondo hover', 'seonapsi-custom-login'); ?></th>
<td>
<input type="text" name="seonapsi_custom_login_button_hover_bg_color" class="colorPicker" value="<?php echo esc_attr($button_hover_bg_color); ?>" />
</td>
</tr>
<tr valign="top">
<th scope="row"><?php _e('Pulsante: colore testo', 'seonapsi-custom-login'); ?></th>
<td>
<input type="text" name="seonapsi_custom_login_button_color" class="colorPicker" value="<?php echo esc_attr($button_color); ?>" />
</td>
</tr>	
<tr valign="top">
<th scope="row"><?php _e('Pulsante: colore testo hover', 'seonapsi-custom-login'); ?></th>
<td>
<input type="text" name="seonapsi_custom_login_button_hover_color" class="colorPicker" value="<?php echo esc_attr($button_hover_color); ?>" />
</td>
</tr>
<tr>
  <th scope="row"><?php _e('Pulsante: angolo dei bordi', 'seonapsi-custom-login'); ?></th>
  <td><input type="number" name="seonapsi_custom_login_button_radius" value="<?php echo esc_attr($button_radius); ?>">
  <p class="description">inserisci solo un numero da 0 a 100</p>
  </td>
</tr>
<tr valign="top">
<th scope="row"><?php _e('Abilita ombra del form', 'seonapsi-custom-login'); ?></th>
<td>
<input type="checkbox" name="seonapsi_custom_login_form_shadow" <?php checked($form_shadow, 1); ?> />
	<p>di sicuro effetto!</p>
	</td>
</tr>
</table>
<input type="hidden" name="seonapsi_custom_login_form_submitted" value="true" />
<?php submit_button(); ?>
</form>
</div>
<?php
}

/* 
* 
* Media
* 
*/
include_once('prd-media.php');

// Personalizza la pagina di login con i CSS inline
add_action('login_enqueue_scripts', 'seonapsi_custom_login_css');
function seonapsi_custom_login_css()
{
wp_enqueue_style('login');
	$custom_css = '
    body.login {
        background-color: ' . get_option('seonapsi_custom_login_bg_color') . '!important;
    }
    body.login #login h1 a {
        background-image: url(' . get_option('seonapsi_custom_login_logo') . ')!important;
        background-size: ' . get_option('seonapsi_custom_login_logo_width') . ' ' . get_option('seonapsi_custom_login_logo_height') . '!important;
        width: ' . get_option('seonapsi_custom_login_logo_width') . '!important;
        height: ' . get_option('seonapsi_custom_login_logo_height') . '!important;
    }
    body.login #login form {
        background-color: ' . get_option('seonapsi_custom_login_form_bg_color') . '!important;
        color: ' . get_option('seonapsi_custom_login_form_color') . '!important;
		border-radius: ' . get_option('seonapsi_custom_login_form_radius') . 'px!important;
    }
    body.login #login form label {
        color: ' . get_option('seonapsi_custom_login_form_color') . '!important;
		border-radius: ' . get_option('seonapsi_custom_login_form_field_radius') . '!important;
    }
    body.login #login form input[type="text"],
    body.login #login form input[type="password"] {
        background-color: ' . get_option('seonapsi_custom_login_form_field_bg_color') . '!important;
        color: ' . get_option('seonapsi_custom_login_form_field_color') . '!important;
		border-radius: ' . get_option('seonapsi_custom_login_form_field_radius') . 'px!important;
    }
    body.login #login form input[type="text"]:focus,
    body.login #login form input[type="password"]:focus {
        border-color: ' . get_option('seonapsi_custom_login_form_field_focus_color') . '!important;
        box-shadow: 0 0 0 1px ' . get_option('seonapsi_custom_login_form_field_focus_color') . '!important;
    }
    body.login #login form input[type="submit"] {
        background-color: ' . get_option('seonapsi_custom_login_button_bg_color') . '!important;
        color: ' . get_option('seonapsi_custom_login_button_color') . '!important;
		border-radius:' . get_option('seonapsi_custom_login_button_radius') . 'px!important;
        text-shadow: none;
        box-shadow: none;
        border: none;
    }
    body.login #login form input[type="submit"]:hover {
        background-color: ' . get_option('seonapsi_custom_login_button_hover_bg_color') . '!important;
        color: ' . get_option('seonapsi_custom_login_button_hover_color') . '!important;
    }
';

if (get_option('seonapsi_custom_login_form_shadow')) {
    $custom_css .= '#loginform { box-shadow: 0 10px 33px 13px rgba(0,0,0,.12)!important; }';
}else {
    $custom_css .= '#loginform { box-shadow: none!important; }';
}
	

if (get_option('seonapsi_custom_login_form_border')) {
    $custom_css .= '#loginform { border: none!important; }';
}

wp_add_inline_style('login', $custom_css);
}
