<?php
/*
 * ATTENTION: These settings are not to be changed by the user.
 * These are simply constants and other items used by the plugin.
 * Use the config in the admin screen instead.
 */

if (!defined('WPINC')) {
    die;
}

global $UNC_GALLERY;

$UNC_GALLERY['upload_folder'] = "unc_gallery";
$UNC_GALLERY['upload_path'] = WP_CONTENT_DIR . "/" . $UNC_GALLERY['upload_folder'];
$UNC_GALLERY['photos'] = "photos";                  // subfolder of upload_path where the photos go in
$UNC_GALLERY['thumbnails'] = "thumbs";              // subfolder of upload_path where the thumbs go in
$UNC_GALLERY['file_data'] = "file_data";            // subfolder of upload_path where the file data goes in
$UNC_GALLERY['settings_prefix'] = 'unc_gallery_';   // internal prefix for the config storage.

// options for displays
$UNC_GALLERY['keywords'] = array(
    'type' => array(
        'day' => array('calendar', 'datelist', 'slideshow'), // shows a single date's gallery, optional date picker
        'image' => array('link'), // only one image, requires file addon unless random or latest
        'thumb' => array('link'), // only the icon of one image, requires file addon unless random or latest
    ),
    'date' => array('random', 'latest'),  // whichdate to chose
    'file' => array('random', 'latest'), // in case of image or icon type, you can chose one filename
    'featured' => array('random', 'latest'),
    'limt_rows' => 'intval',
    'limit_images' => 'intval',
);

// file & mime-types
$UNC_GALLERY['thumbnail_ext'] = 'jpeg'; // do not change this, PNG has issues with IPCT
$UNC_GALLERY['valid_filetypes'] = array(
    "image/jpeg" => 'jpeg',
    // "image/png" => 'png', // cannot use png since it does not support IPCT/EXIF
    // "image/gif" => 'gif', // cannot use gif since it does not support IPCT/EXIF
);

