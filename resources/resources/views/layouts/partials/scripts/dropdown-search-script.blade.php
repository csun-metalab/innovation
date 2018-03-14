<script type="text/javascript">
/**
 * Sets the given form action to correspond to the selected option in the dropdown box.
 * @param formId
 * @param dropDownboxId
 * @return void
 */
function updateFormAction (formId, dropdownBoxId) {
  var formActions = JSON.parse('{!! json_encode($formActions) !!}')
  //Get the value of the currently selected option.;
  var searchType = $('#' + dropdownBoxId + '>option:checked').attr('value');
  $('#' + formId).attr('action', formActions[searchType]);
};

// Set the event listener on dropdown change
$('#search-dropdown').on('change',function () {
  updateFormAction('search-form','search-dropdown');
});
</script>
