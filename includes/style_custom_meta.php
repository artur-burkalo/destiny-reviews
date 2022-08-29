<?php
if (!defined('WPINC'))
{
    die; // Abort if accessed directly
    
}

function destiny_reviews_style_render_page()
{
    // check user capabilities
    if (!current_user_can('manage_options'))
    {
        return;
    }

    if (isset($_GET['settings-updated']))
    {
        add_settings_error('dr_messages', 'dr_message', __('Style Saved', 'dr') , 'updated');
    }

    // show error/update messages
    settings_errors('dr_messages');
?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <form action="options.php" method="post">
            <?php
    settings_fields('dr_style_options');
    do_settings_sections('dr_style_options');
    $border_radius_type = esc_attr(get_option('dr_border_radius_type'));
    $dr_theme = esc_attr(get_option('dr_theme'));

?>
            <table class="form-table">
            <tr valign="top">
            <th scope="row">Style of the Theme</th>
            <td>
            <select name="dr_theme" id="dr-theme" class="dr-theme" class="postform">
            <option value="1" <?php selected(esc_html($dr_theme) , '1'); ?>>Dark</option>
            <option value="2" <?php selected(esc_html($dr_theme) , '2'); ?>>Light</option>
            <option value="3" <?php selected(esc_html($dr_theme) , '3'); ?>>Custom</option>
            </select>
           </td>
            </tr><table class="form-table">
            <?php
    if ($dr_theme == "3")
    {
?>
            <tr class="dr-theme-custom">
            <th scope="row">Custom Background Colour</th>
            <td>
            <input type="color" name="dr_custom_bg" id="drColorpickerBg" class="small-text" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="<?php echo sanitize_hex_color(get_option('dr_custom_bg')); ?>"> 
            <input type="text" name="dr_custom_bg" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="<?php echo sanitize_hex_color(get_option('dr_custom_bg')); ?>" id="drHexcolorBg"></input>
            </td>
            </tr>
            <tr class="dr-theme-custom">
             <th scope="row">Text Colour</th>
            <td>
            <input type="color" name="dr_custom_txt_clr" id="drColorpickerText" class="small-text" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="<?php echo sanitize_hex_color(get_option('dr_custom_txt_clr')); ?>"> 
            <input type="text" name="dr_custom_txt_clr" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="<?php echo sanitize_hex_color(get_option('dr_custom_txt_clr')); ?>" id="drHexcolorText"></input>
            </td>
            </tr>
            <tr class="dr-theme-custom">
             <th scope="row">Button Colour</th>
            <td>
            <input type="color" name="dr_button_colour" id="drColorpickerButton" class="small-text" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="<?php echo sanitize_hex_color(get_option('dr_button_colour')); ?>"> 
            <input type="text" name="dr_button_colour" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="<?php echo sanitize_hex_color(get_option('dr_button_colour')); ?>" id="drHexcolorButton"></input>
            </td>
            </tr>
               <?php
    }

    else
    {
?>
                <tr class="dr-theme-custom" style="display:none;">
                <th scope="row">Custom Background Colour</th>
                <td>
                <input type="color" name="dr_custom_bg" id="drColorpickerBg" class="small-text" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="<?php echo sanitize_hex_color(get_option('dr_custom_bg')); ?>"> 
                <input type="text" name="dr_custom_bg" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="<?php echo sanitize_hex_color(get_option('dr_custom_bg')); ?>" id="drHexcolorBg"></input>
                </td>
                </tr>
                <tr class="dr-theme-custom" style="display:none;">
                <th scope="row">Text Colour</th>
                <td>
                <input type="color" name="dr_custom_txt_clr" id="drColorpickerText" class="small-text" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="<?php echo sanitize_hex_color(get_option('dr_custom_txt_clr')); ?>"> 
                <input type="text" name="dr_custom_txt_clr" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="<?php echo sanitize_hex_color(get_option('dr_custom_txt_clr')); ?>" id="drHexcolorText"></input>
                </td>
                </tr>
                <tr class="dr-theme-custom" style="display:none;">
             <th scope="row">Button Colour</th>
            <td>
            <input type="color" name="dr_button_colour" id="drColorpickerText" class="small-text" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="<?php echo sanitize_hex_color(get_option('dr_button_colour')); ?>"> 
            <input type="text" name="dr_button_colour" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="<?php echo sanitize_hex_color(get_option('dr_button_colour')); ?>" id="drHexcolorText"></input>
            </td>
            </tr>
                   <?php
    }
?>
            <tr valign="top">
            <th scope="row">Border Radius</th>
            <td>
            <input type="number" name="dr_border_radius" min="0" max="100" value="<?php echo esc_attr(get_option('dr_border_radius')); ?>" class="small-text" />
            <select name="dr_border_radius_type" id="dr-border-radius-type" class="postform">
            <option value="1" <?php selected(esc_html($border_radius_type) , '1'); ?>>px</option>
            <option value="2" <?php selected(esc_html($border_radius_type) , '2'); ?>>%</option>
                </select></td>
            </tr>
            </table>
            <?php submit_button('Save Style'); ?>
        </form>
    </div>
    <?php
}