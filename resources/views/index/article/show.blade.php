<!DOCTYPE html>
<html>
@include('index.common._meta')
<body>
@include('index.common._nav')
<div class="doc-container" id="doc-container">
    <div class="container-fixed">
        <div class="col-content" style="width:100%">
            <div class="inner">
                <article class="article-list">
                    <input type="hidden" value="@Model.BlogTypeID" id="blogtypeid" />
                    <section class="article-item">
                        <aside class="title" style="line-height:1.5;">
                            <h4>{{$article->title}}</h4>
                            <p class="fc-grey fs-14">
                                <small>
                                    作者：<a href="javascript:void(0)" target="_blank" class="fc-link">{{$article->author}}</a>
                                </small>
                                <small class="ml10">围观群众：<i class="readcount">37</i></small>
                                <small class="ml10">更新于 <label>{{$article->updated_at}}</label> </small>
                            </p>
                        </aside>
                        <div class="time mt10" style="padding-bottom:0;">
                            <span class="day">22</span>
                            <span class="month fs-18">5<small class="fs-14">月</small></span>
                            <span class="year fs-18">2018</span>
                        </div>
                        <div class="content artiledetail" style="border-bottom: 1px solid #e1e2e0; padding-bottom: 20px;">
                            {!! $article->content !!}
                            <div class="copyright mt20">
                                <p class="f-toe fc-black">
{{--                                    非特殊说明，本文版权归 燕十三 所有，转载请注明出处.--}}
                                </p>
                                <p class="f-toe">
                                    本文标题：
                                    <a href="javascript:void(0)" class="r-title">{{$article->title}}</a>
                                </p>
                                <p class="f-toe">
                                    本文网址：
                                    <a href="{{route('index.article.show',['id'=>$article->id])}}">{{route('index.article.show',['id'=>$article->id])}}</a>
                                </p>
                            </div>
                            <div id="aplayer" style="margin:5px 0"></div>
                            <h6>延伸阅读</h6>
                            <ol class="b-relation"></ol>
                        </div>
                        <div class="bdsharebuttonbox share" data-tag="share_1">
                            <ul>
                                <li class="f-praise"><span><a class="s-praise"></a></span></li>
                                <li class="f-weinxi"><a class="s-weinxi" data-cmd="weixin"></a></li>
                                <li class="f-sina"><a class="s-sina" data-cmd="tsina"></a></li>
                                <li class="f-qq" href="#"><i class="fa fa-qq"></i></li>
                                <li class="f-qzone"><a class="s-qzone" data-cmd="qzone"></a></li>
                            </ul>
                        </div>
                        <div class="f-cb"></div>
                        <div class="mt20 f-fwn fs-24 fc-grey comment" style="border-top: 1px solid #e1e2e0; padding-top: 20px;">
                        </div>
                        <fieldset class="layui-elem-field layui-field-title">
                            <legend>发表评论</legend>
                            <div class="layui-field-box">
                                <div class="leavemessage" style="text-align:initial">
                                    <form class="layui-form blog-editor" action="">
                                        <input type="hidden" name="articleid" id="articleid" value="@Model.ID">
                                        <div class="layui-form-item">
                                            <textarea name="editorContent" lay-verify="content" id="remarkEditor" placeholder="请输入内容" class="layui-textarea layui-hide"></textarea>
                                        </div>
                                        <div class="layui-form-item">
                                            <button class="layui-btn" lay-submit="formLeaveMessage" lay-filter="formLeaveMessage">提交留言</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </fieldset>
                        <ul class="blog-comment" id="blog-comment"></ul>
                    </section>
                </article>
            </div>
        </div>
    </div>
</div>
<footer class="grid-footer">
    <div class="footer-fixed">
        <div class="copyright">
            <div class="info">
                {{--<div class="contact">--}}
                    {{--<a href="javascript:void(0)" class="github" target="_blank"><i class="fa fa-github"></i></a>--}}
                    {{--<a href="#" class="qq" target="_blank" ><i class="fa fa-qq"></i></a>--}}
                    {{--<a href="#" class="email" target="_blank" ><i class="fa fa-envelope"></i></a>--}}
                    {{--<a href="javascript:void(0)" class="weixin"><i class="fa fa-weixin"></i></a>--}}
                {{--</div>--}}
                <p class="mt05">
                    <a href="https://beian.miit.gov.cn" style="color:white;">Copyright &copy; 2021-2021 All Rights Reserved V.3.1.3 桂ICP备19011879-1号</a>
                </p>
            </div>
        </div>
    </div>
</footer>
<script src="/index/layui/layui.js"></script>
<script src="/index/js/yss/gloable.js"></script>
<script src="/index/js/plugins/nprogress.js"></script>
<script src="/index/js/pagecomment.js"></script>
<script>NProgress.start();</script>
<script>
    window.onload = function () {
        NProgress.done();
    };
</script>
</body>
</html>
