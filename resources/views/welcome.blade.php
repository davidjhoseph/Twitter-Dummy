<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ asset('js/images/twitterLogo.png') }}" type="image/png" sizes="16x16">

        <title>Twitter</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ url('css/app.css') }}">
    </head>
    <body>
        <div id="app">
            <topnav></topnav>
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="explore">
                            <div class="p-2 border-bottom heading d-flex align-items-center justify-content-between">
                                <div>
                                    Explore
                                </div>
                                <i class="fa fa-cog"></i>
                            </div>
                            <div class="trends p-2 border-bottom">
                                Trends for you
                            </div>
                            <div>
                                <trends title="Politics - Trending" genre="Disgusting" tweets="158k Tweets"></trends>
                                <trends title="Trending in Nigeria" genre="Unilorin" tweets="1,855 Tweets"></trends>
                                <trends title="Trending in Nigeria" genre="She's 15" tweets="6,567 Tweets"></trends>
                                <trends title="Trending in Nigeria" genre="Naomi" tweets="2,775 Tweets"></trends>
                                <trends title="Entertainment - Trending" genre="Marvel" tweets="9,257 Tweets"></trends>
                            </div>
                            <div class="p-2">
                                <a href="#"> Show More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <authbox></authbox>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="https://use.fontawesome.com/7ccc3ead1b.js"></script>
    </body>
</html>
