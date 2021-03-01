jQuery(document).ready(function ($) {
  "use strict";

  let arr = [
    "footer_builder_select",
    "header_builder_select"
  ];
  arr.forEach(element => {
    if ($("#customize-control-" + element).length > 0) {
      function header_builder(current , type) {
        let id = type === 'change' ? current.val() : current.val(),
          admin_url = admin_url_object.admin_url + id;
          if (id == 0) {
            current.parents('.control-section').find(".xs_builder_edit_link").attr("href", "edit.php?post_type=elementskit_template");
          } else {
            current.parents('.control-section').find(".xs_builder_edit_link").attr("href", admin_url);
          }
      }
      $("#customize-control-" + element).each(function () {
        header_builder($(this).find('select'));
        $("#customize-control-" + element).on("change", "select", function (e) {
          header_builder($(this), e.type);
        }).trigger("change");
      })
    }
  });

  if ($("#sub-accordion-panel-xs_theme_option_panel").length > 0) {
    let arr = ["xs_header_settings_section", "footer_settings_section"];
    arr.forEach((element) => {
      if ($("#sub-accordion-section-" + element).children('li').hasClass('xs_header_builder_switch') || $("#sub-accordion-section-" + element).children('li').hasClass('xs_footer_builder_switch')) {
        function customizer_value_dynamically_update(current, type, value) {
          let parents = current.parents('.control-section'), // control-section
              list_item = parents.find('>li'), // li
              select_element = type === 'change' ? current.parents('.devm-option').next('.customize-control-select') : current.next().eq(0),// customize-control-select
              html_element = type === 'change' ? select_element.next('.devm-option') : select_element.next().eq(0); // xs_header_builder_html || xs_footer_builder_html

          if (type === 'change') {
            if (value === true) {
              list_item.css('display', 'none');
              $('.section-meta').css('display', 'list-item');
              $(select_element,).css('display', 'list-item');
              $(html_element).css('display', 'list-item');
              current.parents('.devm-option').css('display', 'list-item'); // xs_footer_builder_switch || xs_header_builder_switch
            } else if (value === false) {
              list_item.css('display', 'list-item');
              select_element.css('display', 'none');
              html_element.css('display', 'none');
            }
          } else {
            let current_target_val = current.find('input[type="hidden"]').val();
            if (current_target_val === "yes") {
              list_item.css('display', 'none');
              $('.section-meta').css('display', 'list-item');
              $(select_element,).css('display', 'list-item');
              $(html_element).css('display', 'list-item');
              current.css('display', 'list-item'); // xs_footer_builder_switch || xs_header_builder_switch
            } else {
              list_item.css('display', 'list-item');
              select_element.css('display', 'none');
              html_element.css('display', 'none');
            }
          }
        }

        customizer_value_dynamically_update($('.xs_header_builder_switch'));

        customizer_value_dynamically_update($('.xs_footer_builder_switch'));

        $('.xs_header_builder_switch input[type="checkbox"]')
        .on("change", function (e) {
          customizer_value_dynamically_update(
            $(this),
            e.type,
            $(this).is(":checked"),
          );
        });

        $('.xs_footer_builder_switch input[type="checkbox"]')
        .on("change", function (e) {
          customizer_value_dynamically_update(
            $(this),
            e.type,
            $(this).is(":checked"),
          );
        });
      }
    });
  }
});
