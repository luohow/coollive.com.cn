<?php $this->load->view('public/common_head.php'); ?>
<?php $this->load->view('public/space_head.php'); ?>
<script type="text/javascript" src="http://open.web.meitu.com/sources/xiuxiu.js"></script>
<div class="pub-content">
	<div class="pub-w usr_content">
		<?php $this->load->view('public/space_left.php'); ?>
		<div class="usr_contentR fr">
			<?php $this->load->view('public/common_banner.php'); ?>
				<div class="usr_setup" id="usr_setup">
			   <?php if (!empty($team['list'])) { ?>
			    <?php $i = 1; ?>
			    <?php foreach ($team['list'] as $t) { ?>
            	<div class="moute"><b class="fl f14px"><?php echo $i; ?>.<?php echo $t['name']; ?></b><?php if ($i==1) { ?><span>取消</span><?php } else { ?><span class="on">确定</span><?php } ?></div>
            
            	<div class="usr_setup <?php if ($i>1) { ?>hide<?php } ?>" style="width:790px;height:600px;"><div class="face" id="altContent_<?php echo $t['tid']; ?>"></div></div>
            	<script type="text/javascript">
					
					var xiuxiu_<?php echo $t['tid']; ?> = window.xiuxiu_<?php echo $t['tid']; ?>||{};xiuxiu_<?php echo $t['tid']; ?>.lightEditor=xiuxiu_<?php echo $t['tid']; ?>.lightEditor||{url:"http://open.web.meitu.com/sources/light/PhotoEditor.swf?version=201404111126",base:"http://open.web.meitu.com/sources/light/",width:"528",height:"385",type:1};xiuxiu_<?php echo $t['tid']; ?>.lightPuzzle=xiuxiu_<?php echo $t['tid']; ?>.lightPuzzle||{url:"http://open.web.meitu.com/sources/puzzle/CollagePlugin.swf?version=201305211645",base:"http://open.web.meitu.com/sources/puzzle/",width:"528",height:"470",type:2};xiuxiu_<?php echo $t['tid']; ?>.richEditor=xiuxiu_<?php echo $t['tid']; ?>.richEditor||{url:"http://xiuxiu_<?php echo $t['tid']; ?>.web.meitu.com/Main.swf?v=2.6.99",base:"http://xiuxiu_<?php echo $t['tid']; ?>.web.meitu.com/",width:"100%",height:"100%",type:3};xiuxiu_<?php echo $t['tid']; ?>.daitoutie=xiuxiu_<?php echo $t['tid']; ?>.daitoutie||{url:"http://open.web.meitu.com/sources/daitoutie/FacePhoto.swf?version=201304251419",base:"http://open.web.meitu.com/sources/daitoutie/",width:"568",height:"478",type:4};xiuxiu_<?php echo $t['tid']; ?>.avatarEditor=xiuxiu_<?php echo $t['tid']; ?>.avatarEditor||{url:"http://open.web.meitu.com/sources/avatar/avatar.swf?version=201403261139",base:"http://open.web.meitu.com/sources/avatar/",width:"700",height:"435",type:5};xiuxiu_<?php echo $t['tid']; ?>.batchEditor=xiuxiu_<?php echo $t['tid']; ?>.batchEditor||{url:"http://xiuxiu_<?php echo $t['tid']; ?>.web.meitu.com/plugin/batch/plugin.swf?version=201404011423",base:"http://xiuxiu_<?php echo $t['tid']; ?>.web.meitu.com/plugin/batch/",width:"700",height:"435",type:6};xiuxiu_<?php echo $t['tid']; ?>.uploadType=1;xiuxiu_<?php echo $t['tid']; ?>.defaultUploadDataFieldName="Filedata";xiuxiu_<?php echo $t['tid']; ?>.uploadDataFieldName="Filedata";xiuxiu_<?php echo $t['tid']; ?>.defaultID="xiuxiu_<?php echo $t['tid']; ?>Editor";xiuxiu_<?php echo $t['tid']; ?>.swfs=[];xiuxiu_<?php echo $t['tid']; ?>.unstatAPI=[];xiuxiu_<?php echo $t['tid']; ?>.flashvars={};xiuxiu_<?php echo $t['tid']; ?>.flashvars.defaultvars={source:"plugin",initFun:"xiuxiu_<?php echo $t['tid']; ?>._init",changeFlashHeightFun:"xiuxiu_<?php echo $t['tid']; ?>._setHeight",mouseWheelFun:"xiuxiu_<?php echo $t['tid']; ?>._mouseWheel",imageLoadedFun:"xiuxiu_<?php echo $t['tid']; ?>._imageLoaded",uploadFun:"xiuxiu_<?php echo $t['tid']; ?>._upload",beforeUploadFun:"xiuxiu_<?php echo $t['tid']; ?>._beforeUpload",uploadResponseFun:"xiuxiu_<?php echo $t['tid']; ?>._uploadResponse",batchUploadResponseFun:"xiuxiu_<?php echo $t['tid']; ?>._batchUploadResponseFun",batchUploadCompleteFun:"xiuxiu_<?php echo $t['tid']; ?>._batchUploadCompleteFun",saveBase64ImageFun:"xiuxiu_<?php echo $t['tid']; ?>._saveBase64Image",browseFun:"xiuxiu_<?php echo $t['tid']; ?>._browse",browseCancelFun:"xiuxiu_<?php echo $t['tid']; ?>._browseCancel",closePhotoEditorFun:"xiuxiu_<?php echo $t['tid']; ?>._close",debugFun:"xiuxiu_<?php echo $t['tid']; ?>._debug"};xiuxiu_<?php echo $t['tid']; ?>.params={menu:"false",scale:"noScale",allowFullscreen:"true",allowScriptAccess:"always",bgcolor:"#FFFFFF",wmode:"window"};xiuxiu_<?php echo $t['tid']; ?>.embedSWF=function(b,c,f,l,e){var a;xiuxiu_<?php echo $t['tid']; ?>.container=b;if(document.getElementById(xiuxiu_<?php echo $t['tid']; ?>.container)){document.getElementById(xiuxiu_<?php echo $t['tid']; ?>.container).innerHTML='<p><a href="http://www.adobe.com/go/getflashplayer"><img alt="Get Adobe Flash player" src="http://wwwimages.adobe.com/www.adobe.com/images/shared/download_buttons/get_flash_player.gif"></a></p>'}e=e||xiuxiu_<?php echo $t['tid']; ?>.defaultID;xiuxiu_<?php echo $t['tid']; ?>.editorType=Number(c)||xiuxiu_<?php echo $t['tid']; ?>.lightEditor.type;xiuxiu_<?php echo $t['tid']; ?>.attributes={};xiuxiu_<?php echo $t['tid']; ?>.attributes.name=xiuxiu_<?php echo $t['tid']; ?>.attributes.id=e;xiuxiu_<?php echo $t['tid']; ?>.flashvars.objectID=xiuxiu_<?php echo $t['tid']; ?>.attributes.id;if(xiuxiu_<?php echo $t['tid']; ?>.editorType==xiuxiu_<?php echo $t['tid']; ?>.lightPuzzle.type){a=xiuxiu_<?php echo $t['tid']; ?>.lightPuzzle.url;xiuxiu_<?php echo $t['tid']; ?>.params.base=xiuxiu_<?php echo $t['tid']; ?>.lightPuzzle.base;f=f||xiuxiu_<?php echo $t['tid']; ?>.lightPuzzle.width;l=l||xiuxiu_<?php echo $t['tid']; ?>.lightPuzzle.height}else{if(xiuxiu_<?php echo $t['tid']; ?>.editorType==xiuxiu_<?php echo $t['tid']; ?>.richEditor.type){a=xiuxiu_<?php echo $t['tid']; ?>.richEditor.url;xiuxiu_<?php echo $t['tid']; ?>.params.base=xiuxiu_<?php echo $t['tid']; ?>.richEditor.base;f=f||xiuxiu_<?php echo $t['tid']; ?>.richEditor.width;l=l||xiuxiu_<?php echo $t['tid']; ?>.richEditor.height}else{if(xiuxiu_<?php echo $t['tid']; ?>.editorType==xiuxiu_<?php echo $t['tid']; ?>.daitoutie.type){a=xiuxiu_<?php echo $t['tid']; ?>.daitoutie.url;xiuxiu_<?php echo $t['tid']; ?>.params.base=xiuxiu_<?php echo $t['tid']; ?>.daitoutie.base;f=f||xiuxiu_<?php echo $t['tid']; ?>.daitoutie.width;l=l||xiuxiu_<?php echo $t['tid']; ?>.daitoutie.height}else{if(xiuxiu_<?php echo $t['tid']; ?>.editorType==xiuxiu_<?php echo $t['tid']; ?>.avatarEditor.type){a=xiuxiu_<?php echo $t['tid']; ?>.avatarEditor.url;xiuxiu_<?php echo $t['tid']; ?>.params.base=xiuxiu_<?php echo $t['tid']; ?>.avatarEditor.base;f=f||xiuxiu_<?php echo $t['tid']; ?>.avatarEditor.width;l=l||xiuxiu_<?php echo $t['tid']; ?>.avatarEditor.height}else{if(xiuxiu_<?php echo $t['tid']; ?>.editorType==xiuxiu_<?php echo $t['tid']; ?>.batchEditor.type){a=xiuxiu_<?php echo $t['tid']; ?>.batchEditor.url;xiuxiu_<?php echo $t['tid']; ?>.params.base=xiuxiu_<?php echo $t['tid']; ?>.batchEditor.base;f=f||xiuxiu_<?php echo $t['tid']; ?>.batchEditor.width;l=l||xiuxiu_<?php echo $t['tid']; ?>.batchEditor.height}else{a=xiuxiu_<?php echo $t['tid']; ?>.lightEditor.url;xiuxiu_<?php echo $t['tid']; ?>.params.base=xiuxiu_<?php echo $t['tid']; ?>.lightEditor.base;f=f||xiuxiu_<?php echo $t['tid']; ?>.lightEditor.width;l=l||xiuxiu_<?php echo $t['tid']; ?>.lightEditor.height;xiuxiu_<?php echo $t['tid']; ?>.editorType=xiuxiu_<?php echo $t['tid']; ?>.lightEditor.type}}}}}var g={};for(var j in xiuxiu_<?php echo $t['tid']; ?>.flashvars.defaultvars){g[j]=xiuxiu_<?php echo $t['tid']; ?>.flashvars.defaultvars[j]}if(xiuxiu_<?php echo $t['tid']; ?>.flashvars[xiuxiu_<?php echo $t['tid']; ?>.defaultID]){for(j in xiuxiu_<?php echo $t['tid']; ?>.flashvars[xiuxiu_<?php echo $t['tid']; ?>.defaultID]){g[j]=xiuxiu_<?php echo $t['tid']; ?>.flashvars[xiuxiu_<?php echo $t['tid']; ?>.defaultID][j]}}if(xiuxiu_<?php echo $t['tid']; ?>.flashvars[e]){for(j in xiuxiu_<?php echo $t['tid']; ?>.flashvars[e]){g[j]=xiuxiu_<?php echo $t['tid']; ?>.flashvars[e][j]}}var k={};for(j in xiuxiu_<?php echo $t['tid']; ?>.params){k[j]=xiuxiu_<?php echo $t['tid']; ?>.params[j]}if(xiuxiu_<?php echo $t['tid']; ?>.single){var d=xiuxiu_<?php echo $t['tid']; ?>.swfs.length;for(var h=0;h<d;h++){swfobject.removeSWF(xiuxiu_<?php echo $t['tid']; ?>.swfs[h].id)}xiuxiu_<?php echo $t['tid']; ?>.swfs=[]}swfobject.embedSWF(a,xiuxiu_<?php echo $t['tid']; ?>.container,f,l,"10.2.0","http://open.web.meitu.com/sources/expressInstall.swf",g,k,xiuxiu_<?php echo $t['tid']; ?>.attributes);xiuxiu_<?php echo $t['tid']; ?>.swfs.push({id:xiuxiu_<?php echo $t['tid']; ?>.attributes.id,type:xiuxiu_<?php echo $t['tid']; ?>.editorType});xiuxiu_<?php echo $t['tid']; ?>._apiTrack("embedSWF_"+c+"_"+f+"_"+l,e)};xiuxiu_<?php echo $t['tid']; ?>.remove=function(c){c=c||(xiuxiu_<?php echo $t['tid']; ?>.swfs.length>0?xiuxiu_<?php echo $t['tid']; ?>.swfs[0].id:xiuxiu_<?php echo $t['tid']; ?>.defaultID);swfobject.removeSWF(c);var a=xiuxiu_<?php echo $t['tid']; ?>.swfs.length;for(var b=a-1;b>-1;b--){if(xiuxiu_<?php echo $t['tid']; ?>.swfs[b].id==c){xiuxiu_<?php echo $t['tid']; ?>.swfs.splice(b,1)}}};xiuxiu_<?php echo $t['tid']; ?>._init=function(a){xiuxiu_<?php echo $t['tid']; ?>.setUploadURL(xiuxiu_<?php echo $t['tid']; ?>.uploadURL,a);xiuxiu_<?php echo $t['tid']; ?>.setUploadArgs(xiuxiu_<?php echo $t['tid']; ?>.uploadArgs,a);xiuxiu_<?php echo $t['tid']; ?>.setUploadType(xiuxiu_<?php echo $t['tid']; ?>.uploadType,a);xiuxiu_<?php echo $t['tid']; ?>.setUploadDataFieldName(xiuxiu_<?php echo $t['tid']; ?>.uploadDataFieldName,a);xiuxiu_<?php echo $t['tid']; ?>.setCropPresets(xiuxiu_<?php echo $t['tid']; ?>.cropPresets,a);if(xiuxiu_<?php echo $t['tid']; ?>.onInit&&typeof(xiuxiu_<?php echo $t['tid']; ?>.onInit)=="function"){xiuxiu_<?php echo $t['tid']; ?>.onInit(a);xiuxiu_<?php echo $t['tid']; ?>._apiTrack("onInit",a)}};xiuxiu_<?php echo $t['tid']; ?>._imageLoaded=function(a,b){if(xiuxiu_<?php echo $t['tid']; ?>.onImageLoaded&&typeof(xiuxiu_<?php echo $t['tid']; ?>.onImageLoaded)=="function"){xiuxiu_<?php echo $t['tid']; ?>.onImageLoaded(a,b);xiuxiu_<?php echo $t['tid']; ?>._apiTrack("onImageLoaded",b)}};xiuxiu_<?php echo $t['tid']; ?>._upload=function(a){if(xiuxiu_<?php echo $t['tid']; ?>.onUpload&&typeof(xiuxiu_<?php echo $t['tid']; ?>.onUpload)=="function"){xiuxiu_<?php echo $t['tid']; ?>.onUpload(a);xiuxiu_<?php echo $t['tid']; ?>._apiTrack("onUpload",a)}};xiuxiu_<?php echo $t['tid']; ?>._beforeUpload=function(a,b){if(xiuxiu_<?php echo $t['tid']; ?>.onBeforeUpload&&typeof(xiuxiu_<?php echo $t['tid']; ?>.onBeforeUpload)=="function"){xiuxiu_<?php echo $t['tid']; ?>._apiTrack("onBeforeUpload",b);return xiuxiu_<?php echo $t['tid']; ?>.onBeforeUpload(a,b)}else{return true}};xiuxiu_<?php echo $t['tid']; ?>._uploadResponse=function(a,b){if(xiuxiu_<?php echo $t['tid']; ?>.onUploadResponse&&typeof(xiuxiu_<?php echo $t['tid']; ?>.onUploadResponse)=="function"){xiuxiu_<?php echo $t['tid']; ?>.onUploadResponse(a,b);xiuxiu_<?php echo $t['tid']; ?>._apiTrack("onUploadResponse",b,true)}};xiuxiu_<?php echo $t['tid']; ?>._batchUploadResponseFun=function(b,a,c){if(xiuxiu_<?php echo $t['tid']; ?>.onBatchUploadResponse&&typeof(xiuxiu_<?php echo $t['tid']; ?>.onBatchUploadResponse)=="function"){return xiuxiu_<?php echo $t['tid']; ?>.onBatchUploadResponse(b,a,c)}else{return{"continue":true,success:true}}};xiuxiu_<?php echo $t['tid']; ?>._batchUploadCompleteFun=function(a){if(xiuxiu_<?php echo $t['tid']; ?>.onBatchUploadComplete&&typeof(xiuxiu_<?php echo $t['tid']; ?>.onBatchUploadComplete)=="function"){xiuxiu_<?php echo $t['tid']; ?>.onBatchUploadComplete(a);xiuxiu_<?php echo $t['tid']; ?>._apiTrack("onBatchUploadComplete",a,true)}};xiuxiu_<?php echo $t['tid']; ?>._saveBase64Image=function(b,d,a,c){if(xiuxiu_<?php echo $t['tid']; ?>.onSaveBase64Image&&typeof(xiuxiu_<?php echo $t['tid']; ?>.onSaveBase64Image)=="function"){xiuxiu_<?php echo $t['tid']; ?>.onSaveBase64Image(b,d,a,c);xiuxiu_<?php echo $t['tid']; ?>._apiTrack("onSaveBase64Image",c)}};xiuxiu_<?php echo $t['tid']; ?>._browse=function(c,b,a,d){if(xiuxiu_<?php echo $t['tid']; ?>.onBrowse&&typeof(xiuxiu_<?php echo $t['tid']; ?>.onBrowse)=="function"){xiuxiu_<?php echo $t['tid']; ?>.onBrowse(c,b,a,d);xiuxiu_<?php echo $t['tid']; ?>._apiTrack("onBrowse_"+c+"_"+b+"_"+a,d)}};xiuxiu_<?php echo $t['tid']; ?>._browseCancel=function(a){if(xiuxiu_<?php echo $t['tid']; ?>.onBrowseCancel&&typeof(xiuxiu_<?php echo $t['tid']; ?>.onBrowseCancel)=="function"){xiuxiu_<?php echo $t['tid']; ?>.onBrowseCancel(a);xiuxiu_<?php echo $t['tid']; ?>._apiTrack("onBrowseCancel",a)}};xiuxiu_<?php echo $t['tid']; ?>._close=function(a){if(xiuxiu_<?php echo $t['tid']; ?>.onClose&&typeof(xiuxiu_<?php echo $t['tid']; ?>.onClose)=="function"){xiuxiu_<?php echo $t['tid']; ?>.onClose(a);xiuxiu_<?php echo $t['tid']; ?>._apiTrack("onClose",a,true)}};xiuxiu_<?php echo $t['tid']; ?>._debug=function(a,b){if(xiuxiu_<?php echo $t['tid']; ?>.onDebug&&typeof(xiuxiu_<?php echo $t['tid']; ?>.onDebug)=="function"){xiuxiu_<?php echo $t['tid']; ?>.onDebug(a,b);xiuxiu_<?php echo $t['tid']; ?>._apiTrack("onDebug",b)}};xiuxiu_<?php echo $t['tid']; ?>.loadPhoto=function(b,c,f,e){var d=e||{};d.uploadType=xiuxiu_<?php echo $t['tid']; ?>.uploadType;d.base64=Boolean(c);if(b){d.images=d.imageURL=b}if(xiuxiu_<?php echo $t['tid']; ?>.uploadURL){d.uploadURL=xiuxiu_<?php echo $t['tid']; ?>.uploadURL}if(xiuxiu_<?php echo $t['tid']; ?>.uploadArgs){d.uploadArgs=xiuxiu_<?php echo $t['tid']; ?>.uploadArgs}if(xiuxiu_<?php echo $t['tid']; ?>.uploadDataFieldName){d.uploadDataFieldName=xiuxiu_<?php echo $t['tid']; ?>.uploadDataFieldName}if(xiuxiu_<?php echo $t['tid']; ?>.getEditor(f)){var a=xiuxiu_<?php echo $t['tid']; ?>._getEditorTypeByID(f);if(a==xiuxiu_<?php echo $t['tid']; ?>.richEditor.type){if(b){d.loadImageChannel=d.loadImageChannel||"main";xiuxiu_<?php echo $t['tid']; ?>.getEditor(f).loadImages(b,d)}}else{xiuxiu_<?php echo $t['tid']; ?>.getEditor(f).loadPhoto(d)}}xiuxiu_<?php echo $t['tid']; ?>._apiTrack("loadPhoto_"+typeof(b)+"_"+Boolean(c),f)};xiuxiu_<?php echo $t['tid']; ?>.upload=function(a,b,c,d){xiuxiu_<?php echo $t['tid']; ?>.uploadURL=a||xiuxiu_<?php echo $t['tid']; ?>.uploadURL;xiuxiu_<?php echo $t['tid']; ?>.uploadArgs=b||xiuxiu_<?php echo $t['tid']; ?>.uploadArgs;c=c||xiuxiu_<?php echo $t['tid']; ?>.uploadType;if((c==1||c==3)&&xiuxiu_<?php echo $t['tid']; ?>.getEditor(d)){xiuxiu_<?php echo $t['tid']; ?>.getEditor(d).upload(xiuxiu_<?php echo $t['tid']; ?>.uploadURL,xiuxiu_<?php echo $t['tid']; ?>.uploadArgs,c)}xiuxiu_<?php echo $t['tid']; ?>._apiTrack("upload",d)};xiuxiu_<?php echo $t['tid']; ?>.reset=function(){xiuxiu_<?php echo $t['tid']; ?>.uploadURL="";xiuxiu_<?php echo $t['tid']; ?>.uploadArgs=null;xiuxiu_<?php echo $t['tid']; ?>.uploadType=1;xiuxiu_<?php echo $t['tid']; ?>.uploadDataFieldName=xiuxiu_<?php echo $t['tid']; ?>.defaultUploadDataFieldName};xiuxiu_<?php echo $t['tid']; ?>.getEditor=function(a){a=a||(xiuxiu_<?php echo $t['tid']; ?>.swfs.length>0?xiuxiu_<?php echo $t['tid']; ?>.swfs[0].id:xiuxiu_<?php echo $t['tid']; ?>.defaultID);return xiuxiu_<?php echo $t['tid']; ?>._getFlash(a)};xiuxiu_<?php echo $t['tid']; ?>.setUploadURL=function(a,b){xiuxiu_<?php echo $t['tid']; ?>.uploadURL=a;if(xiuxiu_<?php echo $t['tid']; ?>.uploadURL&&xiuxiu_<?php echo $t['tid']; ?>.getEditor(b)&&xiuxiu_<?php echo $t['tid']; ?>.getEditor(b).setParam){xiuxiu_<?php echo $t['tid']; ?>.getEditor(b).setParam("uploadURL",a)}if(a){xiuxiu_<?php echo $t['tid']; ?>._apiTrack("setUploadURL",b)}};xiuxiu_<?php echo $t['tid']; ?>.setUploadArgs=function(a,b){xiuxiu_<?php echo $t['tid']; ?>.uploadArgs=a;if(xiuxiu_<?php echo $t['tid']; ?>.uploadArgs&&xiuxiu_<?php echo $t['tid']; ?>.getEditor(b)&&xiuxiu_<?php echo $t['tid']; ?>.getEditor(b).setParam){xiuxiu_<?php echo $t['tid']; ?>.getEditor(b).setParam("uploadArgs",a)}if(a){xiuxiu_<?php echo $t['tid']; ?>._apiTrack("setUploadArgs",b)}};xiuxiu_<?php echo $t['tid']; ?>.setUploadType=function(a,b){xiuxiu_<?php echo $t['tid']; ?>.uploadType=a;if(xiuxiu_<?php echo $t['tid']; ?>.uploadType&&xiuxiu_<?php echo $t['tid']; ?>.getEditor(b)&&xiuxiu_<?php echo $t['tid']; ?>.getEditor(b).setParam){xiuxiu_<?php echo $t['tid']; ?>.getEditor(b).setParam("uploadType",xiuxiu_<?php echo $t['tid']; ?>.uploadType)}xiuxiu_<?php echo $t['tid']; ?>._apiTrack("setUploadType_"+xiuxiu_<?php echo $t['tid']; ?>.uploadType,b)};xiuxiu_<?php echo $t['tid']; ?>.setUploadDataFieldName=function(a,b){xiuxiu_<?php echo $t['tid']; ?>.uploadDataFieldName=a;if(xiuxiu_<?php echo $t['tid']; ?>.uploadDataFieldName&&xiuxiu_<?php echo $t['tid']; ?>.getEditor(b)&&xiuxiu_<?php echo $t['tid']; ?>.getEditor(b).setParam){xiuxiu_<?php echo $t['tid']; ?>.getEditor(b).setParam("uploadDataFieldName",a)}xiuxiu_<?php echo $t['tid']; ?>._apiTrack("setUploadDataFieldName_"+a,b)};xiuxiu_<?php echo $t['tid']; ?>.setCropPresets=function(a,b){xiuxiu_<?php echo $t['tid']; ?>.cropPresets=a;if(a&&xiuxiu_<?php echo $t['tid']; ?>.getEditor(b)&&xiuxiu_<?php echo $t['tid']; ?>.getEditor(b).setParam){xiuxiu_<?php echo $t['tid']; ?>.getEditor(b).setParam("cropPresets",a)}if(a){xiuxiu_<?php echo $t['tid']; ?>._apiTrack("setCropPresets_"+typeof(a),b)}};xiuxiu_<?php echo $t['tid']; ?>.setLaunchVars=xiuxiu_<?php echo $t['tid']; ?>.setFlashvars=function(a,b,c){c=c||xiuxiu_<?php echo $t['tid']; ?>.defaultID;xiuxiu_<?php echo $t['tid']; ?>.flashvars[c]=xiuxiu_<?php echo $t['tid']; ?>.flashvars[c]||{};if(a=="cropPresets"){if(b.constructor==Array){xiuxiu_<?php echo $t['tid']; ?>.flashvars[c][a]=encodeURIComponent(xiuxiu_<?php echo $t['tid']; ?>.stringify(b))}else{xiuxiu_<?php echo $t['tid']; ?>.flashvars[c][a]=b}}else{if(a=="customMenu"){if(b.constructor==Array){xiuxiu_<?php echo $t['tid']; ?>.flashvars[c][a]=encodeURIComponent(xiuxiu_<?php echo $t['tid']; ?>.stringify(b))}else{xiuxiu_<?php echo $t['tid']; ?>.flashvars[c][a]=b}}else{if(a=="avatarPreview"){if(b.constructor==Object){xiuxiu_<?php echo $t['tid']; ?>.flashvars[c][a]=encodeURIComponent(xiuxiu_<?php echo $t['tid']; ?>.stringify(b))}else{xiuxiu_<?php echo $t['tid']; ?>.flashvars[c][a]=b}}else{if(a=="batchPresets"){xiuxiu_<?php echo $t['tid']; ?>.flashvars[c][a]=encodeURIComponent(xiuxiu_<?php echo $t['tid']; ?>.stringify(b))}else{xiuxiu_<?php echo $t['tid']; ?>.flashvars[c][a]=b}}}}xiuxiu_<?php echo $t['tid']; ?>._apiTrack("setLaunchVars_"+a+"_"+typeof(b))};xiuxiu_<?php echo $t['tid']; ?>._setHeight=function(a,b){if(xiuxiu_<?php echo $t['tid']; ?>.getEditor(b)){xiuxiu_<?php echo $t['tid']; ?>.getEditor(b).height=a}xiuxiu_<?php echo $t['tid']; ?>._apiTrack("setHeight",b)};xiuxiu_<?php echo $t['tid']; ?>._mouseWheel=function(b,a){if(xiuxiu_<?php echo $t['tid']; ?>.getEditor(a)&&xiuxiu_<?php echo $t['tid']; ?>.getEditor(a).mouseWheel){xiuxiu_<?php echo $t['tid']; ?>.getEditor(a).mouseWheel(b)}};xiuxiu_<?php echo $t['tid']; ?>.uploadStart=function(a,b){if(xiuxiu_<?php echo $t['tid']; ?>.getEditor(b)&&xiuxiu_<?php echo $t['tid']; ?>.getEditor(b).uploadStart){xiuxiu_<?php echo $t['tid']; ?>.getEditor(b).uploadStart(a)}xiuxiu_<?php echo $t['tid']; ?>._apiTrack("uploadStart",b)};xiuxiu_<?php echo $t['tid']; ?>.uploadResponse=function(a,b){if(xiuxiu_<?php echo $t['tid']; ?>.getEditor(b)&&xiuxiu_<?php echo $t['tid']; ?>.getEditor(b).uploadResponse){xiuxiu_<?php echo $t['tid']; ?>.getEditor(b).uploadResponse(a)}xiuxiu_<?php echo $t['tid']; ?>._apiTrack("uploadResponse",b)};xiuxiu_<?php echo $t['tid']; ?>.uploadFail=function(a,b){if(xiuxiu_<?php echo $t['tid']; ?>.getEditor(b)&&xiuxiu_<?php echo $t['tid']; ?>.getEditor(b).uploadFail){xiuxiu_<?php echo $t['tid']; ?>.getEditor(b).uploadFail(a)}xiuxiu_<?php echo $t['tid']; ?>._apiTrack("uploadFail",b)};xiuxiu_<?php echo $t['tid']; ?>._getFlash=function(b){var a=document.getElementById(b);if(!a){if(navigator.appName.indexOf("Microsoft")!=-1){a=window[b]}else{a=document[b]}}return a};xiuxiu_<?php echo $t['tid']; ?>._getEditorTypeByID=function(e){var a=xiuxiu_<?php echo $t['tid']; ?>.swfs.length;e=e||(a>0?xiuxiu_<?php echo $t['tid']; ?>.swfs[0].id:xiuxiu_<?php echo $t['tid']; ?>.defaultID);var d;var c=xiuxiu_<?php echo $t['tid']; ?>.lightEditor.type;for(var b=0;b<a;b++){d=xiuxiu_<?php echo $t['tid']; ?>.swfs[b];if(e==d.id){return d.type}}return c};xiuxiu_<?php echo $t['tid']; ?>._apiTrack=function(a,c,b){if(a){a+=("_"+c);xiuxiu_<?php echo $t['tid']; ?>.unstatAPI.push(a)}if(xiuxiu_<?php echo $t['tid']; ?>.getEditor(c)&&xiuxiu_<?php echo $t['tid']; ?>.getEditor(c).apiTrack){if(xiuxiu_<?php echo $t['tid']; ?>.unstatAPI.length>0){xiuxiu_<?php echo $t['tid']; ?>.getEditor(c).apiTrack(xiuxiu_<?php echo $t['tid']; ?>.unstatAPI,Boolean(b));xiuxiu_<?php echo $t['tid']; ?>.unstatAPI=[]}}};(function(a){window.xiuxiu_<?php echo $t['tid']; ?>=window.xiuxiu_<?php echo $t['tid']; ?>||{};window.xiuxiu_<?php echo $t['tid']; ?>.stringify=a()})(function(){var d=Object.prototype.toString,b=function(e){return d.call(e)==="[object Array]"},a=function(e){return d.call(e)==="[object Object]"};function c(k){var j=[],g,e,f,h=false;if(b(k)){j.push("[");for(g=0,e=k.length;g<e;g++){f=c(k[g]);if(f!==1){h=true;j.push(f);j.push(",")}}if(h){j.pop()}j.push("]")}else{if(a(k)){j.push("{");for(g in k){f=c(k[g]);if(f!==1){h=true;j.push('"'+g+'":');j.push(f);j.push(",")}}if(h){j.pop()}j.push("}")}else{if(typeof k==="string"){j.push('"'+k+'"')}else{if(typeof k==="function"){return 1}else{j.push(k)}}}}return j.join("")}return c});
					xiuxiu_<?php echo $t['tid']; ?>.setLaunchVars("maxFinalWidth", 400);
					xiuxiu_<?php echo $t['tid']; ?>.setLaunchVars("maxFinalHeight", 400);
					xiuxiu_<?php echo $t['tid']; ?>.embedSWF("altContent_<?php echo $t['tid']; ?>",5,"100%","100%");
					/*第1个参数是加载编辑器div容器，第2个参数是编辑器类型，第3个参数是div容器宽，第4个参数是div容器高*/
					xiuxiu_<?php echo $t['tid']; ?>.setUploadURL("<?php echo $this->config->item('i_url'); ?>/space/upload/uploadhead_team?tid=<?php echo $t['tid']; ?>");//修改为上传接收图片程序地址
					xiuxiu_<?php echo $t['tid']; ?>.onBeforeUpload = function(data, id) {
	                    
					}
					xiuxiu_<?php echo $t['tid']; ?>.setUploadType(2);
					xiuxiu_<?php echo $t['tid']; ?>.onInit = function (){
						xiuxiu_<?php echo $t['tid']; ?>.loadPhoto("<?php echo $this->config->item('i_url'); ?>/space/upload/avatar?uid=<?php echo $t['tid'];  ?>&type=team");//修改为要处理的图片url;初始化的URL
					}
					xiuxiu_<?php echo $t['tid']; ?>.onUploadResponse = function (data){
				    	if(data == 'true'){
				    		$.layer($('#msgtmpl').html());
						}
					}	
				</script>
				
				
               <?php $i++;} ?>
              <?php } ?>
               <script>
                $(function(){
					var oMivs=$("#usr_setup");
					oMivs.find(".moute").delegate("span","click",function(){
					var obj = $("#usr_setup .usr_setup"),omv = oMivs.find(".moute span");
					var _this = $(this);
					obj.addClass("hide");
					omv.addClass("on").text("确定");
					if(_this.hasClass('on')){
						_this.removeClass('on').text("取消").parent().next().removeClass("hide");
					}else{
						_this.addClass('on').text("确定").parent().next().addClass("hide");
					}
					})
					
				});
                </script>
			</div>
			</div>
		</div>
		</div>
<script type="text/tmpl" id="msgtmpl">
	<dl class="pub-confirm">
		<dt>
			<strong class="f16px cOrange fY">编辑资料成功！</strong>
		</dt>
		<dd><a href="javascript:;void(0)" onclick="$.layer()">关闭</a><a href="javascript:;void(0)">继续编辑社团资料</a></dd>
	</dl>
</script>
<?php $this->load->view('public/footer.php'); ?>
