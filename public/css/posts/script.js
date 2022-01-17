// メインコンテンツをヘッダーの高さ分だけずらす
  // mainと#menuのスタイルをCSSで、ヘッダーの高さ分のpxを書かないでJavaScriptで書いているのかというとレスポンシブのため
  // デバイスによってheaderの高さが可変しても、可変したデバイスでのheaderの高さを取得するので変な余白やズレが起きるのを防ぐため
  var headerHeight = $('.sample-header').outerHeight();
  $('main').css('padding-top', headerHeight + 'px');
  $('#menu').css('margin-top', headerHeight + 'px');
  
    // ヘッダーバーガー
    
    $(".sample-openbtn4").click(function () {
      $(this).toggleClass('active');
      $('#menu').toggleClass('open');
  });