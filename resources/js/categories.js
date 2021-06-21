let categories = {
  run() {
    $(document).on('click', '[data-category-id]', function() {
      $.ajax({
        url: '/category/' + $(this).data('category-id'),
        type: 'get',
        success: function(html) {
          $('#map').html(html);
        }
      })
    })
  }
}

module.exports = categories;
