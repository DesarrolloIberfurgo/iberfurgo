/*! This file is auto-generated */
!function(o){var r=wp.i18n._x(",","tag delimiter")||",";window.array_unique_noempty=function(t){var a=[];return o.each(t,function(t,e){(e=o.trim(e))&&-1===o.inArray(e,a)&&a.push(e)}),a},window.tagBox={clean:function(t){return t=(t=","!==r?t.replace(new RegExp(r,"g"),","):t).replace(/\s*,\s*/g,",").replace(/,+/g,",").replace(/[,\s]+$/,"").replace(/^[,\s]+/,""),t=","!==r?t.replace(/,/g,r):t},parseTags:function(t){var e=t.id.split("-check-num-")[1],a=o(t).closest(".tagsdiv"),i=a.find(".the-tags"),t=i.val().split(r),n=[];return delete t[e],o.each(t,function(t,e){(e=o.trim(e))&&n.push(e)}),i.val(this.clean(n.join(r))),this.quickClicks(a),!1},quickClicks:function(t){var a,e=o(".the-tags",t),i=o(".tagchecklist",t),n=o(t).attr("id");e.length&&(a=e.prop("disabled"),e=e.val().split(r),i.empty(),o.each(e,function(t,e){(e=o.trim(e))&&(e=o("<li />").text(e),a||((t=o('<button type="button" id="'+n+"-check-num-"+t+'" class="ntdelbutton"><span class="remove-tag-icon" aria-hidden="true"></span><span class="screen-reader-text">'+wp.i18n.__("Remove term:")+" "+e.html()+"</span></button>")).on("click keypress",function(t){"click"!==t.type&&13!==t.keyCode&&32!==t.keyCode||(13!==t.keyCode&&32!==t.keyCode||o(this).closest(".tagsdiv").find("input.newtag").focus(),tagBox.userAction="remove",tagBox.parseTags(this))}),e.prepend("&nbsp;").prepend(t)),i.append(e))}),tagBox.screenReadersMessage())},flushTags:function(t,e,a){var i,n,s=o(".the-tags",t),c=o("input.newtag",t);return void 0===(n=(e=e||!1)?o(e).text():c.val())||""===n||(n=(i=s.val())?i+r+n:n,n=this.clean(n),n=array_unique_noempty(n.split(r)).join(r),s.val(n),this.quickClicks(t),e||c.val(""),void 0===a&&c.focus()),!1},get:function(a){var i=a.substr(a.indexOf("-")+1);o.post(ajaxurl,{action:"get-tagcloud",tax:i},function(t,e){0!==t&&"success"==e&&(t=o('<div id="tagcloud-'+i+'" class="the-tagcloud">'+t+"</div>"),o("a",t).click(function(){return tagBox.userAction="add",tagBox.flushTags(o("#"+i),this),!1}),o("#"+a).after(t))})},userAction:"",screenReadersMessage:function(){var t;switch(this.userAction){case"remove":t=wp.i18n.__("Term removed.");break;case"add":t=wp.i18n.__("Term added.");break;default:return}window.wp.a11y.speak(t,"assertive")},init:function(){var t=o("div.ajaxtag");o(".tagsdiv").each(function(){tagBox.quickClicks(this)}),o(".tagadd",t).click(function(){tagBox.userAction="add",tagBox.flushTags(o(this).closest(".tagsdiv"))}),o("input.newtag",t).keypress(function(t){13==t.which&&(tagBox.userAction="add",tagBox.flushTags(o(this).closest(".tagsdiv")),t.preventDefault(),t.stopPropagation())}).each(function(t,e){o(e).wpTagsSuggest()}),o("#post").submit(function(){o("div.tagsdiv").each(function(){tagBox.flushTags(this,!1,1)})}),o(".tagcloud-link").click(function(){tagBox.get(o(this).attr("id")),o(this).attr("aria-expanded","true").unbind().click(function(){o(this).attr("aria-expanded","false"===o(this).attr("aria-expanded")?"true":"false").siblings(".the-tagcloud").toggle()})})}}}(jQuery);