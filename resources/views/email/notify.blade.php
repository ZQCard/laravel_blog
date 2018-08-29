<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>www.niu12.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style>
        a{
            text-decoration: none;
        }
        .theme{
            color: #f4645f;
        }
    </style>
</head>

<body style="margin: 0;padding: 0;">
<table width="100%" border="0" cellspacing="0" cellpadding="0"
       style="padding-top: 80px;padding-bottom: 80px;padding-left: 0;padding-right: 0;box-sizing: border-box;font-family:'微软雅黑',Helvetica,Arial,sans-serif;font-size:16px">
    <tr>
        <td align="center" valign="top" bgcolor="#f4f4f4" style="background-color:#f4f4f4;"><br>
            <br>
            <table width="600" border="0" cellspacing="0" cellpadding="0" style="background-color: #fff;border-radius: 6px;padding: 0 40px;font-family:'微软雅黑',Helvetica,Arial,sans-serif;font-size:16px">
                <tr style="width: 100%;">　
                    <td style="width:100%;border-bottom: 1px solid rgb(244, 244, 244);padding: 10px 0;"><img src="{{ config('app.url').'/favicon.ico' }}" width="160" height="65" style="border: none;" alt="卡牌"></td>
                </tr>
                <tr>
                    <td style="padding-bottom: 15px;"><span style="font-size: 20px;" class="theme">{{ $user }}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;评论:</td>
                </tr>
                <tr>
                    <td style="padding-bottom: 15px;">{{ $title }}</td>
                </tr>
                <tr>
                    <td style="padding-bottom: 15px;">前往查看：<span style="font-size: 20px;">
                            <a href="{{ route('article', ['id' => $id]) }}" class="theme">{{ $comment }}</a></span></td>
                </tr>
            </table>
            <br>
            <br>
        </td>
    </tr>
</table>
</body>
</html>
