<!DOCTYPE html>
<html>
@include('index.common._meta')
<body>
@include('index.common._nav')
<div class="doc-container" id="doc-container">
    <div class="container-fixed">
        <div>
            <div class="inner">
                <article class="article-list bloglist" id="LAY_bloglist">
                    @foreach($articleList as $item)
                        <section class="article-item zoomIn article">
                            @if($item->is_top == 1)
                                <div class="fc-flag">
                                    置顶
                                </div>
                            @endif
                            <h5 class="title">
                            <span class="fc-blue">
                                @if($item->is_original == 1)
                                    【原创】
                                @endif
                            </span>
                                <a href="{{route('index.article.show',['id'=>$item->id])}}">{{$item->title}}</a>
                            </h5>
                            <div class="time">
                            <span class="day">
                            @php
                                echo date('d',strtotime($item->created_at))
                            @endphp
                            </span>
                                <span class="month fs-18">
                                @php
                                    echo date('m',strtotime($item->created_at))
                                @endphp
                                    <span class="fs-14">月</span></span>
                                <span class="year fs-18 ml10">
                                @php
                                    echo date('Y',strtotime($item->created_at))
                                @endphp
                            </span>
                            </div>
                            <div class="content">
                                {{--<a href="read.html" class="cover img-light">--}}
                                {{--<img src="{{asset('index')}}/image/cover/2019121192339714.png">--}}
                                {{--</a>--}}
                                {!! $item->content !!}
                            </div>
                            <div class="read-more">
                                <a href="read.html" class="fc-black f-fwb">继续阅读</a>
                            </div>
                            <aside class="f-oh footer">
                                <div class="f-fl tags">
                                    <span class="fa fa-tags fs-16"></span>
                                    <a class="tag">ASP.NET MVC</a>
                                </div>
                                <div class="f-fr">
									<span class="read">
										<i class="fa fa-eye fs-16"></i>
										<i class="num">57</i>
									</span>
                                    <span class="ml20">
										<i class="fa fa-comments fs-16"></i>
										<a href="javascript:void(0)" class="num fc-grey">1</a>
									</span>
                                </div>
                            </aside>
                        </section>
                    @endforeach
                </article>
            </div>
        </div>
    </div>
</div>
@include('index.common._footer')
<script src="/index/layui/layui.js"></script>
<script src="/index/js/yss/gloable.js"></script>
<script src="/index/js/plugins/nprogress.js"></script>
<script>NProgress.start();</script>
<script src="/index/js/yss/article.js"></script>

<script>
    window.onload = function () {
        NProgress.done();
    };
</script>
</body>
</html>
