/*! This file is auto-generated */
!function(t){"use strict";var a=wp.media.view.MediaFrame.AudioDetails.extend({createStates:function(){this.states.add([new wp.media.controller.AudioDetails({media:this.media}),new wp.media.controller.MediaLibrary({type:"audio",id:"add-audio-source",title:wp.media.view.l10n.audioAddSourceTitle,toolbar:"add-audio-source",media:this.media,menu:!1})])}}),e=t.MediaWidgetModel.extend({}),d=t.MediaWidgetControl.extend({showDisplaySettings:!1,mapModelToMediaFrameProps:function(e){e=t.MediaWidgetControl.prototype.mapModelToMediaFrameProps.call(this,e);return e.link="embed",e},renderPreview:function(){var e,t=this,d=t.model.get("attachment_id"),a=t.model.get("url");(d||a)&&(e=t.$el.find(".media-widget-preview"),d=wp.template("wp-media-widget-audio-preview"),e.html(d({model:{attachment_id:t.model.get("attachment_id"),src:a},error:t.model.get("error")})),wp.mediaelement.initialize())},editMedia:function(){var t=this,e=t.mapModelToMediaFrameProps(t.model.toJSON()),d=new a({frame:"audio",state:"audio-details",metadata:e});(wp.media.frame=d).$el.addClass("media-widget"),e=function(e){t.selectedAttachment.set(e),t.model.set(_.extend(t.model.defaults(),t.mapMediaToModelProps(e),{error:!1}))},d.state("audio-details").on("update",e),d.state("replace-audio").on("replace",e),d.on("close",function(){d.detach()}),d.open()}});t.controlConstructors.media_audio=d,t.modelConstructors.media_audio=e}(wp.mediaWidgets);