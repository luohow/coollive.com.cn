<?php $this->load->view('public/common_head.php'); ?>
<script type="text/javascript" src="/public/data/assets/js/rili/WdatePicker.js"></script>
<script type="text/javascript">
var is_sign = false;
var pubbtnstatus = true;
function sign_art(){
   if(!is_sign){
	    is_sign = true;
	    $(".b_form_btn").html('提交表单中...');
	    initial();
		$.ajax({
			type: "post",
			url: "/space/sign/beauty/<?php echo $gid;?>",
			dataType:"json",
			data:{
			   realname:$("#realname").val(),
			   email:$("#email").val(),
	           mobile:$("#mobile").val(),
	           idcard:$("#idcard").val(),
	           gender:$('input[name="gender"]:checked').val(),
	           birthday:$("#birthday").val(),
	           colid:$("#colid").val(),
	           sign_notice:$('input[name="sign_notice"]:checked').val() ? 1 : 0,
	           is_show_email:$('input[name="is_show_email"]:checked').val() ? 1 : 0,
	           is_show_mobile:$('input[name="is_show_mobile"]:checked').val() ? 1 : 0,
	           signsubmit:true
			},
			success: function(data){
				  if(!data['result']){
				     $("#tip_"+data['tip_type']).html(data['msg']);
				     $("#tip_"+data['tip_type']).css("display","");
				     is_sign = false;
					 $(".b_form_btn").html('提交表单');
					 return false;
				  }else{
					  $.layer($('#phone_chengg').html());
					  setTimeout(function(){window.location.href='<?php echo $this->config->item('base_url'); ?>/look/beauty/<?php echo $gid; ?>';},3000);
					  
				  }
			    
			}
		});
   }else{
	   $(".b_form_btn").html('提交表单中...');
   }
}

function initial(){
	var tips = ['realname','mobile','idcard','birthday',
			    'school','sign','sign_notice'
			   ];

	for(var i=0;i<tips.length;i++){
       $("#tip_"+tips[i]).html('');
	}
}

function hideagree(){
	$("#agreement").hide();
	$("#agreementbg").hide();
}

function use_new_email(){
	$("#email").attr("disabled",false);
}
</script>
<!--content begin-->
<div class="pk_header">
        <!--头部 -->
	    <?php $this->load->view('look/block/head_beauty.html');  ?>
		<!-- 报名信息 -->
		<div id="proSchool" class="provinceSchool">
                <div class="title">
                    <span>已选择:</span>
                </div>
                <div class="proSelect">
                    <select></select>
                    <span></span>
                    <input type="text" >
                </div>
                <div class="schoolList">
                    <ul>
                    </ul>
                </div>
                <div class="button">
                    <a href="javascript:;void(0)" flag='0'>取消</a>
                    <a href="javascript:;void(0)" flag='1'>确定</a>
                </div>
        </div>
		<div class="block_form">
			<div class="b_video_info">
                <dl class="b_form_title"><dt class=" f14px cOrange fY fl" style="width:185px;">填写报名信息</dt><dd class="fl cRed">*报名信息填写后不能更改，请您谨慎操作，均为必填项。</dd></dl>
                <div id="b_form_box">
                    <div class="b_video_form b_baoming_form">
                        <dl>
                            <dt>真实姓名：</dt>
                            <dd>
                                <input type="text" name="realname" id="realname" class="b_bm_input" value="<?php if (!empty($profile['realname'])) { ?><?php echo $profile['realname'];?><?php } else { ?><?php echo @$sign['realname']; ?><?php } ?>"/>
							    <span style="display:none;color:red" id="tip_realname"></span>
                            </dd>
                        </dl>
                        
                        <dl>
                            <dt>邮箱：</dt>
                            <dd>
                                <input type="text" name="email" id="email" value="<?php echo $space['email']; ?>" <?php if (!empty($space['email'])) { ?> disabled="true" <?php } ?> class="b_bm_input" />
                                <span>
	                                <input type="checkbox" name="is_show_email" <?php if ($space['is_show_email'] == 1) { ?>checked='checked' <?php } ?> />
								         在我的主页显示 
							   </span> 
							   <i onclick="use_new_email()">使用新邮箱</i> <span style="display:none;color:red" id="tip_email"></span>
							</dd>                                                    
                        </dl>
                        <dl>
                            <dt>手机号：</dt>
                            <dd>
                                <input type="text" class="b_bm_input" name="mobile" id="mobile" value="<?php echo $space['mobile']; ?>"/>
                                <span>
	                                <input type="checkbox" name="is_show_mobile" <?php if ($space['is_show_mobile'] == 1) { ?>checked='checked' <?php } ?> />
								          在我的主页显示 
							    </span> 
							    <span style="display:none;color:red" id="tip_mobile"></span>
							</dd>
                        </dl>
                        <dl>
                            <dt>性别：</dt>
                            <dd>
                                <ul>
								<li>
									<input type="radio" value="1"  name="gender" <?php if (@$sign['gender'] == 1 || @$sign['gender'] == 0) { ?>checked='checked' <?php } ?>/>
									男</li>
								<li>
									<input type="radio" value="2"  name="gender" <?php if (@$sign['gender'] == 2) { ?>checked='checked' <?php } ?>/>
									女</li>
							</ul>
                            </dd>
                        </dl>
                        <dl>
                            <dt>生日：</dt>
                            <dd>
                                <input type="text" class="b_bm_input" readonly name="birthday" id="birthday" value="<?php if (!empty($profile['birthday'])) { ?><?php echo $profile['birthday'];?><?php } else { ?><?php echo @$sign['birthday']; ?><?php } ?>" class="Wdate txt_date fl b_bm_input" type="text" onfocus="WdatePicker({maxDate:'#F{+(\'d5222\')}'})" />
						        <span style="display:none;color:red" id="tip_birthday"></span>
                            </dd>
                        </dl>
                        <dl>
                            <dt>身份证号：</dt>
                            <dd>
                                <input type="text" name="idcard" id="idcard" class="b_bm_input" value="<?php echo @$sign['idcard']; ?>"/>
							    <span style="display:none;color:red" id="tip_idcard"></span>
							</dd>
                        </dl>
                        <dl>
						<dt>所在院校：</dt>
							<dd>
								<span>
								   <input type="text" name="school" id="school" class="b_bm_input" onfocus="update_colid()" onblur="checkschool()" value="<?php if (!empty($profile['school'])) { ?><?php echo $profile['school'];?><?php } else { ?><?php echo @$sign['school']; ?><?php } ?>" onkeyup="getschool()">
						           <input type="hidden" name="colid" id="colid" <?php if (@$profile['colid']>0) { ?>value="<?php echo @$profile['colid']; ?>"<?php } else { ?>value="-1"<?php } ?>>
								</span>
								<div style="position: absolute;width:298px;z-index:4;margin-top:30px;display:none" class="ac_results">
					        	<ul id="map_result">
					        	</ul>
				                </div>
				                <span style="display:none;color:red" id="tip_school"></span>
								<!--<i id="tip_school"></i>-->
							</dd>
			            
					    </dl>
                        <dl>
                            <dt></dt>
                            <dd>
                                <h3>
                                    <input type="checkbox" name="sign_notice" value="1" checked="true"/>
	                                <a href="javascript:;void(0)" onclick="$.layer($('#wintmpl').html());" style="color:#009fb9">《报名参赛须知》</a>
	                                <span style="display:none;color:red" id="tip_sign_notice"></span>
                                </h3>
                            </dd>
                        </dl>
                        
                        <div class="b_video_btn"><span class="b_form_btn f14px fY" onclick="sign_art()">提交表单</span></div>
                    </div>
                </div>
			</div>
		</div>
