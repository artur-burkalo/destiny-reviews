<?php
if (!defined('WPINC'))
{
    die; // Abort if accessed directly
    
}

abstract class destiny_reviews_Meta_Box
{

    /**
     * Set up and add the meta box.
     */
    public static function add()
    {
        $screens = ['destiny_reviews'];
        foreach ($screens as $screen)
        {
            add_meta_box('destiny_reviews_box_id', // Unique ID
            'Destiny Reviews', // Box title
            [self::class , 'html'], // Content callback, must be of type callable
            $screen, // Post type
            'normal', 'high',);
        }
    }

    /**
     * Save the meta box input.
     *
     * @param int $post_id  The post ID.
     */
    public static function save(int $post_id)
    {
        if (array_key_exists('destiny_reviews_client_name', $_POST))
        {
            update_post_meta($post_id, 'destiny_reviews_client_name', sanitize_text_field($_POST['destiny_reviews_client_name']));
        }
        if (array_key_exists('destiny_reviews_comment', $_POST))
        {
            update_post_meta($post_id, '_destiny_reviews_comment', sanitize_text_field($_POST['destiny_reviews_comment']));
        }
        if (array_key_exists('destiny_reviews_position', $_POST))
        {
            update_post_meta($post_id, '_destiny_reviews_position', sanitize_text_field($_POST['destiny_reviews_position']));
        }
        if (array_key_exists('destiny_reviews_rating', $_POST))
        {
            update_post_meta($post_id, '_destiny_reviews_rating', sanitize_text_field($_POST['destiny_reviews_rating']));
        }
    }

    /**
     * Display the meta box HTML to the user.
     *
     * @param \WP_Post $post   Post object.
     */

    public static function html($post)
    {
        $dr_client_name = get_post_meta($post->ID, 'destiny_reviews_client_name', true);
        $dr_client_position = get_post_meta($post->ID, '_destiny_reviews_position', true);
        $dr_client_rating = get_post_meta($post->ID, '_destiny_reviews_rating', true);
        $dr_client_testimonial = get_post_meta($post->ID, '_destiny_reviews_comment', true);
?>
        <p>Clients Name</p>
        <input type="text" name="destiny_reviews_client_name" value="<?php echo esc_html($dr_client_name); ?>" id="destiny_reviews_client_name" class="destiny_reviews_client_name" />

        <p>Clients Position (if any)</p>
        <input type="text" name="destiny_reviews_position" value="<?php echo esc_html($dr_client_position); ?>" id="destiny-reviews-position" class="destiny-reviews-position" />

        <p>Rating</p>        
        <select name="destiny_reviews_rating" id="destiny_reviews_rating" class="postbox">
        <option value="">Select Rating</option>
        <option value="1" <?php selected(esc_html($dr_client_rating) , '1'); ?>>1 Star</option>
        <option value="2" <?php selected(esc_html($dr_client_rating) , '2'); ?>>2 Stars</option>
        <option value="3" <?php selected(esc_html($dr_client_rating) , '3'); ?>>3 Stars</option>
        <option value="4" <?php selected(esc_html($dr_client_rating) , '4'); ?>>4 Stars</option>
        <option value="5" <?php selected(esc_html($dr_client_rating) , '5'); ?>>5 Stars</option>
                </select>
        
        <p>Testimonial</p>
        <textarea name="destiny_reviews_comment" id="destiny-reviews-comment" class="widefat" style="height:120px" size="100"><?php echo esc_html($dr_client_testimonial); ?></textarea>
        <?php
    }

}

add_action('add_meta_boxes', ['destiny_reviews_Meta_Box', 'add']);
add_action('save_post', ['destiny_reviews_Meta_Box', 'save']);
