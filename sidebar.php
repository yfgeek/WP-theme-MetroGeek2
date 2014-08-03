<div id="side">

	<div id="feed" class="sids">
			<div class="sidetitle"><div class="lg"></div>关注</div>
			<ul>	
				<li><a href="http://www.yfgeek.com/feed" title="订阅我"><img src="/wp-content/themes/Metro%20Geek2/images/feed.jpg" /></a></li>
				<li><a href="http://www.weibo.com/yfss" title="新浪微博 @凡Geek"><img src="/wp-content/themes/Metro%20Geek2/images/weibo.png" /></a></li>
				<li><a href="https://github.com/yfgeek" title="Github" ><img src="/wp-content/themes/Metro%20Geek2/images/github.png" /></a></li>
				<li><a href="https://tiwitter.com/yfbk" title="Twitter"><img src="/wp-content/themes/Metro%20Geek2/images/twitter.png" /></a></li>				
			</ul>
	</div>
	<div id="about" class="sids">
			<div class="sidetitle"><div class="lg"></div>关于</div>
			<p><strong>一凡</strong>,极客一只,原百度空间用户</p>
			<p>一个热爱计算机,网络,新奇的电子产品的大学生</p>
	</div>	
		<div id="cate" class="sids">
			<div class="sidetitle">分类</div>
			<ul>	
				<?php wp_list_categories('title_li='); ?>
			</ul>
		</div>
		<div id="commentside" class="sids">
			<div class="sidetitle">评论</div>
			<ul>
				<?php a_rcomments(5);?>	
			</ul>
		</div>
		<div id="tongji" class="sids">
			<div class="sidetitle">信息</div>
			<ul>
			<li><?php wp_loginout();?></li>
			<li>已经被访问<b><?php echo getindexview(); ?></b>次</li>
			</ul>
			</div>
	</div>
	</div>