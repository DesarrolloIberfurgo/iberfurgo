/*! This file is auto-generated */
!function(N,W){var $=N(document),Q=N(W),H=N(document.body),V=wp.i18n.__,i=wp.i18n.sprintf;function r(e,t,n){t=void 0!==n?i(V("%1$s is deprecated since version %2$s! Use %3$s instead."),e,t,n):i(V("%1$s is deprecated since version %2$s with no alternative available."),e,t);W.console.warn(t)}function e(i,o,s){var a={};return Object.keys(o).forEach(function(e){var t=o[e],n=i+"."+e;"object"==typeof t?Object.defineProperty(a,e,{get:function(){return r(n,s,t.alternative),t.func()}}):Object.defineProperty(a,e,{get:function(){return r(n,s,"wp.i18n"),t}})}),a}W.wp.deprecateL10nObject=e,W.commonL10n=W.commonL10n||{warnDelete:"",dismiss:"",collapseMenu:"",expandMenu:""},W.commonL10n=e("commonL10n",W.commonL10n,"5.5.0"),W.wpPointerL10n=W.wpPointerL10n||{dismiss:""},W.wpPointerL10n=e("wpPointerL10n",W.wpPointerL10n,"5.5.0"),W.userProfileL10n=W.userProfileL10n||{warn:"",warnWeak:"",show:"",hide:"",cancel:"",ariaShow:"",ariaHide:""},W.userProfileL10n=e("userProfileL10n",W.userProfileL10n,"5.5.0"),W.privacyToolsL10n=W.privacyToolsL10n||{noDataFound:"",foundAndRemoved:"",noneRemoved:"",someNotRemoved:"",removalError:"",emailSent:"",noExportFile:"",exportError:""},W.privacyToolsL10n=e("privacyToolsL10n",W.privacyToolsL10n,"5.5.0"),W.authcheckL10n={beforeunload:""},W.authcheckL10n=W.authcheckL10n||e("authcheckL10n",W.authcheckL10n,"5.5.0"),W.tagsl10n={noPerm:"",broken:""},W.tagsl10n=W.tagsl10n||e("tagsl10n",W.tagsl10n,"5.5.0"),W.adminCommentsL10n=W.adminCommentsL10n||{hotkeys_highlight_first:{alternative:"window.adminCommentsSettings.hotkeys_highlight_first",func:function(){return W.adminCommentsSettings.hotkeys_highlight_first}},hotkeys_highlight_last:{alternative:"window.adminCommentsSettings.hotkeys_highlight_last",func:function(){return W.adminCommentsSettings.hotkeys_highlight_last}},replyApprove:"",reply:"",warnQuickEdit:"",warnCommentChanges:"",docTitleComments:"",docTitleCommentsCount:""},W.adminCommentsL10n=e("adminCommentsL10n",W.adminCommentsL10n,"5.5.0"),W.tagsSuggestL10n=W.tagsSuggestL10n||{tagDelimiter:"",removeTerm:"",termSelected:"",termAdded:"",termRemoved:""},W.tagsSuggestL10n=e("tagsSuggestL10n",W.tagsSuggestL10n,"5.5.0"),W.wpColorPickerL10n=W.wpColorPickerL10n||{clear:"",clearAriaLabel:"",defaultString:"",defaultAriaLabel:"",pick:"",defaultLabel:""},W.wpColorPickerL10n=e("wpColorPickerL10n",W.wpColorPickerL10n,"5.5.0"),W.attachMediaBoxL10n=W.attachMediaBoxL10n||{error:""},W.attachMediaBoxL10n=e("attachMediaBoxL10n",W.attachMediaBoxL10n,"5.5.0"),W.postL10n=W.postL10n||{ok:"",cancel:"",publishOn:"",publishOnFuture:"",publishOnPast:"",dateFormat:"",showcomm:"",endcomm:"",publish:"",schedule:"",update:"",savePending:"",saveDraft:"",private:"",public:"",publicSticky:"",password:"",privatelyPublished:"",published:"",saveAlert:"",savingText:"",permalinkSaved:""},W.postL10n=e("postL10n",W.postL10n,"5.5.0"),W.inlineEditL10n=W.inlineEditL10n||{error:"",ntdeltitle:"",notitle:"",comma:"",saved:""},W.inlineEditL10n=e("inlineEditL10n",W.inlineEditL10n,"5.5.0"),W.plugininstallL10n=W.plugininstallL10n||{plugin_information:"",plugin_modal_label:"",ays:""},W.plugininstallL10n=e("plugininstallL10n",W.plugininstallL10n,"5.5.0"),W.navMenuL10n=W.navMenuL10n||{noResultsFound:"",warnDeleteMenu:"",saveAlert:"",untitled:""},W.navMenuL10n=e("navMenuL10n",W.navMenuL10n,"5.5.0"),W.commentL10n=W.commentL10n||{submittedOn:"",dateFormat:""},W.commentL10n=e("commentL10n",W.commentL10n,"5.5.0"),W.setPostThumbnailL10n=W.setPostThumbnailL10n||{setThumbnail:"",saving:"",error:"",done:""},W.setPostThumbnailL10n=e("setPostThumbnailL10n",W.setPostThumbnailL10n,"5.5.0"),W.adminMenu={init:function(){},fold:function(){},restoreMenuState:function(){},toggle:function(){},favorites:function(){}},W.columns={init:function(){var n=this;N(".hide-column-tog","#adv-settings").click(function(){var e=N(this),t=e.val();e.prop("checked")?n.checked(t):n.unchecked(t),columns.saveManageColumnsState()})},saveManageColumnsState:function(){var e=this.hidden();N.post(ajaxurl,{action:"hidden-columns",hidden:e,screenoptionnonce:N("#screenoptionnonce").val(),page:pagenow})},checked:function(e){N(".column-"+e).removeClass("hidden"),this.colSpanChange(1)},unchecked:function(e){N(".column-"+e).addClass("hidden"),this.colSpanChange(-1)},hidden:function(){return N(".manage-column[id]").filter(".hidden").map(function(){return this.id}).get().join(",")},useCheckboxesForHidden:function(){this.hidden=function(){return N(".hide-column-tog").not(":checked").map(function(){var e=this.id;return e.substring(e,e.length-5)}).get().join(",")}},colSpanChange:function(e){var t=N("table").find(".colspanchange");t.length&&(e=parseInt(t.attr("colspan"),10)+e,t.attr("colspan",e.toString()))}},$.ready(function(){columns.init()}),W.validateForm=function(e){return!N(e).find(".form-required").filter(function(){return""===N(":input:visible",this).val()}).addClass("form-invalid").find(":input:visible").change(function(){N(this).closest(".form-invalid").removeClass("form-invalid")}).length},W.showNotice={warn:function(){return!!confirm(V("You are about to permanently delete these items from your site.\nThis action cannot be undone.\n'Cancel' to stop, 'OK' to delete."))},note:function(e){alert(e)}},W.screenMeta={element:null,toggles:null,page:null,init:function(){this.element=N("#screen-meta"),this.toggles=N("#screen-meta-links").find(".show-settings"),this.page=N("#wpcontent"),this.toggles.click(this.toggleEvent)},toggleEvent:function(){var e=N("#"+N(this).attr("aria-controls"));e.length&&(e.is(":visible")?screenMeta.close(e,N(this)):screenMeta.open(e,N(this)))},open:function(e,t){N("#screen-meta-links").find(".screen-meta-toggle").not(t.parent()).css("visibility","hidden"),e.parent().show(),e.slideDown("fast",function(){e.focus(),t.addClass("screen-meta-active").attr("aria-expanded",!0)}),$.trigger("screen:options:open")},close:function(e,t){e.slideUp("fast",function(){t.removeClass("screen-meta-active").attr("aria-expanded",!1),N(".screen-meta-toggle").css("visibility",""),e.parent().hide()}),$.trigger("screen:options:close")}},N(".contextual-help-tabs").delegate("a","click",function(e){var t=N(this);if(e.preventDefault(),t.is(".active a"))return!1;N(".contextual-help-tabs .active").removeClass("active"),t.parent("li").addClass("active"),t=N(t.attr("href")),N(".help-tab-content").not(t).removeClass("active").hide(),t.addClass("active").show()});var t,s=!1,a=N("#permalink_structure"),n=N(".permalink-structure input:radio"),l=N("#custom_selection"),o=N(".form-table.permalink-structure .available-structure-tags button");function c(e){-1!==a.val().indexOf(e.text().trim())?(e.attr("data-label",e.attr("aria-label")),e.attr("aria-label",e.attr("data-used")),e.attr("aria-pressed",!0),e.addClass("active")):e.attr("data-label")&&(e.attr("aria-label",e.attr("data-label")),e.attr("aria-pressed",!1),e.removeClass("active"))}function d(){$.trigger("wp-window-resized")}n.on("change",function(){"custom"!==this.value&&(a.val(this.value),o.each(function(){c(N(this))}))}),a.on("click input",function(){l.prop("checked",!0)}),a.on("focus",function(e){s=!0,N(this).off(e)}),o.each(function(){c(N(this))}),a.on("change",function(){o.each(function(){c(N(this))})}),o.on("click",function(){var e=a.val(),t=a[0].selectionStart,n=a[0].selectionEnd,i=N(this).text().trim(),o=N(this).attr("data-added");if(-1!==e.indexOf(i))return e=e.replace(i+"/",""),a.val("/"===e?"":e),N("#custom_selection_updated").text(o),void c(N(this));s||0!==t||0!==n||(t=n=e.length),l.prop("checked",!0),"/"!==e.substr(0,t).substr(-1)&&(i="/"+i),"/"!==e.substr(n,1)&&(i+="/"),a.val(e.substr(0,t)+i+e.substr(n)),N("#custom_selection_updated").text(o),c(N(this)),s&&a[0].setSelectionRange&&(i=(e.substr(0,t)+i).length,a[0].setSelectionRange(i,i),a.focus())}),$.ready(function(){var n,i,o,s,e,t,a,r,l,c,d=!1,u=N("input.current-page"),p=u.val(),m=/iPhone|iPad|iPod/.test(navigator.userAgent),h=-1!==navigator.userAgent.indexOf("Android"),f=N("#adminmenuwrap"),v=N("#wpwrap"),b=N("#adminmenu"),g=N("#wp-responsive-overlay"),w=N("#wp-toolbar"),k=w.find('a[aria-haspopup="true"]'),C=N(".meta-box-sortables"),L=!1,y=N("#wpadminbar"),x=0,S=!1,P=!1,T=0,M=!1,_={window:Q.height(),wpwrap:v.height(),adminbar:y.height(),menu:f.height()},D=N(".wp-header-end");function E(){var e=N("a.wp-has-current-submenu");"folded"===r?e.attr("aria-haspopup","true"):e.attr("aria-haspopup","false")}function A(e){var t=e.find(".wp-submenu"),n=e.offset().top,i=Q.scrollTop(),o=n-i-30,e=n+t.height()+1,n=60+e-v.height(),i=Q.height()+i-50;1<(n=o<(n=i<e-n?e-i:n)?o:n)?t.css("margin-top","-"+n+"px"):t.css("margin-top","")}function O(){N(".notice.is-dismissible").each(function(){var t=N(this),e=N('<button type="button" class="notice-dismiss"><span class="screen-reader-text"></span></button>');t.find(".notice-dismiss").length||(e.find(".screen-reader-text").text(V("Dismiss this notice.")),e.on("click.wp-dismiss-notice",function(e){e.preventDefault(),t.fadeTo(100,0,function(){t.slideUp(100,function(){t.remove()})})}),t.append(e))})}function j(){l.prop("disabled",""===c.map(function(){return N(this).val()}).get().join(""))}function R(e){var t=Q.scrollTop(),e=!e||"scroll"!==e.type;if(!m&&!b.data("wp-responsive"))if(_.menu+_.adminbar<_.window||_.menu+_.adminbar+20>_.wpwrap)F();else{if(M=!0,_.menu+_.adminbar>_.window){if(t<0)return void(S||(P=!(S=!0),f.css({position:"fixed",top:"",bottom:""})));if(t+_.window>$.height()-1)return void(P||(S=!(P=!0),f.css({position:"fixed",top:"",bottom:0})));x<t?S?(S=!1,(T=f.offset().top-_.adminbar-(t-x))+_.menu+_.adminbar<t+_.window&&(T=t+_.window-_.menu-_.adminbar),f.css({position:"absolute",top:T,bottom:""})):!P&&f.offset().top+_.menu<t+_.window&&(P=!0,f.css({position:"fixed",top:"",bottom:0})):t<x?P?(P=!1,(T=f.offset().top-_.adminbar+(x-t))+_.menu>t+_.window&&(T=t),f.css({position:"absolute",top:T,bottom:""})):!S&&f.offset().top>=t+_.adminbar&&(S=!0,f.css({position:"fixed",top:"",bottom:""})):e&&(S=P=!1,0<(T=t+_.window-_.menu-_.adminbar-1)?f.css({position:"absolute",top:T,bottom:""}):F())}x=t}}function U(){_={window:Q.height(),wpwrap:v.height(),adminbar:y.height(),menu:f.height()}}function F(){!m&&M&&(S=P=M=!1,f.css({position:"",top:"",bottom:""}))}function I(){U(),b.data("wp-responsive")?(H.removeClass("sticky-menu"),F()):_.menu+_.adminbar>_.window?(R(),H.removeClass("sticky-menu")):(H.addClass("sticky-menu"),F())}function K(){N(".aria-button-if-js").attr("role","button")}function z(){var e=!1;return e=W.innerWidth?Math.max(W.innerWidth,document.documentElement.clientWidth):e}function B(){var e=z()||961;r=e<=782?"responsive":H.hasClass("folded")||H.hasClass("auto-fold")&&e<=960&&782<e?"folded":"open",$.trigger("wp-menu-state-set",{state:r})}b.on("click.wp-submenu-head",".wp-submenu-head",function(e){N(e.target).parent().siblings("a").get(0).click()}),N("#collapse-button").on("click.collapse-menu",function(){var e=z()||961;N("#adminmenu div.wp-submenu").css("margin-top",""),r=e<960?H.hasClass("auto-fold")?(H.removeClass("auto-fold").removeClass("folded"),setUserSetting("unfold",1),setUserSetting("mfold","o"),"open"):(H.addClass("auto-fold"),setUserSetting("unfold",0),"folded"):H.hasClass("folded")?(H.removeClass("folded"),setUserSetting("mfold","o"),"open"):(H.addClass("folded"),setUserSetting("mfold","f"),"folded"),$.trigger("wp-collapse-menu",{state:r})}),$.on("wp-menu-state-set wp-collapse-menu wp-responsive-activate wp-responsive-deactivate",E),("ontouchstart"in W||/IEMobile\/[1-9]/.test(navigator.userAgent))&&(e=m?"touchstart":"click",H.on(e+".wp-mobile-hover",function(e){b.data("wp-responsive")||N(e.target).closest("#adminmenu").length||b.find("li.opensub").removeClass("opensub")}),b.find("a.wp-has-submenu").on(e+".wp-mobile-hover",function(e){var t=N(this).parent();b.data("wp-responsive")||t.hasClass("opensub")||t.hasClass("wp-menu-open")&&!(t.width()<40)||(e.preventDefault(),A(t),b.find("li.opensub").removeClass("opensub"),t.addClass("opensub"))})),m||h||(b.find("li.wp-has-submenu").hoverIntent({over:function(){var e=N(this),t=e.find(".wp-submenu"),t=parseInt(t.css("top"),10);isNaN(t)||-5<t||b.data("wp-responsive")||(A(e),b.find("li.opensub").removeClass("opensub"),e.addClass("opensub"))},out:function(){b.data("wp-responsive")||N(this).removeClass("opensub").find(".wp-submenu").css("margin-top","")},timeout:200,sensitivity:7,interval:90}),b.on("focus.adminmenu",".wp-submenu a",function(e){b.data("wp-responsive")||N(e.target).closest("li.menu-top").addClass("opensub")}).on("blur.adminmenu",".wp-submenu a",function(e){b.data("wp-responsive")||N(e.target).closest("li.menu-top").removeClass("opensub")}).find("li.wp-has-submenu.wp-not-current-submenu").on("focusin.adminmenu",function(){A(N(this))})),D.length||(D=N(".wrap h1, .wrap h2").first()),N("div.updated, div.error, div.notice").not(".inline, .below-h2").insertAfter(D),$.on("wp-updates-notice-added wp-plugin-install-error wp-plugin-update-error wp-plugin-delete-error wp-theme-install-error wp-theme-delete-error",O),screenMeta.init(),H.on("click","tbody > tr > .check-column :checkbox",function(e){if("undefined"==e.shiftKey)return!0;if(e.shiftKey){if(!d)return!0;n=N(d).closest("form").find(":checkbox").filter(":visible:enabled"),i=n.index(d),o=n.index(this),s=N(this).prop("checked"),0<i&&0<o&&i!=o&&(i<o?n.slice(i,o):n.slice(o,i)).prop("checked",function(){return!!N(this).closest("tr").is(":visible")&&s})}var t=N(d=this).closest("tbody").find(":checkbox").filter(":visible:enabled").not(":checked");return N(this).closest("table").children("thead, tfoot").find(":checkbox").prop("checked",function(){return 0===t.length}),!0}),H.on("click.wp-toggle-checkboxes","thead .check-column :checkbox, tfoot .check-column :checkbox",function(e){var t=N(this),n=t.closest("table"),i=t.prop("checked"),o=e.shiftKey||t.data("wp-toggle");n.children("tbody").filter(":visible").children().children(".check-column").find(":checkbox").prop("checked",function(){return!N(this).is(":hidden,:disabled")&&(o?!N(this).prop("checked"):!!i)}),n.children("thead,  tfoot").filter(":visible").children().children(".check-column").find(":checkbox").prop("checked",function(){return!o&&!!i})}),N("#wpbody-content").on({focusin:function(){clearTimeout(t),a=N(this).find(".row-actions"),N(".row-actions").not(this).removeClass("visible"),a.addClass("visible")},focusout:function(){t=setTimeout(function(){a.removeClass("visible")},30)}},".table-view-list .has-row-actions"),N("tbody").on("click",".toggle-row",function(){N(this).closest("tr").toggleClass("is-expanded")}),N("#default-password-nag-no").click(function(){return setUserSetting("default_password_nag","hide"),N("div.default-password-nag").hide(),!1}),N("#newcontent").bind("keydown.wpevent_InsertTab",function(e){var t,n,i,o,s=e.target;if(27==e.keyCode)return e.preventDefault(),void N(s).data("tab-out",!0);9!=e.keyCode||e.ctrlKey||e.altKey||e.shiftKey||(N(s).data("tab-out")?N(s).data("tab-out",!1):(t=s.selectionStart,n=s.selectionEnd,i=s.value,document.selection?(s.focus(),document.selection.createRange().text="\t"):0<=t&&(o=this.scrollTop,s.value=i.substring(0,t).concat("\t",i.substring(n)),s.selectionStart=s.selectionEnd=t+1,this.scrollTop=o),e.stopPropagation&&e.stopPropagation(),e.preventDefault&&e.preventDefault()))}),u.length&&u.closest("form").submit(function(){-1==N('select[name="action"]').val()&&-1==N('select[name="action2"]').val()&&u.val()==p&&u.val("1")}),N('.search-box input[type="search"], .search-box input[type="submit"]').mousedown(function(){N('select[name^="action"]').val("-1")}),N("#contextual-help-link, #show-settings-link").on("focus.scroll-into-view",function(e){e.target.scrollIntoView&&e.target.scrollIntoView(!1)}),(D=N("form.wp-upload-form")).length&&(l=D.find('input[type="submit"]'),c=D.find('input[type="file"]'),j(),c.on("change",j)),m||(Q.on("scroll.pin-menu",R),$.on("tinymce-editor-init.pin-menu",function(e,t){t.on("wp-autoresize",U)})),W.wpResponsive={init:function(){var e=this;this.maybeDisableSortables=this.maybeDisableSortables.bind(this),$.on("wp-responsive-activate.wp-responsive",function(){e.activate()}).on("wp-responsive-deactivate.wp-responsive",function(){e.deactivate()}),N("#wp-admin-bar-menu-toggle a").attr("aria-expanded","false"),N("#wp-admin-bar-menu-toggle").on("click.wp-responsive",function(e){e.preventDefault(),y.find(".hover").removeClass("hover"),v.toggleClass("wp-responsive-open"),v.hasClass("wp-responsive-open")?(N(this).find("a").attr("aria-expanded","true"),N("#adminmenu a:first").focus()):N(this).find("a").attr("aria-expanded","false")}),b.on("click.wp-responsive","li.wp-has-submenu > a",function(e){b.data("wp-responsive")&&(N(this).parent("li").toggleClass("selected"),e.preventDefault())}),e.trigger(),$.on("wp-window-resized.wp-responsive",N.proxy(this.trigger,this)),Q.on("load.wp-responsive",this.maybeDisableSortables),$.on("postbox-toggled",this.maybeDisableSortables),N("#screen-options-wrap input").on("click",this.maybeDisableSortables)},maybeDisableSortables:function(){(-1<navigator.userAgent.indexOf("AppleWebKit/")?Q.width():W.innerWidth)<=782||C.find(".ui-sortable-handle:visible").length<=1&&jQuery(".columns-prefs-1 input").prop("checked")?this.disableSortables():this.enableSortables()},activate:function(){I(),H.hasClass("auto-fold")||H.addClass("auto-fold"),b.data("wp-responsive",1),this.disableSortables()},deactivate:function(){I(),b.removeData("wp-responsive"),this.maybeDisableSortables()},trigger:function(){var e=z();e&&(e<=782?L||($.trigger("wp-responsive-activate"),L=!0):L&&($.trigger("wp-responsive-deactivate"),L=!1),e<=480?this.enableOverlay():this.disableOverlay(),this.maybeDisableSortables())},enableOverlay:function(){0===g.length&&(g=N('<div id="wp-responsive-overlay"></div>').insertAfter("#wpcontent").hide().on("click.wp-responsive",function(){w.find(".menupop.hover").removeClass("hover"),N(this).hide()})),k.on("click.wp-responsive",function(){g.show()})},disableOverlay:function(){k.off("click.wp-responsive"),g.hide()},disableSortables:function(){if(C.length)try{C.sortable("disable"),C.find(".ui-sortable-handle").addClass("is-non-sortable")}catch(e){}},enableSortables:function(){if(C.length)try{C.sortable("enable"),C.find(".ui-sortable-handle").removeClass("is-non-sortable")}catch(e){}}},N(document).ajaxComplete(function(){K()}),$.on("wp-window-resized.set-menu-state",B),$.on("wp-menu-state-set wp-collapse-menu",function(e,t){var n,i=N("#collapse-button"),t="folded"===t.state?(n="false",V("Expand Main menu")):(n="true",V("Collapse Main menu"));i.attr({"aria-expanded":n,"aria-label":t})}),W.wpResponsive.init(),I(),B(),E(),O(),K(),$.on("wp-pin-menu wp-window-resized.pin-menu postboxes-columnchange.pin-menu postbox-toggled.pin-menu wp-collapse-menu.pin-menu wp-scroll-start.pin-menu",I),N(".wp-initial-focus").focus(),H.on("click",".js-update-details-toggle",function(){var e=N(this).closest(".js-update-details"),t=N("#"+e.data("update-details"));t.hasClass("update-details-moved")||t.insertAfter(e).addClass("update-details-moved"),t.toggle(),N(this).attr("aria-expanded",t.is(":visible"))})}),$.ready(function(e){var t,n;H.hasClass("update-php")&&(t=e("a.update-from-upload-overwrite"),n=e(".update-from-upload-expired"),t.length&&n.length&&W.setTimeout(function(){t.hide(),n.removeClass("hidden"),W.wp&&W.wp.a11y&&W.wp.a11y.speak(n.text())},714e4))}),Q.on("resize.wp-fire-once",function(){W.clearTimeout(t),t=W.setTimeout(d,200)}),"-ms-user-select"in document.documentElement.style&&navigator.userAgent.match(/IEMobile\/10\.0/)&&((n=document.createElement("style")).appendChild(document.createTextNode("@-ms-viewport{width:auto!important}")),document.getElementsByTagName("head")[0].appendChild(n))}(jQuery,window);