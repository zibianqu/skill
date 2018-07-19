<!DOCTYPE HTML>
<html>
<head>
<title>{{$title}}</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="csrf-token" content="{{csrf_token()}}">
<link href="{{ URL::asset('css/app.css') }}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ URL::asset('css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ URL::asset('css/form.css') }}" rel="stylesheet" type="text/css" media="all" />
<link href='{{ URL::asset('css/family.css') }}' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="{{ URL::asset('js/jquery1.min.js') }}"></script>
<!-- start menu -->
<link href="{{ URL::asset('css/megamenu.css') }}" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="{{ URL::asset('js/megamenu.js') }}"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<!--start slider -->
<link rel="stylesheet" href="{{ URL::asset('css/fwslider.css') }}" media="all">
<script src="{{ URL::asset('js/jquery-ui.min.js') }}"></script>
<script src="{{ URL::asset('js/css3-mediaqueries.js') }}"></script>
<script src="{{ URL::asset('js/fwslider.js') }}"></script>
<!--end slider -->
<script src="{{ URL::asset('js/jquery.easydropdown.js') }}"></script>
</head>
<body>
@yield('content')
</body>
</html>