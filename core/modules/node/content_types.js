/**
* DO NOT EDIT THIS FILE.
* See the following change record for more information,
* https://www.drupal.org/node/2815083
* @preserve
**/
(function ($, Drupal) {
  Drupal.behaviors.contentTypes = {
    attach: function attach(context) {
      var $context = $(context);
      $context.find('#edit-submission').drupalSetSummary(function (context) {
        var values = [];
        values.push(Drupal.checkPlain($(context).find('#edit-title-label')[0].value) || Drupal.t('Requires a title'));
        return values.join(', ');
      });
      $context.find('#edit-workflow').drupalSetSummary(function (context) {
        var values = [];
        $(context).find('input[name^="options"]:checked').next('label').each(function () {
          values.push(Drupal.checkPlain(this.textContent));
        });
        if (!$(context).find('#edit-options-status').is(':checked')) {
          values.unshift(Drupal.t('Not published'));
        }
        return values.join(', ');
      });
      $('#edit-language', context).drupalSetSummary(function (context) {
        var values = [];
        values.push($('.js-form-item-language-configuration-langcode select option:selected', context)[0].textContent);
        $('input:checked', context).next('label').each(function () {
          values.push(Drupal.checkPlain(this.textContent));
        });
        return values.join(', ');
      });
      $context.find('#edit-display').drupalSetSummary(function (context) {
        var values = [];
        var $editContext = $(context);
        $editContext.find('input:checked').next('label').each(function () {
          values.push(Drupal.checkPlain(this.textContent));
        });
        if (!$editContext.find('#edit-display-submitted').is(':checked')) {
          values.unshift(Drupal.t("Don't display post information"));
        }
        return values.join(', ');
      });
    }
  };
})(jQuery, Drupal);