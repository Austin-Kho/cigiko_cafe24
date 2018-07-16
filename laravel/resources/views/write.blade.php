<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 위 3개의 메타 태그는 *반드시* head 태그의 처음에 와야합니다; 어떤 다른 콘텐츠들은 반드시 이 태그들 *다음에* 와야 합니다 -->
    <title>개발자를 위한 파이썬</title>

    <!-- 합쳐지고 최소화된 최신 CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <!-- 부가적인 테마 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <!-- fonts css -->
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700"/>
    <link rel="stylesheet" href="//fonts.googleapis.com/earlyaccess/nanumgothic.css"/>
    <link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons"/>
    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">
    <!-- IE8 에서 HTML5 요소와 미디어 쿼리를 위한 HTML5 shim 와 Respond.js -->
    <!-- WARNING: Respond.js 는 당신이 file:// 을 통해 페이지를 볼 때는 동작하지 않습니다. -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery (부트스트랩의 자바스크립트 플러그인을 위해 필요합니다) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- 합쳐지고 최소화된 최신 자바스크립트 -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="https://uicdn.toast.com/tui-editor/latest/tui-editor-Editor.js"></script>
  </head>
  <body>
    <div id="editSection"></div>
    <script type="text/javascript">
      // deps for editor
      // require('codemirror/lib/codemirror.css') // codemirror
      // require('tui-editor/dist/tui-editor.css'); // editor ui
      // require('tui-editor/dist/tui-editor-contents.css'); // editor content
      // require('highlight.js/styles/github.css'); // code block highlight
      //
      // var Editor = require('tui-editor');
      // ...
      // var editor = new Editor({
      //   el: document.querySelector('#editSection'),
      //   initialEditType: 'markdown',
      //   previewStyle: 'vertical',
      //   height: '300px'
      // });
      $('#editSection').tuiEditor({
        initialEditType: 'markdown',
        previewStyle: 'vertical',
        height: '300px'
      });
    </script>


  </body>
</html>
