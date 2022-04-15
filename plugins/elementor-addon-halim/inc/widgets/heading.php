<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Heading Widget.
 * @since 1.0.0
 */
class Elementor_Heading_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Heading widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Heading';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve heading widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Heading', 'elementor-oembed-widget' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Heading widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-heading';
	}

	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url() {
		return '  ';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Heading widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'halim_theme' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the Heading widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'heading', 'head', 'title' ];
	}

	/**
	 * Register Heading widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'elementor-addon-halim' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'heading',
			[
				'label' => esc_html__( 'Heading', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'ABOUT US', 'elementor-addon-halim' ),
				'description' => esc_html__( 'Add heading text', 'elementor-addon-halim' ),
				'placeholder' => esc_html__( 'Add heading text here', 'elementor-addon-halim' ),
			]
		);

		$this->add_control(
			'subheading',
			[
				'label' => esc_html__( 'who we are?', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'who we are?', 'elementor-addon-halim' ),
                'description' => esc_html__( 'Add sub heading text here' , 'elementor-addon-halim' ),
				'placeholder' => esc_html__( 'Add sub heading text here', 'elementor-addon-halim' ),
			]
		);

		$this->add_control(
			'desc',
			[
				'label' => esc_html__( 'Description', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry typesetting industry.d', 'elementor-addon-halim' ),
                'description' => esc_html__( 'Add description text here', 'elementor-addon-halim' ),
				'placeholder' => esc_html__( 'Add description text here', 'elementor-addon-halim' ),
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render Heading widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
        $heading = $settings['heading'];
        $subheading = $settings['subheading'];
        $desc = $settings['desc'];

		?>
		<div class="row section-title">
               <div class="col-md-6 text-right">
                  <h3><span><?php echo $subheading; ?></span> <?php echo $heading;?></h3>
               </div>
               <div class="col-md-6">
                  <p><?php echo $desc;?></p>
               </div>
		</div>
	<?php

	}

}