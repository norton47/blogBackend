<li class="dropdown notifications-menu">
    <!-- Menu toggle button -->
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-bell-o"></i>
        <span class="label label-warning">{{ $likeComments['allNews'] }}</span>
    </a>
    <ul class="dropdown-menu">
        <li class="header"> {{ trans_choice('app.message.notifications :amount', $likeComments['allNews'], ['amount' => $likeComments['allNews']]) }}</li>
        <li>
            <!-- Inner Menu: contains the notifications -->
            <ul class="menu">
                <li><!-- start notification -->
                    @if($likeComments['comments'] > 0)
                        <a href="#">
                            <i class="fa fa-users text-aqua"></i> {{ trans('comment.new_comments') }}
                            - {{ $likeComments['comments'] }}
                        </a>
                    @endif
                    @if($likeComments['likes'] > 0)
                        <a href="#">
                            <i class="fa fa-users text-aqua"></i> {{ trans('like.new_likes') }}
                            - {{ $likeComments['likes'] }}
                        </a>
                    @endif
                </li><!-- end notification -->
            </ul>
        </li>
        <li class="footer"><a href="#">{{ trans('app.viewall') }}</a></li>
    </ul>
</li>