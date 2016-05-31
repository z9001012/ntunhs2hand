<html>
    <head>
        <title>{{ isset($title) ? $title : "ohyeahyao"}}</title>
        <!-- 共用的css -->
        {{ HTML::style('css/allStyle.css')}}
        <!-- 共用的js -->
        {{HTML::script('js/allJavaScript.js')}}
        <!-- 某一頁需要的css -->
        @yield('addStyle')
        <!-- 某一頁需要的js -->
        @yield('addJavaScript')
    </head>
    <body>
        <!-- 引入header -->
        @include("font.header") 
        
        <!-- 定義子樣版名稱 -->
        @yield('content')

        <!-- 引入footer -->
        @include("font.footer") 
    </body>
</html>
