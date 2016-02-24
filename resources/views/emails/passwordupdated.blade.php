<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <p>Hi, {{ $user->name }}！</p>
        <p>您的登录密码已成功更新，请牢记新密码。如果不是本人操作，请前往 <a href="{{ config('app.url') }}">WillChat</a> 重置密码。</p>
    </body>
</html>