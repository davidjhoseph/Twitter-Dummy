@extends('layout')
@section('content')
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
@endsection
