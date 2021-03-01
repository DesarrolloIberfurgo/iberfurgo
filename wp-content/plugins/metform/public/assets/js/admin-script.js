jQuery(document).ready(function(e){"use strict";function t(){var t=e(".mf-mailchimp-list-id").val();e(".mailchimp_list option").each((i,s)=>{e(s).attr("selected",!1),s.value===t&&e(s).attr("selected",!0)})}function i(){e(".mf-btn-del-singl-field").click(function(){e(this).parent(".mf-cf-single-field").remove()})}function s(e,t="",i=""){return'<div id="mf-cf-single-field" class="mf-cf-single-field"">\n                    <div class="mf-cf-single-field-input">\n                        <label>Name</label>\n                        <input type="text" name="mf_post_submission_custom_fields_name[]" class="attr-form-control" value="'+t+'">\n                    </div>\n                    <div class="mf-cf-single-field-input">\n                        <label>Select Field</label>\n                        <select data-selected="'+i+'" name="mf_post_submission_mf_field_name[]" class="attr-form-control">'+e+'</select>\n                    </div>\n                    <a href="#" class="mf-btn-del-singl-field">Delete</a>\n                </div>'}e(".metfrom-btn-refresh-get-response-list").click(function(){var t=e(this);t.addClass("mf-setting-spin");var i,s=e("#metform_form_modal"),o=e("#metform-form-modalinput-settings").attr("data-nonce"),a=e(".get-response-campaign-list");i=s.find("form").attr("data-mf-id"),e.ajax({url:window.metform_api.resturl+"metform/v1/entries/store_get_response_list/"+i,type:"get",headers:{"X-WP-Nonce":o},dataType:"json",success:function(e){a.empty(),e.forEach(e=>{a.append('<option value="'+e.campaignId+'">'+e.description+"</option>")}),t.removeClass("mf-setting-spin")},error:function(e){t.removeClass("mf-setting-spin")}})}),e(".metfrom-btn-refresh-mailchimp-list").on("click",function(){var i=e(this);i.addClass("mf-setting-spin");var s=0,o=e("#metform_form_modal"),a=e("#metform-form-modalinput-settings").attr("data-nonce"),n=e(".mailchimp_list");s=o.find("form").attr("data-mf-id"),e.ajax({url:window.metform_api.resturl+"metform/v1/entries/store_mailchimp_list/"+s,type:"get",headers:{"X-WP-Nonce":a},dataType:"json",success:function(s){try{n.empty(),s.lists.forEach(e=>{n.append("<option value="+e.id+">"+e.name+"</option>")}),1===s.lists.length?e(".mf-mailchimp-list-id").attr("value",s.lists[0].id):(t(),e(".mailchimp_list").on("change",t=>{e(".mf-mailchimp-list-id").attr("value",t.target.value)}))}catch(e){}i.removeClass("mf-setting-spin")},error:function(e){i.removeClass("mf-setting-spin")}})}),e(".metfrom-btn-refresh-hubsopt-list").click(function(){var t=e(this);t.addClass("mf-setting-spin");var i,s=e("#metform_form_modal"),o=e("#metform-form-modalinput-settings").attr("data-nonce"),a=e(".hubspot_forms");i=s.find("form").attr("data-mf-id"),e.ajax({url:window.metform_api.resturl+"metform/v1/forms/hubspot_forms/"+i,type:"get",headers:{"X-WP-Nonce":o},dataType:"json",success:function(e){try{a.empty(),a.append('<option value="select">Select a form</option>'),e.forEach(e=>{a.append("<option value="+e.portalId+" guid="+e.guid+">"+e.name+"</option>")})}catch(e){}t.removeClass("mf-setting-spin")},error:function(e){t.removeClass("mf-setting-spin")}})}),e(".hubspot_forms").on("change",function(){var t=e("option:selected",this).attr("guid"),i=e("option:selected",this).val();e(".mf_hubspot_form_guid").val(t),e(".mf_hubspot_form_portalId").val(i);var s,o=e("#metform_form_modal"),a=e("#metform-form-modalinput-settings").attr("data-nonce");s=o.find("form").attr("data-mf-id"),e("#mf-hubsopt-fileds").html("Please wait....");var n="";e.ajax({url:window.metform_api.resturl+"metform/v1/forms/get_fields_data/"+s,type:"get",headers:{"X-WP-Nonce":a},dataType:"json",success:function(i){n=i,e.ajax({url:window.metform_api.resturl+"metform/v1/forms/hubspot_form_fields/"+s,type:"post",headers:{"X-WP-Nonce":a},dataType:"json",data:{guid:t},success:function(t){var i="",s="";Object.keys(n).map(function(e){return[n[e]]}).map(e=>{s+="<option value="+e[0].mf_input_name+">"+e[0].mf_input_label+"</option>"});t.forEach(e=>{i+="<tr><td>"+e.label+"</td><td><select name=mf_hubspot_form_field_name_"+e.name+' class="attr-form-control">'+s+"</select></td></tr>"}),e("#mf-hubsopt-fileds").html('<table width="100%">'+i+"</table>")},error:function(t){e("#mf-hubsopt-fileds").html("Sorry ! Something went wrong")}})},error:function(t){e("#mf-hubsopt-fileds").html("Sorry ! Something went wrong")}})}),e(".mf-mailchimp-list-id").attr("value",""),e(".row-actions .edit a, .page-title-action, .metform-form-edit-btn, body.post-type-metform-form a.row-title").on("click",function(o){o.preventDefault();var a=0,n=e("#metform_form_modal"),r=e(this).parents(".column-title"),m=e("body").attr("data-metform-template-key");n.addClass("loading"),n.modal("show");if(r.length>0){a=e(this).attr("data-metform-form-id"),"undefined"!==m&&(a=m),a=void 0!==a?a:r.find(".hidden").attr("id").split("_")[1];var l=e("#metform-form-modalinput-settings").attr("data-nonce");e.ajax({url:window.metform_api.resturl+"metform/v1/forms/get/"+a,type:"get",headers:{"X-WP-Nonce":l},dataType:"json",success:function(t){t,g(t),n.removeClass("loading"),function(t,i,s){e(".mf-helpscout").length&&e.ajax({url:window.metform_api.resturl+"metform/v1/forms/get_fields_data/"+t,type:"get",headers:{"X-WP-Nonce":i},dataType:"json",success:function(t){var i=t,o="",a=Object.keys(i).map(function(e){return[i[e]]});a.map(e=>{o+="<option value="+e[0].mf_input_name+">"+e[0].mf_input_label+"</option>"});var n='<label class="attr-input-label">Subject*</label><div class="mf-inputs"><select class="attr-form-control" id="mf_helpscout_conversation_subject" name="mf_helpscout_conversation_subject">'+o+"</select></div>",r='<label class="attr-input-label">Customer Email*</label><div class="mf-inputs"><select class="attr-form-control" id="mf_helpscout_conversation_customer_email" name="mf_helpscout_conversation_customer_email">'+o+"</select></div>",m='<label class="attr-input-label">Customer First Name*</label><div class="mf-inputs"><select class="attr-form-control" id="mf_helpscout_conversation_customer_first_name" name="mf_helpscout_conversation_customer_first_name">'+o+"</select></div>",l='<label class="attr-input-label">Customer Last Name*</label><div class="mf-inputs"><select class="attr-form-control" id="mf_helpscout_conversation_customer_last_name" name="mf_helpscout_conversation_customer_last_name">'+o+"</select></div>",c='<label class="attr-input-label">Message*</label><div class="mf-inputs"><select class="attr-form-control" id="mf_helpscout_conversation_customer_message" name="mf_helpscout_conversation_customer_message">'+o+"</select></div>",f='<div class="mf-input-group mf-input-group-inline">'+n+'</div><div class="mf-input-group mf-input-group-inline">'+r+'</div><div class="mf-input-group mf-input-group-inline">'+m+'</div><div class="mf-input-group mf-input-group-inline">'+l+'</div><div class="mf-input-group mf-input-group-inline">'+c+"</div>";e("#mf-helpscout-fileds").html(f),s.mf_helpscout_conversation_subject&&(e('#mf_helpscout_conversation_subject option[value="'+s.mf_helpscout_conversation_subject+'"]').prop("selected",!0),e('#mf_helpscout_conversation_customer_email option[value="'+s.mf_helpscout_conversation_customer_email+'"]').prop("selected",!0),e('#mf_helpscout_conversation_customer_first_name option[value="'+s.mf_helpscout_conversation_customer_first_name+'"]').prop("selected",!0),e('#mf_helpscout_conversation_customer_last_name option[value="'+s.mf_helpscout_conversation_customer_last_name+'"]').prop("selected",!0),e('#mf_helpscout_conversation_customer_message option[value="'+s.mf_helpscout_conversation_customer_message+'"]').prop("selected",!0))},error:function(e){}})}(a,l,t)}})}else{g({form_title:e(".mf-form-modalinput-title").attr("data-default-value"),admin_email_body:"",admin_email_from:"",admin_email_reply_to:"",admin_email_subject:"",capture_user_browser_data:"",enable_admin_notification:"",limit_total_entries_status:"",limit_total_entries:"0",redirect_to:"",success_url:"",failed_cancel_url:"",require_login:"",store_entries:"1",entry_title:"",success_message:e(".mf-form-modalinput-success_message").attr("data-default-value"),user_email_body:"",user_email_from:"",user_email_reply_to:"",user_email_subject:"",input_names:"Example: [mf-inputname]"}),n.removeClass("loading")}function c(e,t=""){let i="";return Array.isArray(e)&&e.map(e=>{const s=t===e[0].mf_input_name?" selected":"";i+="<option value="+e[0].mf_input_name+s+">"+e[0].mf_input_label+"</option>"}),i}e(".mf-register").length&&e.ajax({url:window.metform_api.resturl+"metform/v1/forms/get_fields_data/"+a,type:"get",headers:{"X-WP-Nonce":l},dataType:"json",success:function(t){var i=t,s="";e.ajax({url:window.metform_api.resturl+"xs/register/settings/"+a,type:"get",headers:{"X-WP-Nonce":l},dataType:"json",success:function(t){Object.keys(i).map(function(e){return[i[e]]}).map(e=>{s+="<option value="+e[0].mf_input_name+">"+e[0].mf_input_label+"</option>"});var o='<div class="mf-input-group mf-input-group-inline">'+('<label class="attr-input-label">User Name</label><div class="mf-inputs"><select class="attr-form-control" id="mf_auth_reg_user_name" name="mf_auth_reg_user_name">'+s+"</select></div>")+'</div><div class="mf-input-group mf-input-group-inline">'+('<label class="attr-input-label">User Email</label><div class="mf-inputs"><select class="attr-form-control" id="mf_auth_reg_user_email" name="mf_auth_reg_user_email">'+s+"</select></div>")+'</div><div class="mf-input-group mf-input-group-inline"><label class="attr-input-label">Role</label><div class="mf-inputs"><select class="attr-form-control" id="mf_auth_reg_role" name="mf_auth_reg_role"><option value="administrator">Administrator</option><option value="editor">Editor</option><option value="author">Author</option><option value="contributor">Contributor</option><option selected="selected" value="subscriber">Subscriber</option></select></div></div>';e(".mf_register_form_fields").html(o),0!=t&&(e('#mf_auth_reg_user_name option[value="'+t.mf_auth_reg_user_name+'"]').prop("selected",!0),e('#mf_auth_reg_user_email option[value="'+t.mf_auth_reg_user_email+'"]').prop("selected",!0),e('#mf_auth_reg_role option[value="'+t.mf_auth_reg_role+'"]').prop("selected",!0))},error:function(e){}})},error:function(e){}}),e(".mf-login").length&&e.ajax({url:window.metform_api.resturl+"metform/v1/forms/get_fields_data/"+a,type:"get",headers:{"X-WP-Nonce":l},dataType:"json",success:function(t){var i=t,s="";e.ajax({url:window.metform_api.resturl+"xs/login/settings/"+a,type:"get",headers:{"X-WP-Nonce":l},dataType:"json",success:function(t){Object.keys(i).map(function(e){return[i[e]]}).map(e=>{s+="<option value="+e[0].mf_input_name+">"+e[0].mf_input_label+"</option>"});var o='<div class="mf-input-group mf-input-group-inline">'+('<label class="attr-input-label">User Name</label><div class="mf-inputs"><select class="attr-form-control" id="mf_auth_login_user_name" name="mf_auth_login_user_name">'+s+"</select></div>")+'</div><div class="mf-input-group mf-input-group-inline">'+('<label class="attr-input-label">User Password</label><div class="mf-inputs"><select class="attr-form-control" id="mf_auth_login_user_password" name="mf_auth_login_user_password">'+s+"</select></div>")+"</div>";e(".mf_login_form_fields").html(o),0!=t&&(e('#mf_auth_login_user_name option[value="'+t.mf_auth_login_user_name+'"]').prop("selected",!0),e('#mf_auth_login_user_password option[value="'+t.mf_auth_login_user_password+'"]').prop("selected",!0))},error:function(e){}})},error:function(e){}}),e(".mf-form-to-post").length&&e.ajax({url:window.metform_api.resturl+"metform/v1/forms/get_fields_data/"+a,type:"get",headers:{"X-WP-Nonce":l},dataType:"json",success:function(t){var o=t,n="";e.ajax({url:window.metform_api.resturl+"xs/post/settings/"+a,type:"get",headers:{"X-WP-Nonce":l},dataType:"json",success:function(t){var a=Object.keys(o).map(function(e){return[o[e]]});a.map(e=>{n+="<option value="+e[0].mf_input_name+">"+e[0].mf_input_label+"</option>"});var r='<label class="attr-input-label">Title</label><div class="mf-inputs"><select class="attr-form-control mf_post_submission_title" id="mf_post_submission_title" name="mf_post_submission_title">'+n+"</select></div>",m='<label class="attr-input-label">Content</label><div class="mf-inputs"><select class="attr-form-control mf_post_submission_content" id="mf_post_submission_content" name="mf_post_submission_content">'+n+"</select></div>",l='<label class="attr-input-label">Featured Image</label><div class="mf-inputs"><select class="attr-form-control mf_post_submission_featured_image" id="mf_post_submission_featured_image" name="mf_post_submission_featured_image">'+n+"</select></div>",f=s(n);if(0!=t.custom_fields_settings){f="";var d=Object.entries(t.custom_fields_settings);for(const[e,t]of d)f+=s(c(a,t),e,t)}var p='<div class="mf-input-group mf-input-group-inline">'+r+'</div><div class="mf-input-group mf-input-group-inline">'+m+'</div></div><div class="mf-input-group mf-input-group-inline">'+l+'</div><div class="mf-input-group mf-input-group-inline">'+function(e,t){return'<label class="attr-input-label">Custom Fields</label>\n                    <div class="mf-inputs mf-cf-fields">\n                        <div style="display:none">\n                            <div id="mf-cf-single-field" class="mf-cf-single-field"">\n                                <div class="mf-cf-single-field-input">\n                                    <label>Name</label>\n                                    <input type="text" name="mf_post_submission_custom_fields_name[]" class="attr-form-control" >\n                                </div>\n                                <div class="mf-cf-single-field-input">\n                                    <label>Select Field</label>\n                                    <select name="mf_post_submission_mf_field_name[]" class="attr-form-control">'+t+'</select>\n                                </div>\n                                <a href="#" class="mf-btn-del-singl-field">Delete</a>\n                            </div>\n                        </div>\n                        <div class="repeaterResult">'+e+'</div>\n                        <button class="mf-add-cf" type="button"><span>+</span></button>\n                    </div>'}(f,n)+"</div>";e(".mf-post-submission-fields-section").html(p);var _=0;e(".mf-add-cf").click(function(){var t=e("#mf-cf-single-field").clone();_++,t.attr("id","mf-repeater-field-"+_),e(".mf-btn-del-singl-field",t).attr("data-id",_),t.appendTo(e(".repeaterResult")),i()}),i(),0!=t.fields_settings&&(e('.mf_post_submission_post_type option[value="'+t.fields_settings.mf_post_submission_post_type+'"]').prop("selected",!0),e('.mf_post_submission_title option[value="'+t.fields_settings.mf_post_submission_title+'"]').prop("selected",!0),e('.mf_post_submission_content option[value="'+t.fields_settings.mf_post_submission_content+'"]').prop("selected",!0),e('.mf_post_submission_featured_image option[value="'+t.fields_settings.mf_post_submission_featured_image+'"]').prop("selected",!0),e('.mf_post_submission_author option[value="'+t.fields_settings.mf_post_submission_author+'"]').prop("selected",!0))},error:function(e){}})},error:function(e){}}),function(t){var i=e("#metform-form-modalinput-settings").attr("data-nonce"),s=e(".get-response-campaign-list");e.ajax({url:window.metform_api.resturl+"metform/v1/entries/get_response_list/"+t,type:"get",headers:{"X-WP-Nonce":i},dataType:"json",success:function(e){s.empty(),e.length&&e.forEach(e=>{s.append("<option value="+e.campaignId+">"+e.description+"</option>")})},error:function(e){}})}(a),function(t){var i=e(".metfrom-btn-refresh-hubsopt-list");i.addClass("mf-setting-spin");var s=e("#metform-form-modalinput-settings").attr("data-nonce"),o=e(".hubspot_forms"),a=t;e.ajax({url:window.metform_api.resturl+"metform/v1/forms/get_hubspot_forms/"+a,type:"get",headers:{"X-WP-Nonce":s},dataType:"json",success:function(e){try{o.empty(),o.append('<option value="select">Select a form</option>'),e.forEach(e=>{o.append("<option value="+e.portalId+" guid="+e.guid+">"+e.name+"</option>")})}catch(e){}i.removeClass("mf-setting-spin")},error:function(e){i.removeClass("mf-setting-spin")}})}(a),function(i){e("#metform_form_modal");var s,o=e("#metform-form-modalinput-settings").attr("data-nonce"),a=e(".mailchimp_list");s=i,e.ajax({url:window.metform_api.resturl+"metform/v1/entries/get_mailchimp_list/"+s,type:"get",headers:{"X-WP-Nonce":o},dataType:"json",success:function(i){try{a.empty(),i.lists.forEach(e=>{a.append("<option value="+e.id+">"+e.name+"</option>")}),1===i.lists.length?e(".mf-mailchimp-list-id").attr("value",i.lists[0].id):(t(),e(".mailchimp_list").on("change",t=>{e(".mf-mailchimp-list-id").attr("value",t.target.value)}))}catch(e){}},error:function(e){}})}(a),n.find("form").attr("data-mf-id",a),n.find(".get-response-campaign-list").attr("get-response-list-id",a)}),e(".metform-form-save-btn-editor").on("click",function(){e(".metform-form-save-btn-editor").attr("disabled",!0);var t=e("#metform-form-modalinput-settings");t.attr("data-open-editor","1"),t.trigger("submit")}),e("#metform-form-modalinput-settings").on("submit",function(t){t.preventDefault();var i=e("#metform-form-modal"),s=e(this);i.addClass("loading"),e(".metform-form-save-btn-editor").attr("disabled",!0),e(".metform-form-save-btn").attr("disabled",!0);var o=e(this).serialize(),a=e(this).attr("data-mf-id"),n=e(this).attr("data-open-editor"),r=e(this).attr("data-editor-url"),m=e(this).attr("data-nonce");e.ajax({url:window.metform_api.resturl+"metform/v1/forms/update/"+a,type:"post",data:o,headers:{"X-WP-Nonce":m},dataType:"json",success:function(t){e("#message").css("display","block"),1==t.saved?(e("#post-"+t.data.id).find(".row-title").html(t.data.title),e("#message").removeClass("attr-alert-warning").addClass("attr-alert-success").html(t.status)):e("#message").removeClass("attr-alert-success").addClass("attr-alert-warning").html(t.status),setTimeout(function(){e("#message").css("display","none"),s.find(".attr-close").trigger("click")},1e3),i.removeClass("loading"),"1"==n&&1==t.saved?setTimeout(function(){window.location.href=r+"?post="+t.data.id+"&action=elementor"},1e3):"0"!=a?(e(".metform-form-save-btn-editor").removeAttr("disabled"),e(".metform-form-save-btn").removeAttr("disabled")):"0"==a&&setTimeout(function(){location.reload()},1e3)}})});var o=e(".mf-entry-title"),a=e(".mf-form-user-confirmation"),n=e(".mf-form-admin-notification"),r=e(".mf-input-rest-api-group"),m=e(".mf-mailchimp"),l=e(".mf-get_response"),c=e(".mf-zapier"),f=e(".mf-slack"),d=e(".mf-paypal"),p=e(".mf-stripe"),_=e(".mf-ckit"),u=e(".mf-aweber"),h=e(".mf-mail-poet");function v(t,i=null){var s=e("#metform-form-modalinput-settings").attr("data-nonce");e('.mf-mailster-list-id option[value="'+t+'"]').prop("selected",!0),e.ajax({url:window.metform_api.resturl+"metform/v1/forms/get_fields_data/"+i,type:"get",headers:{"X-WP-Nonce":s},dataType:"json",success:function(s){var o=s,a="";Object.keys(o).map(function(e){return[o[e]]}).map(e=>{a+="<option value="+e[0].mf_input_name+">"+e[0].mf_input_label+"</option>"}),function(t,i,s){var o=e("#metform-form-modalinput-settings").attr("data-nonce");e.ajax({url:window.metform_api.resturl+"metform/v1/forms/get_mailster_form/"+t,type:"get",headers:{"X-WP-Nonce":o},dataType:"json",success:function(t){var o="";for(const[e,s]of Object.entries(t))if("fields"==e)for(const[e,t]of Object.entries(s))o+='<div class="mf-input-group mf-input-group-inline"><label class="attr-input-label">'+t.name+'</label><div class="mf-inputs"><select class="attr-form-control" id="mailster_field_'+e+'" name="mailster_field_'+e+'">'+i+"</select></div></div>";e(".mf-mailster-settings-section").html(o),function(t,i){var s=window.mf_mailster_list_id;if(e(".mf-mailster-list-id").val()==s){var o=e("#metform-form-modalinput-settings").attr("data-nonce");e.ajax({url:window.metform_api.resturl+"metform/v1/forms/get_mailster_form_data/"+i,type:"get",headers:{"X-WP-Nonce":o},dataType:"json",success:function(t){for(const[i,s]of Object.entries(t))for(const[t,i]of Object.entries(s))e("#"+t+' option[value="'+i+'"]').prop("selected",!0)},error:function(e){}})}}(0,s)},error:function(e){}})}(t,a,i)},error:function(e){}})}function g(i){if(o.hide(),a.hide(),n.hide(),r.hide(),m.hide(),c.hide(),f.hide(),d.hide(),p.hide(),_.hide(),u.hide(),h.hide(),""!=i.form_title){e(".mf-form-modalinput-title").val(i.form_title),e(".mf-form-modalinput-success_message").val(i.success_message),e(".mf-entry-title-input").val(void 0!==i.entry_title&&""!=i.entry_title?i.entry_title:void 0===i.entry_title||""==i.entry_title?"Entry # [mf_id]":""),e(".mf-form-modalinput-redirect_to").val(i.redirect_to),e(".mf-form-modalinput-success_url").val(i.success_url),e(".mf-form-modalinput-failed_cancel_url").val(i.failed_cancel_url),e(".mf-form-modalinput-limit_total_entries").val(i.limit_total_entries);var s=e(".mf-form-modalinput-store_entries");"1"==i.store_entries?(s.attr("checked",!0),o.show()):(s.removeAttr("checked"),o.hide());var l=e(".mf-form-modalinput-hide_form_after_submission");"1"==i.hide_form_after_submission?l.attr("checked",!0):l.removeAttr("checked");var g=e(".mf-form-modalinput-require_login");"1"==i.require_login?g.attr("checked",!0):g.removeAttr("checked");var b=e(".mf-form-modalinput-limit_status");"1"==i.limit_total_entries_status?b.attr("checked",!0):b.removeAttr("checked");var k=e(".mf-form-modalinput-count_views");"1"==i.count_views?k.attr("checked",!0):k.removeAttr("checked");var w=e(".mf-form-modalinput-multiple_submission");"1"==i.multiple_submission?w.attr("checked",!0):w.removeAttr("checked");var y=e(".mf-form-modalinput-enable_recaptcha");"1"==i.enable_recaptcha?y.attr("checked",!0):y.removeAttr("checked");var j=e(".mf-form-modalinput-capture_user_browser_data");"1"==i.capture_user_browser_data?(j.attr("checked",!0),e("#multiple_submission").removeClass("hide_input"),e("#multiple_submission").addClass("show_input")):j.removeAttr("checked"),e(".mf-form-user-email-subject").val(i.user_email_subject),e(".mf-form-user-email-from").val(i.user_email_from),e(".mf-form-user-reply-to").val(i.user_email_reply_to),e(".mf-form-user-email-body").val(i.user_email_body);var x=e(".mf-form-user-enable");"1"==i.enable_user_notification?(x.attr("checked",!0),a.show()):(x.removeAttr("checked"),a.hide());var A=e(".mf-form-user-submission-copy");"1"==i.user_email_attach_submission_copy?A.attr("checked",!0):A.removeAttr("checked"),e(".mf-form-admin-email-subject").val(i.admin_email_subject),e(".mf-form-admin-email-from").val(i.admin_email_from),e(".mf-form-admin-email-to").val(i.admin_email_to),e(".mf-form-admin-reply-to").val(i.admin_email_reply_to),e(".mf-form-admin-email-body").val(i.admin_email_body);var C=e(".mf-form-admin-enable");"1"==i.enable_admin_notification?(C.attr("checked",!0),n.show()):(C.removeAttr("checked"),n.hide());var T=e(".mf-form-admin-submission-copy");"1"==i.admin_email_attach_submission_copy?T.attr("checked",!0):T.removeAttr("checked");var P=e(".mf-form-modalinput-rest_api");"1"==i.mf_rest_api?(P.attr("checked",!0),e(".mf-rest-api").show()):(P.removeAttr("checked"),e(".mf-rest-api").hide());var N=e(".mf-form-modalinput-mail_chimp");"1"==i.mf_mail_chimp?(N.attr("checked",!0),m.show()):(N.removeAttr("checked"),m.hide());let r=e(".mf-form-modalinput-ckit"),v=e(".mf-form-modalinput-mail_aweber"),V=e(".mf-form-modalinput-mail_poet");if("1"==i.mf_convert_kit?(r.attr("checked",!0),_.show()):(r.removeAttr("checked"),_.hide()),"1"==i.mf_mail_aweber?(v.attr("checked",!0),u.show()):(v.removeAttr("checked"),u.hide()),"1"==i.mf_mail_poet?(V.attr("checked",!0),h.show()):(V.removeAttr("checked"),h.hide()),i.ckit_opt){let t=e("select.mf-ckit-list-id").first(),s=i.mf_ckit_list_id||"";t.html(),i.ckit_opt.forEach(function(e){t.append('<option value="'+e.id+'">'+e.name+"</option>")}),t.val(s)}if(i.aweber_opt){let t=e("select.mf-aweber-list-id").first(),s=i.mf_aweber_list_id||"";t.html();for(let e in i.aweber_opt)t.append('<option value="'+i.aweber_opt[e].id+'">'+i.aweber_opt[e].name+"</option>");t.val(s)}if(i.mp_opt){let t=e("select.mf-mail-poet-list-id").first(),s=i.mf_mail_poet_list_id||"";t.html();for(let e in i.mp_opt)t.append('<option value="'+i.mp_opt[e].id+'">'+i.mp_opt[e].name+"</option>");t.val(s)}var W=e(".mf-form-modalinput-active_campaign");"1"==i.mf_active_campaign?W.attr("checked",!0):W.removeAttr("checked");var z=e(".mf-form-modalinput-get_response");"1"==i.mf_get_response?(z.attr("checked",!0),e(".mf-get_response").show()):(z.removeAttr("checked"),e(".mf-get_response").hide());var X=e(".mf-hubsopt");"1"==i.mf_hubspot?X.attr("checked",!0):X.removeAttr("checked");var S=e(".mf-hubspot-forms"),O=e(".hubspot_forms_section");"1"==i.mf_hubspot_forms?(S.attr("checked",!0),O.show()):(S.removeAttr("checked"),O.hide()),e(".mf_hubspot_form_portalId").val(i.mf_hubspot_form_portalId),e(".mf_hubspot_form_guid").val(i.mf_hubspot_form_guid);var E=e(".mf-zoho");"1"==i.mf_zoho?E.attr("checked",!0):E.removeAttr("checked");var D=e(".mf-helpscout");"1"==i.mf_helpscout?(D.attr("checked",!0),e(".helpscout_forms_section").show()):(D.removeAttr("chekced"),e(".helpscout_forms_section").hide()),i.mf_helpscout_mailbox&&e('#mf_helpscout_mailbox option[value="'+i.mf_helpscout_mailbox+'"]').prop("selected",!0);var I=e(".mf-form-modalinput-mailster"),U=e(".mf-mailster-settings-section");"1"==i.mf_mailster?(I.attr("checked",!0),U.show(),e(".mf-mailster-forms").show()):(I.removeAttr("checked"),U.hide(),e(".mf-mailster-forms").hide());var q=e(".mf-register");1==i.mf_registration?(q.attr("checked",!0),e(".mf_register_form_fields").show()):(q.removeAttr("checked"),e(".mf_register_form_fields").hide());var F=e(".mf-login");1==i.mf_login?(F.attr("checked",!0),e(".mf_login_form_fields").show()):(e(".mf_login_form_fields").hide(),F.removeAttr("checked"));var R=e(".mf-form-to-post"),L=e(".mf-form-to-post-fields");1==i.mf_form_to_post?(R.attr("checked",!0),L.show()):(R.removeAttr("checked"),L.hide());var Q=e(".mf-form-modalinput-zapier");"1"==i.mf_zapier?(Q.attr("checked",!0),c.show()):(Q.removeAttr("checked",!0),c.hide());var G=e(".mf-form-modalinput-slack");"1"==i.mf_slack?(G.attr("checked",!0),f.show()):(G.removeAttr("checked",!0),f.hide());var K=e(".mf-form-modalinput-paypal");"1"==i.mf_paypal?(K.attr("checked",!0),d.show()):(K.removeAttr("checked",!0),d.hide());var M=e(".mf-form-modalinput-stripe");"1"==i.mf_stripe?(M.attr("checked",!0),p.show()):(M.removeAttr("checked",!0),p.hide());M=e(".mf-form-modalinput-stripe");"1"==i.mf_stripe?(M.attr("checked",!0),p.show()):(M.removeAttr("checked",!0),p.hide());var B=e(".mf-form-modalinput-paypal_sandbox");"1"==i.mf_paypal_sandbox?B.attr("checked",!0):B.removeAttr("checked",!0);var H=e(".mf-form-modalinput-stripe_sandbox");"1"==i.mf_stripe_sandbox?H.attr("checked",!0):H.removeAttr("checked",!0);var J=i.mf_rest_api_method&&i.mf_rest_api_method.length?i.mf_rest_api_method:"POST";e('.mf-rest-api-method option[value="'+J+'"]').prop("selected",!0),e(".mf-rest-api-url").val(i.mf_rest_api_url),e(".mf-mailchimp-api-key").val(i.mf_mailchimp_api_key),e(".mf-mailchimp-list-id").val(i.mf_mailchimp_list_id),""==i.mf_mailchimp_list_id&&e(".mf-mailchimp-list-id").val(e(".mailchimp_list").find(":selected").val()),0!=i.mf_mailchimp_list_id&&e('.mailchimp_list option[value="'+i.mf_get_response_list_id+'"]').prop("selected",!0),t(),e(".mf-get_response-list-id").val(i.mf_get_response_list_id),0!=i.mf_get_response_list_id&&e('.get-response-campaign-list option[value="'+i.mf_get_response_list_id+'"]').prop("selected",!0),e(".mf-zapier-web-hook").val(i.mf_zapier_webhook),e(".mf-slack-web-hook").val(i.mf_slack_webhook),e(".mf-paypal-email").val(i.mf_paypal_email),e(".mf-paypal-token").val(i.mf_paypal_token),e(".mf-stripe-image-url").val(i.mf_stripe_image_url),e(".mf-stripe-live-publishiable-key").val(i.mf_stripe_live_publishiable_key),e(".mf-stripe-live-secret-key").val(i.mf_stripe_live_secret_key),e(".mf-stripe-test-publishiable-key").val(i.mf_stripe_test_publishiable_key),e(".mf-stripe-test-secret-key").val(i.mf_stripe_test_secret_key),e(".mf-recaptcha-site-key").val(i.mf_recaptcha_site_key),e(".mf-recaptcha-secret-key").val(i.mf_recaptcha_secret_key),e("input.mf-form-modalinput-limit_status, .mf-form-modalinput-rest_api").trigger("change")}(window.mf_mailster_list_id=i.mf_mailster_list_id,e('.mf-mailster-list-id option[value="'+i.mf_mailster_list_id+'"]').prop("selected",!0),e(".mf-form-modalinput-mailster").length)&&v(e(".mf-mailster-list-id").find(":selected").val(),e("#metform_form_modal").find("form").attr("data-mf-id"))}e("input.mf-form-modalinput-store_entries").on("change",function(){e(this).is(":checked")?o.show():e(this).is(":not(:checked)")&&o.hide()}),e("input.mf-form-modalinput-limit_status").on("change",function(){e(this).is(":checked")?e("#limit_status").find("input").removeAttr("disabled"):e(this).is(":not(:checked)")&&e("#limit_status").find("input").attr("disabled","disabled")}),e("input.mf-form-user-enable").on("change",function(){e(this).is(":checked")?a.show():e(this).is(":not(:checked)")&&a.hide()}),e("input.mf-form-admin-enable").on("change",function(){e(this).is(":checked")?n.show():e(this).is(":not(:checked)")&&n.hide()}),e("input.mf-form-modalinput-rest_api").on("change",function(){e(this).is(":checked")?r.show():e(this).is(":not(:checked)")&&r.hide()}),e("input.mf-form-modalinput-mail_chimp").on("change",function(){e(this).is(":checked")?m.show():e(this).is(":not(:checked)")&&m.hide()}),e(".mf-form-modalinput-get_response").on("change",function(){e(this).is(":checked")?l.show():l.hide()}),e("input.mf-form-modalinput-mail_aweber").on("change",function(){e(this).is(":checked")?u.show():e(this).is(":not(:checked)")&&u.hide()}),e("input.mf-form-modalinput-mail_poet").on("change",function(){e(this).is(":checked")?h.show():e(this).is(":not(:checked)")&&h.hide()}),e("input.mf-form-modalinput-ckit").on("change",function(){e(this).is(":checked")?_.show():e(this).is(":not(:checked)")&&_.hide()}),e("input.mf-form-modalinput-zapier").on("change",function(){e(this).is(":checked")?c.show():e(this).is(":not(:checked)")&&c.hide()}),e("input.mf-form-modalinput-slack").on("change",function(){e(this).is(":checked")?f.show():e(this).is(":not(:checked)")&&f.hide()}),e("input.mf-form-modalinput-paypal").on("change",function(){e(this).is(":checked")?d.show():e(this).is(":not(:checked)")&&d.hide()}),e("input.mf-form-modalinput-stripe").on("change",function(){e(this).is(":checked")?stripe.show():e(this).is(":not(:checked)")&&stripe.hide()}),e("input.mf-form-modalinput-stripe_sandbox").on("change",function(){e(this).is(":checked")?e(".mf_stripe_sandbox").show():e(this).is(":not(:checked)")&&e(".mf_stripe_sandbox").hide()}),e(".mf-hubspot-forms").on("change",function(){e(this).is(":checked")?e(".hubspot_forms_section").show():e(".hubspot_forms_section").hide()}),e(".mf-register").on("change",function(){e(this).is(":checked")?e(".mf_register_form_fields").show():e(".mf_register_form_fields").hide()}),e(".mf-login").on("change",function(){e(this).is(":checked")?e(".mf_login_form_fields").show():e(".mf_login_form_fields").hide()}),e(".mf-form-to-post").on("change",function(){e(this).is(":checked")?e(".mf-form-to-post-fields").show():e(".mf-form-to-post-fields").hide()}),e(".mf-helpscout").on("change",function(){e(this).is(":checked")?e(".helpscout_forms_section").show():e(".helpscout_forms_section").hide()}),e(".mf-form-modalinput-mailster").on("change",function(){e(this).is(":checked")?(e(".mf-mailster-settings-section").show(),e(".mf-mailster-forms").show()):(e(".mf-mailster-settings-section").hide(),e(".mf-mailster-forms").hide())}),e(".mf-mailster-list-id").on("change",function(){e(this).val(),e("#metform-form-modalinput-settings").attr("data-mf-id")}),e(".get-response-campaign-list").on("change",function(){e(".mf-get_response-list-id ").val(e(this).val())}),e("input.mf-form-modalinput-capture_user_browser_data").click(function(){e(this).is(":checked")?(e("#multiple_submission").removeClass("hide_input"),e("#multiple_submission").addClass("show_input")):e(this).is(":not(:checked)")&&(e("#multiple_submission").removeClass("show_input"),e("#multiple_submission").addClass("hide_input"))}),e(".mf-settings-tab .mf-setting-nav-link").on("click",function(t){if(!e(this).hasClass("mf-setting-nav-hidden")){t.preventDefault();var i=e(this).attr("href");window.location.hash=i,e(this).parent().addClass("nav-tab-active").siblings().removeClass("nav-tab-active"),e(i).addClass("active").siblings().removeClass("active")}}),e(".mf-setting-nav-link").on("click",function(t){e(this).hasClass("mf-setting-nav-hidden")?t.preventDefault():(e(this).parents(".nav-tab-wrapper").find("a").removeClass("top").removeClass("bottom"),e(this).parents("li").prev().find("a").addClass("top"),e(this).parents("li").next().find("a").addClass("bottom"))});var b=e(".mf-settings-tab .mf-setting-nav-link").eq(1).attr("href");if(window.location.hash&&(b=window.location.hash),e('.mf-settings-tab .mf-setting-nav-link[href="'+b+'"]').trigger("click"),e(window).on("resize.mfSettings",function(){e(".mf-setting-sidebar").css("width",e(".mf-setting-sidebar-column").width())}).trigger("resize.mfSettings"),e(".mf-setting-header").length>0){var k=e(".mf-setting-header").offset().top;e(window).scroll(function(){var t=e(".mf-setting-header");e(window).scrollTop()>=k?t.addClass("fixed").css({width:jQuery(".metform-admin-container").width()}):t.removeClass("fixed").css({width:"auto"})})}e(".mf-admin-single-accordion").on("click",".mf-admin-single-accordion--heading",function(){e(this).next().slideToggle().parent().toggleClass("active").siblings().removeClass("active").find(".mf-admin-single-accordion--body").slideUp()}),e(".mf-admin-single-accordion:first-child .mf-admin-single-accordion--heading").trigger("click"),e(".mf-recaptcha-version").on("change",function(){var t=e(this).val();e("#mf-"+t).fadeIn().siblings().hide()}),e(".mf-recaptcha-version").trigger("change"),e(".mf-form-modalinput-stripe_sandbox").on("change",function(){var t=e(this).parents(".attr-form-group").eq(0).next(".mf-form-modalinput-stripe_sandbox_keys");e(this).is(":checked")?t.fadeIn():t.fadeOut()}),e(".mf-form-modalinput-stripe_sandbox").trigger("change"),e(document).on("click","#met_pro_aweber_authorize",function(t){t.preventDefault();let i=e(this).closest("p.description");i.html("<span>Wait....</span>");var s=metform_api.admin_url+"admin-ajax.php",o={action:"get_aweber_authorization_url",api_key:e("#mf_aweber_dev_api_key").val(),api_sec:e("#mf_aweber_dev_api_sec").val()};e.ajax({url:s,method:"POST",data:o,dataType:"json",success:function(e){if(!0===e.success){let t='<a class=" button mf-setting-btn-link" href="'+e.data.url+'">Authorize The App </a>';i.html(t)}else if(e.data){let t=e.data;i.html('<span style="background-color: red; padding: 1px 5px;">'+t.msg+"</span>")}},error:function(e){i.html('<span style="color: red"> ajax error occurred, please check your internet connection..</span>')},complete:function(){}})}),e(document).on("click","#met_pro_aweber_propmpt_re_auth",function(t){t.preventDefault(),e("#mf_aweber_dev_api_key").val("").prop("disabled",!1),e("#mf_aweber_dev_api_sec").val("").prop("disabled",!1),e(this).closest("p.description").html('<a class="button mf-setting-btn-link" id="met_pro_aweber_re_authorize"> Get Re - Authorization URL </a>')}),e(document).on("click","#met_pro_aweber_re_authorize",function(t){t.preventDefault();let i=e(this).closest("p.description");i.html("<span>Wait....</span>");let s=e("#mf_aweber_dev_api_key").val();if(!s||s.length<1)return i.html('<span style="color: red">API Key can not be empty..</span>'),!1;var o=metform_api.admin_url+"admin-ajax.php",a={action:"get_aweber_re_authorization_url",api_key:s,api_sec:e("#mf_aweber_dev_api_sec").val()};e.ajax({url:o,method:"POST",data:a,dataType:"json",success:function(e){if(!0===e.success){let t=e.data;if("ok"==t.result){let e='<a class="mf-setting-btn-link" href="'+t.url+'">Authorize The App </a>';i.html(e)}else i.html("<span>"+t.msg+"</span>")}else if(e.data){let t=e.data;i.html('<span style="background-color: red; padding: 1px 5px;">'+t.msg+"</span>")}},error:function(e){i.html('<span style="color: red"> ajax error occurred, please check your internet connection..</span>')},complete:function(){}})}),e(document).on("click","#met_form_aweber_get_list",function(t){t.preventDefault();let i=e(this),s=e("#mf_aweber_info"),o=metform_api.admin_url+"admin-ajax.php";e.ajax({url:o,method:"POST",data:{action:"get_list_lists"},dataType:"json",success:function(e){if(!0===e.success){let t=e.data,o=i.closest("div.mf-aweber").find("select");if(o.html(""),t.lists)for(let e in t.lists)o.append('<option value="'+t.lists[e].id+'">'+t.lists[e].name+"</option>");s.html("")}else if(e.data){let t=e.data;s.html('<span style="background-color: red; padding: 1px 5px;">'+t.msg+"</span>")}},error:function(e){s.html('<span style="color: red"> ajax error occurred, please check your internet connection..</span>')},complete:function(){}})}),e(document).on("click","#met_form_mail_poet_get_list",function(t){t.preventDefault();let i=e(this),s=e("#mf_mail_poet_info"),o=metform_api.admin_url+"admin-ajax.php";e.ajax({url:o,method:"POST",data:{action:"mail_poet_get_email_list_lists"},dataType:"json",success:function(e){if(!0===e.success){let t=e.data,o=i.closest("div.mf-mail-poet").find("select");if(o.html(""),t.lists)for(let e in t.lists)o.append('<option value="'+t.lists[e].id+'">'+t.lists[e].name+"</option>");s.html("")}else if(e.data){let t=e.data;s.html('<span style="background-color: red; padding: 1px 5px;">'+t.msg+"</span>")}},error:function(e){s.html('<span style="color: red"> ajax error occurred, please check your internet connection..</span>')},complete:function(){}})}),e(document).on("click","#met_form_ckit_get_list",function(t){t.preventDefault();var i=metform_api.admin_url+"admin-ajax.php";let s=e(this);e.ajax({url:i,method:"POST",data:{action:"get_form_lists"},dataType:"json",success:function(e){if(!0===e.success){let t=e.data,i=s.closest("div.mf-ckit").find("select");i.html(""),t.forms&&t.forms.forEach(function(e){i.append('<option value="'+e.id+'">'+e.name+"</option>")})}else alert("Error occurred when trying to check for aweber authorization.")},error:function(e){},complete:function(){}})}),e("#mf-helpscout-btn-token").click(function(){let t=window.metform_api.resturl+"metform/v1/forms/get_helpscout_access_token/123";e.ajax({url:t,type:"get",success:function(e){200==e.status&&location.reload()},error:function(e){alert("Something went wrong")}})})});