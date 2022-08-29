<?php
if (!defined('WPINC'))
{
    die;
}

class destiny_review_template
{

    function destiny_reviews_template()
    {
        wp_enqueue_style('destiny-review-styles', plugins_url('../css/public/style.css', __FILE__));
        $args = array(
            'post_type' => array(
                'destiny_reviews'
            ) ,
            'orderby' => 'date',
            'order' => 'ASC'
        );

        $dr_query = new WP_Query($args);
?> <div class="dr-block"> <?php
        if ($dr_query->have_posts()):
            while ($dr_query->have_posts()):
                $dr_query->the_post(); ?>
            <div class="dr-box">
                <div class="dr-testimonial">
                    <p>"<?php echo get_post_meta(get_the_ID() , '_destiny_reviews_comment', true); ?>"</p>
                </div>

                <div class="dr-clinet">
                <?php
                if (has_post_thumbnail())
                {
                    $alt = get_post_meta(get_post_thumbnail_id() , '_wp_attachment_image_alt', true);
?>
                     <img alt="<?php echo $alt; ?>" src="<?php echo esc_html(the_post_thumbnail_url('thumbnail')) ?>" class="dr-image" id="dr-image">
                    <?php
                }
                else
                {
                    //do nothing
                    
                }
?>
                    <div class= "dr-client-div">
                        <strong> <?php echo get_post_meta(get_the_ID() , 'destiny_reviews_client_name', true); ?></strong>
                        <br><div class="dr-client-position">
                        <?php echo get_post_meta(get_the_ID() , '_destiny_reviews_position', true); ?>
                         </div>

                        <div class="dr-stars">
                        <?php $dr_client_rating = get_post_meta(get_the_ID() , '_destiny_reviews_rating', true); ?>

                        <?php
                if ($dr_client_rating == "1")
                {
?>
                            <img class="dr-star-ratings" src="<?php echo plugins_url('../images/star.png', __FILE__); ?>">
                            <img class="dr-star-ratings" src="<?php echo plugins_url('../images/empty-star.png', __FILE__); ?>">
                            <img class="dr-star-ratings" src="<?php echo plugins_url('../images/empty-star.png', __FILE__); ?>">
                            <img class="dr-star-ratings" src="<?php echo plugins_url('../images/empty-star.png', __FILE__); ?>">
                            <img class="dr-star-ratings" src="<?php echo plugins_url('../images/empty-star.png', __FILE__); ?>">
                            <?php
                }

                if ($dr_client_rating == "2")
                {
?>
                            <img class="dr-star-ratings" src="<?php echo plugins_url('../images/star.png', __FILE__); ?>">
                            <img class="dr-star-ratings" src="<?php echo plugins_url('../images/star.png', __FILE__); ?>">
                            <img class="dr-star-ratings" src="<?php echo plugins_url('../images/empty-star.png', __FILE__); ?>">
                            <img class="dr-star-ratings" src="<?php echo plugins_url('../images/empty-star.png', __FILE__); ?>">
                            <img class="dr-star-ratings" src="<?php echo plugins_url('../images/empty-star.png', __FILE__); ?>">
                            <?php
                }

                if ($dr_client_rating == "3")
                {
?>
                            <img class="dr-star-ratings" src="<?php echo plugins_url('../images/star.png', __FILE__); ?>">
                            <img class="dr-star-ratings" src="<?php echo plugins_url('../images/star.png', __FILE__); ?>">
                            <img class="dr-star-ratings" src="<?php echo plugins_url('../images/star.png', __FILE__); ?>">
                            <img class="dr-star-ratings" src="<?php echo plugins_url('../images/empty-star.png', __FILE__); ?>">
                            <img class="dr-star-ratings" src="<?php echo plugins_url('../images/empty-star.png', __FILE__); ?>">
                            <?php
                }

                if ($dr_client_rating == "4")
                {
?>
                            <img class="dr-star-ratings" src="<?php echo plugins_url('../images/star.png', __FILE__); ?>">
                            <img class="dr-star-ratings" src="<?php echo plugins_url('../images/star.png', __FILE__); ?>">
                            <img class="dr-star-ratings" src="<?php echo plugins_url('../images/star.png', __FILE__); ?>">
                            <img class="dr-star-ratings" src="<?php echo plugins_url('../images/star.png', __FILE__); ?>">
                            <img class="dr-star-ratings" src="<?php echo plugins_url('../images/empty-star.png', __FILE__); ?>">
                                        <?php
                }

                if ($dr_client_rating == "5")
                {
?>
                        <img class="dr-star-ratings" src="<?php echo plugins_url('../images/star.png', __FILE__); ?>">
                        <img class="dr-star-ratings" src="<?php echo plugins_url('../images/star.png', __FILE__); ?>">
                        <img class="dr-star-ratings" src="<?php echo plugins_url('../images/star.png', __FILE__); ?>">
                        <img class="dr-star-ratings" src="<?php echo plugins_url('../images/star.png', __FILE__); ?>">
                        <img class="dr-star-ratings" src="<?php echo plugins_url('../images/star.png', __FILE__); ?>">
                                    <?php
                }

?>

                        </div>

                    </div>
                </div>

            </div>

<?php
            endwhile;
        endif;

?> </div>
<?php
        $border_radius_type = esc_attr(get_option('dr_border_radius_type'));
        $border_radius = esc_attr(get_option('dr_border_radius'));
        $dr_theme = esc_attr(get_option('dr_theme'));
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
        }
        if ($dr_theme == "2")
        {
            $theme_style_bg = "#fff";
            $theme_style_clr = "#000";
        }
        if ($dr_theme == "3")
        {
            $theme_style_bg = sanitize_hex_color(get_option('dr_custom_bg'));;
            $theme_style_clr = sanitize_hex_color(get_option('dr_custom_txt_clr'));;
        }

        if (!($border_radius == null || $border_radius == ''))
        {
?>
<style>
.dr-box {border-radius: <?php echo esc_attr(get_option('dr_border_radius')); echo esc_attr($border_type); ?>}
.dr-block .dr-box {background-color:<?php echo $theme_style_bg; ?>}
.dr-block .dr-box {color:<?php echo $theme_style_clr; ?>}
</style>
 <?php
        }
        else
        {
?>
            <style>
            .dr-block .dr-box {background-color:<?php echo $theme_style_bg; ?>}
            .dr-block .dr-box {color:<?php echo $theme_style_clr; ?>}
            </style>
             <?php
        }

        wp_reset_query(); // Restore global post data stomped by the_post().
        

        
    }
}

// register shortcode
add_shortcode('destiny_reviews', array(
    'destiny_review_template',
    'destiny_reviews_template'
));