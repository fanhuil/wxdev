<!DOCTYPE html>
<html>
    @include('index.common._meta')
<body>
@include('index.common._nav')
<div class="doc-container" id="doc-container">
    <div class="container-fixed">
        <div class="col-content">
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
                        <div class="content" style="height: 112px;overflow: hidden;">
                            {{--<a href="read.html" class="cover img-light">--}}
                                {{--<img src="{{asset('index')}}/image/cover/2019121192339714.png">--}}
                            {{--</a>--}}
                            {!! $item->content !!}
                        </div>
                        <div class="read-more">
                            <a href="{{route('index.article.show',['id'=>$item->id])}}" class="fc-black f-fwb">继续阅读</a>
                        </div>
                        {{--<aside class="f-oh footer">--}}
                            {{--<div class="f-fl tags">--}}
                                {{--<span class="fa fa-tags fs-16"></span>--}}
                                {{--<a class="tag">ASP.NET MVC</a>--}}
                            {{--</div>--}}
                            {{--<div class="f-fr">--}}
									{{--<span class="read">--}}
										{{--<i class="fa fa-eye fs-16"></i>--}}
										{{--<i class="num">57</i>--}}
									{{--</span>--}}
                                {{--<span class="ml20">--}}
										{{--<i class="fa fa-comments fs-16"></i>--}}
										{{--<a href="javascript:void(0)" class="num fc-grey">1</a>--}}
									{{--</span>--}}
                            {{--</div>--}}
                        {{--</aside>--}}
                    </section>
                    @endforeach
                </article>
            </div>
        </div>
        <div class="col-other">
            <div class="inner">
                <div class="other-item" id="categoryandsearch">
                    <div class="search">
                        <label class="search-wrap">
                            <input type="text" id="searchtxt" placeholder="输入关键字搜索" />
                            <span class="search-icon">
					                <i class="fa fa-search"></i>
					            </span>
                        </label>
                        <ul class="search-result"></ul>
                    </div>
                    <ul class="category mt20" id="category">
                        <li data-index="0" class="slider"></li>
                        <li data-index="1"><a href="{{route('/')}}">全部文章</a></li>
                        @foreach($categoryList as $key => $item)
                            <li data-index="<?php echo $key + 2; ?>"><a href="{{route('index,search.searchcategory',['categoryid'=>$item->id])}}">{{$item->category_name}}</a></li>
                        @endforeach
                        {{--<li data-index="2"><a href="/Blog/Article/1/">个人日记</a></li>--}}
                        {{--<li data-index="3"><a href="/Blog/Article/2/">HTML5&amp;CSS3</a></li>--}}
                        {{--<li data-index="4"><a href="/Blog/Article/3/">JavaScript</a></li>--}}
                        {{--<li data-index="5"><a href="/Blog/Article/4/">ASP.NET MVC</a></li>--}}
                        {{--<li data-index="6"><a href="/Blog/Article/5/">其它</a></li>--}}
                    </ul>
                </div>
                <!--右边悬浮 平板或手机设备显示-->
                <div class="category-toggle"><i class="layui-icon">&#xe603;</i></div>
                <div class="article-category">
                    <div class="article-category-title">分类导航</div>
                    @foreach($categoryList as $key => $item)
                    <a href="{{route('index,search.searchcategory',['categoryid'=>$item->id])}}">{{$item->category_name}}</a>
                    @endforeach
                    {{--<a href="/Blog/Article/2/">HTML5&amp;CSS3</a>--}}
                    {{--<a href="/Blog/Article/3/">JavaScript</a>--}}
                    {{--<a href="/Blog/Article/4/">ASP.NET MVC</a>--}}
                    {{--<a href="/Blog/Article/5/">其它</a>--}}
                    <div class="f-cb"></div>
                </div>
                <!--遮罩-->
                <div class="blog-mask animated layui-hide"></div>
                <div class="other-item">
                    <h5 class="other-item-title">热门文章</h5>
                    <div class="inner">
                        <ul class="hot-list-article">
                            @foreach($hotArticle as $item)
                            <li> <a href="{{route('index.article.show',['id'=>$item->id])}}">{{$item->title}}</a></li>
                            @endforeach
                            {{--<li> <a href="/Blog/Read/12">模板分享</a></li>--}}
                            {{--<li> <a href="/Blog/Read/13">逆水寒</a></li>--}}
                            {{--<li> <a href="/Blog/Read/4">序章</a></li>--}}
                            {{--<li> <a href="/Blog/Read/7">解决百度分享插件不支持https</a></li>--}}
                            {{--<li> <a href="/Blog/Read/11">使用码云和VS托管本地代码</a></li>--}}
                            {{--<li> <a href="/Blog/Read/14">MUI框架-快速开发APP</a></li>--}}
                            {{--<li> <a href="/Blog/Read/8">NPOI导入导出Excel</a></li>--}}
                        </ul>
                    </div>
                </div>
                {{--<div class="other-item">--}}
                    {{--<h5 class="other-item-title">置顶推荐</h5>--}}
                    {{--<div class="inner">--}}
                        {{--<ul class="hot-list-article">--}}
                            {{--<li> <a href="/Blog/Read/16">.NET Spire.Doc组件</a></li>--}}
                            {{--<li> <a href="/Blog/Read/14">MUI框架-快速开发APP</a></li>--}}
                            {{--<li> <a href="/Blog/Read/9">2018最新版QQ音乐api调用</a></li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="other-item">--}}
                    {{--<h5 class="other-item-title">最近访客</h5>--}}
                    {{--<div class="inner">--}}
                        {{--<dl class="vistor">--}}
                            {{--<dd><a href="javasript:;"><img src="https://thirdqq.qlogo.cn/qqapp/101465933/72388EA977643E8F97111222675720B1/100"><cite>Anonymous</cite></a></dd>--}}
                            {{--<dd><a href="javasript:;"><img src="https://thirdqq.qlogo.cn/qqapp/101465933/342F777E313DDF5CCD6E3E707BB0770B/100"><cite>Dekstra</cite></a></dd>--}}
                            {{--<dd><a href="javasript:;"><img src="https://thirdqq.qlogo.cn/qqapp/101465933/EA5D00A72C0C43ECD8FC481BD274DEEC/100"><cite>惜i</cite></a></dd>--}}
                            {{--<dd><a href="javasript:;"><img src="https://thirdqq.qlogo.cn/qqapp/101465933/EF18CEC98150D2442183AA30F05AAD7B/100"><cite>↙Aㄨ计划 ◆莪↘</cite></a></dd>--}}
                            {{--<dd><a href="javasript:;"><img src="https://thirdqq.qlogo.cn/qqapp/101465933/3D8D91AD2BAFD36F5AC494DA51E270E6/100"><cite>.</cite></a></dd>--}}
                            {{--<dd><a href="javasript:;"><img src="https://thirdqq.qlogo.cn/qqapp/101465933/B745A110DAB712A0E6C5D0B633E905D3/100"><cite>Lambert.</cite></a></dd>--}}
                            {{--<dd><a href="javasript:;"><img src="https://thirdqq.qlogo.cn/qqapp/101465933/E9BA3A2499EC068B7917B9EF45C4D13C/100"><cite>64ღ</cite></a></dd>--}}
                            {{--<dd><a href="javasript:;"><img src="https://thirdqq.qlogo.cn/qqapp/101465933/09F92966169272DD7DD9999E709A0204/100"><cite>doBoor</cite></a></dd>--}}
                            {{--<dd><a href="javasript:;"><img src="https://thirdqq.qlogo.cn/qqapp/101465933/59991D53192643A1A651383847332EB6/100"><cite>毛毛小妖</cite></a></dd>--}}
                            {{--<dd><a href="javasript:;"><img src="https://thirdqq.qlogo.cn/qqapp/101465933/FF34F311DDC43E2AF63BE897BCA24F05/100"><cite>NULL</cite></a></dd>--}}
                            {{--<dd><a href="javasript:;"><img src="https://thirdqq.qlogo.cn/qqapp/101465933/59AA25A7627284AE62C8E6EBDC6FE417/100"><cite>吓一跳</cite></a></dd>--}}
                            {{--<dd><a href="javasript:;"><img src="https://thirdqq.qlogo.cn/qqapp/101465933/28B021E0F5AF0A4B9B781A24329FE897/100"><cite>如初</cite></a></dd>--}}
                        {{--</dl>--}}
                    {{--</div>--}}
                {{--</div>--}}
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
