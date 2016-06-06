$(document).ready(function() {
  var $domenu            = $('#domenu-1'),
      domenu             = $('#domenu-1').domenu(),
      $outputContainer   = $('#domenu-1-output'),
      $jsonOutput        = $outputContainer.find('.jsonOutput'),
      $keepChanges       = $outputContainer.find('.keepChanges'),
      $clearLocalStorage = $outputContainer.find('.clearLocalStorage');
  $domenu.domenu({
      slideAnimationDuration: 0,
      allowListMerging: true,
      select2: {
        support: true,
        params:  {
          tags: true
        }
      },
      data: window.localStorage.getItem('domenu-1Json') || '[{"title":"Account","customSelect":"select something...","select2ScrollPosition":{"x":0,"y":0}},{"title":"Settings","customSelect":"select something...","select2ScrollPosition":{"x":0,"y":0}},{"title":"Call","customSelect":"select something..."},{"title":"Support","customSelect":"select something..."},{"title":"Email","customSelect":"select something..."},{"title":"Orders","customSelect":"select something..."},{"title":"Manage","customSelect":"select something..."},{"title":"Settings","customSelect":"select something..."}]'
    })
    // Example: initializing functionality of a custom button #21
    .onCreateItem(function(blueprint) {
      // We look with jQuery for our custom button we denoted with class "custom-button-example"
      // Note 1: blueprint holds a reference of the element which is about to be added the list
      var customButton = $(blueprint).find('.custom-button-example');
      // Here we define our custom functionality for the button,
      // we will forward the click to .dd3-content span and let
      // doMenu handle the rest
      customButton.click(function() {
        blueprint.find('.dd3-content span').first().click();
      });
    })
    // Now every element which will be parsed will go through our onCreateItem event listener, and therefore
    // initialize the functionality our custom button
    .parseJson()
    .on(['onItemCollapsed', 'onItemExpanded', 'onItemAdded', 'onSaveEditBoxInput', 'onItemDrop', 'onItemDrag', 'onItemRemoved', 'onItemEndEdit'], function(a, b, c) {
      $jsonOutput.val(domenu.toJson());
      if($keepChanges.is(':checked')) window.localStorage.setItem('domenu-1Json', domenu.toJson());
    })
    .onToJson(function() {
      if(window.localStorage.length) $clearLocalStorage.show();
    });
  // Console event examples
  domenu.on('*', function(a, b, c) {
      console.log('event:', '*', 'arguments:', arguments, 'context:', this);
    })
    .onParseJson(function() {
      console.log('event: onFromJson', 'arguments:', arguments, 'context:', this);
    })
    .onToJson(function() {
      console.log('event: onToJson', 'arguments:', arguments, 'context:', this);
    })
    .onSaveEditBoxInput(function() {
      console.log('event: onSaveEditBoxInput', 'arguments:', arguments, 'context:', this);
    })
    .onItemDrag(function() {
      console.log('event: onItemDrag', 'arguments:', arguments, 'context:', this);
    })
    .onItemDrop(function() {
      console.log('event: onItemDrop', 'arguments:', arguments, 'context:', this);
    })
    .onItemAdded(function() {
      console.log('event: onItemAdded', 'arguments:', arguments, 'context:', this);
    })
    .onItemCollapsed(function() {
      console.log('event: onItemCollapsed', 'arguments:', arguments, 'context:', this);
    })
    .onItemExpanded(function() {
      console.log('event: onItemExpanded', 'arguments:', arguments, 'context:', this);
    })
    .onItemRemoved(function() {
      console.log('event: onItemRemoved', 'arguments:', arguments, 'context:', this);
    })
    .onItemStartEdit(function() {
      console.log('event: onItemStartEdit', 'arguments:', arguments, 'context:', this);
    })
    .onItemEndEdit(function() {
      console.log('event: onItemEndEdit', 'arguments:', arguments, 'context:', this);
    })
    .onItemAddChildItem(function() {
      console.log('event: onItemAddChildItem', 'arguments:', arguments, 'context:', this);
    })
    .onItemAddChildItem(function() {
      console.log('event: onItemAddChildItem', 'arguments:', arguments, 'context:', this);
    })
    .onItemAddChildItem(function() {
      console.log('event: onItemAddChildItem', 'arguments:', arguments, 'context:', this);
    })
    .onItemAddChildItem(function() {
      console.log('event: onItemAddChildItem', 'arguments:', arguments, 'context:', this);
    });
  if(window.localStorage.length) $clearLocalStorage.show();
  $clearLocalStorage.click(function() {
    if(true) window.localStorage.clear();
    if(!window.localStorage.length) $clearLocalStorage.hide();
    // Part of the reset demo routine
    window.location.reload();
  });
  // Init textarea
  $jsonOutput.val(domenu.toJson());
  $keepChanges.on('click', function() {
    if(!$keepChanges.is(':checked')) window.localStorage.setItem('domenu-1KeepChanges', false);
    if($keepChanges.is(':checked')) window.localStorage.setItem('domenu-1KeepChanges', true);
  });
  if(window.localStorage.getItem('domenu-1KeepChanges') === "false") $keepChanges.attr('checked', false);
});
