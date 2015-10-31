<?php $this->load->view('public/common_head.php'); ?>
<?php $this->load->view('public/space_head.php'); ?>
<!--content begin-->
<div class="pub-content">
	<div class="pub-w usr_content">
		<!-- 左侧导航 START -->
		<?php $this->load->view('public/space_left.php'); ?>
		<!-- 左侧导航 END -->
		<div class="usr_contentR fr">
			<div class="usr_filter">
				<ul class="cWhite">
					<li class="on"><a href="/space/message?type=system">通知</a></li>
					<li class=""><a href="/space/message?type=team">参赛消息</a></li>
				</ul>
			</div>
			
			<div class="usr_msg" id="usr_msg">
				<ul class="title">
					<li <?php if(!isset($_GET['noread']) || $_GET['noread'] != 1) {echo 'class="on"';}?>><a href="/space/message?type=system">全部</a><i>◆</i></li>
					<li <?php if(isset($_GET['noread']) && $_GET['noread'] == 1) {echo 'class="on"';}?>><a href="/space/message?type=system&noread=1">未读（<span class="cOrange fB system_no_read_num">0</span>）</a><i>◆</i></li>
				</ul>
                
                <?php foreach ($res['list'] as $k=>$v) { ?>		       
		       <div class="con" id="msg_<?php echo $v['id'];?>">
					<dl data-value="{id:<?php echo $v['id'];?>, is_read:<?php echo $v['is_read'];?>}">
						<dt >
						<a href="javascript:void(0);" <?php if($v['is_read'] == 0) {echo 'class="fB"';}?>><?php echo $k+1;?>.<?php echo $v['title'];?></a></dt>
						<dd><?php echo $v['record_time'];?></dd>
						
						<?php if($v['is_read'] == 1) {?>
						<dd class="del cBlue"><a href="javascript:void(0);" data-value="<?php echo $v['id'];?>" data-type="sys"  data-act="del">X 删除</a></dd>
						<?php }?>							
						
					</dl>
					    <div class="hide">
					    <p class="cGray">
						<?php echo $v['content'];?>					
						</p>
					    </div>																	
				</div>
		       <?php } ?>							
			</div>
			<?php echo $page; ?>
		</div>
	</div>
</div>
<script type="text/tmpl" id="msgtmpl">
	<dl class="pub-confirm">
		<dt>
			<strong class="f16px cOrange fY">确定要删除些通知？</strong>
			<p class="cGray">删除后不可恢复，请您慎重操作</p>
		</dt>
		<dd><a href="" onclick="$.layer()">取消</a><a href="" data-action="confirm">确定</a></dd>
	</dl>
</script>
<!--content end-->
<?php $this->load->view('public/footer.php'); ?>