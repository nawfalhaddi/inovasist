window.onscroll = function() {
  myFunction()
};

function myFunction() {
  if (document.body.scrollTop > 3800 || document.documentElement.scrollTop > 3800) {
    counter();
  }
}

function counter() {
  $('.counter').each(function() {
    var $this = $(this),
      countTo = $this.attr('data-count');

    $({
      countNum: $this.text()
    }).animate({
        countNum: countTo
      },

      {
        duration: 2000,
        easing: 'linear',
        step: function() {
          $this.text(Math.floor(this.countNum));
        },
        complete: function() {
          $this.text(this.countNum);
          //alert('finished');
        }
      });
  });
}