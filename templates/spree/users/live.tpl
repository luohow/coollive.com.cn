
<!DOCTYPE html>
<html>
<head>
    <title>酷Live-直播平台</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/templates/spree/players/css/bootstrap.min.css"/>
    <script type="text/javascript" src="/templates/spree/players/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="/templates/spree/players/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/templates/spree/players/js/swfobject.js"></script>
    <script type="text/javascript" src="/templates/spree/players/js/json2.js"></script>
    <script type="text/javascript" src="/templates/spree/players/js/srs.page.js"></script>
    <script type="text/javascript" src="/templates/spree/players/js/srs.log.js"></script>
    <script type="text/javascript" src="/templates/spree/players/js/srs.player.js"></script>
    <script type="text/javascript" src="/templates/spree/players/js/srs.publisher.js"></script>
    <script type="text/javascript" src="/templates/spree/players/js/srs.utility.js"></script>
    <style>
        body{
            padding-top: 55px;
        }
    </style>
    <script type="text/javascript">
        var srs_publisher = null;
        var remote_player = null;
        var realtime_player = null;

        var _rid = <?php echo intval($rid);?>;
        var _server = "<?php echo $live['config']['server'];?>";
        var _port   = <?php echo $live['config']['port'];?>;
        var _vhost  = "<?php echo $live['config']['vhost'];?>";
        var _app    = "<?php echo $live['config']['app'];?>";
        var _stream = "<?php echo $live['config']['stream'];?>";

        var query = parse_query_string();
        $(function(){
            // get the vhost and port to set the default url.
            // for example: http://192.168.1.213/players/jwplayer6.html?port=1935&vhost=demo
            // url set to: rtmp://demo:1935/live/livestream
            srs_init("#txt_url", null, null);

            if (query.agent == "true") {
                document.write(navigator.userAgent);
                return;
            }

            $("#btn_video_settings").click(function(){
                $("#video_modal").modal({show:true});
            });
            $("#btn_audio_settings").click(function(){
                $("#audio_modal").modal({show:true});
            });

            $("#remote_tips").tooltip({
                title: "为了支持HLS输出，FLASH编码器输出的流需要经过转码(VP6=>H264,MP3=>aac)，所以会黑屏较长时间，请耐心等待"
            });
            $("#low_latecy_tips").tooltip({
                title: "服务器不转码直接转发FLASH编码器的流，所以延迟比支持HLS的流要低很多"
            });
            $("#realtime_player_url").tooltip({
                title: "右键复制RTMP地址"
            });
            $("#remote_player_url").tooltip({
                title: "右键复制RTMP地址"
            });

            $("#btn_publish").click(on_user_publish);

            // for publish, we use randome stream name.
            $("#txt_url").val($("#txt_url").val());

            // start the publisher.
            srs_publisher = new SrsPublisher("local_publisher", 430, 185);
            srs_publisher.on_publisher_ready = function(cameras, microphones) {
                srs_publisher_initialize_page(
                        cameras, microphones,
                        "#sl_cameras", "#sl_microphones",
                        "#sl_vcodec", "#sl_profile", "#sl_level", "#sl_gop", "#sl_size",
                        "#sl_fps", "#sl_bitrate",
                        "#sl_acodec"
                );
            };
            srs_publisher.on_publisher_error = function(code, desc) {
                if (!on_publish_stop()) {
                    return;
                }
                error(code, desc + "请重试。");
            };
            srs_publisher.on_publisher_warn = function(code, desc) {
                warn(code, desc);
            };
            srs_publisher.start();

            update_play_url();

            // if no play specified, donot show the player, for debug the publisher.
            if (query.no_play != "true") {
                // start the normal player with HLS supported.
                remote_player = new SrsPlayer("remote_player", 430, 185);
                remote_player.on_player_ready = function() {
                    this.set_bt(0.8);
                };
                remote_player.on_player_metadata = function(metadata) {
                    this.set_dar(0, 0);
                    this.set_fs("screen", 100);
                }
                remote_player.start();

                // start the realtime player.
                realtime_player = new SrsPlayer("realtime_player", 430, 185);
                realtime_player.on_player_ready = function() {
                    this.set_bt(0.8);
                };
                realtime_player.on_player_metadata = function(metadata) {
                    this.set_dar(0, 0);
                    this.set_fs("screen", 100);
                }
                realtime_player.start();
            }
        });

        function on_publish_stop() {
            if (!srs_can_republish()) {
                $("#btn_join").attr("disabled", true);
                error(0, "您使用的浏览器很弱，请关闭页面后重新打开页面（刷新也不管用）。<br/>推荐使用Chrome/Firefox/Safari/Opera浏览器，支持重试");

                srs_log_disabled = true;
                return false;
            }

            return true;
        }

        /**
         * we generate the transcoded stream url for flash publish donot support HLS
         * which requires aac, so the publish vhost maybe players for example, we
         * use players_pub vhost(transcoded stream to which) for all clients,
         * both players and players_pub are write HLS to the sample dir,
         * it's ok for the players vhost disabled the HLS, only the
         * players_pub enalbed HLS.
         */
        function update_play_url() {
            var url = $("#txt_url").val();
            var ret = srs_parse_rtmp_url(url);

            var remote_url = "rtmp://" + ret.server + ":" + ret.port + "/" + ret.app + "...vhost..." + srs_get_player_publish_vhost(ret.vhost) + "/" + ret.stream;
            $("#realtime_player_url").attr("href", url).attr("target", "_blank");
            $("#remote_player_url").attr("href", remote_url).attr("target", "_blank");

            var srs_player_url = "http://" + query.host + query.dir + "/srs_player.html?";
            srs_player_url += "vhost=" + srs_get_player_publish_vhost(ret.vhost) + "&port=" + ret.port + "&app=" + ret.app + "&stream=" + ret.stream;
            srs_player_url += "&autostart=true";

            var srs_player_rt_url = "http://" + query.host + query.dir + "/srs_player.html?";
            srs_player_rt_url += "vhost=" + ret.vhost + "&port=" + ret.port + "&app=" + ret.app + "&stream=" + ret.stream;
            srs_player_rt_url += "&autostart=true";

            var jwplayer_url = "http://" + query.host + query.dir + "/jwplayer6.html?";
            jwplayer_url += "vhost=" + srs_get_player_publish_vhost(ret.vhost) + "&port=" + ret.port + "&app=" + ret.app + "&stream=" + ret.stream;
            jwplayer_url += "&hls_autostart=true";

            var hls_url = "http://" + ret.server + ":" + query.http_port + "/" + ret.app + "/" + ret.stream + ".m3u8";

            $("#txt_play_realtime").text("RTMP低延时(点击打开)").attr("href", srs_player_rt_url).attr("target", "_blank");
            $("#txt_play_url").text("RTMP已转码(点击打开)").attr("href", srs_player_url).attr("target", "_blank");
            $("#txt_play_hls").text("HLS-m3u8(点击打开或右键复制)").attr("href", hls_url).attr("target", "_blank");
            $("#txt_play_jwplayer").text("HLS-JWPlayer(点击打开)").attr("href", jwplayer_url).attr("target", "_blank");
        }
        function on_user_publish() {
            if ($("#btn_publish").text() == "停止发布") {
                srs_publisher.stop();
                $("#btn_publish").text("发布视频");
                //$("#txt_play_realtime").text("RTMP低延时(请发布视频)").attr("href", "#").attr("target", "_self");
                //$("#txt_play_realtime").attr("href", "#").attr("target", "_self");
                //$("#txt_play_url").text("RTMP已转码(请发布视频)").attr("href", "#").attr("target", "_self");
                //$("#remote_player_url").attr("href", "#").attr("target", "_self");
                //$("#txt_play_hls").text("HLS-m3u8(请发布视频)").attr("href", "#").attr("target", "_self");
                //$("#txt_play_jwplayer").text("HLS-JWPlayer(请发布视频)").attr("href", "#").attr("target", "_self");

                changeLiveState(_rid, 'stop');
                if (!on_publish_stop()) {
                    return;
                }
                return;
            }

            $("#btn_publish").text("停止发布");

            update_play_url();

            var url = $("#txt_url").val();
            var vcodec = {};
            var acodec = {};
            srs_publiser_get_codec(
                    vcodec, acodec,
                    "#sl_cameras", "#sl_microphones",
                    "#sl_vcodec", "#sl_profile", "#sl_level", "#sl_gop", "#sl_size",
                    "#sl_fps", "#sl_bitrate",
                    "#sl_acodec"
            );

            info("开始推流到服务器");
            srs_publisher.publish(url, vcodec, acodec);

            if (realtime_player) {
                // directly play the url for the realtime player.
                realtime_player.stop();
                realtime_player.play(url);
            }

            if (remote_player) {
                // the normal player should play the transcoded stream in another vhost.
                // for example, publish stream to vhost players,
                // the realtime player play the vhost players, which may donot support HLS,
                // the normal player play the vhost players_pub, which transcoded to h264/aac with HLS.
                var ret = srs_parse_rtmp_url(url);
                var pub_url = "rtmp://" + ret.server + ":" + ret.port + "/" + ret.app;
                pub_url += "?vhost=" + srs_get_player_publish_vhost(ret.vhost) + "/" + ret.stream;
                remote_player.stop();
                remote_player.play(pub_url);
            }

            changeLiveState(_rid, 'start');
        }

        function changeLiveState(rid, state) {
            if(state == 'start') {
                state = 1;
            }else {
                state = 0;
            }
            $.post('/user/live/state_act',
                    {'rid':rid, 'state':state},
                    function (ret) {
                        console.log("p:"+rid+",response:"+ret.result);
                    },
                    "json");
        }
    </script>