</div>
<!--初始化协议 begin-->
<script type="text/tmpl" id="wintmpl">
<div class="pub-win tcbg">
	<h2 class="f16px fY cWhite"><span onclick="$.layer()"></span>活动要求</h2>
	<dl>
		<dd>
			<div>
				<h3 class="fB">活动的整体要求：</h3>
				1、着装要求：
					<p>（1）  外表：青春、健康、积极向上、整洁大方。</p>
					<p>（2）  服饰：参赛选手应根据自己舞蹈种类来挑选相应风格的服装，不得有不健康内容的图案、文字、饰物和道具，否则视具体情况扣分。</p>
				2、成套编排：
					<p>（1）艺术性：</p>
					<p>①  充满活力，积极向上，有创造性，具有流畅的过渡动作，丰富的队型变化</p>
					<p>②  必须显示身体全面的协调能力和活力而应避免重复。</p>
					<p>动作设计中应包含有一种或多种类型的舞蹈动作和技巧动作，成套动作中的舞蹈、技巧、造型和队型变化应始终保持完整性。</p>
					<p>③  舞蹈的动作设计要遵循健康和安全的原则，并体现项目特点。不提倡做力所不能及的难度动作。</p>
					<p>④  表现力丰富，富有激情、感染力强，有良好的团队配合和交流，并能充分体现团队精神。</p>
					<p>(2）完成：　</p>
					<p>成套动作的完成应符合所选舞蹈种类的特色，动作优美。</p>
					<p>动作完成能体现所选择动作类型的风格和特点。</p>
					<p>动作完成轻松流畅，技术高超，没有失误。</p>
				1、着装要求：
					<p>（1）  外表：青春、健康、积极向上、整洁大方。</p>
					<p>（2）  服饰：参赛选手应根据自己舞蹈种类来挑选相应风格的服装，不得有不健康内容的图案、文字、饰物和道具，否则视具体情况扣分。</p>
				2、成套编排：
					<p>（1）艺术性：</p>
					<p>①  充满活力，积极向上，有创造性，具有流畅的过渡动作，丰富的队型变化</p>
					<p>②  必须显示身体全面的协调能力和活力而应避免重复。</p>
					<p>动作设计中应包含有一种或多种类型的舞蹈动作和技巧动作，成套动作中的舞蹈、技巧、造型和队型变化应始终保持完整性。</p>
					<p>③  舞蹈的动作设计要遵循健康和安全的原则，并体现项目特点。不提倡做力所不能及的难度动作。</p>
					<p>④  表现力丰富，富有激情、感染力强，有良好的团队配合和交流，并能充分体现团队精神。</p>
					<p>(2）完成：　</p>
					<p>成套动作的完成应符合所选舞蹈种类的特色，动作优美。</p>
					<p>动作完成能体现所选择动作类型的风格和特点。</p>
					<p>动作完成轻松流畅，技术高超，没有失误。</p>
			</div>
		</dd>
		<dt><a href="javascript:;" onclick="$.layer()">接受</a></dt>
	</dl>
</div>
</script>

<script type="text/tmpl" id="phone_chengg">
<div class="phone-tan" style="width:200px;">
	<h2><span onClick="$.layer()" class="win-close" href=""></span>报名成功</h2>
    <dl>
    	<dt class="fY f14px">报名成功！</dt>
        <dd></dd>
    </dl>
</div>
</script>
<!--初始化协议 end-->

<!--content end-->

<?php $this->load->view('public/footer.php'); ?>
