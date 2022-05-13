<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Slider Widget.
 * @since 1.0.0
 */
class Elementor_Slider_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Slider widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Slider';
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
		return esc_html__( 'Slider', 'elementor-oembed-widget' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Slider widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-slider-3d';
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
	 * Retrieve the list of categories the Slider widget belongs to.
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
	 * Retrieve the list of keywords the Slider widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'slider', 'carousel', 'gallery' ];
	}

	/**
	 * Register Slider widget controls.
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

        $this->start_controls_section(
                'style_section',
                [
                    'label' => esc_html__( 'Style', 'elementor-addon-halim' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
        );

        // Slider Style
		$this->add_control(
			'heading_style',
			[
				'label' => esc_html__( 'Heading', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'heading_typography',
				'selector' => '{{WRAPPER}} .section-title h3',
			]
		);

		$this->add_control(
			'heading_color',
			[
				'label' => esc_html__( 'Color', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title h3' => 'color: {{VALUE}}',
				],
				'default' => '#333'
			]
		);

        //Subheading Style
		$this->add_control(
			'subheading_style',
			[
				'label' => esc_html__( 'Sub Heading', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'subheading_typography',
				'selector' => '{{WRAPPER}} .section-title h3 span',
			]
		);

		$this->add_control(
			'subheading_color',
			[
				'label' => esc_html__( 'Color', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title h3 span' => 'color: {{VALUE}}',
				],
				'default' => '#333'
			]
		);

        //Description Style
		$this->add_control(
			'desc_style',
			[
				'label' => esc_html__( 'Description', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'section_desc_typography',
				'selector' => '{{WRAPPER}} .section-title p',
			]
		);

		$this->add_control(
			'section_desc_color',
			[
				'label' => esc_html__( 'Color', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title p' => 'color: {{VALUE}}',
				],
				'default' => '#333'
			]
		);

        //Border Style
		$this->add_control(
			'border_style',
			[
				'label' => esc_html__( 'Border', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'section_border_color',
			[
				'label' => esc_html__( 'Border Color', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title::before, .section-title::after' => 'background-color: {{VALUE}}',
				],
				'default' => '#635cdb'
			]
		);

        $this->end_controls_section();

	}

	/**
	 * Render Slider widget output on the frontend.
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

<div class="slider owl-carousel">
		<div class="single-slide" style="background-image:url('<?php echo get_template_directory_uri();?>/assets/img/slider/slide-1.jpg')">
			<div class="container">
				<div class="row">
					<div class="col-xl-12">
						<div class="slide-table">
							<div class="slide-tablecell">
								<h4>We Are Advanced Batch 11</h4>
								<h2>Digital Agency</h2>
								<p>We are a passionate digital design agency that specializes in beautiful and easy-to-use digital design & web development services.</p>
								<a href="#" class="box-btn">our projects <i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="single-slide" style="background-image:url('<?php echo get_template_directory_uri();?>/assets/img/slider/slide-2.jpg')">
			<div class="container">
				<div class="row">
					<div class="col-xl-12">
						<div class="slide-table">
							<div class="slide-tablecell">
								<h4>We Are Halim</h4>
								<h2>Modern Agency</h2>
								<p>We are a passionate digital design agency that specializes in beautiful and easy-to-use digital design & web development services.</p>
								<a href="#" class="box-btn">contact us <i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="single-slide" style="background-image:url('<?php echo get_template_directory_uri();?>/assets/img/slider/slide-3.jpg')">
			<div class="container">
				<div class="row">
					<div class="col-xl-12">
						<div class="slide-table">
							<div class="slide-tablecell">
								<h4>
									We Are Halim
								</h4>
								<h2>Creative Agency</h2>
								<p>We are a passionate digital design agency that specializes in beautiful and easy-to-use digital design & web development services.</p>
								<a href="#" class="box-btn">crreative team <i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php

	}

}