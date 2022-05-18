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

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Digital Agency', 'elementor-addon-halim' ),
				'placeholder' => esc_html__( 'Add heading text here', 'elementor-addon-halim' ),
			]
		);

		$repeater->add_control(
			'subtitle',
			[
				'label' => esc_html__( 'Sub Title', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'We are advanced batch', 'elementor-addon-halim' ),
				'placeholder' => esc_html__( 'Add sub heading text here', 'elementor-addon-halim' ),
			]
		);

		$repeater->add_control(
			'desc',
			[
				'label' => esc_html__( 'Description', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry typesetting industry.d', 'elementor-addon-halim' ),
				'placeholder' => esc_html__( 'Add description text here', 'elementor-addon-halim' ),
			]
		);

		$repeater->add_control(
			'btn_text',
			[
				'label' => esc_html__( 'Button Text', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Our Projects' ),
				'placeholder' => esc_html__( 'Add button text here', 'elementor-addon-halim' ),
			]
		);

		$repeater->add_control(
			'btn_text_link',
			[
				'label' => esc_html__( 'Button URL', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::URL,
                'default' => esc_html__( '#' ),
				'placeholder' => esc_html__( 'https://example.com', 'elementor-addon-halim' ),
			]
		);

		$this->add_control(
			'slides',
			[
				'label' => esc_html__( 'Slides', 'elementor-addon-halim' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => esc_html__( 'Title', 'elementor-addon-halim' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'elementor-addon-halim' ),
					],
					[
						'list_title' => esc_html__( 'Sub Title', 'elementor-addon-halim' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'elementor-addon-halim' ),
					],
					[
						'list_title' => esc_html__( 'Description', 'elementor-addon-halim' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'elementor-addon-halim' ),
					],
					[
						'list_title' => esc_html__( 'Slider Button', 'elementor-addon-halim' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'elementor-addon-halim' ),
					]
				],
			]
		);

		$this->end_controls_section();

		// Slider Style
        $this->start_controls_section(
                'style_section',
                [
                    'label' => esc_html__( 'Style', 'elementor-addon-halim' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
        );

        
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
		$slides = $settings['slides'];
		?>

	<div class="slider owl-carousel">
		<?php 
			foreach($slides as $slide){
				?>
				<div class="single-slide" style="background-image:url('<?php echo $slide['image']['url']?>">
					<div class="container">
						<div class="row">
							<div class="col-xl-12">
								<div class="slide-table">
									<div class="slide-tablecell">
										<h4><?php echo $slide['subtitle'];?></h4>
										<h2><?php echo $slide['title'];?></h2>
										<p><?php echo $slide['desc'];?></p>
										<a href="<?php echo $slide['btn_text_url'];?>" class="box-btn"><?php echo $slide['btn_text'];?> <i class="fa fa-angle-double-right"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
			}
		?>
	</div>

	<?php

	}

}