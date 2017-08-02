<!DOCTYPE html>
<html>
  <head>
     <meta charset="utf-8"/>
  </head>
  <body>
		  <form method="post" action="{{URL('upload/Upload')}}" enctype="multipart/form-data">
		  <input type="hidden" name="_token" value="{{ csrf_token() }}">
		  <input type="file" name="ufile"/>
		  <input type="submit" value="上传"/>
		  </form>
  </body>
</html>