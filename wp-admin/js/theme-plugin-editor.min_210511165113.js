/*! This file is auto-generated */
window.wp||(window.wp={}),wp.themePluginEditor=function(i){"use strict";var t,o=wp.i18n.__,s=wp.i18n._n,n=wp.i18n.sprintf,r={codeEditor:{},instance:null,noticeElements:{},dirty:!1,lintErrors:[],init:function(e,t){r.form=e,t&&i.extend(r,t),r.noticeTemplate=wp.template("wp-file-editor-notice"),r.noticesContainer=r.form.find(".editor-notices"),r.submitButton=r.form.find(":input[name=submit]"),r.spinner=r.form.find(".submit .spinner"),r.form.on("submit",r.submit),r.textarea=r.form.find("#newcontent"),r.textarea.on("change",r.onChange),r.warning=i(".file-editor-warning"),r.docsLookUpButton=r.form.find("#docs-lookup"),r.docsLookUpList=r.form.find("#docs-list"),0<r.warning.length&&r.showWarning(),!1!==r.codeEditor&&_.defer(function(){r.initCodeEditor()}),i(r.initFileBrowser),i(window).on("beforeunload",function(){if(r.dirty)return o("The changes you made will be lost if you navigate away from this page.")}),r.docsLookUpList.on("change",function(){""===i(this).val()?r.docsLookUpButton.prop("disabled",!0):r.docsLookUpButton.prop("disabled",!1)})},showWarning:function(){var e=r.warning.find(".file-editor-warning-message").text();i("#wpwrap").attr("aria-hidden","true"),i(document.body).addClass("modal-open").append(r.warning.detach()),r.warning.removeClass("hidden").find(".file-editor-warning-go-back").focus(),r.warningTabbables=r.warning.find("a, button"),r.warningTabbables.on("keydown",r.constrainTabbing),r.warning.on("click",".file-editor-warning-dismiss",r.dismissWarning),setTimeout(function(){wp.a11y.speak(wp.sanitize.stripTags(e.replace(/\s+/g," ")),"assertive")},1e3)},constrainTabbing:function(e){var t,i;9===e.which&&(t=r.warningTabbables.first()[0],(i=r.warningTabbables.last()[0])!==e.target||e.shiftKey?t===e.target&&e.shiftKey&&(i.focus(),e.preventDefault()):(t.focus(),e.preventDefault()))},dismissWarning:function(){wp.ajax.post("dismiss-wp-pointer",{pointer:r.themeOrPlugin+"_editor_notice"}),r.warning.remove(),i("#wpwrap").removeAttr("aria-hidden"),i("body").removeClass("modal-open")},onChange:function(){r.dirty=!0,r.removeNotice("file_saved")},submit:function(e){var t={};e.preventDefault(),i.each(r.form.serializeArray(),function(){t[this.name]=this.value}),r.instance&&(t.newcontent=r.instance.codemirror.getValue()),r.isSaving||(r.lintErrors.length?r.instance.codemirror.setCursor(r.lintErrors[0].from.line):(r.isSaving=!0,r.textarea.prop("readonly",!0),r.instance&&r.instance.codemirror.setOption("readOnly",!0),r.spinner.addClass("is-active"),e=wp.ajax.post("edit-theme-plugin-file",t),r.lastSaveNoticeCode&&r.removeNotice(r.lastSaveNoticeCode),e.done(function(e){r.lastSaveNoticeCode="file_saved",r.addNotice({code:r.lastSaveNoticeCode,type:"success",message:e.message,dismissible:!0}),r.dirty=!1}),e.fail(function(e){e=i.extend({code:"save_error",message:o("Something went wrong. Your change may not have been saved. Please try again. There is also a chance that you may need to manually fix and upload the file over FTP.")},e,{type:"error",dismissible:!0});r.lastSaveNoticeCode=e.code,r.addNotice(e)}),e.always(function(){r.spinner.removeClass("is-active"),r.isSaving=!1,r.textarea.prop("readonly",!1),r.instance&&r.instance.codemirror.setOption("readOnly",!1)})))},addNotice:function(e){var t;if(!e.code)throw new Error("Missing code.");return r.removeNotice(e.code),(t=i(r.noticeTemplate(e))).hide(),t.find(".notice-dismiss").on("click",function(){r.removeNotice(e.code),e.onDismiss&&e.onDismiss(e)}),wp.a11y.speak(e.message),r.noticesContainer.append(t),t.slideDown("fast"),r.noticeElements[e.code]=t},removeNotice:function(e){return!!r.noticeElements[e]&&(r.noticeElements[e].slideUp("fast",function(){i(this).remove()}),delete r.noticeElements[e],!0)},initCodeEditor:function(){var e,t=i.extend({},r.codeEditor);t.onTabPrevious=function(){i("#templateside").find(":tabbable").last().focus()},t.onTabNext=function(){i("#template").find(":tabbable:not(.CodeMirror-code)").first().focus()},t.onChangeLintingErrors=function(e){0===(r.lintErrors=e).length&&r.submitButton.toggleClass("disabled",!1)},t.onUpdateErrorNotice=function(e){r.submitButton.toggleClass("disabled",0<e.length),0!==e.length?r.addNotice({code:"lint_errors",type:"error",message:n(s("There is %s error which must be fixed before you can update this file.","There are %s errors which must be fixed before you can update this file.",e.length),String(e.length)),dismissible:!1}).find("input[type=checkbox]").on("click",function(){t.onChangeLintingErrors([]),r.removeNotice("lint_errors")}):r.removeNotice("lint_errors")},(e=wp.codeEditor.initialize(i("#newcontent"),t)).codemirror.on("change",r.onChange),i(e.codemirror.display.lineDiv).attr({role:"textbox","aria-multiline":"true","aria-labelledby":"theme-plugin-editor-label","aria-describedby":"editor-keyboard-trap-help-1 editor-keyboard-trap-help-2 editor-keyboard-trap-help-3 editor-keyboard-trap-help-4"}),i("#theme-plugin-editor-label").on("click",function(){e.codemirror.focus()}),r.instance=e},initFileBrowser:function(){var e=i("#templateside");e.find('[role="group"]').parent().attr("aria-expanded",!1),e.find(".notice").parents("[aria-expanded]").attr("aria-expanded",!0),e.find('[role="tree"]').each(function(){new t(this).init()}),e.find(".current-file:first").each(function(){this.scrollIntoViewIfNeeded?this.scrollIntoViewIfNeeded():this.scrollIntoView(!1)})}},a=(e.prototype.init=function(){this.domNode.tabIndex=-1,this.domNode.getAttribute("role")||this.domNode.setAttribute("role","treeitem"),this.domNode.addEventListener("keydown",this.handleKeydown.bind(this)),this.domNode.addEventListener("click",this.handleClick.bind(this)),this.domNode.addEventListener("focus",this.handleFocus.bind(this)),this.domNode.addEventListener("blur",this.handleBlur.bind(this)),this.isExpandable?(this.domNode.firstElementChild.addEventListener("mouseover",this.handleMouseOver.bind(this)),this.domNode.firstElementChild.addEventListener("mouseout",this.handleMouseOut.bind(this))):(this.domNode.addEventListener("mouseover",this.handleMouseOver.bind(this)),this.domNode.addEventListener("mouseout",this.handleMouseOut.bind(this)))},e.prototype.isExpanded=function(){return!!this.isExpandable&&"true"===this.domNode.getAttribute("aria-expanded")},e.prototype.handleKeydown=function(e){e.currentTarget;var t=!1,i=e.key;function o(e){return 1===e.length&&e.match(/\S/)}function s(e){"*"==i?(e.tree.expandAllSiblingItems(e),t=!0):o(i)&&(e.tree.setFocusByFirstCharacter(e,i),t=!0)}if(this.stopDefaultClick=!1,!(e.altKey||e.ctrlKey||e.metaKey)){if(e.shift)e.keyCode==this.keyCode.SPACE||e.keyCode==this.keyCode.RETURN?(e.stopPropagation(),this.stopDefaultClick=!0):o(i)&&s(this);else switch(e.keyCode){case this.keyCode.SPACE:case this.keyCode.RETURN:this.isExpandable?(this.isExpanded()?this.tree.collapseTreeitem(this):this.tree.expandTreeitem(this),t=!0):(e.stopPropagation(),this.stopDefaultClick=!0);break;case this.keyCode.UP:this.tree.setFocusToPreviousItem(this),t=!0;break;case this.keyCode.DOWN:this.tree.setFocusToNextItem(this),t=!0;break;case this.keyCode.RIGHT:this.isExpandable&&(this.isExpanded()?this.tree.setFocusToNextItem(this):this.tree.expandTreeitem(this)),t=!0;break;case this.keyCode.LEFT:this.isExpandable&&this.isExpanded()?(this.tree.collapseTreeitem(this),t=!0):this.inGroup&&(this.tree.setFocusToParentItem(this),t=!0);break;case this.keyCode.HOME:this.tree.setFocusToFirstItem(),t=!0;break;case this.keyCode.END:this.tree.setFocusToLastItem(),t=!0;break;default:o(i)&&s(this)}t&&(e.stopPropagation(),e.preventDefault())}},e.prototype.handleClick=function(e){e.target!==this.domNode&&e.target!==this.domNode.firstElementChild||this.isExpandable&&(this.isExpanded()?this.tree.collapseTreeitem(this):this.tree.expandTreeitem(this),e.stopPropagation())},e.prototype.handleFocus=function(e){var t=this.domNode;(t=this.isExpandable?t.firstElementChild:t).classList.add("focus")},e.prototype.handleBlur=function(e){var t=this.domNode;(t=this.isExpandable?t.firstElementChild:t).classList.remove("focus")},e.prototype.handleMouseOver=function(e){e.currentTarget.classList.add("hover")},e.prototype.handleMouseOut=function(e){e.currentTarget.classList.remove("hover")},e);function e(e,t,i){if("object"==typeof e){e.tabIndex=-1,this.tree=t,this.groupTreeitem=i,this.domNode=e,this.label=e.textContent.trim(),this.stopDefaultClick=!1,e.getAttribute("aria-label")&&(this.label=e.getAttribute("aria-label").trim()),this.isExpandable=!1,this.isVisible=!1,this.inGroup=!1,i&&(this.inGroup=!0);for(var o=e.firstElementChild;o;){if("ul"==o.tagName.toLowerCase()){o.setAttribute("role","group"),this.isExpandable=!0;break}o=o.nextElementSibling}this.keyCode=Object.freeze({RETURN:13,SPACE:32,PAGEUP:33,PAGEDOWN:34,END:35,HOME:36,LEFT:37,UP:38,RIGHT:39,DOWN:40})}}function d(e){"object"==typeof e&&(this.domNode=e,this.treeitems=[],this.firstChars=[],this.firstTreeitem=null,this.lastTreeitem=null)}return d.prototype.init=function(){this.domNode.getAttribute("role")||this.domNode.setAttribute("role","tree"),function e(t,i,o){for(var s=t.firstElementChild,n=o;s;)("li"===s.tagName.toLowerCase()&&"span"===s.firstElementChild.tagName.toLowerCase()||"a"===s.tagName.toLowerCase())&&((n=new a(s,i,o)).init(),i.treeitems.push(n),i.firstChars.push(n.label.substring(0,1).toLowerCase())),s.firstElementChild&&e(s,i,n),s=s.nextElementSibling}(this.domNode,this,!1),this.updateVisibleTreeitems(),this.firstTreeitem.domNode.tabIndex=0},d.prototype.setFocusToItem=function(e){for(var t=0;t<this.treeitems.length;t++){var i=this.treeitems[t];i===e?(i.domNode.tabIndex=0,i.domNode.focus()):i.domNode.tabIndex=-1}},d.prototype.setFocusToNextItem=function(e){for(var t=!1,i=this.treeitems.length-1;0<=i;i--){var o=this.treeitems[i];if(o===e)break;o.isVisible&&(t=o)}t&&this.setFocusToItem(t)},d.prototype.setFocusToPreviousItem=function(e){for(var t=!1,i=0;i<this.treeitems.length;i++){var o=this.treeitems[i];if(o===e)break;o.isVisible&&(t=o)}t&&this.setFocusToItem(t)},d.prototype.setFocusToParentItem=function(e){e.groupTreeitem&&this.setFocusToItem(e.groupTreeitem)},d.prototype.setFocusToFirstItem=function(){this.setFocusToItem(this.firstTreeitem)},d.prototype.setFocusToLastItem=function(){this.setFocusToItem(this.lastTreeitem)},d.prototype.expandTreeitem=function(e){e.isExpandable&&(e.domNode.setAttribute("aria-expanded",!0),this.updateVisibleTreeitems())},d.prototype.expandAllSiblingItems=function(e){for(var t=0;t<this.treeitems.length;t++){var i=this.treeitems[t];i.groupTreeitem===e.groupTreeitem&&i.isExpandable&&this.expandTreeitem(i)}},d.prototype.collapseTreeitem=function(e){var t=!1;(t=e.isExpanded()?e:e.groupTreeitem)&&(t.domNode.setAttribute("aria-expanded",!1),this.updateVisibleTreeitems(),this.setFocusToItem(t))},d.prototype.updateVisibleTreeitems=function(){this.firstTreeitem=this.treeitems[0];for(var e=0;e<this.treeitems.length;e++){var t=this.treeitems[e],i=t.domNode.parentNode;for(t.isVisible=!0;i&&i!==this.domNode;)"false"==i.getAttribute("aria-expanded")&&(t.isVisible=!1),i=i.parentNode;t.isVisible&&(this.lastTreeitem=t)}},d.prototype.setFocusByFirstCharacter=function(e,t){t=t.toLowerCase(),(e=this.treeitems.indexOf(e)+1)===this.treeitems.length&&(e=0),-1<(e=-1===(e=this.getIndexFirstChars(e,t))?this.getIndexFirstChars(0,t):e)&&this.setFocusToItem(this.treeitems[e])},d.prototype.getIndexFirstChars=function(e,t){for(var i=e;i<this.firstChars.length;i++)if(this.treeitems[i].isVisible&&t===this.firstChars[i])return i;return-1},t=d,r}(jQuery),wp.themePluginEditor.l10n=wp.themePluginEditor.l10n||{saveAlert:"",saveError:"",lintError:{alternative:"wp.i18n",func:function(){return{singular:"",plural:""}}}},wp.themePluginEditor.l10n=window.wp.deprecateL10nObject("wp.themePluginEditor.l10n",wp.themePluginEditor.l10n,"5.5.0");