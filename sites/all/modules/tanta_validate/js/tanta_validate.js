jQuery(document).ready(function() {
    var validate = Drupal.settings.validate;
    if (validate) {
        jQuery.each(validate, function(key, value) {
            var container_name =  "#" + key.replace(/_/g, '-');

            jQuery(container_name).validate(value);
        });
    }
});
