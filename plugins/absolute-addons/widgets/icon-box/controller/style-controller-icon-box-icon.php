<?php
defined( 'ABSPATH' ) || exit;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

$this->start_controls_section(
	'icon_section',
	[
		'label'      => esc_html__( 'Icon', 'absolute-addons' ),
		'tab'        => Controls_Manager::TAB_STYLE,
		'conditions' => [
			'relation' => 'and',
			'terms'    => [
				[
					'name'     => 'icon_box_icons[value]',
					'operator' => '!==',
					'value'    => '',
				],
			],
		],
	]
);

$this->add_group_control(
	Group_Control_Background::get_type(),
	[
		'name'           => 'icon_section_background',
		'label'          => esc_html__( 'Icon Section Background', 'absolute-addons' ),
		'label_block'    => true,
		'types'          => [ 'classic', 'gradient' ],
		'fields_options' => [
			'background' => [
				'label' => 'Icon Section Background',
			],
		],
		'selector'       => '
		{{WRAPPER}} .absp-wrapper .absp-icon-box-item .icon-box .icon-box-icon,
		{{WRAPPER}} .absp-wrapper .absp-icon-box-item .icon-box .icon-box-icon-left
		',
	]
);

$this->add_control(
	'iconbox-width',
	[
		'label'      => esc_html__( 'Icon Width', 'absolute-addons' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => [ 'px', '%' ],
		'range'      => [
			'px' => [
				'min'  => 0,
				'max'  => 1000,
				'step' => 5,
			],
			'%'  => [
				'min' => 0,
				'max' => 100,
			],
		],
		'selectors'  => [
			'{{WRAPPER}} .absp-wrapper .absp-icon-box-item .icon-box .icon-box-icon,
			{{WRAPPER}} .absp-wrapper .absp-icon-box-item .icon-box .icon-box-icon-left' => 'width: {{SIZE}}{{UNIT}};',
		],
	]
);

$this->add_control(
	'icon-height',
	[
		'label'      => esc_html__( 'Icon Height', 'absolute-addons' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => [ 'px', '%' ],
		'range'      => [
			'px' => [
				'min'  => 0,
				'max'  => 1000,
				'step' => 5,
			],
			'%'  => [
				'min' => 0,
				'max' => 100,
			],
		],

		'selectors'  => [
			'{{WRAPPER}} .absp-wrapper .absp-icon-box-item .icon-box .icon-box-icon,
			{{WRAPPER}} .absp-wrapper .absp-icon-box-item .icon-box .icon-box-icon-left' => 'height: {{SIZE}}{{UNIT}};',
		],
	]
);

$this->add_group_control(
	Group_Control_Border::get_type(),
	[
		'name'     => 'icon_border',
		'label'    => esc_html__( 'Icon Section Border', 'absolute-addons' ),
		'selector' => '
		{{WRAPPER}} .absp-wrapper .absp-icon-box-item .icon-box .icon-box-icon,
		{{WRAPPER}} .absp-wrapper .absp-icon-box-item .icon-box .icon-box-icon-left
		',
	]
);

$this->add_responsive_control(
	'icon_section_border_radius',
	[
		'label'      => esc_html__( 'Icon Section Border Radius', 'absolute-addons' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => [ 'px', 'em', '%' ],
		'selectors'  => [
			'
			{{WRAPPER}} .absp-wrapper .absp-icon-box-item .icon-box .icon-box-icon,
			{{WRAPPER}} .absp-wrapper .absp-icon-box-item .icon-box .icon-box-icon-left
			' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		],
	]
);

$this->add_group_control(
	Group_Control_Box_Shadow::get_type(),
	[
		'name'     => 'icon_section_box_shadow',
		'label'    => esc_html__( 'Icon Section Box Shadow', 'absolute-addons' ),
		'selector' => '
		{{WRAPPER}} .absp-wrapper .absp-icon-box-item .icon-box .icon-box-icon,
		{{WRAPPER}} .absp-wrapper .absp-icon-box-item .icon-box .icon-box-icon-left
		',
	]
);

$this->add_responsive_control(
	'icon_section_padding',
	[
		'label'      => esc_html__( 'Icon Section Padding', 'absolute-addons' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => [ 'px', 'em', '%' ],
		'selectors'  => [
			'
			{{WRAPPER}} .absp-wrapper .absp-icon-box-item .icon-box .icon-box-icon,
			{{WRAPPER}} .absp-wrapper .absp-icon-box-item .icon-box .icon-box-icon-left
			' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		],
	]
);

$this->add_responsive_control(
	'icon_section_margin',
	[
		'label'      => esc_html__( 'Icon Section Margin', 'absolute-addons' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => [ 'px', 'em', '%' ],
		'selectors'  => [
			'
			{{WRAPPER}} .absp-wrapper .absp-icon-box-item .icon-box .icon-box-icon,
			{{WRAPPER}} .absp-wrapper .absp-icon-box-item .icon-box .icon-box-icon-left
			' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		],
	]
);

$this->add_control(
	'icon_color',
	[
		'label'     => esc_html__( 'Icon Color', 'absolute-addons' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => [
			'{{WRAPPER}} .absp-wrapper .absp-icon-box-item .icon-box .icon-box-icon i' => 'color: {{VALUE}};',
		],
	]
);

$this->add_responsive_control(
	'icon_box_icon_size',
	[
		'label'     => esc_html__( 'Icon Size', 'absolute-addons' ),
		'type'      => Controls_Manager::SLIDER,
		'range'     => [
			'px' => [
				'min' => 0,
				'max' => 100,
			],
		],
		'selectors' => [
			'
			{{WRAPPER}} .absp-wrapper .absp-icon-box-item .icon-box .icon-box-icon i
			' => 'font-size: {{SIZE}}{{UNIT}};',
		],
	]
);

$this->add_responsive_control(
	'icon_padding',
	[
		'label'      => esc_html__( 'Icon Padding', 'absolute-addons' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => [ 'px', 'em', '%' ],
		'selectors'  => [
			'{{WRAPPER}} .absp-wrapper .absp-icon-box-item .icon-box .icon-box-icon i, {{WRAPPER}} .absp-wrapper .absp-icon-box-item .icon-box .icon-box-icon .icon-box-icon-left, {{WRAPPER}} .absp-wrapper .absp-icon-box-item .icon-box .icon-box-icon img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		],
	]
);

$this->add_responsive_control(
	'icon_margin',
	[
		'label'      => esc_html__( 'Icon Margin', 'absolute-addons' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => [ 'px', 'em', '%' ],
		'selectors'  => [
			'{{WRAPPER}} .absp-wrapper .absp-icon-box-item .icon-box .icon-box-icon i,
			{{WRAPPER}} .absp-wrapper .absp-icon-box-item .icon-box .icon-box-icon img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		],
	]
);

$this->end_controls_section();