// This is used to automatically / dynamically create the settings menu
$UNC_GALLERY['user_settings'] = array(
    'thumbnail_height' => array(
        'help' => 'The desired thumbnail height in pixels. Applies only for new uploads. Use the "Rebuild Thumbnails" function in the "Maintenance" tab to re-generate all tumbnails after changing this.',
        'default' => '120',
        'type' => 'text',
        'title' => 'Thumbnail Height',
    ),
    'thumbnail_quality' => array(
        'help' => 'The desired thumbnail quality. Has to be a number between 1 (worst, smallest file) to 100 (best, largest file).',
        'default' => '60',
        'type' => 'text',
        'title' => 'Thumbnail Quality',
    ),
    'thumbnail_format' => array(
        'help' => 'Crop the thumbnails to a specific format for easier layouts.',
        'default' => 'max_height',
        'type' => 'dropdown',
        'options' => array('max_height' => 'Do not crop', 'square' => 'Square (like facebook/instagram)'),
        'title' => 'Thumbnail Format',
    ),
    'picture_long_edge' => array(
        'help' => 'Shrink the full-size images so that the long edge will be this long (in pixels, 0 for disable). Warning: Resizing will remove all photo meta-data except for the date.',
        'default' => '0',
        'type' => 'text',
        'title' => 'Picture size (Long Edge)',
    ),
    'picture_quality' => array(
        'help' => 'The desired picture quality. Has to be a number between 1 (worst, smallest file) to 100 (best, largest file). This applies only if the images are resized with the above setting.',
        'default' => '75',
        'type' => 'text',
        'title' => 'Picture Quality',
    ),
    'no_image_alert' => array(
        'help' => 'What to display if there is no image for a given date?',
        'default' => 'not_found',
        'type' => 'dropdown',
        'options' => array('not_found' => 'A fiendly "No images available"', 'error' => 'A red Error mesage', 'nothing' => 'Nothing'),
        'title' => 'No image found alert',
    ),
    'featured_size' => array(
        'help' => 'When featuring an image, how many rows should it cover in height? Chose "dynamic" if you want a orientation-specific size instead.',
        'default' => '4',
        'type' => 'dropdown',
        'options' => array('2' => '2 Rows', '3' => '3 Rows', '4' => '4 Rows', '5' => '5 Rows', 'dynamic' => 'dynamic'),
        'title' => 'Featured Image Size',
    ),
    'featured_size_for_portrait' => array(
        'help' => 'When featuring an image, how many image rows should it cover in height in case it is higher than wide? You need to set "Featured Size" to "dynamic" to enable this.',
        'default' => '4',
        'type' => 'dropdown',
        'options' => array('2' => '2 Rows', '3' => '3 Rows', '4' => '4 Rows', '5' => '5 Rows'),
        'title' => 'Featured Image Size (Portrait Format)',
    ),
    'featured_size_for_landscape' => array(
        'help' => 'When featuring an image, how many image rows should it cover in height in case it is wider than high? You need to set "Featured Size" to "dynamic" to enable this.',
        'default' => '3',
        'type' => 'dropdown',
        'options' => array('2' => '2 Rows', '3' => '3 Rows', '4' => '4 Rows', '5' => '5 Rows'),
        'title' => 'Featured Image Size (Landscape Format)',
    ),
    'featured_size_for_mixed_sizes' => array(
        'help' => 'When featuring several images of different orientations, how many image rows should they cover? If you do not want to show them all the same size, choose "dynamic".',
        'default' => '3',
        'type' => 'dropdown',
        'options' => array('2' => '2 Rows', '3' => '3 Rows', '4' => '4 Rows', '5' => '5 Rows', 'dynamic' => 'dynamic'),
        'title' => 'Featured Image Size (Mixed Formats)',
    ),
    'image_view_method' => array(
        'help' => 'Do you want to use photoswipe (mobile enabled) or lightbox, or just an image link to view images?',
        'default' => 'photoswipe',
        'type' => 'dropdown',
        'options' => array('photoswipe' => 'Photoswipe', 'lightbox' => 'Lightbox', 'none' => 'Direct image link'),
        'title' => 'Image view method',
    ),
    'show_exif_data' => array(
        'help' => 'Which EXIF data do you want to show in image descriptions?',
        'default' => array('exposure_time', 'f', 'iso'),
        'type' => 'multiple',
        'options' => unc_image_options_array('exif'), // this function just returns an array
        'title' => 'Description EXIF Data choices',
    ),
    'show_xmp_data' => array(
        'help' => 'Which XMP data do you want to show in image descriptions?',
        'default' => array('keywords'),
        'type' => 'multiple',
        'options' => unc_image_options_array('xmp'), // this function just returns an array
        'title' => 'Description XMP Data choices',
    ),
    'show_ipct_data' => array(
        'help' => 'Which IPCT data do you want to show in image descriptions?',
        'default' => array('byline'),
        'type' => 'multiple',
        'options' => unc_image_options_array('ipct'), // this function just returns an array
        'title' => 'Description IPCT Data choices',
    ),
    'post_keywords' => array(
        'help' => 'Do you want to automatically add missing keywords from photos to posts? This will not remove any tags from posts, only create & add new ones.',
        'default' => 'none',
        'type' => 'dropdown',
        'options' => array(
            'none' => 'Do not auto-tag',
            'xmp' => 'XMP Keywords',
            'xmp_force' => 'XMP Keywords, remove other tags',
            'ipct' => 'IPCT Keywords',
            'ipct_force' => 'IPCT Keywords, remove other tags'
        ),
        'title' => 'Auto-Tag posts with Keywords',
    ),
    'post_categories' => array(
        'help' => 'Do you want to automatically add XMP-data location-based hierarchical categories to posts? This will not remove manually added categories, only create and add new ones',
        'default' => 'none',
        'type' => 'dropdown',
        'options' => array(
            'none' => 'Do not auto-categorize',
            'xmp_country_state_city_location' => 'XMP: Country - State - City - Location',
            'xmp_city_location' => 'XMP: City - Location',
            'ipct_country_state_city' => 'IPCT: Country - State - City',
        ),
        'title' => 'Auto-Categorize posts by Location',
    ),
    'settings_location' => array(
        'help' => 'Do you want the admin screen of this plugin to be shown as a menu entry in the sidebar or a sub-menu of the settings menu?',
        'default' => 'sidebar',
        'type' => 'dropdown',
        'options' => array('sidebar' => 'Show in Sidebar', 'submenu' => 'Show in the Settings'),
        'title' => 'Admin menu location',
    ),
    'admin_date_selector' => array(
        'help' => 'Chose if you want to have a calendar or a dropdown list for the Manage Images Admin page.',
        'default' => 'calendar',
        'type' => 'dropdown',
        'options' => array('calendar' => 'Calendar', 'datelist' => 'Date List'),
        'title' => 'Admin date selector format',
    ),
    'uninstall_deletes_images' => array(
        'help' => 'Do you want your images removed from the server when you uninstall the plugin?',
        'default' => 'yes',
        'type' => 'dropdown',
        'options' => array('yes' => 'Delete all images!', 'no' => 'Keep all images!'),
        'title' => 'Uninstall behavior',
    ),
);