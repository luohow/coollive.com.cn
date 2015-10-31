// JavaScript Document
//GA���
var u_domain     = "http://demo.i.saiku.com.cn";
var w_domain     = "http://demo.saiku.com.cn";
var notice_t_num = 0;
var notice_p_num = 0;
var system_num   = 0;
var person_num   = 0;

function longNotice() {
	$.ajax({
		url:w_domain+'/service/msg/getnotice?callback=?',
		data:{},
		dataType:'jsonp',
		success:function(res) {	
			if(typeof(res.error) == "undefined") {
				var notice = res.notice;
				notice_t_num = parseInt(notice.invite_apply) + 
				               parseInt(notice.apply_join_allow) + 
				               parseInt(notice.apply_join_deny) + 
				               parseInt(notice.apply_works_allow) + 
				               parseInt(notice.apply_works_deny);
				notice_p_num = parseInt(notice.invite_team_allow) + 
				               parseInt(notice.invite_team_deny) + 
				               parseInt(notice.apply_join) + 
				               parseInt(notice.apply_works) +
				               parseInt(notice.follow_ask) +
				               parseInt(notice.follow_ask_deny) +
				               parseInt(notice.follow_be);
				system_num = notice.system;
				person_num = notice.person_letter;				
				
				flash_notice();
                if(res.sys) {
                	init_sys_msg();
                }
                
                var ttl = (typeof(res.ttl) == "undefined")? 10000:parseInt(res.ttl)*1000;
    			setTimeout(longNotice, ttl);
			}			
		}
	});
}

function flash_notice() {
    if(person_num>0) {
    	$('#msg_personal').text(person_num);
    }
    else{
        $('#msg_personal').text(0);
    }
    if(system_num>0) {
    	$('#msg_system').text(system_num);
    }else{
        $('#msg_system').text(0);
    }
}

function init_sys_msg() {
	$.ajax({
		url:w_domain+'/service/notice/push?callback=?',
		data:{},
		dataType:'jsonp',
		success:function(res) {	
			if(typeof(res.error) == "undefined") {				
			}
		}
	});
}

$(document).ready(function(){
	if(SK_UID>0) {
        $('.sk-Blogin').hide();
        $('.sk-Alogin').show();
		var html = '<ul><li class="aname"><a class="cWhite" href="'+u_domain+'">hi！'+SK_USER_NAME+'</a><a class="cOrangeb" href="'+u_domain+'/logout">退出</a></li>';
		html += '<li class="bname"><a class="cBlueb" href="'+u_domain+'/space/message?type=system">系统通知(<span id="msg_system">0</span>)</a><a class="cBlueb" href="'+u_domain+'/space/message?type=letter">查看私信(<span id="msg_personal">0</span>)</a></li></ul>';
        $('.sk-Alogin').html(html);
		
		longNotice();
	}else {
        $('.sk-Blogin').show();
        $('.sk-Alogin').hide();
		$('.sk-Blogin').html('<dd class="sk-Blogin"><a class="show" href="'+u_domain+'/login">登录</a>&nbsp;&nbsp;|&nbsp;&nbsp; <a href="'+u_domain+'/signup">注册</a></dd>');
	}	
});

//阅读站内消息
if(jQuery.fn.jquery>'1.7') {
	$('.con dl').on('click', function() {
		var msg = eval("("+$(this).attr('data-value')+")");
		$(this).next().toggle(500);	
		if(msg.is_read<=0) {		
			read_message(msg, this);
		}
	});
}else {
	$('.con dl').on('click', function() {
		var msg = eval("("+$(this).attr('data-value')+")");
		$(this).next().toggle(500);	
		if(msg.is_read<=0) {		
			read_message(msg, this);
		}
	});
}

function read_message(message, object) {		
	var obj = $(object);
	if(typeof(message.type) == "undefined") {
		//阅读系统通知
		var miid     = message.id;
		if(miid>0 && message.is_read<=0) {
			$.ajax({
				url:u_domain+'/space/message/readSys?callback=?',
				data:{miid:miid},
				dataType:'jsonp',
				success:function(res) {	
					if(typeof(res.error) == "undefined") {	
						if(res.code == 1) {
							obj.find('dt a').removeClass('fB');
							obj.attr('data-value', '{id:'+message.id+', is_read:1}');
							eval(res.js);
							flash_notice();	
						}
					}else {
						alert(res.error);
					}
				}
			});
		}
	}else {
		//阅读消息
		var mid     = message.m_id;
		if(mid>0 && message.is_read<=0) {
			$.ajax({
				url:u_domain+'/space/message/readMsg?callback=?',
				data:{mid:mid},
				dataType:'jsonp',
				success:function(res) {	
					if(typeof(res.error) == "undefined") {	
						if(res.code == 1) {
							obj.find('dt a').removeClass('fB');
							obj.attr('data-value', '{m_id:'+message.m_id+', is_read:1, type:'+message.type+'}');
							eval(res.js);
							flash_notice();	
						}
					}else {
						alert(res.error);
					}
				}
			});
		}
	}
	
}

$('.sys_msg dd').click(function () {
	var sys_msg = eval("("+$(this).attr('data-value')+")");	
	var miid   = sys_msg.mi_id;
	var obj = $(this);
	if(miid>0 && sys_msg.is_read<=0) {
		$.ajax({
			url:u_domain+'/space/message/readSys?callback=?',
			data:{miid:miid},
			dataType:'jsonp',
			success:function(res) {	
				if(typeof(res.error) == "undefined") {	
					if(res.code == 1) {
                    	eval(res.js);
                    	flash_notice();
                    	obj.attr('data-value', 1);
					}
				}else {
					alert(res.error);
				}
			}
		});
	}
});

function remove_message(mid) {
	if(mid>0) {
		$.ajax({
			url:u_domain+'/space/message/removeMsg?callback=?',
			data:{mid:mid},
			dataType:'jsonp',
			success:function(res) {	
				if(typeof(res.error) == "undefined") {	
                    if(res.code>0) {
                    	$('#msg_'+mid).remove();
					}
				}else {
					alert(res.error);
				}
			}
		});
	}else {
		alert("失效的参赛");
	}
}

function remove_sys_message(mid) {
	if(mid>0) {
		$.ajax({
			url:u_domain+'/space/message/removeSysMsg?callback=?',
			data:{id:mid},
			dataType:'jsonp',
			success:function(res) {	
				if(typeof(res.error) == "undefined") {	
                    if(res.code>0) {
                    	$('#msg_'+mid).remove();
					}
				}else {
					alert(res.error);
				}
			}
		});
	}else {
		alert("失效的参赛");
	}
}

$("#usr_msg").delegate('a', 'click', function(event) {
	var _this = $(this);
	var type = _this.data('type');
	if(_this.data('act')=='del'){
		event.preventDefault();
		$.alertMsg($("#msgtmpl").html(),'a',function(){
			if(type == "sys") {
				remove_sys_message(_this.data('value'));
			}else {
				remove_message(_this.data('value'));
			}			
		});
	}
});
