<meta charset="utf-8"/>

<meta http-equiv="X-UA-Compatible" content="IE=edge"/>

<meta name="viewport" content="width=device-width, initial-scale=1"/>

<meta name="yandex-verification" content="c2dd8848ce2c3ea5" />
<meta name="description" content="{!! isset($meta_desc) ?substr($meta_desc,3,-4): '' !!}"/>
<meta name="keywords" content="{{ isset($keywords) ? $keywords : '' }}"/>
<meta name="csrf-token" content="{{ csrf_token() }}"/>

<title>@lang('index.enebra')</title>
{{--<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">--}}
{{--<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">--}}
<link href="{{ asset( 'css/frontend.css' ) }}" rel="stylesheet"/>
