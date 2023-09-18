// custom post type for products
    function custom_post_type_products() {

        $supports = array(
            'title', // post title
            'editor', // post content
            'author', // post author
            'thumbnail', // featured images
            'excerpt', // post excerpt
            'custom-fields', // custom fields
            'comments', // post comments
            'revisions', // post revisions
            'post-formats', // post formats
        );

        $labels = array(
            'name'              => _x('Products', 'plural'),
            'singular_name'     => _x('Product', 'singular'),
            'menu_name'         => _x('Products', 'admin menu'),
            'name_admin_bar'    => _x('Products', 'admin bar'),
            'add_new'           => _x('Add New', 'add new'),
            'add_new_item'      => __('Add New Product'),
            'new_item'          => __('New Product'),
            'edit_item'         => __('Edit Product'),
            'view_item'         => __('View Product'),
            'all_items'         => __('All Products'),
            'search_items'      => __('Search Products'),
            'not_found'         => __('No Product found.'),
        );

        $args = array(
            'supports'          => $supports,
            'labels'            => $labels,
            'public'            => true,
            'query_var'         => true,
            'rewrite'           => array('slug' => 'product/%productcategory%'),
            'has_archive'       => true,
            'hierarchical'      => false,
            'menu_position'     => 15,
            //'taxonomies'  => array( 'category','post_tag' ),
            'show_in_rest' => true,
           // 'menu_icon'         => '',
        );
        register_post_type('product', $args);
        flush_rewrite_rules();
    }
    add_action('init', 'custom_post_type_products');
