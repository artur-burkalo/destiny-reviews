<?php
if (!defined('WPINC'))
{
    die; // Abort if accessed directly
    
}
//register options to database
function register_dr_settings()
{
    //stle options
    register_setting('dr_style_options', 'dr_theme');
    register_setting('dr_style_options', 'dr_custom_bg');
    register_setting('dr_style_options', 'dr_custom_txt_clr');
    register_setting('dr_style_options', 'dr_border_radius');
    register_setting('dr_style_options', 'dr_border_radius_type');
    register_setting('dr_style_options', 'dr_border_radius_type');
    register_setting('dr_style_options', 'dr_button_colour');
    //register_setting( 'dr_style_options', 'option_etc' );
    //form options
    register_setting('dr_form_options', 'dr_admin_email');
    register_setting('dr_form_options', 'dr_use_dr_styles');
    register_setting('dr_form_options', 'dr_custom_thank_you_page');
    register_setting('dr_form_options', 'dr_custom_name_label');
    register_setting('dr_form_options', 'dr_custom_name_placeholder');
    register_setting('dr_form_options', 'dr_custom_testimonial_label');
    register_setting('dr_form_options', 'dr_custom_testimonial_placeholder');
}

add_action('admin_init', 'register_dr_settings');