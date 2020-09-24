<?php
namespace Elementor;
class Webnus_Element_Widgets_Enrolment extends \Elementor\Widget_Base {

	/**
	 * Retrieve Enrolment widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {

		return 'eicon-pencil';
		
	}

	/**
	 * Retrieve Enrolment widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Enrolment', 'deep' );
	}

	/**
	 * Retrieve Enrolment widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-pencil';
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
		return [ 'enrolment' ];
	}

	/**
	 * Register Enrolment widget controls.
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
				'tab'   => Controls_Manager::TAB_CONTENT,
            ]
		);
        $repeater = new Repeater();
		$repeater->add_control(
			'title', [
				'label' => __( 'Title', 'deep' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Title' , 'deep' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'content', [
				'label' => __( 'Content', 'deep' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'Content' , 'deep' ),
				'show_label' => false,
			]
		);
		$repeater->add_control(
			'number', [
				'label' => __( 'Number', 'deep' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '1' , 'deep' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'list',
			[
				'label' => __( 'Repeater List', 'deep' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'title' => __( 'Application Form & Fee', 'deep' ),
						'content' => __( 'Item content. Click the edit button to change this text.', 'deep' ),
						'number' => __( '1', 'deep' ),
					],
					[
						'title' => __( 'Placement', 'deep' ),
                        'content' => __( 'Item content. Click the edit button to change this text.', 'deep' ),
                        'number' => __( '2', 'deep' ),
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);
		$this->end_controls_section();

		// Custom css tab
		$this->start_controls_section(
			'custom_css_section',
			[
				'label' => __( 'Custom CSS', 'deep' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'custom_css',
			[
				'label'    => __( 'Custom CSS', 'deep' ),
				'type'     => Controls_Manager::CODE,
				'language' => 'css',
				'rows'     => 20,
				'show_label' => true,
			]
		);
		$this->end_controls_section();
	}

	/**
	 * Render Enrolment widget output on the frontend.
	 *
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {        
        $settings = $this->get_settings();     
                
        echo '<div class="enrolment-wrap">';
            if ( $settings['list'] ) {
                foreach ( $settings['list'] as $list ) {
                    echo '<div class="enrolment-item">
                        <h4>' . $list['title'] . '</h4>
                        <p>' . $list['content'] . '</p>
                        <span>' . $list['number'] . '</span>
                    </div>';
                }
            }        
        echo '</div>';
	}
}