/*! This file is auto-generated */
!function(u){var s,n;function l(e){return e.split(new RegExp(n+"\\s*"))}void 0!==window.uiAutocompleteL10n&&(s=0,n=wp.i18n._x(",","tag delimiter")||",",u.fn.wpTagsSuggest=function(e){var i,o,a=u(this);if(!a.length)return this;var r=(e=e||{}).taxonomy||a.attr("data-wp-taxonomy")||"post_tag";return delete e.taxonomy,e=u.extend({source:function(e,n){var t;o!==e.term?(t=l(e.term).pop(),u.get(window.ajaxurl,{action:"ajax-tag-search",tax:r,q:t}).always(function(){a.removeClass("ui-autocomplete-loading")}).done(function(e){var t,o=[];if(e){for(t in e=e.split("\n")){var a=++s;o.push({id:a,name:e[t]})}n(i=o)}else n(o)}),o=e.term):n(i)},focus:function(e,t){a.attr("aria-activedescendant","wp-tags-autocomplete-"+t.item.id),e.preventDefault()},select:function(e,t){var o=l(a.val());return o.pop(),o.push(t.item.name,""),a.val(o.join(n+" ")),u.ui.keyCode.TAB===e.keyCode?(window.wp.a11y.speak(wp.i18n.__("Term selected."),"assertive"),e.preventDefault()):u.ui.keyCode.ENTER===e.keyCode&&(window.tagBox&&(window.tagBox.userAction="add",window.tagBox.flushTags(u(this).closest(".tagsdiv"))),e.preventDefault(),e.stopPropagation()),!1},open:function(){a.attr("aria-expanded","true")},close:function(){a.attr("aria-expanded","false")},minLength:2,position:{my:"left top+2",at:"left bottom",collision:"none"},messages:{noResults:window.uiAutocompleteL10n.noResults,results:function(e){return 1<e?window.uiAutocompleteL10n.manyResults.replace("%d",e):window.uiAutocompleteL10n.oneResult}}},e),a.on("keydown",function(){a.removeAttr("aria-activedescendant")}),a.autocomplete(e),a.autocomplete("instance")&&(a.autocomplete("instance")._renderItem=function(e,t){return u('<li role="option" id="wp-tags-autocomplete-'+t.id+'">').text(t.name).appendTo(e)},a.attr({role:"combobox","aria-autocomplete":"list","aria-expanded":"false","aria-owns":a.autocomplete("widget").attr("id")}).on("focus",function(){l(a.val()).pop()&&a.autocomplete("search")}),a.autocomplete("widget").addClass("wp-tags-autocomplete").attr("role","listbox").removeAttr("tabindex").on("menufocus",function(e,t){t.item.attr("aria-selected","true")}).on("menublur",function(){u(this).find('[aria-selected="true"]').removeAttr("aria-selected")})),this})}(jQuery);