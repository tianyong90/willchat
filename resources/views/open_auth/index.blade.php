<!DOCTYPE html>
<html>
<head>
  <title>Laravel</title>

  <link href="http://fonts.useso.com/css?family=Lato:100" rel="stylesheet" type="text/css">

  <style>
    html, body {
      height: 100%;
    }
    body {
      margin: 0;
      padding: 0;
      width: 100%;
      display: table;
      font-weight: 100;
      font-family: 'Lato';
    }
    .container {
      text-align: center;
      display: table-cell;
      vertical-align: middle;
    }
    .content {
      text-align: center;
      display: inline-block;
    }
    .title {
      font-size: 96px;
    }
    a {
      text-decoration: none;
      color: #000;
    }
  </style>
</head>
<body>
<div class="container">
  <div class="content">
    <a href="{{ $authLinkUrl }}">一键授权</a>
  </div>
</div>
</body>
</html>