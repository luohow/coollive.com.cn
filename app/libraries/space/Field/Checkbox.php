<?php

/**
 * Dayrui Website Management System
 *
 * @since		version 2.0.0
 * @author		Dayrui <dayrui@gmail.com>
 * @license     http://www.dayrui.com/license
 * @copyright   Copyright (c) 2011 - 9999, Dayrui.Com, Inc.
 * @filesource	svn://www.dayrui.net/v2/dayrui/libraries/Field/Checkbox.php
 */

class F_Checkbox extends A_Field {
	
	/**
     * 构造函数
     */
    public function __construct() {
		parent::__construct();
		$this->name = lang('m-077'); // 字段名称
		$this->fieldtype = TRUE; // TRUE表全部可用字段类型,自定义格式为 array('可用字段类型名称' => '默认长度', ... )
		$this->defaulttype = 'VARCHAR'; // 当用户没有选择字段类型时的缺省值
    }
	
	/**
	 * 字段相关属性参数
	 *
	 * @param	array	$value	值
	 * @return  string
	 */
	public function option($option) {
	
		$option['options'] = isset($option['options']) ? $option['options'] : 'name1|value1'.PHP_EOL.'name2|value2';
		$option['value'] = isset($option['value']) ? $option['value'] : '';
		$option['fieldtype'] = isset($option['fieldtype']) ? $option['fieldtype'] : '';
		$option['fieldlength'] = isset($option['fieldlength']) ? $option['fieldlength'] : '';
		
		return '<tr>
                    <th>'.lang('m-078').'：</th>
                    <td>
                    <textarea name="data[setting][option][options]" style="height:100px;width:400px;">'.$option['options'].'</textarea>
					<div class="onShow">'.lang('m-079').'</div>
                    </td>
                </tr>
				<tr>
                    <th>'.lang('m-080').'：</th>
                    <td>
                    <input id="field_default_value" type="text" class="input-text" size="30" value="'.$option['value'].'" name="data[setting][option][value]">
					'.$this->member_field_select().'
					<div class="onShow">'.lang('m-081').'</div>
                    </td>
                </tr>
				'.$this->field_type($option['fieldtype'], $option['fieldlength']).'
				';
	}
	
	/**
	 * 字段入库值
	 */
	public function insert_value($field) {
		$this->ci->data[$field['ismain']][$field['fieldname']] = dr_array2string($this->ci->post[$field['fieldname']]);
	}
	
	/**
	 * 字段表单输入
	 *
	 * @param	string	$cname	字段别名
	 * @param	string	$name	字段名称
	 * @param	array	$cfg	字段配置
	 * @param	string	$value	值
	 * @return  string
	 */
	public function input($cname, $name, $cfg, $value = NULL) {
		// 字段显示名称
		$text = (isset($cfg['validate']['required']) && $cfg['validate']['required'] == 1 ? '<font color="red">*</font>' : '').'&nbsp;'.$cname.'：';
		// 表单附加参数
		$attr = isset($cfg['validate']['formattr']) && $cfg['validate']['formattr'] ? $cfg['validate']['formattr'] : '';
		// 字段提示信息
		$tips = isset($cfg['validate']['tips']) && $cfg['validate']['tips'] ? '<div class="onShow" id="dr_'.$name.'_tips">'.$cfg['validate']['tips'].'</div>' : '<div class="onTime" id="dr_'.$name.'_tips"></div>';
		// 字段默认值
		if ($value) {
			$value = dr_string2array($value);
		} elseif ($cfg['option']['value']) {
			$value = $this->get_default_value($cfg['option']['value']);
			$value = is_array($value) ? $value : @explode('|', $value);
		} else {
			$value = NULL;
		}
		// 当字段必填时，加入html5验证标签
		if (isset($cfg['validate']['required']) && $cfg['validate']['required'] == 1) $attr .= ' required="required"';
		// 表单选项
		$options = isset($cfg['option']['options']) && $cfg['option']['options'] ? $cfg['option']['options'] : '';
		$str = '';
		if ($options) {
			$options = explode(PHP_EOL, $options);
			foreach ($options as $t) {
				$n = $v = $selected = '';
				list($n, $v) = explode('|', $t);
				$v = is_null($v) ? trim($n) : trim($v);
				$selected = is_array($value) && in_array($v, $value) ? ' checked' : '';
				$str.= '&nbsp;<input type="checkbox" name="data['.$name.'][]" value="'.$v.'" ' . $selected . ' '.$attr.' />&nbsp;'.$n.'&nbsp;&nbsp;';
			}
		}
		$str .= $tips;
		return $this->input_format($name, $text, $str);
	}
	
}