</head>
<body>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a id="srs_index" class="brand" href="#">酷Live</a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li class="active"><a id="nav_srs_publisher" href="srs_publisher.html">直播</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="alert alert-info fade in" id="txt_log">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong><span id="txt_log_title">Usage:</span></strong>
        <span id="txt_log_msg">设置编码参数，点“发布视频”，允许Flash访问摄像头即可推流</span>
    </div>
    <div class="control-group">
        <div class="form-inline">
            <button class="btn" id="btn_video_settings">视频编码配置</button>
            <button class="btn" id="btn_audio_settings">音频编码配置</button>
        </div>
    </div>
    <div class="control-group">
        <div class="form-inline">
            <!--
            发布地址:
            -->
            <input type="text" id="txt_url" class="input-xxlarge" value=""></input>
            <button class="btn btn-primary" id="btn_publish">发布视频</button>
        </div>
    </div>
    <!--
    <div class="control-group">
        <div class="form-inline">
            播放地址
            1.<a id="txt_play_realtime" class="input-xxlarge" href="#">RTMP低延时(请发布视频)</a>
            2.<a id="txt_play_url" class="input-xxlarge" href="#">RTMP已转码(请发布视频)</a>
            3.<a id="txt_play_hls" class="input-xxlarge" href="#">HLS-m3u8(请发布视频)</a>
            4.<a id="txt_play_jwplayer" class="input-xxlarge" href="#">HLS-JWPlayer(请发布视频)</a>
        </div>
    </div>
    -->
    <div id="video_modal" class="modal hide fade">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3>视频编码</h3>
        </div>
        <div class="modal-body">
            <div class="form-horizontal">
                <div class="control-group">
                    <label class="control-label" for="sl_cameras">
                        摄像头
                        <a id="sl_cameras_tips" href="#" data-toggle="tooltip" data-placement="right" title="">
                            <img src="/templates/spree/players/img/tooltip.png"/>
                        </a>
                    </label>
                    <div class="controls">
                        <select class="span4" id="sl_cameras"></select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="sl_vcodec">
                        Codec
                        <a id="sl_cameras_tips" href="#" data-toggle="tooltip" data-placement="right" title="">
                            <img src="/templates/spree/players/img/tooltip.png"/>
                        </a>
                    </label>
                    <div class="controls">
                        <select class="span2" id="sl_vcodec"></select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="sl_profile">
                        Profile
                        <a id="sl_profile_tips" href="#" data-toggle="tooltip" data-placement="right" title="">
                            <img src="/templates/spree/players/img/tooltip.png"/>
                        </a>
                    </label>
                    <div class="controls">
                        <select class="span2" id="sl_profile"></select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="sl_level">
                        Level
                        <a id="sl_level_tips" href="#" data-toggle="tooltip" data-placement="right" title="">
                            <img src="/templates/spree/players/img/tooltip.png"/>
                        </a>
                    </label>
                    <div class="controls">
                        <select class="span2" id="sl_level"></select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="sl_gop">
                        GOP
                        <a id="sl_gop_tips" href="#" data-toggle="tooltip" data-placement="right" title="">
                            <img src="/templates/spree/players/img/tooltip.png"/>
                        </a>
                    </label>
                    <div class="controls">
                        <select class="span2" id="sl_gop"></select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="sl_size">
                        尺寸
                        <a id="sl_size_tips" href="#" data-toggle="tooltip" data-placement="right" title="">
                            <img src="/templates/spree/players/img/tooltip.png"/>
                        </a>
                    </label>
                    <div class="controls">
                        <select class="span2" id="sl_size"></select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="sl_fps">
                        帧率
                        <a id="sl_fps_tips" href="#" data-toggle="tooltip" data-placement="right" title="">
                            <img src="/templates/spree/players/img/tooltip.png"/>
                        </a>
                    </label>
                    <div class="controls">
                        <select class="span2" id="sl_fps"></select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="sl_bitrate">
                        码率
                        <a id="sl_bitrate_tips" href="#" data-toggle="tooltip" data-placement="right" title="">
                            <img src="/templates/spree/players/img/tooltip.png"/>
                        </a>
                    </label>
                    <div class="controls">
                        <select class="span2" id="sl_bitrate"></select>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">设置</button>
        </div>
    </div>
    <div id="audio_modal" class="modal hide fade">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3>音频编码</h3>
        </div>
        <div class="modal-body">
            <div class="form-horizontal">
                <div class="control-group">
                    <label class="control-label" for="sl_microphones">
                        麦克风
                        <a id="worker_id_tips" href="#" data-toggle="tooltip" data-placement="right" title="">
                            <img src="/templates/spree/players/img/tooltip.png"/>
                        </a>
                    </label>
                    <div class="controls">
                        <select class="span4" id="sl_microphones"></select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="sl_acodec">
                        编码
                        <a id="sl_acodec_tips" href="#" data-toggle="tooltip" data-placement="right" title="">
                            <img src="/templates/spree/players/img/tooltip.png"/>
                        </a>
                    </label>
                    <div class="controls">
                        <select class="span2" id="sl_acodec"></select>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">设置</button>
        </div>
    </div>
    <div class="container">
        <div class="row-fluid">
            <div class="span6">
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <span class="accordion-toggle">
                            <strong>本地摄像头</strong>
                        </span>
                    </div>
                    <div class="accordion-body collapse in">
                        <div class="accordion-inner">
                            <div id="local_publisher"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="span6">
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <span class="accordion-toggle">
                            <strong>远程服务器</strong>
                            <a id="remote_tips" href="#" data-toggle="tooltip" data-placement="top" title="">
                                黑屏<img src="/templates/spree/players/img/tooltip.png"/>
                            </a>
                            <a id="remote_player_url" href="#" data-toggle="tooltip" data-placement="top" title="">
                                播放地址<img src="/templates/spree/players/img/tooltip.png"/>
                            </a>
                        </span>
                    </div>
                    <div class="accordion-body collapse in">
                        <div class="accordion-inner">
                            <div id="remote_player"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row-fluid">
            <div class="span6">
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <span class="accordion-toggle">
                            <strong>远程服务器</strong>
                            <a id="low_latecy_tips" href="#" data-toggle="tooltip" data-placement="top" title="">
                                低延时<img src="/templates/spree/players/img/tooltip.png"/>
                            </a>
                            <a id="realtime_player_url" href="#" data-toggle="tooltip" data-placement="top" title="">
                                播放地址<img src="/templates/spree/players/img/tooltip.png"/>
                            </a>
                        </span>
                    </div>
                    <div class="accordion-body collapse in">
                        <div class="accordion-inner">
                            <div id="realtime_player"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="span6">
            </div>
        </div>
    </div>
    <footer>
    </footer>
</div>
</body>
