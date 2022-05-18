<?php
defined( 'ABSPATH' ) || exit;

use AbsoluteAddons\Controls\Group_Control_ABSP_Background;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;

$this->start_controls_section(
	'button_section',
	[
		'label'      => esc_html__( 'Button', 'absolute-addons' ),
		'tab'        => Controls_Manager::TAB_STYLE,
		'conditions' => [
			'relation' => 'and',
			'terms'    => [
				[
					'terms' => [
						[
							'name'     => 'absolute_content_card',
							'operator' => '!==',
							'value'    => 'three',
						],
					],
				],
				[
					'terms' => [
						[
							'name'     => 'enable_button',
							'operator' => '==',
							'value'    => 'yes',
						],
					],
				],
			],
		],
	]
);

$this->start_controls_tabs( 'button_tabs' );

// Normal State Tab
$this->start_controls_tab(
	'icon_box_btn_normal',
	[
		'label' => esc_html__( 'Normal', 'absolute-addons' ),

	]
);

$this->add_group_control(
	Group_Control_Typography::get_type(),
	[
		'label'    => esc_html__( 'Button Typography', 'absolute-addons' ),
		'name'     => 'button_typography',
		'selector' => '{{WRAPPER}} .absp-wrapper .absp-content-card-item .content-card-box a.content-card-box-btn',
	]
);

$this->add_control(
	'button_color',
	[
		'label'     => esc_html__( 'Button Color', 'absolute-addons' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => [
			'{{WRAPPER}} .absp-wrapper .absp-content-card-item .content-card-box a.content-card-box-btn,
			{{WRAPPER}} .absp-wrapper .absp-content-card-item .content-card-box a.content-card-box-btn.button-icon:after' => 'color: {{VALUE}};',
		],
	]
);

$this->add_group_control(
	Group_Control_ABSP_Background::get_type(),
	[
		'name'     => 'button_background',
		'label'    => esc_html__( 'Button Background', 'absolute-addons' ),
		'types'    => [ 'classic', 'gradient' ],
		'selector' => '{{WRAPPER}} .absp-wrapper .absp-content-card-item .content-card-box a.content-card-box-btn',
	]
);

$this->add_group_control(
	Group_Control_Border::get_type(),
	[
		'name'     => 'button_border',
		'label'    => esc_html__( 'Button Border', 'absolute-addons' ),
		'selector' => '{{WRAPPER}} .absp-wrapper .absp-content-card-item .content-card-box a.content-card-box-btn',
	]
);

$this->add_responsive_control(
	'button_border_radius',
	[
		'label'      => esc_html__( 'Button Border Radius', 'absolute-addons' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => [ 'px', 'em', '%' ],
		'selectors'  => [
			'{{WRAPPER}} .absp-wrapper .absp-content-card-item .content-card-box a.content-card-box-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		],
	]
);

$this->add_group_control(
	Group_Control_Box_Shadow::get_type(),
	[
		'name'     => 'button_box_shadow',
		'label'    => esc_html__( 'Box Shadow', 'absolute-addons' ),
		'selector' => '{{WRAPPER}} .absp-wrapper .absp-content-card-item .content-card-box a.content-card-box-btn',
	]
);

$this->add_responsive_control(
	'button_padding',
	[
		'label'      => esc_html__( 'Padding', 'absolute-addons' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => [ 'px', 'em', '%' ],
		'selectors'  => [
			'{{WRAPPER}} .absp-wrapper .absp-content-card-item .content-card-box a.content-card-box-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		],
	]
);

$this->add_control(
	'button_margin',
	[
		'label'      => esc_html__( 'Margin', 'absolute-addons' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => [ 'px', 'em', '%' ],
		'selectors'  => [
			'{{WRAPPER}} .absp-wrapper .absp-content-card-item .content-card-box a.content-card-box-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		],
	]
);

$this->end_controls_tab();

// Hover State Tab
$this->start_controls_tab(
	'icon_box_btn_hover',
	[
		'label' => esc_html__( 'Hover', 'absolute-addons' ),
	]
);

$this->add_control(
	'button_color_hover',
	[
		'label'     => esc_html__( 'Button Color', 'absolute-addons' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => [
			'
			{{WRAPPER}} .absp-wrapper .absp-content-card-item .content-card-box a.content-card-box-btn:hover,
			{{WRAPPER}} .absp-wrapper .absp-content-card-item .content-card-box a.content-card-box-btn:hover.button-icon:after
			' => 'color: {{VALUE}};',
		],
	]
);

$this->add_group_control(
	Group_Control_ABSP_Background::get_type(),
	[
		'name'     => 'button_background_hover',
		'label'    => esc_html__( 'Button Background', 'absolute-addons' ),
		'types'    => [ 'classic', 'gradient' ],
		'selector' => '{{WRAPPER}} .absp-wrapper .absp-content-card-item .content-card-box a.content-card-box-btn:hover',
	]
);

$this->add_control(
	'button_border_color_hover',
	[
		'label'     => esc_html__( 'Button Border Color', 'absolute-addons' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => [
			'{{WRAPPER}} .absp-wrapper .absp-content-card-item .content-card-box a.content-card-box-btn:hover' => 'border-color: {{VALUE}};',
		],
	]
);

$this->add_responsive_control(
	'button_border_radius_hover',
	[
		'label'      => esc_html__( 'Button Border Radius', 'absolute-addons' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => [ 'px', 'em', '%' ],
		'selectors'  => [
			'{{WRAPPER}} .absp-wrapper .absp-content-card-item .content-card-box a.content-card-box-btn:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		],
	]
);

$this->add_group_control(
	Group_Control_Box_Shadow::get_type(),
	[
		'name'     => 'button_box_shadow_hover',
		'label'    => esc_html__( 'Box Shadow', 'absolute-addons' ),
		'selector' => '{{WRAPPER}} .absp-wrapper .absp-content-card-item .content-card-box a.content-card-box-btn:hover',
	]
);

$this->end_controls_tab();

$this->end_controls_tabs();

$this->end_controls_section();

