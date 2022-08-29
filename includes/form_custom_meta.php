<?php
if (!defined('WPINC'))
{
    die; // Abort if accessed directly
    
}

function destiny_reviews_form_render_page()
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
    settings_fields('dr_form_options');
    do_settings_sections('dr_form_options');
    $admin_email = esc_attr(get_option('dr_admin_email'));
    $custom_styles = esc_attr(get_option('dr_use_dr_styles'));
    $custom_thank_you = esc_url_raw(get_option('dr_custom_thank_you_page'));
    $name_label = esc_attr(get_option('dr_custom_name_label'));
    $name_placeholder = esc_attr(get_option('dr_custom_name_placeholder'));
    $test_label = esc_attr(get_option('dr_custom_testimonial_label'));
    $test_placeholder = esc_attr(get_option('dr_custom_testimonial_placeholder'));

?>
              <table class="form-table">
              <tr valign="top">
              <th scope="row">Admin Email</th>
              <td>
              <input type="email" name="dr_admin_email" value="<?php echo $admin_email; ?>" class="regular-text ltr" />
              <p>Enter email you would like notification to be sent when a new reviews is submited for approval.</p>
              </td>
              </tr>
              <tr valign="top">
              <th scope="row">Enable Styles</th>
              <td>
                <input type="radio" id="dr-form-styles" name="dr_use_dr_styles" value="Yes" <?php if ($custom_styles == 'Yes' || $custom_styles == '')
    {
        echo 'checked';
    } ?>>
                <label for="yes-styles">Yes</label><br>
                <input type="radio" id="dr-form-styles" name="dr_use_dr_styles" value="No" <?php if ($custom_styles == 'No')
    {
        echo 'checked';
    } ?>>
                <label for="no-styles">No</label><br>
                <p>Select no if you would like to create your custom styles for the form, all style form settings will be lost.</p>
              </td>
              </tr>
              <tr>
              <th scope="row">Custom Thank You Page URL</th>
              <td>
              <input type="url" name="dr_custom_thank_you_page" placeholder="<?php echo home_url();?>/your-link" value="<?php echo  $custom_thank_you; ?>" class="regular-text ltr" />
            </td></tr><table>
            <table class="form-table">
            <h3>Custom Labels and Placeholders</h3>
            <p>Leave blank for default<p>
            <tr>
              <th scope="row">Name Label</th>
              <td>
              <input type="text" name="dr_custom_name_label" placeholder="e.g. &quot;Name&quot;" value="<?php echo $name_label; ?>" class="regular-text ltr" />
              <p>Use this with cautin as it may affect accessbility</p>
              </td>
              </tr>
              <tr>
              <th scope="row">Name Placeholder</th>
              <td>
              <input type="text" name="dr_custom_name_placeholder" placeholder="e.g. &quot;Your Name&quot;" value="<?php echo $name_placeholder; ?>" class="regular-text ltr" />
              </td>
              </tr>
              <tr>
              <th scope="row">Testimonial Label</th>
              <td>
              <input type="text" name="dr_custom_testimonial_label" placeholder="e.g. &quot;Testimonial&quot;" value="<?php echo $test_label; ?>" class="regular-text ltr" />
              </td>
              </tr>
              <tr>
              <th scope="row">Testimonial Placeholder</th>
              <td>
              <input type="text" name="dr_custom_testimonial_placeholder" placeholder="e.g. &quot;Tell us about your experience&quot;" value="<?php echo $test_placeholder; ?>" class="regular-text ltr" />
              </td>
              </tr>
              </table>
              <?php submit_button('Update Form Settings'); ?>
          </form>
      </div>
      <?php
}