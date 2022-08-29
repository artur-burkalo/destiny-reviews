<?php
if (!defined('WPINC'))
{
    die;
}

function user_submit_destiny_review()
{
    $custom_style = esc_attr(get_option('dr_use_dr_styles'));
    $admin_email = esc_attr(get_option('dr_admin_email'));
    $custom_styles = esc_attr(get_option('dr_use_dr_styles'));
    $name_label = esc_attr(get_option('dr_custom_name_label'));
    $name_placeholder = esc_attr(get_option('dr_custom_name_placeholder'));
    $test_label = esc_attr(get_option('dr_custom_testimonial_label'));
    $test_placeholder = esc_attr(get_option('dr_custom_testimonial_placeholder'));
    $custom_button_clr = esc_attr(get_option('dr_button_colour'));

    if ($custom_style == 'Yes')
    {
        wp_enqueue_style('destiny_review_styles', plugins_url('../css/public/form.css', __FILE__));
        //wp_enqueue_script( 'dr-form-script-handle', plugins_url( '../js/public/dr-form-script.js', __FILE__ ));
        
    }
    if ($custom_style == 'No')
    {
        //do nothing
        
    }

    else
    {
        wp_enqueue_style('destiny_review_styles', plugins_url('../css/public/form.css', __FILE__));
        //wp_enqueue_script( 'dr-form-script-handle', plugins_url( '../js/public/dr-form-script.js', __FILE__ ));
        
    }

    if (isset($_POST['submit_dr_review']))
    {
        // Create post object
        $dr_post = array(
            'post_type' => 'destiny_reviews',
            'post_title' => 'Customer Review',
            'post_status' => 'pending',
            'post_author' => 1
        );

        // Insert the post into the database
        wp_insert_post($dr_post);
    }
    $custom_thank_you = esc_url_raw(get_option('dr_custom_thank_you_page'));
    $name_label = esc_attr(get_option('dr_custom_name_label'));
    $name_placeholder = esc_attr(get_option('dr_custom_name_placeholder'));
    $test_label = esc_attr(get_option('dr_custom_testimonial_label'));
    $test_placeholder = esc_attr(get_option('dr_custom_testimonial_placeholder'));
    $border_radius_type = esc_attr(get_option('dr_border_radius_type'));
    $border_radius = esc_attr(get_option('dr_border_radius'));
    $dr_theme = esc_attr(get_option('dr_theme'));
    //custom URL
    if (empty($custom_thank_you))
    {
        $custom_thank_you_action = "?dr-success";
    }
    else
    {
        $custom_thank_you_action = $custom_thank_you;
    }
    //custom name label
    if (empty($name_label))
    {
        $custom_name_label = "Name";
    }
    else
    {
        $custom_name_label = $name_label;
    }
    //custom name placeholder
    if (empty($name_placeholde))
    {
        $custom_name_ph = "Your Name";
    }
    else
    {
        $custom_name_ph = $name_placeholde;
    }
    //custom testominial label
    if (empty($test_label))
    {
        $custom_test_label = "Testimonial";
    }
    else
    {
        $custom_test_label = $test_label;
    }
    //custom testimonial placeholder
    if (empty($test_placeholder))
    {
        $custom_test_ph = "Tell us about your experience";
    }
    else
    {
        $custom_test_ph = $test_placeholder;
    }

?>

<form class="dr-form" id="dr-form" name="dr-rating-form" method="post" action="<?php echo $custom_thank_you_action ?>"> 
    <?php
    if (isset($_GET['dr-success']))
    {
        echo "<p>We really appreciate you taking the time out to share your experience with us.</p>";
    }
    else
    {
?>
    <div class="dr-form-content">
    <label for="destiny_reviews_client_name" class="dr-label"><?php echo $custom_name_label ?></label>
    <input type="text" class="dr-text" id="destiny_reviews_client_name" name="destiny_reviews_client_name" placeholder="<?php echo $custom_name_ph ?>" size="45" id="input-title" required/>
    <div class="dr-rate">
    <input type="radio" class="dr-stars-val" id="star5" name="destiny_reviews_rating" value="5" required/>
    <label for="star5"  title="text">★</label>
    <input type="radio" class="dr-stars-val" id="star4" name="destiny_reviews_rating" value="4" required/>
    <label for="star4" title="text">★</label>
    <input type="radio" class="dr-stars-val" id="star3" name="destiny_reviews_rating" value="3" required/>
    <label for="star3" title="text">★</label>
    <input type="radio"  class="dr-stars-val" id="star2" name="destiny_reviews_rating" value="2" required/>
    <label for="star2" title="text">★</label>
    <input type="radio" class="dr-stars-val" id="star1" name="destiny_reviews_rating" value="1" required/>
    <label for="star1" title="text">★</label>
    </div>
    <label class="dr-label"><?php echo $custom_test_label ?></label>
    <textarea rows="5" class="dr-placeholder" placeholder="<?php echo $custom_test_ph ?>" name="destiny_reviews_comment" cols="66" id="text-desc"></textarea> 
    <input type="hidden" name="new_post" value="1"/> 
    <input class="button dr-button dr-submit-button" type="submit" name="submit_dr_review" value="Submit Review"/>
</div>
<?php
    } ?>
</form>
<?php
    if ($custom_style != 'No')
    {
        if ($border_radius_type == "1")
        {
            $border_type = "px";
        }
        if ($border_radius_type == "2")
        {
            $border_type = "%";
        }
        else
        {
            $border_type = "px";
        }

        if ($dr_theme == "1" || (!($dr_theme)))
        {
            $theme_style_bg = "#000";
            $theme_style_clr = "#fff";
            $button_clr = "#fff";
            $button_text_clr = "#000";
        }
        if ($dr_theme == "2")
        {
            $theme_style_bg = "#fff";
            $theme_style_clr = "#000";
            $button_clr = "#000";
            $button_text_clr = "#fff";
        }
        if ($dr_theme == "3")
        {
            $theme_style_bg = sanitize_hex_color(get_option('dr_custom_bg'));;
            $theme_style_clr = sanitize_hex_color(get_option('dr_custom_txt_clr'));;
            $button_clr = sanitize_hex_color(get_option('dr_button_colour'));;
        }

        if (!($border_radius == null || $border_radius == ''))
        { ?>
 <style>
    .dr-form {
        border-radius: <?php echo esc_attr(get_option('dr_border_radius'));
            echo esc_attr($border_type); ?>; 
        background-color:<?php echo $theme_style_bg; ?>;
        color:<?php echo $theme_style_clr; ?>}
    .dr-form .dr-button {
        background-color:<?php echo $button_clr; ?> !important;
        color: <?php echo $button_text_clr; ?> !important}
    }
    </style>
<?php
        }
        else
        {
?>
            <style>
           .dr-form {
        background-color:<?php echo $theme_style_bg; ?>;
        color:<?php echo $theme_style_clr; ?>}
        .dr-form .dr-button {
        background-color:<?php echo $button_clr; ?> !important;
        color: <?php echo $button_text_clr; ?> !important}
    }
            </style>
      

    <?php
        }
    }

    else
    {
        //do noithing
        
    }

}

add_shortcode('destiny_reviews_user_form', 'user_submit_destiny_review');

// email notification
$admin_email = esc_attr(get_option('dr_admin_email'));

if (empty($admin_email))
{

    function destiny_reviews_send_email($post_id, $post, $update)
    {
        $admin_email = esc_attr(get_option('dr_admin_email'));
        // If this is a revision, don't send the email.
        if (wp_is_post_revision($post_id)) return;

        $web_url = get_site_url();
        $name = esc_attr(get_option('destiny_reviews_client_name'));
        $subject = 'A new review waiting to be verified';

        $message = "A new review has been posted on your website:";
        $message .= $web_url;

        // Send email to admin.
        wp_mail($admin_email, $subject, $message);
    }
    add_action('wp_insert_post', 'destiny_reviews_send_email', 10, 3);

}