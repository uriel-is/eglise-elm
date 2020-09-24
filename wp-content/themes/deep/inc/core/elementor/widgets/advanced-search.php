<?php
namespace Elementor;
class Webnus_Element_Widgets_Courses_Advanced_Search extends \Elementor\Widget_Base {

	/**
	 * Retrieve Advanced Search widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {

		return 'eicon-site-search';
		
	}

	/**
	 * Retrieve Advanced Search widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Courses Advanced Search', 'deep' );
	}

	/**
	 * Retrieve Advanced Search widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-search';
	}

	/**
	 * Set widget category.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget category.
	 */
	public function get_categories() {
		return [ 'webnus' ];
	}

	/**
	 * widget styles.
	 *
	 * @since 4.2.0
	 * @access public
	 *
	 */
	public function get_style_depends() {
		return [ 'advanced-search' ];
	}

	/**
	 * Register Advanced Search widget controls.
	 *
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
        // Content Tab
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'General', 'deep' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
		);
        $this->add_control(
			'type',
			[
				'label' => __( 'Type', 'deep' ),
				'type'  => \Elementor\Controls_Manager::SELECT,
				'default' => 'courses',
				'options' => [
					'courses'   => __( 'Courses Search', 'deep' ),
					'events'    => __( 'Events Serach', 'deep' ),
					'excursion' => __( 'Excursion Search', 'deep' ),					
				],
			]
        );
        $this->add_control(
			'category_field',
			[
				'label'    => __( 'Category Field', 'deep' ),
				'type'     => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'deep' ),
				'label_off'    => __( 'No', 'deep' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
        );
        $this->add_control(
			'instructor_field',
			[
				'label'    => __( 'Instructor Field', 'deep' ),
				'type'     => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'deep' ),
				'label_off'    => __( 'No', 'deep' ),
				'return_value' => 'yes',
                'default'   => 'yes',
                'condition' => [
                    'type'  => 'courses',
                ],
			]
        );
        $this->add_control(
			'date_field',
			[
				'label'        => __( 'Date Field', 'deep' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'deep' ),
				'label_off'    => __( 'No', 'deep' ),
				'return_value' => 'yes',
                'default'   => 'yes',
                'condition' => [
                    'type'  => ['events','excursion'],
                ],
			]
		);
		$this->end_controls_section();

		// Custom css tab
		$this->start_controls_section(
			'custom_css_section',
			[
				'label' => __( 'Custom CSS', 'deep' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'custom_css',
			[
				'label'    => __( 'Custom CSS', 'deep' ),
				'type'     => \Elementor\Controls_Manager::CODE,
				'language' => 'css',
				'rows'     => 20,
				'show_label' => true,
			]
		);
		$this->end_controls_section();
	}

	/**
	 * Render Advanced Search widget output on the frontend.
	 *
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
        $settings = $this->get_settings();        

        // Category dropdown
        $taxonomy = '';
        switch ( $settings['type'] ) :
            case 'course':
                $taxonomy = 'course_cat';
            break;
            case 'tribe_events':
                $taxonomy = 'tribe_events_cat';
            break;
            case 'excursion':
                $taxonomy = 'excursion_category';
            break;
        endswitch;
        $cat_args = array(
            'type'			=> 'post',
            'child_of'		=> 0,
            'parent'		=> '',
            'orderby'		=> 'id',
            'order'			=> 'ASC',
            'hide_empty'	=> false,
            'hierarchical'	=> 1,
            'exclude'		=> '',
            'include'		=> '',
            'number'		=> '',
            'taxonomy'		=> $taxonomy,
            'pad_counts'	=> false,
        );
        $categories		= get_categories( $cat_args );
        $category_items	= $new_line = array();
        $options_cat	= '<option value="">' . esc_html__( 'All Categories', 'deep' ) . '</option>';
    
        foreach ( $categories as $category ) :
            $new_line['slug'] = $category->slug;
            $new_line['name'] = $category->name;
            $category_items[] = $new_line;
        endforeach;
    
        foreach ( $category_items as $category_item ) :
            $options_cat .= '<option value="' . $category_item['slug'] . '">' . $category_item['name'] . '</option>';
        endforeach;
    
        // instructor dropdown
        $options_user = '<option value="">' . esc_html__( 'All Instructor', 'deep' ) . '</option>';
        $blogusers	 = get_users();
        foreach ( $blogusers as $user ) :
            if ( michigan_webnus_count_user_posts_by_type( $user->ID, 'course' ) ) {
                $options_user .= '<option value="' . $user->user_nicename . '">' . $user->display_name . '</option>';
            }
        endforeach;
    
        $category_field   = ( $settings['category_field'] ) ? '<select class="category-field" name="' . $taxonomy . '"><option value="">' . esc_html__( 'Categories' , 'deep' ) . '</option>' . $options_cat . '</select>' : '';
        $instructor_field = ( $settings['instructor_field'] && $settings['type'] == 'courses' ) ? '<select class="instructor-field" name="author_name"><option value="">' . esc_html__( 'Instructor', 'deep' ) . '</option>' . $options_user . '</select>' : '';                        

        echo '
        <form role="search" method="get" class="taxonomy-search-form" action="' . esc_url( home_url( '/' ) ) . '">
			<div class="course-advanced-search">
				<input type="search" class="search-field" placeholder="' . esc_attr__( 'Keyword', 'deep' ) . '" value="' . get_search_query() . '" name="s" title="' . esc_attr__( 'Search for:', 'deep' ) . '">
				<input type="hidden" name="post_type" value="' . $settings['type'] . '">
				' . $category_field . $instructor_field . '
				<input type="submit" class="submit-field colorb" value="Search">
			</div>
		</form>';
	}

}