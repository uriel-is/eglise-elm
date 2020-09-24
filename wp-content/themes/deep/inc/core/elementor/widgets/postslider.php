<?php
namespace Elementor;
class Webnus_Element_Widgets_Post_Slider extends \Elementor\Widget_Base {

	/**
	 * Retrieve widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {

		return 'postslider';

	}

	/**
	 * Retrieve widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {

		return esc_html__( 'Webnus Post Slider', 'deep' );

	}

	/**
	 * Retrieve widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {

		return 'eicon-post-slider';

	}

	/**
	 * enqueue JS
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_script_depends() {

		return [ 'deep-owl-thumb', 'postslider' ];

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
	 * Register widget controls.
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
				'label' => esc_html__( 'General', 'deep' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
		);

		$this->add_control(
			'type',
			[
				'label' =>  esc_html__( 'Type', 'deep' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'description' =>  esc_html__( 'You can choose from these pre-designed types.', 'deep'),
				'options'			=> [
					'1'	=>	'Type 1',
					'2'	=>	'Type 2',
					'3'	=>	'Type 3',
					'4'	=>	'Type 4',
				],
				'default'	=> '1',
			]
		);

		$this->add_control(
			'how_number_slide',
			[
				'label' 		=>  esc_html__( 'Number of Show Slide', 'deep' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'description' 	=>  esc_html__( 'Number of Show Slide (Please set number ) Default #2', 'deep'),
			]
		);
		
		$this->add_control(
			'thumbnail',
			[
				'label' 		=> __( 'Image Size', 'deep' ),
				'type' 			=> \Elementor\Controls_Manager::IMAGE_DIMENSIONS,
				'condition' 	=> [ //dependency
					'type' 	=> [
						'1'
					],
				],
				'description' 	=> __( 'Crop the original image size to any custom size. Set custom width or height to keep the original size ratio.', 'deep' ),
				'default' 		=> [
					'width' 		=> '',
					'height' 		=> '',
				],
			]
		);

		$categories = array();
		$categories = get_categories();
		$category_slug_array = array('');
		$category_name_array = array('');
		foreach( $categories as $category ) {
			$category_slug_array[] = $category->slug;
			$category_name_array[] = $category->name;
		}
		$category_array  = array_combine($category_slug_array, $category_name_array);

		$this->add_control(
			'category',
			[
				'label' =>  esc_html__( 'Category', 'deep' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'description' =>  esc_html__( 'Select shortcode type', 'deep'),
				'options'			=> $category_array,
			]
		);

		$this->add_control(
			'hide_cat',
			[
				'label'		=>  esc_html__( 'Category Display', 'deep' ),
				'type'		=> \Elementor\Controls_Manager::CHOOSE,
				'toggle'	=> false,
				'default'	=> 'show',
				'options'	=> [
					'show' => [
						'title' => __( 'Show', 'deep' ),
						'icon' => 'fa fa-eye',
					],
					'hide' => [
						'title' => __( 'Hide', 'deep' ),
						'icon' => 'fa fa-eye-slash',
					],
				],
				'condition' 	=> [ //dependency
					'type' 	=> [
						'1', '2', '3'
					],
				],
			]
		);
		$this->add_control(
			'hide_date',
			[
				'label'		=>  esc_html__( 'Date Display', 'deep' ),
				'type'		=> \Elementor\Controls_Manager::CHOOSE,
				'toggle'	=> false,
				'default'	=> 'show',
				'options'	=> [
					'show' => [
						'title' => __( 'Show', 'deep' ),
						'icon'	=> 'fa fa-eye',
					],
					'hide' => [
						'title' => __( 'Hide', 'deep' ),
						'icon'	=> 'fa fa-eye-slash',
					],
				],				
			]
		);
		

    $this->end_controls_section();

		// Class & ID Tab
		$this->start_controls_section(
			'classid_section',
			[
				'label' => esc_html__( 'Class & ID', 'deep' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'shortcodeclass',
			[
				'label'	=>  esc_html__( 'Extra Class', 'deep' ),
				'type'	=> \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'shortcodeid',
			[
				'label'	=>  esc_html__( 'ID', 'deep' ),
				'type'	=> \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->end_controls_section();

		// Style	
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => __( 'Title', 'deep' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'title_typography',
				'label' 	=> __( 'Title Typography', 'deep' ),
				'scheme' 	=> Scheme_Typography::TYPOGRAPHY_2,
				'selector' 	=> '#wrap {{WRAPPER}} .latest-title a',
			]
		);
		$this->add_control(
			'title_text_align',
			[
				'label'     => __( 'Text align', 'deep' ),
				'type'      => \Elementor\Controls_Manager::CHOOSE,
				'options'   => [
					'left'   => [
						'title' => __( 'Left', 'deep' ),
						'icon'  => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'deep' ),
						'icon'  => 'fa fa-align-center',
					],
					'right'  => [
						'title' => __( 'Right', 'deep' ),
						'icon'  => 'fa fa-align-right',
					],
				],				
				'toggle'    => true,
				'selectors' => [
					'#wrap {{WRAPPER}} .latest-title a' => 'text-align: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'title_color', 
			[
				'label' 		=> __( 'Title color', 'deep' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'#wrap {{WRAPPER}} .latest-title a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'title_bg',
				'label' => __( 'Background', 'deep' ),
				'types' => [ 'classic' ],
				'selector' => '#wrap {{WRAPPER}} .latest-title a',
			]
		);
		$this->add_control(
			'title_padding', 
			[
				'label' 		=> __( 'Title padding', 'deep' ),
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'#wrap {{WRAPPER}} .latest-title a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'title_margin', 
			[
				'label' 		=> __( 'Title margin', 'deep' ),
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'#wrap {{WRAPPER}} .latest-title a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);		
		$this->add_control(
			'title_opacity',
			[
				'label' => __( 'Opacity', 'deep' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1,
						'step' => 0.1,
					],
				],			
				'selectors' => [
					'#wrap {{WRAPPER}} .latest-title a' => 'opacity: {{SIZE}};',
				],
			]
		);
		$this->add_control(
			'title_display',
			[
				'label'     => __( 'Display', 'deep' ), 
				'type'      => \Elementor\Controls_Manager::SELECT,		
				'options'   => [ 
					'inherit'      => __( 'Inherit', 'deep' ),
					'inline'       => __( 'inline', 'deep' ),
					'inline-block' => __( 'inline block', 'deep' ),
					'block'        => __( 'block', 'deep' ),
					'none'         => __( 'none', 'deep' ),
				],
				'selectors' => [
					'#wrap {{WRAPPER}} .latest-title a' => 'display: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_border_radius', 
			[
				'label' 		=> __( 'Border Radius', 'deep' ), 
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, 
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'#wrap {{WRAPPER}} .latest-title a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'title_border',
				'label' => __( 'Border', 'deep' ),
				'selector' => '#wrap {{WRAPPER}} .latest-title a',
			]
		);
		$this->add_control(
			'title_hover',
			[
				'label'     => __( 'Hover', 'deep' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'title_typography_hover',
				'label' 	=> __( 'Title Typography', 'deep' ),
				'scheme' 	=> Scheme_Typography::TYPOGRAPHY_2,
				'selector' 	=> '#wrap {{WRAPPER}} .latest-title:hover a',
			]
		);
		$this->add_control(
			'title_color_hover', 
			[
				'label' 		=> __( 'Title color', 'deep' ),
				'type' 			=> \Elementor\Controls_Manager::COLOR,
				'selectors' 	=> [
					'#wrap {{WRAPPER}} .latest-title:hover a' => 'color: {{VALUE}} !important',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'title_bg_hover',
				'label' => __( 'Background', 'deep' ),
				'types' => [ 'classic' ],
				'selector' => '#wrap {{WRAPPER}} .latest-title:hover a',
			]
		);
		$this->add_control(
			'title_padding_hover', 
			[
				'label' 		=> __( 'Title padding', 'deep' ),
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'#wrap {{WRAPPER}} .latest-title:hover a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'title_margin_hover', 
			[
				'label' 		=> __( 'Title margin', 'deep' ),
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'#wrap {{WRAPPER}} .latest-title:hover a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);	
		$this->add_control(
			'title_opacity_hover',
			[
				'label' => __( 'Opacity', 'deep' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1,
						'step' => 0.1,
					],
				],			
				'selectors' => [
					'#wrap {{WRAPPER}} .latest-title:hover a' => 'opacity: {{SIZE}};',
				],
			]
		);
		$this->add_control(
			'title_display_hover',
			[
				'label'     => __( 'Display', 'deep' ), 
				'type'      => \Elementor\Controls_Manager::SELECT,		
				'options'   => [ 
					'inherit'      => __( 'Inherit', 'deep' ),
					'inline'       => __( 'inline', 'deep' ),
					'inline-block' => __( 'inline block', 'deep' ),
					'block'        => __( 'block', 'deep' ),
					'none'         => __( 'none', 'deep' ),
				],
				'selectors' => [
					'#wrap {{WRAPPER}} .latest-title:hover a' => 'display: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_border_radius_hover', 
			[
				'label' 		=> __( 'Border Radius', 'deep' ), 
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS, 
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'#wrap {{WRAPPER}} .latest-title:hover a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'title_border_hover',
				'label' => __( 'Border', 'deep' ),
				'selector' => '#wrap {{WRAPPER}} .latest-title:hover a',
			]
		);
		$this->end_controls_section();	
		
		$this->start_controls_section(
			'box_style',
			[
				'label' => __( 'Box Style', 'deep' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'box_bg',
				'label'    => __( 'Background', 'deep' ),
				'types'    => [ 'classic' , 'gradient' ],
				'selector' => '#wrap {{WRAPPER}} .postslider-owl-carousel',
			]
		);
		$this->add_control(
			'box_display',
			[
				'label'     => __( 'Display', 'deep' ), 
				'type'      => \Elementor\Controls_Manager::SELECT,		
				'options'   => [ 
					'inherit'      => __( 'Inherit', 'deep' ),
					'inline'       => __( 'inline', 'deep' ),
					'inline-block' => __( 'inline block', 'deep' ),
					'block'        => __( 'block', 'deep' ),
					'none'         => __( 'none', 'deep' ),
				],
				'selectors' => [
					'#wrap {{WRAPPER}} .postslider-owl-carousel' => 'display: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'box_border',
				'label'    => __( 'Border', 'deep' ),
				'selector' => '#wrap {{WRAPPER}} .postslider-owl-carousel',
			]
		);
		$this->add_control(
			'box_border_radius',
			[
				'label' 		=> __( 'Border Radius', 'deep' ),
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', 'em', '%' ],
				'selectors'     => [
					'#wrap {{WRAPPER}} .postslider-owl-carousel' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);		
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
				[
					'name'     => 'box_shadow',
					'label'    => __( 'Box Shadow', 'deep' ),
					'selector' => '#wrap {{WRAPPER}} .postslider-owl-carousel',
				]
		);
		$this->add_control(
			'box_padding',
			[
				'label' 		=> __( 'Padding', 'deep' ),
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', 'em', '%' ],
				'selectors'     => [
					'#wrap {{WRAPPER}} .postslider-owl-carousel' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'box_margin',
			[
				'label' 		=> __( 'Margin', 'deep' ),
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', 'em', '%' ],
				'selectors'     => [
					'#wrap {{WRAPPER}} .postslider-owl-carousel' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'box_opacity',
			[
				'label' => __( 'Opacity', 'deep' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1,
						'step' => 0.1,
					],
				],			
				'selectors' => [
					'#wrap {{WRAPPER}} .postslider-owl-carousel' => 'opacity: {{SIZE}};',
				],
			]
		);
		$this->add_control(
			'box_overflow ',
			[
				'label'     => __( 'Overflow', 'deep' ), 
				'type'      => \Elementor\Controls_Manager::SELECT,		
				'options'   => [ 
					'inherit'   => __( 'inherit', 'deep' ),
					'scroll'    => __( 'scroll', 'deep' ),
					'hidden'    => __( 'hidden', 'deep' ),
					'auto' 		=> __( 'auto', 'deep' ),
					'auto'      => __( 'auto', 'deep' ),
					'visible'   => __( 'visible', 'deep' ),
				],
				'selectors' => [
					'#wrap {{WRAPPER}} .postslider-owl-carousel' => 'overflow: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'box_hover',
			[
				'label'     => __( 'Hover', 'deep' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'box_bg_hover',
				'label'    => __( 'Background', 'deep' ),
				'types'    => [ 'classic' , 'gradient' ],
				'selector' => '#wrap {{WRAPPER}} .postslider-owl-carousel:hover',
			]
		);
		$this->add_control(
			'box_display_hover',
			[
				'label'     => __( 'Display', 'deep' ), 
				'type'      => \Elementor\Controls_Manager::SELECT,		
				'options'   => [ 
					'inherit'      => __( 'Inherit', 'deep' ),
					'inline'       => __( 'inline', 'deep' ),
					'inline-block' => __( 'inline block', 'deep' ),
					'block'        => __( 'block', 'deep' ),
					'none'         => __( 'none', 'deep' ),
				],
				'selectors' => [
					'#wrap {{WRAPPER}} .postslider-owl-carousel:hover' => 'display: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'box_border_hover',
				'label'    => __( 'Border', 'deep' ),
				'selector' => '#wrap {{WRAPPER}} .postslider-owl-carousel:hover',
			]
		);
		$this->add_control(
			'box_border_radius_hover',
			[
				'label' 		=> __( 'Border Radius', 'deep' ),
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', 'em', '%' ],
				'selectors'     => [
					'#wrap {{WRAPPER}} .postslider-owl-carousel:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);			
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
				[
					'name'     => 'box_shadow_hover',
					'label'    => __( 'Box Shadow', 'deep' ),
					'selector' => '#wrap {{WRAPPER}} .postslider-owl-carousel:hover',
				]
		);
		$this->add_control(
			'box_padding_hover',
			[
				'label' 		=> __( 'Padding', 'deep' ),
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', 'em', '%' ],
				'selectors'     => [
					'#wrap {{WRAPPER}} .postslider-owl-carousel:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'box_margin_hover',
			[
				'label' 	  => __( 'Margin', 'deep' ),
				'type' 		  => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units'  => [ 'px', 'em', '%' ],
				'selectors'   => [
					'#wrap {{WRAPPER}} .postslider-owl-carousel:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'box_opacity_hover',
			[
				'label' => __( 'Opacity', 'deep' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1,
						'step' => 0.1,
					],
				],			
				'selectors' => [
					'#wrap {{WRAPPER}} .postslider-owl-carousel:hover' => 'opacity: {{SIZE}};',
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
				'label' => __( 'Custom CSS', 'deep' ),
				'type' => \Elementor\Controls_Manager::CODE,
				'language' => 'css',
				'rows' => 20,
				'show_label' => true,
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render Sermon Category widget output on the frontend.
	 *
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		
		wp_enqueue_style( 'wn-deep-post-slider0', DEEP_ASSETS_URL . 'css/frontend/post-slider/post-slider0.css' );
		wp_enqueue_style( 'wn-deep-post-slider' . $settings['type'], DEEP_ASSETS_URL . 'css/frontend/post-slider/post-slider' . $settings['type'] . '.css' );
		$style = '';
		ob_start();

		// Class & ID
		$shortcodeclass 	= $settings['shortcodeclass'] ? $settings['shortcodeclass'] : '';
		$shortcodeid		= $settings['shortcodeid'] ? ' id="' . $settings['shortcodeid'] . '"' : '';
		$type				=	$settings['type'];
		$how_number_slide	=	$settings['how_number_slide'];
		$category			=	$settings['category'];
		$hide_cat			=	$settings['hide_cat'];
		$hide_date			=	$settings['hide_date'];

		echo '<div class="postslider-owl-carousel postslider-' . $type . ' owl-carousel owl-theme ' . $shortcodeclass . '"  ' . $shortcodeid . ' data-postslider_count="1" data-slider-id="1">';


			switch ( $type ) :

				case '1':
					$query = new \WP_Query('posts_per_page=' . $how_number_slide . '&category_name=' . $category . '');

					static $uniqid = 0;
					while ( $query->have_posts() ) : $query->the_post();

						$uniqid++;
						$thumbnail_url	= get_the_post_thumbnail_url();
						$thumbnail_id	= get_post_thumbnail_id();

						if( !empty( $thumbnail_url ) && $settings['thumbnail']['width'] && $settings['thumbnail']['height'] ) {
						    
						    $thumbnail_width 	= $settings['thumbnail']['width'] ? $settings['thumbnail']['width'] : '' ;
				            $thumbnail_height 	= $settings['thumbnail']['height'] ? $settings['thumbnail']['height'] : '' ;
						    
							// if main class not exist get it
							if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
								require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
							}

							$image = new \Wn_Img_Maniuplate; // instance from settor class
							$thumbnail_url = $image->m_image( $thumbnail_id, $thumbnail_url , $settings['thumbnail']['width'] , $settings['thumbnail']['height'] ); // set required and get result

						} ?>

						<div class="postslider-carousel postslider-a basic">
							<figure class="latest-img">
								<img src="<?php echo '' . $thumbnail_url; ?>" alt="<?php the_title() ?>" >
							</figure>
							<div class="latest-content latest-content-<?php echo '' . $uniqid; ?>">
								<?php if ( $hide_cat == 'show') { ?>
									<span class="category"><span class="category-color"></span><?php the_category(', '); ?></span>
								<?php } ?>
								<?php if ( $hide_date == 'show') { ?>
									<span class="date"><?php the_time(get_option( 'date_format' ) ); ?></span>
								<?php } ?>
								<h3 class="latest-title"><a href=<?php the_permalink(); ?> class="hcolor"><?php the_title(); ?></a></h3>
							</div>
						</div> <?php
						$style	.= '.latest-content-' . $uniqid . ' .category-color { background: ' . deep_category_color() . '; }';
						

					endwhile;
				break;

				case '2':
					$query = new \WP_Query('posts_per_page=' . $how_number_slide . '&category_name='.$category.'');

					static $uniqid = 0;
					while ( $query->have_posts() ) : $query->the_post();

						$uniqid++;
						$thumbnail_url	= get_the_post_thumbnail_url();
						$thumbnail_id	= get_post_thumbnail_id();

						if( !empty( $thumbnail_url ) ) {

							// if main class not exist get it
							if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
								require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
							}
                            
							$image = new \Wn_Img_Maniuplate; // instance from settor class
							$thumbnail_url = $image->m_image( $thumbnail_id, $thumbnail_url , '1920' , '1080' ); // set required and get result

						} ?>

						<div class="postslider-carousel postslider-b new">
							<figure class="latest-img">
								<img src="<?php echo '' . $thumbnail_url; ?>" alt="<?php the_title() ?>" >
							</figure>
							<div class="latest-content latest-content-<?php echo '' . $uniqid; ?>">
								<?php if ( $hide_cat == 'show') { ?>
									<span class="category"><span class="category-color"></span><?php the_category(', '); ?></span>
								<?php } ?>
								<?php if ( $hide_date == 'show') { ?>
									<span class="date"><?php the_time(get_option( 'date_format' ) ); ?></span>
								<?php } ?>
								<h3 class="latest-title"><a href=<?php the_permalink(); ?> class="hcolorf"><?php the_title(); ?></a></h3>
							</div>
						</div> <?php
						$style	.= '.latest-content-' . $uniqid . ' .category-color { background: ' . deep_category_color() . '; }';
					endwhile;
				break;

				case '3':
					$query = new \WP_Query('posts_per_page=' . $how_number_slide . '&category_name='.$category.'');

					static $uniqid = 0;
					while ( $query->have_posts() ) : $query->the_post();

						$uniqid++;
						$thumbnail_url	= get_the_post_thumbnail_url();
						$thumbnail_id 	= get_post_thumbnail_id();

						if( !empty( $thumbnail_url ) ) {

							// if main class not exist get it
							if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
								require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
							}

							$image = new \Wn_Img_Maniuplate; // instance from settor class
							$thumbnail_url = $image->m_image( $thumbnail_id, $thumbnail_url , '1214' , '980' ); // set required and get result

						} ?>

						<div class="postslider-carousel postslider-b ">
							<figure class="latest-img">
								<img src="<?php echo '' . $thumbnail_url; ?>" alt="<?php the_title() ?>" >
							</figure>
							<div class="latest-content latest-content-<?php echo '' . $uniqid; ?>">
								<?php if ( $hide_cat == 'show') { ?>
									<span class="category"><span class="category-color"></span><?php the_category(', '); ?></span>
								<?php } ?>
								<?php if ( $hide_date == 'show') { ?>
									<span class="date"><?php the_time(get_option( 'date_format' ) ); ?></span>
								<?php } ?>
								<h3 class="latest-title"><a href=<?php the_permalink(); ?> class="hcolorf"><?php the_title(); ?></a></h3>
								<?php $style	.= '.latest-content-' . $uniqid . ' .category-color { background: ' . deep_category_color() . '; }';
								 ?>

								<p class="excerpt"><?php echo deep_excerpt(25); ?></p>
								<a href="<?php the_permalink(); ?>" class="magicmore"><i class="icon-arrows-slim-right"></i><?php esc_html_e( 'READ MORE', 'deep' ) ?></a>
							</div>
						</div> <?php
					endwhile;
				break;

				case '4':
					$query = new \WP_Query('posts_per_page=' . $how_number_slide . '&category_name='.$category.'');

					static $uniqid = 0;
					while ( $query->have_posts() ) : $query->the_post();

						$uniqid++;
						$thumbnail_url	= get_the_post_thumbnail_url();
						$thumbnail_id 	= get_post_thumbnail_id();

						if( !empty( $thumbnail_url ) ) {

							// if main class not exist get it
							if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
								require_once DEEP_CORE_DIR . 'helper-classes/class_webnus_manuplate.php';
							}

							$image = new \Wn_Img_Maniuplate; // instance from settor class
							$thumbnail_url = $image->m_image( $thumbnail_id, $thumbnail_url , '791' , '459' ); // set required and get result
							$thumb_preview = $image->m_image( $thumbnail_id, $thumbnail_url , '54' , '54' ); // set required and get result

						} ?>

						<div class="postslider-carousel postslider-b" data-thumb='<img src="<?php echo '' . $thumb_preview; ?>" alt="<?php the_title() ?>" > '>
							<figure class="latest-img">
								<img src="<?php echo '' . $thumbnail_url; ?>" alt="<?php the_title() ?>" >
							</figure>
							<div class="latest-content latest-content-<?php echo '' . $uniqid; ?>">								
								<?php if ( $hide_date == 'show') { ?>
									<span class="date"><?php the_time(get_option( 'date_format' ) ); ?></span>
								<?php } ?>
								<h3 class="latest-title"><a href=<?php the_permalink(); ?> class="hcolorf"><?php the_title(); ?></a></h3>
								<?php $style .= '.latest-content-' . $uniqid . ' .category-color { background: ' . deep_category_color() . '; }';
								 ?>
								
								<a href="<?php the_permalink(); ?>" class="magicmore"><i class="icon-arrows-slim-right"></i><?php esc_html_e( 'CONTINUE READING', 'deep' ) ?></a>
							</div>
						</div> <?php
					endwhile;
				break;
				
			endswitch;

			echo '</div>';
		deep_save_dyn_styles( $style );
		// live editor
		if ( ! in_array( 'admin-bar', get_body_class() ) ) {

			if ( ! empty( $style ) ) {

				echo '<style>';
					echo $style;
				echo '</style>';

			}

		}
		$out = ob_get_contents();
		ob_end_clean();
		$out = str_replace('<p></p>','',$out);
		wp_reset_postdata();
		
    $custom_css = $settings['custom_css'];

		if ( $custom_css != '' ) {
			echo '<style>'. $custom_css .'</style>';
		}

		echo $out;



	}

}
